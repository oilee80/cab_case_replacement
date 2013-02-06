
<?php echo $this->BootstrapForm->create('EnquiryType');?>
	<fieldset>
		<legend><?php echo __('%s Enquiry Type', array(ucwords($this->view))); ?></legend>
	<?php
		echo $this->BootstrapForm->input('id');
		echo $this->BootstrapForm->input('title');
		echo $this->BootstrapForm->input('description');
		echo $this->BootstrapForm->input('disabled');
	?>
	</fieldset>
<?php echo $this->BootstrapForm->end(__('Save'));?>


<?php
debug($this);
?>