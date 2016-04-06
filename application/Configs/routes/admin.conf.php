<?php

return array(

	'index' => 'Controllers\Admin@index',

	'any' => array(	
		'login' => 'Controllers\Admin@login',
		// 'signin' => 'Controllers\Admin@signin',
		// 'signup' => 'Controllers\Admin@signup',


		// 注册
		'signup' => 'Controllers\Login@signup',
		// 登陆
		'signin' => 'Controllers\Login@signin',
		// 退出
		'signout' => 'Controllers\Login@signout',


	),

	// 后面都是要求登陆的

	'post' => array( 
		'upImage' => 'Controllers\Upload@upImage',
		'upAttchment' => 'Controllers\Upload@upAttachment',
	),
	
	
	'manage' => array(
	
		'any' => array(

			// Category 
			'editCategory/:num' => 'Manage\Controllers\Edit@editCategory',
			'saveCategory' => 'Manage\Controllers\Edit@saveCategory',
			'categoryList' => 'Manage\Controllers\View@categoryList',

			// Menu
			'editMenu/:num' => 'Manage\Controllers\Edit@editMenu',
			'saveMenu' => 'Manage\Controllers\Edit@saveMenu',
			'menuList' => 'Manage\Controllers\View@menuList',

			// Privalige
			'editPrivalige/:num' => 'Manage\Controllers\Edit@editPrivalige',
			'savePrivalige' => 'Manage\Controllers\Edit@savePrivalige',
			'privaligeList' => 'Manage\Controllers\View@privaligeList',

			// Role
			'editRole/:num' => 'Manage\Controllers\Edit@editRole',
			'saveRole' => 'Manage\Controllers\Edit@saverRole',
			'roleList' => 'Manage\Controllers\View@roleList',

			'editRoleMenu/:num' => 'Manage\Controllers\Edit@editRoleMenu',
			'saveRoleMenu' => 'Manage\Controllers\Edit@saveRoleMenu',
			'roleMenuList' => 'Manage\Controllers\View@roleMenuList',

			'editRolePrvalige/:num' => 'Manage\Controllers\Edit@editPolePrivalige',
			'saveRolePrvalige' => 'Manage\Controllers\Edit@savePolePrivalige',
			'rolePrvaligeList' => 'Manage\Controllers\View@rolePrivaligeList',
		)
	
	),
 

	'design' => array(
		// Design manage
		'any' => array(
			'edit/:num' => 'Design\Controllers\Design@edit',
			'save' => 'Design\Controllers\Design@save',
			'list' => 'Design\Controllers\View@designList',

			'editPattern/:num' => 'Design\Controllers\Pattern@editPattern',
			'savePattern' => 'Design\Controllers\Pattern@savePattern',
			'patternList' => 'Design\Controllers\View@patternList',

			'editTag/:num' => 'Design\Controllers\Tag@editTag',
			'saveTag' => 'Design\Controllers\Tag@saveTag',
			'tagList' => 'Design\Controllers\View@tagList',

			'followList' => 'Design\Controllers\View@followList',
			'commentList' => 'Design\Controllers\View@commentList',
		)
	)


);