<?php /* Smarty version 2.6.26, created on 2012-01-11 05:54:46
         compiled from ../tpl/www/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', '../tpl/www/footer.tpl', 16, false),)), $this); ?>
  <?php echo '
  <script type="text/javascript">
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
  </script>
  <script type="text/javascript">
    try {
    var pageTracker = _gat._getTracker("UA-11870556-1");
    pageTracker._trackPageview();
    } catch(err) {}
  </script>
  '; ?>


  <div id="footer" style="width:100%">
   <hr />
   <span>&copy; 2009-<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 AdMob, Inc.</span>
  </div>
</div>

 </body>
</html>