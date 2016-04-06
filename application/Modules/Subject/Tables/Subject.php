<?php
/**
 * Subject/subject table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Subject\Tables;

use Core\Table;

class Subject extends Table
{
	protected $_tableName = 'subject';

	protected $_tableField = array(
    	'id' => 'id',
    	'parent_id' => 'parent_id',
    	'project_id' => 'project_id',  
    	'user_id' => 'user_id',       
     	'name' => 'name',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'project' => array(
			'table' => 'project',
			'map' => 'one', 
			'key' => array('project_id', 'id'), 
			'select' => 'name,',
		),

		'test' => array(
			'table' => 'test', 
			'map' => 'multi',
			'key' => array('id', 'subject_id'), 
			'select' => 'name',
		),
		
	);
}