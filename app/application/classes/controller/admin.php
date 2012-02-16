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

    // List of IP addresses that are allowed to access the admin interface
    protected static $admin_ip_whitelist = array(
        '127.0.0.1',            // localhost (IPv4)
        '::1',                        // localhost (IPv6)
        '203.45.29.198',    // Imagination
        '202.153.33.187',    // Imagination
        '218.189.130.249',    // Imagination HK Proxy
    );

    public function index() {

    }


}