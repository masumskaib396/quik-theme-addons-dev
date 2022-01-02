<?php
namespace Finest\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Widget_Base;

class Finest_Call_To_Action extends Widget_Base {

	public function get_name() {
		return 'finest-call-to-action';
	}

	public function get_title() {
		return esc_html__( 'Call To Action', 'finest-addons' );
	}

	public function get_icon() {
		return 'feather icon-archive';
	}

   	public function get_categories() {
		return [ 'finest-addons' ];
    }

    public function get_keywords() {
        return [ 'finest', 'cta', 'button' ];
    }

	protected function register_controls() {

  		$this->start_controls_section(
			'finest_section_side_a_content',
			[
				'label' => __( 'Content', 'finest-addons' )
			]
		);

        $this->add_control(
            'finest_cta_skin_type',
            [
                'label'     => esc_html__( 'Skin Type', 'finest-addons' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'vertical',
                'options'   => [
                    'horizontal'  => esc_html__( 'Horizontal',   'finest-addons' ),
                    'vertical'    => esc_html__( 'Vertical', 'finest-addons' )
                ]
            ]
        );

		$this->add_control(
			'finest_cta_heading',
			[
				'label'       => __( 'Heading', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Designers & Developer with Great UX', 'finest-addons' ),
                'label_block' => true,
				'placeholder' => __( 'Your Heading', 'finest-addons' ),
                'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_cta_description',
			[
				'label'       => __( 'Description', 'finest-addons' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => __( 'Exclusive addons is collaborative project of some professional developer, designer & tested user experience of using it on some of user’s websites.', 'finest-addons' ),
				'placeholder' => __( 'Your Description', 'finest-addons' )
			]
		);

        $this->add_control(
            'finest_cta_icon',
            [
                'label'   => esc_html__( 'Icon', 'finest-addons' ),
                'type'    => Controls_Manager::ICONS
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'finest_cta_primary_button_section',
            [
                'label' => esc_html__( 'Primary Button', 'finest-addons' )
            ]
        );

        $this->add_control(
            'finest_cta_primary_btn',
            [
                'label'       => esc_html__( 'Button Text', 'finest-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Get Now', 'finest-addons' ),
                'dynamic' => [
					'active' => true,
				]
            ]
        );

        $this->add_control(
            'finest_cta_primary_btn_link',
            [
                'label'       => esc_html__( 'Button Link', 'finest-addons' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url'         => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'finest_cta_secondary_button_section',
            [
                'label'     => esc_html__( 'Secondary Button', 'finest-addons' ),
                'condition' => [
                    'finest_cta_skin_type' => 'vertical'
                ]
            ]
        );

        $this->add_control(
            'finest_cta_secondary_btn',
            [
                'label'       => esc_html__( 'Button Text', 'finest-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Try It Now', 'finest-addons' ),
                'dynamic' => [
					'active' => true,
				]
            ]
        );

        $this->add_control(
            'finest_cta_secondary_btn_link',
            [
                'label'       => esc_html__( 'Button Link', 'finest-addons' ),
                'type'        => Controls_Manager::URL,
                'label_block' => true,
                'default'     => [
                    'url'         => '#',
                    'is_external' => ''
                ],
                'show_external' => true
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'finest_cta_container_style_settings',
			[
                'label' => __( 'Container', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
			]
        );

        $this->add_responsive_control(
            'finest_cta_vertical_alignment',
            [
                'label'          => esc_html__( 'Alignment', 'finest-addons' ),
                'type'           => Controls_Manager::CHOOSE,
                'toggle'         => false,
                'options'        => [
                    'left'       => [
                        'title'  => __( 'Left', 'finest-addons' ),
                        'icon'   => 'eicon-h-align-left'
                    ],
                    'center'     => [
                        'title'  => __( 'Center', 'finest-addons' ),
                        'icon'   => 'eicon-h-align-center'
                    ],
                    'right'      => [
                        'title'  => __( 'Right', 'finest-addons' ),
                        'icon'   => 'eicon-h-align-right'
                    ]
                ],
                'selectors_dictionary' => [
					'left' => 'text-align: left; justify-content: flex-start;',
					'center' => 'text-align: center; justify-content: center;',
					'right' => 'text-align: right; justify-content: flex-end;',
				],
                'selectors'      => [
                    '{{WRAPPER}} .finest-call-to-action.skin-vertical' => '{{VALUE}};',
                    '{{WRAPPER}} .finest-call-to-action-buttons li' => '{{VALUE}};'
                ],
                'desktop_default' => 'center',
				'tablet_default' => 'center',
				'mobile_default' => 'center',
                'condition'      => [
                    'finest_cta_skin_type' => 'vertical'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_cta_container_padding',
            [
                'label'        => esc_html__( 'Padding', 'finest-addons' ),
                'type'         => Controls_Manager::DIMENSIONS,
                'size_units'   => [ 'px', 'em', '%' ],
                'default'      => [
                    'top'      => 60,
                    'right'    => 50,
                    'bottom'   => 60,
                    'left'     => 50,
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'    => [
                    '{{WRAPPER}} .finest-call-to-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'finest_cta_container_bg_color',
                'types'           => [ 'classic', 'gradient' ],
                'selector'        => '{{WRAPPER}} .finest-call-to-action',
                'fields_options'  => [
                    'background'  => [
                        'default' => 'classic'
                    ],
                    'color'       => [
                        'default' => '#f5f7fa'
                    ]
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'finest_cta_container_border',
                'selector' => '{{WRAPPER}} .finest-call-to-action'
            ]
        );

        $this->add_responsive_control(
            'finest_cta_container_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-call-to-action' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'finest_cta_container_box_shadow',
                'selector' => '{{WRAPPER}} .finest-call-to-action'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'finest_cta_content_style_settings',
            [
                'label' => __( 'Content', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'finest_cta_style_heading',
            [
                'label' => esc_html__( 'Heading', 'finest-addons' ),
                'type'  => Controls_Manager::HEADING
            ]
        );

        $this->add_control(
            'finest_cta_heading_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => esc_html__( 'Color', 'finest-addons' ),
                'default'   => '#132c47',
                'selectors' => [
                    '{{WRAPPER}} h1.finest-call-to-action-title' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'           => 'finest_cta_heading_typography',
                'selector'       => '{{WRAPPER}} h1.finest-call-to-action-title',
                'fields_options' => [
                    'font_size'   => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 40
                        ]
                    ],
                    'font_weight' => [
                        'default' => '600'
                    ]
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_cta_heading_margin',
            [
                'label'      => esc_html__( 'Margin', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} h1.finest-call-to-action-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'finest_cta_style_description',
            [
                'label'     => esc_html__( 'Description', 'finest-addons' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'finest_cta_description_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => esc_html__( 'Color', 'finest-addons' ),
                'default'   => '#8a8d91',
                'selectors' => [
                    '{{WRAPPER}} .finest-call-to-action-header .finest-call-to-action-subtitle' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'finest_cta_description_typography',
                'selector' => '{{WRAPPER}} .finest-call-to-action-header .finest-call-to-action-subtitle'
            ]
        );

        $this->add_responsive_control(
            'finest_cta_description_margin',
            [
                'label'      => esc_html__( 'Margin', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'      => [
                    'top'      => '0',
                    'right'    => '0',
                    'bottom'   => '20',
                    'left'     => '0',
                    'isLinked' => false
                ],
                'selectors'  => [
                        '{{WRAPPER}} .finest-call-to-action-header .finest-call-to-action-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'finest_cta_style_icon',
            [
                'label'     => esc_html__( 'Icon', 'finest-addons' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'finest_cta_icon[value]!' => ''
                ]
            ]
        );

        $this->add_control(
            'finest_call_to_action_icon_color',
            [
                'label'     => esc_html__( 'Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-call-to-action-icon i' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'finest_cta_icon[value]!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_call_to_action_icon_size',
            [
                'label'        => esc_html__( 'Size', 'finest-addons' ),
                'type'         => Controls_Manager::SLIDER,
                'range'        => [
                    'px'       => [
                        'min'  => 10,
                        'max'  => 150,
                        'step' => 2
                    ]
                ],
                'default'      => [
                    'unit'     => 'px',
                    'size'     => 40
                ],
                'selectors'    => [
                    '{{WRAPPER}} .finest-call-to-action-icon i' => 'font-size: {{SIZE}}px;'
                ],
                'condition' => [
                    'finest_cta_icon[value]!' => ''
                ]
            ]
        );

        $this->add_control(
            'finest_call_to_action_icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px' ],
                'default'    => [
                    'top'    => 0,
                    'right'  => 0,
                    'bottom' => 10,
                    'left'   => 0,
                    'unit'   => 'px'
                ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-call-to-action-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'  => [
                    'finest_cta_icon[value]!' => ''
                ]
            ]
        );

		$this->end_controls_section();

        // primary button
        $this->start_controls_section(
            'finest_section_cta_primary_btn_style_settings',
            [
                'label' => esc_html__( 'Primary Button', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'finest_cta_primary_btn_typography',
                'selector' => '{{WRAPPER}} a.finest-call-to-action-primary-btn'
            ]
        );

        $this->add_responsive_control(
            'finest_cta_primary_btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'      => [
                    'top'      => '16',
                    'right'    => '51',
                    'bottom'   => '16',
                    'left'     => '51',
                    'isLinked' => false
                ],
                'selectors'  => [
                    '{{WRAPPER}} a.finest-call-to-action-primary-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_cta_primary_btn_margin',
            [
                'label'      => esc_html__( 'Margin', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'      => [
                    'top'      => '0',
                    'right'    => '20',
                    'bottom'   => '0',
                    'left'     => '0',
                    'unit'     => 'px',
                    'isLinked' => false
                ],
                'selectors'  => [
                    '{{WRAPPER}} a.finest-call-to-action-primary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_cta_primary_btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-call-to-action-primary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->start_controls_tabs( 'finest_cta_primary_btn_tabs' );

            // Normal State Tab
            $this->start_controls_tab( 'finest_cta_primary_btn_normal', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

            $this->add_control(
                'finest_cta_primary_btn_normal_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} a.finest-call-to-action-primary-btn' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'finest_cta_primary_btn_normal_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.finest-call-to-action-primary-btn' => 'background-color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'finest_cta_primary_btn_normal_border',
                    'selector' => '{{WRAPPER}} a.finest-call-to-action-primary-btn'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'finest_cta_primary_btn_normal_box_shadow',
                    'selector'       => '{{WRAPPER}} a.finest-call-to-action-primary-btn'
                ]
            );

            $this->end_controls_tab();

            // Hover State Tab
            $this->start_controls_tab( 'finest_cta_primary_btn_hover', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

            $this->add_control(
                'finest_cta_primary_btn_hover_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.finest-call-to-action-primary-btn:hover' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'finest_cta_primary_btn_hover_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#04c1c1',
                    'selectors' => [
                        '{{WRAPPER}} .finest-call-to-action-buttons li .finest-call-to-action-primary-btn:hover' => 'background: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'finest_cta_primary_btn_hover_border',
                    'selector' => '{{WRAPPER}} a.finest-call-to-action-primary-btn:hover'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'finest_cta_primary_btn_hover_box_shadow',
                    'selector'       => '{{WRAPPER}} a.finest-call-to-action-primary-btn:hover',
                ]
            );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // secondary button
        $this->start_controls_section(
            'finest_section_cta_secondary_btn_style_settings',
            [
                'label'     => esc_html__( 'Secondary Button', 'finest-addons' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    '.finest_cta_skin_type' => 'vertical'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'finest_cta_secondary_btn_typography',
                'selector' => '{{WRAPPER}} a.finest-call-to-action-secondary-btn'
            ]
        );

        $this->add_responsive_control(
            'finest_cta_secondary_btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'      => [
                    'top'      => '15',
                    'right'    => '50',
                    'bottom'   => '15',
                    'left'     => '50',
                    'isLinked' => false
                ],
                'selectors'  => [
                    '{{WRAPPER}} a.finest-call-to-action-secondary-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_cta_secondary_btn_margin',
            [
                'label'      => esc_html__( 'Margin', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} a.finest-call-to-action-secondary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_cta_secondary_btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-call-to-action-secondary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->start_controls_tabs( 'finest_cta_secondary_btn_tabs' );

            // Normal State Tab
            $this->start_controls_tab( 'finest_cta_secondary_btn_normal', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

            $this->add_control(
                'finest_cta_secondary_btn_normal_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.finest-call-to-action-secondary-btn' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'finest_cta_secondary_btn_normal_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => 'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} a.finest-call-to-action-secondary-btn' => 'background-color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'               => 'finest_cta_secondary_btn_normal_border',
                    'fields_options'     => [
                        'border'         => [
                            'default'    => 'solid'
                        ],
                        'width'          => [
                            'default'    => [
                                'top'    => '1',
                                'right'  => '1',
                                'bottom' => '1',
                                'left'   => '1'
                            ]
                        ],
                    ],
                    'selector'           => '{{WRAPPER}} a.finest-call-to-action-secondary-btn'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'finest_cta_secondary_btn_normal_box_shadow',
                    'selector'       => '{{WRAPPER}} a.finest-call-to-action-secondary-btn'
                ]
            );

            $this->end_controls_tab();

            // Hover State Tab
            $this->start_controls_tab( 'finest_cta_secondary_btn_hover', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

            $this->add_control(
                'finest_cta_secondary_btn_hover_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} a.finest-call-to-action-secondary-btn:hover' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'finest_cta_secondary_btn_hover_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .finest-call-to-action-buttons li .finest-call-to-action-secondary-btn:hover' => 'background: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'finest_cta_secondary_btn_hover_border',
                    'selector' => '{{WRAPPER}} a.finest-call-to-action-secondary-btn:hover'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'finest_cta_secondary_btn_hover_box_shadow',
                    'selector'       => '{{WRAPPER}} a.finest-call-to-action-secondary-btn:hover',
                    'fields_options' => [
                        'box_shadow_type' => [
                            'default'     =>'yes'
                        ],
                        'box_shadow'  => [
                            'default' => [
                                'horizontal' => 0,
                                'vertical'   => 13,
                                'blur'       => 33,
                                'spread'     => 0,
                                'color'      => 'rgba(51, 77, 128, 0.12)'
                            ]
                        ]
                    ]
                ]
            );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
	}

    private function primary_btn() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'finest_cta_primary_btn', 'class', 'finest-cta-primary-btn-class' );
        $this->add_inline_editing_attributes( 'finest_cta_primary_btn', 'none' );
        ?>
        <span <?php echo $this->get_render_attribute_string( 'finest_cta_primary_btn' ); ?>>
            <?php echo esc_html( $settings['finest_cta_primary_btn'] ); ?>
        </span>
    <?php
    }

    private function seconday_btn() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'finest_cta_secondary_btn', 'class', 'finest-cta-secondary-btn-class' );
        $this->add_inline_editing_attributes( 'finest_cta_secondary_btn', 'none' );
        ?>
        <span <?php echo $this->get_render_attribute_string( 'finest_cta_secondary_btn' ); ?>>
            <?php echo esc_html( $settings['finest_cta_secondary_btn'] ); ?>
        </span>
    <?php
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $icon     = $settings['finest_cta_icon'];
        $heading  = $settings['finest_cta_heading'];
        $details  = $settings['finest_cta_description'];

        $this->add_render_attribute( 'finest_cta_heading', 'class', 'finest-call-to-action-title' );
        $this->add_inline_editing_attributes( 'finest_cta_heading', 'basic' );

        $this->add_render_attribute( 'finest_cta_description', 'class', 'finest-call-to-action-subtitle' );
        $this->add_inline_editing_attributes( 'finest_cta_description', 'basic' );

        $this->add_render_attribute( 'finest_call_to_action_wrapper', 'class', 'finest-call-to-action skin-'.$settings['finest_cta_skin_type'] );

        $this->add_render_attribute( 'finest_cta_primary_btn_link', 'class', 'finest-call-to-action-primary-btn' );

        if( $settings['finest_cta_primary_btn_link']['url'] ) {
            $this->add_render_attribute( 'finest_cta_primary_btn_link', 'href', esc_url( $settings['finest_cta_primary_btn_link']['url'] ) );
            if( $settings['finest_cta_primary_btn_link']['is_external'] ) {
                $this->add_render_attribute( 'finest_cta_primary_btn_link', 'target', '_blank' );
            }
            if( $settings['finest_cta_primary_btn_link']['nofollow'] ) {
                $this->add_render_attribute( 'finest_cta_primary_btn_link', 'rel', 'nofollow' );
            }
        }

        $this->add_render_attribute( 'finest_cta_secondary_btn_link', 'class', 'finest-call-to-action-secondary-btn' );
        if( $settings['finest_cta_secondary_btn_link']['url'] ) {
            $this->add_render_attribute( 'finest_cta_secondary_btn_link', 'href', esc_url( $settings['finest_cta_secondary_btn_link']['url'] ) );
            if( $settings['finest_cta_secondary_btn_link']['is_external'] ) {
                $this->add_render_attribute( 'finest_cta_secondary_btn_link', 'target', '_blank' );
            }
            if( $settings['finest_cta_secondary_btn_link']['nofollow'] ) {
                $this->add_render_attribute( 'finest_cta_secondary_btn_link', 'rel', 'nofollow' );
            }
        }
        ?>

        <div <?php echo $this->get_render_attribute_string( 'finest_call_to_action_wrapper' ); ?>>
            <?php do_action('finest_cta_wrapper_before'); ?>
		    <div class="finest-call-to-action-content">
                <div class="finest-call-to-action-header">
                <?php
                    if( !empty( $settings['finest_cta_icon']['value'] ) ) { ?>
                        <div class="finest-call-to-action-icon">
                            <?php Icons_Manager::render_icon( $settings['finest_cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    <?php
                    }

                    $heading ? printf( '<h1 '.$this->get_render_attribute_string( 'finest_cta_heading' ).'>%s</h1>', wp_kses_post( $heading ) ) : '';

                    if ( $details ) : ?>
                        <div <?php echo $this->get_render_attribute_string( 'finest_cta_description' ); ?>>
                            <?php echo wp_kses_post( $settings['finest_cta_description'] ); ?>
                        </div>
                    <?php endif; ?>
			    </div>

			    <div class="finest-call-to-action-footer">
                    <ul class="finest-call-to-action-buttons">
                    <?php
                        if ( ! empty( $settings['finest_cta_primary_btn'] ) ) : ?>
                            <li>
                                <a <?php echo $this->get_render_attribute_string( 'finest_cta_primary_btn_link' ); ?>>
                                    <?php $this->primary_btn(); ?>
                                </a>
                            </li>
                        <?php
                        endif;

                        if( 'vertical' === $settings['finest_cta_skin_type'] && !empty( $settings['finest_cta_secondary_btn'] ) ) : ?>
                            <li>
                                <a <?php echo $this->get_render_attribute_string( 'finest_cta_secondary_btn_link' ); ?>>
                                    <?php $this->seconday_btn(); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
			    </div>
		    </div>
            <?php do_action('finest_cta_wrapper_after'); ?>
		</div>
    <?php
	}

}
$widgets_manager->register_widget_type(new \Finest\Widgets\Elementor\Finest_Call_To_Action());