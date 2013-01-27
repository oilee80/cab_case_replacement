<div id="tasks_roles">
	<ul id="roles">
		
	</ul>

	<ul id="tasks">
		<li><a id="getTasks">Get Tasks</a></li>
	</ul>
</div>

<?php
	echo $this->Form->create('Client', array('id' => 'clients'));
	echo $this->Form->input('id');

	echo $this->Form->input('first_name');
	echo $this->Form->input('last_name');

	echo $this->Form->input('flat_name_number');
	echo $this->Form->input('house_name_number');

	echo $this->Form->input('address_line_1');
	echo $this->Form->input('address_line_2');
	echo $this->Form->input('address_line_3');
	echo $this->Form->input('address_line_4');
	echo $this->Form->input('post_code');

	echo $this->Form->button('Find Address', array('type' => false, 'id' => 'FindAddress'));

	echo $this->Form->input('phone_1');
	echo $this->Form->input('phone_2');
	echo $this->Form->input('email_1');
	echo $this->Form->input('email_2');

	echo $this->Form->end();
?>


<ul id="enquiries-tree">

</ul>

<div id="enquiries">
<!--	This will use `section` elements for each of the open enquiries	-->
</div>