<?php

if(isset($_GET['_tpl']) && !empty($_GET['_tpl']) && isset($_GET['_file']) && !empty($_GET['_file'])){
	/** Set the project path to the docroot */
	define('PROJECT_PATH', realpath(dirname(__DIR__)) );

	/** Set the app path to the docroot */
	define('TEMPLATE_PATH', PROJECT_PATH. DIRECTORY_SEPARATOR. 'application' . DIRECTORY_SEPARATOR . 'Templates');
	
	$tpl = $_GET['_tpl'];
    $file = $_GET['_file'];
    $ex = pathinfo($file, PATHINFO_EXTENSION);
    $type = in_array($ex, array('js', 'css')) ? $ex : 'img';
    $asset_file = TEMPLATE_PATH . DIRECTORY_SEPARATOR . $tpl . DIRECTORY_SEPARATOR . $type . DIRECTORY_SEPARATOR . $file;
   
   	switch ($ex) {
   		case 'css':
   			header('Content-Type: text/css');
   			break;
   		case 'js':
			header('Content-Type: text/javascript'); 
   			break;
   		case 'jpeg':
			header('Content-Type: image/jpeg');  
   			break;
   		case 'text':
   			header('Content-Type: text/plain');  
   			break;
   		case 'json':
   			header('Content-Type: application/json');  
   			break;
   		case 'pdf':
   			header('Content-Type: application/pdf');  
   			break;
   		case 'json':
   			header('Content-Type: application/json');  
   			break;
   		case 'atom':
   			header('Content-Type: application/atom+xml');
   			break;
   		case 'rss':
   			header('Content-Type: application/rss+xml; charset=ISO-8859-1');
   			break;
   		case 'xml':
   			header('Content-Type: text/xml');  
   			break;
   		default:
   			//定义编码  
			header( 'Content-Type:text/html;charset=utf-8 ');  
   			break;
   	}

    echo file_get_contents($asset_file);
}
