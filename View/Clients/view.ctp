<div class="clients view">
<h2><?php  echo __('Client');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($client['Client']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 1'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_line_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 2'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_line_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 3'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_line_3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address Line 4'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address_line_4']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Post Code'); ?></dt>
		<dd>
			<?php echo h($client['Client']['post_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 1'); ?></dt>
		<dd>
			<?php echo h($client['Client']['phone_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone 2'); ?></dt>
		<dd>
			<?php echo h($client['Client']['phone_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 1'); ?></dt>
		<dd>
			<?php echo h($client['Client']['email_1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email 2'); ?></dt>
		<dd>
			<?php echo h($client['Client']['email_2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Annonymous'); ?></dt>
		<dd>
			<?php echo h($client['Client']['annonymous']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enquiries');?></h3>
	<?php if (!empty($client['Enquiry'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Case Worker Id'); ?></th>
		<th><?php echo __('Enquiry Type Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Enquiry'] as $enquiry): ?>
		<tr>
			<td><?php echo $enquiry['id'];?></td>
			<td><?php echo $enquiry['title'];?></td>
			<td><?php echo $enquiry['description'];?></td>
			<td><?php echo $enquiry['client_id'];?></td>
			<td><?php echo $enquiry['case_worker_id'];?></td>
			<td><?php echo $enquiry['enquiry_type_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'enquiries', 'action' => 'view', $enquiry['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'enquiries', 'action' => 'edit', $enquiry['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'enquiries', 'action' => 'delete', $enquiry['id']), null, __('Are you sure you want to delete # %s?', $enquiry['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Enquiry'), array('controller' => 'enquiries', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
