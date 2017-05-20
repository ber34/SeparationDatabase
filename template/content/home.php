<?php 
   if(isset($_GET['lang'])){
     $_SESSION['lang'] = $_GET['lang'];
     $lang = new  ClassLang($_SESSION['lang']);
    }else{  
     $lang = new  ClassLang(@$_SESSION['lang']);   
    }
?>
 	
  <article class="content_napisy">   
	  <h1><a href="http://<?php echo ClassFile::base(); ?>">
	  Separation Data Base & Separation Traid & Separation Interface<small><br> Demko Skryptu PHP</small></a></h1>   
<h5>
<?php echo $lang->IsLang("WITAJ_W_FIGURE_MAN"); ?>
</h5>
  </article>
