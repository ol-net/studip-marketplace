<script type="text/javascript">
var checkInput = function() {
	if ($('username').value == '' || $('captcha_code').value == '') {
		alert("Please fill in all fields correctly!");
		return false;
	} else {
		return true;
	}
}
</script>
<CENTER>
<DIV STYLE="padding:10px; margin:50px; margin-top:110px; text-align:left; width:500px; min-width:500px; max-width:500px; border:1px solid gray;">
<FORM NAME="request" METHOD="POST" ACTION="?dispatch=reset_password" onSubmit="return checkInput();">
<TABLE BORDER=0>
  <TR>
    <TD COLSPAN=2 STYLE="font-size:14px; font-weight:bold;">Get new Password:</TD>
  </TR>
  <TR>
    <TD STYLE="width:200px; vertical-align:top; font-weight:bold;">Username: </TD>
    <TD><INPUT TYPE="text" STYLE="width:250px;" MAXLENGTH=255 NAME="username" ID="username" VALUE=""> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
  <TR>
    <TD STYLE="width:200px; vertical-align:top;">Please enter the string for verification: </TD>
    <TD><IMG ID="captcha" STYLE="border:1px solid black;" alt="CAPTCHA Image" SRC="<?=$GLOBALS['BASE_URI']?>lib/captcha/securimage_show.php">
      <object type="application/x-shockwave-flash" data="lib/captcha/securimage_play.swf?audio=lib/captcha/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" height="19" width="19">
        <param name="movie" value="lib/captcha/securimage_play.swf?audio=lib/captcha/securimage_play.php&amp;bgColor1=#fff&amp;bgColor2=#fff&amp;iconColor=#777&amp;borderWidth=1&amp;borderColor=#000" />
      </object>
      <BR><BR><a href="#" onclick="document.getElementById('captcha').src = '<?=$GLOBALS['BASE_URI']?>lib/captcha/securimage_show.php?' + Math.random(); return false">generate new captcha</a><BR><INPUT TYPE="text" SIZE=20 MAXLENGTH=255 NAME="captcha_code" ID="captcha_code" VALUE=""> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
  <TR>
    <TD COLSPAN=2>&nbsp;</TD>
  </TR>
  <TR>
    <TD COLSPAN=2 STYLE="text-align:center;"><INPUT TYPE="submit" VALUE="send" NAME="absenden"> <INPUT TYPE="button" VALUE="cancel" NAME="cancel" onClick="location.href='?';"></TD>
  </TR>
</TABLE>
<SPAN STYLE="color:red; font-weight:bold;">*</SPAN> = Required
</FORM>
</DIV>
</CENTER>
<script>
        $j(window).load(function () {
                $j('#username').focus();
        });
</script>
