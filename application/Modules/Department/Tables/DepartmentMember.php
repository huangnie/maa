<?php

namespace Department\Tables;

use Core\Table;

class DepartmentMember extends Table
{
	protected $_tableName = 'department_member';

	protected $_tableField = array(
    	'id' => 'id',
    	'department_id' => 'department_id',         
     	'user_id' => 'user_id',
     	'is_delete' => 'is_delete',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );


	protected $_tableWith = array(
			
		'department' => array(
			'tab' => 'department',
			'map' => 'multi', 
			'key' => array('department_id', 'id'), 
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