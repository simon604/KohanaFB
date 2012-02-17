<?php
defined('SYSPATH') or die('No direct script access.');

/**
 * Public Controller Class
 * 
 * PHP Version 5.3
 * 
 * @category  PHP
 * @package   Controller
 * @author    Simon Wong (simon.wong@imagination.com)
 * @copyright 2011 All Rights Reserved Imagination
 * @license   Copyright 2012 All Rights Reserved Imagination
 */

class Controller_Public extends Controller_Template {
    
    //sets up the template
    public $template = 'public/template';

    /**
    * Run before other functions   
    * 
    * @return void
    */
    public function before()
    {
        parent::before();

        // Set up shared template information
        $this->template->title = 'Change the title here';
        $this->template->header = View::factory('public/header');
        $this->template->footer = View::factory('public/footer');
    }


    /**
    * Typical entry point for application. aka homepage of the app.
    *
    */
    public function action_index()
    {	
        // Setup Facebook instance and check if the page has been liked
        $fbauth = FBAuth::instance();
        $pageLiked = $fbauth->checkPageLike();        

        // Redirect to app or like gate
        if($pageLiked) 
        {
            $this->afterLikeGate();
        } 
        else 
        { 
            $this->beforeLikeGate();          
        }
    }

    /**
    * Handles logic for like gate
    *
    */
    public function beforeLikeGate()
    {   
        // do stuff here

        $fbauth = FBAuth::instance();
        if ($fbauth->logged_in()) {
            // user is logged in
            echo "i am logged in";

            $fbauth->getUserGraph('likes');

        } else {
            // user needs to log in and auth
            echo "im not logged in and I need a login link";
            $loginUrl = $fbauth->login_url();
            echo $loginUrl;
            //echo("<script> top.location.href='" . $loginUrl . "'</script>");
        }

        //set view for template
        $this->template->content = View::factory('public/likegate');
    }

    /**
    * Handles logic for page after the user has liked the page
    *
    */
    public function afterLikeGate()
    {   
        // do stuff here

        //set view for template
        $this->template->content = View::factory('public/index');
    }
}

?>