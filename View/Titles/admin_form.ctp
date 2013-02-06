<?php
	echo $this->BootstrapForm->create('Title');
	echo $this->BootstrapForm->input('id');

	$args = array('label' => false, 'placeholder' => 'Title');

	echo '<fieldset>';
	echo '<legend>Title</legend>';
	echo $this->BootstrapForm->input('title', $args);

	echo $this->BootstrapForm->input('disabled');
	echo '</fieldset>';

	echo $this->BootstrapForm->end('Save');
?>