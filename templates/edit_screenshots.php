<script type="text/javascript">
var setTitleScreen = function(sid) {
        $j.ajax({
                url: '<?=$GLOBALS['BASE_URI']?>ajax_dispatcher.php?ajaxcmd=set_title_screen&plugin_id=<?=$p->getPluginId()?>&screenshot_id='+sid,
                cache: false,
                dataType: 'html',
                success: function(data) {
                }
        });
}
var removeScreenshot = function(sid) {
        $j.ajax({
                url: '<?=$GLOBALS['BASE_URI']?>ajax_dispatcher.php?ajaxcmd=remove_screenshot&plugin_id=<?=$p->getPluginId()?>&screenshot_id='+sid,
                cache: false,
                dataType: 'html',
                success: function(data) {
			if (data != 'OK')
				alert('You do not have permission for this plugin!')
			else
				$j('#thumb_'+sid).hide();
                }
        });
}
</script>
<FORM ENCTYPE="multipart/form-data" NAME="screenshots" METHOD="POST" ACTION="?dispatch=save_screenshot">
<IMG <?=makeButton('back','src')?> onClick="location.href='?dispatch=edit_plugin&plugin_id=<?=$p->getPluginId()?>'"><BR><BR>
<INPUT TYPE="hidden" NAME="plugin_id" VALUE="<?=$p->getPluginId()?>">
<DIV CLASS="topic">Screenshot:</DIV>
<SPAN STYLE="font-size:12px; font-weight:bold;">Title: </SPAN><INPUT TYPE="text" SIZE="50" MAXLENGTH="255" NAME="titel" ID="titel" VALUE=""></SPAN><BR>
<SPAN STYLE="font-size:12px; font-weight:bold;">File: </SPAN><INPUT TYPE="file" NAME="screenfile" ID="screenfile" SIZE="45" style="width:400px"><BR><SPAN STYLE="font-size:12px;">The image should be max. <B>8 MB</B> and ends with <B>.jpg, .png und .gif</B>!</SPAN>
<DIV><INPUT TYPE="image" <?=makeButton('save','src')?>> <IMG <?=makeButton('abort','src')?> onClick="location.href='?dispatch=edit_plugin&plugin_id=<?=$p->getPluginId()?>'"></DIV>
</FORM>

<FORM ENCTYPE="multipart/form-data" NAME="screenshots_zip" METHOD="POST" ACTION="?dispatch=save_screenshot">
<INPUT TYPE="hidden" NAME="plugin_id" VALUE="<?=$p->getPluginId()?>">
<DIV CLASS="topic">ZIP-File: </DIV>
<SPAN STYLE="font-size:12px; font-weight:bold;">ZIP-File: </SPAN><INPUT TYPE="file" NAME="zipfile" ID="zipfile" SIZE="45" style="width:400px"><BR><SPAN STYLE="font-size:12px;">The ZIP-File should be max. <B>50 MB</B> and inside files should end with <B>.jpg, .png und .gif</B>!</SPAN>
<DIV><INPUT TYPE="image" <?=makeButton('save','src')?>> <IMG <?=makeButton('abort','src')?> onClick="location.href='?dispatch=edit_plugin&plugin_id=<?=$p->getPluginId()?>'"></DIV>
</FORM>
<? if (count($shots = $p->getAllScreenshots())) : ?>
<SPAN STYLE="font-size:12px; font-weight:bold;">Screenshots:</SPAN><BR>
<? foreach ($shots as $s) : ?>
  <DIV CLASS="screenshot_frame_thumb" ID="thumb_<?=$s->getScreenshotId()?>">
    <DIV CLASS="screenshot_frame_thumb_link" onMouseOver="$(this).down('.invitation').show();" onMouseOut="$(this).down('.invitation').hide();">
      <INPUT TYPE="radio" NAME="title_screen" onClick="setTitleScreen('<?=$s->getScreenshotId()?>');" <?=($s->getTitleScreen() ? 'CHECKED' : '')?> ALT="Title" TITLE="Title"><BR>
      <A HREF="<?=$GLOBALS['BASE_URI']?>?dispatch=download&file_id=<?=$s->getFileId()?>" rel="lightbox" TITLE="<?=htmlReady($s->getTitel())?>"><IMG SRC="<?=$GLOBALS['DYNAMIC_CONTENT_URL'] . '/screenshots/'?><?=$s->getFileId()?>_thumb" CLASS="screenshot_frame_thumb_img" ALT="<?=htmlReady($s->getTitel())?>" TITLE="<?=htmlReady($s->getTitel())?>"></A>
      <DIV class='invitation' style="display:none; position:absolute; bottom:4px; right:2px; width:50px; height:10px;">
        <a href="#mpdialog" name="modal" onClick="launchWindow('#mpdialog','<?=$s->getScreenshotId()?>');"><IMG SRC="images/icons/pencil.png" ALT="edit screenshot" TITLE="edit screenshot"></A>&nbsp;
        <IMG SRC="images/icons/cross.png" STYLE="cursor:pointer;" onClick="if (confirm('Do you really want delete the screenshot?')){removeScreenshot('<?=$s->getScreenshotId()?>');}" ALT="Delete Screenshot" TITLE="Delete Screenshot">
      </DIV>
    </DIV>
  </DIV>
<? endforeach ?>
<? endif ?>
<script type="text/javascript">
$j(window).load(function() {
	$j("a[rel='lightbox']").lightBox({
		txtImage: $j(this).attr('title')
	}); // Select all links that contains lightbox in the attribute rel
});
</script>
