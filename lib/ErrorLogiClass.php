<?php
/**
 * PHP 5.1
 */
 
/**
 * @version 2.00
 * error_logi
 * @author Adam Berger <ber34#o2.pl-->
 * Class allows you to save the log file error and send them to the e-mail,
 * The choice depends only on us, you can use both at once and save to a file and send an e-mail.
 * The class must specify the path to the file and assign e-mail address where you will send
 * Our logs with errors
 * Themselves we determine what we want to put there, and the class appends data
 * Such as ip, host, server, and a few others see for yourself.
 *
 * Klasa pozwala na zapisywanie b&#322;&#261;dów do plików .log i wys&#322;aniu ich na wskazany e-mail, 
 * Wybór zale&#380;y tylko od nas, mo&#380;na u&#380;y&#263; obu na raz i zapis do pliku i wys&#322;a&#263; e-mail.
 * W klasie nale&#380;y poda&#263; &#347;cie&#380;k&#281; do plików i przypisa&#263; e-mail gdzie nast&#261;pi wys&#322;anie 
 * naszych logów z b&#322;&#281;dami
 * Sami ustalamy co chcemy tam umie&#347;ci&#263;, a klasa dopisuje dane 
 * takie jak ip, host, serwer i jeszcze par&#281; innych sami zobaczcie .
  
 */

abstract class ErrorLogiClass{

           // pliki gdzie zapisać logi
	      const USER_DIR   = "user_errors.log";
          const GLOBAL_DIR = 'global_errors.log'; 
		  // add email
	      const EMAIL      = 'example@gmail.com'; 

     static private $logi;
     static private $serwer=array();
     static private $error=null;
     
	  
	public function __construct(){
          //errorLogiClass::set_serwer($_SERVER);
	}

	 static public function data_t(){
	        return date('d-m-Y h:i:s');
	 }
	
