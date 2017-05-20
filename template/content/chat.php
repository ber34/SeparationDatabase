<?php
//require_once(dirname(__FILE__) . '/lib/Autoload.php');
 $sessia = new UserSesionClass(); 
 $user   = new DbSelectUser();
 
?>

   <script>
  $( document ).ready(function() {
  $('.message').hide();
  $('.username_chat').hide();
  $('#add').click(function(){ 
  $('.message').show();
  $('.username_chat').show();
  $('.chatGo').hide();
         });	 
  });
  
   setInterval(function(){ 
			$( "#chat" ).load( "pliki/load-select-chat.php" );
          }, 5000);
		    

  function loadPost(){
         $("#newconntent").click(function(){
             document.newconntentform.newconntent.value = ''; // wyczysc textera
           });
                tresc     = $( 'textarea[name="newconntent"]' ).val();
                user      = $( 'input[name="user"]' ).val();
   $.ajax({
        type: "POST",
            url: 'pliki/baza-czat.php',
        data: { tresc: tresc, user: user}, // Dane przesyłane $_POST
                        cache: false,
       beforeSend:function(){
	   $('#loading').show().html('<img src="loading.gif" alt="Loading..." />');;
       },    
       success: function(data){
          $('#loading').hide();
     //document.newconntentform.newconntent.value = '';   // wyczysc textera  
       },
    complete : function(data) {
     $('#chat').append('<b>User:</b> '+user+' -> '+tresc+'<br>');
	 $("#chat").scrollTop(9999);
            $('#loading').hide();      
    },            
     error: function(data) {
    alert("ERROR: "+data)
  }        
             });
    return false;
             
           }
  </script>
  <?php
 
  // Jest sesja
        if(!empty($sessia->getSesion('IsUser'))){
		   // przypisujemy id user otrzymany z sesji
		$userName = $user->select_user_all($sessia->getSesion('IsUser'));
		?>
  <section class="">                           
        <div id="divchat">
		<div id="loading"></div>
          <h2 class="username-chat-name"><b>Chat  Ber</b></h2>
<span class="chatGo"><b>Rozpocznij czat</b> <input class="zzzz" type="button" id="add" value="+"></span>		  
<?php
     // $user = rand(1,99999);
	 // Username
	   $user = $userName['name'];
?>	  
       <h3 class="username_chat"><?php echo 'User: '.$user; ?></h3>  
              <div id="chat"></div>
        <div class="message">          
         <form id="newconntentform" name="newconntentform" action="#" method="post"  onsubmit="return false;">
           <div class="leftChat">
         <textarea rows="8" class="textera" name="newconntent" id="newconntent" ></textarea>
          <input type="hidden" id="user_chat" name="user" value="<?php echo $user; ?>" />    
            </div>
            <div class="right">
              <input type="submit" name="submit" onclick="loadPost()" id="newconntentsubmitchat" value="wyślij" />
            </div> 
         </form>   
        </div> 
    </div> </section>
	<?php
	// Koniec z sesji
	}
