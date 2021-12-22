<?php
namespace Finest_Addons\Widgets;

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

class Finest_Normal_Testimonial extends Widget_Base {

    public function get_name() {
		return 'finest-normal-testimonial';
	}

	public function get_title() {
		return esc_html__( 'Testimonial', 'finest-addons' );
	}

	public function get_icon() {
		return 'finest-icon eicon-testimonial';
	}

	public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
        return [ 'finest', 'review', 'feedback', 'testimonial' ];
    }

	protected function register_controls() {

		/**
		 * Testimonial Content Section
		 */

		$this->start_controls_section(
			'finest-addonstestimonial_section',
			[
				'label' => esc_html__( 'Contents', 'finest-addons' )
			]
		);

		$this->add_control(
			'finest_testimonial_image',
			[
				'label'   => __( 'Image', 'finest-addons' ),
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
					'finest_testimonial_image[url]!' => ''
				],
			]
		);

		$this->add_control(
			'finest_testimonial_description',
			[
				'label'   => esc_html__( 'Testimonial', 'finest-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.', 'finest-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_testimonial_name',
			[
				'label'   => esc_html__( 'Name', 'finest-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'John Doe', 'finest-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_testimonial_url',
			[
				'label' => __( 'URL', 'finest-addons' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'finest-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'finest_testimonial_designation',
			[
				'label'   => esc_html__( 'Designation', 'finest-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Co-Founder', 'finest-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_testimonial_enable_rating',
			[
				'label'   => esc_html__( 'Display Rating?', 'finest-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);

		$this->add_control(
			'finest_testimonial_rating_icon',
			[
				'label' => __( 'Rating Icon', 'finest-addons' ),
				'type' => Controls_Manager::ICONS,
				'label_block' => false,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
				'skin' => 'inline',
				'exclude_inline_options' => ['svg'],
				'condition' => [
					'finest_testimonial_enable_rating' => 'yes'
				]
			]
		);

		$rating_number = range( 1, 5 );
        $rating_number = array_combine( $rating_number, $rating_number );

		$this->add_control(
		  	'finest_testimonial_rating_number',
		  	[
				'label'   => __( 'Rating Number', 'finest-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 5,
				'options' => $rating_number,
				'condition' => [
					'finest_testimonial_enable_rating' => 'yes'
				]
		  	]
		);

		$this-> end_controls_section();

		/**
		 * Testimonial Container Style Section
		 */

		$this->start_controls_section(
			'finest_testimonial_container_section_style',
			[
				'label' => esc_html__( 'Container', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'finest_testimonial_layout',
			[
				'label' => __( 'Layout', 'finest-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout-1',
				'options' => [
					'layout-1'  => __( 'Layout 1', 'finest-addons' ),
					'layout-2' => __( 'Layout 2', 'finest-addons' ),
				],
			]
		);

		$this->add_control(
			'finest_testimonial_container_alignment',
			[
				'label'   => __( 'Alignment', 'finest-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'toggle'  => false,
				'default' => 'finest-testimonial-align-left',
				'options' => [
					'finest-testimonial-align-left'   => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-arrow-left'
					],
					'finest-testimonial-align-center' => [
						'title' => __( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-arrow-up'
					],
					'finest-testimonial-align-right'  => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-arrow-right'
					],
					'finest-testimonial-align-bottom' => [
						'title' => __( 'Bottom', 'finest-addons' ),
						'icon'  => 'eicon-arrow-down'
					]
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_container_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_container_radius',
			[
				'label'      => __( 'Border radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '10',
					'right'  => '10',
					'bottom' => '10',
					'left'   => '10'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-testimonial-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->start_controls_tabs( 'finest_testimonial_container_tabs' );

			$this->start_controls_tab( 'finest_testimonial_container_normal', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name'      => 'finest_testimonial_container_background',
						'types'     => [ 'classic', 'gradient' ],
						'selector'  => '{{WRAPPER}} .finest-testimonial-wrapper'
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'            => 'finest_testimonial_container_border',
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
						'selector'        => '{{WRAPPER}} .finest-testimonial-wrapper'
					]
				);

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name'     => 'finest_testimonial_container_box_shadow',
						'selector' => '{{WRAPPER}} .finest-testimonial-wrapper'
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab( 'finest_testimonial_container_hover', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

				$this->add_group_control(
					Group_Control_Background::get_type(),
					[
						'name'      => 'finest_testimonial_container_background_hover',
						'types'     => [ 'classic' ],
						'selector'  => '{{WRAPPER}} .finest-testimonial-wrapper:hover'
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'            => 'finest_testimonial_container_border_hover',
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
						'selector'        => '{{WRAPPER}} .finest-testimonial-wrapper:hover'
					]
				);

				$this->add_group_control(
					Group_Control_Box_Shadow::get_type(),
					[
						'name'     => 'finest_testimonial_container_box_shadow_hover',
						'selector' => '{{WRAPPER}} .finest-testimonial-wrapper:hover'
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_control(
			'finest_testimonial_container_transition_top',
            [
				'label'        => __( 'Transition Top', 'finest-addons' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'finest-addons' ),
				'label_off'    => __( 'Hide', 'finest-addons' ),
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
			'finest_testimonial_image_style',
			[
				'label' => esc_html__( 'Reviewer Image', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'finest_testimonial_image_box',
			[
				'label'        => __( 'Image Box', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'finest-addons' ),
				'label_off'    => __( 'OFF', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_image_box_height',
			[
				'label'       => __( 'Height', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-thumb'=> 'height: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
					'finest_testimonial_image_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_image_box_width',
			[
				'label'       => __( 'Width', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-thumb'=> 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-testimonial-image-align-left .finest-testimonial-thumb, {{WRAPPER}} .finest-testimonial-image-align-right .finest-testimonial-thumb'=> 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-testimonial-image-align-left .finest-testimonial-reviewer, {{WRAPPER}} .finest-testimonial-image-align-right .finest-testimonial-reviewer'=> 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .finest-testimonial-wrapper.finest-testimonial-align-left .finest-testimonial-content-wrapper-arrow::before'=> 'left: calc( {{SIZE}}{{UNIT}} / 2 );',
					'{{WRAPPER}} .finest-testimonial-wrapper.finest-testimonial-align-right .finest-testimonial-content-wrapper-arrow::before'=> 'right: calc(( {{SIZE}}{{UNIT}} / 2) - 10px);'
				],
				'condition'   => [
					'finest_testimonial_image_box' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'finest_testimonial_image_box_border',
				'selector'  => '{{WRAPPER}} .finest-testimonial-thumb',
				'condition' => [
					'finest_testimonial_image_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_image_box_radius',
			[
				'label'      => __( 'Border radius', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-thumb'     => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .finest-testimonial-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'finest_testimonial_image_box_shadow',
				'selector' => '{{WRAPPER}} .finest-testimonial-thumb'
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_image_box_margin_bottom',
			[
				'label'       => __( 'Bottom Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-thumb'=> 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
					'finest_testimonial_container_alignment' => 'finest-testimonial-align-bottom'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'finest_testimonial_image_box_css_filter',
				'selector' => '{{WRAPPER}} .finest-testimonial-thumb img',
			]
		);

		$this-> end_controls_section();

		/**
		 * Testimonial Testimonial Style Section
		 */
		$this->start_controls_section(
			'finest_testimonial_description_style',
			[
				'label' => esc_html__( 'Testimonial', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'finest_testimonial_description_typography',
				'selector' => '{{WRAPPER}} .finest-testimonial-description'
			]
		);

		$this->add_control(
			'finest_testimonial_description_color',
			[
				'label'     => __( 'Text Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .finest-testimonial-description' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'finest_testimonial_description_bg_color',
			[
				'label'     => __( 'Background Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-testimonial-content-wrapper'               => 'background: {{VALUE}};',
					'{{WRAPPER}} .finest-testimonial-content-wrapper-arrow::before' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_description_radius',
			[
				'label'      => __( 'Border Radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-testimonial-content-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_description_spacing_bottom',
			[
				'label'       => __( 'Bottom Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-content-wrapper' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'finest_testimonial_layout' => 'layout-1'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_description_spacing_top',
			[
				'label'       => __( 'Top Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-content-wrapper' => 'margin-top: {{SIZE}}{{UNIT}};'
				],
				'condition' => [
					'finest_testimonial_layout' => 'layout-2'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_description_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-testimonial-content-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'finest_testimonial_description_box_shadow',
				'selector' => '{{WRAPPER}} .finest-testimonial-content-wrapper'
			]
		);

		$this->add_control(
			'finest_testimonial_description_arrow_enable',
			[
				'label'        => __( 'Show Arrow', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'finest-addons' ),
				'label_off'    => __( 'OFF', 'finest-addons' ),
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
			'finest_testimonial_rating_style',
			[
				'label'     => esc_html__( 'Rating', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'finest_testimonial_enable_rating' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_rating_size',
			[
				'label'       => __( 'Icon Size', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-ratings li i' => 'font-size: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_rating_icon_margin',
			[
				'label'       => __( 'Icon Margin', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-ratings li:not(:last-child) i' => 'margin-right: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_rating_margin',
			[
				'label'        => __( 'Margin', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-ratings' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);


		$this->start_controls_tabs( 'finest_testimonial_rating_tabs' );

			// normal state rating
			$this->start_controls_tab( 'finest_testimonial_rating_normal', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

				$this->add_control(
					'finest_testimonial_rating_normal_color',
					[
						'label'     => __( 'Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#222222',
						'selectors' => [
							'{{WRAPPER}} .finest-testimonial-ratings li i' => 'color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

			// hover state rating
			$this->start_controls_tab( 'finest_testimonial_rating_active', [ 'label' => esc_html__( 'Active', 'finest-addons' ) ] );

				$this->add_control(
					'finest_testimonial_rating_active_color',
					[
						'label'     => __( 'Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#ff5b84',
						'selectors' => [
							'{{WRAPPER}} .finest-testimonial-ratings li.finest-testimonial-ratings-active i' => 'color: {{VALUE}};'
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
			'finest_testimonial_reviewer_style',
			[
				'label' => esc_html__( 'Reviewer', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_reviewer_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-testimonial-reviewer-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_reviewer_spacing',
			[
				'label'       => __( 'Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-testimonial-wrapper.finest-testimonial-align-left .finest-testimonial-reviewer-wrapper .finest-testimonial-reviewer' => 'padding-left: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-testimonial-wrapper.finest-testimonial-align-right .finest-testimonial-reviewer-wrapper .finest-testimonial-reviewer' => 'padding-right: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
					'finest_testimonial_container_alignment' => ['finest-testimonial-align-left', 'finest-testimonial-align-right']
				]
			]
		);

		/**
		 * Testimonial Title Style Section
		 */
		$this->add_control(
			'finest_testimonial_title_style',
			[
				'label'     => __( 'Reviewer Title', 'finest-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'             => 'finest_testimonial_title_typography',
				'selector'         => '{{WRAPPER}} .finest-testimonial-name',
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

		$this->start_controls_tabs( 'finest_testimonial_title_tabs' );

			// normal state rating
			$this->start_controls_tab( 'finest_testimonial_title_normal', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

				$this->add_control(
					'finest_testimonial_title_color',
					[
						'label'     => __( 'Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#000000',
						'selectors' => [
							'{{WRAPPER}} .finest-testimonial-name' => 'color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

			// hover state rating
			$this->start_controls_tab( 'finest_testimonial_title_hover', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

				$this->add_control(
					'finest_testimonial_title_color_hover',
					[
						'label'     => __( 'Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .finest-testimonial-name:hover' => 'color: {{VALUE}};'
						]
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'finest_testimonial_title_margin',
			[
				'label'      => __( 'Margin', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		// Testimonial Designation Style Section
		$this->add_control(
			'finest_testimonial_designation_style',
			[
				'label'     => __( 'Reviewer Designation', 'finest-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'             => 'finest_testimonial_designation_typography',
				'selector'         => '{{WRAPPER}} .finest-testimonial-designation',
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
			'finest_testimonial_designation_color',
			[
				'label'     => __( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#333333',
				'selectors' => [
					'{{WRAPPER}} .finest-testimonial-designation' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_testimonial_designation_margin',
			[
				'label'      => __( 'Margin', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-testimonial-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this-> end_controls_section();
	}

	private function render_testimonial_rating( $ratings ) {
		$settings = $this->get_settings_for_display();

		for( $i = 1; $i <= 5; $i++ ) {
			if( $ratings >= $i ) {
				$rating_active_class = '<li class="finest-testimonial-ratings-active"><i class="'.$settings['finest_testimonial_rating_icon']['value'].'"></i></li>';
			} else {
				$rating_active_class = '<li><i class="'.$settings['finest_testimonial_rating_icon']['value'].'"></i></li>';
			}
			echo $rating_active_class;
		}
	}

	private function render_testimonial_image( $image_url ) {
		$output = '';
		if ( !empty( $image_url ) ) :
			$output .= '<div class="finest-testimonial-thumb">';
				$output .= $image_url;
			$output .= '</div>';
		endif;
		return $output;
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$testimonial_image_url_html = Group_Control_Image_Size::get_attachment_image_html( $settings, 'testimonial_thumbnail', 'finest_testimonial_image' );
		$transition_top = '';

		$target = $settings['finest_testimonial_url']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['finest_testimonial_url']['nofollow'] ? ' rel="nofollow"' : '';

		$this->add_inline_editing_attributes( 'finest_testimonial_name', 'basic' );
		$this->add_render_attribute( 'finest_testimonial_name', 'class', 'finest-testimonial-name' );

		$this->add_inline_editing_attributes( 'finest_testimonial_designation', 'basic' );
		$this->add_render_attribute( 'finest_testimonial_designation', 'class', 'finest-testimonial-designation' );

		$this->add_inline_editing_attributes( 'finest_testimonial_description', 'basic' );
		$this->add_render_attribute( 'finest_testimonial_description', 'class', 'finest-testimonial-description' );

		$this->add_render_attribute( 'finest_testimonial_content_wrapper', 'class', 'finest-testimonial-content-wrapper' );

		if ( 'yes' === $settings['finest_testimonial_description_arrow_enable'] ){
			$this->add_render_attribute( 'finest_testimonial_content_wrapper', 'class', 'finest-testimonial-content-wrapper-arrow' );
		}
		if ( 'yes' === $settings['finest_testimonial_container_transition_top'] ){
			$transition_top = 'finest-testimonial-transition-top-'.$settings['finest_testimonial_container_transition_top'];
		}
		?>

		<div class="finest-testimonial-wrapper <?php echo esc_attr( $settings['finest_testimonial_container_alignment'] ).' '.$transition_top; ?>">
			<div class="finest-testimonial-wrapper-inner <?php echo $settings['finest_testimonial_layout']; ?>">
			<?php
				if( 'layout-1' === $settings['finest_testimonial_layout'] ) { ?>

					<div <?php echo $this->get_render_attribute_string( 'finest_testimonial_content_wrapper' ); ?>>
					<?php
						if ( !empty( $settings['finest_testimonial_description'] ) ) : ?>
							<p <?php echo $this->get_render_attribute_string( 'finest_testimonial_description' ); ?>><?php echo wp_kses_post( $settings['finest_testimonial_description'] ); ?></p>
							<?php
							if ( 'yes' === $settings['finest_testimonial_enable_rating'] ) : ?>
								<ul class="finest-testimonial-ratings">
									<?php echo $this->render_testimonial_rating( $settings['finest_testimonial_rating_number'] ); ?>
								</ul>
							<?php
							endif;
						endif;
						?>
					</div>
					<?php
				}
				?>
				<div class="finest-testimonial-reviewer-wrapper">
				<?php
					if( 'finest-testimonial-align-bottom' !== $settings['finest_testimonial_container_alignment'] ) :
						echo $this->render_testimonial_image( $testimonial_image_url_html );
					endif;
					?>
					<div class="finest-testimonial-reviewer">
					<?php
						if ( !empty( $settings['finest_testimonial_name'] ) ) : ?>
							<a href="<?php echo $settings['finest_testimonial_url']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
								<h4 <?php echo $this->get_render_attribute_string( 'finest_testimonial_name' ); ?>><?php echo finest_wp_kses( $settings['finest_testimonial_name'] ); ?></h4>
							</a>
						<?php
						endif;
						if ( !empty( $settings['finest_testimonial_designation'] ) ) : ?>
							<span <?php echo $this->get_render_attribute_string( 'finest_testimonial_designation' ); ?>><?php echo finest_wp_kses( $settings['finest_testimonial_designation'] ); ?></span>
						<?php
						endif;
						?>
					</div>

					<?php
					if( 'finest-testimonial-align-bottom' === $settings['finest_testimonial_container_alignment'] ) :
						echo $this->render_testimonial_image( $testimonial_image_url_html );
					endif;
					?>
				</div>
				<?php
				if( 'layout-2' === $settings['finest_testimonial_layout'] ) { ?>

					<div <?php echo $this->get_render_attribute_string( 'finest_testimonial_content_wrapper' ); ?>>
					<?php
						if ( !empty( $settings['finest_testimonial_description'] ) ) : ?>
							<p <?php echo $this->get_render_attribute_string( 'finest_testimonial_description' ); ?>><?php echo wp_kses_post( $settings['finest_testimonial_description'] ); ?></p>
							<?php
							if ( 'yes' === $settings['finest_testimonial_enable_rating'] ) : ?>
								<ul class="finest-testimonial-ratings">
								<?php
									$this->render_testimonial_rating( $settings['finest_testimonial_rating_number'] ); ?>
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
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Normal_Testimonial() );