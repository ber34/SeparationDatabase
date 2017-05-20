<?php

class DbSelectSesion {
use SeparationDatabaseQueries;
    function __construct() {
        
    }
     ##### Wybieranie publiczne  user #####
  public function select_sesion(){
    try{
       $sql = 'SELECT * FROM `'.DatabaseClass::dbprefix().'sesion`';
	   $value = array(':u_id'=>1); 
	    $param = array('0'=>'int');
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
                 $row  = SeparationDatabaseQueries::selectFetchAll($sql, $value, $param);
		if(!is_null($row)){
    	            return $row;	
		}else{
		 throw new Exception("Błąd zapytania nie pobrano rekordów"
                         . "select_sesion(id)<br>");	
      }     	
		}catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);
        }
    }
    
      public function select_sesion_userid($userid){
    try{
       // print_r($userid);
        // czy jsest user zalogowany
       $sql = 'SELECT * FROM `'.DatabaseClass::dbprefix().'sesion` WHERE `userid`=:userid';
	    $value = array(':userid'=>$userid); 
	    $param = array('0'=>'int');
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
                 $row  = SeparationDatabaseQueries::selectFetch($sql, $value, $param);
                 //print_r($row);
		if(is_array($row)){
    	            return $row;	
		}else{
		        // throw new Exception("Błąd zapytania nie pobrano rekordów"
                       //  . "select_sesion_userid(userid)<br>");	
      }     	
		}catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);
        }
    }
    
       public function select_sesion_id($sesiaid){
    try{
        
       // print_r($userid);
        // czy jsest user zalogowany
       $sql = 'SELECT sesianame, issesja, userid, czassesja FROM `'.DatabaseClass::dbprefix().'sesion`'
               . ' WHERE `sesianame`=:sesianame';
	   $value = array(':sesianame'=>$sesiaid); 
	    $param = array('0'=>'int');
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
                 $row  = SeparationDatabaseQueries::selectFetch($sql, $value, $param);
                 //print_r($row);
		if(is_array($row)){
    	            return $row;	
		}else{
		        // throw new Exception("Błąd zapytania nie pobrano rekordów"
                       //  . "select_sesion_userid(userid)<br>");	
      }     	
		}catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);
        }
    }
    
          public function select_sesion_user_ip($sesiaip){
    try{
        
       // print_r($userid);
        // czy jsest user zalogowany
       $sql = 'SELECT sesianame, issesja, userid, czassesja FROM `'.DatabaseClass::dbprefix().'sesion`'
               . ' WHERE `ipsesia`=:ipsesia';
	   $value = array(':ipsesia'=>$sesiaip); 
	    $param = array('0'=>'int');
		//$sql=1;
		// param musi być tyle co $value i zaczynamy od zera			
	        //$param = array('params'=>'str');
			//$param = array('params'=>'int'); 
            /**
             * Pobieramy metodę z Abstrakcyjnej Klasy SeparationDatabaseQueries
             */
                 $row  = SeparationDatabaseQueries::selectFetch($sql, $value, $param);
                 //print_r($row);
		if(is_array($row)){
    	            return $row;	
		}else{
		        // throw new Exception("Błąd zapytania nie pobrano rekordów"
                       //  . "select_sesion_userid(userid)<br>");	
      }     	
		}catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);
        }
    }
}

