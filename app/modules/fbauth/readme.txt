Step 1.
Create the folder 'fbauth' in modules directory.

Step 2.
Copy the 'classes', 'config' and 'vendor' folder to it.

Step 3. 
Edit the config/facebook.php file.

Step 4.
Enable the fbauth module in Kohana's bootstrap file.

Step 5.
Use the module!
Example:

$fbauth = FBAuth::instance();
try
{
	$username = $fbauth->get('username');
	$email = $fbauth->get('email');
	$uid = $fbauth->get('uid');
	// Do something		
}
catch (Exception $e)
{
	Request::current()->redirect($facebook->login_url());
}
