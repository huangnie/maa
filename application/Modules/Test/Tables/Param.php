<?php
/**
 * Test/testParam table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Test\Tables;

use Core\Table;

class Param extends Table
{
	protected $_tableName = 'test_param';

	protected $_tableField = array(
    	'id' => 'id',
    	'test_id' => 'test_id',         
     	'name' => 'name',
     	'value' => 'value',
     	'type' => 'type',
     	'is_must' => 'is_must',
     	'remark' => 'remark',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'test' => array(
			'table' => 'Test',
			'map' => 'one', 
			'key' => array('test_id', 'id'), 
			'select' => 'name',
		),
		 
		
	);
}