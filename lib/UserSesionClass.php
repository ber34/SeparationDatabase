<?php
class UserSesionClass{
    use ValidateClass;
             private $sesion_id=array(); // id sesji
             private $isSesion = false; // czy jest sesja
             private $start_sesion;
             private $u_login;
             private $sesion;
	         public  $log;
	         private $user_class;
             public $IdUser;
             private $IdSesionUser;
	  static private $is_sesion=0;
          // ustawiamy czas sesji //
        static private  $lifetime=3600;

    public function __construct(){ 
	   	  
     ## Deklarujemy klase SpecialArguments ##
		//$this->user_class = new userClass(
		 //   array("g" =>new classTablePdoAll));
          }
	
     	public function isSesion(){
      //session_set_cookie_params(self::$lifetime);
  
   if(empty($_COOKIE['GraKarciana'])){
      session_name("GraKarciana");
       //echo "yes GraKarciana";
    }else{
       //echo "nie ma GraKarciana";
    } 
        session_start();     
        // ErrorLogiClass::get_referer();
        // ErrorLogiClass::global_ip();
        // ErrorLogiClass::global_agent(); 
     //// po akcji wyloguj   
        if(!empty($_GET['akcja']) && $_GET['akcja'] == 'wyloguj.html'){
              session_regenerate_id();
			// unset($_SESSION);
         }
        }     
          
     public function idSesion(){
           ## szyfrujemy sesje ##  
          if(!empty( sha1(session_id()))){
                return  sha1(session_id());
               }else{
                return false;
               }   
           }  
         
     
     public function IdSesionUserGet(){
         
      $SelectSesion = new DbSelectSesion();
      $updatesesion  = new DbUpdateSesion();
	  
       // print_r($_SESSION);
        // $this->setSesion('IsUser', $this->getSesion('IsUser'));

         //$row = $SelectSesion->select_sesion_userid($this->getSesion('IsUser'));
         $row = $SelectSesion->select_sesion_id($this->idSesion());
        //$row = $SelectSesion->select_sesion_user_ip(ErrorLogiClass::global_ip());
        // odnawianie sesji przez przeładowanie usera
         
           // jedna godzina
           // $czas_poczatek = strtotime("+1 hours", strtotime($row['czassesja']));
           // $czas_za       = date("Y-m-d H:i:s", $czas_poczatek);  
        // dodanie sekund do daty
         $czas_za = date("Y-m-d H:i:s", strtotime($row['czassesja']) + self::$lifetime);    
         //print_r($czas_za);
         if(date("Y-m-d H:i:s") >= $czas_za){
            $updatesesion->update_wyloguj_sesion_user($row['userid']);  
             session_regenerate_id();
			 //unset($_SESSION);			
         }
         
        if($row['issesja'] == 1 && date("Y-m-d H:i:s") >= $czas_za){
            // zrobić regenerację sesji
            //print_r($row);
           // session_regenerate_id();
         $updatesesion->update_sesion_user_id($this->idSesion(),
                 $row['userid'], date("Y-m-d H:i:s"));
         $this->setSesion('IsUser', $row['userid']);
        }
       //$row1 = $SelectSesion->select_sesion_user_ip(ErrorLogiClass::global_ip());
        $row1 = $SelectSesion->select_sesion_id($this->idSesion());
          // $row1 = $SelectSesion->select_sesion_userid($this->getSesion('IsUser'));
       // echo $this->idSesion();
        if($row1['sesianame'] === $this->idSesion() && $row1['issesja'] == 1 ){
            $this->setSesion('IsUser', $row1['userid']);
             return true;
         }else{
             ///print_r($row1);            
              // $updatesesion->update_wyloguj_sesion_user($row['userid']);  
             return false;
         }
     } 
     
           
       public function setSesion($key, $value){
           if(!empty($key) && !empty($value)){
               $_SESSION[$key] = $value;
           }    
       } 
       
       public function getSesion($key){  
          if(!empty($_SESSION[$key])){
            return $_SESSION[$key];
           } 
       }  
           
       final public function isDestroy(){
            // $sss = session_get_cookie_params(); 
      //session_destroy();
      //session_unset();
      //session_unregister('GraKarciana');
      //session_write_close();
     // unset($_SESSION);
     // unset($_COOKIE);  
           }    
  
 }             
