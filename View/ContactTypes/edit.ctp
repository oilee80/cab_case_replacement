<div class="contactTypes form">
<?php echo $this->Form->create('ContactType');?>
	<fieldset>
		<legend><?php echo __('Edit Contact Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('cab_code');
		echo $this->Form->input('disabled');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ContactType.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ContactType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Contact Types'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>
