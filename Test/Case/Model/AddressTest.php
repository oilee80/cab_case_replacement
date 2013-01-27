<?php
App::uses('Address', 'Model');

class AddressTest extends CakeTestCase {
	public function setUp() {
		$this->Address = new Address();
	}

	public function testImport() {
		$data = array(
			'Address' => array(
				'address_line_1' => '',
				'address_line_2' => '',
				'address_line_3' => '',
				'address_line_4' => '',
				'post_code' => ''
			)
		);
		$result = $this->Address->save($data);
		$this->assertIdentical(false, $result);

		$data = array(
			'Address' => array(
				'address_line_1' => 'Line',
				'address_line_2' => '',
				'address_line_3' => 'Line',
				'address_line_4' => 'Line',
				'post_code' => 'AB12LB'
			)
		);
		$result = $this->Address->save($data);
		$this->assertIdentical($data['Address']['address_line_1'], $result['Address']['address_line_1']);
		$this->assertIdentical($data['Address']['address_line_2'], $result['Address']['address_line_2']);
		$this->assertIdentical($data['Address']['address_line_3'], $result['Address']['address_line_3']);
		$this->assertIdentical($data['Address']['address_line_4'], $result['Address']['address_line_4']);
		$this->assertIdentical($data['Address']['post_code'], $result['Address']['post_code']);
	}
}