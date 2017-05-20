<?php

class DbSelectUser {
use SeparationDatabaseQueries, ValidateClass, SuperError;
    private $select;
    public $IdUser;
    private $IdSesja;
    
    function __construct() {
    }
      ##### Wybieranie publiczne  user #####
  public function select_user_all($id){
    try{
        
       $sql = 'SELECT * FROM `'.DatabaseClass::dbprefix().'user` WHERE `u_id`=:u_id';
	    $value = array(':u_id'=>$id); 
	    $param = array('0'=>'int');
            
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
           $row = SeparationDatabaseQueries::selectFetch($sql, $value, $param);
        if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów"
                      . " select_user_all(id)<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
               }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
    }
    
  public function select_user_email($adres_email){
      try{
          
       if($this->GetValidateAdresEmail($adres_email)){
           $email=$adres_email;
       }else{
           // zrobić wywołanie błędów
            //$param="Podaj Prawidłowy E-mail";
           return "email";
       }
      // print_r($email);
    $sql = 'SELECT u_id, email, password  FROM `'.DatabaseClass::dbprefix().'user`'
               . ' WHERE `email`=:email';
	   $value = array(':email'=>$email); 
	    $param = array('0'=>'str');
            
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
           $row = SeparationDatabaseQueries::selectFetch($sql, $value, $param);
        if(!is_null($row)){
    	     return $row;	
	   }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
    }
    
    
    public function getSesjaUser($IdSesja){
         $this->IdSesja = $IdSesja;
    } 
    
    public function select_user_logowanie($adres_email, $password, $sessiap){
      try{ 
          $row = $this->select_user_email(strip_tags($adres_email));
              if($this->GetValidateAdresEmail($adres_email)){
                     $email=strip_tags($adres_email);
                   }else{
                       // zrobić wywołanie błędów
                       //$param="Podaj Prawidłowy E-mail";
                       //$this->error($param)
                  return "email";
                }
         if( $row['password'] === md5($password) && $row['email'] === $email ){
             
          $insertsesion  = new DbInsertSesion();
          $sessia        = new UserSesionClass();
          $SelectSessia  = new DbSelectSesion();
          $updatesesion  = new DbUpdateSesion();
          
          //$userid = $row['u_id']; // id user
     
    // $sesianame  = $sessia->idSesion(); // id sesji   
       //$sesianame  = $sessia;
           /// user id przypisany do sesji
          $row2 = $SelectSessia->select_sesion_userid($row['u_id']);
        
     if(empty($row2['userid'])){
         // przypisanie nowej sesji
         //print_r($this->IdSesja);
     $row1 = $insertsesion->insert_sesion_all(strip_tags($sessiap), ErrorLogiClass::global_ip(),
          ErrorLogiClass::global_agent(), ErrorLogiClass::get_referer(),
          ErrorLogiClass::global_host(),  ErrorLogiClass::global_server_name(), 
          $row['u_id'], 1, date('Y-m-d H:i:s'));
        //date('Y-m-d H:i:s')
            //// print_r($row1."iuiuu");
         if($row1){
            // sesja insert
             $sessia->setSesion('IsUser', $row['u_id']);
             //$this->IdUser = $row['u_id'];
             return "sukces"; //'<br>'.$row['u_id'].'<br>'
         }else{
             //Brak sesja
             $mesage="Zapis Sesji Nie Udany  ". $row1.' Insert';
             ErrorLogiClass::global_logi_save($mesage, $_SERVER); 
             return false;
         }  
         
     }else{
         // aktualizacja obecnej sesji 
      $row3 = $updatesesion->update_sesion_user(strip_tags($sessiap), ErrorLogiClass::global_ip(),
          ErrorLogiClass::global_agent(), ErrorLogiClass::get_referer(),
          ErrorLogiClass::global_host(),  ErrorLogiClass::global_server_name(), 
          $row['u_id'], 1, date('Y-m-d H:i:s'));
      ////print_r($row3);
       if($row3){
            // sesja update
           $sessia->setSesion('IsUser', $row['u_id']);
            //$this->IdUser = $row['u_id'];
           //echo $sesianame.'update';
             return "sukces"; //'<br>'.$row['u_id'].'<br>'
         }else{
             //Brak sesja
             //$mesage="Zapis Sesji Nie Udany  ". $row3.' Update';
             //ErrorLogiClass::global_logi_save($mesage, $_SERVER); 
             return false;
         } 
         
     } 
         }else{
               // $param = "Podaj Prawidłowy email lub Hasło";
               // $this->error($param)
               return "email-haslo";
         }
          
          
	 }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
    }
}
