<?php
/**
 * Plugin Name: CB Custom Beaver Builder Modules 
 * Plugin URI: http://www.briancoords.com/free-beaver-builder-custom-modules
 * Description: Custom photographic modules for Beaver Builder.
 * Version: 1.1.1
 * Author: Brian Coords
 * Author URI: http://www.briancoords.com
 */
define( 'CB_CUSTOM_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'CB_CUSTOM_MODULE_URL', plugins_url( '/', __FILE__ ) );

/**
 * Custom modules
 */
function fl_load_module_examples() {
	if ( class_exists( 'FLBuilder' ) ) {
		require_once 'cb-shade/cb-shade.php';
//		require_once 'cb-posts/cb-posts.php'; //In Progress
		require_once 'cb-poise/cb-poise.php';
		require_once 'cb-spotlight/cb-spotlight.php';
		require_once 'cb-broadside/cb-broadside.php';
		require_once 'cb-scout/cb-scout.php';
		require_once 'cb-dust/cb-dust.php';
	}
}
add_action( 'init', 'fl_load_module_examples' );

///**
// * Custom fields
// */
//function fl_my_custom_field( $name, $value, $field ) {
//    echo '<input type="text" class="text text-full" name="' . $name . '" value="' . $value . '" />';
//}
//add_action( 'fl_builder_control_my-custom-field', 'fl_my_custom_field', 1, 3 );
//
///**
// * Custom field styles and scripts
// */
//function fl_my_custom_field_assets() {
//    if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
//        wp_enqueue_style( 'my-custom-fields', CB_CUSTOM_MODULE_URL . 'assets/css/fields.css', array(), '' );
//        wp_enqueue_script( 'my-custom-fields', CB_CUSTOM_MODULE_URL . 'assets/js/fields.js', array(), '', true );
//    }
//}
//add_action( 'wp_enqueue_scripts', 'fl_my_custom_field_assets' );