<?php defined('SYSPATH') or die('No direct access allowed.');

return array(
	//  Your app information is at: developers.facebook.com/apps
	'appId'			=> '212570702174097',  
	'secret'		=> '677d8fe4ce0082094a0628ffcca9197a',  
	'cookie'		=> TRUE,
	'redirect_uri'	=> 'http://localhost:8888',  
	'display'		=> 'page',  
	'scope'			=> 'email,read_stream,read_friendlists', 
	// Full list of permission available here: https://developers.facebook.com/docs/reference/api/permissions/
	'fields'		=> 'uid, email, username'
	// Full list of fields available here: https://developers.facebook.com/docs/reference/fql/user/
);
