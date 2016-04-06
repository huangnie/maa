<?php
/**
 * Department/image table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Project\Tables;

use Core\Table;

class Image extends Table
{
	protected $_tableName = 'department_image';

	protected $_tableField = array(
    	'id' => 'id',
    	'department_id' => 'department_id',         
     	'path' => 'path',
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
}