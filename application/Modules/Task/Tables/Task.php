<?php
/**
 * Task/task table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Task\Tables;

use Core\Table;

class Project extends Table
{
	protected $_tableName = 'task';

	protected $_tableField = array(
    	'id' => 'id',
    	'user_id' => 'user_id',         
     	'name' => 'name',
     	'host' => 'host',
     	'remark' => 'remark',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'user' => array(
			'table' => 'task',
			'map' => 'one', 
			'key' => array('task_id', 'id'), 
			'select' => 'name, host',
		),

		'subject' => array(
			'table' => 'task_subject', 
			'map' => 'multi',
			'key' => array('id', 'task_id'), 
			'select' => 'name,host',
		),
		
	);
}