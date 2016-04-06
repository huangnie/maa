<?php
/**
 * Subject/describe table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Subject\Tables;

use Core\Table;

class Describe extends Table
{
	protected $_tableName = 'subject_describe';

	protected $_tableField = array(
    	'id' => 'id',
    	'subject_id' => 'subject_id',         
     	'content' => 'content',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'subject' => array(
			'table' => 'subject',
			'map' => 'one', 
			'key' => array('subject_id', 'id'),
			'select' => 'name',
		)
		
	);
}
