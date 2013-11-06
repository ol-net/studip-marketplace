<DIV CLASS="topic">URL:</DIV>
<?=$GLOBALS['BASE_URI']?>?dispatch=download&file_id=<?=$s->getFileId()?><BR>
<DIV CLASS="topic">Filename:</DIV>
<?=htmlReady($f->getFilename())?>
<FORM ENCTYPE="multipart/form-data" NAME="screenshot_refresh" METHOD="POST" ACTION="?dispatch=save_screenshot">
<INPUT TYPE="hidden" NAME="plugin_id" VALUE="<?=$p->getPluginId()?>">
<INPUT TYPE="hidden" NAME="screenshot_id" VALUE="<?=$s->getScreenshotId()?>">
<INPUT TYPE="hidden" NAME="file_id" VALUE="<?=$s->getFileId()?>">
<INPUT TYPE="hidden" NAME="title_screen" VALUE="<?=($s->getTitleScreen() ? 'yes' : 'no')?>">
<DIV CLASS="topic">Add Title:</DIV>
<INPUT TYPE="text" SIZE="50" MAXLENGTH="255" NAME="titel" ID="titel" VALUE="<?=htmlReady($s->getTitel())?>">
<DIV CLASS="topic">Reload Screenshot:</DIV>
<INPUT TYPE="file" NAME="screenfile" ID="screenfile" SIZE="45" style="width:400px"><BR><SPAN STYLE="font-size:12px;">The Image should be max. <B>8 MB</B> and end with <B>.jpg, .png und .gif</B>!</SPAN>
<DIV><INPUT TYPE="image" <?=makeButton('save','src')?>></DIV>
</FORM>

