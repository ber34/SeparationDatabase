<?php
// session_start();
error_reporting(E_ALL);

 if(isset($_GET['lang'])){
     $_SESSION['lang'] = $_GET['lang'];
     $lang = new  ClassLang($_SESSION['lang']);
    }else{  
     $lang = new  ClassLang(@$_SESSION['lang']);   
    }

     $host  = htmlspecialchars($_SERVER['HTTP_HOST']);
     $uri   = htmlspecialchars(dirname($_SERVER['PHP_SELF']));
      ///$keys = mt_rand(100000,999999);      
    $html='';
    $html.='<section class="przyp_yello1 well well-large">';
	 $html.='<span id="kontakt"></span>';
    $html.='<form id="form-kontakt"  class="form-horizontal" action="kontakt.html" method="post">';
    $html.='<fieldset>';
    $html.='<legend style="color: red;">'. $lang->IsLang("KONTAKT_FILDSET").'</legend>';
    $html.='<div class="control-group">';
    $html.='<label class="control-label" for="inputEmail">Email</label>';
    $html.='<div class="controls">';
    $html.='<input type="email" name="user_kontakt_email" id="inputEmail" placeholder="Email" required>';
    $html.='</div></div>';
    $html.='<div class="control-group">';
    $html.='<label class="control-label" for="inputPassword">'. $lang->IsLang("KONTAKT_MESAGE").'</label>';
    $html.='<div class="controls">';
    $html.='<textarea rows="3" name="wiadomosc"></textarea>';
    $html.='</div></div>';
    $html.='<div class="control-group">';
    $html.='<label class="control-label" for="inputPassword">"capchta"</label>'; //'.$captcha->wyswietl_captcha_public().'
     /// echo $captcha->wyswietl_captcha_set();
     //echo $_SESSION['captcha'];
    $html.='<div class="controls">';
   /// $html.='<input name="key_123" type="text" placeholder="podaj kod" required id="kod">';
    //$html.='<img src="pliki/capchta.php">';
    
    ///$html.='<input name="key_321" type="hidden" value="'.$keys.'">';
    //$html.='<input name="key_id" type="hidden" value="'.session_id().'">';
    $html.='</div></div>';  
    $html.='<div class="control-group">';
    $html.='<div class="controls">';
    $html.='<button type="submit" class="btn btn-warning">'. $lang->IsLang("KONTAKT_BUTON_WYSLIJ").'</button>';
    $html.='</div></div>';
    $html.='</fieldset>';
    $html.='</form>';
    $html.='</section>';
           echo $html;
		   
		   ?>
		   
		   <script type="text/javascript" src="http://<?php echo $host.$uri; ?>/template/js/kontakt-user.js"></script>
