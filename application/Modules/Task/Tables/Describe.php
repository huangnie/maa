<?php
/**
 * Task/describe table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Task\Tables;

use Core\Table;

class Describe extends Table
{
	protected $_tableName = 'task_describe';

	protected $_tableField = array(
    	'id' => 'id',
    	'task_id' => 'task_id',         
     	'content' => 'content',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'task' => array(
			'table' => 'task',
			'map' => 'one', 
			'key' => array('task_id', 'id'),
			'select' => 'name',
		)
		
	);
