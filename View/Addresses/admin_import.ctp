<?php

	echo $this->Form->create('Address', array('type' => 'file'));
	echo $this->Form->input('import', array('type' => 'file'));
	echo $this->Form->end('Import');