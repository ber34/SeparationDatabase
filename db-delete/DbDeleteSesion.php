<?php

class DbDeleteSesion {
use SeparationDatabaseQueries;


public function delete_sesion_all($id) {
    try{
        
    $sql = ' DELETE FROM `'.databaseClass::dbprefix().'sesion` WHERE `u_id`=:u_id';

       $value = array(':u_id'=>$id); 
	   $param = array('0'=>'int');
        
    $row = SeparationDatabaseQueries::deleteFetch($sql, $value, $param);
    
       if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd nie usunięto rekordów<br>");
              //trigger_error("Błąd nie usunięto rekordów<br>");
               }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
}
