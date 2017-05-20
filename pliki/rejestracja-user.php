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
   require_once(dirname(__DIR__) . '/db-insert/DbInsertUser.php');


 //$_POST['register_login']="ffffg";
 //$_POST['register_pass']="gffkkk";
 //$_POST['register_email']="bgg@o2.pl";
 //$_POST['regulamin']= "regulamin";
 
   // Rejestracja obiekt
 $userRejestracja  = new DbInsertUser();

$host  = htmlspecialchars($_SERVER['HTTP_HOST']);
        $uri   = htmlspecialchars(dirname($_SERVER['PHP_SELF']));
        $plik  = basename('index.html');  
    
    if(array_key_exists('register_login', $_POST)){

            if(!empty($_POST['regulamin']) && $_POST['regulamin'] == "regulamin"){ 
           
			////ErrorLogiClass::get_ip() ErrorLogiClass::global_ip() ErrorLogiClass::global_agent()ErrorLogiClass::get_referer()
			
			
			$userDane['blad'] = $userRejestracja->insert_register_user($_POST['register_login'], $_POST['register_login'], $_POST['register_pass'],
			$_POST['register_email'], ErrorLogiClass::global_ip(), ErrorLogiClass::global_agent(), ErrorLogiClass::get_referer());
			
               // header("refresh:1;url=http://$host$uri/$plik");
               // exit;
        
            }else{
                $userDane['blad']="regulamin";
                }
        }else{
            $userDane['blad']="blad";
             } 

			  
              echo json_encode(array('blad_ile'=>$userDane['blad'])); 
    unset($_POST);
