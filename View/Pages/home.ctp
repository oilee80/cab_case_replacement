<div id="tasks_roles">
	<ul id="roles">
		
	</ul>

	<ul id="tasks">
		<li><a id="getTasks">Get Tasks</a></li>
	</ul>
</div>

<?php
	echo $this->BootstrapForm->create('Client', array('id' => 'clients'));
	echo $this->BootstrapForm->input('id');

echo '<fieldset>';
echo '<legend>Name</legend>';
	echo $this->BootstrapForm->input('title', array('empty' => ''));
	echo $this->BootstrapForm->input('first_name');
	echo $this->BootstrapForm->input('last_name');
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
	echo $this->BootstrapForm->input('post_code');

	echo $this->BootstrapForm->button('Find Address', array('type' => false, 'id' => 'FindAddress'));
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


<ul id="enquiries-tree">

</ul>

<div id="enquiries">
<!--	This will use `section` elements for each of the open enquiries	-->
</div>