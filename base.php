<?php

use \Elementor\Plugin as Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Finest_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.6.0';
	const MINIMUM_PHP_VERSION = '5.6';


	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}


	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	public function i18n() {
		load_plugin_textdomain( 'finest-addons' );
	}



	public function init() {
		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}
		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/elements/categories_registered',[$this,'register_new_category']);

		add_action( 'elementor/editor/after_enqueue_scripts', [$this, 'finest_editor_scripts_js'], 100);
		add_action( 'elementor/frontend/before_register_scripts', [ $this, 'finest_register_frontend_scripts' ] );
	}


	/* Plugin update checker */
	public function update_checker(){
		if( !class_exists('Puc_v4_Factory') ){
			require_once __DIR__ . '/lib/plugin-update-checker/plugin-update-checker.php';
		}
		$MyUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
			'https://update.grayic.com?action=get_metadata&slug=finest-addons', //Metadata URL.
			__FILE__, //Full path to the main plugin file.
			'finest-addons'
		);
	}

	/**
	* Load Frontend Script
	*
	*/
	public function finest_register_frontend_scripts(){

		// css enqueue
		wp_enqueue_style(
			'finest-addons-style',
			FINEST_ASSETS_PUBLIC .'/css/widget-style.css',
			null,FINEST_VERSION
		);

		wp_enqueue_style(
			'finest-creative-button-style',
			FINEST_ASSETS_PUBLIC .'/css/creative-button.css',
			null,FINEST_VERSION
		);

		wp_enqueue_style(
			'finest-inline-button-style',
			FINEST_ASSETS_PUBLIC .'/css/inline-button.css',
			null, FINEST_VERSION
		);

		wp_enqueue_style(
			'animate',
			FINEST_ASSETS_PUBLIC .'/css/animate.css',
			null,FINEST_VERSION
		);
		wp_enqueue_style(
			'prism',
			FINEST_ASSETS_PUBLIC .'/css/prism.css',
			null,FINEST_VERSION
		);

		// Js enqueue
		wp_enqueue_script(
			'finest-widget',
			FINEST_ASSETS_PUBLIC .'/js/widget.js',
			['jquery'], FINEST_VERSION, true
		);

		wp_enqueue_script(
			'typed',
			FINEST_ASSETS_PUBLIC .'/js/typed.min.js',
			['jquery'], FINEST_VERSION, true
		);

		wp_enqueue_script(
			'prism',
			FINEST_ASSETS_PUBLIC .'/js/prism.js',
			['jquery'], FINEST_VERSION, true
		);




	}

	public function finest_editor_scripts_js(){

		wp_enqueue_script(
			'finest-addons-editor',
			FINEST_ASSETS_PUBLIC .'/js/editor.js',
			['jquery'], FINEST_VERSION, true
		);
	}



	/**
	 * Widgets Catgory
	 *
	*/
	public function register_new_category($manager){
	   $manager->add_category('finest-addons',
			[
				'title' => __( 'Finest Elementor Helper  Addons', 'finest' ),
			]);
	}

	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'finest' ),
			'<strong>' . esc_html__( 'Elementor Pawelements Extension', 'finest' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'finest' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );
		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'finest' ),
			'<strong>' . esc_html__( 'Elementor finest Extension', 'finest' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'finest' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'finest' ),
			'<strong>' . esc_html__( 'Elementor Finest Extension', 'finest' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'finest' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	public function init_widgets() {

		$widgets_manager = \Elementor\Plugin::instance()->widgets_manager;


		/*
		* Extensions Include
		*/
		require_once( FINEST_WIDGET_EXTENSIONS . 'custom-css.php' );


		/*
		* Widget Include
		*/
		require_once( FINEST_WIDGET_DIR . 'Heading/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'DualHeading/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'AniamteText/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'Excerpt/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'DualButton/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'CreativeButton/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'ModalPopup/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'InlineButton/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'PricingBox/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'CallToAction/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'TestimonialNormal/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'Card/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'Promo-Box/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'Icon-Box/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'Flipbox/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'Contact Form 7/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'TeamMember/widget.php' );
<<<<<<< HEAD
		require_once( FINEST_WIDGET_DIR . 'ListGroup/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'Tooltip/widget.php' );
		require_once( FINEST_WIDGET_DIR . 'SourceCode/widget.php' );
=======
		require_once( FINEST_WIDGET_DIR . 'WPForms/widget.php' );
>>>>>>> 9c465d19a27a61a6e8f25135dab3871649264229


	}
}
Finest_Extension::instance();
