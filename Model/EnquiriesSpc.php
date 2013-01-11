<?php
App::uses('AppModel', 'Model');
/**
 * EnquiriesSpc Model
 *
 * @property SocialPolicyCode $SocialPolicyCode
 * @property Enquiry $Enquiry
 */
class EnquiriesSpc extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'social_policy_code_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'enquiry_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'SocialPolicyCode' => array(
			'className' => 'SocialPolicyCode',
			'foreignKey' => 'social_policy_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Enquiry' => array(
			'className' => 'Enquiry',
			'foreignKey' => 'enquiry_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
