<?php /* Smarty version 2.6.26, created on 2012-01-11 00:26:03
         compiled from ../tpl/www/apps/appNav.tpl */ ?>

<div id="sideNav">
 <ul>
  <li>
   <a href="/apps/oneApp/appNetworks?aid=<?php echo $this->_tpl_vars['app']->id; ?>
"<?php if ($this->_tpl_vars['sideNav_current'] == 'networks'): ?> class='active'<?php endif; ?>>
    <div>Ad Network Settings</div>
   </a>
  </li>
  <li>
   <a href="/apps/oneApp/backfillPriority?aid=<?php echo $this->_tpl_vars['app']->id; ?>
"<?php if ($this->_tpl_vars['sideNav_current'] == 'backFill'): ?> class='active'<?php endif; ?>>
    <div>Backfill Priority</div>
   </a>
  </li>
  <li>
   <a href="/apps/oneApp/appHouseAds?aid=<?php echo $this->_tpl_vars['app']->id; ?>
"<?php if ($this->_tpl_vars['sideNav_current'] == 'houseAds'): ?> class='active'<?php endif; ?>>
    <div>House Ads</div>
   </a>
  </li>
  <li>
   <a href="/apps/oneApp/info?aid=<?php echo $this->_tpl_vars['app']->id; ?>
"<?php if ($this->_tpl_vars['sideNav_current'] == 'info'): ?> class='active'<?php endif; ?>>
    <div>App Settings</div>
   </a>
  </li>
 </ul>

<div style="height:40px"></div>
<?php if ($this->_tpl_vars['header']): ?>
<!-- <span class="right"> <a href='#' class="sideShowHideButton">Hide</a> </span> -->
<br>    
<div class="subSectionHeader"><?php echo $this->_tpl_vars['header']; ?>
</div>
<div class="sectionBody">
<?php echo $this->_tpl_vars['message']; ?>

</div>
</div>
<?php endif; ?>
</div>
<script>
<?php echo '
$("a.sideShowHideButton").bind("click",
  function(e) {
		var parent = $(this).parent().parent();
		var body = $(this).parent().parent().find(".sectionBody")
    if ($(this).text()=="Show") {
      $(this).text("Hide");
			$(this).parent().parent().find(".sectionBody").show();
    } else {
			$(this).parent().parent().find(".sectionBody").hide();
      $(this).text("Show");
    }      
  });

'; ?>

</script>