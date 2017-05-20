<?php

class DbSelectChat {
 use SeparationDatabaseQueries;

      ##### Wybieranie publiczne  user #####
  public function select_user_chat_all(){
    try{
        
       $sql = 'SELECT text_chat, name_chat FROM `'.DatabaseClass::dbprefix().'chat` ORDER BY `id_chat` ASC';
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
           $row = SeparationDatabaseQueries::selectFetchAll($sql);
        if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów"
                      . " select_user_chat_all()<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
               }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
    }
}
