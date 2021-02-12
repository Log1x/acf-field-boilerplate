<?php

namespace Log1x\AcfExampleField;

class ExampleField extends \acf_field
{
    use Concerns\Asset;

    /**
     * The field name.
     *
     * @var string
     */
    public $name = 'example';

    /**
     * The field label.
     *
     * @var string
     */
    public $label = 'Example';

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
    public $defaults = ['return_format' => 'string'];

    /**
     * Create a new phone number field instance.
     *
     * @param  string $uri
     * @param  string $path
     * @return void
     */
    public function __construct($uri, $path)
    {
        $this->uri = $uri;
        $this->path = $path;

        parent::__construct();
    }

    /**
     * The rendered field type.
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
     * The rendered field type settings.
     *
     * @param  array $field
     * @return void
     */
    public function render_field_settings($field)
    {
        acf_render_field_setting($field, [
            'label' => 'Return Format',
            'name' => 'return_format',
            'instructions' => 'The format of the returned data.',
            'type' => 'select',
            'ui' => '1',
            'choices' => [
                'array' => 'Array',
                'string' => 'String',
            ],
        ]);
    }

    /**
     * The formatted field value.
     *
     * @param  mixed $value
     * @param  int   $post_id
     * @param  array $field
     * @return mixed
     */
    public function format_value($value, $post_id, $field)
    {
        if ($value['return_format'] === 'string') {
            return implode(' ', [
                $value['firstName'],
                $value['lastName']
            ]);
        }

        return $value;
    }

    /**
     * The condition the field value must meet before
     * it is valid and can be saved.
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
     * The field value after loading from the database.
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
     * The field value before saving to the database.
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
     * The action fired when deleting a field value from the database.
     *
     * @param  int    $post_id
     * @param  string $key
     * @return void
     */
    public function delete_value($post_id, $key)
    {
        parent::delete_value($post_id, $key);
    }

    /**
     * The field after loading from the database.
     *
     * @param  array $field
     * @return array
     */
    public function load_field($field)
    {
        return $field;
    }

    /**
     * The field before saving to the database.
     *
     * @param  array $field
     * @return array
     */
    public function update_field($field)
    {
        return $field;
    }

    /**
     * The action fired when deleting a field from the database.
     *
     * @param  array $field
     * @return void
     */
    public function delete_field($field)
    {
        parent::delete_field($field);
    }

    /**
     * The assets enqueued when rendering the field.
     *
     * @return void
     */
    public function input_admin_enqueue_scripts()
    {
        wp_enqueue_script('acf-' . $this->name, $this->asset('/js/field.js'), ['acf-input'], null);
        wp_enqueue_style('acf-' . $this->name, $this->asset('/css/field.css'), [], null);
    }

    /**
     * The assets enqueued when creating a field group.
     *
     * @return void
     */
    public function field_group_admin_enqueue_scripts()
    {
        $this->input_admin_enqueue_scripts();
    }
}
