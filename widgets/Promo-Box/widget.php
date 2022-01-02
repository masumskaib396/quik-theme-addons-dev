<?php
namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use \Elementor\Icons_Manager;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Finest_Promo_Box extends Widget_Base {

	public function get_name() {
		return 'finest-promo-box';
	}

	public function get_title() {
		return esc_html__( 'Finest Promo Box', 'finest-addons' );
	}

	public function get_icon() {
		return 'feather icon-box';
	}

	public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return [ 'promo', 'blurb', 'infobox', 'content', 'block', 'box' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_promo_box',
			array(
				'label' => __( 'Content', 'finest-addons' ),
			)
		);
		$this->add_control(
			'heading',
			array(
				'label'   => __( 'Heading', 'finest-addons' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => array(
					'active' => true,
				),
				'default' => __( '90% OFF', 'finest-addons' ),
			)
		);

		$this->add_control(
			'heading_html_tag',
			array(
				'label'   => __( 'Heading HTML Tag', 'finest-addons' ),
				'type'    => Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'h4',
				'options' => array(
					'h1'   => __( 'H1', 'finest-addons' ),
					'h2'   => __( 'H2', 'finest-addons' ),
					'h3'   => __( 'H3', 'finest-addons' ),
					'h4'   => __( 'H4', 'finest-addons' ),
					'h5'   => __( 'H5', 'finest-addons' ),
					'h6'   => __( 'H6', 'finest-addons' ),
					'div'  => __( 'div', 'finest-addons' ),
					'span' => __( 'span', 'finest-addons' ),
					'p'    => __( 'p', 'finest-addons' ),
				),
			)
		);

		$this->add_control(
			'divider_heading_switch',
			array(
				'label'        => __( 'Heading Divider', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'On', 'finest-addons' ),
				'label_off'    => __( 'Off', 'finest-addons' ),
				'return_value' => 'yes',
				'condition'    => array(
					'heading!' => '',
				),
			)
		);

		$this->add_control(
			'sub_heading',
			array(
				'label'   => __( 'Sub Heading', 'finest-addons' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic' => array(
					'active' => true,
				),
				'default' => __( 'Buy 1 Get 1 Free Offer', 'finest-addons' ),
			)
		);

		$this->add_control(
			'sub_heading_html_tag',
			array(
				'label'   => __( 'Sub Heading HTML Tag', 'finest-addons' ),
				'type'    => Controls_Manager::SELECT,
				'label_block' => true,
				'default' => 'h5',
				'options' => array(
					'h1'   => __( 'H1', 'finest-addons' ),
					'h2'   => __( 'H2', 'finest-addons' ),
					'h3'   => __( 'H3', 'finest-addons' ),
					'h4'   => __( 'H4', 'finest-addons' ),
					'h5'   => __( 'H5', 'finest-addons' ),
					'h6'   => __( 'H6', 'finest-addons' ),
					'div'  => __( 'div', 'finest-addons' ),
					'span' => __( 'span', 'finest-addons' ),
					'p'    => __( 'p', 'finest-addons' ),
				),
			)
		);

		$this->add_control(
			'divider_subheading_switch',
			array(
				'label'        => __( 'Sub Heading Divider', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'On', 'finest-addons' ),
				'label_off'    => __( 'Off', 'finest-addons' ),
				'return_value' => 'yes',
				'condition'    => array(
					'sub_heading!' => '',
				),
			)
		);

		$this->add_control(
			'content',
			array(
				'label'   => __( 'Description', 'finest-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic' => array(
					'active' => true,
				),
				'default' => __( 'Enter promo box description', 'finest-addons' ),
			)
		);

		$this->end_controls_section();

		/**
		 * Content Tab: Icon
		 */
		$this->start_controls_section(
			'section_promo_box_icon',
			array(
				'label' => __( 'Icon', 'finest-addons' ),
			)
		);

		$this->add_control(
			'icon_switch',
			array(
				'label'        => __( 'Show Icon', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'Yes', 'finest-addons' ),
				'label_off'    => __( 'No', 'finest-addons' ),
				'return_value' => 'yes',
			)
		);

		$this->add_control(
			'icon_type',
			array(
				'label'     => __( 'Icon Type', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'icon',
				'options'   => array(
					'icon'  => __( 'Icon', 'finest-addons' ),
					'image' => __( 'Image', 'finest-addons' ),
				),
				'condition' => array(
					'icon_switch' => 'yes',
				),
			)
		);

		$this->add_control(
			'selected_icon',
			array(
				'label'            => __( 'Choose', 'finest-addons' ) . ' ' . __( 'Icon', 'finest-addons' ),
				'type'             => Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default'          => array(
					'value'   => 'fas fa-gem',
					'library' => 'fa-solid',
				),
				'condition'        => array(
					'icon_switch' => 'yes',
					'icon_type'   => 'icon',
				),
			)
		);

		$this->add_control(
			'icon_image',
			array(
				'label'     => __( 'Image', 'finest-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => array(
					'url' => Utils::get_placeholder_image_src(),
				),
				'condition' => array(
					'icon_switch' => 'yes',
					'icon_type'   => 'image',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			array(
				'name'      => 'image', // Usage: '{name}_size' and '{name}_custom_dimension', in this case 'image_size' and 'image_custom_dimension'.
				'default'   => 'full',
				'separator' => 'none',
				'condition' => array(
					'icon_switch' => 'yes',
					'icon_type'   => 'image',
				),
			)
		);

		$this->add_control(
			'icon_position',
			array(
				'label'     => __( 'Icon Position', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'above-title',
				'options'   => array(
					'above-title' => __( 'Above Title', 'finest-addons' ),
					'below-title' => __( 'Below Title', 'finest-addons' ),
				),
				'condition' => array(
					'icon_switch' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Content Tab: Button
		 */
		$this->start_controls_section(
			'section_promo_box_button',
			array(
				'label' => __( 'Button', 'finest-addons' ),
			)
		);

		$this->add_control(
			'button_switch',
			array(
				'label'        => __( 'Button', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'On', 'finest-addons' ),
				'label_off'    => __( 'Off', 'finest-addons' ),
				'return_value' => 'yes',
			)
		);

		$this->add_control(
			'button_text',
			array(
				'label'     => __( 'Button Text', 'finest-addons' ),
				'type'      => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'   => array(
					'active' => true,
				),
				'default'   => __( 'Get Started', 'finest-addons' ),
				'condition' => array(
					'button_switch' => 'yes',
				),
			)
		);

		$this->add_control(
			'link',
			array(
				'label'       => __( 'Link', 'finest-addons' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'dynamic'     => array(
					'active' => true,
				),
				'placeholder' => 'https://www.your-link.com',
				'default'     => array(
					'url' => '#',
				),
				'condition'   => array(
					'button_switch' => 'yes',
				),
			)
		);

		$this->end_controls_section();


		/*
		-----------------------------------------------------------------------------------*/
		/*
		  STYLE TAB
		/*-----------------------------------------------------------------------------------*/

		/**
		 * Style Tab: Promo Box
		 */
		$this->start_controls_section(
			'section_promo_box_style',
			array(
				'label' => __( 'Promo Box', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'     => 'box_bg',
				'label'    => __( 'Background', 'finest-addons' ),
				'types'    => array( 'classic', 'gradient' ),
				'selector' => '{{WRAPPER}} .finest-promo-box-bg',
			)
		);

		$this->add_responsive_control(
			'box_height',
			array(
				'label'      => __( 'Height', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'px' => array(
						'min'  => 50,
						'max'  => 1000,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box' => 'height: {{SIZE}}{{UNIT}}',
				),
				'separator'  => 'before',
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'promo_box_border',
				'label'       => __( 'Border', 'finest-addons' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .finest-promo-box-wrap',
			)
		);

		$this->add_control(
			'promo_box_border_radius',
			array(
				'label'      => __( 'Border Radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box, {{WRAPPER}} .finest-promo-box-wrap, {{WRAPPER}} .finest-promo-box .finest-promo-box-banner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'box_padding',
			array(
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Overlay
		 */
		$this->start_controls_section(
			'section_promo_overlay_style',
			array(
				'label' => __( 'Overlay', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'overlay_switch',
			array(
				'label'        => __( 'Overlay', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '',
				'label_on'     => __( 'On', 'finest-addons' ),
				'label_off'    => __( 'Off', 'finest-addons' ),
				'return_value' => 'yes',
				'separator'    => 'before',
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'overlay_color',
				'label'     => __( 'Color', 'finest-addons' ),
				'types'     => array( 'classic', 'gradient' ),
				'selector'  => '{{WRAPPER}} .finest-promo-box-overlay',
				'condition' => array(
					'overlay_switch' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Content
		 */
		$this->start_controls_section(
			'section_promo_content_style',
			array(
				'label' => __( 'Content Area', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'content_width',
			array(
				'label'      => __( 'Width', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 1200,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-wrap' => 'width: {{SIZE}}{{UNIT}}',
				),
				'separator'  => 'before',
			)
		);

		$this->add_control(
			'align',
			array(
				'label'       => __( 'Alignment', 'finest-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => array(
					'left'   => array(
						'title' => __( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-h-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-v-align-top',
					),
					'right'  => array(
						'title' => __( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-h-align-right',
					),
				),
				'default'     => '',
				'selectors'   => array(
					'{{WRAPPER}} .finest-promo-box' => 'text-align: {{VALUE}};',
				),
			)
		);

		$this->add_control(
			'vertical_align',
			array(
				'label'       => __( 'Vertical Alignment', 'finest-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'default'     => 'middle',
				'options'     => array(
					'top'    => array(
						'title' => __( 'Top', 'finest-addons' ),
						'icon'  => 'eicon-v-align-top',
					),
					'middle' => array(
						'title' => __( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-v-align-middle',
					),
					'bottom' => array(
						'title' => __( 'Bottom', 'finest-addons' ),
						'icon'  => 'eicon-v-align-bottom',
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .finest-promo-box-inner-content'   => 'vertical-align: {{VALUE}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			array(
				'name'      => 'content_bg',
				'label'     => __( 'Background', 'finest-addons' ),
				'types'     => array( 'classic', 'gradient' ),
				'selector'  => '{{WRAPPER}} .finest-promo-box-inner',
				'separator' => 'before',
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'content_border',
				'label'       => __( 'Border', 'finest-addons' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .finest-promo-box-inner',
				'separator'   => 'before',
			)
		);

		$this->add_control(
			'content_border_radius',
			array(
				'label'      => __( 'Border Radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'content_padding',
			array(
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Icon Section
		 */
		$this->start_controls_section(
			'section_promo_box_icon_style',
			array(
				'label'     => __( 'Icon', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'icon_switch' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'icon_size',
			array(
				'label'      => __( 'Icon Size', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'unit' => 'px',
					'size' => 30,
				),
				'range'      => array(
					'px' => array(
						'min'  => 5,
						'max'  => 200,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', 'em' ),
				'selectors'  => [
					'{{WRAPPER}} .finest-promo-box-icon .finest-promo-box-icon-inner i' => 'font-size: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .finest-promo-box-icon .finest-promo-box-icon-inner svg' => 'height: {{SIZE}}{{UNIT}}',
				],
				'condition'  => array(
					'icon_switch' => 'yes',
					'icon_type'   => 'icon',
				),
			)
		);

		$this->add_responsive_control(
			'icon_img_width',
			array(
				'label'      => __( 'Width', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'range'      => array(
					'px' => array(
						'min'  => 1,
						'max'  => 500,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 1,
						'max'  => 100,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-icon img' => 'width: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'icon_switch' => 'yes',
					'icon_type'   => 'image',
				),
			)
		);

		$this->start_controls_tabs( 'tabs_icon_style' );

		$this->start_controls_tab(
			'tab_icon_normal',
			array(
				'label' => __( 'Normal', 'finest-addons' ),
			)
		);

		$this->add_control(
			'icon_color_normal',
			array(
				'label'     => __( 'Icon Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-icon .finest-promo-box-icon-inner i'   => 'color: {{VALUE}}',
					'{{WRAPPER}} .finest-promo-box-icon .finest-promo-box-icon-inner svg path' => 'fill: {{VALUE}}',
				),
				'condition' => array(
					'icon_switch' => 'yes',
					'icon_type'   => 'icon',
				),
			)
		);

		$this->add_control(
			'icon_bg_color_normal',
			array(
				'label'     => __( 'Background Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-icon' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_responsive_control(
			'icon_padding',
			array(
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'icon_border',
				'label'       => __( 'Border', 'finest-addons' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .finest-promo-box-icon',
			)
		);

		$this->add_control(
			'icon_border_radius',
			array(
				'label'      => __( 'Border Radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-icon, {{WRAPPER}} .finest-promo-box-icon img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'icon_margin',
			array(
				'label'       => __( 'Margin', 'finest-addons' ),
				'type'        => Controls_Manager::DIMENSIONS,
				'size_units'  => array( 'px', '%' ),
				'placeholder' => array(
					'top'    => '',
					'right'  => '',
					'bottom' => '',
					'left'   => '',
				),
				'selectors'   => array(
					'{{WRAPPER}} .finest-promo-box-icon' => 'margin-top: {{TOP}}{{UNIT}}; margin-left: {{LEFT}}{{UNIT}}; margin-right: {{RIGHT}}{{UNIT}}; margin-bottom: {{BOTTOM}}{{UNIT}};',
				),
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			array(
				'label' => __( 'Hover', 'finest-addons' ),
			)
		);

		$this->add_control(
			'icon_color_hover',
			array(
				'label'     => __( 'Icon Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box:hover .finest-promo-box-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .finest-promo-box:hover .finest-promo-box-icon svg path' => 'fill: {{VALUE}}',
				),
				'condition' => array(
					'icon_switch' => 'yes',
					'icon_type'   => 'icon',
				),
			)
		);

		$this->add_control(
			'icon_bg_color_hover',
			array(
				'label'     => __( 'Background Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box:hover .finest-promo-box-icon' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'hover_animation_icon',
			array(
				'label' => __( 'Icon Animation', 'finest-addons' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/**
		 * Style Tab: Heading Section
		 */
		$this->start_controls_section(
			'section_promo_box_heading_style',
			array(
				'label' => __( 'Heading', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-title' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-promo-box-title',
			)
		);

		$this->add_responsive_control(
			'title_margin',
			array(
				'label'      => __( 'Spacing', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 20,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 30,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-title' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Heading Divider Section
		 */
		$this->start_controls_section(
			'section_heading_divider_style',
			array(
				'label'     => __( 'Heading Divider', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'divider_heading_switch' => 'yes',
				),
			)
		);

		$this->add_control(
			'divider_heading_type',
			array(
				'label'     => __( 'Divider Type', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'border',
				'options'   => array(
					'border' => __( 'Border', 'finest-addons' ),
					'image'  => __( 'Image', 'finest-addons' ),
				),
				'condition' => array(
					'divider_heading_switch' => 'yes',
				),
			)
		);

		$this->add_control(
			'divider_title_image',
			array(
				'label'     => __( 'Image', 'finest-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array(
					'divider_heading_switch' => 'yes',
					'divider_heading_type'   => 'image',
				),
			)
		);

		$this->add_control(
			'divider_heading_border_type',
			array(
				'label'     => __( 'Border Type', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'solid',
				'options'   => array(
					'solid'  => __( 'Solid', 'finest-addons' ),
					'double' => __( 'Double', 'finest-addons' ),
					'dotted' => __( 'Dotted', 'finest-addons' ),
					'dashed' => __( 'Dashed', 'finest-addons' ),
				),
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-heading-divider' => 'border-bottom-style: {{VALUE}}',
				),
				'condition' => array(
					'divider_heading_switch' => 'yes',
					'divider_heading_type'   => 'border',
				),
			)
		);

		$this->add_responsive_control(
			'divider_title_width',
			array(
				'label'      => __( 'Width', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 30,
				),
				'range'      => array(
					'px' => array(
						'min'  => 1,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 1,
						'max'  => 100,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-heading-divider' => 'width: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'divider_heading_switch' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'divider_heading_border_weight',
			array(
				'label'      => __( 'Border Weight', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 4,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-heading-divider' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'divider_heading_switch' => 'yes',
					'divider_heading_type'   => 'border',
				),
			)
		);

		$this->add_control(
			'divider_heading_border_color',
			array(
				'label'     => __( 'Border Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-heading-divider' => 'border-bottom-color: {{VALUE}}',
				),
				'condition' => array(
					'divider_heading_switch' => 'yes',
					'divider_heading_type'   => 'border',
				),
			)
		);

		$this->add_responsive_control(
			'divider_title_margin',
			array(
				'label'      => __( 'Spacing', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 20,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 30,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-heading-divider-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'divider_heading_switch' => 'yes',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Sub Heading Section
		 */
		$this->start_controls_section(
			'section_subheading_style',
			array(
				'label' => __( 'Sub Heading', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'subtitle_color',
			array(
				'label'     => __( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-subtitle' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'subtitle_typography',
				'label'    => __( 'Typography', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-promo-box-subtitle',
			)
		);

		$this->add_responsive_control(
			'subtitle_margin',
			array(
				'label'      => __( 'Spacing', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 20,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 30,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Heading Divider Section
		 */
		$this->start_controls_section(
			'section_subheading_divider_style',
			array(
				'label'     => __( 'Sub Heading Divider', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'divider_subheading_switch' => 'yes',
				),
			)
		);

		$this->add_control(
			'divider_subheading_type',
			array(
				'label'     => __( 'Divider Type', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'border',
				'options'   => array(
					'border' => __( 'Border', 'finest-addons' ),
					'image'  => __( 'Image', 'finest-addons' ),
				),
				'condition' => array(
					'divider_subheading_switch' => 'yes',
				),
			)
		);

		$this->add_control(
			'divider_subheading_image',
			array(
				'label'     => __( 'Image', 'finest-addons' ),
				'type'      => Controls_Manager::MEDIA,
				'condition' => array(
					'divider_subheading_switch' => 'yes',
					'divider_subheading_type'   => 'image',
				),
			)
		);

		$this->add_control(
			'divider_subheading_border_type',
			array(
				'label'     => __( 'Border Type', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'solid',
				'options'   => array(
					'solid'  => __( 'Solid', 'finest-addons' ),
					'double' => __( 'Double', 'finest-addons' ),
					'dotted' => __( 'Dotted', 'finest-addons' ),
					'dashed' => __( 'Dashed', 'finest-addons' ),
				),
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-subheading-divider' => 'border-bottom-style: {{VALUE}}',
				),
				'condition' => array(
					'divider_subheading_switch' => 'yes',
					'divider_subheading_type'   => 'border',
				),
			)
		);

		$this->add_responsive_control(
			'divider_subheading_width',
			array(
				'label'      => __( 'Width', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 30,
				),
				'range'      => array(
					'px' => array(
						'min'  => 1,
						'max'  => 1000,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 1,
						'max'  => 100,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-subheading-divider' => 'width: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'divider_subheading_switch' => 'yes',
				),
			)
		);

		$this->add_responsive_control(
			'divider_subheading_border_weight',
			array(
				'label'      => __( 'Border Weight', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 4,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 50,
						'step' => 1,
					),
				),
				'size_units' => array( 'px' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-subheading-divider' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
				),
				'condition'  => array(
					'divider_subheading_switch' => 'yes',
					'divider_subheading_type'   => 'border',
				),
			)
		);

		$this->add_control(
			'divider_subheading_border_color',
			array(
				'label'     => __( 'Border Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-subheading-divider' => 'border-bottom-color: {{VALUE}}',
				),
				'condition' => array(
					'divider_subheading_switch' => 'yes',
					'divider_subheading_type'   => 'border',
				),
			)
		);

		$this->add_responsive_control(
			'divider_subheading_margin',
			array(
				'label'      => __( 'Spacing', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 20,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 30,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-subheading-divider-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Description Section
		 */
		$this->start_controls_section(
			'section_promo_description_style',
			array(
				'label' => __( 'Description', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_control(
			'content_color',
			array(
				'label'     => __( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-content' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'content_typography',
				'label'    => __( 'Typography', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-promo-box-content',
			)
		);

		$this->add_responsive_control(
			'content_margin',
			array(
				'label'      => __( 'Spacing', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'default'    => array(
					'size' => 0,
				),
				'range'      => array(
					'px' => array(
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					),
					'%'  => array(
						'min'  => 0,
						'max'  => 30,
						'step' => 1,
					),
				),
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-content' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				),
			)
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Footer Section
		 */

		$this->start_controls_section(
			'section_promo_box_button_style',
			array(
				'label'     => __( 'Button', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'button_switch' => 'yes',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			array(
				'name'     => 'button_typography',
				'label'    => __( 'Typography', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-promo-box-button',
			)
		);

		$this->add_control(
			'button_size',
			array(
				'label'     => __( 'Size', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'md',
				'options'   => array(
					'xs' => __( 'Extra Small', 'finest-addons' ),
					'sm' => __( 'Small', 'finest-addons' ),
					'md' => __( 'Medium', 'finest-addons' ),
					'lg' => __( 'Large', 'finest-addons' ),
					'xl' => __( 'Extra Large', 'finest-addons' ),
				),
				'condition' => array(
					'button_text!' => '',
				),
			)
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			array(
				'label' => __( 'Normal', 'finest-addons' ),
			)
		);

		$this->add_control(
			'button_bg_color_normal',
			array(
				'label'     => __( 'Background Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-button' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_text_color_normal',
			array(
				'label'     => __( 'Text Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-button' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			array(
				'name'        => 'button_border_normal',
				'label'       => __( 'Border', 'finest-addons' ),
				'placeholder' => '1px',
				'default'     => '1px',
				'selector'    => '{{WRAPPER}} .finest-promo-box-button',
			)
		);

		$this->add_control(
			'button_border_radius',
			array(
				'label'      => __( 'Border Radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_responsive_control(
			'button_padding',
			array(
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', 'em', '%' ),
				'selectors'  => array(
					'{{WRAPPER}} .finest-promo-box-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				),
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .finest-promo-box-button',
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			array(
				'label' => __( 'Hover', 'finest-addons' ),
			)
		);

		$this->add_control(
			'button_bg_color_hover',
			array(
				'label'     => __( 'Background Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-button:hover' => 'background-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_text_color_hover',
			array(
				'label'     => __( 'Text Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-button:hover' => 'color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_border_color_hover',
			array(
				'label'     => __( 'Border Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .finest-promo-box-button:hover' => 'border-color: {{VALUE}}',
				),
			)
		);

		$this->add_control(
			'button_hover_animation',
			array(
				'label' => __( 'Animation', 'finest-addons' ),
				'type'  => Controls_Manager::HOVER_ANIMATION,
			)
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			array(
				'name'     => 'button_box_shadow_hover',
				'selector' => '{{WRAPPER}} .finest-promo-box-button:hover',
			)
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();
	}
	protected function render_promobox_icon() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'icon', 'class', array( 'finest-promo-box-icon', 'finest-icon' ) );

		if ( $settings['hover_animation_icon'] ) {
			$this->add_render_attribute( 'icon', 'class', 'elementor-animation-' . $settings['hover_animation_icon'] );
		}

		if ( ! isset( $settings['icon'] ) && ! Icons_Manager::is_migration_allowed() ) {
			// add old default
			$settings['icon'] = 'fa fa-star';
		}

		$has_icon = ! empty( $settings['icon'] );

		if ( $has_icon ) {
			$this->add_render_attribute( 'i', 'class', $settings['icon'] );
			$this->add_render_attribute( 'i', 'aria-hidden', 'true' );
		}

		$icon_attributes = $this->get_render_attribute_string( 'icon' );

		if ( ! $has_icon && ! empty( $settings['selected_icon']['value'] ) ) {
			$has_icon = true;
		}
		$migrated = isset( $settings['__fa4_migrated']['selected_icon'] );
		$is_new   = ! isset( $settings['icon'] ) && Icons_Manager::is_migration_allowed();
		?>
		 <div class="finest-promo-box-icon-wrap">
			<span <?php echo $this->get_render_attribute_string( 'icon' ); ?>>
				<?php if ( $settings['icon_type'] == 'icon' ) { ?>
					<span class="finest-promo-box-icon-inner">
					<?php
					if ( $is_new || $migrated ) {
						Icons_Manager::render_icon( $settings['selected_icon'], array( 'aria-hidden' => 'true' ) );
					} elseif ( ! empty( $settings['icon'] ) ) {
						?>
						<i <?php echo $this->get_render_attribute_string( 'i' ); ?>></i>
						<?php
					}
					?>
					 </span>
				<?php } elseif ( $settings['icon_type'] == 'image' ) { ?>
					<?php if ( ! empty( $settings['icon_image']['url'] ) ) { ?>
					<span class="finest-promo-box-icon-inner">
						<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'image', 'icon_image' ); ?>
					</span>
					<?php } ?>
				<?php } ?>
			</span>
		</div>
		<?php
	}
	protected function render() { 
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'promo-box', 'class', 'finest-promo-box' );

		$this->add_inline_editing_attributes( 'heading', 'none' );
		$this->add_render_attribute( 'heading', 'class', 'finest-promo-box-title' );

		$this->add_inline_editing_attributes( 'sub_heading', 'none' );
		$this->add_render_attribute( 'sub_heading', 'class', 'finest-promo-box-subtitle' );

		$this->add_inline_editing_attributes( 'content', 'none' );
		$this->add_render_attribute( 'content', 'class', 'finest-promo-box-content' );

		$this->add_inline_editing_attributes( 'button_text', 'none' );

		$this->add_render_attribute(
			'button_text',
			'class',
			array(
				'finest-promo-box-button',
				'elementor-button',
				'elementor-size-' . $settings['button_size'],
			)
		);
		$this->add_render_attribute( 'finest_promo_box_bg', 'class', 'finest-promo-box-bg' );
		$this->add_render_attribute( 'finest_pb_overly', 'class', 'finest-promo-box-overlay' );
		$this->add_render_attribute( 'finest_promo_box_wrap', 'class', 'finest-promo-box-wrap' );
		$this->add_render_attribute( 'finest_promo_box_inner', 'class', 'finest-promo-box-inner' );
		$this->add_render_attribute( 'finest_promo_box_inner_content', 'class', 'finest-promo-box-inner-content' );
		$this->add_render_attribute( 'finest_promo_box_heading_divider_wrap', 'class', 'finest-promo-box-heading-divider-wrap' );
		$this->add_render_attribute( 'finest_promo_box_subheading_divider', 'class', 'finest-promo-box-subheading-divider' );
		$this->add_render_attribute( 'finest_promo_box_footer', 'class', 'finest-promo-box-footer' );

		if ( ! empty( $settings['link']['url'] ) ) {

			$this->add_link_attributes( 'button_text', $settings['link'] );

		}

		if ( $settings['button_hover_animation'] ) {
			$this->add_render_attribute( 'button_text', 'class', 'elementor-animation-' . $settings['button_hover_animation'] );
		}
		?>
		<div <?php echo $this->get_render_attribute_string( 'promo-box' ); ?>>
			<div <?php echo $this->get_render_attribute_string( 'finest_promo_box_bg' ); ?>></div>
			<?php if ( $settings['overlay_switch'] == 'yes' ) { ?>
				<div <?php echo $this->get_render_attribute_string( 'finest_pb_overly' ); ?>></div>
			<?php } ?>
			<div <?php echo $this->get_render_attribute_string( 'finest_promo_box_wrap' ); ?>>
				<div <?php echo $this->get_render_attribute_string( 'finest_promo_box_inner' ); ?>>
					<div <?php echo $this->get_render_attribute_string( 'finest_promo_box_inner_content' ); ?>>
						<?php
						if ( $settings['icon_switch'] == 'yes' ) {
							if ( $settings['icon_position'] == 'above-title' ) {
								$this->render_promobox_icon();
							}
						}
						?>
						
						<?php if ( ! empty( $settings['heading'] ) ) { ?>
							<<?php echo $settings['heading_html_tag']; ?> <?php echo $this->get_render_attribute_string( 'heading' ); ?>>
								<?php echo $this->parse_text_editor( $settings['heading'] ); ?>
							</<?php echo $settings['heading_html_tag']; ?>>
						<?php } ?>

						<?php if ( $settings['divider_heading_switch'] == 'yes' ) { ?>
							<div class="finest-promo-box-heading-divider-wrap">
								<div class="finest-promo-box-heading-divider">
									<?php if ( $settings['divider_heading_type'] == 'image' && $settings['divider_title_image']['url'] != '' ) { ?>
										<img src="<?php echo esc_url( $settings['divider_title_image']['url'] ); ?>">
									<?php } ?>
								</div>
							</div>
						<?php } ?>

						<?php
						if ( $settings['icon_switch'] == 'yes' ) {
							if ( $settings['icon_position'] == 'below-title' ) {
								$this->render_promobox_icon();
							}
						}
						?>
						
						<?php if ( ! empty( $settings['sub_heading'] ) ) { ?>
							<<?php echo $settings['sub_heading_html_tag']; ?> <?php echo $this->get_render_attribute_string( 'sub_heading' ); ?>>
								<?php echo $settings['sub_heading']; ?>
							</<?php echo $settings['sub_heading_html_tag']; ?>>
						<?php } ?>

						<?php if ( $settings['divider_subheading_switch'] == 'yes' ) { ?>
							<div <?php echo $this->get_render_attribute_string( 'finest_promo_box_heading_divider_wrap' ); ?>>
								<div <?php echo $this->get_render_attribute_string( 'finest_promo_box_subheading_divider' ); ?>>
									<?php if ( $settings['divider_subheading_type'] == 'image' && $settings['divider_subheading_image']['url'] != '' ) { ?>
										<img src="<?php echo esc_url( $settings['divider_subheading_image']['url'] ); ?>">
									<?php } ?>
								</div>
							</div>
						<?php } ?>

						<?php if ( ! empty( $settings['content'] ) ) { ?>
							<div <?php echo $this->get_render_attribute_string( 'content' ); ?>>
								<?php echo $this->parse_text_editor( $settings['content'] ); ?>
							</div>
						<?php } ?>
						<?php if ( $settings['button_switch'] == 'yes' ) { ?>
							<?php if ( ! empty( $settings['button_text'] ) ) { ?>
								<div <?php echo $this->get_render_attribute_string('finest_promo_box_footer'); ?> >
									<a <?php echo $this->get_render_attribute_string( 'button_text' ); ?>>
										<?php echo esc_attr( $settings['button_text'] ); ?>
									</a>
								</div>
							<?php } ?>
						<?php } ?>
					</div><!-- .finest-promo-box-inner-content -->
				</div><!-- .finest-promo-box-inner -->
			</div><!-- .finest-promo-box-wrap -->
		</div>
			
	<?php } 
	protected function content_template() { ?>
		<#
		function icon_template() {
			var iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': true }, 'i' , 'object' ),
			 migrated = elementor.helpers.isIconMigrated( settings, 'selected_icon' );
		 #>
		 <div class="finest-promo-box-icon-wrap">
			 <span class="finest-promo-box-icon finest-icon elementor-animation-{{ settings.hover_animation_icon }}">
				 <# if ( settings.icon_type == 'icon' ) { #>
					 <span class="finest-promo-box-icon-inner">
						 <# if ( settings.icon || settings.selected_icon ) { #>
						 <# if ( iconHTML && iconHTML.rendered && ( ! settings.icon || migrated ) ) { #>
						 {{{ iconHTML.value }}}
						 <# } else { #>
							 <i class="{{ settings.icon }}" aria-hidden="true"></i>
						 <# } #>
						 <# } #>
					 </span>
				 <# } else if ( settings.icon_type == 'image' ) { #>
					 <span class="finest-promo-box-icon-inner">
						 <#
						 var image = {
							 id: settings.icon_image.id,
							 url: settings.icon_image.url,
							 size: settings.image_size,
							 dimension: settings.image_custom_dimension,
							 model: view.getEditModel()
						 };
						 var image_url = elementor.imagesManager.getImageUrl( image );
						 #>
						 <img src="{{{ image_url }}}" />
					 </span>
				 <# } #>
			 </span>
		 </div>
		 <#
	}
 #>
 <div class="finest-promo-box">
	 <div class="finest-promo-box-bg"></div>
	 <# if ( settings.overlay_switch == 'yes' ) { #>
		 <div class="finest-promo-box-overlay"></div>
	 <# } #>
	 <div class="finest-promo-box-wrap">
		 <div class="finest-promo-box-inner">
			 <div class="finest-promo-box-inner-content">
				 <# if ( settings.icon_switch == 'yes' ) { #>
					 <# if ( settings.icon_position == 'above-title' ) { #>
						 <# icon_template(); #>
					 <# } #>
				 <# }
					
				 if ( settings.heading != '' ) {
					 var heading = settings.heading;

					 view.addRenderAttribute( 'heading', 'class', 'finest-promo-box-title' );

					 view.addInlineEditingAttributes( 'heading' );

					var heading_html = '<' + settings.heading_html_tag + ' ' + view.getRenderAttributeString( 'heading' ) + '>' + heading + '</' + settings.heading_html_tag + '>';

					 print( heading_html );
				 }
					
				 if ( settings.divider_heading_switch == 'yes' ) { #>
					 <div class="finest-promo-box-heading-divider-wrap">
						 <div class="finest-promo-box-heading-divider">
							 <# if ( settings.divider_heading_type == 'image' ) { #>
								 <# if ( settings.divider_title_image.url != '' ) { #>
									 <img src="{{ settings.divider_title_image.url }}">
								 <# } #>
							 <# } #>
						 </div>
					 </div>
				 <# }
					
				 if ( settings.icon_switch == 'yes' ) {
					 if ( settings.icon_position == 'below-title' ) {
						 icon_template();
					 }
				 }
					
				 if ( settings.sub_heading != '' ) {
					 var sub_heading = settings.sub_heading;

					 view.addRenderAttribute( 'sub_heading', 'class', 'finest-promo-box-subtitle' );

					 view.addInlineEditingAttributes( 'sub_heading' );

					 var sub_heading_html = '<' + settings.sub_heading_html_tag + ' ' + view.getRenderAttributeString( 'sub_heading' ) + '>' + sub_heading + '</' + settings.sub_heading_html_tag + '>';

					 print( sub_heading_html );
				 } #>

				 <# if ( settings.divider_subheading_switch == 'yes' ) { #>
					 <div class="finest-promo-box-subheading-divider-wrap">
						 <div class="finest-promo-box-subheading-divider">
							 <# if ( settings.divider_subheading_type == 'image' ) { #>
								 <# if ( settings.divider_subheading_image.url != '' ) { #>
									 <img src="{{ settings.divider_subheading_image.url }}">
								 <# } #>
							 <# } #>
						 </div>
					 </div>
				 <# }
					
				 if ( settings.content != '' ) {
					 var content = settings.content;

					 view.addRenderAttribute( 'content', 'class', 'finest-promo-box-content' );

					 view.addInlineEditingAttributes( 'content' );

					 var content_html = '<div' + ' ' + view.getRenderAttributeString( 'content' ) + '>' + content + '</div>';

					 print( content_html );
				 }
					
				 if ( settings.button_switch == 'yes' ) { #>
					 <# if ( settings.button_text != '' ) { #>
						 <div class="finest-promo-box-footer">
							 <#
								 var button_text = settings.button_text;

								 view.addRenderAttribute( 'button_text', 'class', [ 'finest-promo-box-button', 'elementor-button', 'elementor-size-' + settings.button_size, 'elementor-animation-' + settings.button_hover_animation ] );

								 view.addInlineEditingAttributes( 'button_text' );

								 var button_html = '<a href="' + settings.link.url + '"' + ' ' + view.getRenderAttributeString( 'button_text' ) + '>' + button_text + '</a>';

								 print( button_html );
							 #>
						 </div>
					 <# } #>
				 <# } #>
			 </div><!-- .finest-promo-box-inner-content -->
		 </div><!-- .finest-promo-box-inner -->
	 </div><!-- .finest-promo-box-wrap -->
 </div>
 <?php 
	}

}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Promo_Box() );