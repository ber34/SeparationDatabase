<?php
class DbUpdateSesion {
use SeparationDatabaseQueries;


public function update_sesion_all($sesianame, $ipsesia, $userid) {
    try{
        
    $sql = ' UPDATE `'.DatabaseClass::dbprefix().'sesion` SET '
     . '`sesianame`=:sesianame,`ipsesia`=:ipsesia,`mesage`=:mesage WHERE `userid`=:userid';
        
       /// u_id 	sesianame 	ipsesia 	userid 
$value = array(':userid'=>$userid, ':sesianame'=>$sesianame, ':ipsesia'=>$ipsesia, ':mesage'=>$mesage); 
$param = array('0'=>'int', '1'=>'str', '2'=>'str', '3'=>'str');
        
    $row = SeparationDatabaseQueries::updateFetch($sql, $value, $param);
   
       if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów update_sesion_all()<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
               }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
   
   public function update_sesion_user($sesianame, $ipsesia, $agent, $referer, $host,
                                  $servername, $userid, $issesja, $czassesja) {
    try{

$sql = ' UPDATE `'.DatabaseClass::dbprefix().'sesion` SET '
     . '`sesianame`=:sesianame,`ipsesia`=:ipsesia, `agentuser`=:agentuser,'
     . '`userreferer`=:userreferer,`userhost`=:userhost,`usersevername`=:usersevername,'
     . '`issesja`=:issesja, `czassesja`=:czassesja WHERE `userid`=:userid';
         /// u_id  sesianame  ipsesia	userid 
        $value = array(':sesianame'=>$sesianame, ':ipsesia'=>$ipsesia, 
            ':agentuser'=>$agent, ':userreferer'=>$referer, ':userhost'=>$host,
            ':usersevername'=>$servername, ':issesja'=>$issesja, ':userid'=>$userid,
            ':czassesja'=>$czassesja); 
	$param = array('0'=>'str', '1'=>'str', '2'=>'str','3'=>'str',
                       '4'=>'str', '5'=>'str', '6'=>'int', '7'=>'int',
                       '8'=>'str');
        
    $row = SeparationDatabaseQueries::updateFetch($sql, $value, $param);
    
       if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów"
                      . "update_sesion_user()<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
            }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
   
    public function update_wyloguj_sesion_user($userid) {
    try{
        
	$SelectSesion = new DbSelectSesion();
        $row3 = $SelectSesion->select_sesion();
       // Zamykamy wszystkie otwarte sesje w ciągu ostatnich 12 godzin  
         foreach($row3 as $ro){
             $czas1 = strtotime("+12 hours", strtotime($ro['czassesja']));
             $czas2 = date("Y-m-d H:i:s", $czas1);
         if($ro['issesja'] == 1 && date("Y-m-d H:i:s") >= $czas2){
             /// pozamykanie nie aktywnych sesji 
           //$updatesesion->update_wyloguj_sesion_user($iduser);
            $sql = ' UPDATE `'.DatabaseClass::dbprefix().'sesion` SET '
                 . '`issesja`=:issesja WHERE `userid`=:userid';
         /// u_id  sesianame  ipsesia	userid 
        $value = array(':issesja'=>0, ':userid'=>$ro['userid']); 
	$param = array('0'=>'int', '1'=>'int');
        
     SeparationDatabaseQueries::updateFetch($sql, $value, $param);
           }  
         }

//u_id sesianame ipsesia agentuser userreferer userhost usersevername userid issesja
           // wylogowujemy usera
$sql = ' UPDATE `'.DatabaseClass::dbprefix().'sesion` SET '
     . '`issesja`=:issesja WHERE `userid`=:userid';
         /// u_id  sesianame  ipsesia	userid 
        $value = array(':issesja'=>0, ':userid'=>$userid); 
	$param = array('0'=>'int', '1'=>'int');
        
    $row = SeparationDatabaseQueries::updateFetch($sql, $value, $param);
    
       if(!empty($row)){
           
          // $userid;
          // $sessia = new UserSesionClass(); 
          // $sessia->setSesion('IsUser', '');
          //session_destroy();
    	     return 1;	
	   }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
   
    public function update_sesion_user_id($sesianame, $userid, $czas) {
    try{
	
//u_id sesianame ipsesia agentuser userreferer userhost usersevername userid issesja

$sql = ' UPDATE `'.DatabaseClass::dbprefix().'sesion` SET '
     . '`sesianame`=:sesianame,`czassesja`=:czassesja WHERE `userid`=:userid';
         /// u_id  sesianame  ipsesia	userid 
        $value = array(':sesianame'=>$sesianame, ':userid'=>$userid,
            ':czassesja'=>$czas); 
	$param = array('0'=>'str', '1'=>'str', '2'=>'str');
        
    $row = SeparationDatabaseQueries::updateFetch($sql, $value, $param);
    
       if(!is_null($row)){
    	     return $row;	
	   }else{
	      throw new Exception("Błąd zapytania nie pobrano rekordów"
                      . "update_sesion_user()<br>");
              //trigger_error("Błąd zapytania nie pobrano rekordów<br>");
            }   
	       }catch(Exception $b){
		## metoda do obsługi błędów i zapisie logów ## 
		SeparationDatabaseQueries::obsugaBledow($b);  
        }
   }
}
