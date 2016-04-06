<?php
/**
 * Department/department table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Department\Tables;

use Core\Table;

class Department extends Table
{
	protected $_tableName = 'department';

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
			'table' => 'department',
			'map' => 'one', 
			'key' => array('department_id', 'id'), 
			'select' => 'name, host',
		),

		'member' => array(
			'table' => 'department_member', 
			'map' => 'multi',
			'key' => array('id', 'department_id'), 
			'select' => 'user_id',
			'with' => array(
				'user_id' => array(

				)
			)
		),
		
	);
}