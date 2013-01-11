<div class="enquiriesSpcs index">
	<h2><?php echo __('Enquiries Spcs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('social_policy_code_id');?></th>
			<th><?php echo $this->Paginator->sort('enquiry_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($enquiriesSpcs as $enquiriesSpc): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($enquiriesSpc['SocialPolicyCode']['title'], array('controller' => 'social_policy_codes', 'action' => 'view', $enquiriesSpc['SocialPolicyCode']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($enquiriesSpc['Enquiry']['title'], array('controller' => 'enquiries', 'action' => 'view', $enquiriesSpc['Enquiry']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $enquiriesSpc['EnquiriesSpc']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $enquiriesSpc['EnquiriesSpc']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $enquiriesSpc['EnquiriesSpc']['id']), null, __('Are you sure you want to delete # %s?', $enquiriesSpc['EnquiriesSpc']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Enquiries Spc'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Policy Code'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
	</ul>
</div>
