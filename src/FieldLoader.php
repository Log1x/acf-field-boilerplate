<?php

namespace Log1x\ExampleField;

use function Roots\add_actions;

class FieldLoader
{
    /**
     * Settings
     *
     * @var array
     */
    protected $settings;

    /**
     * Create a new instance of FieldLoader.
     *
     * @return void
     */
    public function __construct()
    {
        $this->settings = [
            'url'  => plugin_dir_url(__DIR__),
            'path' => plugin_dir_path(__DIR__)
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
            foreach (glob(__DIR__ . '/Fields/*.php') as $field) {
                $class = __NAMESPACE__ . '\Fields\\' . basename($field, '.php');

                spl_autoload_register(function () use ($field) {
                    require_once($field);
                });

                return new $class($this->settings);
            }
        });
    }
}
