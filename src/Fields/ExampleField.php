<?php

namespace Log1x\ExampleField\Fields;

class ExampleField extends \acf_field
{
    /**
     * Field Name
     *
     * @var string
     */
    public $name = 'example_field';

    /**
     * Field Label
     *
     * @var string
     */
    public $label = 'Example Field';

    /**
     * Field Category
     *
     * @var string
     */
    public $category = 'basic';

    /**
     * Field Defaults
     *
     * @var array
     */
    public $defaults = [
        'placeholder' => '',
        'prepend'     => '',
        'append'      => '',
    ];

    /**
     * Enable/Disable Enqueuing Assets
     *
     * @var boolean
     */
    public $assets = false;

    /**
     * Settings
     *
     * @var object
     */
    private $settings;

    /**
     * Create a new instance of ExampleField.
     *
     * @param  array $settings
     * @return void
     */
    public function __construct($settings)
    {
        $this->settings = (object) $settings;

        parent::__construct();
    }

    /**
     * Create extra settings for your field. These are visible when editing a field.
     *
     * @param  array $field
     * @return void
     */
    public function render_field_settings($field)
    {
        /** Placeholder */
        acf_render_field_setting($field, [
            'label'        => 'Placeholder Text',
            'instructions' => 'Appears within the input',
            'type'         => 'text',
            'name'         => 'placeholder',
        ]);

        /** Prepend */
        acf_render_field_setting($field, [
            'label'        => 'Prepend',
            'instructions' => 'Appears before the input',
            'type'         => 'text',
            'name'         => 'prepend',
        ]);

        /** Append */
        acf_render_field_setting($field, [
            'label'        => 'Append',
            'instructions' => 'Appears after the input',
            'type'         => 'text',
            'name'         => 'append',
        ]);
    }

    /**
     * Create the HTML interface for your field.
     *
     * @param  array $field
     * @return void
     */
    public function render_field($field)
    {
        acf_get_field_type('text')->render_field($field);
    }

    /**
     * This action is called in the admin_enqueue_scripts action on the edit screen where
     * your field is created.
     *
     * @return void
     */
    public function input_admin_enqueue_scripts()
    {
        if (! $this->assets) {
            return;
        }

        wp_enqueue_script('acf-' . $this->name, $this->settings->url . 'dist/js/field.js', [], null, true);
        wp_enqueue_style('acf-' . $this->name, $this->settings->url . 'dist/css/field.css', [], null);
    }

    /**
     * This action is called in the admin_head action on the edit screen where your
     * field is created.
     *
     * @return void
     */
    // public function input_admin_head()
    // {
    //
    // }

    /**
     * This function is called when the input form is on the current screen.
     *
     * @param  array $args
     * @return void
     */
    // public function input_form_data($args)
    // {
    //
    // }

    /**
     * This action is called in the admin_footer action on the edit screen where your
     * field is created.
     *
     * @return void
     */
    // public function input_admin_footer()
    // {
    //
    // }

    /**
     * This action is called in the admin_enqueue_scripts action on the edit screen
     * where your field is edited.
     *
     * @return void
     */
    // public function field_group_admin_enqueue_scripts()
    // {
    //
    // }

    /**
     * This action is called in the admin_head action on the edit screen where your
     * field is edited.
     *
     * @return void
     */
    // public function field_group_admin_head()
    // {
    //
    // }

    /**
     * This filter is applied to the fields value after it is loaded from the database.
     *
     * @param  mixed $value
     * @param  mixed $post_id
     * @param  array $field
     * @return mixed
     */
    // public function load_value($value, $post_id, $field)
    // {
    //     return $value;
    // }

    /**
     * This filter is applied to the $value before it is saved in the database.
     *
     * @param  mixed $value
     * @param  mixed $post_id
     * @param  array $field
     * @return mixed
     */
    // public function update_value($value, $post_id, $field)
    // {
    //     return $value;
    // }

    /**
     * This filter is applied to the $value after it is loaded from the database and
     * before it is returned to the template.
     *
     * @param  mixed $value
     * @param  mixed $post_id
     * @param  array $field
     * @return mixed
     */
    // public function format_value($value, $post_id, $field)
    // {
    //     return $value;
    // }

    /**
     * This filter is used to perform validation on the value prior to saving.
     *
     * @param  boolean $valid
     * @param  mixed   $value
     * @param  array   $field
     * @param  array   $input
     * @return boolean
     */
    // public function validate_value($valid, $value, $field, $input)
    // {
    //     return $valid;
    // }

    /**
     * This action is fired after a value has been deleted from the database.
     *
     * @param  mixed  $post_id
     * @param  string $key
     * @return void
     */
    // public function delete_value($post_id, $key)
    // {
    //
    // }

    /**
     * This filter is applied to the $field after it is loaded from the database.
     *
     * @param  array $field
     * @return array
     */
    // public function load_field($field)
    // {
    //     return $field;
    // }

    /**
     * This filter is applied to the $field before it is saved to the database.
     *
     * @param  array $field
     * @return array
     */
    // public function update_field($field)
    // {
    //     return $field;
    // }

    /**
     * This action is fired after a field is deleted from the database.
     *
     * @param  array $field
     * @return void
     */
    // public function delete_field($field)
    // {
    //     return $field;
    // }
}
