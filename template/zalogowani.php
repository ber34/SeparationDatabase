<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		 <script src="http://<?php echo ClassFile::base(); ?>/template/js/jquery-1.11.1.min.js"></script>
    <script src="http://<?php echo ClassFile::base(); ?>/template/js/jquery-ui-1.10.4.js"></script>
	<link href="http://<?php echo ClassFile::base(); ?>/template/css/w3c.css"  type="text/css" rel="stylesheet"></script>
	<link href="http://<?php echo ClassFile::base(); ?>/template/css/my_chat.css"  type="text/css" rel="stylesheet"></script>
	<?php 

        $SelectUser   = new DbSelectUser();
        $UpdateSesion = new DbUpdateSesion();
		
       
        
      
		
	?>
    </head>
    <body>
        <div class="strona">
            <div id="bb"></div>
     <aside class="belpunkty">
         <?php
         echo $lang->IsLang("WITAJ");
         ?>
      </aside>
 <section>    
   <header class="tlomenu">
		  <a class="lang" href="index.php?lang=1" title="Langue1" target="_self" ><img src="http://<?php echo ClassFile::base(); ?>/language/PL.png" alt="Language PL" width = "24px"; height="24px"; /><b>PL</b></a>
         <a class="lang" href="index.php?lang=2" title="Langue2" target="_self" ><img src="http://<?php echo ClassFile::base(); ?>/language/EN.png" alt="Language EN" width = "24px"; height="24px"; /><b>EN</b></a>
	<nav id="nav">
          <ol id="ol">
             <li class="li"><a href="<?php echo htmlspecialchars($url->adres(8),ENT_QUOTES,'UTF-8'); ?>" title="Start" target="_self" ><b><?php echo $lang->IsLang("MENU_CHAT"); ?></b></a></li>
             <li class="li"><a href="<?php echo htmlspecialchars($url->adres(2),ENT_QUOTES,'UTF-8'); ?>" title="Faq" target="_self" ><b><?php echo $lang->IsLang("MENU_PRACA"); ?></b></a></li>
             <li class="li"><a href="<?php echo htmlspecialchars($url->adres(5),ENT_QUOTES,'UTF-8'); ?>" title="Kontakt" target="_self" ><b><?php echo $lang->IsLang("MENU_WYLOGUJ"); ?></b></a></li>
          </ol>
	</nav>
    </header>
</section> 
    <article class="section2">
	<?php
	// Jest sesja brana z index.php
 if(!empty($sessia->getSesion('IsUser'))){
         $url->url(); 
        }
	?>    
	</article>
      <div></div>
        <footer>
          <?php
            echo '<br>Aktualnie Zapytań do bazy danych'
     . ' to '.SeparationDatabaseQueries::get_zlicz_zapytania().' szt.';
            $stop1 = microtime(true);  
    echo ClassMicrotime::view($start1, $stop1);
     ?>
	 <br><a class="dropdown-toggle" href="<?php echo htmlentities(addslashes($url->adres(10)),ENT_QUOTES,'UTF-8'); ?>" title="Polityka Prywatności" target="_self" >Polityka Prywatności</a>
	<?php
	  include_once(dirname(__FILE__) . '/footer.php');
     ?>
        </footer>
        
</div>
    </body>
</html>
