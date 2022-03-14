<?php

namespace Quiktheme\Elements\Button;

use ZionBuilder\Elements\Element;
use ZionBuilder\Utils;

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

/**
 * Class Button
 *
 * @package ZionBuilder\Elements
 */
class Quik_Theme_Button extends Element {

	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_type() {
		return 'quiktheme-icon-box';
	}

	/**
	 * Get type
	 *
	 * Returns the unique id for the element
	 *
	 * @return string The element id/type
	 */
	public function get_category() {
		return 'quiktheme-addons';
	}

	/**
	 * Get name
	 *
	 * Returns the name for the element
	 *
	 * @return string The element name
	 */
	public function get_name() {
		return __( 'Icon Box', 'quiktheme-addons' );
	}


	/**
	 * Get keywords
	 *
	 * Returns the keywords for this element
	 *
	 * @return array<string> The list of element keywords
	 */
	public function get_keywords() {
		return [ 'icon', 'iconbox', 'title', 'text', 'quik-theme-addons' ];
	}

	/**
	 * Get Element Icon
	 *
	 * Returns the icon used in add elements panel for this element
	 *
	 * @return string The element icon
	 */
	public function get_element_icon() {
		return 'element-icon';
	}

	/**
	 * Registers the element options
	 *
	 * @param \ZionBuilder\Options\Options $options The Options instance
	 *
	 * @return void
	 */
	public function options( $options ) {

		$options->add_option(
			'icon',
			[
				'type'        => 'icon_library',
				'id'          => 'icon',
				'title'       => esc_html__( 'Icon', 'quiktheme-addons' ),
				'description' => esc_html__( 'Choose an icon', 'quiktheme-addons' ),
				'default'     => [
					'family'  => 'Font Awesome 5 Free Regular',
					'name'    => 'star',
					'unicode' => 'uf005',
				],
			]
		);

		$options->add_option(
			'icon_box_text',
			[
				'type'        => 'text',
				'title'       => __( 'Heading', 'quiktheme-addons' ),
				'default'     => __( 'Quiktheme Icon Heading', 'quiktheme-addons' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);

		$options->add_option(
			'icon_box_dis',
			[
				'type'        => 'textarea',
				'title'       => __( 'Content', 'quiktheme-addons' ),
				'default'     => __( 'Secure & Fast Payment', 'quiktheme-addons' ),
				'dynamic'     => [
					'enabled' => true,
				],
			]
		);

	}


	/**
	 * Get style elements
	 *
	 * Returns a list of elements/tags that for which you
	 * want to show style options
	 *
	 * @return void
	 */
	public function on_register_styles() {
		$this->register_style_options_element(
			'icon_styles',
			[
				'title'      => esc_html__( 'Icon styles', 'quiktheme-addons' ),
				'selector'   => '{{ELEMENT}} .quik_theme__icon',
			]
		);

		$this->register_style_options_element(
			'heading_styles',
			[
				'title'      => esc_html__( 'Heading styles', 'quiktheme-addons' ),
				'selector'   => '{{ELEMENT}} .quik_theme__icon-title',
			]
		);

		$this->register_style_options_element(
			'discription_styles',
			[
				'title'      => esc_html__( 'Discription styles', 'quiktheme-addons' ),
				'selector'   => '{{ELEMENT}} .quik_theme__icon-discription',
			]
		);

	}



	/**
	 * Renders the element based on options
	 *
	 * @param \ZionBuilder\Options\Options $options
	 *
	 * @return void
	 */
	public function render($options) {

		$icon  = $options->get_value( 'icon');
		$heading  = $options->get_value( 'icon_box_text');
		$discription  = $options->get_value( 'icon_box_dis');

		?>
			<div class="quik_theme__icon-box">
				<?php if($icon): ?>
					<div class="quik_theme__icon">
						<?php
							$this->attach_icon_attributes('icon', $icon);
							$this->render_tag(
								'span',
								'icon',
								'',
							);
						?>
					</div>
				<?php endif; ?>

				<div class="quik_theme__icon-content">
					<h2 class="quik_theme__icon-title">
						<?php echo esc_html($heading) ?>
					</h2>
					<span class="quik_theme__icon-discription">
						<?php echo esc_html($discription) ?>
					</span>
				</div>
			</div>
		<?php
	}
}
$elements_manager->register_element( new \Quiktheme\Elements\Button\Quik_Theme_Button() );