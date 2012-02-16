<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Error Controller Class
 * 
 * PHP Version 5.3
 * 
 * @category  PHP
 * @package   Controller
 * @author    Zak Caley <zak.caley@imagination.com>
 * @copyright 2011 All Rights Reserved Imagination
 * @license   Copyright 2011 All Rights Reserved Imagination
 */
 

class Controller_Error extends Controller_Template {
    
    public $template = 'error/template';
    
    /**
     * Function to handle all errors
     * 
     * @param Exception $e
     * @return boolean 
     */
    public static function handle(Exception $e)
    {   
        Log::instance()->add(Log::DEBUG, $e);
        $response = new Response;
        $response->status(404);
        $view = new View('error/template');
        $view->message = $e->getMessage();
        $view->title = 'Sorry! Something went wrong.';
        $view->content = View::factory('error/error');

        echo $response->body($view)->send_headers()->body();
        return TRUE;
    }
}