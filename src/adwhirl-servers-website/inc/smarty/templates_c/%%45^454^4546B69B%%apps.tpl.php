<?php /* Smarty version 2.6.26, created on 2012-01-11 00:26:00
         compiled from ../tpl/www/apps/apps.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '../tpl/www/apps/apps.tpl', 15, false),array('function', 'cycle', '../tpl/www/apps/apps.tpl', 57, false),)), $this); ?>
<div class="content">  
  <?php if ($this->_tpl_vars['message']): ?>
	<div id="messageBox">
    <span id="messageBoxLeft">
      <img id="messageBoxIcon" src="/img/information.png" style="vertical-align:middle;padding-right:5px"><span id="messageBoxText"><?php echo $this->_tpl_vars['message']; ?>
</span>
    </span>
    <span id="messageBoxRight">
      <a id="messageBoxClose" href="#" style="vertical-align:baseline"><img style="vertical-align:middle" src="/img/message_box_close.png"></a>               
    </span>
  </div>
  <?php endif; ?>
  <div class="clear"> </div>
  
<span class="plusContainer"><a href="/apps/oneApp/create"><span class="plus">Add Application</span></a></span>
<?php if (count($this->_tpl_vars['apps']) == 0): ?>
<div id="topBanner">&nbsp;</div>
<div id="addBody">
  <div>AdWhirl allows you to maximize your revenue by adding multiple ad networks to your application.</div>
  <div id="add_application">
    <div>
      <p class="header2">Add an application</p>
	  <p class="text w3">You will be taken to a new page and led through the process of adding your app to our system. You will have to download the AdWhirl SDK to start showing ads.</p>
    </div>
    <a href="/apps/oneApp/create">Add an Application &raquo;</a>
  </div>
  <div id="add_adwhirl_sdk">
    <div>
      <p class="header2">Add the AdWhirl SDK</p>
	  <p class="text w3">You can either add Ad Networks while adding your app to the system or after, remember to get your site and/or pub ID when you do. You will have to add the app to your account to start showing ads.</p>
    </div>
    <a href="/home/dev">Download the AdWhirl SDK &raquo;</a>
  </div>
</div>
<div id="bottomBanner">&nbsp;</div>

<?php else: ?>
<div class="clear" style="height:3px"></div>
<table>
 <thead>
  <tr>
   <th style="width:200px">
    App Name  
    
   </th>
	 <th>
	 </th>
   <th class="center" width="100px">
    Platform
   </th>
   <th class="center" width="100px">
    Active Networks
   </th>
  </tr>
 </thead>
 <tbody>
 <?php $_from = $this->_tpl_vars['apps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app']):
?>
  <?php echo smarty_function_cycle(array('values' => "odd,even",'assign' => 'class'), $this);?>

  <tr>
   <td class="<?php echo $this->_tpl_vars['class']; ?>
">
    <a href="/apps/oneApp/appNetworks?aid=<?php echo $this->_tpl_vars['app']->id; ?>
"><?php if ($this->_tpl_vars['app']->name): ?><?php echo $this->_tpl_vars['app']->name; ?>
<?php else: ?>Untitled<?php endif; ?></a>
	 </td>
	 <td>
  	<span class="reportDetail">
    <a href='#' class="editLink"></a>
<a href="/reports/applicationReports/?aid=<?php echo $this->_tpl_vars['app']->id; ?>
"> <img class="editLink" style="vertical-align:middle" src="/img/report.png"/> Reporting</a> 
      </span>	
   </td>
   <td class="<?php echo $this->_tpl_vars['class']; ?>
 center">
    <?php if ($this->_tpl_vars['app']->platform == '1'): ?>iPhone<?php elseif ($this->_tpl_vars['app']->platform == '2'): ?>Android<?php else: ?>Unknown<?php endif; ?>
   </td>
   <td class="<?php echo $this->_tpl_vars['class']; ?>
 center">
     <span><?php echo $this->_tpl_vars['app']->getActiveNetworksCount(); ?>
<span>
   </td>
  </tr>

 <?php endforeach; endif; unset($_from); ?>
	
  </tbody>
</table>
<div style="width:100%;padding:0px" class="sumBar">&nbsp;</div>
<?php endif; ?>

</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => '../tpl/www/common/pagination.tpl', 'smarty_include_vars' => array('items_per_page' => $this->_tpl_vars['itemsPerPage'],'total' => $this->_tpl_vars['total'],'current_offset' => $this->_tpl_vars['current_offset'],'base' => '/apps/apps','params' => '')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script>
var msg_id = "<?php echo $this->_tpl_vars['msg_id']; ?>
";
<?php echo '


	$(document).ready(function() {
	  $(".count").each(function() {
	    if ($(this).text()==\'0\') {
	      $(this).css("color:#c00");
	    }
	  });
	  
    $("#messageBoxClose").click(function(e) {
      e.preventDefault();
      $("#messageBox").hide();
      $.get(\'/home/account/setPref?key=\'+msg_id+\'&value=true\');
      
    });	  

	  
		$("tr").hover(
			function() {
				$(this).addClass("highlighted");
				$(".reportDetail",this).show();
			}, function() {
	  		$(".reportDetail",this).hide();
				$(this).removeClass("highlighted");
			});
		
	});
</script>
'; ?>