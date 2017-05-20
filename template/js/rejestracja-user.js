  jQuery(document).ready(function($) {
                $('#form-rejestracja').submit(function(e){
				   e.preventDefault();
		$.post('pliki/rejestracja-user.php', $(this).serialize(), function(dane) {
			        dane1 = $.parseJSON(dane);
                      //// alert(dane1['blad_ile']);
                        ////console.log("fgdfgdfgdfgdf");
                          var blad_ile  = dane1['blad_ile'];
                                ////alert(blad_ile);
                            if(blad_ile != "min-max-login"){      
                            if(blad_ile != 'blad-email'){ 
                            if(blad_ile != 'user-istnieje'){      
                             
                            if(blad_ile != 'blad'){     
                            if(blad_ile != 'podaj-dane'){
                            if(blad_ile != 'regulamin'){
                           if(blad_ile != 'kod-capchta'){ 
                           if(blad_ile == 'sukces'){ 
                  $('#rejestracja').html("<aside class='alert alert-success' style='width:300px;'><p>Witamy !</p></aside>"); 
                    alert("Witamy !");				  
		//location.reload();
                //function loguj(){
               // window.location.assign("http://www.figureman.com");   
              ////window.location.href = 'index.html';
                       //  }
                 //setTimeout(function(){windows.location.reload();},1000);
            }
            
            }else{
                       $('#rejestracja').html("<aside class='alert alert-error' style='width:300px;'>Podaj prawidłowy kod.</aside>");
                       //alert("Podaj prawidłowy kod.");
                   } 
            }else{
                       $('#rejestracja').html("<aside class='alert alert-error' style='width:300px;'>Zakceptuj Regulamin albo zakończ rejestrację.</aside>");
                       alert("Zakceptuj Regulamin albo zakończ rejestrację.");
                   } 
            
             }else{
                       $('#rejestracja').html("<aside class='alert alert-error' style='width:300px;'><p>Podaj dane !</p></aside>");
                       //alert("Strona zablokowana !");
                   } 

                    }else{
                       $('#rejestracja').html("<aside class='alert alert-error' style='width:300px;'><p>Przepraszamy, podany rekord nie istnieje lub został zablokowany!</p></aside>");
                       //alert("Strona zablokowana !");
                   }   
                   
                    }else{
                       $('#rejestracja').html("<aside class='alert alert-error' style='width:300px;'>User już istnieje</aside>");
                       alert("User już istnieje");
                   }
                   
                   }else{
                        $('#rejestracja').html("<aside class='alert alert-error' style='width:300px;'><p>Błąd e-mail !</p></aside>");
                        alert("Błąd e-mail !");
                    }

                   }else{
                       $('#rejestracja').html("<aside class='alert alert-error' style='width:300px;'><p>Za mała ilość znaków !</p></aside>");
                       alert("Za mała ilość znaków !");
                   }  
                });
		return false;
	           });     
});
