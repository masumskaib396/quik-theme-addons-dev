<?php
/*
Plugin Name: Finest Addons For Elementor
Plugin URI: https://github.com/masumskaib396/finest-for-elementor
Description: The Finest is an Elementor helping plugin that will make your designing work easier.
Our specialities are custom CSS, Nested section, Creative Buttons.
Version: 1.0.2
Author: finestWP
Author URI: https://finestdevs.com
License: GPLv2 or later
Text Domain: finest-addons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//Set plugin version constant.
define( 'FINEST_VERSION', '1.0.2');

/* Set constant path to the plugin directory. */
define( 'FINEST_WIDGET', trailingslashit( plugin_dir_path( __FILE__ ) ) );
// Plugin Function Folder Path
define( 'FINEST_WIDGET_INC', plugin_dir_path( __FILE__ ) . 'inc/' );

// Plugin Extensions Folder Path
define( 'FINEST_WIDGET_EXTENSIONS', plugin_dir_path( __FILE__ ) . 'extensions/' );

// Plugin Widget Folder Path
define( 'FINEST_WIDGET_DIR', plugin_dir_path( __FILE__ ) . 'widgets/' );

// Assets Folder URL
define( 'FINEST_ASSETS_PUBLIC', plugins_url( 'assets/frontend/', __FILE__ ) );
define( 'FINEST_ASSETS_ADMIN', plugins_url( 'assets/admin/', __FILE__ ) );

// Assets Folder URL
define( 'FINEST_ASSETS_VERDOR', plugins_url( 'assets/vendor', __FILE__ ) );



require_once( FINEST_WIDGET_INC . 'Classes/breadcrumb-class.php');
require_once( FINEST_WIDGET_INC . 'helper-function.php');
require_once( FINEST_WIDGET_INC . 'jasim-function.php');
require_once( FINEST_WIDGET . 'base.php' );
require_once( FINEST_WIDGET . 'traits/finest-button-murkup.php');
require_once( FINEST_WIDGET . 'traits/finest-inline-button-murkup.php');

?>
