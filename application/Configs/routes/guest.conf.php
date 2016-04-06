<?php

return array(
	'index' => 'Controllers\Index@index', 

	'any' => array(
		// 注册
		'login' => 'Controllers\Login@index',

		// 注册
		'signup' => 'Controllers\Login@signup',
		// 登陆
		'signin' => 'Controllers\Login@signin',
		// 退出
		'signout' => 'Controllers\Login@signout',
	),
	
	'get' => array(
		'edit' => 'Controllers\Index@edit', 
		'myProject/:num' => 'Controllers\Index@myProject',
		// 描述
		'project/:num' => 'Controllers\Index@project',
		'subject/:num' => 'Controllers\Index@subject', 
		'api/:num' => 'Controllers\Index@api',  
		 
		// 描述
		// 
		'subjectDetail/:num' => 'Controllers\Index@subjectDetail', 
		'projectDescribe/:num' => 'Controllers\Index@projectDescribe', 
		'subjectDescribe/:num' => 'Controllers\Index@subjectDescribe', 
 
	),

	'post' => array(
		// 上传
		'upImage' => 'Controllers\UpImage@upDesignImg',
		'upAttchment' => 'Controllers\UpAttachment@upDesignAttachment',

		//
		'saveSubject' => 'Controllers\Index@saveSubject',
	),


	// 室内设计
	'design' => array(
		'any' => array(
			//分页
			'page' => 'Design\Controllers\View@designPage',

			// Design view
			'list' => 'Design\Controllers\View@designList',
			
			'save' => 'Design\Controllers\Design@save',

			// Design feed
			'addTag' => 'Design\Controllers\Feed@addTag',
			'cancelTag' => 'Design\Controllers\Feed@cancelTag',

			'addComment' => 'Design\Controllers\Feed@addComment',
			'cancelComment' => 'Design\Controllers\Feed@cancelComment',

			'addFollow' => 'Design\Controllers\Feed@addFollow',
			'cancelFollow' => 'Design\Controllers\Feed@cancelFollow',

			'addCollect' => 'Design\Controllers\Feed@addCollect',
			'cancelCollect' => 'Design\Controllers\Feed@cancelCollect',

			'addLike' => 'Design\Controllers\Feed@addLike',
			'cancelLike' => 'Design\Controllers\Feed@cancelLike',
		)
	)

);