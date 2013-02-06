<?php
App::uses('AppModel', 'Model');
/**
 * Address Model
 *
 */
class Address extends AppModel {

	public function beforeSave($check) {
// Format the Address
		$this->data[$this->alias]['address_line_1'] = ucwords(strtolower($this->data[$this->alias]['address_line_1']));
		$this->data[$this->alias]['address_line_2'] = ucwords(strtolower($this->data[$this->alias]['address_line_2']));
		$this->data[$this->alias]['address_line_3'] = ucwords(strtolower($this->data[$this->alias]['address_line_3']));
		$this->data[$this->alias]['address_line_4'] = ucwords(strtolower($this->data[$this->alias]['address_line_4']));
		$this->data[$this->alias]['post_code'] = strtoupper($this->data[$this->alias]['post_code']);
		return true;
	}

	public function import($csv_file) {
		$h = fopen($csv_file, 'r');
		$data = array();
		while($line = fgetcsv($h)) {
//debug($line);
			if(empty($line[0]) && empty($line[1]) && empty($line[2]) && empty($line[3]) && empty($line[4]))
				continue;
			$data[] = array(
				'Address' => array(
					'address_line_1' => $line[0],
					'address_line_2' => $line[1],
					'address_line_3' => $line[2],
					'address_line_4' => $line[3],
					'post_code' => $line[4],
					'new' => false
				)
			);
		}
		$this->deleteAll(array());
		if(debug($this->saveAll($data)))
			return true;

/*		foreach($this->validationErrors As $i => $err) {
			echo 'Line: ' . ($i - 1);
			debug($data[$i]);
			debug($err);
		}*/
		return true;
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address_line_1' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address_line_3' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'address_line_4' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'post_code' => array(
			'postal' => array(
//				'rule' => array('postal', '/\\A\\b[A-Z]{1,2}[0-9][A-Z0-9]? *?[0-9][ABD-HJLNP-UW-Z]{2}\\b\\z/i'),
				'rule' => array('postal', '/^[A-Z]{1,2}[0-9][A-Z0-9]? *?[0-9][A-Z]{2}$/i', 'uk'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'new' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
