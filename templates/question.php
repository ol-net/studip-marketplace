<script type="text/javascript">
var checkInput = function() {
	if ($('email').value == '' || $('question').value == '' || $('captcha_code').value == '') {
		alert("Please fill in all required fields!");
		return false;
	} else {
		return true;
	}
}
</script>

<? $user = $GLOBALS['AUTH']->getAuthenticatedUser(); ?>

<FORM NAME="question" METHOD="POST" ACTION="?dispatch=send_question" onSubmit="return checkInput();">
<INPUT TYPE="hidden" NAME="plugin_id" VALUE="<?=$plugin_id?>">
<DIV CLASS="topic">Contact the author of this plugin! <img src="images/icons/16/white/mail.png"></DIV>
<TABLE BORDER=0>
  <TR>
    <TD STYLE="width:200px; vertical-align:top; font-weight:bold;">Type of Question: </TD>
    <TD>
      <SELECT NAME="question_type" SIZE="1">
        <OPTION VALUE="Anfrage" <?=($_REQUEST['question_type'] == 'Anfage' ? 'CHECKED' : '')?>>Request</OPTION>
        <OPTION VALUE="Fehlerreport" <?=($_REQUEST['question_type'] == 'Fehlerreport' ? 'CHECKED' : '')?>>Error</OPTION>
        <OPTION VALUE="Feedback" <?=($_REQUEST['question_type'] == 'Feedback' ? 'CHECKED' : '')?>>Feedback</OPTION>
      </SELECT>
    </TD>
  </TR>
  <TR>
    <TD STYLE="width:200px; vertical-align:top; font-weight:bold;">Own E-Mail: </TD>
    <TD><INPUT TYPE="text" STYLE="width:400px;" MAXLENGTH=255 NAME="email" ID="email" VALUE="<?=($user ? $user['email'] : htmlReady($_REQUEST['email']))?>"> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
  <TR>
    <TD STYLE="width:200px; vertical-align:top; font-weight:bold;">Name: </TD>
    <TD><INPUT TYPE="text" STYLE="width:400px;" MAXLENGTH=255 NAME="users_name" ID="users_name" VALUE="<?=($user ? $user['vorname'].' '.$user['nachname'] : htmlReady($_REQUEST['users_name']))?>"></TD>
  </TR>
  <TR>
    <TD STYLE="width:200px; vertical-align:top; font-weight:bold;">Request: </TD>
    <TD><TEXTAREA STYLE="width:400px; height:200px;" NAME="question" ID="question"><?=htmlReady($_REQUEST['question'])?></TEXTAREA><SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
<? if (!$user) : ?>
  <TR>
    <TD STYLE="width:200px; vertical-align:top;">Please enter the string for verification: </TD>
    <TD><IMG ID="captcha" STYLE="border:1px solid black;" alt="CAPTCHA Image" SRC="<?=$GLOBALS['BASE_URI']?>lib/captcha/securimage_show.php">
      <object type="application/x-shockwave-flash" data="lib/captcha/securimage_play.swf?audio=lib/captcha/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" height="19" width="19">
        <param name="movie" value="lib/captcha/securimage_play.swf?audio=lib/captcha/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" />
      </object>
      <BR><BR><a href="#" onclick="document.getElementById('captcha').src = '<?=$GLOBALS['BASE_URI']?>lib/captcha/securimage_show.php?' + Math.random(); return false">generate new captcha</a><BR><INPUT TYPE="text" SIZE=20 MAXLENGTH=255 NAME="captcha_code" ID="captcha_code" VALUE=""> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
<? endif ?>
  <TR>
    <TD COLSPAN=2>&nbsp;</TD>
  </TR>
  <TR>
    <TD COLSPAN=2 STYLE="text-align:center;"><INPUT TYPE="image" <?=makeButton('send','src')?>> <IMG <?=makeButton('abort','src')?> STYLE="cursor:pointer;" onClick="location.href='?';"></TD>
  </TR>
</TABLE>
<SPAN STYLE="color:red; font-weight:bold;">*</SPAN> = Required
</FORM>
