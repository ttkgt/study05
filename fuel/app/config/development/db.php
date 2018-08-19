<?php
/**
 * The development database settings. These get merged with the global settings.
 */

//↓↓自宅はこっち↓↓
//return array(
//	'default' => array(
//		'connection'  => array(
//			'dsn'        => 'mysqli:host=localhost;dbname=test2',
//			'username'   => 'root',
//			'password'   => '',
//		),
//	),


//↓↓会社はこっち↓↓
return array(
	'default' => array(
		'type'           => 'mysqli',
		'connection'     => array(
		    'hostname'       => 'localhost',
		    'port'           => '3306',
		    'database'       => 'test2',
		    'username'       => 'root',
		    'password'       => '',
		    'persistent'     => false,
		    'compress'       => false,
		),
		'identifier'     => '`',
		'table_prefix'   => '',
		'charset'        => 'utf8',
		'enable_cache'   => true,
		'profiling'      => false,
		'readonly'       => false,
	),	
);
