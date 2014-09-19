<?php /* Smarty version 2.6.26, created on 2012-01-10 05:14:46
         compiled from ../tpl/www/apps/info.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', '../tpl/www/apps/info.tpl', 44, false),)), $this); ?>
<div class="content">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../tpl/www/apps/appNav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div style="clear:right"></div>
<div class="mainContent">
    <form id="infoForm" action="/apps/oneApp/infoSubmit" enctype="multipart/form-data" method="post">
	    <input type="hidden" name="returnPage" value="<?php echo $this->_tpl_vars['returnPage']; ?>
" class="text"/>
        <div id="subApp" class="subsectionWraper">
					<div class="sectionHeader sectionHeaderActive">
						Application Information          
					</div>
          <input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['app']->id; ?>
" />
          <p class="formElement required ">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $this->_tpl_vars['app']->name; ?>
" class="text"/>
          </p>
          <p class="formElement required ">
            <label for="storeUrl">URL:</label>
            <input type="text" name="storeUrl" value="<?php echo $this->_tpl_vars['app']->storeUrl; ?>
" class="text"/>
          </p>
          <p class="formElement required ">
            <label for="platform">Platform:</label>
            <select name ="platform">
              <option value="1" <?php if ($this->_tpl_vars['app']->platform == 1): ?>selected<?php endif; ?>>iPhone</option>
              <option value="2" <?php if ($this->_tpl_vars['app']->platform == 2): ?>selected<?php endif; ?>>Android</option>
            </select>
          </p>
        </div>
        <div id="subServer" class="subsectionWraper">
					<div class="sectionHeader sectionHeaderActive">
						Ad Serving Settings (optional)        
					</div>
          <p class="formElement required">
            <label for="bgColor">Background Color:</label>
            <input class="hint" type="text" name="bgColor" value="<?php echo $this->_tpl_vars['app']->bgColor; ?>
" default="FFFFFF" title="FFFFFF (default)"/>
          </p>
          <p class="formElement required ">
            <label for="fgColor">Text Color:</label>
            <input class="hint" type="text" name="fgColor" value="<?php echo $this->_tpl_vars['app']->fgColor; ?>
" default="000000" title="000000 (default)"/>
          </p>					
          <p class="formElement required">
            <label for="cycleTime">Refresh Rate:</label>
						<select name="cycleTime">
						<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['cycleTime'],'output' => $this->_tpl_vars['cycleLabel'],'selected' => $this->_tpl_vars['app']->cycleTime), $this);?>

						</select>              
          </p>
          <p class="formElement required">
            <label for="transition">Transition Animation:</label>
						<select name="transition">
						<?php echo smarty_function_html_options(array('values' => $this->_tpl_vars['animationValues'],'output' => $this->_tpl_vars['animationLabels'],'selected' => $this->_tpl_vars['app']->transition), $this);?>

						</select>
          </p>
          <p class="formElement required">
            <label for="locationOn">Allow Location Access:</label>
            <a href='#' class="onOffImg onOffImg<?php if ($this->_tpl_vars['app']->locationOn == '1'): ?>On<?php else: ?>Off<?php endif; ?>"><input type="hidden" name="locationOn" value="<?php echo $this->_tpl_vars['app']->locationOn; ?>
" /></a>            
          </p>
        
        </form>

        <div id="subRemoveApp" class="subsectionWraper">
					<div class="sectionHeader sectionHeaderActive">
						Delete App    
					</div>
            <p class="formElement required">
              <label for="delete">Delete App:</label>
               <span class="button"><a id="delete" href='#'><span>Delete</span></a></span>
   			   <span style="padding-left:10px">You'll be asked one more time to confirm</span>
            </p>
        </div>        
			  <div style="text-align:center">

			  <hr/>
			  <span class="button disabled"><a href="#" id="save" class="disabled"><span>Save Changes</span></a></span>
			  <a href="<?php echo $this->_tpl_vars['returnPage']; ?>
" class="cancel">Cancel</a>

			  </div>      
  </div>
	<div id="deleteConfirm" class="hidden">
		<div class="modalTop center">
			<img src="/img/exclamation.png"> <span class="modalHeader"> Delete Confirmation</span>
		<span class="modalBody">Are you sure you want to delete this app?</span>
		<hr>
		<span class="button"><a href="#" id="confirmDelete"><span>Delete</span></a></span>
		<span class="button"><a href="#" class="simplemodal-close"><span>Cancel</span></a></span>
		</div>
		<div class="modalBottom"></div>
	</div>

</div>
<script>
var aid="<?php echo $this->_tpl_vars['app']->id; ?>
";
var returnPage ="<?php echo $this->_tpl_vars['returnPage']; ?>
";
<?php echo '
$(document).ready(function() {
	$(\'#confirmDelete\').click(function() {
		window.location = "/apps/oneApp/deleteSubmit?aid="+aid; 
	});		
	$("#infoForm").validate({		
		rules: {
				name: "required",
				storeUrl: {
					url:true
				}
			},
			messages: {
				name: "Please enter your name"
			}
		});
	$(\'input[title!=""]\').hint();
  $(\'#save\').bind("click", function(e) {
		e.preventDefault();
		if (!$(this).is(".disabled")) {
			$(".blur").each(function() {					
				$(this).val($(this).attr(\'default\'));
			});
      $("#infoForm").submit();
		}
  });
   $(\'#delete\').bind("click",
     function(e) {
			$("#deleteConfirm").modal({
				opacity:80,
				overlayCss: {backgroundColor:"#fff"}
			});
			return false;       
     });
		var activateSave = function() {
	 	 $("#save").removeClass("disabled").parent().removeClass("disabled");
	   $(".cancel").removeClass("disabled");		
		};  
		$(\'input, select\').bind("change keypress", activateSave);
	  $(\'a.onOffImg\').bind("click",
	    function(e) {
			  activateSave();
	      var val = $("input",this).val();
	      if (val==1) {
	        $("input",this).val(0);
	        $(this).removeClass("onOffImgOn").addClass("onOffImgOff");

	      } else {
	        $("input",this).val(1);
	        $(this).removeClass("onOffImgOff").addClass("onOffImgOn");      
	      }
	    });
});
'; ?>

</script>