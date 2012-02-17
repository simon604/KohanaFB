<?php defined('SYSPATH') or die('No direct script access.');

    /**
     * the Admin Controller Class
     *
     * @category  PHP
     * @package   Controller
     * @author    Simon Wong <simon.wong@imagination.com>
     * @copyright 2011 All Rights Reserved Imagination
     * @license   Copyright 2011 All Rights Reserved Imagination
     */


class Controller_Admin extends Controller_Template {

    public $template = '/admin/template';

    // List of IP addresses that are allowed to access the admin interface
    protected static $admin_ip_whitelist = array(
        '127.0.0.1',            // localhost (IPv4)
        '::1',                        // localhost (IPv6)
        '203.45.29.198',    // Imagination
        '202.153.33.187',    // Imagination
        '218.189.130.249',    // Imagination HK Proxy
    );

    public function before()
    {
        parent::before();

        // Auth to protect admin panel
        // set action that are protected in auth_array
        $auth_array = array('index', 'dashboard');
        $action = Request::current()->action();

        // Check permission
        if(in_array($action, $auth_array))
        {
            if(!Auth::instance()->logged_in())
            {
                // if user is logged in but not enough permission, throw error
                if(Auth::instance()->logged_in())
                {
                    throw new Exception('Invalid access.');
                }
                else
                {
                    Request::current()->redirect("admin/login");
                }
            }
        }
    }

    /**
     * Action for admin panel main dashboard
     *
     */
    public function action_dashboard()
    {
        //set view for template
        $this->template->content = View::factory('admin/dashboard');
    }

    /**
     * Action to handle admin panel login
     *
     */
    public function action_login()
    {
        $this->template->content = View::factory('admin/login')
            ->bind('message', $message);

        if (HTTP_Request::POST == $this->request->method())
        {
            // Attempt to login user
            $user = Auth::instance()->login($this->request->post('email'), $this->request->post('password'));

            // If successful, redirect user
            if ($user)
            {
                Request::current()->redirect('admin/dashboard');
            }
            else
            {
                $message = 'Login failed';
            }
        }
    }

    /**
     * Action to handle admin panel login
     *
     */
    public function action_logout()
    {
        // Log user out
        Auth::instance()->logout();

        // Redirect to login page
        Request::current()->redirect('admin/login');
    }




}