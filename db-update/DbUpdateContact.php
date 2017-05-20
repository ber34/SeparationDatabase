<?php
class DbUpdateContact {
use SeparationDatabaseQueries;


public function update_contact_all($id, $datatime, $ipuser, $mesage) {
    try{
        
    $sql = ' UPDATE `'.databaseClass::dbprefix().'contact` SET '
     . '`datatime`=:datatime,`ipuser`=:ipuser,`mesage`=:mesage WHERE `u_id`=:u_id';
        
    ///    u_id 	mesage 	datatime 	ipuser    
     $value = array(':u_id'=>$id, ':datatime'=>$datatime, ':ipuser'=>$ipuser, ':mesage'=>$mesage); 
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
