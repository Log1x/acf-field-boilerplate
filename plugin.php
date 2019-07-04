<?php
/*
Plugin Name: Advanced Custom Fields: Field Boilerplate
Plugin URI:  https://github.com/log1x/acf-field-boilerplate
Description: A better ACF Field Boilerplate.
Version:     1.0.3
Author:      Brandon Nifong
Author URI:  https://log1x.com
*/

namespace Log1x\ExampleField;

use function Roots\add_actions;

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
     * Fields to load
     *
     * @var array
     */
    protected $fields = [
        'example',
    ];

    /**
     * Settings
     *
     * @var array
     */
    protected $settings;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->settings = [
            'url'  => plugin_dir_url(__FILE__),
            'path' => plugin_dir_path(__FILE__)
        ];

        $this->register();
    }

    /**
     * Register our ACF Field Types
     *
     * @return void
     */
    protected function register()
    {
        add_actions([
            'acf/include_field_types',
            'acf/register_fields'
        ], function () {
            foreach ($this->fields as $field) {
                if (file_exists($field = __DIR__ . "/fields/{$field}.php")) {
                    require_once($field);
                }
            }
        });
    }
}

if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require_once($composer);
}

new FieldLoader();

