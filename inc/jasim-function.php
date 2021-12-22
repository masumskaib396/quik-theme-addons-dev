<?php 
    if ( !function_exists( 'fd_addons_is_cf7_activated' ) ) {
        function fd_addons_is_cf7_activated() {
            return class_exists( 'WPCF7' );
        }
    }

    if ( !function_exists( 'fd_addons_get_cf7_forms' ) ) {
        function fd_addons_get_cf7_forms() {
            $forms = get_posts( [
                'post_type'      => 'wpcf7_contact_form',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ] );
    
            if ( !empty( $forms ) ) {
                return wp_list_pluck( $forms, 'post_title', 'ID' );
            }
            return [];
        }
    }
    if ( !function_exists( 'fd_addons_do_shortcode' ) ) {
        function fd_addons_do_shortcode( $tag, array $atts = array(), $content = null ) {
            global $shortcode_tags;
            if ( !isset( $shortcode_tags[$tag] ) ) {
                return false;
            }
            return call_user_func( $shortcode_tags[$tag], $atts, $content, $tag );
        }
    }
?>