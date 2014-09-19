<?php /* Smarty version 2.6.26, created on 2012-01-11 00:26:03
         compiled from ../tpl/www/apps/appNetworks.tpl */ ?>
<div class="content">
<?php if (! $this->_tpl_vars['backfill']): ?> 
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../tpl/www/apps/appNav.tpl", 'smarty_include_vars' => array('header' => 'How to Activate Networks','message' => '<ul><li class="bullet1"> Click on the key and provide the required keys to activate the explicitly supported networks</li><li class="bullet2">Use the "+ Add Custom Events" button at the top of the table to add another network to this app. Be sure to provide a name and function name.</li></ul>')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php else: ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../tpl/www/apps/appNav.tpl", 'smarty_include_vars' => array('header' => 'Backfill Priority Explained','message' => "Order in which AdWhirl will request an ad from the other ad networks if the share-based 1st request fails. Active House Ads are also used for unfilled inventory.")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
<div style="clear:right"></div>
<div class="mainContent">
  <div class="sectionHeader sectionHeaderActive">
  Networks

  </div>
<?php if (! $this->_tpl_vars['backfill']): ?>
	<div class="clear" style="height:3px"></div>  
  <span class="plusContainer"><a id="addGeneric" href="#"><span class="plus">Add Custom Event</span></a></span>
  <div class="anchor">
     <div id="addGenericTip" class="appInfoTip">
       <div class="appInfoTipTop genericTipTop">
         
			  <span class="plusContainer"><a href='#'><span class="plus">Add Custom Event</span></a></span>

         <hr/>
         <div style="float:left;width:323px;">
	     		<?php $_from = $this->_tpl_vars['networkTypes']['17']['keyinfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['keynames'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['keynames']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['keyname']):
        $this->_foreach['keynames']['iteration']++;
?>
      				<p class="formElement required network">
        				<label style="width:90px" for="key[]"><?php echo $this->_tpl_vars['keyname']; ?>
:</label>
        				<input tyle="width:196px" class="key" type="text" name="key[]" value="<?php echo $this->_tpl_vars['networks'][$this->_tpl_vars['17']]->keys[$this->_tpl_vars['index']]; ?>
" class="text"/>
								<?php if (($this->_foreach['keynames']['iteration'] == $this->_foreach['keynames']['total'])): ?><a href="#" class="helpTip"><img class="helpTip" src="/img/help.png" title="This is the exact name of the method you would like AdWhirl to call when it makes a call through Generic Notification. Learn more from our FAQ page." alt="This is the exact name of the method you would like AdWhirl to call when it makes a call through Generic Notification. Learn more from our FAQ page."/></a><?php endif; ?>
      				</p>         
      			<?php endforeach; endif; unset($_from); ?> 
         			<div style="text-align:center;padding-top:7px">
		       		<span class="button disabled">
								<a href="#" val_nid="" val_type="17" class="disabled setKeyButton button">								
									<span>Add Event</span>
								</a>
							</span>
		       		<a href="#" class="cancel">Cancel</a>
							</div>
        </div>


				<div class="clear"></div>
       </div>

			 <div class="appInfoTipBottom genericTipBottom">&nbsp;
			 </div>         
      </div>
    </div>
		<div class="clear" style="height:3px"></div>
<?php endif; ?>

<form id="networkForm" action="/apps/oneApp/appNetworksSubmit" method="post">
<input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['app']->id; ?>
" />
<table id="dataTable">
 <thead>
  <tr>
	  <?php if (! $this->_tpl_vars['backfill']): ?>
   <th style="width:200px">
    <a href="#">Ad Network</a>
   </th>
   <th style="width:200px">
   </th> 
   <th class="center" style="width:160px">
    <a href="#">Ad Serving</a>
   </th>
	 <th></th>
   <th class="center" style="width:160px">
    <a href="#">% of Traffic</a>
   </th>
   <?php else: ?>
   <th>
    <a href="#">Ad Network</a>
   </th>
   <th style="width:160px">
    <a href="#">Priority</a>
   </th>
   <?php endif; ?>
  </tr>
 </thead>

 <tbody>

 <?php $_from = $this->_tpl_vars['networks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['discard'] => $this->_tpl_vars['network']):
?>
	<?php $this->assign('type', $this->_tpl_vars['network']->type); ?>
	<?php $this->assign('networkType', $this->_tpl_vars['networkTypes'][$this->_tpl_vars['type']]); ?>

 <?php if (( $this->_tpl_vars['app']->platform == '1' && $this->_tpl_vars['networkType']['iphone'] || $this->_tpl_vars['app']->platform == '2' && $this->_tpl_vars['networkType']['android'] )): ?>
 <?php if (( ! $this->_tpl_vars['backfill'] && ! ( ! $this->_tpl_vars['network']->id != '' && ( $this->_tpl_vars['type'] == 16 || $this->_tpl_vars['type'] == 9 || $this->_tpl_vars['type'] == 17 ) ) ) || ( $this->_tpl_vars['backfill'] && $this->_tpl_vars['network']->id != '' && $this->_tpl_vars['network']->adsOn == 1 )): ?>

  <tr>
   <td class="networkName">
   	<input type="hidden" name="nid[]" value="<?php echo $this->_tpl_vars['network']->id; ?>
" /><input type="hidden" name="type[]" value="<?php echo $this->_tpl_vars['type']; ?>
" />
		<span class="networkName">

		<?php if ($this->_tpl_vars['type'] == 17): ?><?php echo $this->_tpl_vars['network']->keys['0']; ?>
<?php else: ?><?php echo $this->_tpl_vars['networkType']['name']; ?>
<?php endif; ?></span>
		</td>
    <?php if (! $this->_tpl_vars['backfill']): ?>		
		<td>			
			<div class="anchor">
	       <div id="<?php echo $this->_tpl_vars['network']->id; ?>
" class="appInfoTip">
	         <div class="appInfoTipTop">
	           <p class="networkName"><?php if ($this->_tpl_vars['type'] == 17): ?><?php echo $this->_tpl_vars['network']->keys['0']; ?>
<?php else: ?><?php echo $this->_tpl_vars['networkType']['name']; ?>
<?php endif; ?></p>
	           <hr style="margin:0px"/>
	           <div style="float:left;width:<?php if ($this->_tpl_vars['type'] != 16): ?>265px<?php else: ?>150px<?php endif; ?>"> 
								<?php if ($this->_tpl_vars['type'] != 16): ?>
	          		<?php $_from = $this->_tpl_vars['networkType']['keyinfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['index'] => $this->_tpl_vars['keyname']):
?>
	         				<p class="formElement required network">
	           				<label for="key[]"><?php echo $this->_tpl_vars['keyname']; ?>
:</label>
	           				<input class="key" type="text" name="key[]" value="<?php echo $this->_tpl_vars['network']->keys[$this->_tpl_vars['index']]; ?>
" class="text"/>
	         				</p>         
	         			<?php endforeach; endif; unset($_from); ?>
								<?php else: ?>
									&nbsp;
								<?php endif; ?>
	           </div>
	           <div style="float:left;width:195;text-align:center;padding-top:11px">
							<?php if ($this->_tpl_vars['type'] != 16): ?>
	         		<span class="button disabled">
								<a href="#" val_nid="<?php echo $this->_tpl_vars['network']->id; ?>
" val_type="<?php echo $this->_tpl_vars['type']; ?>
" class="disabled setKeyButton button">
									<span>Save Changes</span>
								</a>
							</span>
							<?php endif; ?>
		         		<span class="button <?php if ($this->_tpl_vars['network']->id == NULL): ?>disabled<?php endif; ?>">
									<a href="#" class="deleteNetwork" val_nid="<?php echo $this->_tpl_vars['network']->id; ?>
" val_type="<?php echo $this->_tpl_vars['type']; ?>
" class="button">
										<span><?php if ($this->_tpl_vars['type'] == 9 || $this->_tpl_vars['type'] == 16 || $this->_tpl_vars['type'] == 17): ?>Delete<?php else: ?>Disable<?php endif; ?></span>
									</a>
								</span>							
							<br/>
	         		<a href="#" style class="cancel">Cancel</a>
	         	 </div>
						 <div class="clear"></div>
						 <?php if (! ( $this->_tpl_vars['type'] == 17 || $this->_tpl_vars['type'] == 16 )): ?>
						 <a href="<?php echo $this->_tpl_vars['networkType']['Website']; ?>
" target="_newtab">Network Website >></a>
						 <?php endif; ?>
	         </div>

					 <div class="appInfoTipBottom">&nbsp;
					 </div>         
	       </div>
	    </div>	
		<span class="editDetail">
			&nbsp;&nbsp;
    	<a href='#' class="editLink"> <img style="vertical-align:middle" class="editLink <?php if ($this->_tpl_vars['type'] == 9): ?>editHouseAd<?php endif; ?>" src="/img/key.png"/></a>&nbsp;&nbsp;
			<a href='#' class="editLink <?php if ($this->_tpl_vars['type'] == 9): ?>editHouseAd<?php endif; ?>" ><span class="appInfo">Edit Settings</span></a> 
      </span>			
    </td> 
    <?php endif; ?>
   <?php if (! $this->_tpl_vars['backfill']): ?>
   <td class="center adServing">
     <?php if ($this->_tpl_vars['network']->id == ''): ?> 
				<a class="editLink notConfigured" href='#'>Not Configured</a> 
		 <?php else: ?>
     		<a href='#' class="onOffImg onOffImg<?php if (! $this->_tpl_vars['network']): ?>Disabled<?php else: ?><?php if ($this->_tpl_vars['network']->adsOn == '1'): ?>On<?php else: ?>Off<?php endif; ?><?php endif; ?>"></a>   
     <?php endif; ?>

   </td>
   <td><input class="adServing" type="hidden" name="adsOn[]" value="<?php echo $this->_tpl_vars['network']->adsOn; ?>
" /></td>
   <td class="center traffic">
    <input name="weight[]" class="traffic" type="text" <?php if (! $this->_tpl_vars['network'] || ! $this->_tpl_vars['network']->adsOn): ?> disabled="disabled"<?php endif; ?> maxlength="3" temp="<?php echo $this->_tpl_vars['network']->weight; ?>
" value="<?php if (! $this->_tpl_vars['network'] || ! $this->_tpl_vars['network']->adsOn): ?>--<?php else: ?><?php echo $this->_tpl_vars['network']->weight; ?>
<?php endif; ?>"/> &nbsp; %
		<input name="priority[]" class="priority" type="hidden" maxlength="3" value="<?php if ($this->_tpl_vars['network']->priority): ?><?php echo $this->_tpl_vars['network']->priority; ?>
<?php else: ?>99<?php endif; ?>" />
   </td>
   <?php else: ?>
   <td class="priority">
    <input name="priority[]" class="priority" type="<?php if ($this->_tpl_vars['network']->id == ''): ?>hidden<?php else: ?>text<?php endif; ?>" maxlength="3" value="<?php echo $this->_tpl_vars['network']->priority; ?>
" />
		<input name="weight[]" class="traffic" type="hidden" value="<?php echo $this->_tpl_vars['network']->weight; ?>
" />
		<input name="adsOn[]" class="adServing" type="hidden" value="<?php echo $this->_tpl_vars['network']->adsOn; ?>
" />
   </td>
   <?php endif; ?>
  </tr>
  <?php endif; ?>
 <?php endif; ?>
 <?php endforeach; endif; unset($_from); ?>

 </tbody>
</table>
<?php if (! $this->_tpl_vars['backfill']): ?>

<div class="sumBar">
	<span style="color:#aaa">Total Allocation:</span> <span style="color:#000;padding-right:50px;" id="sum">100%</span>
</div>
<?php endif; ?>
<div style="text-align:center;margin-top:20px">
  
<hr/>
<span id="loading"><img src="/img/ajax-loader.gif"/>&nbsp;&nbsp;</span><span class="button disabled"><a href="" id="save" class="disabled"><span>Save Changes</span></a></span>
<a id="cancel" href="" class="cancel disabled">Cancel</a>

</div>

</form>


</div>
<div id="saveModal" class="hidden">
	<div class="modalTop center">
		<img class="modalImage" src="/img/accept.png"> <span class="modalHeader"></span>
		<div class="clear"></div>
		<span class="modalBody"></span>
		<hr>
		<span class="button"><a href="#" class="simplemodal-close"><span>OK</span></a></span>
	</div>
	<div class="modalBottom"></div>
</div>

<div id="turnOffModal" class="hidden">
	<div class="modalTop center">
		<img class="modalImage" src="/img/exclamation.png"> <span class="modalHeader"></span>
		<div class="clear"></div>
		<span class="modalBody"></span>
		<hr>
		<span class="button"><a id="confirmTurnOff" href="#"><span>OK</span></a></span>
		<span class="button"><a href="#" class="simplemodal-close"><span>Cancel</span></a></span>
	</div>
	<div class="modalBottom"></div>
</div>


<div id="deleteModal" class="hidden">
	<div class="modalTop center">
		<img class="modalImage" src="/img/accept.png"> <span class="modalHeader"></span>
		<div class="clear"></div>
		<span class="modalBody"></span>
		<hr>
		<span class="button"><a id="confirmDeleteNetwork" href="#"><span>Delete</span></a></span>
		<span class="button"><a href="#" class="simplemodal-close"><span>Cancel</span></a></span>
	</div>
	<div class="modalBottom"></div>
</div>
</div>
<div id="popup" style="left: 135px; top: 344.933px; display:none;">
    <div style="position: relative; top: 7px; left: 161px;" class="popUpArrow" id="popup-arrow"></div>
    <div class="largePopUpTop bottom">
        <div class="largePopUpBottom bottom" style="height:100px">
            <div class="popupTitle titleRed">Function Name</div>
            <a href="#"><img src="/img/small_close.gif" id="popup-close" style="float: right;"></a>
            <div id="popup-body" style="clear: both;" class="body">
                <p class="text">
                This is the exact name of the method you would like AdWhirl to call when it makes a call through Custom Event. Learn more from our <a href="http://helpcenter.adwhirl.com/content/custom-events-and-generic-notifications">FAQ page</a>.
                </p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
var aid = "<?php echo $this->_tpl_vars['app']->id; ?>
";
var showNoNetworkRunning = <?php if ($this->_tpl_vars['showNoNetworkRunning']): ?>true<?php else: ?>false<?php endif; ?>;
var backfill = <?php if ($this->_tpl_vars['backfill']): ?>true<?php else: ?>false<?php endif; ?>;
<?php echo '

function save() {
	var props = new Array(\'weight\',\'adsOn\',\'priority\',\'type\',\'nid\');
	var obj = {\'aid\':aid};
	for (var i in props) {
		var prop = props[i];
		var vals = new Array();
		var inputs = $(document).find(\'[name=\'+prop+\'[]]\');
		inputs.each(function(i) {
			vals[i]=inputs[i].value;
			if (prop=="weight") {
				if (inputs[i].value=="--") {
					vals[i]="0";
				}					
			}
			if (prop=="adsOn") {
				if (vals[i]=="") vals[i]="0";
			}
		});
		obj[prop+"[]"]=vals;
	}
	traffic.changed=false;
	$.ajax({
    type:\'POST\',
    url:"/apps/oneApp/appNetworksSubmit",
		context: $(this),
    data:obj,
    success: function (e) {
			$(".modalImage").attr(\'src\',\'/img/accept.png\')
			$(".modalHeader").text("Save Confirmation")
			$(\'.modalBody\').text("Changes Saved.");
			$("#saveModal").modal({
				opacity:80,
				overlayCss: {backgroundColor:"#fff"}
			});
    },
    error: function(e) {
			$(".modalImage").attr(\'src\',\'/img/exclamation.png\')
			$(".modalHeader").text("Save Failed!")
			$(\'.modalBody\').text("Please try again. If the problem presist, please contact support@adwhirl.com.");
			$("#saveModal").modal({
				opacity:80,
				overlayCss: {backgroundColor:"#fff"}
			});
    }
  });
}


function updateTableCache() {
  $("#dataTable").trigger("appendCache");
  $("#dataTable").trigger("update");
}

$(document).ready(function() {
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
  $(".helpTip").click(function(e) {
    e.stopPropagation();
    e.preventDefault();
    var pos = $(this).offset();    
    $("#popup").css({ top: (pos.top+15), left: (pos.left-168) }).show(); 
  });  
	if ($.browser.msie) {
		$("#addGenericTip").addClass(\'ie\');
		$(".appInfoTip").addClass(\'ie\');		
	}
	if (showNoNetworkRunning) {
	    $(".modalImage").attr(\'src\',\'/img/exclamation.png\')
		$(".modalHeader").text("No Network is turned on for this app.")
		$(\'.modalBody\').text("No ads will be serve to this app. Please turn on or add a network.");
		$("#saveModal").modal({
			opacity:80,
			overlayCss: {backgroundColor:"#fff"}
		});
	}
  $(window).bind(\'beforeunload\', function(e) {
		if (traffic.changed) {
			if(!e) e = window.event;
			//e.cancelBubble is supported by IE - this will kill the bubbling process.
			e.cancelBubble = true;
			e.returnValue = "There are some unsaved changes."; //This is displayed on the dialog

			//e.stopPropagation works in Firefox.
			if (e.stopPropagation) {
				e.stopPropagation();
				e.preventDefault();
			}
		}
	});

	
	$(\'#loading\')
	    .hide()  // hide it initially
	    .ajaxStart(function() {
	        $(this).show();
	    })
	    .ajaxStop(function() {
	        $(this).hide();
	    })
	;

  $("a.disabled, a.cancel").click(function(event) {
    event.preventDefault();
  });

  $(\'#save\').bind("click",
     function(e) {
			errorObj.reset();
			if (backfill) {

				var objRegExp  = /(^\\d+$)/;
				var obj = {};
				var count = 0;
				$("input.priority").each(function() {
					if (!$(this).attr(\'disabled\')) {
						count++;
					}
				});

				$("input.priority").each(function() {
					if (!$(this).attr(\'disabled\')) {
						var val = $(this).val();
						if (!objRegExp.test(val)) {
							errorObj.attacheError($(this), "<br/>This is not a valid number.");
						} else if (obj[val]) {
							errorObj.attacheError($(this), "<br/>Can\'t be duplicated.");
						} else {
							var p = parseInt(val);
							if (p<=0) {
								errorObj.attacheError($(this), "<br/>Can\'t be negative or zero.");
							}
							if (p>count) {
								errorObj.attacheError($(this), "<br/>Out of range (1 - "+count+\')\');
							}
						}						
						obj[val] = \'true\';						
					}
				});
			} else {
				var trafficSum = traffic.getSum();
				var turningOffApp = false;
				if (trafficSum != 100) {
				  var allOff = true;
				  if (trafficSum == 0) {				    
				    $("input.adServing").each(function() {
				      allOff &= $(this).val()=="0";
				    });
  				} 
  				turningOffApp = trafficSum == 0 && allOff;
  				if (turningOffApp) {
  				  $(".modalImage").attr(\'src\',\'/img/exclamation.png\');
      			$(".modalHeader").text("Turn Off Ad Serving");
      			$(\'.modalBody\').text("Are you sure you want to turn Ad Serving off for all configured networks?  Your app will not make any ad requests after you click OK.");
      			$("#turnOffModal").modal({
      				opacity:80,
      				overlayCss: {backgroundColor:"#fff"}
      			});
  				} else {
  				  errorObj.attacheError($("#sum"),\'Total allocation must be 100%.\');					
  				}
  				
				}
				$("input.traffic").each(function() {
					if (!$(this).attr(\'disabled\')) {
						var val = $(this).val();
						errorObj.testPercent(val,$(this));
					}
				});
			
			}
			if (!errorObj.hasError() && !turningOffApp) save();									
			
     });
     $("#confirmTurnOff").click(function() {
       save();
       $.modal.close();
     });
	// storing orig values
  $("input").each(function() {
   	$(this).attr(\'orig\',$(this).attr(\'value\'));
  });  
  $(\'input.priority\').change(function() {
    traffic.activateSave();
    updateTableCache();
  });
  $(\'input.traffic\').change(function() {
    traffic.setSum();
    updateTableCache();
  });

	// AppToolTip Section
	$("#addGeneric").click(function (e) {
		e.preventDefault();
		e.stopPropagation();
		$(".appInfoTip").hide();
		$("#addGenericTip").show();
	});
	$(".editLink").click(function (event) {
    event.preventDefault();
		event.stopPropagation();
		if ($(this).is(".editHouseAd")) {
			window.location = "/apps/oneApp/appHouseAds?aid="+aid;
		} else {
	  	$(".appInfoTip").hide();
    	$(this).parents("tr").find(".appInfoTip").show();
		}
  });
	$("tr").hover(
		function() {
			$(this).addClass("highlighted");
			$(".editDetail",this).show();
		}, function() {
  		$(".editDetail",this).hide();
			$(this).removeClass("highlighted");
		})
  $(".cancel").not("#cancel").click(function (event) {
	if (!$(this).is(".disabled")) {
		$(this).parents(".appInfoTip").find("input").each(
			function(e) {
				$(this).attr(\'value\',$(this).attr(\'orig\'));
			});
		$(".appInfoTip").hide();
	}
  });

	var setOnOff = function() {
		var $tr = $(this).parents("tr");
		var $adsInput = $tr.find("input.adServing");
    var val = $adsInput.val();
		var $trafficInput = $tr.find("input.traffic");
		
    if (val==1) {
      $(this).removeClass("onOffImgOn").addClass("onOffImgOff");
      $adsInput.val(0);
			$trafficInput.attr("disabled","disabled");
			$trafficInput.val("--");
    } else {
      $(this).removeClass("onOffImgOff").addClass("onOffImgOn");    
			$trafficInput.removeAttr("disabled");
			var new_val = 100-traffic.getSum();
			if (new_val<0) new_val = 0;
			$trafficInput.val(100-traffic.getSum());
      $adsInput.val(1);
		}
		if ($trafficInput.val()!=0)
		  traffic.activateSave();
		updateTableCache();  
		traffic.setSum(false);
	}
	$("body").click(function (e) {		
		$(".appInfoTip").hide();
	});	
	$(".appInfoTip").bind("click", function(e) {
		e.stopPropagation();
	});
	$(\'a.onOffImg\').click(setOnOff);

  $(\'input.key\').bind("keypress",
      function(e) {
		$(this).parents(".appInfoTip").find("a.disabled").not(".deleteNetwork").removeClass("disabled").addClass("enabled").parent().removeClass("disabled").addClass("enabled");
  });
	$(".deleteNetwork").click( function(e) {
		e.preventDefault();
		$(".modalImage").attr(\'src\',\'/img/exclamation.png\');
		if ($(this).attr(\'val_type\')==17) {
  		$(".modalHeader").text("Delete Confirmation");
  		$(\'.modalBody\').text("Are you sure you want to delete event?");		  
  		$("#confirmDeleteNetwork > span").text("Delete");
		} else {
  		$(".modalHeader").text("Disable Confirmation");
  		$(\'.modalBody\').text("Are you sure you want to disable this network? You will stop receiving ads from this network. You can re-enable a network at anytime.");		  		  
  		$("#confirmDeleteNetwork > span").text("Disable");
		}
		$("#confirmDeleteNetwork").attr(\'href\', \'/apps/oneApp/deleteNetwork?aid=\'+aid+\'&nid=\' + $(this).attr(\'val_nid\'));
		$("#deleteModal").modal({
			opacity:80,
			overlayCss: {backgroundColor:"#fff"}
		});
	});
	var tableSorterHeader = backfill?{}:{1:{sorter:false},3:{sorter:false}};
	
	$("#dataTable").tablesorter({
	  headers: tableSorterHeader,
	  textExtraction: function(node) { 
        $n = $(node);
        if ($n.is(\'.networkName\')) return $n.find(\'span.networkName\').text();
        if ($n.is(\'.adServing\')) {
          var as = "-1";
          $a = $n.find(\'a\');
          if ($a.is(\'.notConfigured\')) as = "-1";
          if ($a.is(\'.onOffImgOff\')) as = "0";
          if ($a.is(\'.onOffImgOn\')) as = "1";
          return as;
        }
        if ($n.is(\'.traffic\')) {
          var val = $n.find(\'input.traffic\').val();
          if (val==\'--\') return "-1";
          else return val;
        }
        if ($n.is(\'.priority\')) {
          return $n.find(\'input.priority\').val();
        }
        
        return node.innerHTML;

    }
	  
	}); 
  $(\'.setKeyButton\').bind("click",
        function(e) {
          e.preventDefault();
          // Disable the button while we save so it only gets pushed once to the DB
          $(this).parent().removeClass(\'enabled\').addClass(\'disabled\');
          traffic.setSum();
          var nid = $(this).attr(\'val_nid\');    
          var inputs = $(this).parents(".appInfoTip").find(\'[name=key[]]\');
          var keys = new Array();
          errorObj.reset();
          $(".error").remove();
          inputs.each(function(i) {					
            if (inputs[i].value=="") {
              errorObj.attacheError(this,\'This key is required.\')
            }
            keys[i]=inputs[i].value;		    
          });
          if (errorObj.hasError()) return false;
          var obj = {
                  \'keys[]\':keys,
                  \'nid\':nid,
                  \'aid\':aid,
                  \'type\':$(this).attr(\'val_type\')};
          $.ajax({
            type:\'POST\',
            url:"/apps/oneApp/appNetworkKeySubmit",
            context: $(this),
            data:obj,
            success: function (data) {
              $(".appInfoTip").hide();
              var type = $($(this).context).attr(\'val_type\');
              if (type=="17") {
                location.reload(true);
              } else {								
              var inputs = $(this).parents(".appInfoTip").find("[name=\'key[]\']");
                inputs.each(function() {
                $(this).attr("orig",$(this).val());									
//									$(this).val($(this).attr("orig"));
                });
                var $tr = $(this).parents("tr");
  	        $tr.find("input[name=\'nid[]\']").val(data);
  	        var $tdAdServing = $tr.find(\'td.adServing\');
  	        if ($tdAdServing.find(\'a\').is(\'.notConfigured\')) {
    	          var $link = $(\'<a href="#" class="onOffImg onOffImgOff"></a>\').click(setOnOff);
  	  	  $tdAdServing.html(\'\').append($link);
    		  $tr.find(\'input.adServing\').val(1);
    		  $tr.find(\'.deleteNetwork\').parent().removeClass(\'disabled\');
    		  $link.trigger(\'click\');
  	        }							
              }
            },
            error: function(e) {
              alert("There was an error saving your changes: "+e);
            }
          });
        }
    );
		traffic.setSumOnly();		
});

'; ?>


</script>