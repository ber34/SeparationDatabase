<?php

class DbSelectContact {
use SeparationDatabaseQueries;
    function __construct() {
        
    }
		   ##### Wybieranie publiczne  user #####
  public function select_contact_all($id){
    try{
       $sql = 'SELECT * FROM `'.databaseClass::dbprefix().'contact` WHERE `u_id`=:u_id';
	   $value = array(':u_id'=>$id); 
	    $param = array('0'=>'int');
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
           $row =SeparationDatabaseQueries::selectFetch($sql, $value, $param);
	      if(!is_null($row)){
    	          return $row;	
		}else{
		 throw new Exception("Błąd zapytania nie pobrano rekordów<br>");	
      }     	
		}catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
    }
}
