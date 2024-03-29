<?php defined('SYSPATH') or die('No direct script access.');
/**
* Facebook authentication module
*
* @package		Kohana_FBAuth
* @author		Pap Tamas
* @copyright	(c) 2011 Pap Tamas
* @website		http://github.com/paptamas/Kohana-Facebook
* @license		http://www.opensource.org/licenses/isc-license.txt
*/
class Kohana_FBAuth
{
	public static $_instance;

	protected $_facebook;
	
	protected $_me;

	protected $_user;
	
	protected $_config;

	protected $_data;
	
	public $login_url;
	
	/**
	 * Creates the Facebook object
	 *
	 * @return	void
	 */
	protected function __construct()
	{
		// Load config
		$this->_config = Kohana::$config->load('facebook');
		
		include Kohana::find_file('vendor', 'facebook/facebook');		
		// Create Facebook object
		$this->_facebook = new Facebook(
			array(
				'appId'  => $this->_config->get('appId'),
				'secret' => $this->_config->get('secret'),
				'cookie' => $this->_config->get('cookie')
			)
		);

		try
		{
			$this->_me = $this->_facebook->api('/me');
			$this->_user = $this->_facebook->getUser();
		}
		catch (FacebookApiException $e)
		{
			// Do nothing.
		}
		
		$this->login_url = '';
	}
	
	/**
	 * Creates a singleton instance of the class
	 *
	 * @return	Kohana_FBAuth
	 */
	public static function instance()
	{
		if ( ! isset(self::$_instance))
			self::$_instance = new self;

		return self::$_instance;
	}
	
	/**
	 * Checks if user is logged
	 *
	 * @return	bool
	 */
	public function logged_in()
	{
		return $this->_me != NULL;
	}

	/**
	 * Return the user id in case of success, FALSE otherwise
	 * In case of failure a login url will be created in $this->logi_url
	 *
	 * @return	mixed
	 */
	public function user_id()
	{
		if ($this->logged_in())
		{
			return $this->_facebook->getUser();
		}
		else
		{
			$this->login_url();
			
			return FALSE;
		}
	}
	
	/**
	 * Returns a variable from user data, or $default in 
	 * case of failure
	 *
	 * The list of available variable names are defined in config file (=> fields).
	 *
	 * @param	string	variable name
	 * @param	string	default value to return
	 * @return	mixed
	 */
	public function get($key, $default = NULL)
	{
		if ( ! $uid = $this->user_id())
		{
			$this->login_url();
			
			throw new Exception('User is not logged in.');
		}
		else
		{
			// Get data from Facebook
			if (empty($this->_data)) 
			{
				$fql_query  =   array(  
					'method' => 'fql.query',  
					'query' => 'SELECT '.$this->_config->get('fields').' FROM user WHERE uid = ' . $uid  
				);  
				
				$this->_data = $this->_facebook->api($fql_query);  
			}
			
			return (isset($this->_data[0][$key])) ? $this->_data[0][$key] : $default;
		}
	}
	
	/**
	 * Creates a login url, based on req_perms, next, and cancel_url
	 *
	 * @return	string
	 */
	public function login_url()
	{
		return $this->login_url = $this->_facebook->getLoginUrl(
			array
			(  
				'scope'			=> $this->_config->get('scope'),
				'redirect_uri'	=> $this->_config->get('redirect_uri'),
				'display'		=> $this->_config->get('display'),
			));
	}

	/**
	 * Check whether the user has liked the page or not
	 *
	 * @return	boolean
	 */
	public function checkPageLike() 
	{	
		// Get signed request info from Facebook
		$signed_request = $this->_facebook->getSignedRequest();

		if(isset($signed_request['page']['liked'])) 
		{
			return $signed_request['page']['liked'];
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Get friends of user
	 *
	 * @return	boolean
	 */
	public function getUserGraph($graph_type) 
	{	
		$result = $this->_facebook->api('/me/'.$graph_type);
		var_dump($result);

	}
}
// END Kohana_FBAuth
