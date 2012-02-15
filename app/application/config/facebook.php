<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'appId'			=> '216340735092747',  
	'secret'		=> 'adbc9e854e66b96323fceb5afef0b1e2',  
	'cookie'		=> TRUE,
	'next'			=> 'http://audiocean.net/fbconnect',  
	'cancel_url'	=> 'http://audiocean.net',  
	'req_perms'		=> 'email,publish_stream', 
	// Full list of permission available here: https://developers.facebook.com/docs/reference/api/permissions/
	'fields'		=> 'uid, email, username'
	// Full list of fields available here: https://developers.facebook.com/docs/reference/fql/user/
);
