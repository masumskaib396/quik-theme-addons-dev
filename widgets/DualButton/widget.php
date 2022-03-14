<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class Quik_Theme_Dual_Button extends Widget_Base {

	public function get_name() {
		return 'quiktheme-dual-button';
	}

	public function get_title() {
		return esc_html__( 'Dual Button', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-log-in';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

    public function get_keywords() {
        return [ 'quik-theme-addons', 'multiple', 'dual', 'anchor', 'link', 'btn', 'double' ];
    }

	protected function register_controls() {

        /*
        * Quiktheme Dual Button Content
        */
        $this->start_controls_section(
            'quik_theme_content_section',
            [
                'label' => esc_html__( 'Content', 'quiktheme-addons' )
            ]
        );

        $this->start_controls_tabs( 'quik_theme_dual_button_content_tabs' );

            $this->start_controls_tab( 'quik_theme_dual_button_primary_button_content', [ 'label' => esc_html__( 'Primary', 'quiktheme-addons' ) ] );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_text',
                    [
                        'label'       => esc_html__( 'Text', 'quiktheme-addons' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'VIEW DEMO', 'quiktheme-addons' ),
                        'dynamic' => [
                            'active' => true,
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_url',
                    [
                        'label'         => esc_html__( 'Link', 'quiktheme-addons' ),
                        'type'          => Controls_Manager::URL,
                        'label_block'   => true,
                        'placeholder'   => __( 'https://your-link.com', 'quiktheme-addons' ),
                        'show_external' => true,
                        'default'       => [
                            'url'         => '#',
                            'is_external' => true
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_icon',
                    [
                        'label'   => esc_html__( 'Icon', 'quiktheme-addons' ),
                        'type'    => Controls_Manager::ICONS,
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_icon_position',
                    [
                        'label'     => __( 'Icon Position', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::CHOOSE,
                        'toggle'    => false,
                        'options'   => [
                            'quiktheme-icon-pos-left'  => [
                                'title' => __( 'Left', 'quiktheme-addons' ),
                                'icon'  => 'eicon-angle-left'
                            ],
                            'quiktheme-icon-pos-right' => [
                                'title' => __( 'Right', 'quiktheme-addons' ),
                                'icon'  => 'eicon-angle-right'
                            ]
                        ],
                        'default'   => 'quiktheme-icon-pos-left',
                        'condition' => [
                            'quik_theme_dual_button_primary_button_icon[value]!' => ''
                        ]
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab( 'quik_theme_dual_button_connector_content', [ 'label' => esc_html__( 'Connector', 'quiktheme-addons' ) ] );

                $this->add_control(
                    'quik_theme_dual_button_connector_switch',
                    [
                        'label'        => esc_html__( 'Connector Show/Hide', 'quiktheme-addons' ),
                        'type'         => Controls_Manager::SWITCHER,
                        'label_on'     => __( 'Show', 'quiktheme-addons' ),
                        'label_off'    => __( 'Hide', 'quiktheme-addons' ),
                        'return_value' => 'yes',
                        'default'      => 'no'
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_connector_type',
                    [
                        'label'     => esc_html__( 'Type', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::SELECT,
                        'default'   => 'icon',
                        'options'   => [
                            'icon'  => __( 'Icon', 'quiktheme-addons' ),
                            'text'  => __( 'Text', 'quiktheme-addons' )
                        ],
                        'condition' => [
                            'quik_theme_dual_button_connector_switch' => 'yes'
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_connector_text',
                    [
                        'label'     => esc_html__( 'Text', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::TEXT,
                        'default'   => esc_html__( 'OR', 'quiktheme-addons' ),
                        'condition' => [
                            'quik_theme_dual_button_connector_switch' => 'yes',
                            'quik_theme_dual_button_connector_type'   => 'text'
                        ],
                        'dynamic' => [
                            'active' => true,
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_connector_icon',
                    [
                        'label'       => esc_html__( 'Icon', 'quiktheme-addons' ),
                        'type'        => Controls_Manager::ICONS,
                        'default'     => [
                            'value'   => 'fas fa-star',
                            'library' => 'fa-solid'
                        ],
                        'condition'   => [
                            'quik_theme_dual_button_connector_switch' => 'yes',
                            'quik_theme_dual_button_connector_type'   => 'icon'
                        ]
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab( 'quik_theme_dual_button_secondary_button_content', [ 'label' => esc_html__( 'Secondary', 'quiktheme-addons' ) ] );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_text',
                    [
                        'label'       => esc_html__( 'Text', 'quiktheme-addons' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'ORDER NOW', 'quiktheme-addons' ),
                        'dynamic' => [
                            'active' => true,
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_url',
                    [
                        'label'         => esc_html__( 'Link', 'quiktheme-addons' ),
                        'type'          => Controls_Manager::URL,
                        'label_block'   => true,
                        'placeholder'   => __( 'https://your-link.com', 'quiktheme-addons' ),
                        'show_external' => true,
                        'default'       => [
                            'url'         => '#',
                            'is_external' => true
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_icon',
                    [
                        'label'   => esc_html__( 'Icon', 'quiktheme-addons' ),
                        'type'    => Controls_Manager::ICONS,
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_icon_position',
                    [
                        'label'     => __( 'Icon Position', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::CHOOSE,
                        'toggle'    => false,
                        'options'   => [
                            'quiktheme-icon-pos-left'  => [
                                'title' => __( 'Left', 'quiktheme-addons' ),
                                'icon'  => 'eicon-angle-left'
                            ],
                            'quiktheme-icon-pos-right' => [
                                'title' => __( 'Right', 'quiktheme-addons' ),
                                'icon'  => 'eicon-angle-right'
                            ]
                        ],
                        'default'   => 'quiktheme-icon-pos-left',
                        'condition' => [
                            'quik_theme_dual_button_secondary_button_icon[value]!' => ''
                        ]
                    ]
                );

            $this->end_controls_tab();

	    $this->end_controls_tabs();

        $this->end_controls_section();

        /*
        * Quiktheme Dual Button Container Style
        */
        $this->start_controls_section(
            'quik_theme_container_style_section',
            [
                'label' => esc_html__( 'Container', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
			'quik_theme_dual_button_container_alignment',
			[
                'label'   => __( 'Alignment', 'quiktheme-addons' ),
                'type'    => Controls_Manager::CHOOSE,
                'toggle'  => false,
                'options' => [
					'quiktheme-dual-button-align-left'   => [
                        'title' => __( 'Left', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-left'
					],
					'quiktheme-dual-button-align-center' => [
                        'title' => __( 'Center', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-center'
					],
					'quiktheme-dual-button-align-right'  => [
                        'title' => __( 'Right', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-right'
					]
				],
                'default' => 'quiktheme-dual-button-align-center'
			]
        );

        $this->add_responsive_control(
			'quik_theme_dual_button_container_button_margin',
			[
                'label'      => __( 'Space Between Buttons', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
					'px'     => [
						'min' => -3,
						'max' => 100
					]
                ],
                'default'  => [
					'unit' => 'px',
					'size' => 10
				],
				'selectors' => [
                    '{{WRAPPER}} .quiktheme-dual-button-primary'                             => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .quiktheme-dual-button-primary .quiktheme-dual-button-connector' => 'right: calc( 0px - {{SIZE}}{{UNIT}} );',
                    '{{WRAPPER}} .quiktheme-dual-button-secondary'                           => 'margin-left: {{SIZE}}{{UNIT}};'
				]
			]
		);

        $this->add_responsive_control(
			'quik_theme_dual_button_padding',
			[
                'label'      => __( 'Padding', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'      => '12',
                    'right'    => '45',
                    'bottom'   => '12',
                    'left'     => '45',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-dual-button-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->end_controls_section();

        /*
        * Quiktheme Dual Button Primary Button Style
        */
        $this->start_controls_section(
            'quik_theme_container_primary_button_style',
            [
                'label' => esc_html__( 'Primary Button', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->start_controls_tabs( 'quik_theme_dual_button_primary_button_tabs' );

            $this->start_controls_tab( 'quik_theme_dual_button_primary_button_noemal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'     => 'quik_theme_container_primary_button_typography',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-primary span'
                    ]
                );

                $this->add_responsive_control(
                    'quik_theme_dual_button_primary_button_icon_size',
                    [
                        'label' => __('Icon Size', 'quiktheme-addons'),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => ['px', '%'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}}  .quiktheme-dual-button-primary  i' => 'font-size: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}}  .quiktheme-dual-button-primary  svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_normal_text_color',
                    [
                        'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_normal_icon_color',
                    [
                        'label'     => esc_html__( 'Icon Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary i' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .quiktheme-dual-button-primary svg' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .quiktheme-dual-button-primary svg path' => 'fill: {{VALUE}}',
                        ]
                    ]
                );


                $this->add_control(
                    'quik_theme_dual_button_primary_button_normal_bg',
                    [
                        'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#4243DC',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-1' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-2' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-3' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-4' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-5' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-6' => 'background: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'quik_theme_dual_button_primary_button_icon_margin',
                    [
                        'label'       => __( 'Icon Space', 'quiktheme-addons' ),
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
                            'size'    => 10
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary .quiktheme-icon-pos-left i'  => 'margin-right: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary .quiktheme-icon-pos-right i' => 'margin-left: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary .quiktheme-icon-pos-left svg'  => 'margin-right: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary .quiktheme-icon-pos-right svg' => 'margin-left: {{SIZE}}{{UNIT}};'
                        ],
                        'condition'   => [
                            'quik_theme_dual_button_primary_button_icon[value]!' => ''
                        ]
                    ]
                );
                $this->add_responsive_control(
                    'quik_theme_container_primary_button_padding',
                    [
                        'label'      => __( 'Padding', 'quiktheme-addons' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'default'    => [
                            'top'      => '',
                            'right'    => '',
                            'bottom'   => '',
                            'left'     => '',
                            'unit'     => 'px',
                            'isLinked' => false
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'quik_theme_container_primary_button_margin',
                    [
                        'label'      => __( 'Margin', 'quiktheme-addons' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'default'    => [
                            'top'      => '',
                            'right'    => '',
                            'bottom'   => '',
                            'left'     => '',
                            'unit'     => 'px',
                            'isLinked' => false
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'quik_theme_dual_button_primary_button_radius',
                    [
                        'label'      => __( 'Border radius', 'quiktheme-addons' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'default'    => [
                            'top'    => '3',
                            'right'  => '3',
                            'bottom' => '3',
                            'left'   => '3',
                            'unit'   => 'px'
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary,
                            {{WRAPPER}} .quiktheme-dual-button-primary.effect-1::before,
                            {{WRAPPER}} .quiktheme-dual-button-primary.effect-2::before,
                            {{WRAPPER}} .quiktheme-dual-button-primary.effect-3::before,
                            {{WRAPPER}} .quiktheme-dual-button-primary.effect-4::before,
                            {{WRAPPER}} .quiktheme-dual-button-primary.effect-6::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );


                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_primary_button_normal_border',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-primary'
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_primary_button_normal_box_shadow',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-primary'
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab( 'quik_theme_dual_button_primary_button_hover', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_animation',
                    [
                        'label'   => esc_html__( 'Hover Effect', 'quiktheme-addons' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'effect-5',
                        'options' => [
                            'effect-1' => __( 'Effect 1', 'quiktheme-addons' ),
                            'effect-2' => __( 'Effect 2', 'quiktheme-addons' ),
                            'effect-3' => __( 'Effect 3', 'quiktheme-addons' ),
                            'effect-4' => __( 'Effect 4', 'quiktheme-addons' ),
                            'effect-5' => __( 'Effect 5', 'quiktheme-addons' ),
                            'effect-6' => __( 'Effect 6', 'quiktheme-addons' )
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_hover_text_color',
                    [
                        'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary:hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                

                $this->add_control(
                    'quik_theme_dual_button_primary_button_hover_icon_color',
                    [
                        'label'     => esc_html__( 'Icon Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary:hover i' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .quiktheme-dual-button-primary:hover svg' => 'color: {{VALUE}}',
                            '{{WRAPPER}} .quiktheme-dual-button-primary:hover svg path' => 'fill: {{VALUE}}',
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_primary_button_hover_bg',
                    [
                        'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#5543dc',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-1::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-2::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-3::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-4::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-5:hover'   => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-primary.effect-6::before' => 'background: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_primary_button_hover_border',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-primary:hover'
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_primary_button_hover_box_shadow',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-primary:hover'
                    ]
                );

            $this->end_controls_tab();

	    $this->end_controls_tabs();

        $this->end_controls_section();

        /*
        * Quiktheme Dual Button Connector Style
        */
        $this->start_controls_section(
            'quik_theme_dual_button_connector_style',
            [
                'label'     => esc_html__( 'Connector', 'quiktheme-addons' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'quik_theme_dual_button_connector_switch' => 'yes'
                ]
            ]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'      => 'quik_theme_dual_button_connector_typoghrphy',
                'selector'  => '{{WRAPPER}} .quiktheme-dual-button-connector span',
                'condition' => [
                    'quik_theme_dual_button_connector_type' => 'text'
                ]
			]
        );

        $this->add_responsive_control(
			'quik_theme_dual_button_connector_icon_size',
			[
                'label'      => __( 'Icon Size', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
					'px'      => [
						'min' => 0,
						'max' => 40
					]
                ],
                'default'    => [
					'unit'   => 'px',
					'size'   => 14
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-dual-button-connector span' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition'  => [
                    'quik_theme_dual_button_connector_type'         => 'icon',
                    'quik_theme_dual_button_connector_icon[value]!' => ''
                ]
			]
		);

        $this->add_control(
            'quik_theme_dual_button_connector_background',
            [
                'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-dual-button-connector' => 'background: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'quik_theme_dual_button_connector_color',
            [
                'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-dual-button-connector span' => 'color: {{VALUE}};'
                ]
            ]
        );
        $this->add_responsive_control(
			'quik_theme_dual_button_connector_height',
			[
                'label'      => __( 'Height', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
					'px'      => [
						'min' => 0,
						'max' => 100
					]
                ],
                'default'  => [
					'unit' => 'px',
					'size' => 30
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-dual-button-connector' => 'height: {{SIZE}}{{UNIT}};'
				]
			]
        );

        $this->add_responsive_control(
			'quik_theme_dual_button_connector_width',
			[
                'label'      => __( 'Width', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range'      => [
					'px'      => [
						'min' => 0,
						'max' => 100
					]
                ],
                'default'    => [
					'unit'   => 'px',
					'size'   => 30
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-dual-button-connector' => 'width: {{SIZE}}{{UNIT}};'
				]
			]
		);
        $this->add_responsive_control(
			'quik_theme_dual_button_connector_radius',
			[
                'label'      => __( 'Border radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'default'    => [
                    'top'    => '3',
                    'right'  => '3',
                    'bottom' => '3',
                    'left'   => '3',
                    'unit'   => 'px'
                ],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-dual-button-connector' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
                'name'     => 'quik_theme_dual_button_connector_border',
                'selector' => '{{WRAPPER}} .quiktheme-dual-button-connector'
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
                'name'     => 'quik_theme_dual_button_connector_box_shadow',
                'selector' => '{{WRAPPER}} .quiktheme-dual-button-connector'
			]
		);

        $this->end_controls_section();

        /*
        * Quiktheme Dual Button secondary Button Style
        */
        $this->start_controls_section(
            'quik_theme_container_secondary_button_style',
            [
                'label' => esc_html__( 'Secondary Button', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );



        $this->start_controls_tabs( 'quik_theme_dual_button_secondary_button_tabs' );

            $this->start_controls_tab( 'quik_theme_dual_button_secondary_button_noemal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name'     => 'quik_theme_container_secondary_button_typography',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-secondary span'
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_normal_text_color',
                    [
                        'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_normal_icon_color',
                    [
                        'label'     => esc_html__( 'Icon Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} quiktheme-dual-button-secondary i' => 'color: {{VALUE}}',
                            '{{WRAPPER}} quiktheme-dual-button-secondary svg' => 'color: {{VALUE}}',
                            '{{WRAPPER}} quiktheme-dual-button-secondary svg path' => 'fill: {{VALUE}}',
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'quik_theme_dual_button_secondary_button_icon_size',
                    [
                        'label' => __('Icon Size', 'quiktheme-addons'),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => ['px', '%'],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 100,
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}}  .quiktheme-dual-button-secondary  i' => 'font-size: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}}  .quiktheme-dual-button-secondary  svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                        ],
                    ]
                ); 

                $this->add_responsive_control(
                    'quik_theme_dual_button_secondary_button_icon_margin',
                    [
                        'label'       => __( 'Icon Space', 'quiktheme-addons' ),
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
                            'size'    => 10
                        ],
                        'selectors'   => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary .quiktheme-icon-pos-left i'  => 'margin-right: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary .quiktheme-icon-pos-right i' => 'margin-left: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary .quiktheme-icon-pos-left svg'  => 'margin-right: {{SIZE}}{{UNIT}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary .quiktheme-icon-pos-right svg' => 'margin-left: {{SIZE}}{{UNIT}};'
                        ],
                        'condition'   => [
                            'quik_theme_dual_button_secondary_button_icon[value]!' => ''
                        ]
                    ]
                );
               

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_normal_bg',
                    [
                        'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#EF2469',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-1' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-2' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-3' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-4' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-5' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-6' => 'background: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_secondary_button_normal_border',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-secondary'
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_secondary_button_normal_box_shadow',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-secondary'
                    ]
                );
                $this->add_responsive_control(
                    'quik_theme_container_secondary_button_padding',
                    [
                        'label'      => __( 'Padding', 'quiktheme-addons' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'default'    => [
                            'top'      => '',
                            'right'    => '',
                            'bottom'   => '',
                            'left'     => '',
                            'unit'     => 'px',
                            'isLinked' => false
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'quik_theme_container_secondary_button_margin',
                    [
                        'label'      => __( 'Margin', 'quiktheme-addons' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'default'    => [
                            'top'      => '',
                            'right'    => '',
                            'bottom'   => '',
                            'left'     => '',
                            'unit'     => 'px',
                            'isLinked' => false
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

                $this->add_responsive_control(
                    'quik_theme_dual_button_secondary_button_radius',
                    [
                        'label'      => __( 'Border radius', 'quiktheme-addons' ),
                        'type'       => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%' ],
                        'default'    => [
                            'top'    => '3',
                            'right'  => '3',
                            'bottom' => '3',
                            'left'   => '3',
                            'unit'   => 'px'
                        ],
                        'selectors'  => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary, {{WRAPPER}} .quiktheme-dual-button-secondary.effect-1::before, {{WRAPPER}} .quiktheme-dual-button-secondary.effect-2::before, {{WRAPPER}} .quiktheme-dual-button-secondary.effect-3::before, {{WRAPPER}} .quiktheme-dual-button-secondary.effect-4::before, {{WRAPPER}} .quiktheme-dual-button-secondary.effect-6::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ]
                    ]
                );

            $this->end_controls_tab();

            $this->start_controls_tab( 'quik_theme_dual_button_secondary_button_hover', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );
                $this->add_control(
                    'quik_theme_dual_button_secondary_button_animation',
                    [
                        'label'   => esc_html__( 'Hover Effect', 'quiktheme-addons' ),
                        'type'    => Controls_Manager::SELECT,
                        'default' => 'effect-5',
                        'options' => [
                            'effect-1' => __( 'Effect 1', 'quiktheme-addons' ),
                            'effect-2' => __( 'Effect 2', 'quiktheme-addons' ),
                            'effect-3' => __( 'Effect 3', 'quiktheme-addons' ),
                            'effect-4' => __( 'Effect 4', 'quiktheme-addons' ),
                            'effect-5' => __( 'Effect 5', 'quiktheme-addons' ),
                            'effect-6' => __( 'Effect 6', 'quiktheme-addons' )
                        ]
                    ]
                );
                $this->add_control(
                    'quik_theme_dual_button_secondary_button_hover_text_color',
                    [
                        'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary:hover' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_hover_icon_color',
                    [
                        'label'     => esc_html__( 'Icon Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#ffffff',
                        'selectors' => [
                            '{{WRAPPER}} quiktheme-dual-button-secondary:hover i' => 'color: {{VALUE}}',
                            '{{WRAPPER}} quiktheme-dual-button-secondary:hover svg' => 'color: {{VALUE}}',
                            '{{WRAPPER}} quiktheme-dual-button-secondary:hover svg path' => 'fill: {{VALUE}}',
                        ]
                    ]
                );

                $this->add_control(
                    'quik_theme_dual_button_secondary_button_hover_bg',
                    [
                        'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#EF2469',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-1::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-2::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-3::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-4::before' => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-5:hover'   => 'background: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-dual-button-secondary.effect-6::before' => 'background: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_secondary_button_hover_border',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-secondary:hover'
                    ]
                );

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'quik_theme_dual_button_secondary_button_hover_box_shadow',
                        'selector' => '{{WRAPPER}} .quiktheme-dual-button-secondary:hover'
                    ]
                );

            $this->end_controls_tab();

	    $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings                = $this->get_settings_for_display();
        $secondary_btn_icon_pos = $settings['quik_theme_dual_button_secondary_button_icon_position'];
        $primary_btn_icon_pos   = $settings['quik_theme_dual_button_primary_button_icon_position'];

        $this->add_render_attribute(
            'quik_theme_dual_button',
            [
                'class' => [
                    'quiktheme-dual-button',
                    esc_attr( $settings['quik_theme_dual_button_container_alignment'] )
                ]
            ]
        );

        $this->add_render_attribute(
            'quik_theme_dual_button_primary_button_url',
            [
                'class' => [
                    'quiktheme-dual-button-primary quiktheme-dual-button-action',
                    esc_attr( $settings['quik_theme_dual_button_primary_button_animation'] )
                ]
            ]
        );

        $this->add_render_attribute(
            'quik_theme_dual_button_secondary_button_url',
            [
                'class' => [
                    'quiktheme-dual-button-secondary quiktheme-dual-button-action',
                    esc_attr( $settings['quik_theme_dual_button_secondary_button_animation'] )
                ]
            ]
        );

        if( $settings['quik_theme_dual_button_primary_button_url']['url'] ) {
            $this->add_render_attribute( 'quik_theme_dual_button_primary_button_url', 'href', esc_url( $settings['quik_theme_dual_button_primary_button_url']['url'] ) );
            if( $settings['quik_theme_dual_button_primary_button_url']['is_external'] ) {
                $this->add_render_attribute( 'quik_theme_dual_button_primary_button_url', 'target', '_blank' );
            }
            if( $settings['quik_theme_dual_button_primary_button_url']['nofollow'] ) {
                $this->add_render_attribute( 'quik_theme_dual_button_primary_button_url', 'rel', 'nofollow' );
            }
        }

        if( $settings['quik_theme_dual_button_secondary_button_url']['url'] ) {
            $this->add_render_attribute( 'quik_theme_dual_button_secondary_button_url', 'href', esc_url( $settings['quik_theme_dual_button_secondary_button_url']['url'] ) );
            if( $settings['quik_theme_dual_button_secondary_button_url']['is_external'] ) {
                $this->add_render_attribute( 'quik_theme_dual_button_secondary_button_url', 'target', '_blank' );
            }
            if( $settings['quik_theme_dual_button_secondary_button_url']['nofollow'] ) {
                $this->add_render_attribute( 'quik_theme_dual_button_secondary_button_url', 'rel', 'nofollow' );
            }
        }

        $this->add_inline_editing_attributes( 'quik_theme_dual_button_primary_button_text', 'none' );
        $this->add_inline_editing_attributes( 'quik_theme_dual_button_connector_text', 'none' );
        $this->add_inline_editing_attributes( 'quik_theme_dual_button_secondary_button_text', 'none' );
        ?>

        <div <?php echo $this->get_render_attribute_string( 'quik_theme_dual_button' ); ?>>
            <div class="quiktheme-dual-button-wrapper">
                <a <?php echo $this->get_render_attribute_string( 'quik_theme_dual_button_primary_button_url' ); ?>>
                    <span class="<?php echo esc_attr( $primary_btn_icon_pos ); ?>">
                    <?php
                        if ( 'quiktheme-icon-pos-left' === $primary_btn_icon_pos && !empty( $settings['quik_theme_dual_button_primary_button_icon']['value'] ) ) {
                            Icons_Manager::render_icon( $settings['quik_theme_dual_button_primary_button_icon'] );
                        }
                    ?>
                        <span <?php echo $this->get_render_attribute_string( 'quik_theme_dual_button_primary_button_text' ); ?>>
                            <?php echo esc_html( $settings['quik_theme_dual_button_primary_button_text'] ); ?>
                        </span>
                        <?php
                        if ( 'quiktheme-icon-pos-right' === $primary_btn_icon_pos && !empty( $settings['quik_theme_dual_button_primary_button_icon']['value'] ) ) {
                            Icons_Manager::render_icon( $settings['quik_theme_dual_button_primary_button_icon'] );
                        }
                        ?>
                    </span>

                    <?php
                    if ( 'yes' === $settings['quik_theme_dual_button_connector_switch'] ) { ?>
                        <div class="quiktheme-dual-button-connector">
                        <?php if ( 'text' === $settings['quik_theme_dual_button_connector_type'] ) { ?>
                            <span <?php echo $this->get_render_attribute_string( 'quik_theme_dual_button_connector_text' ); ?>>
                                <?php echo esc_html( $settings['quik_theme_dual_button_connector_text'] ); ?>
                            </span>
                            <?php
                            }
                            if ( 'icon' === $settings['quik_theme_dual_button_connector_type'] && !empty( $settings['quik_theme_dual_button_connector_icon']['value'] ) ) { ?>
                                <span>
                                    <?php Icons_Manager::render_icon( $settings['quik_theme_dual_button_connector_icon'] ); ?>
                                </span>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </a>

                <a <?php echo $this->get_render_attribute_string( 'quik_theme_dual_button_secondary_button_url' ); ?>>
                    <span class="<?php echo esc_attr( $secondary_btn_icon_pos ); ?>">
                    <?php
                        if ( 'quiktheme-icon-pos-left' === $secondary_btn_icon_pos && !empty( $settings['quik_theme_dual_button_secondary_button_icon']['value'] ) ) {
                            Icons_Manager::render_icon( $settings['quik_theme_dual_button_secondary_button_icon'] );
                        }
                        ?>
                        <span <?php echo $this->get_render_attribute_string( 'quik_theme_dual_button_secondary_button_text' ); ?>>
                            <?php echo esc_html( $settings['quik_theme_dual_button_secondary_button_text'] ); ?>
                        </span>
                        <?php
                        if ( 'quiktheme-icon-pos-right' === $secondary_btn_icon_pos && !empty( $settings['quik_theme_dual_button_secondary_button_icon']['value'] ) ) {
                            Icons_Manager::render_icon( $settings['quik_theme_dual_button_secondary_button_icon'] );
                        }
                        ?>
                    </span>
                </a>
            </div>
        </div>
        <?php
    }
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Dual_Button() );