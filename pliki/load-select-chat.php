<?php

   require_once(dirname(__DIR__) . '/lib-traid/SeparationDatabaseQueries.php');
   require_once(dirname(__DIR__) . '/lib-traid/ValidateClass.php');
   require_once(dirname(__DIR__) . '/lib-traid/SuperError.php');
   require_once(dirname(__DIR__) . '/lib-interface/InterfDb.php');
   require_once(dirname(__DIR__) . '/db-conect/DatabaseClass.php');
   require_once(dirname(__DIR__) . '/lib/ErrorLogiClass.php');
   require_once(dirname(__DIR__) . '/db-select/DbSelectChat.php');
 
		// tutaj wywołanie baza danych selekt chat
		$chat = new DbSelectChat();

	if(!empty($chat)){
		    foreach ($chat->select_user_chat_all() as $d){
			// kolory wpisów
			$color = rand(000000,999999);
	        $color1 = rand(000000,999999);
                  echo '<b>User:</b><b style="color:#'.$color.';"> '.$d['name_chat'].'</b> -> <span style="font-size:18px; color:#'.$color1.';">'.$d['text_chat'].'</span><br>';   
               }
	      }else{
		  echo 'Brak wyników !'; 
	   }
