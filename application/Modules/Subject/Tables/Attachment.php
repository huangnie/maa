<?php
/**
 * Subject/attachment table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Subject\Tables;

use Core\Table;

class Attachment extends Table
{
	protected $_tableName = 'subject_attachment';

	protected $_tableField = array(
    	'id' => 'id',
    	'subject_id' => 'subject_id',        
    	'name' => 'name', 
     	'path' => 'path',
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