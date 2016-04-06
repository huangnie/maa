<?php
/**
 * Test/describe table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 2,10, 2016
 */

namespace Test\Tables;

use Core\Table;

class Result extends Table
{
	protected $_tableName = 'test_result';

	protected $_tableField = array(
    	'id' => 'id',
    	'Test_id' => 'Test_id',         
     	'content' => 'content',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );

	protected $_tableWith = array(
		
		'test' => array(
			'table' => 'test',
			'map' => 'one', 
			'key' => array('test_id', 'id'),
			'select' => 'name',
		)
		
	);
