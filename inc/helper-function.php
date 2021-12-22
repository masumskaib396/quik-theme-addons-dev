<?php

/**
 * Get Pages
 *
 * @since 1.0
 *
 * @return array
 */
if ( ! function_exists( 'finest_get_all_pages' ) ) {
    function finest_get_all_pages($posttype = 'page')
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
if ( ! function_exists( 'finest_get_meta' ) ) {
    function finest_get_meta( $data ) {
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
function finest_wp_kses( $string ) {
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

