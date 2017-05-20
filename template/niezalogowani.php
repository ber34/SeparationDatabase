<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Niezalogwani Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="http://<?php echo ClassFile::base(); ?>/template/js/jquery-1.11.1.min.js"></script>
    <script src="http://<?php echo ClassFile::base(); ?>/template/js/jquery-ui-1.10.4.js"></script>
    <link href="http://<?php echo ClassFile::base(); ?>/template/css/w3c.css"  type="text/css" rel="stylesheet"></script>
    </head>
    <body>
        <div class="strona">
     <aside class="belpunkty1">
         <?php
         echo $lang->IsLang("WITAJ");
         //print_r($point);
         ?>
         <span id="error"></span>
         <form id="form-loguj" action="index.html" method="post" class="form-inline">
	  <div style="float: left; margin: 1% 0 0 60%; padding: 5px;" class="control-group warning">
              <input style="height: 30px; width: 105px; border-radius: 5px; -moz-border-radius: 5px;" class="input-small" size="11" maxlength="40" name="email" type="text" placeholder="Login" required id="nazw" />
              <input style="height: 30px; width: 125px; border-radius: 5px; -moz-border-radius: 5px;" class="input-small" size="11" maxlength="40" name="pass" type="password" placeholder="Password" required id="inputWarning" />
              <input style="height: 30px; width: 125px; border-radius: 5px; -moz-border-radius: 5px;" class="input-small" size="11" maxlength="40" name="sesia" type="hidden" value="<?php echo $sessia->idSesion() ?>" />
              <input id="submi" class="btn btn-info" style="border-radius: 5px; -moz-border-radius: 5px; height: 25px; width: 90px;" name="" type="submit" value="<?php echo $lang->IsLang("ZALOGUJ"); ?>" />
              <div class="btn btn-mini btn-warning p_loguj" style="margin: 1% 0 0 0; width: 70%;">
              <a href="<?php echo htmlspecialchars($url->adres(6),ENT_QUOTES,'UTF-8'); ?>" title="Rejestracja" target="_self" ><span><?php echo $lang->IsLang("REJESTRACJA"); ?></span></a>&nbsp;| |&nbsp;
	      <a href="<?php echo htmlspecialchars($url->adres(7),ENT_QUOTES,'UTF-8'); ?>" title="Przywróć hasło" target="_self" ><span><?php echo $lang->IsLang("PRZYWROC_HASLO"); ?> </span></a>
            </div>
         </div>        
        </form>
      </aside>  
   <header class="tlomenu">
           <a class="lang" href="index.php?lang=1" title="Langue1" target="_self" ><img src="http://<?php echo ClassFile::base(); ?>/language/PL.png" alt="Language PL" width = "24px"; height="24px"; /><b>PL</b></a>
           <a class="lang" href="index.php?lang=2" title="Langue2" target="_self" ><img src="http://<?php echo ClassFile::base(); ?>/language/EN.png" alt="Language EN" width = "24px"; height="24px"; /><b>EN</b></a>
	<nav id="nav">
          <ol id="ol">
             <li class="li"><a href="<?php echo htmlspecialchars($url->adres(1),ENT_QUOTES,'UTF-8'); ?>" title="Start" target="_self" ><b><?php echo $lang->IsLang("START"); ?></b></a></li>
             <li class="li"><a href="<?php echo htmlspecialchars($url->adres(2),ENT_QUOTES,'UTF-8'); ?>" title="Faq" target="_self" ><b><?php echo $lang->IsLang("FQU"); ?></b></a></li>
             <li class="li"><a href="<?php echo htmlspecialchars($url->adres(3),ENT_QUOTES,'UTF-8'); ?>" title="Regulamin" target="_self" ><b><?php echo $lang->IsLang("MENU_REGULAMIN"); ?></b></a></li>
             <li class="li"><a href="<?php echo htmlspecialchars($url->adres(4),ENT_QUOTES,'UTF-8'); ?>" title="Kontakt" target="_self" ><b><?php echo $lang->IsLang("MENU_KONTAKT"); ?></b></a></li>
          </ol>
	</nav>
    </header>
    <section>             
<script type="text/javascript" src="http://<?php echo ClassFile::base(); ?>/template/js/zaloguj-user.js"></script>
         <article>
            <?php  $url->url(); ?>
         </article>  
    </section>         
      <div></div>
        <footer>
          <?php
            echo '<br>Aktualnie Zapytań do bazy danych'
     . ' to '.SeparationDatabaseQueries::get_zlicz_zapytania().' szt.';
      $stop1 = microtime(true);  
    echo ClassMicrotime::view($start1, $stop1);
	// dodajemy dane footer z template
	?>
	     <br><a class="dropdown-toggle" href="<?php echo htmlentities(addslashes($url->adres(10)),ENT_QUOTES,'UTF-8'); ?>" title="Polityka Prywatności" target="_self" >Polityka Prywatności</a>
	<?php
	  include_once(dirname(__FILE__) . '/footer.php');
     ?>
        </footer>
</div>
    </body>
</html>
