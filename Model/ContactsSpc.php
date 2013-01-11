<?php
App::uses('AppModel', 'Model');
/**
 * ContactsSpc Model
 *
 * @property Enquiries $Enquiries
 * @property SocialPolicyCode $SocialPolicyCode
 */
class ContactsSpc extends AppModel {
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'enquiries_id' => array(
			'uuid' => array(
				'rule' => array('uuid'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Enquiries' => array(
			'className' => 'Enquiries',
			'foreignKey' => 'enquiries_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SocialPolicyCode' => array(
			'className' => 'SocialPolicyCode',
			'foreignKey' => 'social_policy_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
