<?php

/**
 * Plugin Name: Advanced Custom Fields: Field Boilerplate
 * Plugin URI:  https://github.com/log1x/acf-field-boilerplate
 * Description: A clean starting point for custom Advanced Custom Fields field types.
 * Version:     1.0.0
 * Author:      Brandon Nifong
 * Author URI:  https://github.com/log1x
 */

add_filter('after_setup_theme', new class
{
    /**
     * Invoke the plugin.
     *
     * @return void
     */
    public function __invoke()
    {
        if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
            require_once $composer;
        }

        $this->register();

        if (defined('ACP_FILE')) {
            $this->hookAdminColumns();
        }
    }

    /**
     * Register the field type with ACF.
     *
     * @return void
     */
    protected function register()
    {
        foreach (['acf/include_field_types', 'acf/register_fields'] as $hook) {
            add_filter($hook, function () {
                return new Log1x\AcfExampleField\ExampleField(
                    plugin_dir_url(__FILE__),
                    plugin_dir_path(__FILE__)
                );
            });
        }
    }

    /**
     * Hook the Admin Columns Pro plugin to provide basic field support
     * if detected on the current WordPress installation.
     *
     * @return void
     */
    protected function hookAdminColumns()
    {
        add_filter('ac/column/value', function ($value, $id, $column) {
            if (
                ! is_a($column, '\ACA\ACF\Column') ||
                $column->get_acf_field_option('type') !== 'example'
            ) {
                return $value;
            }

            return get_field($column->get_meta_key()) ?? $value;
        }, 10, 3);
    }
});
