<div class="enquiryTypes view">
<h2><?php  echo __('Enquiry Type');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($enquiryType['EnquiryType']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($enquiryType['EnquiryType']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($enquiryType['EnquiryType']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Disabled'); ?></dt>
		<dd>
			<?php echo h($enquiryType['EnquiryType']['disabled']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Enquiry Type'), array('action' => 'edit', $enquiryType['EnquiryType']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Enquiry Type'), array('action' => 'delete', $enquiryType['EnquiryType']['id']), null, __('Are you sure you want to delete # %s?', $enquiryType['EnquiryType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiry Types'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry Type'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Enquiries');?></h3>
	<?php if (!empty($enquiryType['Enquiry'])):?>
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
		foreach ($enquiryType['Enquiry'] as $enquiry): ?>
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
