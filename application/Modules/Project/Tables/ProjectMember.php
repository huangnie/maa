<?php

namespace Project\Tables;

use Core\Table;

class ProjectMember extends Table
{
	protected $_tableName = 'project_member';

	protected $_tableField = array(
    	'id' => 'id',
    	'project_id' => 'project_id',         
     	'user_id' => 'user_id',
     	'is_delete' => 'is_delete',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );


	protected $_tableWith = array(
			
		'project' => array(
			'tab' => 'project',
			'map' => 'multi', 
			'key' => array('project_id', 'id'), 
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