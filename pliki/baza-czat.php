<?php

   require_once(dirname(__DIR__) . '/lib-traid/SeparationDatabaseQueries.php');
   require_once(dirname(__DIR__) . '/lib-traid/ValidateClass.php');
   require_once(dirname(__DIR__) . '/lib-traid/SuperError.php');
   require_once(dirname(__DIR__) . '/lib-interface/InterfDb.php');
   require_once(dirname(__DIR__) . '/db-conect/DatabaseClass.php');
   require_once(dirname(__DIR__) . '/lib/ErrorLogiClass.php');
   require_once(dirname(__DIR__) . '/db-insert/DbInsertChat.php');
	
	
	 $chatInsert = new DbInsertChat();
	 // Dodajemy posty z chat do bazy danych
	// $_POST['tresc']= "Asdfg";
	// $_POST['user']= "Adasss";
	 // Dajemy post bez strip_tags -> strip tags w bazie danych
	  $wynik = $chatInsert->insert_user_chat($_POST['tresc'], $_POST['user']);
	 
   if($wynik > 0){
      echo 'ok';
   }
