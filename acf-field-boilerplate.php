<?php
/*
Plugin Name: Advanced Custom Fields: Field Boilerplate
Plugin URI: https://github.com/log1x/acf-field-boilerplate
Description: A simple ACF Field Type boilerplate to quickly make clean, well structured custom field types.
Version: 1.0.0
Author: Brandon Nifong
Author URI: https://log1x.com

License: MIT License
License URI: http://opensource.org/licenses/MIT
*/

namespace Acf\Field\Boilerplate;

/**
 * Return if Field Loader already exists.
 */
if (class_exists('FieldLoader')) {
    return;
}

/**
 * Field Loader
 */
class FieldLoader
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->settings = [
            'version' => '1.0.0',
            'url'     => plugin_dir_url(__FILE__),
            'path'    => plugin_dir_path(__FILE__)
        ];

        load_plugin_textdomain('acf-field-boilerplate', false, plugin_basename(dirname(__FILE__ )) . '/resources/lang');
        add_action('acf/include_field_types', [$this, 'fields']);
        add_action('acf/register_fields', [$this, 'fields']);
    }

    /**
     * Include our ACF Field Types
     *
     * @param  integer $version
     * @return void
     */
    public function fields($version = 5)
    {
        include_once('fields/example.php');
    }
}

new FieldLoader();
