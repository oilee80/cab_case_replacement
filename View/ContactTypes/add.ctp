<div class="contactTypes form">
<?php echo $this->Form->create('ContactType');?>
	<fieldset>
		<legend><?php echo __('Add Contact Type'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Contact Types'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Contacts'), array('controller' => 'contacts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contact'), array('controller' => 'contacts', 'action' => 'add')); ?> </li>
	</ul>
</div>
