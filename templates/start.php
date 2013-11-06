<script type="text/javascript">
// <![CDATA[
var saveComment = function (rid, cobj) {
                new Ajax.Request('ajax_dispatcher.php?ajaxcmd=insert_comment', {
                                method: 'post',
        parameters: { rid: rid, comment_value: $(cobj).value},
                                onSuccess: function(t) {
            if (t.responseText != 'OK') {
                alert(t.responseText);
            } else {
                alert('Comment saved!');
                $(cobj).value = '';
            }
            getCommentsContent(rid);
                                },
                                onFailure: function(t) {alert('Error ' + t.status + ' -- ' + t.statusText); },
                                on404: function(t) {alert('Error 404: location "' + t.statusText + '" was not found.'); }
                });
}
var getCommentsContent = function (rid) {
                new Ajax.Request('ajax_dispatcher.php?ajaxcmd=get_comments&rid='+rid, {
                                method: 'post',
                                onSuccess: function(transport) {
                                                $('comments_container_'+rid).innerHTML = transport.responseText;
                                },
                                onFailure: function(t) {alert('Error ' + t.status + ' -- ' + t.statusText); },
                                on404: function(t) {alert('Error 404: location "' + t.statusText + '" was not found.'); }
                });
}
var removeCommentsItem = function (item, rid) {
                new Ajax.Request('ajax_dispatcher.php?ajaxcmd=remove_comment_item', {
                                method: 'post',
                                parameters: 'item='+item+'&rid='+rid,
                                onSuccess: function(transport) {
                                                getCommentsContent(rid);
                                },
                                onFailure: function(t) {alert('Error ' + t.status + ' -- ' + t.statusText); },
                                on404: function(t) {alert('Error 404: location "' + t.statusText + '" was not found.'); }
                });
}
// ]]>
</script>

<!-- Wrapper Starts -->
<div id="wrapper">

    <!-- Header Starts -->
    <div id="header">
        <!-- Logo Starts -->
        <div id="logo">
            <h1><a href="?"><span>Matterhorn Marketplace</span></a></h1>
        </div>
        <!-- Logo Ends -->
        <!--<div id="claim">Der Marktplatz. Plugins und Informationen.</div>-->
        <div id="sitemap_search">
            <p>
<? if ($user = $GLOBALS['AUTH']->getAuthenticatedUser()) : ?>
                <SPAN STYLE="color:white; font-size:14px; font-weight:bold;">Registered: <?=UserManagement::getUsernameByUserId($user['user_id'])?></SPAN><SPAN STYLE="color:white; font-size:14px;">&nbsp;|&nbsp;</SPAN><A HREF="?dispatch=logout" STYLE="color:white; font-size:14px;">Logout</A> <SPAN STYLE="color:white; font-size:14px;">&nbsp;|&nbsp;</SPAN>
<? endif ?>
                <A HREF="?dispatch=impressum" STYLE="color:white; font-size:14px;">Impressum</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=impressum\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"edit\" TITLE=\"edit\"></A>" : '')?> 
                <!--|
                <A HREF="?dispatch=datenschutz" STYLE="color:white; font-size:14px;">Datenschutz</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=datenschutz\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"bearbeiten\" TITLE=\"bearbeiten\"></A>" : '')?> |
                <A HREF="?dispatch=nutzungsbedingungen" STYLE="color:white; font-size:14px;">Nutzungsbedingungen</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=nutzungsbedingungen\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"bearbeiten\" TITLE=\"bearbeiten\"></A>" : '')?>
           		-->
            </p>
        </div>
    </div>
    <!-- Header Ends -->

    <hr class="hidden" />

    <!-- Container Home Starts -->
    <div id="container">

        <!-- *** MIDDLE COLUMN STARTS *** -->
        <div id="middle" class="column">

            <div class="mblock1-padding">
                <!-- Content Starts -->
                    <div class="mblock1">
                        <div class="mblock1-bottom">
                            <div class="mblock1-headline">
                            </div>
                            <!--PageText Start-->
<!--table border=1 cellpadding=0 cellspacing=1 width="100%" style="margin:-1px -1px; -1px -1px">
    <tr>
        <td width="99%"-->
                            <div class="mblock1-wrap" style="display:inline-block;">
                                <div class="mblock1-body">
                                    <DIV ID="msg" STYLE="font-size:12px; font-weight:bold;">
<?=History::show();?>
<? if ($_SESSION['msg']) : ?>
<?=MessageBox::$_SESSION['msg_type']($_SESSION['msg'])?>
<? setMessage('info',''); ?>
<? endif ?>
                                    </DIV>
                                    <DIV ID="main_content" STYLE="margin-top:10px;">
