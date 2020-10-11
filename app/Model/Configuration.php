<?php
App::uses('AppModel', 'Model');
/**
 * Configuration Model
 *
 */
class Configuration extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'configuration';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'config_ID';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'timer' => array(
			'decimal' => array(
				'rule' => array('decimal'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
