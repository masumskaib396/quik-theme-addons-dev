<?php

defined( 'ABSPATH' ) || die();

class Icons_Manager {

    public static function init() {
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'add_quik_theme_icons_tab' ] );
    }

    public static function add_quik_theme_icons_tab( $tabs ) {

        $tabs['feather-icons'] = [
            'name' => 'feather-icons',
            'label' => __( 'Feather Icons', 'quiktheme-addons' ),
            'url' => QUIK_THEME_ASSETS_PUBLIC . 'fonts/feather-icon/feather-icon-style.min.css',
            'enqueue' => [ QUIK_THEME_ASSETS_PUBLIC . 'fonts/feather-icon/feather-icon-style.min.css' ],
            'prefix' => 'icon-',
            'displayPrefix' => 'feather',
            'labelIcon' => 'exad exad-logo feather icon-feather exad-font-manager',
            'ver' => QUIK_THEME_VERSION,
            'fetchJson' => QUIK_THEME_ASSETS_PUBLIC . 'fonts/feather-icon/quiktheme-icons.js?v=' . QUIK_THEME_VERSION,
            'native' => false,
        ];

        return $tabs;

        var_dump($tabs);
    }

}
Icons_Manager::init();
