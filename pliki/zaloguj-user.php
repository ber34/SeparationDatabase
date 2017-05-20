<?php

   require_once(dirname(__DIR__) . '/lib-traid/SeparationDatabaseQueries.php');
   require_once(dirname(__DIR__) . '/lib-traid/ValidateClass.php');
   require_once(dirname(__DIR__) . '/lib-traid/SuperError.php');
   require_once(dirname(__DIR__) . '/lib-interface/InterfDb.php');
   require_once(dirname(__DIR__) . '/db-conect/DatabaseClass.php');
   require_once(dirname(__DIR__) . '/db-insert/DbInsertSesion.php');
   require_once(dirname(__DIR__) . '/lib/UserSesionClass.php');
   require_once(dirname(__DIR__) . '/db-select/DbSelectSesion.php');
   require_once(dirname(__DIR__) . '/db-update/DbUpdateSesion.php');
   require_once(dirname(__DIR__) . '/lib/ErrorLogiClass.php');
   require_once(dirname(__DIR__) . '/db-select/DbSelectUser.php');
   

//$_POST['pass']= "ladmin";
///$_POST['sesia']="12345";
        $SelectUser  = new DbSelectUser();

  if(!empty($_POST['email']) && !empty($_POST['pass'])){
  
     $dd = $SelectUser->select_user_logowanie($_POST['email'], $_POST['pass'], $_POST['sesia']);

       echo json_encode(array('Login'=>$dd));
       
   }else{
       
       echo json_encode(array('Login'=>'sukces'));
   } 
