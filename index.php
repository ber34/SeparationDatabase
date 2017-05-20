<?php
## Pobieramy Super Globalną ##
///error_reporting(defined('E_STRICT') ? E_ALL | E_STRICT : E_ALL);
   error_reporting(E_ERROR | E_WARNING | E_PARSE | E_ALL); 
//$cookieName="Ksiazka";
   $start1 = microtime(true); 
   
require_once(dirname(__FILE__) . '/lib/Autoload.php');
 $sessia = new UserSesionClass(); 
       
      $sessia->isSesion();
      //okresl jezyk 1 lub 2
 if(isset($_GET['lang'])){
     $_SESSION['lang'] = $_GET['lang'];
     $lang = new  ClassLang($_SESSION['lang']);
    }else{  
     $lang = new  ClassLang(@$_SESSION['lang']);   
    }

    $url = new UrlClass();        
            
      if($sessia->IdSesionUserGet()){
               $tabKarty   = array();
               $tabTronfy  = array();
               $tabPunkty  = array();

           include_once(dirname(__FILE__) . '/template/zalogowani.php'); 
         // echo "<br>Zalogowany<br>";
      }else{
	     // unset($_SESSION);
          include_once(dirname(__FILE__) . '/template/niezalogowani.php'); 
          ///echo "<br>Nie Zalogowany<br>"; 
      }
