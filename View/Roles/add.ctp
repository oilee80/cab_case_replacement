<div class="roles form">
<?php echo $this->Form->create('Role');?>
	<fieldset>
		<legend><?php echo __('Add Role'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Roles'), array('action' => 'index'));?></li>
	</ul>
</div>
