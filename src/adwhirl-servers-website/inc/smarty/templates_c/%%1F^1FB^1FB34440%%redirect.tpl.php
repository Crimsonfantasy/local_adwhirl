<?php /* Smarty version 2.6.26, created on 2012-01-11 00:26:00
         compiled from ../tpl/www/common/redirect.tpl */ ?>
<html>
 <head>
  <title>Redirecting...</title>
   <meta http-equiv="refresh" content="0; url=<?php echo $this->_tpl_vars['url']; ?>
">
  </head>
  <body>
   <script type="text/javascript" language="javascript">
    location.replace("<?php echo $this->_tpl_vars['url']; ?>
")
   </script>
 </body>
</html>