<?=$main_content?>
                                    </DIV>

                             </div>
                             <div class="mblock1-wrap-right">
                                 &nbsp;
                             </div>
                         </div>
        <!--/td>
        <td style="width:15px; text-align:right; background:url(./images/newstyle/sip_content-bg-right.jpg) repeat-y;">
&nbsp;
        </td>
    </tr>
</table-->
                         <!--PageText End-->
                     </div>
                     <div class="mblock1-bottom-right">
                        &nbsp;
                     </div>
                 </div>
                 <div class="mblock1-right">
                     &nbsp;
                 </div>

             <!-- Content Ends -->
         </div>

            <hr class="hidden" />

        </div>
        <!-- *** MIDDLE COLUMN ENDS *** -->

        <!-- *** LEFT COLUMN STARTS *** -->
        <div id="left" class="column">

            <!-- Block Starts -->
            <div class="sblock1-wrap end">
                <div class="sblock1">
                    <div class="sblock1-bottom">
                        <h4>Marketplace</h4>
                            <ul class="level1">
                                <li><A HREF="?dispatch=welcome">Welcome</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=welcome\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"edit\" TITLE=\"edit\"></A>" : '')?></li>
                                <li><A HREF="?dispatch=marketplace">About the Marketplace</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=marketplace\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"edit\" TITLE=\"edit\"></A>" : '')?></li>
                                <!--<li><A HREF="?dispatch=faq">FAQ</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=faq\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"bearbeiten\" TITLE=\"bearbeiten\"></A>" : '')?></li> -->
                               <!-- <li><A HREF="?dispatch=links">Weiterf&uuml;hrende Links</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=links\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"bearbeiten\" TITLE=\"bearbeiten\"></A>" : '')?></li>
                                <li><A HREF="?dispatch=team">Das Team</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=team\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"bearbeiten\" TITLE=\"bearbeiten\"></A>" : '')?></li>
                            	-->
                            </ul>
                    </div>
                </div>
            </div>
            <!-- Block Ends -->

            <hr class="hidden" />
            <!-- Block Starts -->
            <div class="sblock1-wrap end">
                <div class="sblock1">
                    <div class="sblock1-bottom">
                        <h4>Category</h4>
                            <ul class="level1">
<? foreach ($GLOBALS['DBM']->getCategories() as $c) : ?>
                                <li><A HREF="?dispatch=show_category&category_id=<?=$c['category_id']?>"><?=$c['name']?> <SPAN STYLE="font-size:11px;">(<?=$c['count_cat']?>)</SPAN></A></li>
<? endforeach ?>
                            </ul>
                    </div>
                </div>
            </div>
            <!-- Block Ends -->

            <hr class="hidden" />
            <!-- Block Starts -->
            <div class="sblock1-wrap end">
                <div class="sblock1">
                    <div class="sblock1-bottom">
                        <h4>Favourites</h4>
                            <ul class="level1">
<? foreach (array(array('title'=>'New Releases','uri'=>'?dispatch=hitlist&part=latest'),array('title'=>'Most Downloads','uri'=>'?dispatch=hitlist&part=most_downloaded')/*,array('title'=>'Am meisten bewertet','uri'=>'?dispatch=hitlist&part=most_rated')*/) as $d) : ?>
                                <li><A HREF="<?=$d['uri']?>"><?=$d['title']?></A></li>
<? endforeach ?>
                            </ul>
                    </div>
                </div>
            </div>
            <!-- Block Ends -->

            <hr class="hidden" />

            <!-- Block Starts -->
            <div class="sblock1-wrap end">
                <div class="sblock1">
                    <div class="sblock1-bottom">
                        <h4>Developer Guide</h4>
                        <ul class="level1">
                            <!-- li><A HREF="?dispatch=show_plugin_generator">Plugin-Generator</A></li -->
                            <li><A HREF="?dispatch=faq">Plugin-Interface</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=faq\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"edit\" TITLE=\"edit\"></A>" : '')?></li>
                            <li><A HREF="https://opencast.jira.com/wiki/display/MH/Matterhorn+Development+Wiki" TARGET="_blank">Developer-FAQ</A></li>
                            <!--<li><A HREF="https://opencast.jira.com/wiki/display/MH/Matterhorn+Development+Wiki" TARGET="_blank">Tutorials</A> <?=($GLOBALS['PERM']->have_perm('admin') ? "<A HREF=\"?dispatch=edit_content&key=tutorials\"><IMG SRC=\"images/icons/pencil.png\" ALT=\"edit\" TITLE=\"edit\"></A>" : '')?></li>-->
                            <li><A HREF="http://opencast.org" TARGET="opencast">Opencast</A></li>
                            <li><A HREF="http://opencast.org/matterhorn" TARGET="matterhorn">Matterhorn</A></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Block Ends -->

            <hr class="hidden" />
 
        </div>
        <!-- *** LEFT COLUMN ENDS *** -->

        <!-- *** RIGHT COLUMN STARTS *** -->
        <div id="right" class="column">

