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
		'admin' => 'password',
	),

);
