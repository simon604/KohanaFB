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

    /**
     * -IP protect the admin panel
     * -Check auth for admin user
     *
     */
    public function before()
    {
        parent::before();

        // Auth to protect admin panel
        // set action that are protected in auth_array
        $auth_array = array('index', 'dashboard');
        $action = Request::current()->action();

        //Check IP restriction
        $access = Utils_Network::checkIPRestriction();
        if(!$access)
        {
            Request::current()->redirect("/");
        }

        // Check permission
        if(in_array($action, $auth_array))
        {
            if(!Auth::instance()->logged_in())
            {
                Request::current()->redirect("admin/login");
            }
        }
    }

    /**
     * Redirect to dashboard page on index
     */
    public function action_index()
    {
        // redirect to dashboard
        Request::current()->redirect("admin/dashboard");
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