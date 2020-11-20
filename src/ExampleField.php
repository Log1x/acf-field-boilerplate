<?php

namespace Log1x\AcfFieldBoilerplate;

class ExampleField extends \acf_field
{
    use Concerns\AssetManifest;

    /**
     * The field name.
     *
     * @var string
     */
    public $name = 'example_field';

    /**
     * The field label.
     *
     * @var string
     */
    public $label = 'Example Field';

    /**
     * The field category.
     *
     * @var string
     */
    public $category = 'basic';

    /**
     * The field defaults.
     *
     * @var array
     */
    public $defaults = [
        'placeholder' => '',
    ];

    /**
     * The asset URI.
     *
     * @var string
     */
    protected $uri;

    /**
     * The asset path.
     *
     * @var string
     */
    protected $path;

    /**
     * Create a new example field instance.
     *
     * @param  string $uri
     * @param  string $path
     * @return void
     */
    public function __construct($uri, $path)
    {
        $this->uri = trailingslashit($uri);
        $this->path = trailingslashit($path);

        parent::__construct();
    }

    /**
     * The rendered field type settings shown during field group creation.
     *
     * @param  array $field
     * @return void
     */
    public function render_field_settings($field)
    {
        acf_render_field_setting($field, [
            'label' => 'Return Format',
            'instructions' => 'The format of the returned data.',
            'type' => 'select',
            'ui' => '1',
            'choices' => [['object' => 'Object'], ['string' => 'String']],
            'name' => 'return_format',
        ]);
    }

    /**
     * The rendered output for the field type.
     *
     * @param  array $field
     * @return void
     */
    public function render_field($field)
    {
        echo sprintf(
            '<input
                class="acf-field-input acf-example-field-input"
                type="text"
                name="%s[firstName]"
                value="%s"
            />',
            $field['name'],
            $field['value']['firstName']
        );

        echo sprintf(
            '<input
                class="acf-field-input acf-example-field-input"
                type="text"
                name="%s[lastName]"
                value="%s"
            />',
            $field['name'],
            $field['value']['lastName']
        );
    }

    /**
     * Modify the field value before loading from the database.
     *
     * @param  mixed $value
     * @param  int   $post_id
     * @param  array $field
     * @return mixed
     */
    public function load_value($value, $post_id, $field)
    {
        return $value;
    }

    /**
     * Modify the field value before saving to the database.
     *
     * @param  mixed $value
     * @param  int   $post_id
     * @param  array $field
     * @return mixed
     */
    public function update_value($value, $post_id, $field)
    {
        return $value;
    }

    /**
     * Format the field value output before rendering.
     *
     * @param  mixed $value
     * @param  int   $post_id
     * @param  array $field
     * @return mixed
     */
    public function format_value($value, $post_id, $field)
    {
        $value = (object) $value;

        if ($value->return_format === 'string') {
            return implode(' ', [$value['firstName'], $value['lastName']]);
        }

        return $value;
    }

    /**
     * Validate the field value before saving to the database.
     *
     * @param  bool  $valid
     * @param  mixed $value
     * @param  array $field
     * @param  array $input
     * @return bool
     */
    public function validate_value($valid, $value, $field, $input)
    {
        return $valid;
    }

    /**
     * Modify the targeted post and key when deleting a value.
     *
     * @param  mixed  $post_id
     * @param  string $key
     * @return void
     */
    public function delete_value($post_id, $key)
    {
        //
    }

    /**
     * Modify the field attributes before loading from the database.
     *
     * @param  array $field
     * @return array
     */
    public function load_field($field)
    {
        return $field;
    }

    /**
     * Modify the field attributes before saving to the database.
     *
     * @param  array $field
     * @return array
     */
    public function update_field($field)
    {
        return $field;
    }

    /**
     * This action is fired after a field is deleted from the database.
     *
     * @param  array $field
     * @return void
     */
    public function delete_field($field)
    {
        //
    }

    /**
     * Enqueued assets when rendering the field type.
     *
     * @return void
     */
    public function input_admin_enqueue_scripts()
    {
        wp_enqueue_script('acf-' . $this->name, $this->asset('/js/field.js'), ['acf-field'], null, true);
        wp_enqueue_style('acf-' . $this->name, $this->asset('/css/field.css'), [], null);
    }

    /**
     * Printed output in the admin header when rendering the field type.
     *
     * @return void
     */
    public function input_admin_head()
    {
        //
    }

    /**
     * Modify the form data input arguments when rendering the field type.
     *
     * @param  array $args
     * @return void
     */
    public function input_form_data($args)
    {
        //
    }

    /**
     * Printed output in the admin footer when rendering the field type.
     *
     * @return void
     */
    public function input_admin_footer()
    {
        //
    }

    /**
     * Enqueued assets when creating a field group.
     *
     * @return void
     */
    public function field_group_admin_enqueue_scripts()
    {
        //
    }

    /**
     * Printed output in the admin header when creating a field group.
     *
     * @return void
     */
    public function field_group_admin_head()
    {
        //
    }
}
