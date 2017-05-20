<?php

trait ValidateClass {

        private $post; // czy jest sesja
	private $post1; // czy jest sesja
	private $czysc;
	private $kont_cz;
	private $email;
			 
          public function __construct(){		  
			 // parent::__construct();
          }
          
	public function work(){
	    return get_class($this);
	   } 
	
 public function ValidateMinMax($param, $min, $max) {
     // ValidateMinMax('Adam', 4, 40)  
     if(strlen($param) >= $min && strlen($param) <= $max){
                   return 1;
                 }else{
                   return 0;
                }
           }    
 public function GetValidatePost($post){
    if(!empty($post)){
        $kont_cz = trim(strip_tags($post));
         return $this->czysc_($kont_cz); 
	   }else{
	 return 0; // nie poprawne dane post
		 }
            }

   public function GetValidateSesje($sesja){
	if(!empty($sesja)){
            return $this->czysc_($sesja); 
               }else{
             return 0; // nie poprawne dane sesja  
                    }
            }
			
    public function GetValidateAdresEmail($adres_email){
	if(!empty($adres_email)){
             return $this->ValidateEmail(trim(strip_tags($adres_email))); 
               }else{
             return null; // nie poprawne dane email  
                   }
            }
			
     public function GetValidateTrescEmail($tresc_email){
                /* troche bez sensu do poprawy */
		 // wprowadzić filtr dla adresu e-mail 
	if(!empty($tresc_email)){
           return $this->ValidateTresc($tresc_email); 
               }else{
           return 0; // nie poprawne dane email  
                 }
            }	
			
      public function ValidateEmail($email){
	if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){	
              return 1;
		    }else{
		      return null;
		    }
		}	
			
      private function ValidateTresc($email){  
	 return trim(strip_tags($email,"<br><p>"), ENT_QUOTES,'UTF-8');
            //return strip_tags(self::$email);		  
		}
			
      private function czysc_($ses){				   
if(preg_match('/^[a-zA-ZąęćłńóśźżĄĆĘŁŃÓŚŹŻ0-9\@\$\_\-\:\.\,\*\&\%\#\!\"\;\ \/]+$/', $ses, $ses1)){
	return $ses1;
          }else{
        return 0; 
          }
            }
			
public function ValidateSesion($sesion){
                       /* troche bez sensu do poprawy */
           $this->sesion = trim(strip_tags($sesion));
          return htmlentities($this->sesion, ENT_QUOTES,'UTF-8');         
            } 
 }             
