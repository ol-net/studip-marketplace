<script type="text/javascript">
var checkUsername = function() {
        $j.ajax({
                url: '<?=$GLOBALS['BASE_URI']?>ajax_dispatcher.php?ajaxcmd=check_username&username='+$('username').value,
                cache: false,
                async: false,
                dataType: 'text',
                success: function(data) {
                        $('check_username').value = data;
                }
        });
}

var checkInput = function() {
	checkUsername();
        if ($('check_username').value != 'OK' && $('old_username').value != $('username').value) {
                alert('The user name already exists, please choose another!');
                return false;
        }
        if ($('username').value == '' || $('vorname').value == '' || $('nachname').value == '' || $('email').value == '' || $('passwort').value != $('passwort2').value) {
                alert('Please fill in all required fields!');
                return false;
        } else {
                return true;
        }
}
</script>
<FORM NAME="user_edit" METHOD="POST" ACTION="?dispatch=save_user" onSubmit="return checkInput();">
<INPUT TYPE="hidden" NAME="user_id" VALUE="<?=$u->getUserId()?>">
<INPUT TYPE="hidden" ID="check_username" VALUE="ERROR">
<INPUT TYPE="hidden" ID="old_username" VALUE="<?=htmlReady($u->getUsername())?>">
<TABLE BORDER=0>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Last Login: </TD><TD><SPAN STYLE="font-size:12px;"><? $s = Session::getSessionParams($u->getUserId()); echo ($s[0]['lastlogin'] ? date('d.m.Y H:i',$s[0]['lastlogin']) : 'nie'); ?></SPAN></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Username: </TD><TD><INPUT TYPE="text" ID="username" NAME="username" SIZE="30" VALUE="<?=htmlReady($u->getUsername())?>"> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Salutation: </TD><TD>
      <SELECT NAME="salutation" SIZE=1>
<? foreach (array('Herr','Frau') as $p) : ?>
        <OPTION VALUE="<?=$p?>" <?=($u->getSalutation() == $p ? 'SELECTED' : '')?>><?=$p?></OPTION>
<? endforeach ?>
      </SELECT>
    </TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Firstname: </TD><TD><INPUT TYPE="text" ID="vorname" NAME="vorname" SIZE="30" VALUE="<?=htmlReady($u->getVorname())?>"> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Lastname: </TD><TD><INPUT TYPE="text" ID="nachname" NAME="nachname" SIZE="30" VALUE="<?=htmlReady($u->getNachname())?>"> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">E-Mail: </TD><TD><INPUT TYPE="text" ID="email" NAME="email" SIZE="30" VALUE="<?=htmlReady($u->getEmail())?>"> <SPAN STYLE="color:red; font-weight:bold;">*</SPAN></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Passwort: </TD><TD><INPUT TYPE="password" ID="passwort" NAME="passwort" SIZE="30" VALUE=""></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Passwort (repeat): </TD><TD><INPUT TYPE="password" ID="passwort2" NAME="passwort2" SIZE="30" VALUE=""></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Perm: </TD><TD>
      <SELECT NAME="perm" SIZE=1>
<? foreach (array('user','author','admin') as $p) : ?>
        <OPTION VALUE="<?=$p?>" <?=($u->getPerm() == $p ? 'SELECTED' : '')?>><?=$p?></OPTION>
<? endforeach ?>
      </SELECT>
    </TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold;">Locked: </TD><TD><INPUT TYPE="checkbox" NAME="locked" VALUE="yes" <?=($u->getLocked() ? 'CHECKED' : '')?>></TD>
  </TR>
  <TR>
    <TD STYLE="font-size:12px; font-weight:bold; vertical-align:top;">Profil-Image: </TD><TD><?=Avatar::getAvatar($u->getUserId())->getImageTag(Avatar::MEDIUM)?></TD>
  </TR>
  <TR>
    <TD COLSPAN="2" STYLE=text-align:center;"><INPUT TYPE="image" <?=makeButton('save','src')?>> <IMG <?=makeButton('abort','src')?> onClick="location.href='?dispatch=user_management';"></TD>
  </TR>
</TABLE>
</FORM>
<SPAN STYLE="color:red; font-weight:bold;">*</SPAN> = Required
