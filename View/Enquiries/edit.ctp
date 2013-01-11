<div class="enquiries form">
<?php echo $this->Form->create('Enquiry');?>
	<fieldset>
		<legend><?php echo __('Edit Enquiry'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('description');
		echo $this->Form->input('client_id');
		echo $this->Form->input('case_worker_id');
		echo $this->Form->input('enquiry_type_id');
		echo $this->Form->input('Spc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Enquiry.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Enquiry.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Case Worker'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enquiry Types'), array('controller' => 'enquiry_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry Type'), array('controller' => 'enquiry_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Social Policy Codes'), array('controller' => 'social_policy_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spc'), array('controller' => 'social_policy_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
