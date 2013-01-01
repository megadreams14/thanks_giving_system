<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.0
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2012 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * If you want to override the default configuration, add the keys you
 * want to change here, and assign new values to them.
 */

return array(
    'encoding'  => 'UTF-8',
    'always_load'  => array(
            /**
             * These packages are loaded on Fuel's startup.
             * You can specify them in the following manner:
             *
             * array('auth'); // This will assume the packages are in PKGPATH
             *
             * // Use this format to specify the path to the package explicitly
             * array(
             *     array('auth'	=> PKGPATH.'auth/')
             * 
             */
            'packages'  => array(
                'orm',
                'auth',
            ),
    ),
    'driver' => 'file', 
    'file' => array(
        'cookie_name'     => 'fuelfid',
        'path'            => APPPATH.'/tmp',
        'gc_probability'  => 5
    ),
    
);
