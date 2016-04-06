<?php
/**
 * Subject/subjectMember table
 *
 * @author Nickelhuang - nickelyellow@gamul.com
 * @version 1.1
 * @date 2,8, 2016
 * @date updated 3,3, 2016
 */
namespace Subject\Tables;

use Core\Table;

class SubjectMember extends Table
{
	protected $_tableName = 'subject_member';

	protected $_tableField = array(
    	'id' => 'id',
    	'subject_id' => 'subject_id',         
     	'user_id' => 'user_id',
     	'is_delete' => 'is_delete',
    	'create_time' => 'create_date',
    	'update_time' => 'update_date',
    );


	protected $_tableWith = array(
			
		'subject' => array(
			'tab' => 'subject',
			'map' => 'multi', 
			'key' => array('subject_id', 'id'), 
			'select' => 'name'
		),

		'user' => array(
			'tab' => 'user', 
			'map' => 'multi',
			'key' => array('user_id', 'id'), 
			'select' => 'name, tel, qq'
		)
	};
}