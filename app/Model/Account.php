<?php
App::uses('AppModel', 'Model');
/**
 * Account Model
 *
 */
class Account extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'account';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'account_ID';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'maxLength' => array(
				'rule' => array('maxLength', '30'),
				'message' => 'Name should not be more than 30',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', '5'),
				'message' => 'Name should not be less than 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'avatar' => array(
			'maxLength' => array(
				'rule' => array('maxLength', '30'),
				'message' => 'Avatar should not be more than 30',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'minLength' => array(
				'rule' => array('minLength', '5'),
				'message' => 'Avatar should not be less than 5',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Email exists'
			),
			'email' => array(
				'rule' => 'notBlank',
				'message' => 'Must be an email format'
			)
		),
		'password' => array(
			'rule' => 'notBlank',
			'message' => 'Password cannot be left blank'
		)
	);
}
