   jQuery(document).ready(function($) {

                $('#form-kontakt').submit(function(e){
				   e.preventDefault();
		$.post('pliki/kontakt-user.php', $(this).serialize(), function(dane) {
			        dane1 = $.parseJSON(dane);
                      //// alert(dane1['blad_ile']);
                        ////console.log("fgdfgdfgdfgdf");
                          var blad_ile  = dane1['blad_ile'];
                                ////alert(blad_ile);
                            if(blad_ile != "blad-zapytania"){      
                            if(blad_ile != 'blad-email'){         
                            if(blad_ile != 'blad'){     
                           if(blad_ile == 'sukces'){ 
                  $('#kontakt').html("<aside class='alert alert-success' style='width:300px;'><p>Wiadomość Wysłana !</p></aside>"); 
                    alert("Wiadomość Wysłana !");				  
		        //location.reload();
                //function loguj(){
              ////window.location.href = 'index.html';
                       //  }
                 //setTimeout(function(){windows.location.reload();},1000);
            }
                    }else{
                       $('#kontakt').html("<aside class='alert alert-error' style='width:300px;'><p>Błąd!</p></aside>");
                       //alert("Strona zablokowana !");
                   }   

                   }else{
                        $('#kontakt').html("<aside class='alert alert-error' style='width:300px;'><p>Błąd e-mail !</p></aside>");
                        alert("Błąd e-mail !");
                    }
                   }else{
                       $('#kontakt').html("<aside class='alert alert-error' style='width:300px;'><p>Błąd Zapytania mysql !</p></aside>");
                       alert("Błąd Zapytania mysql !");
                   }  
                });
		             return false;
	           });  
});
