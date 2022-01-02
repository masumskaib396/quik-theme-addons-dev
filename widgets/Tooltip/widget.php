<?php
namespace Finest_Addons\Widgets;

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

class Finest_Tooltip extends Widget_Base {

    public function get_name() {
        return 'finest-tooltip';
    }

    public function get_title() {
        return __( 'Tooltip', 'finest-addons' );
    }

    public function get_icon() {
        return 'eicon-animated-headline';
    }


    public function get_keywords() {
        return [ 'finest', 'hover', 'title', 'tooltip', 'ticker' ];
    }

    public function get_categories() {
        return [ 'finest-addons' ];
    }

    protected function register_controls() {
        $finest_primary_color = get_option( 'finest_primary_color_option', '#7a56ff' );

        $this->start_controls_section(
            'tooltip_button_content',
            [
                'label' => __( 'Content Settings', 'finest-addons' )
            ]
        );

        $this->add_control(
			'finest_tooltip_type',
			[
                'label'       => esc_html__( 'Content Type', 'finest-addons' ),
                'type'        => Controls_Manager::CHOOSE,
                'toggle'      => false,
                'label_block' => true,
                'options'     => [
					'icon'      => [
						'title' => esc_html__( 'Icon', 'finest-addons' ),
						'icon'  => 'eicon-info-circle'
					],
					'text'      => [
						'title' => esc_html__( 'Text', 'finest-addons' ),
						'icon'  => 'eicon-text-area'
					],
					'image'     => [
						'title' => esc_html__( 'Image', 'finest-addons' ),
						'icon'  => 'eicon-image-bold'
					]
				],
				'default'     => 'icon'
			]
		);

  		$this->add_control(
			'finest_tooltip_content',
			[
                'label'       => esc_html__( 'Content', 'finest-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'Hover Me!', 'finest-addons' ),
                'condition'   => [
					'finest_tooltip_type' => [ 'text' ]
				]
			]
        );

		$this->add_control(
			'finest_tooltip_icon_content',
			[
                'label'       => esc_html__( 'Icon', 'finest-addons' ),
                'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fab fa-linux',
                    'library' => 'fa-brands'
                ],
                'condition'   => [
					'finest_tooltip_type' => [ 'icon' ]
				]
			]
		);

		$this->add_control(
			'finest_tooltip_img_content',
			[
                'label'     => esc_html__( 'Image', 'finest-addons' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
					'url'   => Utils::get_placeholder_image_src()
				],
                'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'finest_tooltip_type' => [ 'image' ]
				]
			]
		);

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'finest_tooltip_image_size',
                'default'   => 'thumbnail',
                'condition' => [
                    'finest_tooltip_type'              => [ 'image' ],
                    'finest_tooltip_img_content[url]!' => ''
                ]
            ]
        );

        $this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'finest_tooltip_image_css_filter',
                'selector' => '{{WRAPPER}} .finest-tooltip .finest-tooltip-content img',
                'condition' => [
                    'finest_tooltip_type' => [ 'image' ],
                    'finest_tooltip_img_content[url]!' => ''
				]
			]
		);

        $this->add_control(
            'tooltip_style_section_align',
            [
                'label'   => __( 'Alignment', 'finest-addons' ),
                'type'    => Controls_Manager::CHOOSE,
                'toggle'  => false,
                'options' => [
                    'left'      => [
                        'title' => __( 'Left', 'finest-addons' ),
                        'icon'  => 'eicon-text-align-left'
                    ],
                    'center'    => [
                        'title' => __( 'Center', 'finest-addons' ),
                        'icon'  => 'eicon-text-align-center'
                    ],
                    'right'     => [
                        'title' => __( 'Right', 'finest-addons' ),
                        'icon'  => 'eicon-text-align-right'
                    ]
                ],
                'default'       => 'center',
                'prefix_class'  => 'finest-tooltip-align-'
            ]
        );

        $this->add_control(
            'finest_tooltip_enable_link',
            [
                'label'        => __( 'Show Link', 'finest-addons' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'finest-addons' ),
                'label_off'    => __( 'Hide', 'finest-addons' ),
                'return_value' => 'yes',
                'default'      => 'no'
            ]
        );

        $this->add_control(
            'finest_tooltip_link',
            [
                'label'           => __( 'Link', 'finest-addons' ),
                'type'            => Controls_Manager::URL,
                'placeholder'     => __( 'https://your-link.com', 'finest-addons' ),
                'show_external'   => true,
                'default'         => [
                    'url'         => '',
                    'is_external' => true
                ],
                'condition'       => [
                    'finest_tooltip_enable_link'=>'yes'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'tooltip_options',
            [
                'label' => __( 'Tooltip Options', 'finest-addons' )
            ]
        );

        $this->add_control(
            'finest_tooltip_text',
            [
                'label'       => esc_html__( 'Tooltip Text', 'finest-addons' ),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'     => esc_html__( 'These are some dummy tooltip contents.', 'finest-addons' ),
                'dynamic'     => [ 'active' => true ]
            ]
        );

        $this->add_control(
          'finest_tooltip_direction',
            [
                'label'         => esc_html__( 'Direction', 'finest-addons' ),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'tooltip-right',
                'label_block'   => false,
                'options'       => [
                    'tooltip-left'   => esc_html__( 'Left', 'finest-addons' ),
                    'tooltip-right'  => esc_html__( 'Right', 'finest-addons' ),
                    'tooltip-top'    => esc_html__( 'Top', 'finest-addons' ),
                    'tooltip-bottom' => esc_html__( 'Bottom', 'finest-addons' )
                ]
            ]
        );

        $this->end_controls_section();

        // Style tab section
        $this->start_controls_section(
            'tooltip_style_section',
            [
                'label' => __( 'General Styles', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'label'     => __( 'Text Typography', 'finest-addons' ),
                'name'      => 'finest_tooltip_button_text_typography',
                'selector'  => '{{WRAPPER}} .finest-tooltip .finest-tooltip-content',
                'condition' => [
                    'finest_tooltip_type' => [ 'text' ]
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_tooltip_button_icon_size',
            [
                'label'        => __( 'Icon Size', 'finest-addons' ),
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
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-content i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'finest_tooltip_type' => [ 'icon' ]
                ]
            ]
        );

		$this->add_responsive_control(
			'finest_tooltip_content_width',
		    [
                'label' => __( 'Content Width', 'finest-addons' ),
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
		            '{{WRAPPER}} .finest-tooltip .finest-tooltip-content' => 'width: {{SIZE}}{{UNIT}};'
		        ]
		    ]
		);

		$this->add_responsive_control(
			'finest_tooltip_content_padding',
			[
                'label'      => esc_html__( 'Padding', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'    => [
                    'top'    => 20,
                    'right'  => 20,
                    'bottom' => 20,
                    'left'   => 20
                ],
				'selectors'  => [
	 				'{{WRAPPER}} .finest-tooltip .finest-tooltip-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
	 			]
			]
		);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'finest_tooltip_hover_border',
                'selector' => '{{WRAPPER}} .finest-tooltip .finest-tooltip-content'
            ]
        );


        $this->add_responsive_control(
            'finest_tooltip_content_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'default'    => [
                    'top'    => 4,
                    'right'  => 4,
                    'bottom' => 4,
                    'left'   => 4
                ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

		$this->start_controls_tabs( 'finest_tooltip_content_style_tabs' );
			// Normal State Tab
			$this->start_controls_tab( 'finest_tooltip_content_normal', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

				$this->add_control(
					'finest_tooltip_content_color',
					[
                        'label'     => esc_html__( 'Color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => $finest_primary_color,
                        'condition' => [
                            'finest_tooltip_type!' => [ 'image' ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .finest-tooltip .finest-tooltip-content, {{WRAPPER}} .finest-tooltip .finest-tooltip-content a' => 'color: {{VALUE}};'
						]
					]
                );

				$this->add_control(
					'finest_tooltip_content_bg_color',
					[
                        'label'     => esc_html__( 'Background Color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#f9f9f9',
                        'selectors' => [
							'{{WRAPPER}} .finest-tooltip .finest-tooltip-content' => 'background-color: {{VALUE}};'
						]
					]
				);

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'finest_tooltip_content_shadow',
                        'selector' => '{{WRAPPER}} .finest-tooltip .finest-tooltip-content'
                    ]
                );

			$this->end_controls_tab();

			// Hover State Tab
			$this->start_controls_tab( 'finest_tooltip_content_hover', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

				$this->add_control(
					'finest_tooltip_content_hover_color',
					[
                        'label'     => esc_html__( 'Color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'condition' => [
                            'finest_tooltip_type!' => [ 'image' ]
                        ],
                        'default'   => '#212121',
                        'selectors' => [
                            '{{WRAPPER}} .finest-tooltip .finest-tooltip-content:hover'   => 'color: {{VALUE}};',
                            '{{WRAPPER}} .finest-tooltip .finest-tooltip-content a:hover' => 'color: {{VALUE}};'
						]
					]
                );

				$this->add_control(
					'finest_tooltip_content_hover_bg_color',
					[
                        'label'     => esc_html__( 'Background Color', 'finest-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'default'   => '#f9f9f9',
                        'selectors' => [
							'{{WRAPPER}} .finest-tooltip .finest-tooltip-content:hover' => 'background-color: {{VALUE}};'
						]
					]
				);

                $this->add_group_control(
                    Group_Control_Box_Shadow::get_type(),
                    [
                        'name'     => 'finest_tooltip_hover_shadow',
                        'selector' => '{{WRAPPER}} .finest-tooltip .finest-tooltip-content:hover'
                    ]
                );

			$this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Tooltip Style tab section
        $this->start_controls_section(
            'finest_tooltip_style_section',
            [
                'label' => __( 'Tooltip Styles', 'finest-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'hover_tooltip_content_typography',
                'selector' => '{{WRAPPER}} .finest-tooltip .finest-tooltip-text'
            ]
        );

        $this->add_control(
            'finest_tooltip_style_color',
            [
                'label'     => __( 'Text Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-item .finest-tooltip-text' => 'color: {{VALUE}};'
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
                        'default' => $finest_primary_color
                    ]
                ],
                'selector' => '{{WRAPPER}} .finest-tooltip .finest-tooltip-text'
            ]
        );

        $this->add_responsive_control(
			'finest_tooltip_text_width',
		    [
                'label' => __( 'Tooltip Width', 'finest-addons' ),
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
		            '{{WRAPPER}} .finest-tooltip .finest-tooltip-text' => 'width: {{SIZE}}{{UNIT}};'
		        ]
		    ]
		);

        $this->add_responsive_control(
            'finest_tooltip_text_padding',
            [
                'label'      => __( 'Padding', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'default'    => [
                    'top'    => 10,
                    'right'  => 10,
                    'bottom' => 10,
                    'left'   => 10
                ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
                'separator'  =>'before'
            ]
        );

        $this->add_responsive_control(
            'finest_tooltip_content_border_radius',
            [
                'label'      => esc_html__( 'Border Radius', 'finest-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'default'    => [
                    'top'    => 4,
                    'right'  => 4,
                    'bottom' => 4,
                    'left'   => 4
                ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-text' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px !important;'
                ]
            ]
        );

        $this->add_control(
            'finest_tooltip_arrow_color',
            [
                'label'     => __( 'Arrow Color', 'finest-addons' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => $finest_primary_color,
                'selectors' => [
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-item.tooltip-top .finest-tooltip-text:after' => 'border-color: {{VALUE}} transparent transparent transparent;',
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-item.tooltip-left .finest-tooltip-text:after' => 'border-color: transparent transparent transparent {{VALUE}};',
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-item.tooltip-bottom .finest-tooltip-text:after' => 'border-color: transparent transparent {{VALUE}} transparent;',
                    '{{WRAPPER}} .finest-tooltip .finest-tooltip-item.tooltip-right .finest-tooltip-text:after' => 'border-color: transparent {{VALUE}} transparent transparent;'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function render() {

        $settings        = $this->get_settings_for_display();

        $this->add_render_attribute( 'finest_tooltip_wrapper', 'class', 'finest-tooltip' );

        if( isset( $settings['finest_tooltip_link']['url'] ) ) {
            $this->add_render_attribute( 'finest_tooltip_link', 'href', esc_url( $settings['finest_tooltip_link']['url'] ) );
            if( $settings['finest_tooltip_link']['is_external'] ) {
                $this->add_render_attribute( 'finest_tooltip_link', 'target', '_blank' );
            }
            if( $settings['finest_tooltip_link']['nofollow'] ) {
                $this->add_render_attribute( 'finest_tooltip_link', 'rel', 'nofollow' );
            }
        }

        $this->add_inline_editing_attributes( 'finest_tooltip_content', 'basic' );

        ?>

        <div <?php echo $this->get_render_attribute_string( 'finest_tooltip_wrapper' ); ?>>
            <div class="finest-tooltip-item <?php echo esc_attr( $settings['finest_tooltip_direction'] ); ?>">
                <div class="finest-tooltip-content">

                    <?php if( 'yes' === $settings['finest_tooltip_enable_link'] && !empty( $settings['finest_tooltip_link']['url'] ) ) : ?>
                        <a <?php echo $this->get_render_attribute_string( 'finest_tooltip_link' ); ?>>
                    <?php endif; ?>

                    <?php if( 'text' === $settings['finest_tooltip_type'] && !empty( $settings['finest_tooltip_content'] ) ) : ?>
                        <span <?php echo $this->get_render_attribute_string( 'finest_tooltip_content' ); ?>><?php echo wp_kses_post( $settings['finest_tooltip_content'] ); ?></span>';

                    <?php elseif( 'icon' === $settings['finest_tooltip_type'] && !empty( $settings['finest_tooltip_icon_content']['value'] ) ) : ?>
                        <?php Icons_Manager::render_icon( $settings['finest_tooltip_icon_content'] ); ?>

                    <?php elseif( 'image' === $settings['finest_tooltip_type'] && !empty( $settings['finest_tooltip_img_content']['url'] ) ) : ?>
                        <?php if ( $settings['finest_tooltip_img_content']['url'] || $settings['finest_tooltip_img_content']['id'] ) { ?>
                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'finest_tooltip_image_size', 'finest_tooltip_img_content' ); ?>
                        <?php } ?>
                    <?php endif; ?>

                    <?php if( 'yes' === $settings['finest_tooltip_enable_link'] && !empty( $settings['finest_tooltip_link']['url'] ) ) : ?>
                        </a>
                    <?php endif; ?>

                </div>

                <?php $settings['finest_tooltip_text'] ? printf( '<div class="finest-tooltip-text">%s</div>', wp_kses_post( $settings['finest_tooltip_text'] ) ) : ''; ?>
            </div>
        </div>
        <?php
    }
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Tooltip() );