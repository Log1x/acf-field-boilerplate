<?php

/**
 * Plugin Name: Advanced Custom Fields: Field Boilerplate
 * Plugin URI:  https://github.com/log1x/acf-field-boilerplate
 * Description: A modernized starting point for custom ACF field types.
 * Version:     1.1.0
 * Author:      Brandon Nifong
 * Author URI:  https://github.com/log1x
 */

namespace Log1x\AcfFieldBoilerplate;

add_filter('after_setup_theme', new class
{
    /**
     * The field assets.
     *
     * @var array
     */
    protected $assets = ['field.css', 'field.js'];

    /**
     * The ACF field registration hooks.
     *
     * @return array
     */
    protected $hooks = [
        'acf/include_field_types',
        'acf/register_fields',
    ];

    /**
     * Invoke the plugin.
     *
     * @return void
     */
    public function __invoke()
    {
        if (! class_exists('\ACF')) {
            return;
        }

        require_once file_exists($composer = __DIR__ . '/vendor/autoload.php') ?
            $composer :
            __DIR__ . '/dist/autoload.php';

        $this->register();
        $this->hookAdminColumns();
    }

    /**
     * Register the field type with ACF.
     *
     * @return void
     */
    protected function register()
    {
        foreach ($this->hooks as $hook) {
            add_filter($hook, function () {
                return new ExampleField(
                    plugin_dir_url(__FILE__),
                    plugin_dir_path(__FILE__),
                    $this->assets
                );
            });
        }
    }

    /**
     * Provide basic field support to Admin Columns Pro.
     *
     * @return void
     */
    protected function hookAdminColumns()
    {
        if (! defined('ACP_FILE')) {
            return;
        }

        add_filter('ac/column/value', function ($value, $id, $column) {
            if (
                ! is_a($column, '\ACA\ACF\Column') ||
                $column->get_acf_field_option('type') !== 'example_field'
            ) {
                return $value;
            }

            return get_field($column->get_meta_key()) ?? $value;
        }, 10, 3);
    }
});
