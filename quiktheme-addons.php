<?php
/*
Plugin Name: Quiktheme Addons For Elementor sakib
Plugin URI: https://github.com/masumskaib396/quiktheme-for-elementor
Description: The Quiktheme is an Elementor helping plugin that will make your designing work easier.
Our specialities are custom CSS, Nested section, Creative Buttons.
Version: 1.0.0
Author: quiktheme-wp
Author URI: https://quiktheme-devs.com
License: GPLv2 or later
Text Domain: quiktheme-addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Set plugin version constant.
define( 'QUIK_THEME_VERSION', '1.0.0');

/* Set constant path to the plugin directory. */
define( 'QUIK_THEME_WIDGET', trailingslashit( plugin_dir_path( __FILE__ ) ) );
// Plugin Function Folder Path
define( 'QUIK_THEME_WIDGET_INC', plugin_dir_path( __FILE__ ) . 'inc/' );

// Plugin Extensions Folder Path
define( 'QUIK_THEME_WIDGET_EXTENSIONS', plugin_dir_path( __FILE__ ) . 'extensions/' );

define( 'QUIK_THEME_WIDGET_LIB', plugin_dir_path( __FILE__ ) . 'lib/' );

// Plugin Widget Folder Path
define( 'QUIK_THEME_WIDGET_DIR', plugin_dir_path( __FILE__ ) . 'widgets/' );

// Assets Folder URL
define( 'QUIK_THEME_ASSETS_PUBLIC', plugins_url( 'assets/frontend', __FILE__ ) );
define( 'QUIK_THEME_ASSETS_ADMIN', plugins_url( 'assets/admin/', __FILE__ ) );

// Assets Folder URL
define( 'QUIK_THEME_ASSETS_VERDOR', plugins_url( 'assets/vendor', __FILE__ ) );





require_once( QUIK_THEME_WIDGET_INC . 'Classes/breadcrumb-class.php');
require_once( QUIK_THEME_WIDGET_INC . 'Classes/cross.php');
require_once( QUIK_THEME_WIDGET_INC . 'helper-function.php');
require_once( QUIK_THEME_WIDGET . 'base.php' );
require_once( QUIK_THEME_WIDGET . 'traits/quiktheme-button-murkup.php');
require_once( QUIK_THEME_WIDGET . 'traits/quiktheme-inline-button-murkup.php');


/* Plugin update checker */
function update_checker(){
	if( !class_exists('Puc_v4_Factory') ){
		require_once( QUIK_THEME_WIDGET_LIB . 'plugin-update-checker/plugin-update-checker.php');
	}
	$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		'https://grayic.com/update-server?action=get_metadata&slug=quiktheme-addons', //Metadata URL.
		__FILE__, //Full path to the main plugin file.
		'quicktheme-addons'
	);
}

update_checker();

?>
