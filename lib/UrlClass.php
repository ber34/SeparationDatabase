<?php

class UrlClass{
     use ValidateUrl;

  static private $adresy = array(1 => "index.html", 2 => "fqu.html", 
        3 => "regulamin.html", 4 => "kontakt.html", 5 => "wyloguj.html",
        6 => "rejestracja", 7 => "przypomnijhaslo.html", 8 =>"chat.html", 10 =>"politykaprywatnosci.html");

   private   $_url;
   private   $akcja;
   private   $page;
   private   $tablepdo;
  // private   $AdresNumer=array();
   
## umieszczamy wszystkie pliki,  które mają mieć dostęp dla niezalogowanych ##
static private $adr =array(0=>'index.html', 1=>'fqu.html', 2=>'regulamin.html', 
3=>'zaloguj-user.php', 4=>'wyloguj.html', 5=>'kontakt.html', 6=>'rejestracja.html',
7=>'przypomnijhaslo.html', 8=>'index.php?lang=2', 9=>'index.php?lang=1', 10 =>'politykaprywatnosci.html');

   public function __construct(){ 
		// $this->tablepdo =  new classTablePdoAll();
      // $this->AdresNumer;
    }
	
public function url(){
   try{ 
       if(array_key_exists( 'akcja', $_GET )){
          $t = ValidateUrl::IsValidateUrl($_GET['akcja']); /// adres
          }else{$t=null;} 
       if(is_null($t)){
          $t = "index.html"; 
         }

          $d=explode(".html", $t);
          if($d[0] == "index"){
             $d[0]='home'; 
          }
         
          // print_r(dirname(__DIR__) .'/template/content/'.$d[0].'.php');
      if(file_exists(dirname(__DIR__) .'/template/content/'.$d[0].'.php')){
           return require_once(dirname(__DIR__) .'/template/content/'.$d[0].'.php');
              }else{
           return require_once(dirname(__DIR__) .'/template/content/404.php');           
            }		   
           }catch(Exception $e){
		   /// logi  
          SeparationDatabaseQueries::obsugaBledow($b);
                    }       
	}
       ############################  przypisane do menu href= ###########################
    public function adres($adres){
	try{
             if(!is_null($adres) && isset($adres)){
		 ## zwraca adres ##
                 // prywatna statyczna adresy 
               return self::$adresy[(int)$adres];       
		}else{
                   // return 1;
	      throw new Exception("Błąd: Brak wyniku Url! <br>");
		 } 
            }catch(Exception $b){
                 SeparationDatabaseQueries::obsugaBledow($b);  
             } 	     				
	}
	
 static public function is_login(){    
	 if(userSesionClass::is_sesja()){
	  return 1;
	 }
	 
	 $t = explode("/", $_SERVER['REQUEST_URI']);
		if($t[1] == null || $t[2] == null ){  //|| $t[3] == null
		 ##  to jest index początek ##
		  return 1;
		  }else{
	foreach(self::$adr as $a){
	   $v = strstr($_SERVER['REQUEST_URI'], $a); 
		 if(!empty($v)){
		     $vv[] = $v;
		   }
		  }
	if(!empty($vv)){ 
	  if(in_array($vv[0], self::$adr)){return 1;}else{return 0;}
		 }else{return 0;}	  
	  }				
  } 
	
 }	
