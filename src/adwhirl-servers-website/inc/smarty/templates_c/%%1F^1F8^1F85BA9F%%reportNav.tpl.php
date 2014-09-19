<?php /* Smarty version 2.6.26, created on 2012-01-10 05:15:01
         compiled from ../tpl/www/reports/reportNav.tpl */ ?>


<div id="sideNav">
 <ul>
  <li>
   <a href="/reports/applicationReports"<?php if ($this->_tpl_vars['sideNav_current'] == 'applications'): ?> class='active'<?php endif; ?>>
    <div>Application</div>
   </a>
  </li>
  <li>
   <a href="/reports/houseAdReports"<?php if ($this->_tpl_vars['sideNav_current'] == 'houseAds'): ?> class='active'<?php endif; ?>>
    <div>House Ads</div>
   </a>
  </li>
  <!-- <li>
   <a href="/reports/networkReports"<?php if ($this->_tpl_vars['sideNav_current'] == 'networks'): ?> class='active'<?php endif; ?>>
    <div>Networks</div>
   </a>
  </li> -->
 </ul>
<div style="height:40px"></div>
<?php if ($this->_tpl_vars['header']): ?>
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