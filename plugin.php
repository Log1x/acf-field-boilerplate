<?php

/**
 * Plugin Name: Advanced Custom Fields: Field Boilerplate
 * Plugin URI:  https://github.com/log1x/acf-field-boilerplate
 * Description: A modernized starting point for custom ACF field types.
 * Version:     1.1.0
 * Author:      Brandon Nifong
 * Author URI:  https://github.com/log1x
 */

namespace Log1x\AcfExampleField;

add_filter('after_setup_theme', new class
{
   /**
     * The field label.
     *
     * @var string
     */
    public $label = 'Example Field';

    /**
     * The field name.
     *
     * @var string
     */
    public $name = 'example_field';

    /**
     * The field category.
     *
     * @var string
     */
    public $category = 'basic';

    /**
     * The field asset URI.
     *
     * @var string
     */
    public $uri;

    /**
     * The field asset path.
     *
     * @var string
     */
    public $path = 'public/';

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

        $this->uri = plugin_dir_url(__FILE__) . $this->path;
        $this->path = plugin_dir_path(__FILE__) . $this->path;

        require_once file_exists($composer = __DIR__ . '/vendor/autoload.php') ?
            $composer :
            __DIR__ . '/dist/autoload.php';

        $this->register();
        $this->registerAdminColumns();
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
                return new Field($this);
            });
        }
    }

    /**
     * Register the field type with ACP.
     *
     * @return void
     */
    protected function registerAdminColumns()
    {
        if (! defined('ACP_FILE')) {
            return;
        }

        add_filter('ac/column/value', function ($value, $id, $column) {
            if (
                ! is_a($column, '\ACA\ACF\Column') ||
                $column->get_acf_field_option('type') !== $this->name
            ) {
                return $value;
            }

            return get_field($column->get_meta_key()) ?: $value;
        }, 10, 3);
    }
});
