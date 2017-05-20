<?php
  $host  = htmlentities(htmlspecialchars($_SERVER['HTTP_HOST']));
   $uri = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
?>


 <section  class="rejest_yello1 well well-large">
 <span id="rejestracja"></span>
    <form id="form-rejestracja" class="form-horizontal" action="" method="post">
         <fieldset>
	   <legend style="color: red;">Rejestracja:</legend>
         <div class="control-group">
    <label class="control-label" for="inputEmail">Login: </label>
    <div class="controls">
    <input name="register_login" maxlength="40" type="text" placeholder="Login" required id="nazw">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputEmail">Email: </label>
    <div class="controls">
    <input name="register_email" maxlength="40" type="email" placeholder="E-mail" required id="inputEmail">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password: </label>
    <div class="controls">
    <input name="register_pass" maxlength="40" type="password" id="inputPassword" placeholder="Password" required>
    </div>
    </div>
     <div class="control-group">
    <label class="control-label" for="inputCapchta"><?php //echo $captcha->wyswietl_captcha_public(); ?></label>
    <div class="controls">
    <input name="key_id1" maxlength="40" type="hidden" value="<?php echo session_id(); ?>">
    </div>
    </div>        
    <div class="control-group">
    <div class="controls">
        <label class="checkbox">
    <input type="checkbox" name="regulamin" value="regulamin"> Akceptuje Regulamin </label> 
    <button type="submit" class="btn btn-primary">Rejestruj</button>
    </div>
    </div></fieldset>
    </form>
 </section>
<script type="text/javascript" src="http://<?php echo $host.$uri; ?>/template/js/rejestracja-user.js"></script>
