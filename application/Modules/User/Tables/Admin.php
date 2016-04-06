<?php

namespace User\Tables;

use Core\Table;

class Admin extends Table
{
	protected $_tableName = 'user_admin';

	protected $_tableWith = array(

		'user' => array(
			'tab' => 'user', 
			'map' => 'one',
			'key' => array('user_id', 'id'), 
			'select' => 'real_name, tel, qq'
		)
	}
}