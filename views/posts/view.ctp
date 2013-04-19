<div class="posts view">
<h2><?php  __('Post');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['id']; ?>
			&nbsp;
		</dd>
		<?php if ($group == 1): ?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
			<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
				&nbsp;
			</dd>
		<?php endif; ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quantity'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['quantity']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['status']; ?>
			&nbsp;
		</dd>
		<?php if ($group == 1): ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Zip'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['zip']; ?>
			&nbsp;
		</dd>
		<?php endif; ?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $post['Post']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<?php if($group == 1 || $group == 3): ?>
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Post', true), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<?php if($group==1 || $group==3): ?>
			<li><?php echo $this->Html->link(__('Delete Post', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?> </li>
			<li><?php echo $this->Html->link(__('List Posts', true), array('action' => 'index')); ?> </li>
			<li><?php echo $this->Html->link(__('New Post', true), array('action' => 'add')); ?> </li>
		<?php endif; ?>
	<?php else: ?>
		
		<?php

			if ($group == 1 || $group == 2) {
				echo $form->create(null, array('action' => 'email'));
				echo $form->input('bid');
				echo $form->submit();
				echo $form->end();
			} elseif (!$authUser) {
				echo $form->create('');
				echo $form->input('bid');
				echo "<span class='buttonlink'>" . $html->link('Submit', '/users/login') . "</span>";
				echo $form->end();
			}
		?>
	<?php endif; ?>
	</ul>
</div>
