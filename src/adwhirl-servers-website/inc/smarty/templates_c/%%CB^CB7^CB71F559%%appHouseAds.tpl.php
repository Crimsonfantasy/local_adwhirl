<?php /* Smarty version 2.6.26, created on 2012-01-10 05:44:52
         compiled from ../tpl/www/apps/appHouseAds.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '../tpl/www/apps/appHouseAds.tpl', 14, false),array('function', 'html_options', '../tpl/www/apps/appHouseAds.tpl', 31, false),)), $this); ?>
<div class="content">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../tpl/www/apps/appNav.tpl", 'smarty_include_vars' => array('header' => 'Manage House Ads','message' => "Share: Desired split of house ad impressions within your house ads' share of traffic")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<div style="clear:right"></div>
	<div class="mainContent">		
	  <div class="sectionHeader sectionHeaderActive">
	  <span class="left">House Ads</span><span class="right">House Ads <?php if ($this->_tpl_vars['houseAdShare']): ?>has Traffic Share of <?php echo $this->_tpl_vars['houseAdShare']; ?>
%<?php else: ?>are turned <span class="bold">OFF</span><?php endif; ?></span>
    <div style="clear: both;"></div>
	  </div>

	

	<span class="button <?php if (count($this->_tpl_vars['houseAds']) == 0): ?>disabled<?php endif; ?>">
		<a id="removeApp" href='#'><span>Remove From App</span></a>
	</span>
	<span class="divider">|</span>
	<span class="plusContainer">
			<a id="addHouseAd" href='#'><span class="plus">Add House Ad</span></a>
	</span>

  <div class="anchor">
     <div id="addHouseAdTip" class="appInfoTip">
       <div class="appInfoTipTop genericTipTop" style="margin-left:15px">         
			  <span class="plusContainer"><a href='#'><span class="plus">Add House Ad</span></a></span>
         <hr/>
         <div style="float:left;width:323px;"> 
       				<p class="formElement required network">
         				<label style="width:105px" for="name">Account House Ad:</label>
								<select id="chooseAd" name="houseAd">
	 						   <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['addableHouseAds']), $this);?>

	    				 	</select>
       				</p>         
		       		<span class="button">
								<a id="createNew" href="/houseAds/ad/create?aid=<?php echo $this->_tpl_vars['app']->id; ?>
" class="setKeyButton button">
									<span>Create New</span>
								</a>
							</span>
         			<div style="text-align:center;padding-top:7px">
		       		<span class="button disabled">
								<a href='#' id="addToApp" class="disabled setKeyButton button">
									<span>Add To App</span>
								</a>
							</span>

		       		<a href="#" class="cancel">Cancel</a>
							</div>
        </div>


				<div class="clear"></div>
       </div>

			 <div class="appInfoTipBottom genericTipBottom" style="margin-left:15px">&nbsp;
			 </div>         
      </div>
    </div>
		<div class="clear" style="height:3px"></div>

<form id="houseAdsForm" action="/apps/oneApp/houseAdsSubmit" method="post">
      <input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['app']->id; ?>
" />
	<table>
	 <thead>
	  <tr>
		 <th><input type="checkbox"/></th>
	   <th style="padding-left:5px;width:200px">
	    Ad Name
	   </th>
			<th style="width:200px"></th>
	   <th class="center" style="width:100px">
	    Goal
	   </th>
	   <th class="center" style="width:100px">
	    Type
	   </th>
	   <th style="width:100px">
	    Share
	   </th>
	  </tr>
	 </thead>
	 <tbody>

	<?php $_from = $this->_tpl_vars['houseAds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['houseAd']):
?>
	  <tr>
		 <td>
			<input type="hidden" name="ahids[]" value="<?php echo $this->_tpl_vars['houseAd']->ahid; ?>
"/>
			<input type="checkbox" name="del_ahids[]" value="<?php echo $this->_tpl_vars['houseAd']->ahid; ?>
"/>
		 </td>
	   <td style="padding-left:5px">
			<span><a href="/houseAds/ad/edit?cid=<?php echo $this->_tpl_vars['houseAd']->id; ?>
"><?php if ($this->_tpl_vars['houseAd']->name): ?><?php echo $this->_tpl_vars['houseAd']->name; ?>
<?php else: ?>Untitled<?php endif; ?></a></span>			
	   </td>
		<td class="center" >
			<span class="editDetail">		
  	    <a href="#" class="previewLink"><img text="<?php echo $this->_tpl_vars['houseAd']->description; ?>
" type="<?php echo $this->_tpl_vars['houseAd']->type; ?>
" imageLink="<?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
" style="vertical-align:middle" class="previewLink" src="/img/picture.png"/>&nbsp;&nbsp;Preview</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="/reports/houseAdReports?cid=<?php echo $this->_tpl_vars['houseAd']->id; ?>
"><img class="editLink" style="vertical-align:middle" src="/img/report.png"/>&nbsp;&nbsp;Reporting</a>
			<input type="hidden" name="cids[]" value="<?php echo $this->_tpl_vars['houseAd']->id; ?>
" />
			</span>
		</td>
	   <td class="center" >
			<?php $this->assign('linkType', ($this->_tpl_vars['houseAd']->linkType)); ?>
		 <?php echo $this->_tpl_vars['linkLabels'][$this->_tpl_vars['linkType']]; ?>

	   </td>
	   <td class="center" >			
	    <?php $this->assign('type', ($this->_tpl_vars['houseAd']->type)); ?>
	    <?php echo $this->_tpl_vars['houseAdTypes'][$this->_tpl_vars['type']]; ?>

	   </td>
	   <td>
		  <input name="weight[]" class="traffic" type="text" maxlength="3" value="<?php echo $this->_tpl_vars['houseAd']->weight; ?>
"/> &nbsp; %	   
	   </td>

	  </tr>
	<?php endforeach; endif; unset($_from); ?>

	 </tbody>
	</table>
</form>
<div class="sumBar">
	<?php if (count($this->_tpl_vars['houseAds']) > 0): ?>
		<span style="color:#aaa">Total Share:</span> <span style="padding-right: 50px;color:#000" id="sum">100 %</span>
	<?php endif; ?>
</div>
<div style="text-align:center;margin-top:50px">
  
<hr/>
<span class="button disabled"><a href="#" id="save" class="disabled"><span>Save Changes</span></a></span>
<a id="cancel" href="" class="cancel disabled">Cancel</a>
</div>

</div>
<div id="popup" style="left: 135px; top: 344.933px; display:none;">
    <div style="position: relative; top: 7px; left: 161px;" class="popUpArrow" id="popup-arrow"></div>
    <div class="largePopUpTop bottom">
        <div class="largePopUpBottom bottom" style="height:98px">
            <div class="popupTitle titleRed">Ad Preview</div>
            <a href="#"><img src="/img/small_close.gif" id="popup-close" style="float: right;"></a>
            <div id="popup-body" style="clear: both;" class="body">
                <div id="iphone_preview_ad">                            
                  <div id="iphone_banner_preview" >
                    <img class="left_image ad_image_preview" src=""/>              
                    <p id="iphone_preview_ad_text" class="ad_text"><?php echo $this->_tpl_vars['houseAd']->description; ?>
</p>                        
                  </div>              
            	</div>
            </div>
        </div>
    </div>
</div>
<script>
var aid = '<?php echo $this->_tpl_vars['app']->id; ?>
';
// var shortCircuitAddHouseAd = false;

var shortCircuitAddHouseAd = <?php if (count($this->_tpl_vars['addableHouseAds']) <= 1): ?>true<?php else: ?>false<?php endif; ?>;

<?php echo '
$(document).ready(function() {
	if ($.browser.msie) {
		$("#addHouseAdTip").addClass(\'ie\');
	}
	$("tr").hover(
		function() {
			$(this).addClass("highlighted");
			$(".editDetail",this).show();
		}, function() {
  		$(".editDetail",this).hide();
			$(this).removeClass("highlighted");
		})
	
	$(\'input.traffic\').change(traffic.setSum);
	traffic.setSumOnly();
	
	$("a.disabled, a.cancel").click(function(event) {
    event.preventDefault();
  });
  $("body").click(function (e) {		
		$("#popup").hide();
	});	
	$("#popup").click(function (e) {
		e.stopPropagation();
	});		  
  $("#popup-close").click(function(e) {
    e.preventDefault();
    $("#popup").hide();
  });
	
  $(".previewLink").click(function(e) {
    e.stopPropagation();
    e.preventDefault();
    var $img = $(this).parents("td").find("img.previewLink");
    var pos = $img.offset();
    $(".ad_image_preview").attr("src",$img.attr(\'imageLink\'));
    if ($img.attr(\'type\')=="1") {
      $(".ad_image_preview").removeClass(\'left_image\')
    } else {
      $(".ad_image_preview").addClass(\'left_image\')
    }
    $(".ad_text").text($img.attr(\'text\'));
    
    $("#popup").css({ top: (pos.top+15), left: (pos.left-168) }).show(); 
  });
	$(\'#save\').bind("click",
    function(e) {
			errorObj.reset();
			if (traffic.getSum()!=100) {
				errorObj.attacheError($("#sum"),\'Total allocation must be 100%.\');
			}
			$(".traffic").each(function() {
				if (!$(this).attr(\'disabled\')) {
					var val = $(this).val();
					errorObj.testPercent(val,$(this));
				}
			});
			if (!errorObj.hasError()) $("#houseAdsForm").submit();									
    });
	$(".cancel").click(function (event) {
		if (!$(this).is(".disabled")) {
			$(".appInfoTip").hide();
		}
  });
	$("#chooseAd").change(function() {
		if ($(this).val()==\'\') $("#addToApp").addClass("disabled").parent().addClass("disabled");
		else $("#addToApp").removeClass("disabled").parent().removeClass("disabled");
	});
	$("#addToApp").click(function() {
		$.ajax({
	    type:\'POST\',
	    url:"/houseAds/ad/addApp",
	    data:{\'cid\':$("#chooseAd").val(),\'apps[]\':aid},
	    success: function (e) {
				$(".appInfoTip").hide();
				window.location = window.location;
	    },
	    error: function(e) {
	      alert("saveError:"+e);
	    }
	  });
	});
	$("#addHouseAd").click(function() {
		if (shortCircuitAddHouseAd) {
			window.location=$("#createNew").attr(\'href\');			
		} else {
			$(".appInfoTip").show();
		}
		
	});
	$("#removeApp").click(function() {
		
		$("#houseAdsForm").attr(\'action\',\'/houseAds/houseAds/deleteAppHouseAds?aid=\'+aid).submit();
	});
	$(\'input:checkbox\').change(function () {
		if ($(this).parent().is("th")) {
	   $(\'td > input:checkbox\').attr(\'checked\',$(this).attr(\'checked\'));
		} else {
	    $(\'th > input:checkbox\').removeAttr(\'checked\');
		}
	});
});
</script>
'; ?>