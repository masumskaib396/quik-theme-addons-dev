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

    // wp-forms
    function get_contact_wp_forms( $plugin = '' ) {
		$options       = array();
		$contact_forms = array();


		// WPforms
		if ( 'WP_Forms' == $plugin && function_exists( 'wpforms' ) ) {
			$args = array(
				'post_type'      => 'wpforms',
				'posts_per_page' => -1,
			);

			$wpf_forms = get_posts( $args );

			if ( ! empty( $wpf_forms ) && ! is_wp_error( $wpf_forms ) ) {
				foreach ( $wpf_forms as $form ) {
					$contact_forms[ $form->ID ] = $form->post_title;
				}
			}
		}

		// Contact Forms List
		if ( ! empty( $contact_forms ) ) {
			$options[0] = esc_html__( 'Select a Contact Form', 'powerpack' );
			foreach ( $contact_forms as $form_id => $form_title ) {
				$options[ $form_id ] = $form_title;
			}
		}

		if ( empty( $options ) ) {
			$options[0] = esc_html__( 'No contact forms found!', 'powerpack' );
		}

		return $options;
	}
?>