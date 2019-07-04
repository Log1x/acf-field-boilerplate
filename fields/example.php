<?php

namespace Log1x\ExampleField\Fields;

use IlluminateAgnostic\Str\Support\Str;

/**
 * Return if Example already exists.
 */
if (class_exists('Example')) {
    return;
}

/**
 * Example field
 */
class Example extends \acf_field
{
    /**
     * Field Label
     *
     * @var string
     */
    var $label = 'Example Field';

    /**
     * Field Category
     *
     * @var string
     */
    var $category = 'basic';

    /**
     * Field Defaults
     *
     * @param array
     */
    var $defaults = [
        'placeholder' => '',
        'prepend'     => '',
        'append'      => '',
    ];

    /**
     * Enqueue Assets
     *
     * When enabled, field styles and javascript
     * are enqueued when field is present.
     *
     * @param boolean
     */
    protected $assets = false;

    /**
     * Constructor
     */
    public function __construct($settings)
    {
        $this->name = Str::snake($this->label);
        $this->slug = Str::slug($this->label);
        $this->url  = $settings['url'];

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
     * Create the HTML interface for your field
     *
     * @param  array $field
     * @return void
     */
    public function render_field($field)
    {
        acf_get_field_type('text')->render_field($field);
    }

    /**
     * This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
     * Use this action to add CSS + JavaScript to assist your render_field() action.
     *
     * @return void
     */
    public function input_admin_enqueue_scripts()
    {
        if (! $this->assets) {
            return;
        }

        wp_enqueue_script('acf-'.$this->slug, $this->url . 'dist/js/field.js', null, null, true);
        wp_enqueue_style('acf-'.$this->slug, $this->url . 'dist/css/field.css', false, null);
    }

    /**
     * This action is called in the admin_head action on the edit screen where your field is created.
     * Use this action to add CSS and JavaScript to assist your render_field() action.
     *
     * @return void
     */
    // public function input_admin_head()
    // {
    //     if (! $this->assets) {
    //         return;
    //     }
    //
    //     wp_enqueue_script('acf-'.$this->slug, $this->url . 'dist/js/field.js', null, null, true);
    //     wp_enqueue_style('acf-'.$this->slug, $this->url . 'dist/css/field.css', false, null);
    // }

    /**
     * This function is called once on the 'input' page between the head and footer
     * There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and
     * 'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
     * seen on comments / user edit forms on the front end. This function will always be called, and includes
     * $args that related to the current screen such as $args['post_id']
     *
     * @param  array $args
     * @return void
     */
    // public function input_form_data($args)
    // {
    //
    // }

    /**
     * This action is called in the admin_footer action on the edit screen where your field is created.
     * Use this action to add CSS and JavaScript to assist your render_field() action.
     *
     * @return void
     */
    // public function input_admin_footer()
    // {
    //
    // }

    /**
     * This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
     * Use this action to add CSS + JavaScript to assist your render_field_options() action.
     *
     * @return void
     */
    // public function field_group_admin_enqueue_scripts()
    // {
    //
    // }

    /**
     * This action is called in the admin_head action on the edit screen where your field is edited.
     * Use this action to add CSS and JavaScript to assist your render_field_options() action.
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
     * This filter is appied to the $value after it is loaded from the db and before it is returned to the template
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

    /*
    * This filter is used to perform validation on the value prior to saving.
    * All values are validated regardless of the field's required setting. This allows you to validate and return
    * messages to the user if the value is not correct
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
     * This action is fired after a value has been deleted from the db.
     * Please note that saving a blank value is treated as an update, not a delete
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
     * This filter is applied to the $field after it is loaded from the database
     *
     * @param  array $field
     * @return array
     */
    // public function load_field($field)
    // {
    //     return $field;
    // }

    /**
     * This filter is applied to the $field before it is saved to the database
     *
     * @param  array $field
     * @return array
     */
    // public function update_field($field)
    // {
    //     return $field;
    // }

    /**
     * This action is fired after a field is deleted from the database
     *
     * @param  array $field
     * @return void
     */
    // public function delete_field($field)
    // {
    //     return $field;
    // }
}

new Example($this->settings);
