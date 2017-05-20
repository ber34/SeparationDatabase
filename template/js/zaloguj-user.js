  jQuery(document).ready(function($) {
       
              $('#form-loguj').submit(function(e){
                    //alert('dsaaaa');
                      e.preventDefault();
                  // event.defaultPrevented();  
     $.post('pliki/zaloguj-user.php', $(this).serialize(), function(dane) {
			var dane1 = $.parseJSON(dane);
                        //"email-haslo"
                        // "email"
                        //alert(dane1['Login']);
                    
                    if(dane1['Login'] === 'sukces'){
                       //alert(dane1['Login']); 
                     window.location.reload();
                     window.location.href="index.html";
                       $('#error').html("Sukces").addClass('error');
                    }else if(dane1['Login'] === false){
                       // alert(dane1['Login']);
                      $('#error').html("Błąd Logowania").addClass('error');  
                    }
                    
                    if(dane1['Login'] === "email"){
                       //alert(dane1['Login']); 
                       $('#error').html("Podaj prawidłowy email").addClass('error');
                    }
                    
                    if(dane1['Login'] === "email-haslo"){
                       //alert(dane1['Login']);
                       $('#error').html("Podaj prawidłowy email lub Hasło").addClass('error');
                    }       
               });
              
            });
});
