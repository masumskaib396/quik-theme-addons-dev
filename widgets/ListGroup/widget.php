<?php
namespace Finest_Addons\Widgets;

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

class Finest_List_group extends Widget_Base {

	public function get_name() {
		return 'finest-list-group';
	}

	public function get_title() {
		return esc_html__( 'List Group', 'finest-addons' );
	}

	public function get_icon() {
		return 'eicon-bullet-list';
	}

	public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return [ 'finest', 'information', 'group', 'list', 'icon' ];
	}

	protected function register_controls() {

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'finest_section_list_content',
			[
				'label' => esc_html__( 'Content', 'finest-addons' )
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
            'finest_list_icon_type',
            [
                'label' => __( 'Media Type', 'finest-addons' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'icon',
				'options' => [
					'icon' => [
						'title' => __( 'Icon', 'finest-addons' ),
						'icon' => 'eicon-star',
					],
					'number' => [
						'title' => __( 'Number', 'finest-addons' ),
						'icon' => 'eicon-number-field',
					],
					'image' => [
						'title' => __( 'Image', 'finest-addons' ),
						'icon' => 'eicon-image',
					],
				],
				'toggle' => false,
                'style_transfer' => true,
            ]
        );

		$repeater->add_control(
			'finest_list_icon',
			[
				'label'       => __( 'Icon', 'finest-addons' ),
				'type'        => Controls_Manager::ICONS,
				'label_block' => true,
				'separator'   =>'after',
				'default'     => [
					'value'   => 'far fa-check-circle',
					'library' => 'fa-regular'
				],
				'condition' =>[
					'finest_list_icon_type' => 'icon'
				]
			]
		);

		$repeater->add_control(
			'finest_list_icon_number',
			[
				'label'   => esc_html__( 'Number', 'finest-addons' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( '1', 'finest-addons' ),
				'separator'   =>'after',
				'condition' =>[
					'finest_list_icon_type' => 'number'
				]
			]
		);

		$repeater->add_control(
			'finest_list_icon_number_image',
			[
				'label' => __( 'Choose Image', 'finest-addons' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'separator'   =>'after',
				'dynamic' => [
					'active' => true,
				],
				'condition' =>[
					'finest_list_icon_type' => 'image'
				]
			]
		);

        $repeater->add_control(
			'finest_list_text',
			[
				'label'   => esc_html__( 'Text', 'finest-addons' ),
				'type'    => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'List Text', 'finest-addons' ),
				'dynamic' => [ 'active' => true ]
			]
		);

		$repeater->add_control(
			'finest_list_link',
			[
				'label' => __( 'List URL', 'finest-addons' ),
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
			'finest_list_group',
			[
				'label' => __( 'List Items', 'elementor' ),
				'type' 		=> Controls_Manager::REPEATER,
				'fields' 	=> $repeater->get_controls(),
				'default' => [
					[
						'finest_list_text' => __( 'List Item #1', 'elementor' ),
						'finest_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'finest_list_text' => __( 'List Item #2', 'elementor' ),
						'finest_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
					[
						'finest_list_text' => __( 'List Item #3', 'elementor' ),
						'finest_list_icon' => [
							'value' => 'fas fa-check',
							'library' => 'fa-solid',
						],
					],
				],
				'title_field' => '{{{ elementor.helpers.renderIcon( this, finest_list_icon, {}, "i", "panel" ) }}}{{{ finest_list_text }}}'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'finest_section_list_style',
			[
				'label' => esc_html__( 'Container', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'finest_section_list_layout',
			[
				'label' => __( 'Layout', 'finest-addons' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'layout_1',
				'options' => [
					'layout_1' => __( 'Layout 1', 'finest-addons' ),
					'layout_2' => __( 'Layout 2', 'finest-addons' ),
					'layout_3' => __( 'Layout 3', 'finest-addons' ),
				],
			]
		);

		$this->add_responsive_control(
			'finest_section_list_alignment',
			[
				'label'       => esc_html__( 'Alignment', 'finest-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'finest-list-group-left'   => [
						'title' => esc_html__( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'finest-list-group-center' => [
						'title' => esc_html__( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'finest-list-group-right'  => [
						'title' => esc_html__( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors_dictionary' => [
					'finest-list-group-left' => 'justify-content: flex-start; text-align: left;',
					'finest-list-group-center' => 'justify-content: center; text-align: center;',
					'finest-list-group-right' => 'justify-content: flex-end; text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper' => '{{VALUE}};',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item' => '{{VALUE}};',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item a' => '{{VALUE}};',
				],
				'default'     => 'finest-list-group-left',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'finest_section_list_group_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .finest-list-group',
			]
		);

		$this->add_responsive_control(
			'finest_section_list_group_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'finest_section_list_group_border',
				'selector'  => '{{WRAPPER}} .finest-list-group'
			]
		);

		$this->add_responsive_control(
			'finest_section_list_group_radius',
			[
				'label'        => __( 'Border Radius', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'finest_section_list_group_shadow',
				'selector' => '{{WRAPPER}} .finest-list-group'
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Content
		*/
		$this->start_controls_section(
			'finest_section_list_item_style',
			[
				'label' => esc_html__( 'List Item', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'finest_section_list_item_padding',
			[
				'label'        => __( 'Item Padding', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'finest_section_list_item_separator',
            [
				'label'        => __( 'Item Separator', 'finest-addons' ),
				'type'         =>  Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'finest-addons' ),
				'label_off'    => __( 'Hide', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'no',
				'condition'    => [
					'finest_section_list_layout!' => 'layout_3'
				]
			]
        );

		$this->add_responsive_control(
			'finest_section_list_item_separator_height',
			[
				'label' => __( 'Separator Height', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_1 .finest-list-group-item:not(:last-child):after' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_2 .finest-list-group-item:not(:last-child):after' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'finest_section_list_item_separator' => 'yes',
					'finest_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_control(
			'finest_section_list_item_separator_color',
			[
				'label' => __( 'Separator Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#e5e5e5',
				'selectors' => [
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_1 .finest-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_2 .finest-list-group-item:not(:last-child):after' => 'background: {{VALUE}}',
				],
				'condition' => [
					'finest_section_list_item_separator' => 'yes',
					'finest_section_list_layout!' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'finest_list_item_spacing',
			[
				'label' => __( 'Item Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_3 .finest-list-group-item:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'finest_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'finest_list_item_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_3 .finest-list-group-item',
				'condition' => [
					'finest_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'finest_list_item_border',
				'selector'  => '{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_3 .finest-list-group-item',
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
					'finest_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_responsive_control(
			'finest_list_item_radius',
			[
				'label'        => __( 'Border Radius', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_3 .finest-list-group-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'finest_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'finest_list_item_shadow',
				'selector' => '{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_3 .finest-list-group-item',
				'condition' => [
					'finest_section_list_layout' => 'layout_3'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Icon Style
		*/
		$this->start_controls_section(
			'finest_section_list_icon_style',
			[
				'label' => esc_html__( 'Icon', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'finest_list_icon_position',
			[
				'label'       => esc_html__( 'Icon Position', 'finest-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'finest-icon-left'   => [
						'title' => esc_html__( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-h-align-left'
					],
					'finest-icon-center' => [
						'title' => esc_html__( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'finest-icon-right'  => [
						'title' => esc_html__( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-h-align-right'
					]
				],
				'default'     => 'finest-icon-left'
			]
		);

		$this->add_responsive_control(
			'finest_list_icon_alignment',
			[
				'label'       => esc_html__( 'Icon Vertical Alignment', 'finest-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'finest-icon-align-left'   => [
						'title' => esc_html__( 'Top', 'finest-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'finest-icon-align-center' => [
						'title' => esc_html__( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'finest-icon-align-right'  => [
						'title' => esc_html__( 'Bottom', 'finest-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'finest-icon-align-left',
				'selectors_dictionary' => [
					'finest-icon-align-left' => 'align-items: flex-start;',
					'finest-icon-align-center' => 'align-items: center;',
					'finest-icon-align-right' => 'align-items: flex-end;',
				],
				'selectors' => [
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item' => '{{VALUE}};',
				],
				'condition' => [
					'finest_list_icon_position!' => 'finest-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'finest_list_icon_top_alignment',
			[
				'label'       => esc_html__( 'Icon Alignment', 'finest-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'finest-icon-top-align-left'   => [
						'title' => esc_html__( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-v-align-top'
					],
					'finest-icon-top-align-center' => [
						'title' => esc_html__( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-v-align-middle'
					],
					'finest-icon-top-align-right'  => [
						'title' => esc_html__( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-v-align-bottom'
					]
				],
				'default'     => 'finest-icon-left',
				'selectors_dictionary' => [
					'finest-icon-top-align-left' => 'text-align: left; margin-right: auto;',
					'finest-icon-top-align-center' => 'text-align: center; margin-left: auto; margin-right: auto;',
					'finest-icon-top-align-right' => 'text-align: right; margin-left: auto;',
				],
				'selectors' => [
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon' => '{{VALUE}};',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon .finest-list-group-icon-image' => '{{VALUE}};',
				],
				'condition' => [
					'finest_list_icon_position' => 'finest-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'finest_section_list_item_icon_spacing',
			[
				'label' => __( 'Icon Right Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-text' => 'padding-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'finest_list_icon_position' => 'finest-icon-left'
				]
			]
		);
		$this->add_responsive_control(
			'finest_section_list_item_icon_left_spacing',
			[
				'label' => __( 'Icon Left Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'finest_list_icon_position' => 'finest-icon-right'
				]
			]
		);
		$this->add_responsive_control(
			'finest_section_list_item_icon_bottom_spacing',
			[
				'label' => __( 'Icon Bottom Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'finest_list_icon_position' => 'finest-icon-center'
				]
			]
		);

		$this->add_responsive_control(
			'finest_section_list_item_icon_size',
			[
				'label' => __( 'Icon Size', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon .finest-list-group-icon-image' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'finest_section_list_item_icon_color',
			[
				'label' => __( 'Icon Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_responsive_control(
			'finest_section_list_item_image_radius',
			[
				'label'        => __( 'Image Radius', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon .finest-list-group-icon-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'finest_list_item_icon_box_enable',
			[
				'label' => __( 'Enable Icon Box', 'finest-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'finest-addons' ),
				'label_off' => __( 'Hide', 'finest-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'finest_list_item_icon_box_width',
			[
				'label' => __( 'Icon Box Width', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon.yes' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_1 .finest-list-group-item .finest-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_2 .finest-list-group-item .finest-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper.layout_3 .finest-list-group-item .finest-list-group-text' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
				],
				'condition' => [
					'finest_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'finest_list_item_icon_box_height',
			[
				'label' => __( 'Icon Box Height', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon.yes' => 'height: {{SIZE}}{{UNIT}};',
				],
				'condition' => [
					'finest_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'            => 'finest_list_item_icon_box_background',
				'types'           => [ 'classic', 'gradient' ],
				'selector'        => '{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon.yes',
				'condition' => [
					'finest_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'finest_list_item_icon_box_border',
				'selector'  => '{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon.yes',
				'condition' => [
					'finest_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'finest_list_item_icon_box_radius',
			[
				'label'        => __( 'Border Radius', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon.yes' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => [
					'finest_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'finest_list_item_icon_box_shadow',
				'selector' => '{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-icon.yes',
				'condition' => [
					'finest_list_item_icon_box_enable' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/*
		* Icon List Text
		*/
		$this->start_controls_section(
			'finest_section_list_text_style',
			[
				'label' => esc_html__( 'Text', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_responsive_control(
			'finest_section_list_text_alignment',
			[
				'label'       => esc_html__( 'Text Alignment', 'finest-addons' ),
				'type'        => Controls_Manager::CHOOSE,
				'toggle'      => false,
				'label_block' => false,
				'options'     => [
					'finest-text-align-left'   => [
						'title' => esc_html__( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'finest-text-align-center' => [
						'title' => esc_html__( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'finest-text-align-right'  => [
						'title' => esc_html__( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-text-align-left'
					]
				],
				'default'     => 'finest-text-align-left',
				'selectors_dictionary' => [
					'finest-text-align-left' => 'text-align: left;',
					'finest-text-align-center' => 'text-align: center;',
					'finest-text-align-right' => 'text-align: right;',
				],
				'selectors' => [
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-text' => '{{VALUE}};',
				],
				'condition' => [
					'finest_list_icon_position' => 'finest-icon-center'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'finest_section_list_text_typography',
				'label' => __( 'Typography', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-text',
			]
		);

		$this->add_control(
			'finest_section_list_text_color',
			[
				'label' => __( 'Title Color', 'finest-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-list-group .finest-list-group-wrapper .finest-list-group-item .finest-list-group-text' => 'color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="finest-list-group">
			<ul class="finest-list-group-wrapper <?php echo $settings['finest_section_list_layout']; ?>">
				<?php foreach( $settings['finest_list_group'] as $list ) : ?>
				<?php
					$target = $list['finest_list_link']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $list['finest_list_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
					<li class="finest-list-group-item <?php echo $settings['finest_list_icon_position']?>">
						<?php if ( !empty( $list['finest_list_link']['url'] ) ) { ?>
						<a href="<?php echo $list['finest_list_link']['url']; ?>" <?php echo $target; ?> <?php echo $nofollow; ?> >
						<?php } ?>
							<span class="finest-list-group-icon <?php echo $settings['finest_list_item_icon_box_enable']; ?>">
								<?php if ( $list['finest_list_icon_type'] === 'icon' && !empty($list['finest_list_icon']) ){ ?>
									<?php Icons_Manager::render_icon( $list['finest_list_icon'], [ 'aria-hidden' => 'true' ] ); ?>
								<?php } ?>
								<?php if ( $list['finest_list_icon_type'] === 'number' && !empty($list['finest_list_icon_type']) ){ ?>
									<div class="finest-list-group-icon-number">
										<?php echo $list['finest_list_icon_number']; ?>
									</div>
								<?php } ?>
								<?php if ( $list['finest_list_icon_type'] === 'image' && !empty($list['finest_list_icon_type']) ){ ?>
									<div class="finest-list-group-icon-image">
										<img src="<?php echo $list['finest_list_icon_number_image']['url'] ?>" alt="<?php echo $list['finest_list_text']; ?>">
									</div>
								<?php } ?>
							</span>
							<?php if ( !empty( $list['finest_list_text'] ) ) { ?>
								<span class="finest-list-group-text">
									<?php echo $list['finest_list_text']; ?>
								</span>
							<?php } ?>
						<?php if ( !empty( $list['finest_list_link']['url'] ) ) { ?>
						</a>
						<?php } ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_List_group() );