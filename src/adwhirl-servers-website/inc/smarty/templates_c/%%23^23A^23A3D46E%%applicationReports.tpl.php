<?php /* Smarty version 2.6.26, created on 2012-01-10 05:15:01
         compiled from ../tpl/www/reports/applicationReports.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', '../tpl/www/reports/applicationReports.tpl', 17, false),array('modifier', 'count', '../tpl/www/reports/applicationReports.tpl', 22, false),)), $this); ?>

<div class="content">

	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../tpl/www/reports/reportNav.tpl", 'smarty_include_vars' => array('header' => 'Common Questions','message' => "<ul>
			<li class='bullet1'>Why am I not seeing all my networks on the graph?<br><div style='height:3px'> </div>
		In order to keep the graph clean we are only showing the top networks in terms of impressions.
		The other networks are grouped under 'Others'</li>
			<li class='bullet2'>How can I get access to reporting for all my networks?<br/><div style='height:3px'> </div>
		Just download the CSV file, all the information is detailed in that file</li>
			<li class='bullet3'>	Why are my impression numbers different in AdWhirl than they are in my network reporting page?<br><div style='height:3px'> </div>See <a style='display:inline;background-color:#fff' href='http://helpcenter.adwhirl.com/content/reporting'>Help Content</a></li></ul>")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<span class="reportSelect">
	<label  for="name">Select:</label>
	<select id="dateOptions">
   <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['dateOptions'],'selected' => $this->_tpl_vars['selectedDate']), $this);?>

 	</select>
</span><span class="reportSelect" style="border-width:0 0 0 2px;border-style:solid;border-color:#ccc">
	<label for="name">Select:</label>
	<select id="appOptions" class="appOptions">
		<?php if (count($this->_tpl_vars['appsOption']) > 0): ?>
   		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['appsOption'],'selected' => $this->_tpl_vars['selectedApp']), $this);?>

		<?php else: ?>
			<option>Select an application</option>
		<?php endif; ?>
 	</select>
  <!-- <select id="appOptionsWithDeletes" class="appOptions" <?php if (! $this->_tpl_vars['showDelete']): ?> class="hidden"<?php endif; ?>>
    <?php if (count($this->_tpl_vars['appsOption']) > 0): ?>
      <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['appsOptionWithDeletes'],'selected' => $this->_tpl_vars['selectedApp']), $this);?>

    <?php else: ?>
      <option>Select an application</option>
    <?php endif; ?>
  </select> -->

</span>
<div class="metricTypeSelected" style="height:38px;width:791px">
Impression
</div>
<div class="left">
  <div id="chartDiv"/>
</div>
<span><input id="showDeleted" type="checkbox" <?php if ($this->_tpl_vars['showDeleted']): ?>checked="checked"<?php endif; ?>/> Show Deleted Apps</span>
<div id="table">

</div>
<a id="exportToCSV" href="<?php echo $this->_tpl_vars['csvURL']; ?>
<?php echo $this->_tpl_vars['queryParam']; ?>
">Download CSV Report</a>


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
    var opts = $("#appOptions > option[label$=\'deleted\']");
    if (!showDeleted) {
      $("#appOptions > option[label$=\'-- deleted\']").hide();
      $.get(\'/reports/applicationReports/notShowDeleted\');      
    } else {
      $.get(\'/reports/applicationReports/showDeleted\');
      $("#appOptions > option[label$=\'-- deleted\']").show();
    }
  }
  function update(queryParam) {		
    chart.setDataURL(dataURL + queryParam);
    $("#exportToCSV").attr(\'href\',csvURL + queryParam);
    $.get(htmlTableURL+queryParam, function(data){
      $("#table").html(data);
     });
  }  
  // Necessary to display the correct chart - see www.fusioncharts.com/docs/Contents/JSDataURL.html
  function FC_Rendered(DOMId){
    //This method is called whenever a FusionCharts chart is loaded.
    //Check if it\'s the required chart using ID
    if (DOMId=="SalesByCat"){
      update(orgQueryParam+\'&aid=\'+$("#appOptions").val());
    }
  } 
  $(document).ready(function() {
    showDeleted(isShowDeleted);
    $("#showDeleted").change(function() {
      showDeleted($(this).is(":checked"));
    });

    chart = new FusionCharts("/FusionCharts/MSLine.swf", "SalesByCat", "790", "400", "0", "1");
    // Start it out blank so it doesn\'t get the wrong data
    chart.setDataXML("<chart></chart>");
    chart.render("chartDiv");
    $("#dateOptions").change(function() {
      update($("#dateOptions").val()+"&aid="+$("#appOptions").val());
    });
    $("#appOptions").change(function() {
      update($("#dateOptions").val()+"&aid="+$("#appOptions").val());			            
      $("#subtitle").text($(\'#appOptions :selected\').text())
    });
  });  
'; ?>

</script>


</div>