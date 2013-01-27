<?php

class AddressFixture extends CakeTestFixture {

	public $useDbConfig = 'test';

	public $fields = array(
		'id' => array('type' => 'char', 'length' => 36, 'key' => 'primary'),
		'address_line_1' => array('type' => 'string', 'length' => 255, 'null' => false),
		'address_line_2' => array('type' => 'string', 'length' => 255, 'null' => true),
		'address_line_3' => array('type' => 'string', 'length' => 255, 'null' => false),
		'address_line_4' => array('type' => 'string', 'length' => 255, 'null' => false),
		'post_code' => array('type' => 'string', 'length' => 15, 'null' => false),
		'new' => array('type' => 'boolean', 'null' => false, 'default' => true),
	);

	public $records = array(
		array('address_line_1' => 'Jackfield Close', 'address_line_2' => 'Matchborough', 'address_line_3' => 'Redditch', 'address_line_4' => 'Worcestershire', 'postcode' => 'B980BF', 'new' => true),
		array('address_line_1' => 'Knowle Close', 'address_line_2' => 'Churchill', 'address_line_3' => 'Redditch', 'address_line_4' => 'Worcestershire', 'postcode' => 'B989JN', 'new' => true),
		array('address_line_1' => 'Bele vue Road', 'address_line_2' => 'Southbourne', 'address_line_3' => 'Bournemouth', 'address_line_4' => 'Dorset', 'postcode' => 'BH63EN', 'new' => false)
	);

}