	static public function global_ip(){
      if(filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false){
	    return  "IPV4 ".strip_tags($_SERVER['REMOTE_ADDR']);
	    }else if(filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false){
	    return  "IPV6 ".strip_tags($_SERVER['REMOTE_ADDR']);
	 }else if(filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP) !== false){
	    return  "Zakres IP Nieznany ".strip_tags($_SERVER['REMOTE_ADDR']);
	 }else{
       return "Błąd IP";	 
	 }
	 
 }
    static public function global_host(){
	  if(!empty($_SERVER['REMOTE_ADDR'])){
	     return gethostbyaddr($_SERVER['REMOTE_ADDR']);
	  }
	}
	
	static public function global_ip_server(){
	  if(!empty($_SERVER['SERVER_ADDR'])){
	     return strip_tags($_SERVER['SERVER_ADDR']);
	  }
	}
	
	static public function global_agent(){
	  if(!empty($_SERVER['HTTP_USER_AGENT'])){
	     return strip_tags($_SERVER['HTTP_USER_AGENT']);
	  }
	}
	
	static public function global_port(){
	  if(!empty($_SERVER['REMOTE_PORT'])){
	     return strip_tags($_SERVER['REMOTE_PORT']);
	  }
	}
	
	static public function global_server_name(){
	  if(!empty($_SERVER['SERVER_NAME'])){
	     return strip_tags($_SERVER['SERVER_NAME']);
	  }
	}
	
	static public function get_referer(){
	   if(!empty($_SERVER["HTTP_REFERER"])){
                return getenv('HTTP_REFERER').'--'.strip_tags($_SERVER["HTTP_REFERER"]);
            }else{
			return 'Brak';
			}				
        }	

   static public function get_ip(){
	   if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            return strip_tags($_SERVER['REMOTE_ADDR']).'--'.strip_tags($_SERVER['HTTP_CLIENT_IP']);
          }			
    }
	
   static public function protokol(){
		if(empty($protokol)){
                 return strip_tags($_SERVER['SERVER_PROTOCOL']);
                }else{
                 return  "N/A"; 
                }
		 
	}

	  ### zapisujemy logi na serwerze w podanej &#347;cie&#380;ce ###
 static  public function user_logi_save($mesage, $user, $SERVER){
	    self::$serwer = $SERVER;
    self::$logi = "|  Data:  ".self::data_t()."  |  User:  ".$user." | Wiadomosc: ".strip_tags($mesage)." | IP: ".self::global_ip()."| Global Port: ".self::global_port()." | Host: ".self::global_host()."| Agent: ".self::global_agent()."| IP Server: ".self::global_ip_server()." \n";
    error_log(self::$logi, 3, self::USER_DIR); 
 } 
   ### wysy&#322;amy logi na e-mail z loginem usera ###
 static  public function user_logi_email($mesage, $user, $SERVER, $html=false){
	self::$serwer = $SERVER;
     self::$logi = "<br>|  Logi z:  ".self::global_server_name()."<br>|  User:  ".$user."<br>|  Data:  ".self::data_t()." <br>| Wiadomosc: ".$mesage." <br>| IP: ".self::global_ip()."<br>| Global Port: ".self::global_port()." <br>| Host: ".self::global_host()."<br>| Agent: ".self::global_agent()."<br>| IP Server: ".self::global_ip_server()." <br>";
	### wiadomo&#347;&#263; html ###
	if($html === true){
	 $html='';
	 $html.='<html>';
	 $html.='<h2>Logi z '.self::global_server_name().'</h2><br>';
	 $html.='<h3>Data: '.self::data_t().'</h3>';
	 $html.='<h3>User: '.$user.'</h3>';
	 $html.='<h3>IP: '.self::global_ip().'</h3>';
	 $html.='<h3>Global Port: '.self::global_port().'</h3>';
         $html.='<h3>Host: '.self::global_host().'</h3>';
	 $html.='<h3>Agent: '.self::global_agent().'</h3>';
	 $html.='<h3>IP Server: '.self::global_ip_server().'</h3>';
	 $html.='<h4>Wiadomosc: '.strip_tags($mesage).'</h4>';
	 $html.='</html>';
		### Wysy&#322;amy w imieniu ber34@o2.pl z adresu ber34@o2.pl
 error_log($html, 1, self::EMAIL,"subject :\nContent-Type: text/html; charset=UTF-8; \nFrom: ".self::EMAIL."\n");
	}else{
 error_log(self::$logi, 1, self::EMAIL,"subject :\nContent-Type: text/html;charset=UTF-8; \nFrom: ".self::EMAIL."\n");
	}  
 }
  ### zapisujemy logi na serwerze w podanej &#347;cie&#380;ce ###
  static public function global_logi_save($mesage, $SERVER){
	   //$this->set_serwer($SERVER);
      self::$serwer = $SERVER;
 self::$logi = " | Data:  ".self::data_t()."\r\n"
             . " | Wiadomosc: ".wordwrap(strip_tags($mesage), 30)."\r\n"
             . " | IP: ".self::global_ip()."\r\n"
             . " | Global Port: ".self::global_port()."\r\n"
             . " | Host: ".self::global_host()."\r\n"
             . " | Agent: ".self::global_agent()."\r\n"
             . " | IP Server: ".self::global_ip_server()." \r\n\r\n";
	 
	 error_log(self::$logi, 3, self::GLOBAL_DIR); 
 } 
 ### wysy&#322;amy logi na e-mail  ###
 static  public function global_logi_email($mesage, $SERVER, $html=false){
	 self::$serwer = $SERVER;
    self::$logi= "<br>|  Logi z:  ".self::global_server_name()."<br>|  Data:  ".self::data_t()." <br>| Wiadomosc: ".strip_tags($mesage)." <br>| IP: ".self::global_ip()."<br>| Global Port: ".self::global_port()." <br>| Host: ".self::global_host()."<br>| Agent: ".self::global_agent()."<br>| IP Server: ".self::global_ip_server()." <br>";
	 if($html === true){
	 $html='';
	 $html.='<html>';
	 $html.='<h2>Logi z '.self::global_server_name().'</h2><br>';
	 $html.='<h3>Data: '.self::data_t().'</h3>';
	 $html.='<h3>IP: '.self::global_ip().'</h3>';
	 $html.='<h3>Global Port: '.self::global_port().'</h3>';
     $html.='<h3>Host: '.self::global_host().'</h3>';
	 $html.='<h3>Agent: '.self::global_agent().'</h3>';
	 $html.='<h3>IP Server: '.self::global_ip_server().'</h3>';
	 $html.='<h4>Wiadomosc: '.strip_tags($mesage).'</h4>';
	 $html.='</html>';
		### Wysy&#322;amy w imieniu ber34@o2.pl z adresu ber34@o2.pl
	 error_log($html, 1, self::EMAIL,"subject :lunch\nContent-Type: text/html; charset=UTF-8; Foo\nFrom: ".self::EMAIL."\n");
	}else{
	 error_log(self::$logi, 1, self::EMAIL,"subject :lunch\nContent-Type: text/html;charset=UTF-8; Foo\nFrom: ".self::EMAIL."\n");
	}   
   }
}

