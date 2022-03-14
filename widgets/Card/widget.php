<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use \Elementor\Icons_Manager;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Quik_Theme_Card extends Widget_Base {

	public function get_name() {
		return 'quiktheme-card';
	}

	public function get_title() {
		return esc_html__( 'Quiktheme Card', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-airplay';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
		return [ 'card', 'blurb', 'infobox', 'content', 'block', 'box' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'_section_image',
			[
				'label' => esc_html__( 'Image & Badge', 'quiktheme-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'quik_theme_card_image',
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
				'name'      => 'thumbnail', 
				'default'   => 'full',
				'condition' => [
					'quik_theme_card_image[url]!' => ''
				]
			]
		);

		$this->add_responsive_control(
			'image_position',
			[
				'label' => __( 'Image Position', 'quiktheme-addons' ),
				'description' => __( 'You can adjust the image width and height from <mark>Style</mark> tab to get your expected design.', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'top' => [
						'title' => __( 'Top', 'quiktheme-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'right' => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'toggle' => false,
				'desktop_default' => 'top',
				'tablet_default' => 'top',
				'mobile_default' => 'top',
				'prefix_class' => 'quiktheme-card-%s-',
				'style_transfer' => true,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap' => '{{VALUE}};',
				],
				'selectors_dictionary' => [
					'left' => '-webkit-box-orient: horizontal; -webkit-box-direction: normal; -ms-flex-direction: row; flex-direction: row;',
					'top' => '-webkit-box-orient: vertical; -webkit-box-direction: normal; -ms-flex-direction: column; flex-direction: column;',
					'right' => '-webkit-box-orient: horizontal; -webkit-box-direction: reverse; -ms-flex-direction: row-reverse; flex-direction: row-reverse;'
				]
			]
		);

		$this->add_control(
			'quik_theme_card_badge_switcher',
			[
				'label' => __( 'Enable Badge', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'quiktheme-addons' ),
				'label_off' => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'quik_theme_badge_text',
			[
				'label'       => esc_html__( 'Badge Text', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'separator'   => 'before',
				'default'     => esc_html__( 'Card Badge', 'quiktheme-addons' ),
				'condition'   => [
					'quik_theme_card_badge_switcher' => 'yes'
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_title',
			[
				'label' => __( 'Title & Description', 'quiktheme-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'quiktheme-addons' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Card Title', 'quiktheme-addons' ),
				'placeholder' => __( 'Card Title', 'quiktheme-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title HTML Tag', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'h1'  => [
						'title' => __( 'H1', 'quiktheme-addons' ),
						'icon' => 'eicon-editor-h1'
					],
					'h2'  => [
						'title' => __( 'H2', 'quiktheme-addons' ),
						'icon' => 'eicon-editor-h2'
					],
					'h3'  => [
						'title' => __( 'H3', 'quiktheme-addons' ),
						'icon' => 'eicon-editor-h3'
					],
					'h4'  => [
						'title' => __( 'H4', 'quiktheme-addons' ),
						'icon' => 'eicon-editor-h4'
					],
					'h5'  => [
						'title' => __( 'H5', 'quiktheme-addons' ),
						'icon' => 'eicon-editor-h5'
					],
					'h6'  => [
						'title' => __( 'H6', 'quiktheme-addons' ),
						'icon' => 'eicon-editor-h6'
					]
				],
				'default' => 'h2',
				'toggle' => false,
			]
		);
		$this->add_control(
			'quik_theme_card_description',
			[
				'label'   => esc_html__( 'Description', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Basic description about the Card', 'quiktheme-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => __( 'Justify', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-body' => 'text-align: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_button',
			[
				'label' => __( 'Button', 'quiktheme-addons' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'quik_theme_card_action_text',
			[
				'label'       => esc_html__( 'Text', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Details', 'quiktheme-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'quik_theme_card_action_link',
			[
				'label'       => __( 'URL', 'quiktheme-addons' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'quiktheme-addons' ),
				'label_block' => true,
				'default'     => [
					'url'         => '#',
					'is_external' => true
				]
			]
		);

		$this->add_control(
			'quik_theme_card_action_link_icon',
			[
				'label'       => __( 'Icon', 'quiktheme-addons' ),
				'type'        => Controls_Manager::ICONS,
				'condition'   => [
					'quik_theme_card_action_text!' => ''
				]
			]
		);

		$this->add_control(
			'quik_theme_card_action_link_icon_position',
			[
				'label'     => __( 'Icon Position', 'quiktheme-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'icon_pos_left'  => [
						'title'      => __( 'Left', 'quiktheme-addons' ),
						'icon'       => 'eicon-angle-left'
					],
					'icon_pos_right' => [
						'title'      => __( 'Right', 'quiktheme-addons' ),
						'icon'       => 'eicon-angle-right'
					]
				],
				'default'   => 'icon_pos_right',
				'toggle'    => false,
				'condition' => [
                    'quik_theme_card_action_link_icon[value]!' => '',
                    'quik_theme_card_action_text!' => ''
                ]
			]
		);
		$this->add_control(
			'button_icon_spacing',
			[
				'label' => __( 'Icon Spacing', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a span.icon_pos_left i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-card-button a span.icon_pos_right i' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'button_fullwidth',
			[
				'label' => __( 'Full Width?', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => false,
				'return_value' => 'yes',
				'style_transfer' => true,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a' => 'display: -webkit-box; display: -ms-flexbox; display: flex;',
				]
			]
		);

		$this->add_control(
			'button_align',
			[
				'label' => __( 'Alignment', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-right',
					],
					'stretch' => [
						'title' => __( 'Stretch', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'toggle' => false,
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a' => '{{VALUE}}',
				],
				'selectors_dictionary' => [
					'left' => '-webkit-box-pack: start; -ms-flex-pack: start; justify-content: flex-start;',
					'center' => '-webkit-box-pack: center; -ms-flex-pack: center; justify-content: center;',
					'right' => '-webkit-box-pack: end; -ms-flex-pack: end; justify-content: flex-end;',
					'stretch' => '-webkit-box-pack: justify; -ms-flex-pack: justify; justify-content: space-between;',
				],
				'condition' => [
					'button_fullwidth' => 'yes',
				],
			]
		);
		$this->end_controls_section();
		/**
		 * Register widget style controls
		 */
		$this->quik_theme_image_style_controls();
		$this->quik_theme_badge_style_controls();
		$this->quik_theme_title_desc_style_controls();
		$this->quik_theme_button_style_controls();

	}

	protected function quik_theme_image_style_controls() {

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => __( 'Image', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_width',
			[
				'label' => __( 'Width', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%'
				],
				'size_units' => [ '%','px' ],
				'range' => [
					'%' => [
						'min' => 1,
						'max' => 100,
					],
					'px' => [
						'min' => 50,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-thumb img ' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label' => __( 'Height', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => 'px'
				],
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 250,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-thumb' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'image_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-thumb img ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .quiktheme-card-thumb img ',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => __( 'Border Radius', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		
		$this->start_controls_tabs(
			'tabs_image_effects',
			[
				'separator' => 'before'
			]
		);

		$this->start_controls_tab(
			'tab_image_effects_normal',
			[
				'label' => __( 'Normal', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'image_opacity',
			[
				'label' => __( 'Opacity', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-thumb img ' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_css_filters',
				'selector' => '{{WRAPPER}} .quiktheme-card-thumb img ',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab( 'hover',
			[
				'label' => __( 'Hover', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'image_opacity_hover',
			[
				'label' => __( 'Opacity', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-thumb:hover img' => 'opacity: {{SIZE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'image_css_filters_hover',
				'selector' => '{{WRAPPER}} .quiktheme-card-thumb:hover img',
			]
		);

		$this->add_control(
			'image_background_hover_transition',
			[
				'label' => __( 'Transition Duration', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-thumb img' => 'transition-duration: {{SIZE}}s;',
				],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' => __( 'Hover Animation', 'quiktheme-addons' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
				'label_block' => true,
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_control(
			'quik_theme_card_image_animation_heading',
			[
				'label'     => __( 'Animation', 'quiktheme-addons' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		$this->add_control(
			'quik_theme_card_image_zoom_animation',
			[
				'label'        => __( 'Zoom Animation', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'quiktheme-addons' ),
				'label_off'    => __( 'OFF', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->end_controls_section();
	}
	protected function quik_theme_badge_style_controls() {

		$this->start_controls_section(
			'section_style_badge',
			[
				'label' => __( 'Badge', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'badge_position',
			[
				'label' => __( 'Position', 'quiktheme-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'top-left'      => __( 'Top Left', 'quiktheme-addons' ),
					'top-center'    => __( 'Top Center', 'quiktheme-addons' ),
					'top-right'     => __( 'Top Right', 'quiktheme-addons' ),
					'middle-left'   => __( 'Middle Left', 'quiktheme-addons' ),
					'middle-center' => __( 'Middle Center', 'quiktheme-addons' ),
					'middle-right'  => __( 'Middle Right', 'quiktheme-addons' ),
					'bottom-left'   => __( 'Bottom Left', 'quiktheme-addons' ),
					'bottom-center' => __( 'Bottom Center', 'quiktheme-addons' ),
					'bottom-right'  => __( 'Bottom Right', 'quiktheme-addons' ),
				],
				'default' => 'top-right',
			]
		);
		$this->add_control(
			'badge_offset_toggle',
			[
				'label' => __( 'Offset', 'quiktheme-addons' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'None', 'quiktheme-addons' ),
				'label_on' => __( 'Custom', 'quiktheme-addons' ),
				'return_value' => 'yes',
			]
		);

		$this->start_popover();

		$this->add_responsive_control(
			'badge_offset_x',
			[
				'label' => __( 'Offset Left', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition' => [
					'badge_offset_toggle' => 'yes'
				],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge' => 'left: {{SIZE}}{{UNIT}}; right:auto;',
				],
			]
		);

		$this->add_responsive_control(
			'badge_offset_y',
			[
				'label' => __( 'Offset Top', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'condition' => [
					'badge_offset_toggle' => 'yes'
				],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => '',
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge' => 'top: {{SIZE}}{{UNIT}};bottom:auto;',
				],
			]
		);
		$this->end_popover();
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'badge_typography',
				'label' => __( 'Typography', 'quiktheme-addons' ),
				'exclude' => [
					'line_height'
				],
				'default' => [
					'font_size' => ['']
				],
				'selector' => '{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge',
				'scheme' => Typography::TYPOGRAPHY_3,
			]
		);
		$this->start_controls_tabs(
			'badge_style_tabs'
		);
		$this->start_controls_tab(
			'badge_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'quiktheme-addons' ),
			]
		);
		$this->add_control(
			'badge_color',
			[
				'label' => __( 'Text Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'badge_bg_color',
			[
				'label' => __( 'Background Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'badge_border',
				'selector' => '{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge',
			]
		);

		$this->add_responsive_control(
			'badge_border_radius',
			[
				'label' => __( 'Border Radius', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->start_controls_tab(
			'budge_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'plugin-name' ),
			]
		);
		$this->add_control(
			'badge_hover_color',
			[
				'label' => __( 'Text Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'badge_hover_bg_color',
			[
				'label' => __( 'Background Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge:hover' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'badge_hover_border',
				'selector' => '{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge:hover',
			]
		);

		$this->add_responsive_control(
			'badge_hover_border_radius',
			[
				'label' => __( 'Border Radius', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->add_responsive_control(
			'badge_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'badge_box_shadow',
				'exclude' => [
					'box_shadow_position',
				],
				'selector' => '{{WRAPPER}} .quiktheme-card-wrap .quiktheme-badge',
			]
		);

		$this->end_controls_section();
	}
	protected function quik_theme_title_desc_style_controls() {

		$this->start_controls_section(
			'section_style_content',
			[
				'label' => __( 'Title & Description', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'content_area',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Contetn Area', 'quiktheme-addons' ),
				'separator' => 'before'
			]
		);

		$this->add_control(
			'content_bg_color',
			[
				'type' => Controls_Manager::COLOR,
				'label' => esc_html__( 'Background Color', 'plugin-name' ),
				'default' => '#fff',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap' => 'background-color: {{VALUE}}',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_box_shadow',
				'selector' => '{{WRAPPER}} .quiktheme-card-wrap',
			]
		);
		$this->add_control(
			'content_radius',
			[
				'label' => __( 'Border Radius', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => __( 'Content Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_title',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Title', 'quiktheme-addons' ),
				'separator' => 'before'
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Typography', 'quiktheme-addons' ),
				'selector' => '{{WRAPPER}} .quiktheme-card-title .quiktheme-card-title',
				'scheme' => Typography::TYPOGRAPHY_2,
			]
		);
		$this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-title .quiktheme-card-title' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'title_hover_color',
			[
				'label' => __( 'Title Hover Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-title .quiktheme-card-title:hover' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_responsive_control(
			'title_spacing',
			[
				'label' => __( 'Bottom Spacing', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-title .quiktheme-card-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_description',
			[
				'type' => Controls_Manager::HEADING,
				'label' => __( 'Description', 'quiktheme-addons' ),
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => __( 'Typography', 'quiktheme-addons' ),
				'selector' => '{{WRAPPER}} .quiktheme-card-description>p',
				'scheme' => Typography::TYPOGRAPHY_3,
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Text Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-description>p' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'over_description_color',
			[
				'label' => __( 'Text Hover Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-description>p:hover' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_responsive_control(
			'description_spacing',
			[
				'label' => __( 'Bottom Spacing', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-description>p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}
	protected function quik_theme_button_style_controls() {

		$this->start_controls_section(
			'section_style_button',
			[
				'label' => __( 'Button', 'quiktheme-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'button_typography',
				'selector' => '{{WRAPPER}} .quiktheme-card-button a',
				'scheme' => Typography::TYPOGRAPHY_4,
			]
		);

		$this->add_control(
			'hr',
			[
				'type' => Controls_Manager::DIVIDER,
				'style' => 'thick',
			]
		);

		$this->start_controls_tabs( 'tabs_button' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => __( 'Normal', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'button_color',
			[
				'label' => __( 'Text Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label' => __( 'Background Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'normal_button_border',
				'selector' => '{{WRAPPER}} .quiktheme-card-button a',
			]
		);
		$this->add_control(
			'normal_button_border_radius',
			[
				'label' => __( 'Border Radius', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => __( 'Hover', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'button_hover_color',
			[
				'label' => __( 'Hover Text Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a:hover, {{WRAPPER}} .quiktheme-card-button a:focus' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_hover_bg_color',
			[
				'label' => __( 'Hover Background Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a:hover, {{WRAPPER}} .quiktheme-card-button a:focus' => 'background-color: {{VALUE}};',
				],
			]
		);
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_button_border',
				'selector' => '{{WRAPPER}} .quiktheme-card-button a:hover',
			]
		);
		$this->add_control(
			'hover_button_border_radius',
			[
				'label' => __( 'Hover Border Radius', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_responsive_control(
			'button_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-card-button a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .quiktheme-card-button a',
			]
		);
		
		$this->end_controls_section();
	}
	protected function render() { 
		$settings = $this->get_settings_for_display();
		$this->add_render_attribute( 'quik_theme_card_wrap', 'class',[ 'quiktheme-card-wrap',esc_attr( $settings['quik_theme_card_image_zoom_animation'] )]);
		$this->add_inline_editing_attributes( 'quik_theme_badge_text', 'none' );
		$this->add_render_attribute('quik_theme_badge_text','class',[ 'quiktheme-badge',sprintf( 'quiktheme-badge-%s', esc_attr( $settings['badge_position'] ) ) ] );
		$this->add_render_attribute('quik_theme_card_body','class',[ 'quiktheme-card-body' ]);
		$this->add_render_attribute('quik_theme_card_title','class',[ 'quiktheme-card-title' ]);
		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_render_attribute( 'title', 'class', 'quiktheme-card-title' );
		$this->add_render_attribute( 'quik_theme_card_description', 'class', 'quiktheme-card-description' );
		$this->add_inline_editing_attributes( 'quik_theme_card_description', 'basic' );
		$this->add_render_attribute( 'quik_theme_card_button', 'class', 'quiktheme-card-button' );
		?>
		<div <?php echo $this->get_render_attribute_string( 'quik_theme_card_wrap' ); ?> >
		<?php if ( $settings['quik_theme_card_image']['url'] || $settings['quik_theme_card_image']['id'] ) : ?>
			<div class="quiktheme-card-thumb">
				<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'quik_theme_card_image' ); 
				if( $settings['quik_theme_card_badge_switcher'] === 'yes' ) : ?>
				<div <?php echo $this->get_render_attribute_string( 'quik_theme_badge_text' ); ?>>
					<?php echo wp_kses_post( $settings['quik_theme_badge_text'] ); ?>
				</div>
				<?php endif; ?>
			</div>
				<div <?php echo $this->get_render_attribute_string( 'quik_theme_card_body' ); ?> >
					<div <?php echo $this->get_render_attribute_string( 'quik_theme_card_title' ); ?> >
					<?php
						if ( $settings['title' ] ) :
							printf( '<%1$s %2$s>%3$s</%1$s>', $settings['title_tag'],
								$this->get_render_attribute_string( 'title' ),wp_kses_post( $settings['title' ] ) );
						endif;
						?>
					</div>
					<?php if ( $settings['quik_theme_card_description'] ) : ?>
						<div <?php echo $this->get_render_attribute_string( 'quik_theme_card_description' ); ?>>
							<p><?php echo wp_kses_post( $settings['quik_theme_card_description'] ); ?></p>
						</div>
					<?php endif; ?>
					
					<?php 
					if ( !empty( $settings['quik_theme_card_action_text'] ) ) : ?>
					<div <?php echo $this->get_render_attribute_string( 'quik_theme_card_button' ); ?> >
					<a href="<?php echo esc_url($settings['quik_theme_card_action_link']['url']); ?>" >
						<?php if( 'icon_pos_left' === $settings['quik_theme_card_action_link_icon_position'] &&  !empty( $settings['quik_theme_card_action_link_icon']['value'] ) ) { ?>
							<span class="<?php echo esc_attr( $settings['quik_theme_card_action_link_icon_position'] ); ?>">
								<?php Icons_Manager::render_icon( $settings['quik_theme_card_action_link_icon'] ); ?>
							</span>
						<?php	
						}
						?>
						<?php echo esc_html( $settings['quik_theme_card_action_text'] ); ?>
						<?php
						if( 'icon_pos_right' === $settings['quik_theme_card_action_link_icon_position'] &&  !empty( $settings['quik_theme_card_action_link_icon']['value'] ) ) { ?>
							<span class="<?php echo esc_attr( $settings['quik_theme_card_action_link_icon_position'] ); ?>">
								<?php Icons_Manager::render_icon( $settings['quik_theme_card_action_link_icon'] ); ?>
							</span>
						<?php } ?>
	            	</a>
					</div>
				<?php endif; ?>
					</div>
				</div>
		<?php endif; ?>
        </div>
	<?php } 

}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Card() );