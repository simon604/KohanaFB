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


class Utils_Flash {

    // Flash type constants
    const TYPE_INFO = 'info';
    const TYPE_ERROR = 'error';
    const TYPE_SUCCESS = 'success';

    /**
     * Get flash message saved in session given name
     *
     * @param type $name
     * @return type
     */
    public static function get($name)
    {
        $session = Session::instance();
        $data = array('message' => $session->get('flash'.$name), 'type' => $session->get('flashtype'));
        $session->delete('flash'.$name);
        $session->delete('flashtype');

        return $data;
    }

    /**
     * Set flash message in session
     *
     * @param type $name
     * @param type $value
     */
    public static function set($name,$value, $type)
    {
        Session::instance()->set('flash'.$name, $value);
        Session::instance()->set('flashtype', $type);
    }
}
?>
