<?php /* Smarty version 2.6.26, created on 2011-12-17 05:17:35
         compiled from ../tpl/www/houseAds/create.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_options', '../tpl/www/houseAds/create.tpl', 17, false),array('function', 'cycle', '../tpl/www/houseAds/create.tpl', 80, false),)), $this); ?>
<div id ="main" class="content">
  <div class="column leftColumn">
    <form id="infoForm" class="createAd" action="<?php if ($this->_tpl_vars['createOrEdit'] == 'create' || $this->_tpl_vars['createOrEdit'] == 'createForApp'): ?>/houseAds/ad/createSubmit<?php else: ?>/houseAds/ad/editSubmit<?php endif; ?>" enctype="multipart/form-data" method="post">
	    <input type="hidden" name="returnPage" value="<?php echo $this->_tpl_vars['returnPage']; ?>
" class="text"/>
	    <div class="sectionHeader sectionHeaderActive">
		    Information            
		  </div>
   	  <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['houseAd']->id; ?>
" class="text"/>

      <p class="formElement required ">
        <label for="name">Name:</label>
        <input id="adName" type="text" name="name" value="<?php echo $this->_tpl_vars['houseAd']->name; ?>
" />
      </p>        
        <p class="formElement required ">
          <label for="goal">Goal:</label>
          <select id="selectGoal" name="linkType">
<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['linkTypeOptions'],'selected' => $this->_tpl_vars['houseAd']->linkType), $this);?>


 				 </select>
        </p>        
        <p class="formElement required ">
          <label for="link">Goal URL:</label>
          <input id="adGoal" type="text" name="link" value="<?php echo $this->_tpl_vars['houseAd']->link; ?>
" />
        </p>
       
       <div class="sectionHeader sectionHeaderActive">
         Creative
       </div>
        <p class="formElement required ">
          <label for="name">Type:</label>
          <select id="selectType" name="type">
				<?php if ($this->_tpl_vars['createOrEdit'] == 'edit'): ?>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['typeOptions'],'selected' => $this->_tpl_vars['houseAd']->type), $this);?>

				<?php else: ?>
					<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['typeOptions'],'selected' => 2), $this);?>

				<?php endif; ?>
 				 </select>
        </p>							
              <p id="textad" style="width:465px" class="formElement required ">
           <label for="description">Ad Text:</label>
           <input id="ad_text_input" type="text" name="description" value="<?php echo $this->_tpl_vars['houseAd']->description; ?>
" style="width:275px" maxlength="35" />
					 <span id="charLeft" style="font-style:italic;color:#999;padding-left:133px"><span>
			
         </p>              
         <p id="image" style="margin-bottom:0px;height:97px;width:420px" class="formElement required ">
           <label for="image">Image:</label>
			<span style="height:50px;">
				<img id="imgDefault" class="ad_image default type2" src="/img/ad_size_38x38.png"/> 
				<span><input id="radioDefault" name="imageDefault" type="radio" id="defaultImage" value="true" checked="checked" /> Use our default image
					</span>
			</span>
			<br>
			<label>&nbsp;</label>
			<img class="ad_image custom type2" src="<?php if ($this->_tpl_vars['houseAd']->imageLink && $this->_tpl_vars['houseAd']->type == 2): ?><?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
<?php else: ?>/img/ad_size_38x38.png<?php endif; ?>"/> <input id="radioCustom" name="imageDefault" type="radio" id="CustomImage" value="false" /> Select your own 38x38 image
			<label>&nbsp;</label>                
           <input id="file" type="hidden" value="<?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
" />
           <input id="imageLink" type="hidden" name="imageLink" value="<?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
" />

         </p>
         <p id="banner" style="margin-bottom:0px;height:83px;" class="formElement required ">
           <label for="image">Banner:</label>
			<img style="padding-left:133px" class="ad_image custom type1" src="<?php if ($this->_tpl_vars['houseAd']->imageLink && $this->_tpl_vars['houseAd']->type == 1): ?><?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
<?php else: ?>/img/ad_size_320x50.png<?php endif; ?>"/>
		</p>
			<span style="padding-left:180px;padding-bottom:20px" class="button"><a href="#" id="chooseFile" class="disabled"><span id="uploadText">Upload Banner</span></a></span>
			<div id="sp" style="height:40px;width:133px"> </div>
	
       <div class="sectionHeader sectionHeaderActive">
         Include in App Inventory
       </div>
		<table>
			<tr>
				<th style="width:20px"><input type="checkbox" <?php if ($this->_tpl_vars['createOrEdit'] == 'create'): ?>checked<?php endif; ?>/></th>
				<th>App Name</th>
				<th style="width:85px;text-align:center">App Type</th>
			</tr>
		</table>
		<div id="overflow" style="overflow:auto;height:200px">
			<table id="inventory">
				 <?php $_from = $this->_tpl_vars['apps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app']):
?>
				  <?php echo smarty_function_cycle(array('values' => "odd,even",'assign' => 'class'), $this);?>

				  <tr class="app" style="width:20px">
					 <td class="check <?php echo $this->_tpl_vars['class']; ?>
">
							<?php if ($this->_tpl_vars['createOrEdit'] == 'create'): ?>
								<input class="appCheckBox" type="checkbox" checked name="apps[]" value="<?php echo $this->_tpl_vars['app']->id; ?>
"/>
							<?php elseif ($this->_tpl_vars['createOrEdit'] == 'createForApp'): ?>
								<input class="appCheckBox" type="checkbox" <?php if ($this->_tpl_vars['app']->id == $this->_tpl_vars['aid']): ?>checked<?php endif; ?> name="apps[]" value="<?php echo $this->_tpl_vars['app']->id; ?>
"/>													
							<?php elseif ($this->_tpl_vars['createOrEdit'] == 'edit'): ?>
								<?php if ($this->_tpl_vars['app']->ahid == ''): ?>
									<input class="appCheckBox" type="checkbox" name="apps[]" value="<?php echo $this->_tpl_vars['app']->id; ?>
"/>
								<?php else: ?>
								  <input class="appCheckBox" type="checkbox" checked name="ahids[]" value="<?php echo $this->_tpl_vars['app']->ahid; ?>
"/>
								<?php endif; ?>
							<?php endif; ?>
					 </td>
				   <td class="name <?php echo $this->_tpl_vars['class']; ?>
">
				    <a href="/apps/oneApp/appNetworks?aid=<?php echo $this->_tpl_vars['app']->id; ?>
"><?php echo $this->_tpl_vars['app']->name; ?>
</a>
				   </td>
				   <td class="type <?php echo $this->_tpl_vars['class']; ?>
" style="width:85px;text-align:center"><?php if ($this->_tpl_vars['app']->platform == '1'): ?>iPhone<?php elseif ($this->_tpl_vars['app']->platform == '2'): ?>Android<?php else: ?>Unknown<?php endif; ?></td>
				</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>									
			</div>
			<div class="selectBar">Selected apps:<span id="checked_count" class="bold">x out of y</span></div>


	 </form>
<?php if ($this->_tpl_vars['createOrEdit'] == 'edit'): ?>
				<br/>
					<div class="sectionHeader sectionHeaderActive">
						Remove Ad
					</div>
            <p class="formElement required" style="width:471px">
              <label for="delete">Delete Ad:</label>
               <span class="button"><a id="delete" href='#'><span>Delete</span></a></span>	 <span style="padding-left:10px">You'll be asked one more time to confirm.<span>
            </p>
        </div>        
<?php endif; ?>				
				 </div>

  <div class="column rightColumn">
    <div class="sectionHeader sectionHeaderActive">
      Preview      
    </div>
    <div id="inapp" class="preview">
        <div id="iphone_inapp">
          <div id="iphone_preview_top">&nbsp;</div>
          <div id="iphone_preview_content">
              <div id="iphone_preview_ad">                            
                <div id="iphone_banner_preview" >
                  <img class="left_image ad_image_preview" src="<?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
"/>              
                  <p id="iphone_preview_ad_text" class="ad_text"><?php echo $this->_tpl_vars['houseAd']->description; ?>
</p>                        
              	</div>              
          	  </div>                   
          </div>
          <div id="iphone_preview_bottom">&nbsp;</div>
					iPhone Preview
		</div>
        <div id="android_inapp">
          <div id="android_preview_top">&nbsp;</div>
          <div id="android_preview_content" class='banner_preview'>
            <div id="android_banner_preview" >
              <img class="left_image ad_image_preview" src="<?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
"/>              
              <p id="iphone_preview_ad_text" class="ad_text"><?php echo $this->_tpl_vars['houseAd']->description; ?>
</p>
            </div>
          </div>
					Android Preview
        </div>
    </div>    

  </div>
</div>
<div class="clear">&nbsp;</div>
<div style="text-align:center">
	<hr/>
	<span class="button disabled"><a href="#" id="save" class="disabled"><span>Save Changes</span></a></span>
	<a href="<?php echo $this->_tpl_vars['returnPage']; ?>
" class="cancel">Cancel</a>
</div>
<form id="deleteForm" method="post" action="/houseAds/ad/delete?cid=<?php echo $this->_tpl_vars['houseAd']->id; ?>
">
	
	
</form>
<div id="deleteConfirm" class="hidden">
	<div class="modalTop center">
		<img src="/img/exclamation.png"> <span class="modalHeader"> Delete Confirmation</span>
	<span class="modalBody">Are you sure you want to delete this house ad?</span>
	<hr>
	<span class="button"><a href="#" id="confirmDelete"><span>Delete</span></a></span>
	<span class="button"><a href="#" class="simplemodal-close"><span>Cancel</span></a></span>
	</div>
	<div class="modalBottom"></div>
</div>
<script>
var imageLink = "<?php echo $this->_tpl_vars['houseAd']->imageLink; ?>
";
var imgPrefix = "http://www.adwhirl.com/img/adwhirl_icons/adwhirl__000";
var hasNoAndroidApp = <?php if ($this->_tpl_vars['hasNoAndroidApp'] == 'TRUE'): ?>true<?php else: ?>false<?php endif; ?>;
var hasNoiPhoneApp = <?php if ($this->_tpl_vars['hasNoiPhoneApp'] == 'TRUE'): ?>true<?php else: ?>false<?php endif; ?>;
var banPlat = new Array();
var isEdit = <?php if ($this->_tpl_vars['createOrEdit'] == 'edit' || $this->_tpl_vars['createOrEdit'] == 'createForApp'): ?>true<?php else: ?>false<?php endif; ?>;
var hasImage = false;
var bannerImg = "/img/ad_size_320x50.png";
var imgTextImg = "/img/ad_size_38x38.png";

<?php echo '

function adjustGoalType() {
	banPlat = new Array();
	$("#selectGoal > option").each(function() {
		$(this).removeAttr(\'disabled\');
	});
	if (isEdit) {
		if (hasNoAndroidApp) banFor(\'iPhone\');	
		if (hasNoiPhoneApp) banFor(\'Android\');		
	}
	if (isEdit) {
		$(".appCheckBox:checked").each(function() {		
			if (!$(this).parent().is("th")) {
				var platform =  $(this).parent().parent().find(\'.type\').text();
				banFor(platform);
			}		
		});
	}	 
	// console.log(banPlat);
	$("#selectGoal > option").each(function() {
		if (banPlat[$(this).val()]) $(this).attr(\'disabled\',\'disabled\');			
	});	
}

function banFor(platform) {
	if (platform == \'iPhone\') {
		banPlat[\'8\'] = true;
	}
  if (platform == \'Android\') {
		banPlat[\'2\'] = true;
		banPlat[\'6\'] = true;
  }
}

$(document).ready(function() {
  
	$("#confirmDelete").click(function(){
		$("#deleteForm").submit();
	});

	$("#delete").click(function() {
		var form = $(\'#deleteForm\');
		errorObj.reset();
		if ($(\'td > input:visible:checkbox:checked\').length>0) {
			errorObj.attacheError($(this), "Please remove this ad from all apps");
		}
		$("input[name$=\'ahids[]\']").each(function() {
			if ($(this).is(\':checked\')==false) {
				$(\'<input type="hidden" name="del_ahids[]" value="\' + $(this).val() + \'" />\').appendTo(form);
			}			
		});
		if (!errorObj.hasError()) {
			$("#deleteConfirm").modal({
				opacity:80,
				overlayCss: {backgroundColor:"#fff"}
			});
		}		
	});
	$("#radioDefault").click(function() {
		$(".ad_image_preview").attr(\'src\',$(".ad_image.default").attr("src"));
	});
	$("#radioCustom").click(function() {
		$(".ad_image_preview").attr(\'src\',$(".ad_image.custom.type2").attr("src"));
	});

	if (isEdit) {
		if (imageLink.indexOf(imgPrefix)<0) {
			hasImage=true;
			$("#radioDefault").removeAttr(\'checked\');		
			$("#radioCustom").attr(\'checked\',\'checked\');		
		}	else {
		  $(".ad_image.custom.type2").attr("src",imgTextImg);
		}
	}
	var aUpload = new AjaxUpload(\'chooseFile\', 
		{
			action:\'uploadImage\',
			name:\'image\',
			onSubmit: function() {
				aUpload.setData({\'type\':$("#selectType").val()});
			},
		 	onComplete:function(file, response) {
				errorObj.reset();
				if (response=="") {
					errorObj.attacheError($("#chooseFile"), "<br/><span style=\'padding-left:65px\'>There was a problem with your upload. You may want to try a smaller file size.</span>");
				} else {
					$("#file").val(response);
					$(\'.disabled\').addClass(\'enabled\').removeClass(\'disabled\');				
					var type = $("#selectType").val();
					$(".ad_image.custom.type"+type).attr(\'src\',response).attr(\'rel\',\'uploaded\');
					$(".ad_image_preview").attr(\'src\',response).attr(\'rel\',\'uploaded\');													
				}
			}
		}
	);			

	$("#save").click(function(e) {
		e.preventDefault();
		$(":hidden:checked").each(function() {
			$(this).removeAttr(\'checked\');		
		});
		if (!$(this).is(\'.disabled\')) {
			var form = $(\'#infoForm\');
			$("input[name=\'del_ahids[]\']").remove();
			$("input[name$=\'ahids[]\']").each(function() {
				if ($(this).is(\':checked\')==false) {
					$(\'<input type="hidden" name="del_ahids[]" value="\' + $(this).val() + \'" />\').appendTo(form);
				}
				// console.log($(this).val()+" checked:"+$(this).is(\':checked\'));
			})

			errorObj.reset();

			var img = $(".ad_image_preview").attr(\'src\');
			if (   ($("#selectType").val()==1 && img.indexOf(bannerImg)>=0)
					|| ($("#selectType").val()==2 && img.indexOf(imgTextImg)>=0) ) { // image and text
						errorObj.attacheError($("#chooseFile"),"Please upload an image");
			}
			if ($("#adName").val()==\'\') {
				errorObj.attacheError($("#adName"), " Please enter the house ad name");				
			}
			if ($("#adGoal").val()==\'\') {
				errorObj.attacheError($("#adGoal"), " Please enter the goal URL");				
			}
			$("#imageLink").val(img);
			if (!errorObj.hasError()) {
				// console.log($(\'#infoForm\').serialize());			
				form.submit();
			}
				
		}
	})
	var setCheckedCount = function() {
		$("#checked_count").text(
				$(\'td > input:visible:checkbox:checked\').length + " of " + 
				$(\'td >input:visible:checkbox\').length);
	};
	setCheckedCount();
	adjustGoalType();
	var setCreativeTypeInputs = function() {
		if ($("#selectType").val()==1) {
			$("#image").hide();
			$("#banner").show();
			$("#uploadText").text(\'Upload Banner\');
			$("#textad, .ad_text").hide();
			$(".ad_image_preview").attr(\'src\',$(".ad_image.custom.type1").attr("src")).removeClass(\'left_image\').addClass(\'banner_image\');
		} else {
			$("#image").show();
			$("#banner").hide();
			$("#textad, .ad_text").show();
			$("#uploadText").text(\'Upload Image\');
			if ($("#radioDefault").attr(\'checked\')) {
				$(".ad_image_preview").attr(\'src\',$(".ad_image.default").attr("src")).removeClass(\'banner_image\').addClass(\'left_image\');
			} else {
				$(".ad_image_preview").attr(\'src\',$(".ad_image.custom.type2").attr("src")).removeClass(\'banner_image\').addClass(\'left_image\');
			}
			
		}
	};
	setCreativeTypeInputs();
	$("#selectType").change(setCreativeTypeInputs);

	var setGoal = function() {
		// console.log("setGoal");
		var goal = parseInt($("#selectGoal").val());
		var img = imgPrefix+goal+".jpg";
		var type = $("#selectType").val();
		$(".ad_image.default").attr(\'src\',img);
		if ($("#radioDefault").attr(\'checked\')) {
			$(".ad_image_preview").attr(\'src\',img);			
		}

		// console.log("goal = "+goal);
		var showiPhone = goal!=8 && !($("#selectGoal > option[value=\'6\']").is("[disabled]") || $("#selectGoal > option[value=\'2\']").is("[disabled]"));
		var showAndroid = !(goal==6 || goal==2) && !$("#selectGoal > option[value=\'8\']").is("[disabled]");
		if (!showiPhone && !showAndroid) {
			showAndroid = true;
			showiPhone = true;
		}
		if (showiPhone)	 $("#iphone_inapp").show();  else  $("#iphone_inapp").hide();
		if (showAndroid)	$("#android_inapp").show();	 else  $("#android_inapp").hide();
		$(".app").each(function() {
			var type = $("td.type",this).text(); // appType
			if (type=="iPhone") {
				if (showiPhone) $(this).show(); else $(this).hide();				
			} else {
				if (showAndroid) $(this).show(); else $(this).hide();
			}
		});
		var height = Math.min(130,$("#inventory > tbody").height());
		$(".app:visible").each(function(index, value) {
			$(this).removeClass(\'even\').removeClass(\'odd\').addClass(index==0?\'even\':\'odd\');
		})
		$("#overflow").css(\'height\',height);
		setCheckedCount();		
	};
	setGoal();
	$("#selectGoal").change(setGoal);

	$(\'input, select\').change(function () {
		$(\'.disabled\').addClass(\'enabled\').removeClass(\'disabled\');
	});
	$(\'input:checkbox\').change(function () {
		if ($(this).parent().is("th")) {
		 $(\'td > input:checkbox\').attr(\'checked\',$(this).attr(\'checked\'));
		} else {
			$(\'th > input:checkbox\').removeAttr(\'checked\');
		}
		setCheckedCount(); 
		adjustGoalType();
	});
	$("#ad_text_input").bind("change keyup", function() {
		var val = $("#ad_text_input").val();
		$("#charLeft").text(val.length>0 ? ("("+(35-val.length)+" chracters remaining)"):"");
    $(".ad_text").text(val);
  });
});
'; ?>

</script>