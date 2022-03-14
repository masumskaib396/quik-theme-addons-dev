<?php
namespace Quiktheme\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Widget_Base;

class Quik_Theme_Call_To_Action extends Widget_Base {

	public function get_name() {
		return 'quiktheme-call-to-action';
	}

	public function get_title() {
		return esc_html__( 'Call To Action', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-archive';
	}

   	public function get_categories() {
		return [ 'quiktheme-addons' ];
    }

    public function get_keywords() {
        return [ 'quik-theme-addons', 'cta', 'button' ];
    }

	protected function register_controls() {

  		$this->start_controls_section(
			'quik_theme_section_side_a_content',
			[
				'label' => __( 'Content', 'quiktheme-addons' )
			]
		);

        $this->add_control(
            'quik_theme_cta_skin_type',
            [
                'label'     => esc_html__( 'Skin Type', 'quiktheme-addons' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'vertical',
                'options'   => [
                    'horizontal'  => esc_html__( 'Horizontal',   'quiktheme-addons' ),
                    'vertical'    => esc_html__( 'Vertical', 'quiktheme-addons' )
                ]
            ]
        );

		$this->add_control(
			'quik_theme_cta_heading',
			[
				'label'       => __( 'Heading', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Designers & Developer with Great UX', 'quiktheme-addons' ),
                'label_block' => true,
				'placeholder' => __( 'Your Heading', 'quiktheme-addons' ),
                'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'quik_theme_cta_description',
			[
				'label'       => __( 'Description', 'quiktheme-addons' ),
				'type'        => Controls_Manager::WYSIWYG,
				'default'     => __( 'Exclusive addons is collaborative project of some professional developer, designer & tested user experience of using it on some of user’s websites.', 'quiktheme-addons' ),
				'placeholder' => __( 'Your Description', 'quiktheme-addons' )
			]
		);

        $this->add_control(
            'quik_theme_cta_icon',
            [
                'label'   => esc_html__( 'Icon', 'quiktheme-addons' ),
                'type'    => Controls_Manager::ICONS
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'quik_theme_cta_primary_button_section',
            [
                'label' => esc_html__( 'Primary Button', 'quiktheme-addons' )
            ]
        );

        $this->add_control(
            'quik_theme_cta_primary_btn',
            [
                'label'       => esc_html__( 'Button Text', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Get Now', 'quiktheme-addons' ),
                'dynamic' => [
					'active' => true,
				]
            ]
        );

        $this->add_control(
            'quik_theme_cta_primary_btn_link',
            [
                'label'       => esc_html__( 'Button Link', 'quiktheme-addons' ),
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
            'quik_theme_cta_secondary_button_section',
            [
                'label'     => esc_html__( 'Secondary Button', 'quiktheme-addons' ),
                'condition' => [
                    'quik_theme_cta_skin_type' => 'vertical'
                ]
            ]
        );

        $this->add_control(
            'quik_theme_cta_secondary_btn',
            [
                'label'       => esc_html__( 'Button Text', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Try It Now', 'quiktheme-addons' ),
                'dynamic' => [
					'active' => true,
				]
            ]
        );

        $this->add_control(
            'quik_theme_cta_secondary_btn_link',
            [
                'label'       => esc_html__( 'Button Link', 'quiktheme-addons' ),
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
			'quik_theme_cta_container_style_settings',
			[
                'label' => __( 'Container', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
			]
        );

        $this->add_responsive_control(
            'quik_theme_cta_vertical_alignment',
            [
                'label'          => esc_html__( 'Alignment', 'quiktheme-addons' ),
                'type'           => Controls_Manager::CHOOSE,
                'toggle'         => false,
                'options'        => [
                    'left'       => [
                        'title'  => __( 'Left', 'quiktheme-addons' ),
                        'icon'   => 'eicon-h-align-left'
                    ],
                    'center'     => [
                        'title'  => __( 'Center', 'quiktheme-addons' ),
                        'icon'   => 'eicon-h-align-center'
                    ],
                    'right'      => [
                        'title'  => __( 'Right', 'quiktheme-addons' ),
                        'icon'   => 'eicon-h-align-right'
                    ]
                ],
                'selectors_dictionary' => [
					'left' => 'text-align: left; justify-content: flex-start;',
					'center' => 'text-align: center; justify-content: center;',
					'right' => 'text-align: right; justify-content: flex-end;',
				],
                'selectors'      => [
                    '{{WRAPPER}} .quiktheme-call-to-action.skin-vertical' => '{{VALUE}};',
                    '{{WRAPPER}} .quiktheme-call-to-action-buttons li' => '{{VALUE}};'
                ],
                'desktop_default' => 'center',
				'tablet_default' => 'center',
				'mobile_default' => 'center',
                'condition'      => [
                    'quik_theme_cta_skin_type' => 'vertical'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_container_padding',
            [
                'label'        => esc_html__( 'Padding', 'quiktheme-addons' ),
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
                    '{{WRAPPER}} .quiktheme-call-to-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'quik_theme_cta_container_bg_color',
                'types'           => [ 'classic', 'gradient' ],
                'selector'        => '{{WRAPPER}} .quiktheme-call-to-action',
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
                'name'     => 'quik_theme_cta_container_border',
                'selector' => '{{WRAPPER}} .quiktheme-call-to-action'
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_container_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-call-to-action' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'quik_theme_cta_container_box_shadow',
                'selector' => '{{WRAPPER}} .quiktheme-call-to-action'
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'quik_theme_cta_content_style_settings',
            [
                'label' => __( 'Content', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'quik_theme_cta_style_heading',
            [
                'label' => esc_html__( 'Heading', 'quiktheme-addons' ),
                'type'  => Controls_Manager::HEADING
            ]
        );

        $this->add_control(
            'quik_theme_cta_heading_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                'default'   => '#132c47',
                'selectors' => [
                    '{{WRAPPER}} h1.quiktheme-call-to-action-title' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'           => 'quik_theme_cta_heading_typography',
                'selector'       => '{{WRAPPER}} h1.quiktheme-call-to-action-title',
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
            'quik_theme_cta_heading_margin',
            [
                'label'      => esc_html__( 'Margin', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} h1.quiktheme-call-to-action-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'quik_theme_cta_style_description',
            [
                'label'     => esc_html__( 'Description', 'quiktheme-addons' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'quik_theme_cta_description_color',
            [
                'type'      => Controls_Manager::COLOR,
                'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                'default'   => '#8a8d91',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-call-to-action-header .quiktheme-call-to-action-subtitle' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'quik_theme_cta_description_typography',
                'selector' => '{{WRAPPER}} .quiktheme-call-to-action-header .quiktheme-call-to-action-subtitle'
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_description_margin',
            [
                'label'      => esc_html__( 'Margin', 'quiktheme-addons' ),
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
                        '{{WRAPPER}} .quiktheme-call-to-action-header .quiktheme-call-to-action-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'quik_theme_cta_style_icon',
            [
                'label'     => esc_html__( 'Icon', 'quiktheme-addons' ),
                'type'      => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'quik_theme_cta_icon[value]!' => ''
                ]
            ]
        );

        $this->add_control(
            'quik_theme_call_to_action_icon_color',
            [
                'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-call-to-action-icon i' => 'color: {{VALUE}};'
                ],
                'condition' => [
                    'quik_theme_cta_icon[value]!' => ''
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_call_to_action_icon_size',
            [
                'label'        => esc_html__( 'Size', 'quiktheme-addons' ),
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
                    '{{WRAPPER}} .quiktheme-call-to-action-icon i' => 'font-size: {{SIZE}}px;'
                ],
                'condition' => [
                    'quik_theme_cta_icon[value]!' => ''
                ]
            ]
        );

        $this->add_control(
            'quik_theme_call_to_action_icon_padding',
            [
                'label'      => esc_html__( 'Padding', 'quiktheme-addons' ),
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
                    '{{WRAPPER}} .quiktheme-call-to-action-icon i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'condition'  => [
                    'quik_theme_cta_icon[value]!' => ''
                ]
            ]
        );

		$this->end_controls_section();

        // primary button
        $this->start_controls_section(
            'quik_theme_section_cta_primary_btn_style_settings',
            [
                'label' => esc_html__( 'Primary Button', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'quik_theme_cta_primary_btn_typography',
                'selector' => '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn'
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_primary_btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'quiktheme-addons' ),
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
                    '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_primary_btn_margin',
            [
                'label'      => esc_html__( 'Margin', 'quiktheme-addons' ),
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
                    '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_primary_btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-call-to-action-primary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->start_controls_tabs( 'quik_theme_cta_primary_btn_tabs' );

            // Normal State Tab
            $this->start_controls_tab( 'quik_theme_cta_primary_btn_normal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );

            $this->add_control(
                'quik_theme_cta_primary_btn_normal_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'quik_theme_cta_primary_btn_normal_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn' => 'background-color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'quik_theme_cta_primary_btn_normal_border',
                    'selector' => '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'quik_theme_cta_primary_btn_normal_box_shadow',
                    'selector'       => '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn'
                ]
            );

            $this->end_controls_tab();

            // Hover State Tab
            $this->start_controls_tab( 'quik_theme_cta_primary_btn_hover', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );

            $this->add_control(
                'quik_theme_cta_primary_btn_hover_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn:hover' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'quik_theme_cta_primary_btn_hover_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#04c1c1',
                    'selectors' => [
                        '{{WRAPPER}} .quiktheme-call-to-action-buttons li .quiktheme-call-to-action-primary-btn:hover' => 'background: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'quik_theme_cta_primary_btn_hover_border',
                    'selector' => '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn:hover'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'quik_theme_cta_primary_btn_hover_box_shadow',
                    'selector'       => '{{WRAPPER}} a.quiktheme-call-to-action-primary-btn:hover',
                ]
            );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // secondary button
        $this->start_controls_section(
            'quik_theme_section_cta_secondary_btn_style_settings',
            [
                'label'     => esc_html__( 'Secondary Button', 'quiktheme-addons' ),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    '.quik_theme_cta_skin_type' => 'vertical'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'quik_theme_cta_secondary_btn_typography',
                'selector' => '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn'
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_secondary_btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'quiktheme-addons' ),
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
                    '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_secondary_btn_margin',
            [
                'label'      => esc_html__( 'Margin', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_cta_secondary_btn_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-call-to-action-secondary-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->start_controls_tabs( 'quik_theme_cta_secondary_btn_tabs' );

            // Normal State Tab
            $this->start_controls_tab( 'quik_theme_cta_secondary_btn_normal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );

            $this->add_control(
                'quik_theme_cta_secondary_btn_normal_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'quik_theme_cta_secondary_btn_normal_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => 'rgba(0,0,0,0)',
                    'selectors' => [
                        '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn' => 'background-color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'               => 'quik_theme_cta_secondary_btn_normal_border',
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
                    'selector'           => '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'quik_theme_cta_secondary_btn_normal_box_shadow',
                    'selector'       => '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn'
                ]
            );

            $this->end_controls_tab();

            // Hover State Tab
            $this->start_controls_tab( 'quik_theme_cta_secondary_btn_hover', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );

            $this->add_control(
                'quik_theme_cta_secondary_btn_hover_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#ffffff',
                    'selectors' => [
                        '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn:hover' => 'color: {{VALUE}};'
                    ]
                ]
            );

            $this->add_control(
                'quik_theme_cta_secondary_btn_hover_bg_color',
                [
                    'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .quiktheme-call-to-action-buttons li .quiktheme-call-to-action-secondary-btn:hover' => 'background: {{VALUE}};'
                    ]
                ]
            );

            $this->add_group_control(
                Group_Control_Border::get_type(),
                [
                    'name'     => 'quik_theme_cta_secondary_btn_hover_border',
                    'selector' => '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn:hover'
                ]
            );

            $this->add_group_control(
                Group_Control_Box_Shadow::get_type(),
                [
                    'name'           => 'quik_theme_cta_secondary_btn_hover_box_shadow',
                    'selector'       => '{{WRAPPER}} a.quiktheme-call-to-action-secondary-btn:hover',
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

        $this->add_render_attribute( 'quik_theme_cta_primary_btn', 'class', 'quiktheme-cta-primary-btn-class' );
        $this->add_inline_editing_attributes( 'quik_theme_cta_primary_btn', 'none' );
        ?>
        <span <?php echo $this->get_render_attribute_string( 'quik_theme_cta_primary_btn' ); ?>>
            <?php echo esc_html( $settings['quik_theme_cta_primary_btn'] ); ?>
        </span>
    <?php
    }

    private function seconday_btn() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute( 'quik_theme_cta_secondary_btn', 'class', 'quiktheme-cta-secondary-btn-class' );
        $this->add_inline_editing_attributes( 'quik_theme_cta_secondary_btn', 'none' );
        ?>
        <span <?php echo $this->get_render_attribute_string( 'quik_theme_cta_secondary_btn' ); ?>>
            <?php echo esc_html( $settings['quik_theme_cta_secondary_btn'] ); ?>
        </span>
    <?php
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $icon     = $settings['quik_theme_cta_icon'];
        $heading  = $settings['quik_theme_cta_heading'];
        $details  = $settings['quik_theme_cta_description'];

        $this->add_render_attribute( 'quik_theme_cta_heading', 'class', 'quiktheme-call-to-action-title' );
        $this->add_inline_editing_attributes( 'quik_theme_cta_heading', 'basic' );

        $this->add_render_attribute( 'quik_theme_cta_description', 'class', 'quiktheme-call-to-action-subtitle' );
        $this->add_inline_editing_attributes( 'quik_theme_cta_description', 'basic' );

        $this->add_render_attribute( 'quik_theme_call_to_action_wrapper', 'class', 'quiktheme-call-to-action skin-'.$settings['quik_theme_cta_skin_type'] );

        $this->add_render_attribute( 'quik_theme_cta_primary_btn_link', 'class', 'quiktheme-call-to-action-primary-btn' );

        if( $settings['quik_theme_cta_primary_btn_link']['url'] ) {
            $this->add_render_attribute( 'quik_theme_cta_primary_btn_link', 'href', esc_url( $settings['quik_theme_cta_primary_btn_link']['url'] ) );
            if( $settings['quik_theme_cta_primary_btn_link']['is_external'] ) {
                $this->add_render_attribute( 'quik_theme_cta_primary_btn_link', 'target', '_blank' );
            }
            if( $settings['quik_theme_cta_primary_btn_link']['nofollow'] ) {
                $this->add_render_attribute( 'quik_theme_cta_primary_btn_link', 'rel', 'nofollow' );
            }
        }

        $this->add_render_attribute( 'quik_theme_cta_secondary_btn_link', 'class', 'quiktheme-call-to-action-secondary-btn' );
        if( $settings['quik_theme_cta_secondary_btn_link']['url'] ) {
            $this->add_render_attribute( 'quik_theme_cta_secondary_btn_link', 'href', esc_url( $settings['quik_theme_cta_secondary_btn_link']['url'] ) );
            if( $settings['quik_theme_cta_secondary_btn_link']['is_external'] ) {
                $this->add_render_attribute( 'quik_theme_cta_secondary_btn_link', 'target', '_blank' );
            }
            if( $settings['quik_theme_cta_secondary_btn_link']['nofollow'] ) {
                $this->add_render_attribute( 'quik_theme_cta_secondary_btn_link', 'rel', 'nofollow' );
            }
        }
        ?>

        <div <?php echo $this->get_render_attribute_string( 'quik_theme_call_to_action_wrapper' ); ?>>
            <?php do_action('quik_theme_cta_wrapper_before'); ?>
		    <div class="quiktheme-call-to-action-content">
                <div class="quiktheme-call-to-action-header">
                <?php
                    if( !empty( $settings['quik_theme_cta_icon']['value'] ) ) { ?>
                        <div class="quiktheme-call-to-action-icon">
                            <?php Icons_Manager::render_icon( $settings['quik_theme_cta_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    <?php
                    }

                    $heading ? printf( '<h1 '.$this->get_render_attribute_string( 'quik_theme_cta_heading' ).'>%s</h1>', wp_kses_post( $heading ) ) : '';

                    if ( $details ) : ?>
                        <div <?php echo $this->get_render_attribute_string( 'quik_theme_cta_description' ); ?>>
                            <?php echo wp_kses_post( $settings['quik_theme_cta_description'] ); ?>
                        </div>
                    <?php endif; ?>
			    </div>

			    <div class="quiktheme-call-to-action-footer">
                    <ul class="quiktheme-call-to-action-buttons">
                    <?php
                        if ( ! empty( $settings['quik_theme_cta_primary_btn'] ) ) : ?>
                            <li>
                                <a <?php echo $this->get_render_attribute_string( 'quik_theme_cta_primary_btn_link' ); ?>>
                                    <?php $this->primary_btn(); ?>
                                </a>
                            </li>
                        <?php
                        endif;

                        if( 'vertical' === $settings['quik_theme_cta_skin_type'] && !empty( $settings['quik_theme_cta_secondary_btn'] ) ) : ?>
                            <li>
                                <a <?php echo $this->get_render_attribute_string( 'quik_theme_cta_secondary_btn_link' ); ?>>
                                    <?php $this->seconday_btn(); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
			    </div>
		    </div>
            <?php do_action('quik_theme_cta_wrapper_after'); ?>
		</div>
    <?php
	}

}
$widgets_manager->register_widget_type(new \Quiktheme\Widgets\Elementor\Quik_Theme_Call_To_Action());