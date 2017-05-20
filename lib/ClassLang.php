<?php
class ClassLang{
   
   static private $lang_file ="./language/lang.ini";
   private $whatlang;
   ## nasze jezyki ##
   private $lang      = array(1=>"pl", 2=>"en", 3=>"cz", 4=>"br");
   private $lang_tabl = array();
   private $pl        = array();		 
   
    public function __construct($lang){
		## Pobieramy plik ze ścieżki aktualnego języka ##
      try{ 
        if(file_exists(self::$lang_file)){
		   $this->lang_tabl = parse_ini_file(self::$lang_file, true);
		}else{
		//   die("Brak Pliku lang.ini");
          throw new Exception("Brak Pliku lang.ini<br>");
		}   
	  ## $whatlangg, połączenie z bazzą pobranie aktualnego języka ##
	    if(!empty($lang)){
		    $this->whatlang = $this->lang[(int)$lang];	
		}else{
		   // die("Brak okreslonego jezyka<br>");
                    $this->whatlang = $this->lang[1];
               //throw new Exception("Brak okreslonego jezyka<br>");
		}	   
      } catch (Exception $b){
           SeparationDatabaseQueries::obsugaBledow($b);
      }
    }
    private function lang(){ 
        if(!empty($this->whatlang)){
		 return $this->whatlang; 
		}else{
		 return "pl"; 
		}	     
    }
	/*
    private function multi_lang($param){
	  $this->pl = $this->lang_tabl[$param];   
    } 

    private function get_multi_lang(){
        return $this->pl;
    }
	*/
	
    public function IsLang($langgg){
     try{ 
	if(!empty($langgg)){
   $this->pl = $this->lang_tabl[$this->lang()];
      if(is_array($this->pl)){
    return $this->pl[htmlspecialchars(strip_tags($langgg), ENT_QUOTES,'UTF-8')];
           }
             }else{
	 throw new Exception("Error lang brak tlumaczenia <br>");
		   }
	    }catch(Exception $e){  
          SeparationDatabaseQueries::obsugaBledow($b);
                    }
		  
	 }
	  
}
