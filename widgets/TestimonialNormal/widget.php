<?php

namespace Finest_Addons\Widgets;

use Elementor\Core\Schemes\Typography;
use Elementor\Utils;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

defined( 'ABSPATH' ) || die();

class Finest_Testimonial_Normal extends Widget_Base {

	/**
     * Get widget name.
     */
    public function get_name() {
		return 'finest-creative-button';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Testimonial', 'finest-addons' );
	}

	/**
	 * Get widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-t-letter';
	}

	/**
     * Get widget category.
     */
    public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return [ 'review', 'comment', 'feedback', 'testimonial', 'finest' ];
	}

	public function get_style_depends() {
		return [
			'elementor-icons-fa-solid',
			'elementor-icons-fa-regular',
		];
	}



	protected function register_controls() {

		$this->start_controls_section(
			'_section_review',
			[
				'label' => __( 'Testimonial', 'finest-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'ratting',
			[
				'label' => __( 'Rating', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px',
					'size' => 4.2,
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 5,
						'step' => .5,
					],
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'ratting_style',
			[
				'label' => __( 'Rating Style', 'finest-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'star' => __( 'Star', 'finest-addons' ),
					'num' => __( 'Number', 'finest-addons' ),
				],
				'default' => 'star',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'review',
			[
				'label' => __( 'Review', 'finest-addons' ),
				'description' => finest_get_allowed_html_desc( 'intermediate' ),
				'type' => Controls_Manager::TEXTAREA,
				'default' => __( '“We had tried all of the popular project management apps, but none was a perfect fit for our company. Were', 'finest-addons' ),
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'review_position',
			[
				'label' => __( 'Review Position', 'finest-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'before' => __( 'Before Rating', 'finest-addons' ),
					'after' => __( 'After Rating', 'finest-addons' ),
				],
				'default' => 'before',
				'style_transfer' => true,
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'_section_reviewer',
			[
				'label' => __( 'Reviewer', 'finest-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Photo', 'finest-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail',
				'default' => 'large',
				'separator' => 'none',
			]
		);

		$this->add_control(
			'image_position',
			[
				'label' => __( 'Image Position', 'finest-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => __( 'Top', 'finest-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'top',
				'toggle' => false,
				'prefix_class' => 'finest-review--',
				'style_transfer' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Name', 'finest-addons' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => 'Robert Martine',
				'placeholder' => __( 'Type Reviewer Name', 'finest-addons' ),
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'job_title',
			[
				'label' => __( 'Job Title', 'finest-addons' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Businessman', 'finest-addons' ),
				'placeholder' => __( 'Type Reviewer Job Title', 'finest-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'finest-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'finest-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'finest-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'toggle' => true,
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .elementor-widget-container' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Name HTML Tag', 'finest-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'h1'  => [
						'title' => __( 'H1', 'finest-addons' ),
						'icon' => 'eicon-editor-h1'
					],
					'h2'  => [
						'title' => __( 'H2', 'finest-addons' ),
						'icon' => 'eicon-editor-h2'
					],
					'h3'  => [
						'title' => __( 'H3', 'finest-addons' ),
						'icon' => 'eicon-editor-h3'
					],
					'h4'  => [
						'title' => __( 'H4', 'finest-addons' ),
						'icon' => 'eicon-editor-h4'
					],
					'h5'  => [
						'title' => __( 'H5', 'finest-addons' ),
						'icon' => 'eicon-editor-h5'
					],
					'h6'  => [
						'title' => __( 'H6', 'finest-addons' ),
						'icon' => 'eicon-editor-h6'
					]
				],
				'default' => 'h2',
				'toggle' => false,
			]
		);

		$this->end_controls_section();





		$this->start_controls_section(
			'_section_ratting_style',
			[
				'label' => __( 'Rating', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'ratting_size',
			[
				'label' => __( 'Size', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .finest-review-ratting' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ratting_spacing',
			[
				'label' => __( 'Bottom Spacing', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .finest-review-ratting' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'ratting_padding',
			[
				'label' => __( 'Padding', 'finest-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .finest-review-ratting' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'ratting_color',
			[
				'label' => __( 'Text Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-review-ratting' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'ratting_bg_color',
			[
				'label' => __( 'Background Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-review-ratting' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'ratting_border',
				'selector' => '{{WRAPPER}} .finest-review-ratting',
			]
		);

		$this->add_control(
			'ratting_border_radius',
			[
				'label' => __( 'Border Radius', 'finest-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .finest-review-ratting' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'_section_review_style',
			[
				'label' => __( 'Review & Reviewer', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'body_padding',
			[
				'label' => __( 'Text Box Padding', 'finest-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .finest-review-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'_heading_name',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Name', 'finest-addons' ),
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => __( 'Bottom Spacing', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .finest-review-reviewer' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'name_color',
			[
				'label' => __( 'Text Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-review-reviewer' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'name_typography',
				'selector' => '{{WRAPPER}} .finest-review-reviewer',
				'scheme' => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_control(
			'_heading_job_title',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Job Title', 'finest-addons' ),
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'job_title_spacing',
			[
				'label' => __( 'Bottom Spacing', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .finest-review-position' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'job_title_color',
			[
				'label' => __( 'Text Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-review-position' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'job_title_typography',
				'selector' => '{{WRAPPER}} .finest-review-position',
				'scheme' => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_control(
			'_heading_review',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Review', 'finest-addons' ),
				'separator' => 'before'
			]
		);

		$this->add_responsive_control(
			'review_spacing',
			[
				'label' => __( 'Bottom Spacing', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .finest-review-desc' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'review_color',
			[
				'label' => __( 'Text Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-review-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'review_typography',
				'selector' => '{{WRAPPER}} .finest-review-desc',
				'scheme' => Typography::TYPOGRAPHY_3,
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'_section_photo_style',
			[
				'label' => __( 'Photo', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => __( 'Width', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 70,
						'max' => 500,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--finest-review-media-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label' => __( 'Height', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 70,
						'max' => 500,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .finest-review-figure' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'offset_toggle',
			[
				'label' => __( 'Offset', 'finest-addons' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'None', 'finest-addons' ),
				'label_on' => __( 'Custom', 'finest-addons' ),
				'return_value' => 'yes',
			]
		);

		$this->start_popover();

		$this->add_responsive_control(
			'image_offset_x',
			[
				'label' => __( 'Offset X', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition' => [
					'offset_toggle' => 'yes'
				],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--finest-review-media-offset-x: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'image_offset_y',
			[
				'label' => __( 'Offset Y', 'finest-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition' => [
					'offset_toggle' => 'yes'
				],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}}' => '--finest-review-media-offset-y: {{SIZE}}{{UNIT}};'
				],
			]
		);
		$this->end_popover();

		$this->add_responsive_control(
			'image_padding',
			[
				'label' => __( 'Padding', 'finest-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .finest-review-figure img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .finest-review-figure img',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'finest-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .finest-review-figure img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'image_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .finest-review-figure img',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_render_attribute( 'title', 'class', 'finest-review-reviewer' );

		$this->add_inline_editing_attributes( 'job_title', 'basic' );
		$this->add_render_attribute( 'job_title', 'class', 'finest-review-position' );

		$this->add_inline_editing_attributes( 'review', 'intermediate' );
		$this->add_render_attribute( 'review', 'class', 'finest-review-desc' );

		$this->add_render_attribute( 'ratting', 'class', [
			'finest-review-ratting',
			'finest-review-ratting--' . $settings['ratting_style']
		] );

		$ratting = max( 0, $settings['ratting']['size'] );

		?>
		<div>

		</div>
		<?php if ( $settings['image']['url'] || $settings['image']['id'] ) :
			$settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
			?>
			<figure class="finest-review-figure">
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
			</figure>
		<?php endif; ?>

		<div class="finest-review-body">
			<?php if ( $settings['review_position'] === 'before' && $settings['review'] ) : ?>
				<div <?php $this->print_render_attribute_string( 'review' ); ?>>
					<p><?php echo finest_kses_intermediate( $settings['review'] ); ?></p>
				</div>
			<?php endif; ?>

			<div class="finest-review-header">
				<?php if ( $settings['title' ] ) :
					printf( '<%1$s %2$s>%3$s</%1$s>',
						finest_escape_tags( $settings['title_tag'], 'h2' ),
						$this->get_render_attribute_string( 'title' ),
						finest_kses_basic( $settings['title' ] )
						);
				endif; ?>

				<?php if ( $settings['job_title' ] ) : ?>
					<div <?php $this->print_render_attribute_string( 'job_title' ); ?>><?php echo finest_kses_basic( $settings['job_title' ] ); ?></div>
				<?php endif; ?>

				<div <?php $this->print_render_attribute_string( 'ratting' ); ?>>
					<?php if ( $settings['ratting_style'] === 'num' ) : ?>
						<?php echo esc_html( $ratting ); ?> <i class="fas fa-star" aria-hidden="true"></i>
					<?php else :
						for ( $i = 1; $i <= 5; ++$i ) :
							if ( $i <= $ratting ) {
								echo '<i class="fas fa-star" aria-hidden="true"></i>';
							} else {
								echo '<i class="far fa-star" aria-hidden="true"></i>';
							}
						endfor;
					endif; ?>
				 </div>
			</div>

			<?php if ( $settings['review_position'] === 'after' && $settings['review'] ) : ?>
				<div <?php $this->print_render_attribute_string( 'review' ); ?>>
					<p><?php echo finest_kses_intermediate( $settings['review'] ); ?></p>
				</div>
			<?php endif; ?>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Testimonial_Normal() );