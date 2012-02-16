<?php defined('SYSPATH') or die('No direct script access.');

/**
 * API Controller Class
 * 
 * PHP Version 5.3
 * 
 * @category  PHP
 * @package   Controller
 * @author    Simon Wong <simon.wong@imagination.com>
 * @copyright 2012 All Rights Reserved Imagination
 * @license   Copyright 2012 All Rights Reserved Imagination
    */

Class Controller_Api extends Controller_Template_JSON
{
    // setup template
    public $template = 'api/template';

    /**
     * Sample function for outputing JSON data
     */
    public function action_index()
    {
        // do stuff
        // Set response data to array of output
        $responseData = array('hi'=>'test', 'sdfds' => 'dsfsd');

        // Output array data
        $this->template->set('responseData', $responseData);
    }
}

