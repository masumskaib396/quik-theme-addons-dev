<?php
namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;

class Finest_Content_Switcher extends Widget_Base {

    public function get_name() {
		return 'finest-content-switcher';
	}

	/**
	 * Get widget title.
	 *
	 * @since 2.24.2
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __('Content Switcher', 'finest-addons');
	}

    public function get_categories() {
		return [ 'finest-addons' ];
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
		return 'eicon-post-content';
	}

	public function get_keywords() {
		return ['content', 'switcher', 'toggle', 'finest'];
	}

	protected function register_controls() {

        /**
         * Content Switcher Content
         */
        $this->start_controls_section(
            'finest_switcher_content_section',
            [
                'label' => __( 'Content', 'finest-addons' )
            ]
        );

        $this->start_controls_tabs( 'finest_switcher_content_tabs' );

            $this->start_controls_tab( 'finest_switcher_content_primary', [ 'label' => __( 'Primary', 'finest-addons' ) ] );

                $this->add_control(
                    'finest_switcher_content_primary_heading',
                    [
                        'label'       => esc_html__( 'Heading', 'finest-addons' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Primary Heading', 'finest-addons' )
                    ]
                );

                $this->add_control(
                    'finest_switcher_primary_content_type',
                    [
                        'label'   => __( 'Content Type', 'finest-addons' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'content',
                        'options' => [
                            'content'       => __( 'Content', 'finest-addons' ),
                            'save_template' => __( 'Save Template', 'finest-addons' )
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_primary_content_save_template',
                    [
                        'label'     => __( 'Select Section', 'finest-addons' ),
                        'type'      => Controls_Manager::SELECT,
                        'options'   => $this->get_saved_template( 'section' ),
                        'default'   => '-1',
                        'condition' => [
                            'finest_switcher_primary_content_type' => 'save_template'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_primary_content',
                    [
                        'label'       => __( 'Content', 'finest-addons' ),
                        'type'        => Controls_Manager::WYSIWYG,
                        'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
						', 'finest-addons' ),
                        'placeholder' => __( 'Type your description here', 'finest-addons' ),
                        'condition'   => [
                            'finest_switcher_primary_content_type' => 'content'
                        ]
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab( 'finest_switcher_content_secondary', [ 'label' => __('Secondary', 'finest-addons') ] );

                $this->add_control(
                    'finest_switcher_content_secondary_heading',
                    [
                        'label'       => esc_html__( 'Heading', 'finest-addons' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Secondary Heading', 'finest-addons' )
                    ]
                );

                $this->add_control(
                    'finest_switcher_secondary_content_type',
                    [
                        'label'   => __( 'Content Type', 'finest-addons' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'content',
                        'options' => [
                            'content'       => __( 'Content', 'finest-addons' ),
                            'save_template' => __( 'Save Template', 'finest-addons' )
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_secondary_content_save_template',
                    [
                        'label'     => __( 'Select Section', 'finest-addons' ),
                        'type'      => Controls_Manager::SELECT,
                        'options'   => $this->get_saved_template( 'section' ),
                        'default'   => '-1',
                        'condition' => [
                            'finest_switcher_secondary_content_type' => 'save_template'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_secondary_content',
                    [
                        'label'       => __( 'Content', 'finest-addons' ),
                        'type'        => Controls_Manager::WYSIWYG,
                        'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.

						', 'finest-addons' ),
                        'placeholder' => __( 'Type your description here', 'finest-addons' ),
                        'condition'   => [
                            'finest_switcher_secondary_content_type' => 'content'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Content Switcher Style
         */
        $this->start_controls_section(
            'finest_switcher_content_heading_style',
            [
                'label' => __( 'Switcher Heading', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'finest_switcher_content_heading_allignment',
			[
                'label'   => __( 'Alignment', 'finest-addons' ),
                'type'    => Controls_Manager::CHOOSE,
                'default' => 'finest_switecher_center',
                'toggle'  => false,
                'options' => [
					'finest_switecher_left'   => [
                        'title'        => __( 'Left', 'finest-addons' ),
                        'icon'         => 'eicon-text-align-left'
					],
					'finest_switecher_center' => [
                        'title'        => __( 'Center', 'finest-addons' ),
                        'icon'         => 'eicon-text-align-center'
					],
					'finest_switecher_right'  => [
                        'title'        => __( 'Right', 'finest-addons' ),
                        'icon'         => 'eicon-text-align-right'
                    ],
					'finest_switecher_justify'  => [
                        'title'        => __( 'justify', 'finest-addons' ),
                        'icon'         => 'eicon-text-align-right'
					]
				]
			]
        );


        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'finest_switcher_content_heading_background',
				'label' => __( 'Background', 'finest-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-inner',
			]
		);

        $this->add_control(
			'finest_switcher_content_heading_padding',
			[
                'label'        => __( 'Padding', 'finest-addons' ),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => [ 'px', '%' ],
                'default'      => [
                    'top'      => '30',
                    'right'    => '0',
                    'bottom'   => '30',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
				'selectors'    => [
					'{{WRAPPER}} .finest-content-switcher-toggle-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
                'name'     => 'finest_switcher_content_heading_border',
                'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-inner'
			]
		);

        $this->add_control(
			'finest_switcher_content_heading_radius',
			[
                'label'      => __( 'Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
					'{{WRAPPER}} .finest-content-switcher-toggle-inner' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_control(
			'finest_switcher_content_heading_spacing',
			[
                'label'       => __( 'Heading Spacing', 'finest-addons' ),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => [ 'px', '%' ],
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
					'{{WRAPPER}} .finest-content-switcher-toggle-label-1' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-content-switcher-toggle-label-2' => 'margin-left: {{SIZE}}{{UNIT}};'
				]
			]
        );

        $this->add_control(
			'finest_switcher_content_heading_bottom_spacing',
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
					'size'    => 0
				],
				'selectors'   => [
					'{{WRAPPER}} .finest-content-switcher-toggle-inner' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'     => 'finest_switcher_content_heading_typography',
                'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-label-1, {{WRAPPER}} .finest-content-switcher-toggle-label-2'
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
                'name'     => 'finest_switcher_content_heading_shadow',
                'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-inner'
			]
		);

        $this->start_controls_tabs('finest_switcher_content_heading_bottom_tabs');

            $this->start_controls_tab('finest_switcher_content_heading_primary', [ 'label' => __( 'Primary Heading', 'finest-addons' ) ] );

                $this->add_control(
                    'finest_switcher_content_heading_primary_color',
                    [
                        'label'     => __( 'Text Color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .finest-content-switcher-toggle-label-1' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab('finest_switcher_content_heading_secondary', [ 'label' => __('Secondary Heading', 'finest-addons') ] );

                $this->add_control(
                    'finest_switcher_content_heading_secondary_color',
                    [
                        'label'     => __( 'Text Color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .finest-content-switcher-toggle-label-2' => 'color: {{VALUE}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Content Switcher Style
         */
        $this->start_controls_section(
            'finest_switcher_content_switch_style',
            [
                'label' => __( 'Switch Style', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'finest_switcher_content_switch',
			[
                'label'     => __( 'Switch Background', 'finest-addons' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after'
			]
        );

        $this->add_control(
			'finest_switcher_content_switch_width',
			[
                'label'       => __( 'Width', 'finest-addons' ),
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
					'size'    => 70
				],
				'selectors'   => [
					'{{WRAPPER}} .finest-content-switcher-toggle-switch-slider' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-content-switcher-toggle-switch-label' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before' => '-webkit-transform: translate( calc( {{SIZE}}{{UNIT}} - {{finest_switcher_content_switch_control_width.size}}{{finest_switcher_content_switch_control_width.unit}} ) , -50%); -ms-transform: translate(calc( {{SIZE}}{{UNIT}} - {{finest_switcher_content_switch_control_width.size}}{{finest_switcher_content_switch_control_width.unit}} ), -50%);transform: translate(calc( {{SIZE}}{{UNIT}} - {{finest_switcher_content_switch_control_width.size}}{{finest_switcher_content_switch_control_width.unit}} ), -50%);'
				]
			]
        );

        $this->add_control(
			'finest_switcher_content_switch_height',
			[
                'label'       => __( 'Height', 'finest-addons' ),
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
					'size'    => 30
				],
				'selectors'   => [
                    '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider,
                    {{WRAPPER}} .finest-content-switcher-toggle-switch,
                    {{WRAPPER}} .finest-content-switcher-toggle-switch-label' => 'height: {{SIZE}}{{UNIT}};'
				]
			]
        );

        $this->add_control(
			'finest_switcher_content_switch_radius',
			[
                'label'      => __( 'Switch Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'    => '30',
                    'right'  => '30',
                    'bottom' => '30',
                    'left'   => '30',
                    'unit'   => 'px'
                ],
                'selectors'  => [
					'{{WRAPPER}} .finest-content-switcher-toggle-switch-slider' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
                'name'     => 'finest_switcher_content_switch_shadow',
                'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider'
			]
		);

        $this->start_controls_tabs('finest_switcher_content_switch_tabs');

            $this->start_controls_tab('finest_switcher_content_switch_off', [ 'label' => __( 'Switch OFF', 'finest-addons') ] );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'finest_switcher_content_switch_off_bg_color',
                        'label' => __( 'Background', 'finest-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'fields_options'  => [
                            'background'  => [
                                'default' => 'classic'
                            ],
                            'color'       => [
                                'default' => '#4243DC'
                            ]
                        ],
                        'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider',
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_off_border_style',
                    [
                        'label' => __( 'Switch Border Style', 'finest-addons' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => [
                            'none' => __( 'None', 'finest-addons' ),
                            'solid'  => __( 'Solid', 'finest-addons' ),
                            'dashed' => __( 'Dashed', 'finest-addons' ),
                            'dotted' => __( 'Dotted', 'finest-addons' ),
                            'double' => __( 'Double', 'finest-addons' ),
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider' => 'border-style: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_off_border_width',
                    [
                        'label'       => __( 'Switch Border Width', 'finest-addons' ),
                        'type'        => Controls_Manager::SLIDER,
                        'size_units'  => [ 'px' ],
                        'range'       => [
                            'px'      => [
                                'min' => 0,
                                'max' => 10
                            ]
                        ],
                        'default'     => [
                            'unit'    => 'px',
                            'size'    => 0
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider' => 'border-width: {{SIZE}}{{UNIT}};'
                        ],
                        'condition' => [
                            'finest_switcher_content_switch_off_border_style!' => 'none'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_off_border_color',
                    [
                        'label'     => __( 'Switch Border color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'finest_switcher_content_switch_off_border_style!' => 'none'
                        ]
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab('finest_switcher_content_switch_on', [ 'label' => __( 'Switch ON', 'finest-addons') ] );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'finest_switcher_content_switch_on_bg_color',
                        'label' => __( 'Background', 'finest-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider',
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_on_border_style',
                    [
                        'label' => __( 'Switch Border Style', 'finest-addons' ),
                        'type' => Controls_Manager::SELECT,
                        'default' => 'none',
                        'options' => [
                            'none' => __( 'None', 'finest-addons' ),
                            'solid'  => __( 'Solid', 'finest-addons' ),
                            'dashed' => __( 'Dashed', 'finest-addons' ),
                            'dotted' => __( 'Dotted', 'finest-addons' ),
                            'double' => __( 'Double', 'finest-addons' ),
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider' => 'border-style: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_on_border_width',
                    [
                        'label'       => __( 'Switch Border Width', 'finest-addons' ),
                        'type'        => Controls_Manager::SLIDER,
                        'size_units'  => [ 'px' ],
                        'range'       => [
                            'px'      => [
                                'min' => 0,
                                'max' => 10
                            ]
                        ],
                        'default'     => [
                            'unit'    => 'px',
                            'size'    => 0
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider' => 'border-width: {{SIZE}}{{UNIT}};'
                        ],
                        'condition' => [
                            'finest_switcher_content_switch_on_border_style!' => 'none'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_on_border_color',
                    [
                        'label'     => __( 'Switch Border color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider' => 'border-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'finest_switcher_content_switch_on_border_style!' => 'none'
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
			'finest_switcher_content_switch_control',
			[
                'label'     => __( 'Switch Control', 'finest-addons' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
			]
        );

        $this->add_control(
			'finest_switcher_content_switch_control_spacing_with_border',
			[
                'label'       => __( 'Left & Right Spacing', 'finest-addons' ),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => [ 'px' ],
                'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 20
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 5
				],
				'selectors'   => [
                    '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before'                 => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before' => 'margin-left: calc( -{{SIZE}}{{UNIT}} - ( {{finest_switcher_content_switch_on_border_width.size}}{{finest_switcher_content_switch_on_border_width.unit}} * 2 ) ) ;',
                    '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before' => 'margin-left: calc( -{{SIZE}}{{UNIT}} - ( {{finest_switcher_content_switch_off_border_width.size}}{{finest_switcher_content_switch_off_border_width.unit}} * 2 ) ) ;'
                ],
                'condition' => [
                    'finest_switcher_content_switch_off_border_style!' => 'none',
                    'finest_switcher_content_switch_on_border_style!' => 'none',
                ]
			]
        );

        $this->add_control(
			'finest_switcher_content_switch_control_spacing_without_border',
			[
                'label'       => __( 'Left & Right Spacing', 'finest-addons' ),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => [ 'px' ],
                'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 20
					]
				],
				'default'     => [
					'unit'    => 'px',
					'size'    => 5
				],
				'selectors'   => [
                    '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before'                 => 'margin-left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before' => 'margin-left: -{{SIZE}}{{UNIT}} ;',
                ],
                'condition' => [
                    'finest_switcher_content_switch_off_border_style' => 'none',
                    'finest_switcher_content_switch_on_border_style' => 'none'
                ]
			]
        );

        $this->add_control(
			'finest_switcher_content_switch_control_radius',
			[
                'label'      => __( 'Switch Control Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'    => '30',
                    'right'  => '30',
                    'bottom' => '30',
                    'left'   => '30',
                    'unit'   => 'px'
                ],
                'selectors'  => [
					'{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->start_controls_tabs( 'finest_switcher_content_switch_control_tabs' );

            $this->start_controls_tab( 'finest_switcher_content_switch_control_off', [ 'label' => __( 'Switch Control OFF', 'finest-addons' ) ] );

                $this->add_control(
                    'finest_switcher_content_switch_control_width',
                    [
                        'label'       => __( 'Width', 'finest-addons' ),
                        'type'        => Controls_Manager::SLIDER,
                        'size_units'  => [ 'px' ],
                        'range'       => [
                            'px'      => [
                                'min' => 0,
                                'max' => 50
                            ]
                        ],
                        'default'     => [
                            'unit'    => 'px',
                            'size'    => 27
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before' => 'width: {{SIZE}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_control_height',
                    [
                        'label'       => __( 'Height', 'finest-addons' ),
                        'type'        => Controls_Manager::SLIDER,
                        'size_units'  => [ 'px' ],
                        'range'       => [
                            'px'      => [
                                'min' => 0,
                                'max' => 50
                            ]
                        ],
                        'default'     => [
                            'unit'    => 'px',
                            'size'    => 27
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before' => 'height: {{SIZE}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'finest_switcher_content_switch_off_switch_control_color',
                        'label' => __( 'Background', 'finest-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'fields_options'  => [
                            'background'  => [
                                'default' => 'classic'
                            ],
                            'color'       => [
                                'default' => '#ffffff',
                            ]
                        ],
                        'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before',
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'     => 'finest_switcher_content_switch_off_control_border',
                        'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before'
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'finest_switcher_content_switch_on_control_shadow',
                        'selector' => '{{WRAPPER}} .finest-content-switcher-toggle-switch-slider:before'
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab( 'finest_switcher_content_switch_control_on', [ 'label' => __( 'Switch Control ON', 'finest-addons' ) ] );

                $this->add_control(
                    'finest_switcher_content_switch_on_control_width',
                    [
                        'label'       => __( 'Width', 'finest-addons' ),
                        'type'        => Controls_Manager::SLIDER,
                        'size_units'  => [ 'px' ],
                        'range'       => [
                            'px'      => [
                                'min' => 0,
                                'max' => 50
                            ]
                        ],
                        'default'     => [
                            'unit'    => 'px',
                            'size'    => 27
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before' => 'width: {{SIZE}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_control(
                    'finest_switcher_content_switch_on_control_height',
                    [
                        'label'       => __( 'Height', 'finest-addons' ),
                        'type'        => Controls_Manager::SLIDER,
                        'size_units'  => [ 'px' ],
                        'range'       => [
                            'px'      => [
                                'min' => 0,
                                'max' => 50
                            ]
                        ],
                        'default'     => [
                            'unit'    => 'px',
                            'size'    => 27
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before' => 'height: {{SIZE}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'finest_switcher_content_switch_on_switch_control_color',
                        'label' => __( 'Background', 'finest-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'fields_options'  => [
                            'background'  => [
                                'default' => 'classic'
                            ],
                            'color'       => [
                                'default' => '#ffffff',
                            ]
                        ],
                        'selector' => '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before',
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'     => 'finest_switcher_content_switch_on_control_border',
                        'selector' => '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before'
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'finest_switcher_content_switch_off_control_shadow',
                        'selector' => '{{WRAPPER}} input:checked + .finest-content-switcher-toggle-switch-slider:before'
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Content Switcher Content
         */
        $this->start_controls_section(
            'finest_switcher_content_main_contant_style',
            [
                'label' => __( 'Switcher Content', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
                'name'     => 'finest_switcher_main_contant_background',
                'label'    => __( 'Background', 'finest-addons' ),
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .finest-content-switcher-content-wrap'
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'     => 'finest_switcher_main_contant_typography',
                'selector' => '{{WRAPPER}} .finest-content-switcher-content-wrap'
			]
		);

        $this->add_control(
            'finest_switcher_main_contant_text_color',
            [
                'label'     => __( 'Text Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-content-switcher-content-wrap' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
			'finest_switcher_main_contant_padding',
			[
                'label'        => __( 'Padding', 'finest-addons' ),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => [ 'px', '%' ],
                'default'      => [
                    'top'      => '20',
                    'right'    => '20',
                    'bottom'   => '20',
                    'left'     => '20',
                    'unit'     => 'px'
                ],
				'selectors'    => [
					'{{WRAPPER}} .finest-content-switcher-content-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
                'name'     => 'finest_switcher_main_contant_border',
                'selector' => '{{WRAPPER}} .finest-content-switcher-content-wrap'
			]
		);

        $this->add_control(
			'finest_switcher_main_contant_radius',
			[
                'label'      => __( 'Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
					'{{WRAPPER}} .finest-content-switcher-content-wrap' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
                'name'     => 'finest_switcher_main_contant_shadow',
                'selector' => '{{WRAPPER}} .finest-content-switcher-content-wrap'
			]
		);

        $this->end_controls_section();
    }

    /**
	 *  Get Saved Widgets
	 *
	 *  @param string $type Type.
	 *  @since 0.0.1
	 *  @return string
	 */
	public function get_saved_template( $type = 'page' ) {

		$saved_widgets = $this->get_post_template( $type );
		$options[-1]   = __( 'Select', 'finest-addons' );
		if ( count( $saved_widgets ) ) :
			foreach ( $saved_widgets as $saved_row ) :
				$options[ $saved_row['id'] ] = $saved_row['name'];
			endforeach;
		else :
			$options['no_template'] = __( 'No section template is added.', 'finest-addons' );
		endif;
		return $options;
	}

	/**
	 *  Get Templates based on category
	 *
	 *  @param string $type Type.
	 *  @since 0.0.1
	 *  @return string
	 */
	public function get_post_template( $type = 'page' ) {
		$posts = get_posts(
			array(
				'post_type'        => 'elementor_library',
				'orderby'          => 'title',
				'order'            => 'ASC',
				'posts_per_page'   => '-1',
				'tax_query'        => array(
					array(
						'taxonomy' => 'elementor_library_type',
						'field'    => 'slug',
						'terms'    => $type
					)
				)
			)
		);

		$templates = array();

		foreach ( $posts as $post ) :
			$templates[] = array(
				'id'   => $post->ID,
				'name' => $post->post_title
			);
		endforeach;

		return $templates;
	}

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="finest-content-switcher-wrapper">
            <div class="finest-content-switcher-toggle <?php echo esc_attr( $settings['finest_switcher_content_heading_allignment'] ); ?>">
                <div class="finest-content-switcher-toggle-inner">
                    <div class="finest-content-switcher-toggle-label-1">
                        <?php echo esc_html( $settings['finest_switcher_content_primary_heading'] ); ?>
                    </div>
                    <div class="finest-content-switcher-toggle-switch">
                        <label class="finest-content-switcher-toggle-switch-label">
                            <input class="input" type="checkbox">
                            <span class="finest-content-switcher-toggle-switch-slider"></span>
                        </label>
                    </div>
                    <div class="finest-content-switcher-toggle-label-2">
                        <?php echo esc_html( $settings['finest_switcher_content_secondary_heading'] ); ?>
                    </div>
                </div>
            </div>
            <div class="finest-content-switcher-content-wrap">
                <div class="finest-content-switcher-primary-wrap">
                    <?php if( 'content' === $settings['finest_switcher_primary_content_type'] ) : ?>
                        <?php echo wp_kses_post( $settings['finest_switcher_content_primary_content'] ); ?>
                    <?php endif; ?>
                    <?php if( 'save_template' === $settings['finest_switcher_primary_content_type'] ) : ?>
                        <?php echo Plugin::$instance->frontend->get_builder_content_for_display( wp_kses_post( $settings['finest_switcher_primary_content_save_template'] ) ); ?>
                    <?php endif; ?>
                </div>
                <div class="finest-content-switcher-secondary-wrap">
                    <?php if( 'content' === $settings['finest_switcher_secondary_content_type'] ) : ?>
                        <?php echo wp_kses_post( $settings['finest_switcher_content_secondary_content'] ); ?>
                    <?php endif; ?>
                    <?php if( 'save_template' === $settings['finest_switcher_secondary_content_type'] ) : ?>
                        <?php echo Plugin::$instance->frontend->get_builder_content_for_display( wp_kses_post( $settings['finest_switcher_secondary_content_save_template'] ) ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    }

}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Content_Switcher() );