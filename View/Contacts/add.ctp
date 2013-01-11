<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
		<legend><?php echo __('Add Contact'); ?></legend>
	<?php
		echo $this->Form->input('contact_type_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('notes');
		echo $this->Form->input('Spc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contacts'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contact Types'), array('controller' => 'contact_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact Type'), array('controller' => 'contact_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spc'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
