<div class="enquiryTypes form">
<?php echo $this->Form->create('EnquiryType');?>
	<fieldset>
		<legend><?php echo __('Edit Enquiry Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EnquiryType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('EnquiryType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Enquiry Types'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Enquiries'), array('controller' => 'enquiries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Enquiry'), array('controller' => 'enquiries', 'action' => 'add')); ?> </li>
	</ul>
</div>
