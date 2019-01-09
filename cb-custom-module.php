<?php
/**
 * Plugin Name: CB Custom Beaver Builder Modules
 * Plugin URI: https://www.cbcustommodules.com
 * Description: Custom modules for Beaver Builder from Crafty Beaver. Building custom on-demand modules.
 * Version: 1.6.1
 * Author: Crafty Beavers
 * Author URI: https://www.cbcustommodules.com
 * Text Domain: cb-custom-modules
 */
define( 'CB_CUSTOM_MODULE_DIR', plugin_dir_path( __FILE__ ) );
define( 'CB_CUSTOM_MODULE_URL', plugins_url( '/', __FILE__ ) );

require_once 'includes/cb-dust-row.php';

/**
 * Custom modules
 */
function fl_load_module_cb_custom_modules() {
	if ( class_exists( 'FLBuilder' ) ) {

    // Require custom 'media file' field type
    require_once 'includes/BB-PDF-field-modified/zestsms-pdf.php';
    require_once 'includes/BB-date-Field-master/bb_date_field.php';
    require_once 'includes/responsive-borders-helper.php';


		require_once 'cb-shade/cb-shade.php';
		require_once 'cb-poise/cb-poise.php';
		require_once 'cb-spotlight/cb-spotlight.php';
		require_once 'cb-broadside/cb-broadside.php';
		require_once 'cb-scout/cb-scout.php';
		require_once 'cb-dust/cb-dust.php';
		require_once 'cb-slice/cb-slice.php';
		require_once 'cb-caption/cb-caption.php';
		require_once 'cb-drawerfolio/cb-drawerfolio.php';

		if( class_exists( 'FLIconModule' ) ){
			require_once 'cb-link-list/cb-link-list.php';
			require_once 'cb-button-list/cb-button-list.php';
		}
		require_once 'cb-simple-events/cb-simple-events.php';

		if( class_exists( 'FLMenuModule') ){
			require_once 'cb-menu/cb-menu.php';
		}

	}
}
add_action( 'init', 'fl_load_module_cb_custom_modules' );

add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'cb_plugin_action_links' );

function cb_plugin_action_links( $links ) {
   $links[] = '<a href="https://www.cbcustommodules.com/request-module" target="_blank">' . __('Request Custom Module','cb-custom-modules') . '</a>';
   return $links;
}
