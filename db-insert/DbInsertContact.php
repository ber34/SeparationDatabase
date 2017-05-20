<?php

class DbInsertContact {
use SeparationDatabaseQueries;

public function insert_contact_all($mesage, $datatime, $email , $ipuser) {
    try{
        
$sql = 'INSERT INTO `'.databaseClass::dbprefix().'contact`(`mesage`, `datatime`, `email`, `ipuser`) '
        . 'VALUES (:mesage, :datatime, :email, :ipuser)';
         ///    u_id 	mesage 	datatime 	ipuser    
        $value = array(':mesage'=>$mesage, ':datatime'=> date('Y-m-d H:i:s'), ':email'=>$email, ':ipuser'=>$ipuser); 
	$param = array('0'=>'str', '1'=>'str', '2'=>'str', '3'=>'str');
        
    $row = SeparationDatabaseQueries::insertFetch($sql, $value, $param);
    
       if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie zapisano rekordów<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
               }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
}
