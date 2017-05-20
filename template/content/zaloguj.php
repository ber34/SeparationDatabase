 $host  = htmlentities(htmlspecialchars($_SERVER['HTTP_HOST']));
 $uri   = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
?>
    <form id="form-loguj" action="index.html" method="post" class="form-inline">
	<div class="control-group warning">
        <input style="height: 4%; width: 22%; border-radius: 5px; -moz-border-radius: 5px;" class="input-small" size="11" maxlength="40" name="login" type="text" placeholder="Login" required id="nazw" />
        <input style="height: 4%; width: 22%; border-radius: 5px; -moz-border-radius: 5px;" class="input-small" size="11" maxlength="40" name="pass" type="password" placeholder="Password" required id="inputWarning" />
        <input id="submi" class="btn btn-info" style="border-radius: 5px; -moz-border-radius: 5px; height: 5%; width: 22%;" name="" type="submit" value="<?php echo $lang->_lang("ZALOGUJ"); ?>" />
         <div class="btn btn-mini btn-warning p_loguj" style="margin: 1% 0 0 0; width: 70%;">
        <a href="<?php echo htmlentities(addslashes($url->adres(8)),ENT_QUOTES,'UTF-8'); ?>" title="Rejestracja" target="_self" ><span><?php echo $lang->_lang("REJESTRACJA"); ?></span></a>&nbsp;| |&nbsp;
	<a href="<?php echo htmlentities(addslashes($url->adres(9)),ENT_QUOTES,'UTF-8'); ?>" title="Przywróć hasło" target="_self" ><span><?php echo $lang->_lang("PRZYWROC_HASLO"); ?> </span></a>
        </div>
        </div>        
        </form>
<script type="text/javascript" src="http://<?php echo $host.$uri; ?>/template/js/zaloguj-user.js"></script>
