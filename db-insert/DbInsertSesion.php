<?php

class DbInsertSesion {
use SeparationDatabaseQueries;


public function insert_sesion_all($sesianame, $ipsesia, $agent, $referer, $host,
                                  $servername, $userid, $issesja, $czassesja) {
    try{
	
//u_id sesianame ipsesia agentuser userreferer userhost usersevername userid issesja
        
$sql ='INSERT INTO `'.DatabaseClass::dbprefix().'sesion`(`sesianame`, `ipsesia`,'
        . 'agentuser, userreferer, userhost, usersevername, `userid`, `issesja`, `czassesja`) '
        . 'VALUES (:sesianame, :ipsesia, :agent, :referer, :host, :servername, '
        . ':userid, :issesja, :czassesja)';
         /// u_id  sesianame  ipsesia	userid 
        $value = array(':sesianame'=>$sesianame, ':ipsesia'=>$ipsesia, 
            ':agent'=>$agent, ':referer'=>$referer, ':host'=>$host,
            ':servername'=>$servername, ':userid'=>$userid, ':issesja'=>$issesja,
            ':czassesja'=>$czassesja); 
	$param = array('0'=>'str', '1'=>'str', '2'=>'str',
                       '3'=>'str', '4'=>'str', '5'=>'str', '6'=>'str',
                       '7'=>'int', '8'=>'str');
        
    $row = SeparationDatabaseQueries::insertFetch($sql, $value, $param);
    
       if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów"
                      . "insert_sesion_all(sesianame, ipsesia, agent, referer,"
                      . " host, servername, userid, issesja)<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
            }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
}

