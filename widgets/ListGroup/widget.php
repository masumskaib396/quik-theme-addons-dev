<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Control_Media;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Widget_Base;

class Quik_Theme_List_group extends Widget_Base {

	public function get_name() {
		return 'quiktheme-list-group';
	}

	public function get_title() {
		return esc_html__( 'List Group', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-list';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
		return [ 'quik-theme-addons', 'information', 'group', 'list', 'icon' ];
	}

	protected function register_controls() {

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'quik_theme_section_list_content',
			[
				'label' => esc_html__( 'Content', 'quiktheme-addons' )
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
            'quik_theme_list_icon_type',
            [
                'label' => __( 'Media Type', 'quiktheme-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'icon',
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'quiktheme-addons' ),
						'icon' => 'eicon-star',
					],
					'number' => [
						'title' => __( 'Number', 'quiktheme-addons' ),
						'icon' => 'eicon-number-field',
					],
					'image' => [
						'title' => __( 'Image', 'quiktheme-addons' ),
						'icon' => 'eicon-image',
					],
				],
				'toggle' => false,
                'style_transfer' => true,
            ]
        );

		$repeater->add_control(
			'quik_theme_list_icon',
			[
				'label'       => __( 'Icon', 'quiktheme-addons' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'separator'   =>'after',
				'default'     => [
					'value'   => 'far fa-check-circle',
					'library' => 'fa-regular'
				],
				'condition' =>[
					'quik_theme_list_icon_type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'quik_theme_list_icon_number',
			[
				'label'   => esc_html__( 'Number', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'quiktheme-addons' ),
				'separator'   =>'after',
				'condition' =>[
					'quik_theme_list_icon_type' => 'number'
				]
			]
		);

		$repeater->add_control(
			'quik_theme_list_icon_number_image',
			[
				'label' => __( 'Choose Image', 'quiktheme-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator'   =>'after',
				'dynamic' => [
					'active' => true,
				],
				'condition' =>[
					'quik_theme_list_icon_type' => 'image'
				]
			]
		);

        $repeater->add_control(
			'quik_theme_list_text',
			[
				'label'   => esc_html__( 'Text', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'List Text', 'quiktheme-addons' ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$repeater->add_control(
			'quik_theme_list_link',
			[
				'label' => __( 'List URL', 'quiktheme-addons' ),
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
			'quik_theme_list_group',
			[
				'label' => __( 'List Items', 'elementor' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' => [
					[
						'quik_theme_list_text' => __( 'List Item #1', 'elementor' ),
						'quik_theme_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'quik_theme_list_text' => __( 'List Item #2', 'elementor' ),
						'quik_theme_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'quik_theme_list_text' => __( 'List Item #3', 'elementor' ),
						'quik_theme_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ elementor.helpers.renderIcon( this, quik_theme_list_icon, {}, "i", "panel" ) }}}{{{ quik_theme_list_text }}}'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'quik_theme_section_list_style',
			[
				'label' => esc_html__( 'Container', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'quik_theme_section_list_layout',
			[
				'label' => __( 'Layout', 'quiktheme-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout_1',
				'options' => [
					'layout_1' => __( 'Layout 1', 'quiktheme-addons' ),
					'layout_2' => __( 'Layout 2', 'quiktheme-addons' ),
					'layout_3' => __( 'Layout 3', 'quiktheme-addons' ),
				],
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_alignment',
			[
				'label'       => esc_html__( 'Alignment', 'quiktheme-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'quiktheme-list-group-left'   => [
						'title' => esc_html__( 'Left', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'quiktheme-list-group-center' => [
						'title' => esc_html__( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'quiktheme-list-group-right'  => [
						'title' => esc_html__( 'Right', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors_dictionary' => [
					'quiktheme-list-group-left' => 'justify-content: flex-start; text-align: left;',
					'quiktheme-list-group-center' => 'justify-content: center; text-align: center;',
					'quiktheme-list-group-right' => 'justify-content: flex-end; text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper' => '{{VALUE}};',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item' => '{{VALUE}};',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item a' => '{{VALUE}};',
				],
				'default'     => 'quiktheme-list-group-left',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'quik_theme_section_list_group_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .quiktheme-list-group',
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_group_padding',
			[
				'label'      => __( 'Padding', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '0',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => true
                ],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-list-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'quik_theme_section_list_group_border',
				'selector'  => '{{WRAPPER}} .quiktheme-list-group'
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_group_radius',
			[
				'label'        => __( 'Border Radius', 'quiktheme-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .quiktheme-list-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'quik_theme_section_list_group_shadow',
				'selector' => '{{WRAPPER}} .quiktheme-list-group'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'quik_theme_section_list_item_style',
			[
				'label' => esc_html__( 'List Item', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_item_padding',
			[
				'label'        => __( 'Item Padding', 'quiktheme-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'quik_theme_section_list_item_separator',
            [
				'label'        => __( 'Item Separator', 'quiktheme-addons' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'quiktheme-addons' ),
				'label_off'    => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'quik_theme_section_list_layout!' => 'layout_3'
				]
			]
        );

		$this->add_responsive_control(
			'quik_theme_section_list_item_separator_height',
			[
				'label' => __( 'Separator Height', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 10,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 1,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_1 .quiktheme-list-group-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_2 .quiktheme-list-group-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'quik_theme_section_list_item_separator' => 'yes',
					'quik_theme_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_control(
			'quik_theme_section_list_item_separator_color',
			[
				'label' => __( 'Separator Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_1 .quiktheme-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_2 .quiktheme-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
				],
				'condition' => [
					'quik_theme_section_list_item_separator' => 'yes',
					'quik_theme_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_item_spacing',
			[
				'label' => __( 'Item Spacing', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_3 .quiktheme-list-group-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'quik_theme_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'quik_theme_list_item_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_3 .quiktheme-list-group-item',
				'condition' => [
					'quik_theme_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'quik_theme_list_item_border',
				'selector'  => '{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_3 .quiktheme-list-group-item',
				'fields_options'  => [
                    'border' 	  => [
                        'default' => 'solid'
                    ],
                    'width'  	  => [
                        'default' 	 => [
                            'top'    => '1',
                            'right'  => '1',
                            'bottom' => '1',
                            'left'   => '1'
                        ]
                    ],
                    'color' 	  => [
                        'default' => '#e5e5e5',
                    ]
                ],
				'condition' => [
					'quik_theme_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_item_radius',
			[
				'label'        => __( 'Border Radius', 'quiktheme-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '10',
					'right'    => '10',
					'bottom'   => '10',
					'left'     => '10',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_3 .quiktheme-list-group-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'quik_theme_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'quik_theme_list_item_shadow',
				'selector' => '{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_3 .quiktheme-list-group-item',
				'condition' => [
					'quik_theme_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Icon Style
		*/
		$this->start_controls_section(
			'quik_theme_section_list_icon_style',
			[
				'label' => esc_html__( 'Icon', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_icon_position',
			[
				'label'       => esc_html__( 'Icon Position', 'quiktheme-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'quiktheme-icon-left'   => [
						'title' => esc_html__( 'Left', 'quiktheme-addons' ),
						'icon'  => 'eicon-h-align-left'
					],
					'quiktheme-icon-center' => [
						'title' => esc_html__( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'quiktheme-icon-right'  => [
						'title' => esc_html__( 'Right', 'quiktheme-addons' ),
						'icon'  => 'eicon-h-align-right'
					]
				],
				'default'     => 'quiktheme-icon-left'
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_icon_alignment',
			[
				'label'       => esc_html__( 'Icon Vertical Alignment', 'quiktheme-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'quiktheme-icon-align-left'   => [
						'title' => esc_html__( 'Top', 'quiktheme-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'quiktheme-icon-align-center' => [
						'title' => esc_html__( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'quiktheme-icon-align-right'  => [
						'title' => esc_html__( 'Bottom', 'quiktheme-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'quiktheme-icon-align-left',
				'selectors_dictionary' => [
					'quiktheme-icon-align-left' => 'align-items: flex-start;',
					'quiktheme-icon-align-center' => 'align-items: center;',
					'quiktheme-icon-align-right' => 'align-items: flex-end;',
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item' => '{{VALUE}};',
				],
				'condition' => [
					'quik_theme_list_icon_position!' => 'quiktheme-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_icon_top_alignment',
			[
				'label'       => esc_html__( 'Icon Alignment', 'quiktheme-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'quiktheme-icon-top-align-left'   => [
						'title' => esc_html__( 'Left', 'quiktheme-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'quiktheme-icon-top-align-center' => [
						'title' => esc_html__( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'quiktheme-icon-top-align-right'  => [
						'title' => esc_html__( 'Right', 'quiktheme-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'quiktheme-icon-left',
				'selectors_dictionary' => [
					'quiktheme-icon-top-align-left' => 'text-align: left; margin-right: auto;',
					'quiktheme-icon-top-align-center' => 'text-align: center; margin-left: auto; margin-right: auto;',
					'quiktheme-icon-top-align-right' => 'text-align: right; margin-left: auto;',
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon' => '{{VALUE}};',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon .quiktheme-list-group-icon-image' => '{{VALUE}};',
				],
				'condition' => [
					'quik_theme_list_icon_position' => 'quiktheme-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_item_icon_spacing',
			[
				'label' => __( 'Icon Right Spacing', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'quik_theme_list_icon_position' => 'quiktheme-icon-left'
				]
			]
		);
		$this->add_responsive_control(
			'quik_theme_section_list_item_icon_left_spacing',
			[
				'label' => __( 'Icon Left Spacing', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'quik_theme_list_icon_position' => 'quiktheme-icon-right'
				]
			]
		);
		$this->add_responsive_control(
			'quik_theme_section_list_item_icon_bottom_spacing',
			[
				'label' => __( 'Icon Bottom Spacing', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 10,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'quik_theme_list_icon_position' => 'quiktheme-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_item_icon_size',
			[
				'label' => __( 'Icon Size', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 16,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon svg' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon .quiktheme-list-group-icon-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'quik_theme_section_list_item_icon_color',
			[
				'label' => __( 'Icon Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_item_image_radius',
			[
				'label'        => __( 'Image Radius', 'quiktheme-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon .quiktheme-list-group-icon-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'quik_theme_list_item_icon_box_enable',
			[
				'label' => __( 'Enable Icon Box', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'quiktheme-addons' ),
				'label_off' => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_item_icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon.yes' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_1 .quiktheme-list-group-item .quiktheme-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_2 .quiktheme-list-group-item .quiktheme-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper.layout_3 .quiktheme-list-group-item .quiktheme-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
				],
				'condition' => [
					'quik_theme_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_item_icon_box_height',
			[
				'label' => __( 'Icon Box Height', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 200,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 40,
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon.yes' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'quik_theme_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'quik_theme_list_item_icon_box_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon.yes',
				'condition' => [
					'quik_theme_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'quik_theme_list_item_icon_box_border',
				'selector'  => '{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon.yes',
				'condition' => [
					'quik_theme_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_list_item_icon_box_radius',
			[
				'label'        => __( 'Border Radius', 'quiktheme-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '0',
					'left'     => '0',
					'unit'     => 'px'
				],
				'selectors'    => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon.yes' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'quik_theme_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'quik_theme_list_item_icon_box_shadow',
				'selector' => '{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-icon.yes',
				'condition' => [
					'quik_theme_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Text
		*/
		$this->start_controls_section(
			'quik_theme_section_list_text_style',
			[
				'label' => esc_html__( 'Text', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'quik_theme_section_list_text_alignment',
			[
				'label'       => esc_html__( 'Text Alignment', 'quiktheme-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'quiktheme-text-align-left'   => [
						'title' => esc_html__( 'Left', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'quiktheme-text-align-center' => [
						'title' => esc_html__( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'quiktheme-text-align-right'  => [
						'title' => esc_html__( 'Right', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-left'
					]
				],
				'default'     => 'quiktheme-text-align-left',
				'selectors_dictionary' => [
					'quiktheme-text-align-left' => 'text-align: left;',
					'quiktheme-text-align-center' => 'text-align: center;',
					'quiktheme-text-align-right' => 'text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-text' => '{{VALUE}};',
				],
				'condition' => [
					'quik_theme_list_icon_position' => 'quiktheme-icon-center'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'quik_theme_section_list_text_typography',
				'label' => __( 'Typography', 'quiktheme-addons' ),
				'selector' => '{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-text',
			]
		);

		$this->add_control(
			'quik_theme_section_list_text_color',
			[
				'label' => __( 'Title Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-list-group .quiktheme-list-group-wrapper .quiktheme-list-group-item .quiktheme-list-group-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="quiktheme-list-group">
			<ul class="quiktheme-list-group-wrapper <?php echo $settings['quik_theme_section_list_layout']; ?>">
				<?php foreach( $settings['quik_theme_list_group'] as $list ) : ?>
				<?php
					$target = $list['quik_theme_list_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $list['quik_theme_list_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
					<li class="quiktheme-list-group-item <?php echo $settings['quik_theme_list_icon_position']?>">
						<?php if ( !empty( $list['quik_theme_list_link']['url'] ) ) { ?>
						<a href="<?php echo $list['quik_theme_list_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?> >
						<?php } ?>
							<span class="quiktheme-list-group-icon <?php echo $settings['quik_theme_list_item_icon_box_enable']; ?>">
								<?php if ( $list['quik_theme_list_icon_type'] === 'icon' && !empty($list['quik_theme_list_icon']) ){ ?>
									<?php Icons_Manager::render_icon( $list['quik_theme_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								<?php } ?>
								<?php if ( $list['quik_theme_list_icon_type'] === 'number' && !empty($list['quik_theme_list_icon_type']) ){ ?>
									<div class="quiktheme-list-group-icon-number">
										<?php echo $list['quik_theme_list_icon_number']; ?>
									</div>
								<?php } ?>
								<?php if ( $list['quik_theme_list_icon_type'] === 'image' && !empty($list['quik_theme_list_icon_type']) ){ ?>
									<div class="quiktheme-list-group-icon-image">
										<img src="<?php echo $list['quik_theme_list_icon_number_image']['url'] ?>" alt="<?php echo $list['quik_theme_list_text']; ?>">
									</div>
								<?php } ?>
							</span>
							<?php if ( !empty( $list['quik_theme_list_text'] ) ) { ?>
								<span class="quiktheme-list-group-text">
									<?php echo $list['quik_theme_list_text']; ?>
								</span>
							<?php } ?>
						<?php if ( !empty( $list['quik_theme_list_link']['url'] ) ) { ?>
						</a>
						<?php } ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_List_group() );