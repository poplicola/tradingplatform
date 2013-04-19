<div class="posts form">
<?php echo $this->Form->create('Post');?>
	<fieldset>
		<legend><?php __('Add Post'); ?></legend>
	<?php
		if ($group == 1) {
			echo $this->Form->input('user_id');
		} else {
			echo $this->Form->hidden(
				'user_id',
				array(
					'value' => $uid
				)
			);
		}
		
		echo "<div id='state-wrapper'>" . $this->Form->input('state', array('id' => 'state-select'));
		echo $this->Form->input('state', array('type' => 'text', 'id' => 'state-text')) . "</div>";
		
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
		<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index'));?></li>
	</ul>
</div>