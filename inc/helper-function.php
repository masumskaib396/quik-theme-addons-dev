<?php

/**
 * Get Pages
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'quik_theme_get_all_pages' ) ) {
    function quik_theme_get_all_pages($posttype = 'page')
    {
        $args = array(
            'post_type' => $posttype,
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $page_list = array();
        if( $data = get_posts($args)){
            foreach($data as $key){
                $page_list[$key->ID] = $key->post_title;
            }
        }
        return  $page_list;
    }
}
/**
 * Meta Output
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'quik_theme_get_meta' ) ) {
    function quik_theme_get_meta( $data ) {
        global $wp_embed;
        $content = $wp_embed->autoembed( $data );
        $content = $wp_embed->run_shortcode( $content );
        $content = do_shortcode( $content );
        $content = wpautop( $content );
        return $content;
    }
}

/**
 * Custom wp_ksese function
 *
 * @param string
 * @return array
 */
function quik_theme_wp_kses( $string ) {
	$allowed_html = [
		'b' => [],
		's' => [],
		'strong' => [],
		'i' => [],
		'u' => [],
		'br' => [],
		'em' => [],
		'del' => [],
		'ins' => [],
		'sup' => [],
		'sub' => [],
		'code' => [],
		'small' => [],
		'strike' => [],
		'abbr' => [
			'title' => [],
		],
		'span' => [
			'class' => [],
		],
		'a' => [
			'href' => [],
			'title' => [],
			'class' => [],
			'id' => [],
		],
		'img' => [
			'src' => [],
			'alt' => [],
			'height' => [],
			'width' => [],
		],
		'hr' => [],
	];
	return wp_kses( $string, $allowed_html );
}

// Elementor Templat Function
function quik_theme_layout_content( $post_id ) {

    return Elementor\Plugin::instance()->frontend->get_builder_content( $post_id, true );
}

function quik_theme_cpt_slug_and_id( $post_type ) {
    $the_query = new WP_Query( array(
        'posts_per_page' => -1,
        'post_type'      => $post_type,
    ) );
    $cpt_posts = [];
    while ( $the_query->have_posts() ): $the_query->the_post();
        $cpt_posts[get_the_ID()] = get_the_title();
    endwhile;
    wp_reset_postdata();
    return $cpt_posts;
}

// Contact Form 7
if ( !function_exists( 'quik_theme_addons_is_cf7_activated' ) ) {
	function quik_theme_addons_is_cf7_activated() {
		return class_exists( 'WPCF7' );
	}
}

if ( !function_exists( 'quik_theme_addons_get_cf7_forms' ) ) {
	function quik_theme_addons_get_cf7_forms() {
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

if ( !function_exists( 'quik_theme_addons_do_shortcode' ) ) {
	function quik_theme_addons_do_shortcode( $tag, array $atts = array(), $content = null ) {
		global $shortcode_tags;
		if ( !isset( $shortcode_tags[$tag] ) ) {
			return false;
		}
		return call_user_func( $shortcode_tags[$tag], $atts, $content, $tag );
	}
}

// wp-forms
if ( ! function_exists('quik_theme_get_contact_wp_forms') ) {
	function quik_theme_get_contact_wp_forms( $plugin = '' ) {
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
			$options[0] = esc_html__( 'Select a Contact Form', 'quiktheme-addons' );
			foreach ( $contact_forms as $form_id => $form_title ) {
				$options[ $form_id ] = $form_title;
			}
		}

		if ( empty( $options ) ) {
			$options[0] = esc_html__( 'No contact forms found!', 'quiktheme-addons' );
		}

		return $options;
	}
}
function quik_theme_get_fluent_forms() {
	$options = array();

	if (defined('FLUENTFORM')) {
		global $wpdb;

		$result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}fluentform_forms");
		if ($result) {
			$options[0] = esc_html__('Select a Fluent Form', 'quiktheme-addons');
			foreach ($result as $form) {
				$options[$form->id] = $form->title;
			}
		} else {
			$options[0] = esc_html__('Create a Form First', 'quiktheme-addons');
		}
	}

	return $options;
}



function quik_theme_get_current_user_display_name() {
	$user = wp_get_current_user();
	$name = 'user';
	if ($user->exists() && $user->display_name) {
		$name = $user->display_name;
	}
	return $name;
}

function quik_theme_addons_cpt_taxonomy_slug_and_name( $taxonomy_name, $option_tag = false ) {
	$taxonomyies = get_terms( $taxonomy_name );
	if ( true == $option_tag ) {
		$cpt_terms = '';
		foreach ( $taxonomyies as $category ) {
			if ( isset( $category->slug ) && isset( $category->name ) ) {
				$cpt_terms .= '<option value="' . esc_attr( $category->slug ) . '">' . $category->name . '</option>';
			}
		}
		return $cpt_terms;
	}
	$cpt_terms = [];
	foreach ( $taxonomyies as $category ) {
		if ( isset( $category->slug ) && isset( $category->name ) ) {
			$cpt_terms[$category->slug] = $category->name;
		}
	}
	return $cpt_terms;
}

function quik_theme_addons_cpt_author_slug_and_id( $post_type ) {
	$the_query = new WP_Query( array(
		'posts_per_page' => -1,
		'post_type'      => $post_type,
	) );
	$author_meta = [];
	while ( $the_query->have_posts() ): $the_query->the_post();
		$author_meta[get_the_author_meta( 'ID' )] = get_the_author_meta( 'display_name' );
	endwhile;
	wp_reset_postdata();
	return array_unique( $author_meta );
}

function quik_theme_addons_cpt_slug_and_id( $post_type ) {
	$the_query = new WP_Query( array(
		'posts_per_page' => -1,
		'post_type'      => $post_type,
	) );
	$cpt_posts = [];
	while ( $the_query->have_posts() ): $the_query->the_post();
		$cpt_posts[get_the_ID()] = get_the_title();
	endwhile;
	wp_reset_postdata();
	return $cpt_posts;
}

if ( !function_exists( 'quik_theme_addons_posted_by' ) ):
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function quik_theme_addons_posted_by($label = 'by' ) {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'quiktheme-addons' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<span class="byline"> ' . $label . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( !function_exists( 'quik_theme_addons_posted_category' ) ):
	/**
	 * Prints HTML with meta information for the current date.
	 */
	function quik_theme_addons_posted_category( $icon ='' ) {

		$post_cat = get_the_terms(get_the_ID(), 'category');
		$post_cat = join(', ', wp_list_pluck($post_cat, 'name'));
		$post_category = sprintf('<span class="category-list"> %s %s</span>', $icon, $post_cat);

		return $post_category;

	}
endif;