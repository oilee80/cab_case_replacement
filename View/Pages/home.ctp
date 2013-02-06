<div class="row-fluid">
<div id="enquiries-tree" class="span2">
<h4>Enquiry Tree</h4>
<ul></ul>
</div>

<div class="span10">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#client-details" data-toggle="tab">Client</a></li>
	</ul>

	<div class="tab-content">
		<div id="client-details">
<?php
	echo $this->BootstrapForm->create('Client', array('id' => 'clients'));
	echo $this->BootstrapForm->input('id');
	echo $this->BootstrapForm->input('reference');

echo '<fieldset>';
echo '<legend>Client</legend>';
	echo $this->BootstrapForm->input('title', array('empty' => '', 'append' => '<span id="ClientExistingTitle"></span>'));
	echo $this->BootstrapForm->input('first_name');
	echo $this->BootstrapForm->input('last_name',
		array(
			'append' => $this->Form->input('Client.annonymous')
		)
	);
	echo $this->BootstrapForm->input('date_of_birth', array('empty' => '', 'default' => '', 'maxYear' => date('Y'), 'minYear' => date('Y') - 100, 'div' => 'control-group date', 'separator' => ' / '));
echo '</fieldset>';

echo '<fieldset>';
echo '<legend>Address</legend>';
	$addressArgs = array('label' => false);

	echo $this->BootstrapForm->input('flat_name_number');
	echo $this->BootstrapForm->input('house_name_number');

	echo $this->BootstrapForm->input('address_line_1', $addressArgs);
	echo $this->BootstrapForm->input('address_line_2', $addressArgs);
	echo $this->BootstrapForm->input('address_line_3', $addressArgs);
	echo $this->BootstrapForm->input('address_line_4', $addressArgs);
	echo $this->BootstrapForm->input('post_code', array('append' => $this->BootstrapForm->button('Find Address', array('type' => false, 'id' => 'FindAddress'))));

	//echo $this->BootstrapForm->button('Find Address', array('type' => false, 'id' => 'FindAddress'));
echo '</fieldset>';

echo '<fieldset>';
echo '<legend>Contact Details</legend>';
	echo $this->BootstrapForm->input('phone_1');
	echo $this->BootstrapForm->input('phone_2');
	echo $this->BootstrapForm->input('email_1');
	echo $this->BootstrapForm->input('email_2');
echo '</fieldset>';

	echo $this->BootstrapForm->end();
?>
		</div>

		<div id="enquiries">
		<!--	This will use `section` elements for each of the open enquiries	-->
		</div>
	</div>
</div>