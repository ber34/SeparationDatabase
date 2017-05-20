<?php

class DbInsertChat {
 use SeparationDatabaseQueries, ValidateClass;

public function insert_user_chat($tresc, $user) {
   
  try{  
	if(!empty($tresc) && !empty($user)){
		
		$sql = 'INSERT INTO `'.DatabaseClass::dbprefix().'chat` ( `ip_chat`, `text_chat`, `name_chat`, `data_chat`) VALUES (
                                                                :ip_chat,
																:u_text,
                                                                :u_user,
                                                                :u_czas)';  
		
        $value = array(':ip_chat'=> ErrorLogiClass::global_ip(), ':u_text'=>strip_tags($tresc), ':u_user'=>strip_tags($user), ':u_czas'=>date("Y-m-d h:i:s")); 
	    $param = array('0'=>'str', '1'=>'str', '2'=>'str', '3'=>'str');
        
		    $row = SeparationDatabaseQueries::insertFetch($sql, $value, $param);
		
		}else{
		             $mesage="Zapis Nieudany brak Post dla Insert";
             ErrorLogiClass::global_logi_save($mesage, $_SERVER); 
		   $row = 0;
		}

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
