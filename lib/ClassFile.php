<?php

abstract class ClassFile{

		 static public function base(){  
        $dome  = htmlentities(htmlspecialchars($_SERVER['HTTP_HOST']));
        $adres   = trim(dirname(htmlspecialchars($_SERVER['PHP_SELF']))); 
		 return $dome.$adres;
		  }
		  
		 static public function base_file(){ 
		  return (dirname(__FILE__));
		  }
		  
		 static public function base_dir(){ 
		  return (dirname(__DIR__));
		  }
 } 
