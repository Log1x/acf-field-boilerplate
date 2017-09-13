<?php

namespace Acf\Field\Boilerplate;

/**
 * Exit if accessed directly
 */
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ExampleField
 */
if (!class_exists('ExampleField')) {
    class ExampleField extends \acf_field
    {
        /**
         * Construct
         */
        public function __construct($settings)
        {
            $this->name     = 'example_field';
            $this->label    = __('Example Field', 'acf-field-boilerplate');
            $this->category = 'basic';
            $this->defaults = [
                'placeholder' => '',
                'prepend'     => '',
                'append'      => '',
            ];
            $this->settings = $settings;

            parent::__construct();
        }

        /**
         *  render_field_settings()
         *
         *  Create extra settings for your field. These are visible when editing a field.
         *
         *  @param  array $field
         *  @return void
         */
        public function render_field_settings($field) {
            // Placeholder
            acf_render_field_setting($field, [
                'label'            => __('Placeholder Text', 'acf-field-boilerplate'),
                'instructions'    => __('Appears within the input', 'acf-field-boilerplate'),
                'type'            => 'text',
                'name'            => 'placeholder',
            ]);

            // Prepend
            acf_render_field_setting($field, [
                'label'            => __('Prepend', 'acf-field-boilerplate'),
                'instructions'    => __('Appears before the input', 'acf-field-boilerplate'),
                'type'            => 'text',
                'name'            => 'prepend',
            ]);


            // Append
            acf_render_field_setting($field, [
                'label'            => __('Append', 'acf-field-boilerplate'),
                'instructions'    => __('Appears after the input', 'acf-field-boilerplate'),
                'type'            => 'text',
                'name'            => 'append',
            ]);
        }

        /**
         *  render_field()
         *
         *  Create the HTML interface for your field
         *
         *  @param    array $field
         *  @return    void
         */
        public function render_field($field)
        {
            acf_get_field_type('text')->render_field($field);
        }

        /**
         *  input_admin_enqueue_scripts()
         *
         *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is created.
         *  Use this action to add CSS + JavaScript to assist your render_field() action.
         *
         *  @return    void
         */
        public function input_admin_enqueue_scripts()
        {
            $url     = $this->settings['url'];
            $version = $this->settings['version'];

            wp_register_script('acf-input-field-boilerplate', "{$url}dist/scripts/main.js", ['acf-input'], $version);
            wp_enqueue_script('acf-input-field-boilerplate');

            wp_register_style('acf-input-field-boilerplate', "{$url}dist/styles/main.css", ['acf-input'], $version);
            wp_enqueue_style('acf-input-field-boilerplate');
        }

        /**
         *  input_admin_head()
         *
         *  This action is called in the admin_head action on the edit screen where your field is created.
         *  Use this action to add CSS and JavaScript to assist your render_field() action.
         *
         *  @return void
         */
        public function input_admin_head()
        {

        }

        /**
         *  input_form_data()
         *
         *  This function is called once on the 'input' page between the head and footer
         *  There are 2 situations where ACF did not load during the 'acf/input_admin_enqueue_scripts' and
         *  'acf/input_admin_head' actions because ACF did not know it was going to be used. These situations are
         *  seen on comments / user edit forms on the front end. This function will always be called, and includes
         *  $args that related to the current screen such as $args['post_id']
         *
         *
         *  @param  array $args
         *  @return void
         */
        public function input_form_data($args)
        {

        }

        /**
         *  input_admin_footer()
         *
         *  This action is called in the admin_footer action on the edit screen where your field is created.
         *  Use this action to add CSS and JavaScript to assist your render_field() action.
         *
         *  @return void
         */
        public function input_admin_footer()
        {

        }

        /**
         *  field_group_admin_enqueue_scripts()
         *
         *  This action is called in the admin_enqueue_scripts action on the edit screen where your field is edited.
         *  Use this action to add CSS + JavaScript to assist your render_field_options() action.
         *
         *  @return void
         */
        public function field_group_admin_enqueue_scripts()
        {

        }

        /**
         *  field_group_admin_head()
         *
         *  This action is called in the admin_head action on the edit screen where your field is edited.
         *  Use this action to add CSS and JavaScript to assist your render_field_options() action.
         *
         *  @return void
         */
        public function field_group_admin_head()
        {

        }

        /**
         *  load_value()
         *
         *  This filter is applied to the $value after it is loaded from the db
         *
         *  @param  mixed $value
         *  @param  mixed $post_id
         *  @param  array $field
         *  @return $value
         */
        public function load_value($value, $post_id, $field)
        {
            return $field;
        }

        /**
         *  update_value()
         *
         *  This filter is applied to the $value before it is saved in the database.
         *
         *  @param  mixed $value
         *  @param  mixed $post_id
         *  @param  array $field
         *  @return $value
         */
        public function update_value($value, $post_id, $field)
        {
            return $field;
        }

        /**
         *  format_value()
         *
         *  This filter is appied to the $value after it is loaded from the db and before it is returned to the template
         *
         *  @param  mixed $value
         *  @param  mixed $post_id
         *  @param  array $field
         *  @return mixed
         */
        public function format_value($value, $post_id, $field)
        {
            return $field;
        }

        /*
        *  validate_value()
        *
        *  This filter is used to perform validation on the value prior to saving.
        *  All values are validated regardless of the field's required setting. This allows you to validate and return
        *  messages to the user if the value is not correct
        *
        *  @param  boolean $valid
        *  @param  mixed   $value
        *  @param  array   $field
        *  @param  array   $input
        *  @return boolean
        */
        public function validate_value($valid, $value, $field, $input)
        {
            return true;
        }

        /**
         *  delete_value()
         *
         *  This action is fired after a value has been deleted from the db.
         *  Please note that saving a blank value is treated as an update, not a delete
         *
         *  @param  mixed  $post_id
         *  @param  string $key
         *  @return void
         */
        public function delete_value($post_id, $key)
        {

        }

        /**
         *  load_field()
         *
         *  This filter is applied to the $field after it is loaded from the database
         *
         *  @param  array $field
         *  @return array
         */
        public function load_field($field)
        {
            return $field;
        }

        /**
         *  update_field()
         *
         *  This filter is applied to the $field before it is saved to the database
         *
         *  @param  array $field
         *  @return array
         */
        public function update_field($field)
        {
            return $field;
        }

        /**
         *  delete_field()
         *
         *  This action is fired after a field is deleted from the database
         *
         *  @param  array $field
         *  @return void
         */
        public function delete_field($field)
        {
            return $field;
        }
    }

    new ExampleField($this->settings);
}
