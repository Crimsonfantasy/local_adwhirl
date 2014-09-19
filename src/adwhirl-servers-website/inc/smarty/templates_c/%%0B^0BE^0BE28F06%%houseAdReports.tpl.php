<?php /* Smarty version 2.6.26, created on 2011-12-17 22:16:30
         compiled from ../tpl/www/reports/houseAdReports.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', '../tpl/www/reports/houseAdReports.tpl', 16, false),array('modifier', 'count', '../tpl/www/reports/houseAdReports.tpl', 21, false),)), $this); ?>

<div class="content">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../tpl/www/reports/reportNav.tpl", 'smarty_include_vars' => array('header' => 'Common Questions','message' => "<ul>
			<li class='bullet1'>Why am I not seeing all my applications on the graph?<br><div style='height:3px'> </div>
		In order to keep the graph clean we are only showing the top applications in terms of impressions.
		The other applications are grouped under 'Others'</li>
			<li class='bullet2'>How can I get access to reporting for all my applications?<br/><div style='height:3px'> </div>
		Just download the CSV file, all the information is detailed in that file</li>
			<li class='bullet3'>	Why are my impression numbers different in AdWhirl than they are in my application reporting page?<br><div style='height:3px'> </div>See <a style='display:inline;background-color:#fff' href='http://helpcenter.adwhirl.com/content/reporting'>Help Content</a></li></ul>")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div>
<span class="reportSelect houseAdReportSelect">
	<label  for="name">Select:</label>
	<select id="dateOptions">
   <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['dateOptions'],'selected' => $this->_tpl_vars['selectedDate']), $this);?>

 	</select>
</span><span class="reportSelect houseAdReportSelect" style="border-width:0 0 0 2px;border-style:solid;border-color:#ccc">
	<label for="name">Select:</label>
	<select id="houseAdOptions" style="width:170px">
		<?php if (count($this->_tpl_vars['houseAdOptions']) > 0): ?>
   		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['houseAdOptions'],'selected' => $this->_tpl_vars['selectedHouseAd']), $this);?>

		<?php else: ?>
			<option>Select a house ad</option>
		<?php endif; ?>
   
 	</select>
</span><span class="reportSelect houseAdReportSelect" style="border-width:0 0 0 2px;border-style:solid;border-color:#ccc">
	<label for="name">Select:</label>
	<select id="catOptions">
   <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['catOptions'],'selected' => $this->_tpl_vars['selectedCat']), $this);?>

 	</select>
</span>
<?php $_from = $this->_tpl_vars['metricTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['metricType']):
?><span class="<?php if ($this->_tpl_vars['metricTypeSelected'] == $this->_tpl_vars['metricType']): ?>metricTypeSelected<?php endif; ?> metricType"><?php echo $this->_tpl_vars['metricType']; ?>
</span>
<?php endforeach; endif; unset($_from); ?>
<div class="left">
  <div id="chartDiv"/>
</div>
<span><input id="showDeleted" type="checkbox" <?php if ($this->_tpl_vars['showDeleted']): ?>checked="checked"<?php endif; ?>/> Show Deleted Ads</span>
<div id="table">

</div>
<a id="exportToCSV" href="<?php echo $this->_tpl_vars['csvURL']; ?>
<?php echo $this->_tpl_vars['queryParam']; ?>
">Download CSV Report</a>

</div>
<script type="text/javascript">
	var csvURL = "<?php echo $this->_tpl_vars['csvURL']; ?>
";
	var dataURL = "<?php echo $this->_tpl_vars['dataURL']; ?>
";
	var htmlTableURL = "<?php echo $this->_tpl_vars['htmlTableURL']; ?>
";  
  var chart;
  var orgQueryParam = '<?php echo $this->_tpl_vars['queryParam']; ?>
';
  var isShowDeleted = <?php if ($this->_tpl_vars['showDeleted']): ?>true<?php else: ?>false<?php endif; ?>;
<?php echo '
  function showDeleted(showDeleted) {
    var opts = $("#houseAdOptions > option[label$=\'deleted\']");
    if (!showDeleted) {
      $("#houseAdOptions > option[label$=\'-- deleted\']").hide();
      $.get(\'/reports/houseAdReports/notShowDeleted\');      
    } else {
      $.get(\'/reports/houseAdReports/showDeleted\');
      $("#houseAdOptions > option[label$=\'-- deleted\']").show();
    }
  }

  function update(queryParam) {		
    chart.setDataURL(dataURL + queryParam);
    $("#exportToCSV").attr(\'href\',csvURL + queryParam);
    $.get(htmlTableURL+queryParam, function(data){
      $("#table").html(data);
     });
		// $.get(dataURL + queryParam, function(data) {
		// 	console.log(data);
		// });    
  }  
  $(document).ready(function() {
    $("#showDeleted").change(function() {
      showDeleted($(this).is(":checked"));
    });
    showDeleted(isShowDeleted);    
		$("select").change(function() {
			update($("#dateOptions").val()+"&cid="+$("#houseAdOptions").val()+"&selectedCat="+$("#catOptions").val()+"&metricTypeSelected="+$(".metricTypeSelected").text());
			$("#subtitle").text($(\'#houseAdOptions :selected\').text())			
		});
		$(".metricType").click(function() {
			$(".metricTypeSelected").removeClass("metricTypeSelected");
			$(this).addClass("metricTypeSelected");
			update($("#dateOptions").val()+"&cid="+$("#houseAdOptions").val()+"&selectedCat="+$("#catOptions").val()+"&metricTypeSelected="+$(".metricTypeSelected").text());
		});
    chart = new FusionCharts("/FusionCharts/MSLine.swf", "SalesByCat", "790", "400", "0", "1");
  	chart.setDataURL(dataURL+orgQueryParam);
  	chart.render("chartDiv");
    $.get(htmlTableURL+orgQueryParam, function(data){
      $("#table").html(data);
     });
  });  
'; ?>

</script>


</div>
