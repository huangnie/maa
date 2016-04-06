<?php
/**
 * Project/attachment table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Project\Tables;

use Core\Table;

class Attachment extends Table
{
	protected $_tableName = 'project_attachment';

	protected $_tableField = array(
    	'id' => 'id',
    	'project_id' => 'project_id',        
    	'name' => 'name', 
     	'path' => 'path',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'project' => array(
			'table' => 'project',
			'map' => 'one', 
			'key' => array('project_id', 'id'),
			'select' => 'name',
		)
		
	);
}