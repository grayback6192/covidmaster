<?php
App::uses('AppModel', 'Model');
/**
 * GameHistory Model
 *
 */
class GameHistory extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'game_history';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'game_history_ID';

}
