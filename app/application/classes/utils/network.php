<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Utils_Flash Class
 *
 * PHP Version 5.3
 *
 * @category  PHP
 * @package   Utils
 * @author    Simon Wong (simon.wong@imagination.com)
 * @copyright 2012 All Rights Reserved Imagination
 * @license   Copyright 2012 All Rights Reserved Imagination
 */

class Utils_Network {

    /**
     * Check IP whitelist from config
     *
     * @return boolean
     */
    public static function checkIPRestriction()
    {
        $access = false;

        // GET IP ADDRESS OF REQUEST
        $headers = apache_request_headers();
        $ip = isset($headers["X-Forwarded-For"]) ? $headers["X-Forwarded-For"] : $_SERVER['REMOTE_ADDR'];
        $ips = explode(',', $ip);

        // Load whitelist from config
        $whitelist = Kohana::$config->load('ip_whitelist')->get('whitelist');

        // Check if request IP is in whitelist
        foreach($ips as $ip) {
            if (in_array($ip, $whitelist)) {
                $access = true;
            }
        }

        return $access;
    }
}
?>
