<?php
namespace Quik_Theme_Addons\Widgets;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Icons_Manager;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Quik_Theme_Normal_Testimonial extends Widget_Base {

    public function get_name() {
		return 'quiktheme-normal-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-layers';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
        return [ 'quik-theme-addons', 'review', 'feedback', 'testimonial' ];
    }

	protected function register_controls() {

		/**
		 * Testimonial Content Section
		 */

		$this->start_controls_section(
			'quiktheme-addonstestimonial_section',
			[
				'label' => esc_html__( 'Contents', 'quiktheme-addons' )
			]
		);

		$this->add_control(
			'quik_theme_testimonial_image',
			[
				'label'   => __( 'Image', 'quiktheme-addons' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src()
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'testimonial_thumbnail',
				'default'   => 'medium_large',
				'condition' => [
					'quik_theme_testimonial_image[url]!' => ''
				],
			]
		);

		$this->add_control(
			'quik_theme_testimonial_description',
			[
				'label'   => esc_html__( 'Testimonial', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.', 'quiktheme-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'quik_theme_testimonial_name',
			[
				'label'   => esc_html__( 'Name', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'quiktheme-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'quik_theme_testimonial_url',
			[
				'label' => __( 'URL', 'quiktheme-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'quiktheme-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'quik_theme_testimonial_designation',
			[
				'label'   => esc_html__( 'Designation', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Co-Founder', 'quiktheme-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'quik_theme_testimonial_enable_rating',
			[
				'label'   => esc_html__( 'Display Rating?', 'quiktheme-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);

		$this->add_control(
			'quik_theme_testimonial_rating_icon',
			[
				'label' => __( 'Rating Icon', 'quiktheme-addons' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => false,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'skin' => 'inline',
				'exclude_inline_options' => ['svg'],
				'condition' => [
					'quik_theme_testimonial_enable_rating' => 'yes'
				]
			]
		);

		$rating_number = range( 1, 5 );
        $rating_number = array_combine( $rating_number, $rating_number );

		$this->add_control(
		  	'quik_theme_testimonial_rating_number',
		  	[
				'label'   => __( 'Rating Number', 'quiktheme-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 5,
				'options' => $rating_number,
				'condition' => [
					'quik_theme_testimonial_enable_rating' => 'yes'
				]
		  	]
		);

		$this-> end_controls_section();

		/**
		 * Testimonial Container Style Section
		 */

		$this->start_controls_section(
			'quik_theme_testimonial_container_section_style',
			[
				'label' => esc_html__( 'Container', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'quik_theme_testimonial_layout',
			[
				'label' => __( 'Layout', 'quiktheme-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout-1',
				'options' => [
					'layout-1'  => __( 'Layout 1', 'quiktheme-addons' ),
					'layout-2' => __( 'Layout 2', 'quiktheme-addons' ),
				],
			]
		);

		$this->add_control(
			'quik_theme_testimonial_container_alignment',
			[
				'label'   => __( 'Alignment', 'quiktheme-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'toggle'  => false,
				'default' => 'quiktheme-testimonial-align-left',
				'options' => [
					'quiktheme-testimonial-align-left'   => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon'  => 'eicon-arrow-left'
					],
					'quiktheme-testimonial-align-center' => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-arrow-up'
					],
					'quiktheme-testimonial-align-right'  => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon'  => 'eicon-arrow-right'
					],
					'quiktheme-testimonial-align-bottom' => [
						'title' => __( 'Bottom', 'quiktheme-addons' ),
						'icon'  => 'eicon-arrow-down'
					]
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_container_padding',
			[
				'label'      => __( 'Padding', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator'  => 'before',
				'default'    => [
					'top'    => '20',
					'right'  => '20',
					'bottom' => '20',
					'left'   => '20'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_container_radius',
			[
				'label'      => __( 'Border radius', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '10',
					'right'  => '10',
					'bottom' => '10',
					'left'   => '10'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->start_controls_tabs( 'quik_theme_testimonial_container_tabs' );

			$this->start_controls_tab( 'quik_theme_testimonial_container_normal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );

				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name'      => 'quik_theme_testimonial_container_background',
						'types'     => [ 'classic', 'gradient' ],
						'selector'  => '{{WRAPPER}} .quiktheme-testimonial-wrapper'
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'            => 'quik_theme_testimonial_container_border',
						'fields_options'  => [
							'border'      => [
								'default' => 'solid'
							],
							'width'          => [
								'default'    => [
									'top'    => '1',
									'right'  => '1',
									'bottom' => '1',
									'left'   => '1'
								]
							],
							'color'       => [
								'default' => '#e3e3e3'
							]
						],
						'selector'        => '{{WRAPPER}} .quiktheme-testimonial-wrapper'
					]
				);

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name'     => 'quik_theme_testimonial_container_box_shadow',
						'selector' => '{{WRAPPER}} .quiktheme-testimonial-wrapper'
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab( 'quik_theme_testimonial_container_hover', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );

				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name'      => 'quik_theme_testimonial_container_background_hover',
						'types'     => [ 'classic' ],
						'selector'  => '{{WRAPPER}} .quiktheme-testimonial-wrapper:hover'
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'            => 'quik_theme_testimonial_container_border_hover',
						'fields_options'  => [
							'border'      => [
								'default' => 'solid'
							],
							'width'          => [
								'default'    => [
									'top'    => '1',
									'right'  => '1',
									'bottom' => '1',
									'left'   => '1'
								]
							],
							'color'       => [
								'default' => '#e3e3e3'
							]
						],
						'selector'        => '{{WRAPPER}} .quiktheme-testimonial-wrapper:hover'
					]
				);

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name'     => 'quik_theme_testimonial_container_box_shadow_hover',
						'selector' => '{{WRAPPER}} .quiktheme-testimonial-wrapper:hover'
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'quik_theme_testimonial_container_transition_top',
            [
				'label'        => __( 'Transition Top', 'quiktheme-addons' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'quiktheme-addons' ),
				'label_off'    => __( 'Hide', 'quiktheme-addons' ),
				'separator'   => 'before',
				'return_value' => 'yes',
				'default'      => 'yes'
			]
        );

		$this-> end_controls_section();

		/**
		 * testimonial Review Image style
		 */
		$this->start_controls_section(
			'quik_theme_testimonial_image_style',
			[
				'label' => esc_html__( 'Reviewer Image', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'quik_theme_testimonial_image_box',
			[
				'label'        => __( 'Image Box', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'quiktheme-addons' ),
				'label_off'    => __( 'OFF', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_image_box_height',
			[
				'label'       => __( 'Height', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 500
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 80
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-thumb'=> 'height: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
					'quik_theme_testimonial_image_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_image_box_width',
			[
				'label'       => __( 'Width', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'separator'   => 'after',
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 500
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 80
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-thumb'=> 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-testimonial-image-align-left .quiktheme-testimonial-thumb, {{WRAPPER}} .quiktheme-testimonial-image-align-right .quiktheme-testimonial-thumb'=> 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-testimonial-image-align-left .quiktheme-testimonial-reviewer, {{WRAPPER}} .quiktheme-testimonial-image-align-right .quiktheme-testimonial-reviewer'=> 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .quiktheme-testimonial-wrapper.quiktheme-testimonial-align-left .quiktheme-testimonial-content-wrapper-arrow::before'=> 'left: calc( {{SIZE}}{{UNIT}} / 2 );',
					'{{WRAPPER}} .quiktheme-testimonial-wrapper.quiktheme-testimonial-align-right .quiktheme-testimonial-content-wrapper-arrow::before'=> 'right: calc(( {{SIZE}}{{UNIT}} / 2) - 10px);'
				],
				'condition'   => [
					'quik_theme_testimonial_image_box' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'quik_theme_testimonial_image_box_border',
				'selector'  => '{{WRAPPER}} .quiktheme-testimonial-thumb',
				'condition' => [
					'quik_theme_testimonial_image_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_image_box_radius',
			[
				'label'      => __( 'Border radius', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '50',
					'right'  => '50',
					'bottom' => '50',
					'left'   => '50',
					'unit'   => '%'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-thumb'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-testimonial-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'quik_theme_testimonial_image_box_shadow',
				'selector' => '{{WRAPPER}} .quiktheme-testimonial-thumb'
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_image_box_margin_bottom',
			[
				'label'       => __( 'Bottom Spacing', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px' ],
				'range'       => [
					'px'      => [
						'min' => -500,
						'max' => 500
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 0
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-thumb'=> 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
					'quik_theme_testimonial_container_alignment' => 'quiktheme-testimonial-align-bottom'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'quik_theme_testimonial_image_box_css_filter',
				'selector' => '{{WRAPPER}} .quiktheme-testimonial-thumb img',
			]
		);

		$this-> end_controls_section();

		/**
		 * Testimonial Testimonial Style Section
		 */
		$this->start_controls_section(
			'quik_theme_testimonial_description_style',
			[
				'label' => esc_html__( 'Testimonial', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'quik_theme_testimonial_description_typography',
				'selector' => '{{WRAPPER}} .quiktheme-testimonial-description'
			]
		);

		$this->add_control(
			'quik_theme_testimonial_description_color',
			[
				'label'     => __( 'Text Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-testimonial-description' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'quik_theme_testimonial_description_bg_color',
			[
				'label'     => __( 'Background Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-testimonial-content-wrapper'               => 'background: {{VALUE}};',
					'{{WRAPPER}} .quiktheme-testimonial-content-wrapper-arrow::before' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_description_radius',
			[
				'label'      => __( 'Border Radius', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-content-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_description_spacing_bottom',
			[
				'label'       => __( 'Bottom Spacing', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 100
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 20
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-content-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'quik_theme_testimonial_layout' => 'layout-1'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_description_spacing_top',
			[
				'label'       => __( 'Top Spacing', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 100
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 20
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-content-wrapper' => 'margin-top: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'quik_theme_testimonial_layout' => 'layout-2'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_description_padding',
			[
				'label'      => __( 'Padding', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'quik_theme_testimonial_description_box_shadow',
				'selector' => '{{WRAPPER}} .quiktheme-testimonial-content-wrapper'
			]
		);

		$this->add_control(
			'quik_theme_testimonial_description_arrow_enable',
			[
				'label'        => __( 'Show Arrow', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'quiktheme-addons' ),
				'label_off'    => __( 'OFF', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'separator'    => 'before'
			]
		);

		$this-> end_controls_section();

		/**
		 * Testimonial Rating Style Section
		 */
		$this->start_controls_section(
			'quik_theme_testimonial_rating_style',
			[
				'label'     => esc_html__( 'Rating', 'quiktheme-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'quik_theme_testimonial_enable_rating' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_rating_size',
			[
				'label'       => __( 'Icon Size', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px', '%' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 50
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 20
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-ratings li i' => 'font-size: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_rating_icon_margin',
			[
				'label'       => __( 'Icon Margin', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px', '%' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 30
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 5
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-ratings li:not(:last-child) i' => 'margin-right: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_rating_margin',
			[
				'label'        => __( 'Margin', 'quiktheme-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '20',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'    => [
					'{{WRAPPER}} .quiktheme-testimonial-ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);


		$this->start_controls_tabs( 'quik_theme_testimonial_rating_tabs' );

			// normal state rating
			$this->start_controls_tab( 'quik_theme_testimonial_rating_normal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );

				$this->add_control(
					'quik_theme_testimonial_rating_normal_color',
					[
						'label'     => __( 'Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#222222',
						'selectors' => [
							'{{WRAPPER}} .quiktheme-testimonial-ratings li i' => 'color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

			// hover state rating
			$this->start_controls_tab( 'quik_theme_testimonial_rating_active', [ 'label' => esc_html__( 'Active', 'quiktheme-addons' ) ] );

				$this->add_control(
					'quik_theme_testimonial_rating_active_color',
					[
						'label'     => __( 'Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#ff5b84',
						'selectors' => [
							'{{WRAPPER}} .quiktheme-testimonial-ratings li.quiktheme-testimonial-ratings-active i' => 'color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this-> end_controls_section();

		/**
		 * Testimonial Riviewer Style Section
		 */
		$this->start_controls_section(
			'quik_theme_testimonial_reviewer_style',
			[
				'label' => esc_html__( 'Reviewer', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_reviewer_padding',
			[
				'label'      => __( 'Padding', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-reviewer-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_reviewer_spacing',
			[
				'label'       => __( 'Spacing', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 100
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 20
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-testimonial-wrapper.quiktheme-testimonial-align-left .quiktheme-testimonial-reviewer-wrapper .quiktheme-testimonial-reviewer' => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-testimonial-wrapper.quiktheme-testimonial-align-right .quiktheme-testimonial-reviewer-wrapper .quiktheme-testimonial-reviewer' => 'padding-right: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
					'quik_theme_testimonial_container_alignment' => ['quiktheme-testimonial-align-left', 'quiktheme-testimonial-align-right']
				]
			]
		);

		/**
		 * Testimonial Title Style Section
		 */
		$this->add_control(
			'quik_theme_testimonial_title_style',
			[
				'label'     => __( 'Reviewer Title', 'quiktheme-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'             => 'quik_theme_testimonial_title_typography',
				'selector'         => '{{WRAPPER}} .quiktheme-testimonial-name',
				'fields_options'   => [
					'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 22
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ]
			]
		);

		$this->start_controls_tabs( 'quik_theme_testimonial_title_tabs' );

			// normal state rating
			$this->start_controls_tab( 'quik_theme_testimonial_title_normal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );

				$this->add_control(
					'quik_theme_testimonial_title_color',
					[
						'label'     => __( 'Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#000000',
						'selectors' => [
							'{{WRAPPER}} .quiktheme-testimonial-name' => 'color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

			// hover state rating
			$this->start_controls_tab( 'quik_theme_testimonial_title_hover', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );

				$this->add_control(
					'quik_theme_testimonial_title_color_hover',
					[
						'label'     => __( 'Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .quiktheme-testimonial-name:hover' => 'color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'quik_theme_testimonial_title_margin',
			[
				'label'      => __( 'Margin', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		// Testimonial Designation Style Section
		$this->add_control(
			'quik_theme_testimonial_designation_style',
			[
				'label'     => __( 'Reviewer Designation', 'quiktheme-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'             => 'quik_theme_testimonial_designation_typography',
				'selector'         => '{{WRAPPER}} .quiktheme-testimonial-designation',
				'fields_options'   => [
					'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 14
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ]
			]
		);

		$this->add_control(
			'quik_theme_testimonial_designation_color',
			[
				'label'     => __( 'Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#333333',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-testimonial-designation' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_testimonial_designation_margin',
			[
				'label'      => __( 'Margin', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-testimonial-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this-> end_controls_section();
	}

	private function render_testimonial_rating( $ratings ) {
		$settings = $this->get_settings_for_display();

		for( $i = 1; $i <= 5; $i++ ) {
			if( $ratings >= $i ) {
				$rating_active_class = '<li class="quiktheme-testimonial-ratings-active"><i class="'.$settings['quik_theme_testimonial_rating_icon']['value'].'"></i></li>';
			} else {
				$rating_active_class = '<li><i class="'.$settings['quik_theme_testimonial_rating_icon']['value'].'"></i></li>';
			}
			echo $rating_active_class;
		}
	}

	private function render_testimonial_image( $image_url ) {
		$output = '';
		if ( !empty( $image_url ) ) :
			$output .= '<div class="quiktheme-testimonial-thumb">';
				$output .= $image_url;
			$output .= '</div>';
		endif;
		return $output;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$testimonial_image_url_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'testimonial_thumbnail', 'quik_theme_testimonial_image' );
		$transition_top = '';

		$target = $settings['quik_theme_testimonial_url']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['quik_theme_testimonial_url']['nofollow'] ? ' rel="nofollow"' : '';

		$this->add_inline_editing_attributes( 'quik_theme_testimonial_name', 'basic' );
		$this->add_render_attribute( 'quik_theme_testimonial_name', 'class', 'quiktheme-testimonial-name' );

		$this->add_inline_editing_attributes( 'quik_theme_testimonial_designation', 'basic' );
		$this->add_render_attribute( 'quik_theme_testimonial_designation', 'class', 'quiktheme-testimonial-designation' );

		$this->add_inline_editing_attributes( 'quik_theme_testimonial_description', 'basic' );
		$this->add_render_attribute( 'quik_theme_testimonial_description', 'class', 'quiktheme-testimonial-description' );

		$this->add_render_attribute( 'quik_theme_testimonial_content_wrapper', 'class', 'quiktheme-testimonial-content-wrapper' );

		if ( 'yes' === $settings['quik_theme_testimonial_description_arrow_enable'] ){
			$this->add_render_attribute( 'quik_theme_testimonial_content_wrapper', 'class', 'quiktheme-testimonial-content-wrapper-arrow' );
		}
		if ( 'yes' === $settings['quik_theme_testimonial_container_transition_top'] ){
			$transition_top = 'quiktheme-testimonial-transition-top-'.$settings['quik_theme_testimonial_container_transition_top'];
		}
		?>

		<div class="quiktheme-testimonial-wrapper <?php echo esc_attr( $settings['quik_theme_testimonial_container_alignment'] ).' '.$transition_top; ?>">
			<div class="quiktheme-testimonial-wrapper-inner <?php echo $settings['quik_theme_testimonial_layout']; ?>">
			<?php
				if( 'layout-1' === $settings['quik_theme_testimonial_layout'] ) { ?>

					<div <?php echo $this->get_render_attribute_string( 'quik_theme_testimonial_content_wrapper' ); ?>>
					<?php
						if ( !empty( $settings['quik_theme_testimonial_description'] ) ) : ?>
							<p <?php echo $this->get_render_attribute_string( 'quik_theme_testimonial_description' ); ?>><?php echo wp_kses_post( $settings['quik_theme_testimonial_description'] ); ?></p>
							<?php
							if ( 'yes' === $settings['quik_theme_testimonial_enable_rating'] ) : ?>
								<ul class="quiktheme-testimonial-ratings">
									<?php echo $this->render_testimonial_rating( $settings['quik_theme_testimonial_rating_number'] ); ?>
								</ul>
							<?php
							endif;
						endif;
						?>
					</div>
					<?php
				}
				?>
				<div class="quiktheme-testimonial-reviewer-wrapper">
				<?php
					if( 'quiktheme-testimonial-align-bottom' !== $settings['quik_theme_testimonial_container_alignment'] ) :
						echo $this->render_testimonial_image( $testimonial_image_url_html );
					endif;
					?>
					<div class="quiktheme-testimonial-reviewer">
					<?php
						if ( !empty( $settings['quik_theme_testimonial_name'] ) ) : ?>
							<a href="<?php echo $settings['quik_theme_testimonial_url']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
								<h4 <?php echo $this->get_render_attribute_string( 'quik_theme_testimonial_name' ); ?>><?php echo quik_theme_wp_kses( $settings['quik_theme_testimonial_name'] ); ?></h4>
							</a>
						<?php
						endif;
						if ( !empty( $settings['quik_theme_testimonial_designation'] ) ) : ?>
							<span <?php echo $this->get_render_attribute_string( 'quik_theme_testimonial_designation' ); ?>><?php echo quik_theme_wp_kses( $settings['quik_theme_testimonial_designation'] ); ?></span>
						<?php
						endif;
						?>
					</div>

					<?php
					if( 'quiktheme-testimonial-align-bottom' === $settings['quik_theme_testimonial_container_alignment'] ) :
						echo $this->render_testimonial_image( $testimonial_image_url_html );
					endif;
					?>
				</div>
				<?php
				if( 'layout-2' === $settings['quik_theme_testimonial_layout'] ) { ?>

					<div <?php echo $this->get_render_attribute_string( 'quik_theme_testimonial_content_wrapper' ); ?>>
					<?php
						if ( !empty( $settings['quik_theme_testimonial_description'] ) ) : ?>
							<p <?php echo $this->get_render_attribute_string( 'quik_theme_testimonial_description' ); ?>><?php echo wp_kses_post( $settings['quik_theme_testimonial_description'] ); ?></p>
							<?php
							if ( 'yes' === $settings['quik_theme_testimonial_enable_rating'] ) : ?>
								<ul class="quiktheme-testimonial-ratings">
								<?php
									$this->render_testimonial_rating( $settings['quik_theme_testimonial_rating_number'] ); ?>
								</ul>
							<?php
							endif;
						endif;
						?>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	<?php
	}
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Normal_Testimonial() );