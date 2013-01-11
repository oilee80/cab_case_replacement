<div class="contactsSpcs index">
	<h2><?php echo __('Contacts Spcs');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('enquiries_id');?></th>
			<th><?php echo $this->Paginator->sort('social_policy_code_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($contactsSpcs as $contactsSpc): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($contactsSpc['Enquiries']['title'], array('controller' => 'enquiries', 'action' => 'view', $contactsSpc['Enquiries']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($contactsSpc['SocialPolicyCode']['title'], array('controller' => 'social_policy_codes', 'action' => 'view', $contactsSpc['SocialPolicyCode']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contactsSpc['ContactsSpc']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contactsSpc['ContactsSpc']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contactsSpc['ContactsSpc']['id']), null, __('Are you sure you want to delete # %s?', $contactsSpc['ContactsSpc']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Contacts Spc'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiries'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Policy Code'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
