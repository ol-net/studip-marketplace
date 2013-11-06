<script type="text/javascript">
var checkInput = function() {
	if ($('rezension').value == '') {
		alert('Please fill in all required fields!');
		return false;
	} else {
		return true;
	}
}
</script>
<IMG <?=makeButton('back','src')?> onClick="location.href='?dispatch=edit_plugin&plugin_id=<?=$p->getPluginId()?>'">
<DIV CLASS="topic" STYLE="margin-top:10px;">Create Review Text about the Plugin</DIV>
<FORM NAME="rezension" METHOD="POST" ACTION="?dispatch=save_rezension" onSubmit="return checkInput();">
<INPUT TYPE="hidden" NAME="plugin_id" VALUE="<?=$p->getPluginId()?>">
<TABLE BORDER=0 WIDTH="100%">
  <TR>
    <TD STYLE="width:150px; vertical-align:top; font-weight:bold; font-size:12px;">Plugin-Name: </TD>
    <TD><SPAN STYLE="font-size:12px; font-weight:bold;"><?=$p->getName()?></SPAN></TD>
  </TR>
  <TR>
    <TD COLSPAN=2>&nbsp;</TD>
  </TR>
  <TR>
    <TD COLSPAN=2 STYLE="width:150px; vertical-align:top; font-weight:bold; font-size:12px;">Review:</TD>
  </TR>
  <TR>
    <TD COLSPAN=2><TEXTAREA NAME="rezension_txt" ID="rezension_txt" class="mceAdvanced" STYLE="height:400px; width:100%;"><?=$p->getRezension()?></TEXTAREA></TD>
  </TR>
  <TR>
    <TD COLSPAN=2>&nbsp;</TD>
  </TR>
  <TR>
    <TD COLSPAN=2 STYLE="text-align:center;"><INPUT TYPE="image" <?=makeButton('save','src')?>> <IMG <?=makeButton('abort','src')?> onClick="location.href='?dispatch=edit_plugin&plugin_id=<?=$p->getPluginId()?>'"></TD>
  </TR>
</TABLE>
</FORM>
