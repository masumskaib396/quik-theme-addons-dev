<?php

defined( 'ABSPATH' ) || die();

class Icons_Manager {

    public static function init() {
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'add_finest_icons_tab' ] );
    }

    public static function add_finest_icons_tab( $tabs ) {

        $tabs['feather-icons'] = [
            'name' => 'feather-icons',
            'label' => __( 'Feather Icons', 'finest-addons' ),
            'url' => FINEST_ASSETS_PUBLIC . 'fonts/feather-icon/feather-icon-style.min.css',
            'enqueue' => [ FINEST_ASSETS_PUBLIC . 'fonts/feather-icon/feather-icon-style.min.css' ],
            'prefix' => 'icon-',
            'displayPrefix' => 'feather',
            'labelIcon' => 'exad exad-logo feather icon-feather exad-font-manager',
            'ver' => FINEST_VERSION,
            'fetchJson' => FINEST_ASSETS_PUBLIC . 'fonts/feather-icon/finest-icons.js?v=' . FINEST_VERSION,
            'native' => false,
        ];

        return $tabs;

        var_dump($tabs);
    }

}
Icons_Manager::init();
