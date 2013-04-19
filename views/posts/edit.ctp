<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('Edit Post'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('quantity');
		echo $this->Form->input('status', array('options' => array(
			'Available' => 'Available Now',
			'1Week' => '1 Week',
			'2Week' => '2 Weeks',
			'Month' => 'Month +'
		)));
		if ($group == 1) {
			echo $this->Form->input('zip');
		}
		echo $this->Form->input('price');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<?php if ($group == 1 || $group == 3): ?>
			<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Post.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Post.id'))); ?></li>
			<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index'));?></li>
		<?php endif; ?>
	</ul>
</div>