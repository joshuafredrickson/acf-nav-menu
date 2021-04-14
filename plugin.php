<?php

/**
 * Plugin Name: Advanced Custom Fields: Nav Menu
 * Plugin URI:  https://github.com/joshuafredrickson/acf-nav-menu
 * Description: A nav menu field for ACF.
 * Version:     1.0.2
 * Author:      Joshua Fredrickson
 * Author URI:  https://github.com/joshuafredrickson
 */

namespace Jf\AcfNavMenu;

add_action('after_setup_theme', new class {
    /**
     * Setup the plugin.
     *
     * @return void
     */
    public function __invoke()
    {
        if (file_exists($composer = __DIR__ . '/vendor/autoload.php')) {
            require_once $composer;
        }

        $this->register();
    }

    /**
     * Register the field type with ACF.
     *
     * @return void
     */
    protected function register()
    {
        foreach (['acf/include_field_types', 'acf/register_fields'] as $hook) {
            add_action($hook, function () {
                return new NavMenuField(
                    plugin_dir_url(__FILE__),
                    plugin_dir_path(__FILE__)
                );
            });
        }

        /**
         * Add basic Admin Columns Pro support to the nav menu field.
         *
         * @param  mixed $value
         * @param  int $id
         * @param  \ACA\ACF\Column $column
         * @return mixed
         */
        add_filter('ac/column/value', function ($value, $id, $column) {
            if (
                ! is_a($column, '\ACA\ACF\Column') ||
                $column->get_acf_field_option('type') !== 'nav_menu'
            ) {
                return $value;
            }

            $nav_menu = wp_get_nav_menu_object(get_field($column->get_meta_key()));

            return $nav_menu ? $nav_menu->name : $value;
        }, 10, 3);
    }
});
