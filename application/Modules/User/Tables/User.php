<?php
/**
 * User/user table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace User\Tables;

use Core\Table;

class User extends Table
{
	protected $_tableName = 'user';

	protected $_tableField = array(
    	'id' => 'id',
    	'nick_name' => 'nick_name',
    	'real_name' => 'real_name',
    	'password' => 'password',
    	'tel' => 'tel',
    	'email' => 'email',
    	'qq' => 'qq',
    	'icon' => 'icon',
    	'is_delete' => 'is_delete',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(

		'follow' => array(
			'tab' => 'user_follow',
			'map' => 'multi',
			'key' => array('id', 'followed_uid'),
			'select' => 'follow_uid',
			'with' => array(
				'follow_uid' => array(
					'tab' => 'user',
					'key' => 'id',
					'select' => 'real_name, nick_name, icon, tel, qq'
				),
			)
		)

	);
}