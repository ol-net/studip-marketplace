<div style="margin-left: 1.5em;">
<? if ($GLOBALS['PERM']->have_perm('admin')) : ?>
  <a class="click_me" href="#" onClick="location.href='?dispatch=user_management';">
    <div>
      <span class="click_head"> User Management </span>
      <p>Editing user details and add new users.</p>
    </div>
  </a>
  <a class="click_me" href="#" onClick="location.href='?dispatch=clearing';">
    <div>
      <span class="click_head"> Activate Plugins </span>
      <p>Activate new plugins for the public.</p>
    </div>
  </a>
<? endif ?>
<? if ($GLOBALS['PERM']->have_perm('author') && !$GLOBALS['PERM']->have_perm('admin')) : ?>
  <a class="click_me" href="#" onClick="location.href='?dispatch=assi';">
    <div>
      <span class="click_head"> Add Plugins </span>
      <p>Enter a new plugin. It will be checked then and approved by an administrator.</p>
    </div>
  </a>
  <a class="click_me" href="#" onClick="location.href='?dispatch=view_own_plugins';">
    <div>
      <span class="click_head"> My Plugins </span>
      <p>Here you will get an overview of the plugins you entered.</p>
    </div>
  </a>
<? endif ?>
  <a class="click_me" href="#" onClick="location.href='?dispatch=show_profile';">
    <div>
      <span class="click_head"> My Profil </span>
      <p>Here you can edit your personal user data.</p>
    </div>
  </a>
  <a class="click_me" href="#" onClick="location.href='?dispatch=faq';">
    <div>
      <span class="click_head"> FAQ </span>
      <p>If you have questions about the use of the plugin market generally or to plugins? Here you will surely find an answer.</p>
    </div>
  </a>
</div>
<!--
<? if ($GLOBALS['PERM']->have_perm('admin')) : ?>
<DIV CLASS="logged_in_big_button" onClick="location.href='?dispatch=user_management';">
  <DIV CLASS="logged_in_big_button_label">Benutzerverwaltung</DIV>
</DIV>
<DIV CLASS="logged_in_big_button" onClick="location.href='?dispatch=clearing';">
  <DIV CLASS="logged_in_big_button_label">Plugins freischalten</DIV>
</DIV>
<? endif ?>
<? if ($GLOBALS['PERM']->have_perm('author') && !$GLOBALS['PERM']->have_perm('admin')) : ?>
<DIV CLASS="logged_in_big_button" onClick="location.href='?dispatch=assi';">
  <DIV CLASS="logged_in_big_button_label">Plugin eintragen</DIV>
</DIV>
<DIV CLASS="logged_in_big_button" onClick="location.href='?dispatch=view_own_plugins';">
  <DIV CLASS="logged_in_big_button_label">Meine Plugins</DIV>
</DIV>
<? endif ?>
<DIV CLASS="logged_in_big_button" onClick="location.href='?dispatch=show_profile';">
  <DIV CLASS="logged_in_big_button_label">Mein Profil</DIV>
</DIV>
<DIV CLASS="logged_in_big_button" onClick="location.href='?dispatch=faq';">
  <DIV CLASS="logged_in_big_button_label">FAQ</DIV>
</DIV>

-->
