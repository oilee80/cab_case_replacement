<div class="socialPolicyCodes form">
<?php echo $this->Form->create('SocialPolicyCode');?>
	<fieldset>
		<legend><?php echo __('Add Social Policy Code'); ?></legend>
	<?php
		echo $this->Form->input('social_policy_code');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('disabled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contacts Spcs'), array('controller' => 'contacts_spcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contacts Spc'), array('controller' => 'contacts_spcs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiries Spcs'), array('controller' => 'enquiries_spcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiries Spc'), array('controller' => 'enquiries_spcs', 'action' => 'add')); ?> </li>
	</ul>
</div>
