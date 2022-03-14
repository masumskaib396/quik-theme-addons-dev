<?php
namespace Quik_Theme_Addons\Widgets;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Quik_Theme_Tooltip extends Widget_Base {

    public function get_name() {
        return 'quiktheme-tooltip';
    }

    public function get_title() {
        return __( 'Tooltip', 'quiktheme-addons' );
    }

    public function get_icon() {
        return 'feather icon-git-commit';
    }


    public function get_keywords() {
        return [ 'quik-theme-addons', 'hover', 'title', 'tooltip', 'ticker' ];
    }

    public function get_categories() {
        return [ 'quiktheme-addons' ];
    }

    protected function register_controls() {
        $quik_theme_primary_color = get_option( 'quik_theme_primary_color_option', '#7a56ff' );

        $this->start_controls_section(
            'tooltip_button_content',
            [
                'label' => __( 'Content Settings', 'quiktheme-addons' )
            ]
        );

        $this->add_control(
			'quik_theme_tooltip_type',
			[
                'label'       => esc_html__( 'Content Type', 'quiktheme-addons' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'label_block' => true,
                'options'     => [
					'icon'      => [
						'title' => esc_html__( 'Icon', 'quiktheme-addons' ),
						'icon'  => 'eicon-info-circle'
					],
					'text'      => [
						'title' => esc_html__( 'Text', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-area'
					],
					'image'     => [
						'title' => esc_html__( 'Image', 'quiktheme-addons' ),
						'icon'  => 'eicon-image-bold'
					]
				],
				'default'     => 'icon'
			]
		);

  		$this->add_control(
			'quik_theme_tooltip_content',
			[
                'label'       => esc_html__( 'Content', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Hover Me!', 'quiktheme-addons' ),
                'condition'   => [
					'quik_theme_tooltip_type' => [ 'text' ]
				]
			]
        );

		$this->add_control(
			'quik_theme_tooltip_icon_content',
			[
                'label'       => esc_html__( 'Icon', 'quiktheme-addons' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fab fa-linux',
                    'library' => 'fa-brands'
                ],
                'condition'   => [
					'quik_theme_tooltip_type' => [ 'icon' ]
				]
			]
		);

		$this->add_control(
			'quik_theme_tooltip_img_content',
			[
                'label'     => esc_html__( 'Image', 'quiktheme-addons' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
					'url'   => Utils::get_placeholder_image_src()
				],
                'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'quik_theme_tooltip_type' => [ 'image' ]
				]
			]
		);

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'quik_theme_tooltip_image_size',
                'default'   => 'thumbnail',
                'condition' => [
                    'quik_theme_tooltip_type'              => [ 'image' ],
                    'quik_theme_tooltip_img_content[url]!' => ''
                ]
            ]
        );

        $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'quik_theme_tooltip_image_css_filter',
                'selector' => '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content img',
                'condition' => [
                    'quik_theme_tooltip_type' => [ 'image' ],
                    'quik_theme_tooltip_img_content[url]!' => ''
				]
			]
		);

        $this->add_control(
            'tooltip_style_section_align',
            [
                'label'   => __( 'Alignment', 'quiktheme-addons' ),
                'type'    => Controls_Manager::CHOOSE,
                'toggle'  => false,
                'options' => [
                    'left'      => [
                        'title' => __( 'Left', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => __( 'Center', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => __( 'Right', 'quiktheme-addons' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'default'       => 'center',
                'prefix_class'  => 'quiktheme-tooltip-align-'
            ]
        );

        $this->add_control(
            'quik_theme_tooltip_enable_link',
            [
                'label'        => __( 'Show Link', 'quiktheme-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'quiktheme-addons' ),
                'label_off'    => __( 'Hide', 'quiktheme-addons' ),
                'return_value' => 'yes',
                'default'      => 'no'
            ]
        );

        $this->add_control(
            'quik_theme_tooltip_link',
            [
                'label'           => __( 'Link', 'quiktheme-addons' ),
                'type'            => Controls_Manager::URL,
                'placeholder'     => __( 'https://your-link.com', 'quiktheme-addons' ),
                'show_external'   => true,
                'default'         => [
                    'url'         => '',
                    'is_external' => true
                ],
                'condition'       => [
                    'quik_theme_tooltip_enable_link'=>'yes'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tooltip_options',
            [
                'label' => __( 'Tooltip Options', 'quiktheme-addons' )
            ]
        );

        $this->add_control(
            'quik_theme_tooltip_text',
            [
                'label'       => esc_html__( 'Tooltip Text', 'quiktheme-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'These are some dummy tooltip contents.', 'quiktheme-addons' ),
                'dynamic'     => [ 'active' => true ]
            ]
        );

        $this->add_control(
          'quik_theme_tooltip_direction',
            [
                'label'         => esc_html__( 'Direction', 'quiktheme-addons' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'tooltip-right',
                'label_block'   => false,
                'options'       => [
                    'tooltip-left'   => esc_html__( 'Left', 'quiktheme-addons' ),
                    'tooltip-right'  => esc_html__( 'Right', 'quiktheme-addons' ),
                    'tooltip-top'    => esc_html__( 'Top', 'quiktheme-addons' ),
                    'tooltip-bottom' => esc_html__( 'Bottom', 'quiktheme-addons' )
                ]
            ]
        );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'tooltip_style_section',
            [
                'label' => __( 'General Styles', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'     => __( 'Text Typography', 'quiktheme-addons' ),
                'name'      => 'quik_theme_tooltip_button_text_typography',
                'selector'  => '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content',
                'condition' => [
                    'quik_theme_tooltip_type' => [ 'text' ]
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_tooltip_button_icon_size',
            [
                'label'        => __( 'Icon Size', 'quiktheme-addons' ),
                'type'         => Controls_Manager::SLIDER,
                'size_units'   => [ 'px' ],
                'range'        => [
                    'px'       => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1
                    ]
                ],
                'default'      => [
                    'unit'     => 'px',
                    'size'     => 18
                ],
                'selectors'    => [
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content i' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content svg' => 'height: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'quik_theme_tooltip_type' => [ 'icon' ]
                ]
            ]
        );

		$this->add_responsive_control(
			'quik_theme_tooltip_content_width',
		    [
                'label' => __( 'Content Width', 'quiktheme-addons' ),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
		            'px'       => [
		                'min'  => 0,
		                'max'  => 1000,
		                'step' => 5
		            ],
		            '%'        => [
		                'min'  => 0,
		                'max'  => 100,
                        'step' => 1
		            ]
                ],
                'size_units' => [ 'px', '%' ],
                'default'    => [
                    'unit'   => 'px',
                    'size'   => 150
                ],
		        'selectors'  => [
		            '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content' => 'width: {{SIZE}}{{UNIT}};'
		        ]
		    ]
		);

		$this->add_responsive_control(
			'quik_theme_tooltip_content_padding',
			[
                'label'      => esc_html__( 'Padding', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'    => [
                    'top'    => 20,
                    'right'  => 20,
                    'bottom' => 20,
                    'left'   => 20
                ],
				'selectors'  => [
	 				'{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
	 			]
			]
		);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'quik_theme_tooltip_hover_border',
                'selector' => '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content'
            ]
        );


        $this->add_responsive_control(
            'quik_theme_tooltip_content_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'    => [
                    'top'    => 4,
                    'right'  => 4,
                    'bottom' => 4,
                    'left'   => 4
                ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->start_controls_tabs( 'quik_theme_tooltip_content_style_tabs' );
			// Normal State Tab
			$this->start_controls_tab( 'quik_theme_tooltip_content_normal', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' ) ] );

				$this->add_control(
					'quik_theme_tooltip_content_color',
					[
                        'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => $quik_theme_primary_color,
                        'condition' => [
                            'quik_theme_tooltip_type!' => [ 'image' ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content, 
                            {{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content a' => 'color: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content svg path' => 'fill: {{VALUE}};'
						]
					]
                );

				$this->add_control(
					'quik_theme_tooltip_content_bg_color',
					[
                        'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#f9f9f9',
                        'selectors' => [
							'{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content' => 'background-color: {{VALUE}};'
						]
					]
				);

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'quik_theme_tooltip_content_shadow',
                        'selector' => '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content'
                    ]
                );

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'quik_theme_tooltip_content_hover', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );

				$this->add_control(
					'quik_theme_tooltip_content_hover_color',
					[
                        'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'condition' => [
                            'quik_theme_tooltip_type!' => [ 'image' ]
                        ],
                        'default'   => '#212121',
                        'selectors' => [
                            '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content:hover'   => 'color: {{VALUE}};',
                            '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content a:hover' => 'color: {{VALUE}};'
						]
					]
                );

				$this->add_control(
					'quik_theme_tooltip_content_hover_bg_color',
					[
                        'label'     => esc_html__( 'Background Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#f9f9f9',
                        'selectors' => [
							'{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content:hover' => 'background-color: {{VALUE}};'
						]
					]
				);

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'quik_theme_tooltip_hover_shadow',
                        'selector' => '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-content:hover'
                    ]
                );

			$this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Tooltip Style tab section
        $this->start_controls_section(
            'quik_theme_tooltip_style_section',
            [
                'label' => __( 'Tooltip Styles', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'hover_tooltip_content_typography',
                'selector' => '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-text'
            ]
        );

        $this->add_control(
            'quik_theme_tooltip_style_color',
            [
                'label'     => __( 'Text Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-item .quiktheme-tooltip-text' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'hover_tooltip_content_background',
                'types'    => [ 'classic', 'gradient' ],
                'fields_options'  => [
                    'background'  => [
                        'default' => 'classic'
                    ],
                    'color'       => [
                        'default' => $quik_theme_primary_color
                    ]
                ],
                'selector' => '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-text'
            ]
        );

        $this->add_responsive_control(
			'quik_theme_tooltip_text_width',
		    [
                'label' => __( 'Tooltip Width', 'quiktheme-addons' ),
                'type'  => Controls_Manager::SLIDER,
                'range' => [
		            'px'       => [
		                'min'  => 0,
		                'max'  => 1000,
		                'step' => 5
		            ],
		            '%'        => [
		                'min'  => 0,
		                'max'  => 100
		            ]
		        ],
                'size_units'   => [ 'px', '%' ],
                'default'      => [
                    'unit'     => 'px',
                    'size'     => 200
                ],
		        'selectors'    => [
		            '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-text' => 'width: {{SIZE}}{{UNIT}};'
		        ]
		    ]
		);

        $this->add_responsive_control(
            'quik_theme_tooltip_text_padding',
            [
                'label'      => __( 'Padding', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'    => 10,
                    'right'  => 10,
                    'bottom' => 10,
                    'left'   => 10
                ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'separator'  =>'before'
            ]
        );

        $this->add_responsive_control(
            'quik_theme_tooltip_content_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'    => [
                    'top'    => 4,
                    'right'  => 4,
                    'bottom' => 4,
                    'left'   => 4
                ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-text' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px !important;'
                ]
            ]
        );

        $this->add_control(
            'quik_theme_tooltip_arrow_color',
            [
                'label'     => __( 'Arrow Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => $quik_theme_primary_color,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-item.tooltip-top .quiktheme-tooltip-text:after' => 'border-color: {{VALUE}} transparent transparent transparent;',
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-item.tooltip-left .quiktheme-tooltip-text:after' => 'border-color: transparent transparent transparent {{VALUE}};',
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-item.tooltip-bottom .quiktheme-tooltip-text:after' => 'border-color: transparent transparent {{VALUE}} transparent;',
                    '{{WRAPPER}} .quiktheme-tooltip .quiktheme-tooltip-item.tooltip-right .quiktheme-tooltip-text:after' => 'border-color: transparent {{VALUE}} transparent transparent;'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings        = $this->get_settings_for_display();

        $this->add_render_attribute( 'quik_theme_tooltip_wrapper', 'class', 'quiktheme-tooltip' );

        if( isset( $settings['quik_theme_tooltip_link']['url'] ) ) {
            $this->add_render_attribute( 'quik_theme_tooltip_link', 'href', esc_url( $settings['quik_theme_tooltip_link']['url'] ) );
            if( $settings['quik_theme_tooltip_link']['is_external'] ) {
                $this->add_render_attribute( 'quik_theme_tooltip_link', 'target', '_blank' );
            }
            if( $settings['quik_theme_tooltip_link']['nofollow'] ) {
                $this->add_render_attribute( 'quik_theme_tooltip_link', 'rel', 'nofollow' );
            }
        }

        $this->add_inline_editing_attributes( 'quik_theme_tooltip_content', 'basic' );

        ?>

        <div <?php echo $this->get_render_attribute_string( 'quik_theme_tooltip_wrapper' ); ?>>
            <div class="quiktheme-tooltip-item <?php echo esc_attr( $settings['quik_theme_tooltip_direction'] ); ?>">
                <div class="quiktheme-tooltip-content">

                    <?php if( 'yes' === $settings['quik_theme_tooltip_enable_link'] && !empty( $settings['quik_theme_tooltip_link']['url'] ) ) : ?>
                        <a <?php echo $this->get_render_attribute_string( 'quik_theme_tooltip_link' ); ?>>
                    <?php endif; ?>

                    <?php if( 'text' === $settings['quik_theme_tooltip_type'] && !empty( $settings['quik_theme_tooltip_content'] ) ) : ?>
                        <span <?php echo $this->get_render_attribute_string( 'quik_theme_tooltip_content' ); ?>><?php echo wp_kses_post( $settings['quik_theme_tooltip_content'] ); ?></span>';

                    <?php elseif( 'icon' === $settings['quik_theme_tooltip_type'] && !empty( $settings['quik_theme_tooltip_icon_content']['value'] ) ) : ?>
                        <?php Icons_Manager::render_icon( $settings['quik_theme_tooltip_icon_content'] ); ?>

                    <?php elseif( 'image' === $settings['quik_theme_tooltip_type'] && !empty( $settings['quik_theme_tooltip_img_content']['url'] ) ) : ?>
                        <?php if ( $settings['quik_theme_tooltip_img_content']['url'] || $settings['quik_theme_tooltip_img_content']['id'] ) { ?>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'quik_theme_tooltip_image_size', 'quik_theme_tooltip_img_content' ); ?>
                        <?php } ?>
                    <?php endif; ?>

                    <?php if( 'yes' === $settings['quik_theme_tooltip_enable_link'] && !empty( $settings['quik_theme_tooltip_link']['url'] ) ) : ?>
                        </a>
                    <?php endif; ?>

                </div>

                <?php $settings['quik_theme_tooltip_text'] ? printf( '<div class="quiktheme-tooltip-text">%s</div>', wp_kses_post( $settings['quik_theme_tooltip_text'] ) ) : ''; ?>
            </div>
        </div>
        <?php
    }
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Tooltip() );