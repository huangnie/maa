<?php

namespace Task\Tables;

use Core\Table;

class Member extends Table
{
	protected $_tableName = 'task_member';

	protected $_tableField = array(
    	'id' => 'id',
    	'task_id' => 'task_id',         
     	'user_id' => 'user_id',
     	'is_delete' => 'is_delete',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );


	protected $_tableWith = array(
			
		'task' => array(
			'tab' => 'task',
			'map' => 'multi', 
			'key' => array('task_id', 'id'), 
			'select' => 'name'
		),

		'user' => array(
			'tab' => 'user', 
			'map' => 'multi',
			'key' => array('user_id', 'id'), 
			'select' => 'name, tel, qq'
		)
	};
}