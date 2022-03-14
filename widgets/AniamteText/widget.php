<?php
namespace Quiktheme\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class Quik_Theme_Animated_Text extends Widget_Base {

	public function get_name() {
		return 'quiktheme-animated';
	}

	public function get_title() {
		return esc_html__( 'Animated Text', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-type';
	}

   	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
        return [ 'quiktheme-addons', 'fancy', 'heading', 'animate', 'animation' ];
    }

 	public function get_script_depends() {
		return [ 'quiktheme-animated-text' ];
	}

	protected function _register_controls() {

	    /*
	    * Animated Text Content
	    */
	    $this->start_controls_section(
	        'quik_theme_section_animated_text_content',
	        [
	            'label' => esc_html__( 'Content', 'quiktheme-addons' )
	        ]
		);

		$this->add_control(
	        'quik_theme_animated_text_before_text',
	        [
				'label'   => esc_html__( 'Before Text', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is', 'quiktheme-addons' ),
				'dynamic'     => [ 'active' => true ],
	        ]
		);

		$this->add_control(
			'quik_theme_animated_text_animated_heading',
			[
				'label'       => esc_html__( 'Animated Text', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your animated text with comma separated.', 'quiktheme-addons' ),
				'description' => __( '<b>Write animated heading with comma separated. Example: Exclusive, Addons, Elementor</b>', 'quiktheme-addons' ),
				'default'     => esc_html__( 'Quiktheme, Addons, Elementor', 'quiktheme-addons' ),
				'dynamic'     => [ 'active' => true ]
			]
		);

		$this->add_control(
	        'quik_theme_animated_text_after_text',
	        [
				'label'   => esc_html__( 'After Text', 'quiktheme-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'For You.', 'quiktheme-addons' ),
				'dynamic'     => [ 'active' => true ],
	        ]
		);

		$this->add_control(
			'quik_theme_animated_text_animated_heading_tag',
			[
				'label'   => esc_html__( 'HTML Tag', 'quiktheme-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'h3',
				'toggle'  => false,
				'options' => [
					'h1'  => [
						'title' => __( 'H1', 'quiktheme-addons' ),
						'icon'  => 'eicon-editor-h1'
					],
					'h2'  => [
						'title' => __( 'H2', 'quiktheme-addons' ),
						'icon'  => 'eicon-editor-h2'
					],
					'h3'  => [
						'title' => __( 'H3', 'quiktheme-addons' ),
						'icon'  => 'eicon-editor-h3'
					],
					'h4'  => [
						'title' => __( 'H4', 'quiktheme-addons' ),
						'icon'  => 'eicon-editor-h4'
					],
					'h5'  => [
						'title' => __( 'H5', 'quiktheme-addons' ),
						'icon'  => 'eicon-editor-h5'
					],
					'h6'  => [
						'title' => __( 'H6', 'quiktheme-addons' ),
						'icon'  => 'eicon-editor-h6'
					]
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_animated_heading_alignment',
			[
				'label'   => esc_html__( 'Alignment', 'quiktheme-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'toggle'  => true,
				'options' => [
					'left'   => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center' => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'right'  => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'default' => 'left',
				'selectors'     => [
                    '{{WRAPPER}} .quiktheme-animated-text-align' => 'text-align: {{VALUE}};'
                ]

			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text Container Style
	    */
	    $this->start_controls_section(
	        'quik_theme_section_animated_text_animation_tyle',
	        [
				'label' => esc_html__( 'Animation', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_control(
			'quik_theme_animated_text_animated_heading_animated_type',
			[
				'label'   => esc_html__( 'Animation Type', 'quiktheme-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'quiktheme-typed-animation',
				'options' => [
					'quiktheme-typed-animation'   => __( 'Typed', 'quiktheme-addons' ),
					'quiktheme-morphed-animation' => __( 'Animate', 'quiktheme-addons' )
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_animated_heading_animation_style',
			[
				'label'   => esc_html__( 'Animation Style', 'quiktheme-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'fadeIn',
				'options' => [
					'fadeIn'            => __( 'Fade In', 'quiktheme-addons' ),
					'fadeInUp'          => __( 'Fade In Up', 'quiktheme-addons' ),
					'fadeInDown'        => __( 'Fade In Down', 'quiktheme-addons' ),
					'fadeInLeft'        => __( 'Fade In Left', 'quiktheme-addons' ),
					'fadeInRight'       => __( 'Fade In Right', 'quiktheme-addons' ),
					'zoomIn'            => __( 'Zoom In', 'quiktheme-addons' ),
					'zoomInUp'          => __( 'Zoom In Up', 'quiktheme-addons' ),
					'zoomInDown'        => __( 'Zoom In Down', 'quiktheme-addons' ),
					'zoomInLeft'        => __( 'Zoom In Left', 'quiktheme-addons' ),
					'zoomInRight'       => __( 'Zoom In Right', 'quiktheme-addons' ),
					'slideInDown'       => __( 'Slide In Down', 'quiktheme-addons' ),
					'slideInUp'         => __( 'Slide In Up', 'quiktheme-addons' ),
					'slideInLeft'       => __( 'Slide In Left', 'quiktheme-addons' ),
					'slideInRight'      => __( 'Slide In Right', 'quiktheme-addons' ),
					'bounce'            => __( 'Bounce', 'quiktheme-addons' ),
					'bounceIn'          => __( 'Bounce In', 'quiktheme-addons' ),
					'bounceInUp'        => __( 'Bounce In Up', 'quiktheme-addons' ),
					'bounceInDown'      => __( 'Bounce In Down', 'quiktheme-addons' ),
					'bounceInLeft'      => __( 'Bounce In Left', 'quiktheme-addons' ),
					'bounceInRight'     => __( 'Bounce In Right', 'quiktheme-addons' ),
					'flash'             => __( 'Flash', 'quiktheme-addons' ),
					'pulse'             => __( 'Pulse', 'quiktheme-addons' ),
					'rotateIn'          => __( 'Rotate In', 'quiktheme-addons' ),
					'rotateInDownLeft'  => __( 'Rotate In Down Left', 'quiktheme-addons' ),
					'rotateInDownRight' => __( 'Rotate In Down Right', 'quiktheme-addons' ),
					'rotateInUpRight'   => __( 'rotate In Up Right', 'quiktheme-addons' ),
					'rotateIn'          => __( 'Rotate In', 'quiktheme-addons' ),
					'rollIn'            => __( 'Roll In', 'quiktheme-addons' ),
					'lightSpeedIn'      => __( 'Light Speed In', 'quiktheme-addons' )
				],
				'condition' => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-morphed-animation'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text Settings
	    */
	    $this->start_controls_section(
	        'quik_theme_section_animated_text_settings',
	        [
				'label' => esc_html__( 'Settings', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_control(
			'quik_theme_animated_text_animation_speed',
			[
				'label'     => __( 'Animation Speed', 'quiktheme-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 100,
				'max'       => 10000,
				'condition' => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-morphed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_type_speed',
			[
				'label'   => __( 'Type Speed', 'quiktheme-addons' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 60,
				'min'     => 10,
				'max'     => 200,
				'step'    => 10,
				'condition' => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_start_delay',
			[
				'label'     => __( 'Start Delay', 'quiktheme-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 1000,
				'max'       => 10000,
				'condition' => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_back_type_speed',
			[
				'label'     => __( 'Back Type Speed', 'quiktheme-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 60,
				'min'       => 10,
				'max'       => 200,
				'step'      => 10,
				'condition' => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_back_delay',
			[
				'label'     => __( 'Back Delay', 'quiktheme-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 1000,
				'max'       => 10000,
				'condition' => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_loop',
			[
				'label'        => __( 'Loop', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'quiktheme-addons' ),
				'label_off'    => __( 'OFF', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_show_cursor',
			[
				'label'        => __( 'Show Cursor', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'quiktheme-addons' ),
				'label_off'    => __( 'OFF', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_fade_out',
			[
				'label'        => __( 'Fade Out', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'quiktheme-addons' ),
				'label_off'    => __( 'OFF', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_smart_backspace',
			[
				'label'        => __( 'Smart Backspace', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'quiktheme-addons' ),
				'label_off'    => __( 'OFF', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'quik_theme_animated_text_animated_heading_animated_type' => 'quiktheme-typed-animation'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text pre animated Text Style
		*/
	    $this->start_controls_section(
	        'quik_theme_pre_animated_text_style',
	        [
				'label'     => esc_html__( 'Pre Animated text', 'quiktheme-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'quik_theme_animated_text_before_text!' => ''
				]
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'quik_theme_pre_animated_text_typography',
				'fields_options'   => [
		            'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 30
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ],
				'selector' => '{{WRAPPER}} .quiktheme-animated-text-pre-heading',
			]
		);

		$this->add_control(
			'quik_theme_pre_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-animated-text-pre-heading' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text animated Text Style
	    */
	    $this->start_controls_section(
	        'quik_theme_animated_text_style',
	        [
				'label' => esc_html__( 'Animated text', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'quik_theme_animated_text_typography',
				'fields_options'   => [
		            'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 30
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ],
				'selector' => '{{WRAPPER}} .quiktheme-animated-text-animated-heading, {{WRAPPER}} span.typed-cursor'
			]
		);

		$this->add_control(
			'quik_theme_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-animated-text-animated-heading, {{WRAPPER}} span.typed-cursor' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'quik_theme_animated_text_spacing',
			[
				'label'      => __( 'Spacing', 'quiktheme-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'default'    => [
                    'unit'   => 'px',
                    'size'   => 8
                ],
				'range'      => [
					'px'     => [
						'min' => 0,
						'max' => 50
					]
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-animated-text-animated-heading' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text post animated Text Style
	    */
	    $this->start_controls_section(
	        'quik_theme_post_animated_text_style',
	        [
				'label'     => esc_html__( 'Post Animated text', 'quiktheme-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'quik_theme_animated_text_after_text!' => ''
				]
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'quik_theme_post_animated_text_typography',
				'fields_options'   => [
		            'font_size'    => [
		                'default'  => [
		                    'unit' => 'px',
		                    'size' => 30
		                ]
		            ],
		            'font_weight'  => [
		                'default'  => '600'
		            ]
	            ],
				'selector' => '{{WRAPPER}} .quiktheme-animated-text-post-heading'
			]
		);

		$this->add_control(
			'quik_theme_post_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-animated-text-post-heading' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings      = $this->get_settings_for_display();

		$id            = substr( $this->get_id_int(), 0, 3 );

		$type_heading  = explode( ',', $settings['quik_theme_animated_text_animated_heading'] );
		$before_text   = $settings['quik_theme_animated_text_before_text'];
		$heading_text  = $settings['quik_theme_animated_text_animated_heading'];
		$after_text    = $settings['quik_theme_animated_text_after_text'];
		$heading_tag   = $settings['quik_theme_animated_text_animated_heading_tag'];
		$heading_align = $settings['quik_theme_animated_text_animated_heading_alignment'];

		$this->add_render_attribute( 'quik_theme_typed_animated_string', 'class', 'quiktheme-typed-strings' );
		$this->add_render_attribute( 'quik_theme_typed_animated_string',
			[
				'data-type_string'       => esc_attr(json_encode($type_heading)),
				'data-heading_animation' => esc_attr( $settings['quik_theme_animated_text_animated_heading_animated_type'] )
			]
		);

		if($settings['quik_theme_animated_text_animated_heading_animated_type'] === 'quiktheme-typed-animation'){
			$this->add_render_attribute( 'quik_theme_typed_animated_string',
				[
					'data-type_speed'      => esc_attr( $settings['quik_theme_animated_text_type_speed'] ),
					'data-back_type_speed' => esc_attr( $settings['quik_theme_animated_text_back_type_speed'] ),
					'data-loop'            => esc_attr( $settings['quik_theme_animated_text_loop'] ),
					'data-show_cursor'     => esc_attr( $settings['quik_theme_animated_text_show_cursor'] ),
					'data-fade_out'        => esc_attr( $settings['quik_theme_animated_text_fade_out'] ),
					'data-smart_backspace' => esc_attr( $settings['quik_theme_animated_text_smart_backspace'] ),
					'data-start_delay'     => esc_attr( $settings['quik_theme_animated_text_start_delay'] ),
					'data-back_delay'      => esc_attr( $settings['quik_theme_animated_text_back_delay'] )
				]
			);
		}

		if($settings['quik_theme_animated_text_animated_heading_animated_type'] === 'quiktheme-morphed-animation'){
			$this->add_render_attribute( 'quik_theme_typed_animated_string',
				[
					'data-animation_style' => esc_attr( $settings['quik_theme_animated_text_animated_heading_animation_style'] ),
					'data-animation_speed' => esc_attr( $settings['quik_theme_animated_text_animation_speed'] )
				]
			);
		}

		$this->add_render_attribute( 'quik_theme_animated_text_animated_heading',
			[
				'id'    => 'quiktheme-animated-text-'.$id,
				'class' => 'quiktheme-animated-text-animated-heading'
			]
		);

		$this->add_render_attribute( 'quik_theme_animated_text_before_text', 'class', 'quiktheme-animated-text-pre-heading' );
        $this->add_inline_editing_attributes( 'quik_theme_animated_text_before_text' );

		$this->add_render_attribute( 'quik_theme_animated_text_after_text', 'class', 'quiktheme-animated-text-post-heading' );
        $this->add_inline_editing_attributes( 'quik_theme_animated_text_after_text' );

		echo '<div class="quiktheme-animated-text-align">';

			do_action( 'quik_theme_animated_text_wrapper_before' );

			echo '<'.esc_attr($heading_tag).' '.$this->get_render_attribute_string( 'quik_theme_typed_animated_string' ).'>';

				do_action( 'quik_theme_animated_text_content_before' );

				$before_text ? printf( '<span '.$this->get_render_attribute_string( 'quik_theme_animated_text_before_text' ).'>%s</span>', wp_kses_post($before_text) ) : '';

				if( 'quiktheme-typed-animation' === $settings['quik_theme_animated_text_animated_heading_animated_type'] ) {
					echo '<span id="quiktheme-animated-text-'.esc_attr($id).'" class="quiktheme-animated-text-animated-heading"></span>';
				}

				if( 'quiktheme-morphed-animation' === $settings['quik_theme_animated_text_animated_heading_animated_type'] ) {
					echo '<span '.$this->get_render_attribute_string( 'quik_theme_animated_text_animated_heading' ).'>'.wp_kses_post($heading_text).'</span>';
				}

				$after_text ? printf( '<span '.$this->get_render_attribute_string( 'quik_theme_animated_text_after_text' ).'>%s</span>', wp_kses_post($after_text) ) : '';

				do_action( 'quik_theme_animated_text_content_after' );

			echo '</'.esc_attr($heading_tag).'>';

			do_action( 'quik_theme_animated_text_wrapper_after' );

		echo '</div>';
	}
}
$widgets_manager->register_widget_type(new \Quiktheme\Widgets\Elementor\Quik_Theme_Animated_Text());