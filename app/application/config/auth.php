<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'       => 'file',
	'hash_method'  => 'sha256',
	'hash_key'     => 'Change this hash key!!',
	'lifetime'     => 1209600,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',

	// Username/password combinations for the Auth File driver
	'users' => array(
		'admin' => '0f5646e95f1f0c5c99e95ada149554d35294fc4941182e40b816c568db99ab58', //password default is 'password'
	),

);
