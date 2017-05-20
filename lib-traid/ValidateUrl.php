<?php

trait ValidateUrl{

    static private $url;
    
    static public function IsValidateUrl($url) {
        // $copl   = array('ą','ę','ć','ł','ń','ó','ś','ź','ż');
       //$CoPL1  = array('Ą','Ę','Ć','Ł','Ń','Ó','Ś','Ź','Ż');
       //$co     = array('a','e','c','l','n','o','s','z','z');
   
  // $this->_url  = str_replace($copl,$co,$this->_url); /// zamienia litery
  // $this->_url  = str_replace($CoPL1,$co,$this->_url); /// zamienia litery
  // $this->_url  = preg_replace('/[^a-z0-9\.]+/si','',$this->_url);  
try{					  
      if(!empty($url)){
         self::$url  = strtolower(trim($url));  
         return preg_replace('/[^a-z0-9\-\.]+/si','', self::$url); 
      }else{
         throw new Exception("Błąd: Brak Url! <br>");   
      }	
    }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
    }
}
