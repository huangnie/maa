<?php
/**
 * Department/describe table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Department\Tables;

use Core\Table;

class Describe extends Table
{
	protected $_tableName = 'department_describe';

	protected $_tableField = array(
    	'id' => 'id',
    	'department_id' => 'department_id',         
     	'content' => 'content',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'department' => array(
			'table' => 'department',
			'map' => 'one', 
			'key' => array('department_id', 'id'),
			'select' => 'name',
		)
		
	);
