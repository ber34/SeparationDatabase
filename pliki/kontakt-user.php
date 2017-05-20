<?php

   require_once(dirname(__DIR__) . '/lib-traid/SeparationDatabaseQueries.php');
   require_once(dirname(__DIR__) . '/lib-traid/ValidateClass.php');
   require_once(dirname(__DIR__) . '/lib-traid/SuperError.php');
   require_once(dirname(__DIR__) . '/lib-interface/InterfDb.php');
   require_once(dirname(__DIR__) . '/db-conect/DatabaseClass.php');
   require_once(dirname(__DIR__) . '/lib/ErrorLogiClass.php');
   require_once(dirname(__DIR__) . '/db-insert/DbInsertContact.php');             
     
	      $kontakt = new DbInsertContact();
	 
	// $_POST['user_kontakt_email']="exit@o2.pl";
   // $_POST['wiadomosc']="gffkkk dfgsdgsd  dfsd sf sdfsdfsdsdf ";

if(array_key_exists('user_kontakt_email', $_POST)){

                   // Sprawdzamy ilość znaków w email i czy nie jest pusty
   if(!empty($_POST['user_kontakt_email']) && strlen(trim($_POST['user_kontakt_email'])) < 50){

       // if($captcha->wyswietl_captcha_private()){
            /* Zapis do bazy */
            //if(session_id() == $_POST['key_id']){
    // echo $user->user_kontakt($_POST['user_kontakt_email'], $_POST['wiadomosc']);
             if($kontakt->insert_contact_all(strip_tags($_POST['wiadomosc']), '1974-1-11', strip_tags($_POST['user_kontakt_email']) , ErrorLogiClass::global_ip()) > 0){
			 
				 $userDane['blad']="sukces";
				 
				 }else{
				 
				 $userDane['blad']="blad-zapytania";
				 
				 }
     
	 
     //session_regenerate_id();
     //session_destroy();
           // }else{
               // header("refresh:1;url=http://$host$uri/$plik");
           // }
      
  }else{
   $userDane['blad']="blad-email";
   }
	  }else{
            $userDane['blad']="blad";
            }
			 
  echo json_encode(array('blad_ile'=>$userDane['blad'])); 
    unset($_POST);
