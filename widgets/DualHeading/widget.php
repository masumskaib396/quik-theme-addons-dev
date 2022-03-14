<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Widget_Base;

class Quik_Theme_Dual_Heading extends Widget_Base {

	public function get_name() {
		return 'quiktheme-dual-headding';
	}

	public function get_title() {
		return esc_html__( 'Dual Heading', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-type';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

    public function get_keywords() {
        return [ 'quiktheme-addons', 'multi', 'double', 'heading' ];
    }

    protected function _register_controls() {

		/**
		* Dual Heading Content Section
		*/
		$this->start_controls_section(
			'quik_theme_addons_dual_heading_content',
			[
				'label' => esc_html__( 'Content', 'quiktheme-addons' )
			]
        );

        $this->add_control(
            'quik_theme_addons_dual_first_heading',
            [
                'label'       => esc_html__( 'Before Heading', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Before', 'quiktheme-addons' ),
                'dynamic'     => [
                    'active' => true,
                ],

            ]
        );

        $this->add_control(
            'quik_theme_addons_dual_second_heading',
            [
                'label'       => esc_html__( 'Middle Heading', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Middle', 'quiktheme-addons' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'quik_theme_addons_after_headding_show',
            [
                'label'        => esc_html__( 'Enable After Heading', 'quiktheme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'quik_theme_addons_dual_thard_heading',
            [
                'label'       => esc_html__( 'After Heading', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'After', 'quiktheme-addons' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'quik_theme_addons_after_headding_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'quik_theme_addons_dual_heading_title_link',
            [
                'label'       => __( 'Heading URL', 'quiktheme-addons' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'quiktheme-addons' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'quik_theme_addons_sub_headding_show',
            [
                'label'        => esc_html__( 'Enable Sub Heading', 'quiktheme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'quik_theme_addons_dual_heading_description',
            [
                'label'       => __( 'Sub Heading', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'quik_theme_addons_sub_headding_show' => 'yes',
                ],
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'quiktheme-addons' )
            ]
        );




        $this->end_controls_section();

        /*
        * Dual Heading Styling Section
        */
        $this->start_controls_section(
            'quik_theme_addons_dual_heading_styles_general',
            [
                'label' => esc_html__( 'General Styles', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_heading_alignment',
            [
                'label'       => esc_html__( 'Alignment', 'quiktheme-addons' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'label_block' => true,
                'options'     => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'default'       => 'center',
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper' => 'text-align: {{VALUE}};'
                ]
            ]
        );



        $this->add_responsive_control(
            'quik_theme_addons_dual_heading_margin',
            [
                'label'      => __('Margin', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_heading_padding',
            [
                'label'      => __('Padding', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading First Part Styling Section
            */
        $this->start_controls_section(
            'quik_theme_addons_dual_first_heading_styles',
            [
                'label' => esc_html__( 'Before Heading', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'quik_theme_addons_dual_heading_first_text_color',
            [
                'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF6C4B',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading, {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title a .first-heading' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'quik_theme_addons_dual_heading_first_bg_color',
                'types'           => [ 'classic', 'gradient' ],
                'default'         => '#222222',
                'selector'        => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading, {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title a .first-heading',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'     => 'quik_theme_addons_dual_first_heading_typography',
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading'
			]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'quik_theme_addons_dual_first_heading_border',
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading'
            ]
        );

        // start
        // $this->start_popover();

        $this->add_control(
            'stroke_fill_beafore_color',
            [
                'label'     => __( 'Strok Fill Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading, {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title a .first-heading' => '-webkit-text-fill-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'stroke_beafore_color',
            [
                'label'     => __( 'Strok Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading, {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title a .first-heading' => '-webkit-text-stroke-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'stroke_beafore_width',
            [
                'label'      => __( 'Strok Width', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading, {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title a .first-heading' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        // $this->end_popover();
        // end

        $this->add_responsive_control(
            'quik_theme_addons_dual_first_heading_margin',
            [
                'label'      => __('Margin', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_first_heading_padding',
            [
                'label'      => __('Padding', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_first_heading_radius',
            [
                'label'      => __('Border radius', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .first-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
                'quik_theme_addons_dual_second_heading_styles',
                [
                    'label' => esc_html__( 'Middle Heading', 'quiktheme-addons' ),
                    'tab'   => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'quik_theme_addons_dual_heading_second_text_color',
                [
                    'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#132C47',
                    'selectors' => [
                        '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading,  {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading a ' => 'color: {{VALUE}};'
                    ]
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'quik_theme_addons_dual_heading_second_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading,  {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'quik_theme_addons_dual_second_heading_typography',
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading '
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'quik_theme_addons_dual_second_heading_border',
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading '
            ]
        );
        $this->add_responsive_control(
            'quik_theme_addons_dual_second_heading_margin',
            [
                'label'      => __('Margin', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_second_heading_padding',
            [
                'label'      => __('Padding', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_second_heading_radius',
            [
                'label'      => __('Border radius', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .second-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
            'quik_theme_addons_dual_thard_heading_styles',
            [
                'label' => esc_html__( 'After Heading', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'quik_theme_addons_after_headding_show' => 'yes',
                ],
            ]
         );

        $this->add_control(
            'quik_theme_addons_dual_heading_thard_text_color',
            [
                'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#086AD7',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading,  {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading a ' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'quik_theme_addons_dual_heading_thard_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading,  {{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'quik_theme_addons_dual_thard_heading_typography',
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading '
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'quik_theme_addons_dual_thard_heading_border',
                'selector' => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading '
            ]
        );
        $this->add_responsive_control(
            'quik_theme_addons_dual_thard_heading_margin',
            [
                'label'      => __('Margin', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_thard_heading_padding',
            [
                'label'      => __('Padding', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_thard_heading_radius',
            [
                'label'      => __('Border radius', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper .quiktheme-addons-dual-heading-title .thard-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading description Styling Section
        */
        $this->start_controls_section(
            'quik_theme_addons_dual_heading_description_styles',
            [
                'label' => esc_html__( 'Sub Heading', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'quik_theme_addons_sub_headding_show' => 'yes',
                ],
            ]
        );


        $this->add_control(
            'quik_theme_addons_dual_heading_description_text_color',
            [
                'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#989B9E',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper p.quiktheme-addons-dual-heading-description' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'            => 'quik_theme_addons_dual_heading_description_typography',
                'fields_options'  => [
                    'font_weight' => [
                        'default' => '400'
                    ]
                ],
                'selector'        => '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper p.quiktheme-addons-dual-heading-description'
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_heading_description_margin',
            [
                'label'      => __('Margin', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper p.quiktheme-addons-dual-heading-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_addons_dual_heading_description_padding',
            [
                'label'      => __('Padding', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-dual-heading .quiktheme-addons-dual-heading-wrapper p.quiktheme-addons-dual-heading-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings          = $this->get_settings_for_display();

        $this->add_render_attribute( 'quik_theme_addons_dual_first_heading', 'class', 'first-heading' );
        $this->add_inline_editing_attributes( 'quik_theme_addons_dual_first_heading', 'none' );

        $this->add_render_attribute( 'quik_theme_addons_dual_second_heading', 'class', 'second-heading' );
        $this->add_inline_editing_attributes( 'quik_theme_addons_dual_second_heading', 'none' );

        $this->add_render_attribute( 'quik_theme_addons_dual_thard_heading', 'class', 'thard-heading' );
        $this->add_inline_editing_attributes( 'quik_theme_addons_dual_thard_heading', 'none' );

        $this->add_render_attribute( 'quik_theme_addons_dual_heading_description', 'class', 'quiktheme-addons-dual-heading-description' );
        $this->add_inline_editing_attributes( 'quik_theme_addons_dual_heading_description' );

        if( $settings['quik_theme_addons_dual_heading_title_link']['url'] ) {
            $this->add_render_attribute( 'quik_theme_addons_dual_heading_title_link', 'href', esc_url( $settings['quik_theme_addons_dual_heading_title_link']['url'] ) );
            if( $settings['quik_theme_addons_dual_heading_title_link']['is_external'] ) {
                $this->add_render_attribute( 'quik_theme_addons_dual_heading_title_link', 'target', '_blank' );
            }
            if( $settings['quik_theme_addons_dual_heading_title_link']['nofollow'] ) {
                $this->add_render_attribute( 'quik_theme_addons_dual_heading_title_link', 'rel', 'nofollow' );
            }
        }

        echo '<div class="quiktheme-addons-dual-heading">';
            echo '<div class="quiktheme-addons-dual-heading-wrapper">';

                echo '<h1 class="quiktheme-addons-dual-heading-title">';
                    if( !empty( $settings['quik_theme_addons_dual_heading_title_link']['url'] ) ) :
                        echo '<a '.$this->get_render_attribute_string( 'quik_theme_addons_dual_heading_title_link' ).'>';
                    endif;
                    echo '<span '.$this->get_render_attribute_string( 'quik_theme_addons_dual_first_heading' ).'>'.$settings['quik_theme_addons_dual_first_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'quik_theme_addons_dual_second_heading' ).'>'.$settings['quik_theme_addons_dual_second_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'quik_theme_addons_dual_thard_heading' ).'>'.$settings['quik_theme_addons_dual_thard_heading'].'</span>';
                    if( !empty( $settings['quik_theme_addons_dual_heading_title_link']['url'] ) ) {
                        echo '</a>';
                    }
                echo '</h1>';

                if ( !empty($settings['quik_theme_addons_dual_heading_description'] ) ) :
                    echo '<p '.$this->get_render_attribute_string( 'quik_theme_addons_dual_heading_description' ).'>'.wp_kses_post( $settings['quik_theme_addons_dual_heading_description'] ).'</p>';
                endif;

            echo '</div>';
        echo '</div>';
    }
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Dual_Heading() );