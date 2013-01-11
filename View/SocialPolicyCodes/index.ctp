<div class="socialPolicyCodes index">
	<h2><?php echo __('Social Policy Codes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('social_policy_code');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('disabled');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($socialPolicyCodes as $socialPolicyCode): ?>
	<tr>
		<td><?php echo h($socialPolicyCode['SocialPolicyCode']['id']); ?>&nbsp;</td>
		<td><?php echo h($socialPolicyCode['SocialPolicyCode']['social_policy_code']); ?>&nbsp;</td>
		<td><?php echo h($socialPolicyCode['SocialPolicyCode']['title']); ?>&nbsp;</td>
		<td><?php echo h($socialPolicyCode['SocialPolicyCode']['description']); ?>&nbsp;</td>
		<td><?php echo h($socialPolicyCode['SocialPolicyCode']['disabled']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $socialPolicyCode['SocialPolicyCode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $socialPolicyCode['SocialPolicyCode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $socialPolicyCode['SocialPolicyCode']['id']), null, __('Are you sure you want to delete # %s?', $socialPolicyCode['SocialPolicyCode']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Social Policy Code'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Contacts Spcs'), array('controller' => 'contacts_spcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contacts Spc'), array('controller' => 'contacts_spcs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries Spcs'), array('controller' => 'enquiries_spcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiries Spc'), array('controller' => 'enquiries_spcs', 'action' => 'add')); ?> </li>
	</ul>
</div>
