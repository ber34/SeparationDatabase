<?php
# The MIT License
###############################
# @version  SeparationDatabaseQueries v1.0
# Copyright (c) 2016 Adam Berger
# <ber34#o2.pl>
# Copyright (c) 2016 SeparationDatabaseQueries
###############################
#Permission is hereby granted, free of charge, to any person obtaining a copy
#of this software and associated documentation files (the "Software"), to deal
#in the Software without restriction, including without limitation the rights
#to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
#copies of the Software, and to permit persons to whom the Software is
#furnished to do so, subject to the following conditions:
###############################
#The above copyright notice and this permission notice shall be included in
#all copies or substantial portions of the Software.
###############################
#THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
#IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
#FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
#AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
#LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
#OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
#THE SOFTWARE.
##############################

 trait SeparationDatabaseQueries {
  
    //public $try_error_ex  =0;
    //public $try_error_pdo =0;
    static public $licz   =0;
    
   public function set_zlicz_zapytania($li){
		   self::$licz+=$li;
		}

   static public function get_zlicz_zapytania(){
	   return self::$licz;
	 }	
   
    static private function zapytanie($sql){
         if(!empty($sql)){
	            $stmt = DatabaseClass::polacz()->prepare($sql);
				}else{
                      self::$licz-=1;              
		 throw new Exception("Błąd: Brak zapytania! <br>");	
			   }
        return $stmt;
    }
         
    static private function parametry($stmt, $value=null, $param=null){
        
          if(!empty($value) && !empty($param)){	
                  $i=0;			
              foreach($value as $ky => $val){
		if($param[$i] == "int"){
		  $stmt->bindValue($ky, $val, PDO::PARAM_INT);
		   }else if($param[$i] == "str"){
		      $stmt->bindValue($ky, $val, PDO::PARAM_STR);
			}else{
			 $stmt->bindValue($ky, $val, PDO::PARAM_STR);
			  }
			  $i++;
			    }
			}else{
                            self::$licz-=1;
			 //throw new Exception("Błąd: Brak rekordów zapytania! <br>");	
			 }   
                       $stmt->execute();
        return $stmt;
    }
         
         
   static public function selectFetch($sql, $value=null, $param=null){
	    try{
	// sprawdzamy czy podane parametry istnieją i przydzielamy
	// zrzucimy przechwycony wyjątek przez $this->try_error_ex=$b;
	// if(!empty($sql)){
	 //$stmt = DatabaseClass::polacz()->prepare($sql);
	  //  }else{
	 //throw new Exception("Błąd: Brak zapytania! <br>");	
	//	}
                $stmtt = self::zapytanie($sql);
                $stmt = self::parametry($stmtt, $value, $param);
                    if($stmt->rowCount()>0){
                       $row = $stmt->fetch(PDO::FETCH_ASSOC);
                            $stmt->closeCursor();
			self::$licz+=1;
			return $row;
                         }else{
			 // nie wykonane
			return null;
				 }
			}catch(PDOException $e){
			       // Zrzucamy wyjątek 
               /// $this->try_error_pdo=$e;	
               self::obsugaBledow($e);
		 echo $e->getMessage().'';	
            }catch(Exception $b){
                   // Zrzucamy wyjątek 			
                     //$this->try_error_ex=$b;	
                     self::obsugaBledow($b);
                     echo ''.$b->getMessage().'';			   
            }			 
    } 
	

    static public function selectFetchAll($sql, $value=null, $param=null){
	        try{
			//$this->db = new databaseClass();
	        $stmtt = self::zapytanie($sql);
                $stmt = self::parametry($stmtt, $value, $param);
                    if($stmt->rowCount()>0){
			//sprawdzić tablice $row[]
                           $row = $stmt->fetchAll(PDO::FETCH_ASSOC); 
			self::$licz+=1;
                            //$stmt->closeCursor();
			return $row;
                         }else{
			return null;	
			 }
		    }catch(PDOException $e){
			       // Zrzucamy wyjątek 
                  // $this->try_error_pdo=$e;
                  self::obsugaBledow($e);			
			     //echo $e->getMessage().''	   
            }catch(Exception $b){
                   // Zrzucamy wyjątek 			
                   //  $this->try_error_ex=$b;
                   self::obsugaBledow($b);
                    // echo ''.$b->getMessage().''			   
            }				 
    }  
	
	 static public function updateFetch($sql, $value, $param){
	        try{
	        $stmtt = self::zapytanie($sql);
                $stmt = self::parametry($stmtt, $value, $param);
                    if($stmt->rowCount()>0){
		self::$licz+=1;
		return $stmt->rowCount();
                         }else{
			return 0;
		 }
		}catch(PDOException $e){      
                    //zrzucamy błąd dalej
			//$this->try_error_pdo=$e;
                    self::obsugaBledow($e);
                    }catch(Exception $b){
                   // Zrzucamy wyjątek 			
                     //$this->try_error_ex=$b;
                     self::obsugaBledow($b);	
                    // echo ''.$b->getMessage().''			   
            }				 
    }
    
	
	static public function insertFetch($sql, $value, $param){
	        try{
	        $stmtt = self::zapytanie($sql);
                $stmt = self::parametry($stmtt, $value, $param);
                    if($stmt->rowCount()>0){
		self::$licz+=1;
		return $stmt->rowCount();
                         }else{
		return null;
						 }
		}catch(PDOException $e){      
                    //zrzucamy błąd dalej
		 /// $this->try_error_pdo=$e;
                    self::obsugaBledow($e);
        }catch(Exception $b){
                   // Zrzucamy wyjątek 			
                    // $this->try_error_ex=$b;
                    self::obsugaBledow($b);
                    // echo ''.$b->getMessage().''			   
        }				 
    }
	
	static public function deleteFetch($sql, $value, $param){
	        try{
	        $stmtt = self::zapytanie($sql);
                $stmt = self::parametry($stmtt, $value, $param);
                    if($stmt->rowCount()>0){
		self::$licz+=1;
		 return $stmt->rowCount();
                         }else{
		return null;
						 }
		}catch(PDOException $e){      
                   //zrzucamy błąd dalej
		//$this->try_error_pdo=$e;
                    self::obsugaBledow($e);
                    }catch(Exception $b){
                   // Zrzucamy wyjątek 			
                    // $this->try_error_ex=$b;	
                    // echo ''.$b->getMessage().''
                  self::obsugaBledow($b);      
            }				 
    }
    
    	### metoda obsługi błędów ### 
	static public function obsugaBledow($b=null){
	//ErrorLogiClass::set_serwer($_SERVER);
	$mesage1= "";
        $mesage1 .= ''.$b->getMessage().''
		 .$b->getFile().'<br /> LINIA'
		 .$b->getLine().'<br />';
		//$this->try_error_pdo = $try_error_pdo;
        /**
               	if(!is_null($this->try_error_pdo)){
		$mesage1 .= ''.$this->try_error_pdo->getMessage().''
			.$this->try_error_pdo->getFile().'<br /> LINIA '
			.$this->try_error_pdo->getLine().'<br />';
			}
			//$this->try_error_ex = $try_error_ex;
		if(!is_null($this->try_error_ex)){    
		$mesage1 .= ''.$this->try_error_ex->getMessage().'/n'
		 .$this->try_error_ex->getFile().'<br /> LINIA '
		 .$this->try_error_ex->getLine().'<br />'; 
			}
         */
	       echo $mesage1;
		## Zapis naszych logów  i błędów ##
				// pozyskanie superglobalnych		
	ErrorLogiClass::global_logi_save($mesage1, $_SERVER);
	
	}
}
