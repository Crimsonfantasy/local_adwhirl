<?php /* Smarty version 2.6.26, created on 2011-12-17 22:15:28
         compiled from ../tpl/www/reports/applicationReportsOneAppCSV.tpl */ ?>
<?php header("Content-Type: text/x-csv; charset=utf-8"); header('Content-Disposition: attachment; filename="AdWhirlReport.csv"'); ?>
"Date","<?php echo $this->_tpl_vars['metricLabel']; ?>
"<?php $_from = $this->_tpl_vars['nets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['nname']):
?>,"<?php echo $this->_tpl_vars['nname']; ?>
"<?php endforeach; endif; unset($_from); ?> 
<?php $_from = $this->_tpl_vars['dates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['date']):
?>
"<?php echo $this->_tpl_vars['date']; ?>
",<?php if ($this->_tpl_vars['reports'][$this->_tpl_vars['date']][0][$this->_tpl_vars['metric']]): ?><?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['date']][0][$this->_tpl_vars['metric']]; ?>
<?php else: ?>0<?php endif; ?><?php $_from = $this->_tpl_vars['nets']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['nname']):
?>,<?php if ($this->_tpl_vars['reports'][$this->_tpl_vars['date']][$this->_tpl_vars['type']][$this->_tpl_vars['metric']]): ?><?php echo $this->_tpl_vars['reports'][$this->_tpl_vars['date']][$this->_tpl_vars['type']][$this->_tpl_vars['metric']]; ?>
<?php else: ?>0<?php endif; ?><?php endforeach; endif; unset($_from); ?>

<?php endforeach; endif; unset($_from); ?>
