<?php
	echo $this->BootstrapForm->create('Address');
	echo $this->BootstrapForm->input('id');

	$addrArgs = array('label' => false, 'placeholder' => 'Address Line 1');

	echo '<fieldset>';
	echo '<legend>Address</legend>';
	echo $this->BootstrapForm->input('address_line_1', $addrArgs);

	$addrArgs['placeholder'] = 'Address Line 2';
	echo $this->BootstrapForm->input('address_line_2', $addrArgs);

	$addrArgs['placeholder'] = 'Address Line 3';
	echo $this->BootstrapForm->input('address_line_3', $addrArgs);

	$addrArgs['placeholder'] = 'Address Line 4';
	echo $this->BootstrapForm->input('address_line_4', $addrArgs);
	echo '</fieldset>';

	echo '<fieldset>';
	echo '<legend>Post Code</legend>';

	$addrArgs['placeholder'] = 'Post Code';
	echo $this->BootstrapForm->input('post_code', $addrArgs);
	echo '</fieldset>';

	echo $this->BootstrapForm->end('Save');
?>