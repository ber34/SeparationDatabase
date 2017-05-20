<?php
class DbUpdateUser {
use SeparationDatabaseQueries;

public function update_user_all($id, $firstname, $name, $mesage) {
    try{
        
    $sql = ' UPDATE `'.databaseClass::dbprefix().'user` SET '
     . '`firstname`=:firstname,`name`=:name,`mesage`=:mesage WHERE `u_id`=:u_id';
        
        
        $value = array(':u_id'=>$id, ':firstname'=>$firstname, ':name'=>$name, ':mesage'=>$mesage); 
	$param = array('0'=>'int', '1'=>'str', '2'=>'str', '3'=>'str');
        
    $row = SeparationDatabaseQueries::updateFetch($sql, $value, $param);
   
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
}
