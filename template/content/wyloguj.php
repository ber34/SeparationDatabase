require_once( 'lib/Autoload.php');

          $sessia        = new UserSesionClass();
          $UpdateSesion  = new DbUpdateSesion();
		  
      // print_r($sessia->getSesion('IsUser'));
	   
	  if($UpdateSesion->update_wyloguj_sesion_user($sessia->getSesion('IsUser')) > 0){
	  
	     if($_SESSION['IsUser'] == $sessia->getSesion('IsUser') && !empty($sessia->getSesion('IsUser'))){
               unset($_SESSION);
               }
	    ?>
	  <script>
	     ///alert("Zostałeś Wylogowany");
             window.location.href="index.html";
	   //// window.location.reload();
	  </script>
	  <aside style="margin: 1% 0 0 1%; width: 99.9%; height: 650px; background-image: url('template/images/bg01.jpg');">
             <div style="text-align:center; padding: 200px;"><b style="color: red; font-size:28px;"><?php echo $lang->_lang("DO_ZOBACZENIA"); ?></b></div>   
      </aside>
	<?php
   }else{
   ?>
    <script>
                var param ='<?php echo "Blad wylogowania"; ?>'; 
                      alert(param);
    </script>
<?php
        }
