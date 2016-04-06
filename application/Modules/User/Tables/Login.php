<?php

namespace User\Tables;

use Core\Table;

class Login extends Table
{
	protected $_tableName = 'user_login';

	protected $_tableWith = array(

		'user' => array(
			'tab' => 'user', 
			'map' => 'one',
			'key' => array('user_id', 'id'), 
			'select' => 'real_name, tel, qq'
		)
	);
}