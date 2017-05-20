<?php

class DbInsertUser {
use SeparationDatabaseQueries, ValidateClass;


public function insert_user($firstname, $name, $mesage) {
    try{
        
$sql = 'INSERT INTO `'.DatabaseClass::dbprefix().'user`(`firstname`, `name`, `mesage`) '
        . 'VALUES (:firstname, :name, :mesage)';
        
        $value = array(':firstname'=>$firstname, ':name'=>$name, ':mesage'=>$mesage); 
	    $param = array('0'=>'str', '1'=>'str', '2'=>'str');
        
    $row = SeparationDatabaseQueries::insertFetch($sql, $value, $param);
    
       if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
               }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
   
   public function insert_register_user($firstname, $name, $password, $email,
                                     $userip, $agentuser, $userreferer) {
    try{
	 // walidacja adres email z strip_tags
	    $valide = $this->GetValidateAdresEmail($email);
		//$valide = $this->ValidateEmail($email);
	   //print_r($valide);
	   if( is_null($valide) ){
	   return 'blad-email';
	   }
	
           $selectuser = new DbSelectUser();   
    $row = $selectuser->select_user_email($email);
       if($email === $row['email']){
            return ("user-istnieje");
       }
	  //$validate = new ValidateClass();
	  
	  $min =4;
	  $max=40;
	  
	  // walidacjia długosci Post
	   $valid[0] = $this->ValidateMinMax($firstname, $min, $max);
	   $valid[1] = $this->ValidateMinMax($name, $min, $max);
	   $valid[2] = $this->ValidateMinMax($password, $min, $max);
	   
	   foreach($valid as $v){
	        if($v === 0){
			   $error[] = true;
			}
	   }
	   
	  if(!empty($error)){ 
	   if(in_array(true, $error)){
	     return 'min-max-login';
	     }
	   } 

	   // walidacja post
	   $validep[0] = $this->GetValidatePost($firstname);
	   $validep[1] = $this->GetValidatePost($name);
	   $validep[2] = $this->GetValidatePost($password);
	   $validep[4] = $this->GetValidatePost($userip);
	   $validep[5] = $this->GetValidatePost($agentuser);
	   $validep[6] = $this->GetValidatePost($userreferer);
	   
	   
	    foreach($validep as $vv){
	        if($vv === false){
			   $error1[] = true;
			}
	   }
	  
    if(!empty($error1)){	  
	   if(in_array(true, $error1)){
	     return 'blad';
	     }
	   }
	   
	   
// u_id  firstname name password email userip agentuser userreferer
      
$sql = 'INSERT INTO `'.DatabaseClass::dbprefix().'user`(`firstname`, `name`, `password`,'
        . '`email`, `userip`, `agentuser`, `userreferer`) '
        . 'VALUES (:firstname, :name, :password, :email, :userip, :agentuser, :userreferer)';
        
        $value = array(':firstname'=>$firstname, ':name'=>$name,
            ':password'=>md5($password), ':email'=>$email, ':userip'=>$userip,
            ':agentuser'=>$agentuser, ':userreferer'=>$userreferer); 
	    $param = array('0'=>'str', '1'=>'str', '2'=>'str','3'=>'str',
                           '4'=>'str', '5'=>'str', '6'=>'str');
        
    $row = SeparationDatabaseQueries::insertFetch($sql, $value, $param);
    
       if(!empty($row)){
    	     return 'sukces';  
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
               }
              
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
}
