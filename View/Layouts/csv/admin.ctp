<?php
	header('Content-Type: text/plain');
	$filename = strtolower($this->name) . '-export.csv';
	header('Content-Disposition: attachment;filename='.$filename);

	echo $content_for_layout;
?>
