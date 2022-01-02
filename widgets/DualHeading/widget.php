<?php
namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Widget_Base;

class Finest_Dual_Heading extends Widget_Base {

	public function get_name() {
		return 'finest-dual-headding';
	}

	public function get_title() {
		return esc_html__( 'Dual Heading', 'finest-addons' );
	}

	public function get_icon() {
		return 'feather icon-type';
	}

	public function get_categories() {
		return [ 'finest-addons' ];
	}

    public function get_keywords() {
        return [ 'finest-addons', 'multi', 'double', 'heading' ];
    }

    protected function _register_controls() {

		/**
		* Dual Heading Content Section
		*/
		$this->start_controls_section(
			'finest_addons_dual_heading_content',
			[
				'label' => esc_html__( 'Content', 'finest-addons' )
			]
        );

        $this->add_control(
            'finest_addons_dual_first_heading',
            [
                'label'       => esc_html__( 'Before Heading', 'finest-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'Before', 'finest-addons' ),
                'dynamic'     => [
                    'active' => true,
                ],

            ]
        );

        $this->add_control(
            'finest_addons_dual_second_heading',
            [
                'label'       => esc_html__( 'Middle Heading', 'finest-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Middle', 'finest-addons' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'finest_addons_after_headding_show',
            [
                'label'        => esc_html__( 'Enable After Heading', 'finest-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'finest_addons_dual_thard_heading',
            [
                'label'       => esc_html__( 'After Heading', 'finest-addons' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'default'     => esc_html__( 'After', 'finest-addons' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'finest_addons_after_headding_show' => 'yes',
                ],
            ]
        );
        $this->add_control(
            'finest_addons_dual_heading_title_link',
            [
                'label'       => __( 'Heading URL', 'finest-addons' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'finest-addons' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );
        $this->add_control(
            'finest_addons_sub_headding_show',
            [
                'label'        => esc_html__( 'Enable Sub Heading', 'finest-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes'
            ]
        );

        $this->add_control(
            'finest_addons_dual_heading_description',
            [
                'label'       => __( 'Sub Heading', 'finest-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'dynamic'     => [ 'active' => true ],
                'condition' => [
                    'finest_addons_sub_headding_show' => 'yes',
                ],
                'default'     => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'finest-addons' )
            ]
        );




        $this->end_controls_section();

        /*
        * Dual Heading Styling Section
        */
        $this->start_controls_section(
            'finest_addons_dual_heading_styles_general',
            [
                'label' => esc_html__( 'General Styles', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_heading_alignment',
            [
                'label'       => esc_html__( 'Alignment', 'finest-addons' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'label_block' => true,
                'options'     => [
                    'left'      => [
                        'title' => esc_html__( 'Left', 'finest-addons' ),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => esc_html__( 'Center', 'finest-addons' ),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => esc_html__( 'Right', 'finest-addons' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'default'       => 'center',
                'label_block'   => true,
                'selectors'     => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper' => 'text-align: {{VALUE}};'
                ]
            ]
        );



        $this->add_responsive_control(
            'finest_addons_dual_heading_margin',
            [
                'label'      => __('Margin', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_heading_padding',
            [
                'label'      => __('Margin', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading First Part Styling Section
            */
        $this->start_controls_section(
            'finest_addons_dual_first_heading_styles',
            [
                'label' => esc_html__( 'Before Heading', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'finest_addons_dual_heading_first_text_color',
            [
                'label'     => esc_html__( 'Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#FF6C4B',
                'selectors' => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading, {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title a .first-heading' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'finest_addons_dual_heading_first_bg_color',
                'types'           => [ 'classic', 'gradient' ],
                'default'         => '#222222',
                'selector'        => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading, {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title a .first-heading',
            ]
        );

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'name'     => 'finest_addons_dual_first_heading_typography',
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading'
			]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'finest_addons_dual_first_heading_border',
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading'
            ]
        );

        // start
        // $this->start_popover();

        $this->add_control(
            'stroke_fill_beafore_color',
            [
                'label'     => __( 'Strok Fill Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading, {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title a .first-heading' => '-webkit-text-fill-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'stroke_beafore_color',
            [
                'label'     => __( 'Strok Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading, {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title a .first-heading' => '-webkit-text-stroke-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'stroke_beafore_width',
            [
                'label'      => __( 'Strok Width', 'finest-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading, {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title a .first-heading' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );
        // $this->end_popover();
        // end

        $this->add_responsive_control(
            'finest_addons_dual_first_heading_margin',
            [
                'label'      => __('Margin', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_first_heading_padding',
            [
                'label'      => __('Padding', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_first_heading_radius',
            [
                'label'      => __('Border radius', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .first-heading' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
                'finest_addons_dual_second_heading_styles',
                [
                    'label' => esc_html__( 'Middle Heading', 'finest-addons' ),
                    'tab'   => Controls_Manager::TAB_STYLE
                ]
        );

        $this->add_control(
                'finest_addons_dual_heading_second_text_color',
                [
                    'label'     => esc_html__( 'Color', 'finest-addons' ),
                    'type'      => Controls_Manager::COLOR,
                    'default'   => '#132C47',
                    'selectors' => [
                        '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading,  {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading a ' => 'color: {{VALUE}};'
                    ]
                ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'finest_addons_dual_heading_second_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading,  {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'finest_addons_dual_second_heading_typography',
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading '
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'finest_addons_dual_second_heading_border',
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading '
            ]
        );
        $this->add_responsive_control(
            'finest_addons_dual_second_heading_margin',
            [
                'label'      => __('Margin', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_second_heading_padding',
            [
                'label'      => __('Padding', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_second_heading_radius',
            [
                'label'      => __('Border radius', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .second-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();


        /*
		* Dual Heading Thard Part Styling Section
		*/
        $this->start_controls_section(
            'finest_addons_dual_thard_heading_styles',
            [
                'label' => esc_html__( 'After Heading', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'finest_addons_after_headding_show' => 'yes',
                ],
            ]
         );

        $this->add_control(
            'finest_addons_dual_heading_thard_text_color',
            [
                'label'     => esc_html__( 'Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#086AD7',
                'selectors' => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading,  {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading a ' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'finest_addons_dual_heading_thard_bg_color',
                'types'    => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading,  {{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading a '
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'finest_addons_dual_thard_heading_typography',
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading '
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'finest_addons_dual_thard_heading_border',
                'selector' => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading '
            ]
        );
        $this->add_responsive_control(
            'finest_addons_dual_thard_heading_margin',
            [
                'label'      => __('Margin', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading ' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_thard_heading_padding',
            [
                'label'      => __('Padding', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_thard_heading_radius',
            [
                'label'      => __('Border radius', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper .finest-addons-dual-heading-title .thard-heading ' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();

        /*
            * Dual Heading description Styling Section
        */
        $this->start_controls_section(
            'finest_addons_dual_heading_description_styles',
            [
                'label' => esc_html__( 'Sub Heading', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'finest_addons_sub_headding_show' => 'yes',
                ],
            ]
        );


        $this->add_control(
            'finest_addons_dual_heading_description_text_color',
            [
                'label'     => esc_html__( 'Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#989B9E',
                'selectors' => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper p.finest-addons-dual-heading-description' => 'color: {{VALUE}};'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'            => 'finest_addons_dual_heading_description_typography',
                'fields_options'  => [
                    'font_weight' => [
                        'default' => '400'
                    ]
                ],
                'selector'        => '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper p.finest-addons-dual-heading-description'
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_heading_description_margin',
            [
                'label'      => __('Margin', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper p.finest-addons-dual-heading-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_addons_dual_heading_description_padding',
            [
                'label'      => __('Padding', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-addons-dual-heading .finest-addons-dual-heading-wrapper p.finest-addons-dual-heading-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings          = $this->get_settings_for_display();

        $this->add_render_attribute( 'finest_addons_dual_first_heading', 'class', 'first-heading' );
        $this->add_inline_editing_attributes( 'finest_addons_dual_first_heading', 'none' );

        $this->add_render_attribute( 'finest_addons_dual_second_heading', 'class', 'second-heading' );
        $this->add_inline_editing_attributes( 'finest_addons_dual_second_heading', 'none' );

        $this->add_render_attribute( 'finest_addons_dual_thard_heading', 'class', 'thard-heading' );
        $this->add_inline_editing_attributes( 'finest_addons_dual_thard_heading', 'none' );

        $this->add_render_attribute( 'finest_addons_dual_heading_description', 'class', 'finest-addons-dual-heading-description' );
        $this->add_inline_editing_attributes( 'finest_addons_dual_heading_description' );

        if( $settings['finest_addons_dual_heading_title_link']['url'] ) {
            $this->add_render_attribute( 'finest_addons_dual_heading_title_link', 'href', esc_url( $settings['finest_addons_dual_heading_title_link']['url'] ) );
            if( $settings['finest_addons_dual_heading_title_link']['is_external'] ) {
                $this->add_render_attribute( 'finest_addons_dual_heading_title_link', 'target', '_blank' );
            }
            if( $settings['finest_addons_dual_heading_title_link']['nofollow'] ) {
                $this->add_render_attribute( 'finest_addons_dual_heading_title_link', 'rel', 'nofollow' );
            }
        }

        echo '<div class="finest-addons-dual-heading">';
            echo '<div class="finest-addons-dual-heading-wrapper">';

                echo '<h1 class="finest-addons-dual-heading-title">';
                    if( !empty( $settings['finest_addons_dual_heading_title_link']['url'] ) ) :
                        echo '<a '.$this->get_render_attribute_string( 'finest_addons_dual_heading_title_link' ).'>';
                    endif;
                    echo '<span '.$this->get_render_attribute_string( 'finest_addons_dual_first_heading' ).'>'.$settings['finest_addons_dual_first_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'finest_addons_dual_second_heading' ).'>'.$settings['finest_addons_dual_second_heading'].'</span>';
                    echo '<span '.$this->get_render_attribute_string( 'finest_addons_dual_thard_heading' ).'>'.$settings['finest_addons_dual_thard_heading'].'</span>';
                    if( !empty( $settings['finest_addons_dual_heading_title_link']['url'] ) ) {
                        echo '</a>';
                    }
                echo '</h1>';

                if ( !empty($settings['finest_addons_dual_heading_description'] ) ) :
                    echo '<p '.$this->get_render_attribute_string( 'finest_addons_dual_heading_description' ).'>'.wp_kses_post( $settings['finest_addons_dual_heading_description'] ).'</p>';
                endif;

            echo '</div>';
        echo '</div>';
    }
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Dual_Heading() );