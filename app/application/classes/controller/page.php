<?php
defined('SYSPATH') or die('No direct script access.');

/**
 * Page Controller Class
 * 
 * PHP Version 5.3
 * 
 * @category  PHP
 * @package   Controller
 * @author    Simon Wong (simon.wong@imagination.com)
 * @copyright 2011 All Rights Reserved Imagination
 * @license   Copyright 2011 All Rights Reserved Imagination
 * @version   CVS: <cvs_id>
 * @link      http://www.plottheshot.com
 */

class Controller_Page extends Controller_Template {
    //sets up the template
    public $template = 'page/template';
    
    public function action_static()
    {
        // Get the name of our requested page	
        $page = $this->request->param('page');
        
        // Assign the appropriate view file to the template content
        $this->template->content = View::factory('page/'. $page );
    }
}

?>