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

    public function action_index()
    {	
    	// Assign the appropriate view file to the template content
        $this->template->content = View::factory('public/index');
    }
}

?>