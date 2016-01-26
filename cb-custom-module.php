<?php
/**
 * Plugin Name: Beaver Builder Custom Modules
 * Plugin URI: http://www.wpbeaverbuilder.com
 * Description: An example plugin for creating custom builder modules.
 * Version: 1.0
 * Author: The Beaver Builder Team
 * Author URI: http://www.wpbeaverbuilder.com
 */
define( 'CB_CUSTOM_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'CB_CUSTOM_MODULE_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom modules
 */
function fl_load_module_examples() {
	if ( class_exists( 'FLBuilder' ) ) {
//	    require_once 'basic-example/basic-example.php';
//	    require_once 'example/example.php';
			require_once 'grid/grid.php';
	}
}
add_action( 'init', 'fl_load_module_examples' );

/**
 * Custom fields
 */
function fl_my_custom_field( $name, $value, $field ) {
    echo '<input type="text" class="text text-full" name="' . $name . '" value="' . $value . '" />';
}
add_action( 'fl_builder_control_my-custom-field', 'fl_my_custom_field', 1, 3 );

/**
 * Custom field styles and scripts
 */
function fl_my_custom_field_assets() {
    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
        wp_enqueue_style( 'my-custom-fields', FL_MODULE_EXAMPLES_URL . 'assets/css/fields.css', array(), '' );
        wp_enqueue_script( 'my-custom-fields', FL_MODULE_EXAMPLES_URL . 'assets/js/fields.js', array(), '', true );
    }
}
add_action( 'wp_enqueue_scripts', 'fl_my_custom_field_assets' );