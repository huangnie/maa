<?php
/**
 * Project/subject table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Project\Tables;

use Core\Table;

class ProjectSubject extends Table
{
	protected $_tableName = 'project_component';

	protected $_tableField = array(
    	'id' => 'id',
    	'project_id' => 'project_id',         
    	'subject_id' => 'subject_id',
     	'is_delete' => 'is_delete',
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

		'subject' => array(
			'table' => 'project_subject', 
			'map' => 'multi',
			'key' => array('subject_id', 'id'), 
			'select' => 'name',
		),
		
	);
}