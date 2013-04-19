<?php if ($group == 1 || $group == 3): ?><div class="posts index">
	<h2><?php __('Posts');?></h2>
<?php endif; ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<?php if ($group == 1): ?>
				<th><?php echo $this->Paginator->sort('user_id');?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('quantity');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<?php if ($group == 1): ?>
				<th><?php echo $this->Paginator->sort('zip');?></th>
			<?php endif; ?>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($posts as $post):
		if ($group == 1 || $group == 2 || $page == !$authUser || $post['User']['id'] == $uid) {
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $post['Post']['id']; ?>&nbsp;</td>
		<?php if ($group == 1): ?>
			<td>
				<?php echo $this->Html->link($post['User']['id'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			</td>
		<?php endif; ?>
		<?php echo $form->create('Post', array('action' => 'index', 'id' => 'filters')); ?>
		<td><?php echo $post['Post']['quantity']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['status']; ?>&nbsp;</td>
		<?php if ($group == 1): ?>
			<td><?php echo $post['Post']['zip']; ?>&nbsp;</td>
		<?php endif; ?>
		<td><?php echo $post['Post']['price']; ?>&nbsp;</td>
		<td><?php echo $post['Post']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $post['Post']['id'])); ?>
			<?php if($group == 1 || $group == 3): ?>
				<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $post['Post']['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $post['Post']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $post['Post']['id'])); ?>
			<?php endif; ?>
			<?php
				if ($group == 1 || $group == 2) {
					echo $html->link('Bid', '/bids/');
				} elseif (!$authUser) {
					echo $html->link('Bid', '/users/login');
				}
			?>
		</td>
	</tr>
<?php } endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
<?php if ($group == 1 || $group == 3): ?></div><?php endif; ?>
<?php if ($group == 1 || $group == 3): ?>
	<div class="actions">
		<h3><?php __('Actions'); ?></h3>
		<ul>
			<li><?php echo $this->Html->link(__('New Post', true), array('action' => 'add')); ?></li>
		</ul>
	</div>
<?php endif; ?>