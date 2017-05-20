<?php
  //  extends PDO jeśli konstruktor 

abstract class DatabaseClass implements InterfDb{

        static private $engine   = 'mysql';
        static private $host     = 'localhost'; // 127.0.0.1
	    static private $port     = 3306;
        static private $database = 'separationdbq';
        static private $user     = 'root';
        static private $pass     = 'root';
        static private $dns;
        static private $DbPrefix = 'prk_';
	    static private $pdo;
/*		  
  public function __construct(){
    }
*/
static private function polacz_tu(){ 
   try{ 
     if(!empty(self::$database)){ 
       self::$dns = self::$engine.':host='.self::$host.';port='.self::$port.';'
       . 'dbname='.self::$database.';';
       self::$pdo = new PDO(self::$dns, self::$user, self::$pass, array(
            PDO::ATTR_PERSISTENT => true, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'',
            PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));  // bufor 1-50MB		
	self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return self::$pdo;
        }	
     }catch(PDOException $e){
         $mesage1= "";
     echo   $mesage1 .= '<br>Połączenie Pdo nie mogło zostać utworzone.<br />'
        .$e->getMessage().'<br />'
        .$e->getCode().'<br />'
        .$e->getFile().'<br />'
        //.$e->getTrace().'<br />'
        .$e->getLine().'<br />'
        .$e->getPrevious();   
		  ## Zapis naszych logów ##	
	$html=true;
	ErrorLogiClass::global_logi_email($mesage1, $_SERVER, $html);
	ErrorLogiClass::global_logi_save($mesage1, $_SERVER);     
     }		
    }
 
static public function polacz(){  
       return self::polacz_tu();
    }
static public function dbprefix(){  
        return self::$DbPrefix;
    }     
}

