<?php defined('SYSPATH') or die('No direct script access.');

 /**
 * This setups the page templates to detect if the request 
 * is via json/ajax and format it correct
 * 
 * @category  PHP
 * @package   CampainBase
 * @author    Zak Caley <zak.caley@imagination.com>
 * @copyright 2011 All rights Reserver Imagination
 * @license   Copyright 2011 All rights Reserver Imagination
 * @version   Release: <package_version>
 * @link      http://www.imagination.com
 */
class Controller_Template_JSON extends Controller_Template
{
    public $is_json = false;
    /**
     * Pre-flight tests 
     *
     * @return nothing
     */
    public function before()
    {
        parent::before();
        
        if ($this->request->param('format') == 'json') {
            $this->is_json     = true;
            $this->auto_render = false;
        } else {
            $this->template->isAjax = (bool) $this->request->param('ajax');
        }
    }
    
    /**
     * Post-flight tests 
     *
     * @return nothing 
     *      */
    public function after()
    {
        if ($this->is_json) {
            $this->request->headers['Content-Type'] = 'application/json';
            $data                                   = $this->template->get_data();
            echo json_encode(Arr::get($data, 'content', array()));
        }
        
        parent::after();
    }
}