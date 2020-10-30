<?php

namespace Jf\AcfNavMenu;

class NavMenuField extends \acf_field
{
    /**
     * Field Name
     *
     * @var string
     */
    public $name = 'nav_menu';

    /**
     * Field Label
     *
     * @var string
     */
    public $label = 'Nav Menu';

    /**
     * The field type.
     *
     * @var string
     */
    public $type = 'select';

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
    public $defaults = [];

    /**
     * Settings
     *
     * @var object
     */
    protected $settings;

    /**
     * Create a new nav menu field instance.
     *
     * @return void
     */
    public function __construct($uri, $path)
    {
        $this->uri = $uri;
        $this->path = $path;

        parent::__construct();
    }

    /**
     * Create the HTML interface for your field.
     *
     * @param  array $field
     * @return void
     */
    public function render_field($field)
    {
        $nav_menus = wp_get_nav_menus();

        echo sprintf(
            '<select name="%1$s"><option value="0">%2$s</option>',
            esc_attr($field['name']),
            esc_html__('Select a Menu')
        );

        foreach ($nav_menus as $menu) {
            $selected = $field['value'] == $menu->term_id;

            echo sprintf(
                '<option %1$s value="%2$d">%3$s</option>',
                $selected ? 'selected' : '',
                $menu->term_id,
                wp_html_excerpt($menu->name, 40, '&hellip;')
            );
        }

        echo '</select>';
    }

    /**
     * Create extra settings for your field. These are visible when editing a field.
     *
     * @param  array $field
     * @return void
     */
    public function render_field_settings($field)
    {
        //
    }

    /**
     * This action is called in the admin_enqueue_scripts action on the edit screen where
     * your field is created.
     *
     * @return void
     */
    public function input_admin_enqueue_scripts()
    {
        //
    }

    /**
     * This filter is applied to the $value after it is loaded from the database and
     * before it is returned to the template.
     *
     * @param  mixed $value
     * @param  mixed $post_id
     * @param  array $field
     * @return mixed
     */
    public function format_value($value, $post_id, $field)
    {
        return $value;
    }

    /**
     * This filter is applied to the $value before it is saved in the database.
     *
     * @param  mixed $value
     * @param  mixed $post_id
     * @param  array $field
     * @return mixed
     */
    public function update_value($value, $post_id, $field)
    {
        return $value;
    }

    /**
     * This filter is used to perform validation on the value prior to saving.
     *
     * @param  boolean $valid
     * @param  mixed   $value
     * @param  array   $field
     * @param  array   $input
     * @return boolean
     */
    public function validate_value($valid, $value, $field, $input)
    {
        return $valid;
    }
}
