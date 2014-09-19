<?php /* Smarty version 2.6.26, created on 2012-01-11 05:54:46
         compiled from ../tpl/www/header.tpl */ ?>
<!doctype html>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="Description" content="Dynamically change between ad networks for your iPhone/Android apps and create and display custom ads to cross-promote your own apps.">
  <link rel="icon" type="image/ico" href="/favicon.ico" />
  <link rel="shortcut icon" href="/favicon.ico" />
  <title><?php echo $this->_tpl_vars['title']; ?>
</title>

  <!-- CSS -->
  <link href="/css/styles.css" rel="stylesheet" type="text/css" />
  <?php $_from = $this->_tpl_vars['styleSheets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sheet']):
?>
    <link href="<?php echo $this->_tpl_vars['sheet']; ?>
" rel="stylesheet" type="text/css" />
  <?php endforeach; endif; unset($_from); ?>
  <!-- JavaScript -->
  <script type="text/javascript" src="/js/jquery-1.4.2.min.js"></script>
  <?php $_from = $this->_tpl_vars['jsFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['jsFile']):
?>
    <script type="text/javascript" src="<?php echo $this->_tpl_vars['jsFile']; ?>
"></script>
  <?php endforeach; endif; unset($_from); ?>
 </head>
 <body>

  <div id="header">


   <div class="logoHeaderContainer">
      <div id="account_container">
      <div id="account">
	     <?php if ($this->_tpl_vars['user']): ?>
         <?php echo $this->_tpl_vars['user']->email; ?>
 | 
         <a href="/home/account">Account Settings</a> | 
         <a href="http://helpcenter.adwhirl.com" target="_newtab">Help</a> |
         <a href="http://groups.google.com/group/adwhirl-users?pli=1" target="_newtab">Forum</a> |
         <a href="/home/login/logout">Log Out</a>
			
			 <?php else: ?>
			 		<?php if ($this->_tpl_vars['className'] != 'register'): ?>
       			<a href="/home/register">Sign Up</a> | 
					<?php endif; ?>
       <a href="http://helpcenter.adwhirl.com" target="_newtab">Help</a>
       		<?php if ($this->_tpl_vars['className'] != 'home'): ?> |
					<a href="/home/">Login</a>
					<?php endif; ?>
			
		   <?php endif; ?> 
      </div>
      </div>

           <div id="logo_header">
                   <a href="/main"><img id="logo_img" border="0" src="/img/logo.png" alt="AdWhirl" /></a>
           </div>
       </div>
       
   


  <?php if ($this->_tpl_vars['tabs_left']): ?>
   <div id="tabsContainer">
   <div id="tabs">
    <ul class="left">
     <?php $_from = $this->_tpl_vars['tabs_left']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tab']):
?>
      <?php if ($this->_tpl_vars['tab']['display']): ?>
       <li>
        <a<?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['tab_current']): ?> class='active<?php if ($this->_tpl_vars['className'] == 'home'): ?>White<?php endif; ?>'<?php endif; ?> href='<?php echo $this->_tpl_vars['tab']['url']; ?>
'>
         <div>
          <?php echo $this->_tpl_vars['tab']['name']; ?>

         </div>
         <span>&nbsp;</span>
        </a>
       </li>
      <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?>
    </ul>

    <?php if ($this->_tpl_vars['tabs_right']): ?>
    <ul class="right">
     <?php $_from = $this->_tpl_vars['tabs_right']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['tab']):
?>
      <?php if ($this->_tpl_vars['tab']['display']): ?>
       <li>
        <a<?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['tab_current']): ?> class='active'<?php endif; ?> href='<?php echo $this->_tpl_vars['tab']['url']; ?>
'>
         <div>
          <?php echo $this->_tpl_vars['tab']['name']; ?>

         </div>
        </a>
       </li>
      <?php endif; ?>
     <?php endforeach; endif; unset($_from); ?>
    </ul>
    <?php endif; ?>

    <br />
   </div>
   </div>
  <?php endif; ?>
  <div class="clear"></div>
  <?php if ($this->_tpl_vars['breadcrumbs'] || $this->_tpl_vars['className'] == 'dev'): ?>
  <div id="breadcrumbsContainer">
  <div id="breadcrumbs">
   <?php $_from = $this->_tpl_vars['breadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['breadcrumbs'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['breadcrumbs']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['crumb']):
        $this->_foreach['breadcrumbs']['iteration']++;
?>
     <?php if (! ($this->_foreach['breadcrumbs']['iteration'] == $this->_foreach['breadcrumbs']['total']) && $this->_tpl_vars['crumb']['link'] != ""): ?><a href="<?php echo $this->_tpl_vars['crumb']['link']; ?>
"><?php echo $this->_tpl_vars['crumb']['text']; ?>
</a><?php endif; ?>
   			
     <?php if (($this->_foreach['breadcrumbs']['iteration'] == $this->_foreach['breadcrumbs']['total']) && $this->_tpl_vars['crumb']['link'] != ""): ?><span style="color:#666"><?php echo $this->_tpl_vars['crumb']['text']; ?>
</span><?php endif; ?>
	   <?php if (! ($this->_foreach['breadcrumbs']['iteration'] == $this->_foreach['breadcrumbs']['total'])): ?>	&nbsp;&#0187;&nbsp;<?php endif; ?>
   <?php endforeach; endif; unset($_from); ?>
	 <?php if ($this->_tpl_vars['extra_breadcrumbs']): ?>&nbsp;&#0187;<?php endif; ?>
  </div>
  </div>
  <?php endif; ?>
  <div id="subtitleContainer">
    <div id="subtitleBox">
      <?php if ($this->_tpl_vars['subtitle']): ?> 
        <span id="subtitle"><?php echo $this->_tpl_vars['subtitle']; ?>
</span>
     <?php endif; ?>
     <?php if ($this->_tpl_vars['needSwitcher']): ?>
     <span class="boxLeft right">
     <span id="appSwitcher" class="boxRight">
       <form action="<?php echo $_SERVER['PHP_SELF']; ?>
" method="get">
         <select name="<?php if ($this->_tpl_vars['className'] == 'oneApp'): ?>aid<?php else: ?>cid<?php endif; ?>" onchange="this.form.submit();">
  	 <option value=""><?php echo $this->_tpl_vars['switcherText']; ?>
</option>
  	  <?php $_from = $this->_tpl_vars['switcherList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['app']):
?>
  	   <option value="<?php echo $this->_tpl_vars['app']->id; ?>
"><?php echo $this->_tpl_vars['app']->name; ?>
</option>
  	  <?php endforeach; endif; unset($_from); ?>
         </select>
       </form>
     </span>
     </span>
  	 <div class="clear"></div>
     <?php endif; ?>
    </div>
  </div>
 </div>
<div class="clear"></div>
<div id="content_and_footer">