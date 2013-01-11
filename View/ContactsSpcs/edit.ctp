<div class="contactsSpcs form">
<?php echo $this->Form->create('ContactsSpc');?>
	<fieldset>
		<legend><?php echo __('Edit Contacts Spc'); ?></legend>
	<?php
		echo $this->Form->input('enquiries_id');
		echo $this->Form->input('social_policy_code_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ContactsSpc.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ContactsSpc.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contacts Spcs'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiries'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Social Policy Code'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
