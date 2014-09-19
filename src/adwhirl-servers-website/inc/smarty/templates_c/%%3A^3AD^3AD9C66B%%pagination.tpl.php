<?php /* Smarty version 2.6.26, created on 2012-01-11 00:26:00
         compiled from ../tpl/www/common/pagination.tpl */ ?>
<?php $this->assign('current_page', $this->_tpl_vars['current_offset']/$this->_tpl_vars['items_per_page']+1); ?>
<?php $this->assign('left_ellipse', true); ?>
<?php $this->assign('right_ellipse', true); ?>
<?php $this->assign('total_pages', $this->_tpl_vars['total']/$this->_tpl_vars['items_per_page']); ?>

<?php if ($this->_tpl_vars['total_pages'] > 1): ?>
<div class='nav' style='text-align: right; float: right;'>
	<?php if ($this->_tpl_vars['current_offset'] == 0): ?>
		<span>&laquo; Previous</span>
	<?php else: ?>
		<a href='<?php echo $this->_tpl_vars['base']; ?>
?&o=<?php if ($this->_tpl_vars['current_offset']-$this->_tpl_vars['items_per_page'] <= 0): ?>0<?php else: ?><?php echo $this->_tpl_vars['current_offset']-$this->_tpl_vars['items_per_page']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['params']): ?>&<?php echo $this->_tpl_vars['params']; ?>
<?php endif; ?>' >&laquo; Previous</a>
	<?php endif; ?>

    <?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['start'] = (int)0;
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['total']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['step'] = ((int)$this->_tpl_vars['items_per_page']) == 0 ? 1 : (int)$this->_tpl_vars['items_per_page'];
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
if ($this->_sections['pages']['start'] < 0)
    $this->_sections['pages']['start'] = max($this->_sections['pages']['step'] > 0 ? 0 : -1, $this->_sections['pages']['loop'] + $this->_sections['pages']['start']);
else
    $this->_sections['pages']['start'] = min($this->_sections['pages']['start'], $this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] : $this->_sections['pages']['loop']-1);
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = min(ceil(($this->_sections['pages']['step'] > 0 ? $this->_sections['pages']['loop'] - $this->_sections['pages']['start'] : $this->_sections['pages']['start']+1)/abs($this->_sections['pages']['step'])), $this->_sections['pages']['max']);
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
        <?php $this->assign('page', $this->_sections['pages']['index']/$this->_tpl_vars['items_per_page']+1); ?>
        <?php if ($this->_tpl_vars['total_pages'] < 5): ?> 	        <?php if ($this->_tpl_vars['current_page'] == $this->_tpl_vars['page']): ?>
	            <span class='current'><?php echo $this->_tpl_vars['page']; ?>
</span>
	        <?php else: ?>
	            <a href='<?php echo $this->_tpl_vars['base']; ?>
?&o=<?php echo $this->_sections['pages']['index']; ?>
<?php if ($this->_tpl_vars['params']): ?>&<?php echo $this->_tpl_vars['params']; ?>
<?php endif; ?>'><?php echo $this->_tpl_vars['page']; ?>
</a>
	        <?php endif; ?>
        <?php else: ?>
            <?php if ($this->_tpl_vars['current_page'] == $this->_tpl_vars['page']): ?>
                <span class='current'><?php echo $this->_tpl_vars['page']; ?>
</span>
            <?php else: ?>
                <?php if ($this->_tpl_vars['current_page'] > 2 && $this->_tpl_vars['page'] < 2): ?> 
                  <a href='<?php echo $this->_tpl_vars['base']; ?>
?&o=<?php echo $this->_sections['pages']['index']; ?>
<?php if ($this->_tpl_vars['params']): ?>&<?php echo $this->_tpl_vars['params']; ?>
<?php endif; ?>'><?php echo $this->_tpl_vars['page']; ?>
</a>
                <?php elseif (( $this->_tpl_vars['page'] < $this->_tpl_vars['current_page'] && $this->_tpl_vars['page'] >= $this->_tpl_vars['current_page']-2 ) || ( $this->_tpl_vars['page'] > $this->_tpl_vars['current_page'] && $this->_tpl_vars['page'] <= $this->_tpl_vars['current_page']+2 ) || ( $this->_tpl_vars['page'] > $this->_tpl_vars['total_pages'] )): ?>                   <a href='<?php echo $this->_tpl_vars['base']; ?>
?&o=<?php echo $this->_sections['pages']['index']; ?>
<?php if ($this->_tpl_vars['params']): ?>&<?php echo $this->_tpl_vars['params']; ?>
<?php endif; ?>'><?php echo $this->_tpl_vars['page']; ?>
</a>
                <?php else: ?>
                    <?php if ($this->_tpl_vars['page'] < $this->_tpl_vars['current_page']): ?>
                        <?php if ($this->_tpl_vars['right_ellipse']): ?>&nbsp;...&nbsp;<?php $this->assign('right_ellipse', false); ?><?php endif; ?>
                    <?php else: ?>
                        <?php if ($this->_tpl_vars['left_ellipse']): ?>&nbsp;...&nbsp;<?php $this->assign('left_ellipse', false); ?><?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
	        <?php endif; ?>
	    <?php endif; ?>
        
	<?php endfor; endif; ?>

	<?php if ($this->_tpl_vars['current_offset'] >= ( $this->_tpl_vars['total'] - $this->_tpl_vars['items_per_page'] )): ?>
		<span>Next &raquo;</span>
	<?php else: ?>
		<a href='<?php echo $this->_tpl_vars['base']; ?>
?&o=<?php if ($this->_tpl_vars['current_offset']+$this->_tpl_vars['items_per_page'] > $this->_tpl_vars['total']): ?><?php echo $this->_tpl_vars['total']; ?>
<?php else: ?><?php echo $this->_tpl_vars['current_offset']+$this->_tpl_vars['items_per_page']; ?>
<?php endif; ?><?php if ($this->_tpl_vars['params']): ?>&<?php echo $this->_tpl_vars['params']; ?>
<?php endif; ?>'>Next &raquo;</a>
	<?php endif; ?>
</div>
<?php endif; ?>