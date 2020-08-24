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

if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
    require $composer;
}

add_filter('plugins_loaded', new class
{
    /**
     * Invoke the plugin.
     *
     * @return void
     */
    public function __invoke()
    {
        foreach (['acf/include_field_types', 'acf/register_fields'] as $hook) {
            add_filter($hook, function () {
                return new ExampleField(
                    plugin_dir_url(__FILE__) . 'public',
                    plugin_dir_path(__FILE__) . 'public'
                );
            });
        }
    }
});