<? if (!($user = $GLOBALS['AUTH']->getAuthenticatedUser())) : ?>
            <!-- Block Starts -->
            <div class="rblock1-wrap end">
                <div class="rblock1">
                    <div class="rblock1-bottom">
                        <h4>Authorization</h4>
                        <ul class="level1">
                            <li><A HREF="?dispatch=login">Login</a></li>
                            <li><A HREF="?dispatch=register">Registration</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Block Ends -->

            <hr class="hidden" />
<? endif ?>


<? if ($user = $GLOBALS['AUTH']->getAuthenticatedUser()) : ?>
            <!-- Block Starts -->
            <div class="rblock1-wrap end">
                <div class="rblock1">
                    <div class="rblock1-bottom">
                        <h4>My Marketplace</h4>
                        <ul class="level1">
                            <li><A HREF="?">Profil</A></li>
<? if ($GLOBALS['PERM']->have_perm('author')) : ?>
                            <li><A HREF="?dispatch=assi">Add Plugin</A></li>
                            <li><A HREF="?dispatch=view_own_plugins">My Plugins</A></li>
<? endif ?>
<? if ($GLOBALS['PERM']->have_perm('admin')) : ?>
                            <li><A HREF="?dispatch=user_management">User Management</A></li>
                            <li><A HREF="?dispatch=clearing">Activate Plugins (<?=count($GLOBALS['DBM']->getUnclearPlugins())?>)</A></li>
<? endif ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Block Ends -->
            <hr class="hidden" />
<? endif ?>

            <!-- Block Starts -->
            <div class="rblock1-wrap end">
                <div class="rblock1">
                    <div class="rblock1-bottom">
                        <h4>Search</h4>
                        <label for="search_txt" style="font-weight:bold;">Search:</label>
                        <INPUT TYPE="text" MAXLENGTH="255" class="jq_watermark" placeholder="Suchwort" NAME="search_txt" ID="search_txt" STYLE="font-size:14px; width:150px; margin-top:3px;"><br>
                        <label for="category_id" style="font-weight:bold;">in Category:</label>
                        <SELECT SIZE="1" NAME="category_id" ID="category_id" STYLE="width:150px;">
                            <OPTION VALUE="all">All Categories</OPTION>
<? foreach ($GLOBALS['DBM']->getCategories() as $c) : ?>
                            <OPTION VALUE="<?=$c['category_id']?>"><?=$c['name']?></OPTION>
<? endforeach ?>
                        </SELECT>&nbsp;<INPUT TYPE="image" SRC="images/icons/16/blue/search.png" ALT="finden" TITLE="finden" onClick="location.href='?dispatch=search&category_id='+$('category_id').value+'&search_txt='+$('search_txt').value;">
            <!-- /FORM -->
<script type="text/javascript">
$j('#search_txt').keypress(function(event) {
    if (event.keyCode == '13') {
                location.href='?dispatch=search&category_id='+$j('#category_id').val()+'&search_txt='+$j('#search_txt').val();
    }
});
</script>
                 <!--       <br><A HREF="?dispatch=show_extended_search" ALT="extended search" TITLE="Extended Search">Extended Search</A> -->
                    </div>
                </div>
            </div>
            <!-- Block Ends -->

            <hr class="hidden" />

            <!-- Block Starts -
            <div class="rblock1-wrap end">
                <div class="rblock1">
                    <div class="rblock1-bottom">
                        <h4>Tags</h4>
                        <?=$cloud?>
                    </div>
                </div>
            </div>
             Block Ends -->

            <hr class="hidden" />

            <!-- Block Starts 
            <div class="sblock1-wrap end">
                <div class="sblock2">
                    <div class="sblock2-bottom">
                        <a href="http://www.studip.de/index.php?id=62" target="_blank">
                            <img src="images/mitglieder_ev.png" alt="Unterstützt durch Mitglieder des Stud.IP-Vereins">
                        </a>
                    </div>
                </div>
            </div>
             Block Ends -->

            <hr class="hidden" />


        </div>
        <!-- *** RIGHT COLUMN ENDS *** -->

    </div>
    <!-- Container Home Ends -->

</div>
<!-- Wrapper Ends -->
