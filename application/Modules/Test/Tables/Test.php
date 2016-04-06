<?php
/**
 * Test/test table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Test\Tables;

use Core\Table;

class Test extends Table
{
	protected $_tableName = 'test';

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
		),
		'param' => array(
			'table' => 'test_param',
			'map' => 'multi', 
			'key' => array('id', 'test_id'), 
			'select' => 'name',
		)
		
	);
}