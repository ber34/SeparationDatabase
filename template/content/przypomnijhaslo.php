<?php
   require_once(dirname(__DIR__) . '/lib-traid/SeparationDatabaseQueries.php');
   require_once(dirname(__DIR__) . '/lib-traid/ValidateClass.php');
   require_once(dirname(__DIR__) . '/lib-traid/SuperError.php');
   require_once(dirname(__DIR__) . '/lib-interface/InterfDb.php');
   require_once(dirname(__DIR__) . '/db-conect/DatabaseClass.php');
   require_once(dirname(__DIR__) . '/db-insert/DbInsertSesion.php');
   require_once(dirname(__DIR__) . '/lib/UserSesionClass.php');
   require_once(dirname(__DIR__) . '/db-select/DbSelectSesion.php');
   require_once(dirname(__DIR__) . '/db-update/DbUpdateSesion.php');
   require_once(dirname(__DIR__) . '/lib/ErrorLogiClass.php');
   require_once(dirname(__DIR__) . '/db-select/DbSelectUser.php');
   require_once(dirname(__DIR__) . '/db-insert/DbInsertUser.php');


     $host  = htmlspecialchars($_SERVER['HTTP_HOST']);
     $uri   = htmlspecialchars(dirname($_SERVER['PHP_SELF']));
     $plik  = basename('przypomnijhaslo.html');
     
if(array_key_exists('key_id123', $_POST)){
     //if($captcha->wyswietl_captcha_private()){
         if(session_id() === $_POST['key_id123']){
      $dd = $forgot_password->forgot($_POST['forgot_email'], $_POST['keyhaslo']);
       if($dd == "1" && !empty($dd)){
            echo "<aside class='alert alert-success' style='width:300px;'>Sukces E-mail został wysłany</aside>"; 
           ///  header("refresh:1;url=http://$host$uri/$plik");
            /* 
             * $_POST['keyhaslo']; haslo link
             * $_POST['forgot_email']; email do wyslania
             *  wyslij e-mail z linkiem
             */
            echo $forgot_password->mail_link($_POST['forgot_email'], $_POST['keyhaslo']);
             header("refresh:3;url=http://$host$uri/$plik");
        }else if($dd == "2" && !empty($dd)){
           echo "<aside class='alert alert-error' style='width:300px;'><p>Niepoprawny E-mail !</p></aside>";
        }else if($dd == "32" && !empty($dd)){
           echo "<aside class='alert alert-error' style='width:300px;'><p>Za mała ilość znaków w E-mail ! </p></aside>";
        }else if($dd == "42" && !empty($dd)){
            echo "<aside class='alert alert-error' style='width:300px;'><p>Za mała ilość znaków !</p></aside>";
        }else{
            echo "<aside class='alert alert-error' style='width:300px;'>Błąd</aside>";
        }
        
      session_regenerate_id();
      session_destroy();
      
       }else{
            header("refresh:1;url=http://$host$uri/$plik");
            }
        //unset($_POST);    
            //}else{  
               echo "<aside class='alert alert-error' style='width:300px;'>Podaj prawidłowy kod.</aside>";
               /// header("refresh:1;url=http://$host$uri/$plik");
            // }
          
}else{
    $key1 = mt_rand(10000,99999);
    $keyhaslo = mt_rand(10000000,99999999); /* haslo dla zmiany */
?>
   <section class="przyp_yello1 well well-large">
    <form class="form-horizontal" action="przypomnijhaslo.html" method="post">
        <fieldset>
	 <legend style="color: red;">Przypomnij hasło:</legend>
    <div class="control-group">
    <label class="control-label" for="inputEmail">E-mail :</label>
    <div class="controls">
    <input name="forgot_email" type="email" maxlength="40" placeholder="E-mail wyslij" title="aa@op.pl" required id="inputEmail">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputCapchta"><?php // echo $captcha->wyswietl_captcha_public(); ?></label>
    <div class="controls">
    <input name="keyhaslo" type="hidden" value="<?php echo $keyhaslo; ?>">
    <input name="key_id123" type="hidden" value="<?php echo session_id(); ?>">
    </div>
    </div>      
    <div class="control-group">
    <div class="controls">
    <button type="submit" class="btn btn-primary">Wyślij</button>
    </div>
    </div></fieldset>
    </form>
   </section>
<?php
}
