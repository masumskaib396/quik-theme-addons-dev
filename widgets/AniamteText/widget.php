<?php
namespace Finest\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Widget_Base;

class Finest_Animated_Text extends Widget_Base {

	public function get_name() {
		return 'finest-animated';
	}

	public function get_title() {
		return esc_html__( 'Animated Text', 'finest-addons' );
	}

	public function get_icon() {
		return 'eicon-animated-headline';
	}

   	public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
        return [ 'finest-addons', 'fancy', 'heading', 'animate', 'animation' ];
    }

 	public function get_script_depends() {
		return [ 'finest-animated-text' ];
	}

	protected function _register_controls() {

	    /*
	    * Animated Text Content
	    */
	    $this->start_controls_section(
	        'finest_section_animated_text_content',
	        [
	            'label' => esc_html__( 'Content', 'finest-addons' )
	        ]
		);

		$this->add_control(
	        'finest_animated_text_before_text',
	        [
				'label'   => esc_html__( 'Before Text', 'finest-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'This is', 'finest-addons' ),
				'dynamic'     => [ 'active' => true ],
	        ]
		);

		$this->add_control(
			'finest_animated_text_animated_heading',
			[
				'label'       => esc_html__( 'Animated Text', 'finest-addons' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your animated text with comma separated.', 'finest-addons' ),
				'description' => __( '<b>Write animated heading with comma separated. Example: Exclusive, Addons, Elementor</b>', 'finest-addons' ),
				'default'     => esc_html__( 'Finest, Addons, Elementor', 'finest-addons' ),
				'dynamic'     => [ 'active' => true ]
			]
		);

		$this->add_control(
	        'finest_animated_text_after_text',
	        [
				'label'   => esc_html__( 'After Text', 'finest-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'For You.', 'finest-addons' ),
				'dynamic'     => [ 'active' => true ],
	        ]
		);

		$this->add_control(
			'finest_animated_text_animated_heading_tag',
			[
				'label'   => esc_html__( 'HTML Tag', 'finest-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'default' => 'h3',
				'toggle'  => false,
				'options' => [
					'h1'  => [
						'title' => __( 'H1', 'finest-addons' ),
						'icon'  => 'eicon-editor-h1'
					],
					'h2'  => [
						'title' => __( 'H2', 'finest-addons' ),
						'icon'  => 'eicon-editor-h2'
					],
					'h3'  => [
						'title' => __( 'H3', 'finest-addons' ),
						'icon'  => 'eicon-editor-h3'
					],
					'h4'  => [
						'title' => __( 'H4', 'finest-addons' ),
						'icon'  => 'eicon-editor-h4'
					],
					'h5'  => [
						'title' => __( 'H5', 'finest-addons' ),
						'icon'  => 'eicon-editor-h5'
					],
					'h6'  => [
						'title' => __( 'H6', 'finest-addons' ),
						'icon'  => 'eicon-editor-h6'
					]
				]
			]
		);

		$this->add_control(
			'finest_animated_text_animated_heading_alignment',
			[
				'label'   => esc_html__( 'Alignment', 'finest-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'toggle'  => true,
				'options' => [
					'left'   => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center' => [
						'title' => __( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'right'  => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'default' => 'left',
				'selectors'     => [
                    '{{WRAPPER}} .finest-animated-text-align' => 'text-align: {{VALUE}};'
                ]

			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text Container Style
	    */
	    $this->start_controls_section(
	        'finest_section_animated_text_animation_tyle',
	        [
				'label' => esc_html__( 'Animation', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_control(
			'finest_animated_text_animated_heading_animated_type',
			[
				'label'   => esc_html__( 'Animation Type', 'finest-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'finest-typed-animation',
				'options' => [
					'finest-typed-animation'   => __( 'Typed', 'finest-addons' ),
					'finest-morphed-animation' => __( 'Animate', 'finest-addons' )
				]
			]
		);

		$this->add_control(
			'finest_animated_text_animated_heading_animation_style',
			[
				'label'   => esc_html__( 'Animation Style', 'finest-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'fadeIn',
				'options' => [
					'fadeIn'            => __( 'Fade In', 'finest-addons' ),
					'fadeInUp'          => __( 'Fade In Up', 'finest-addons' ),
					'fadeInDown'        => __( 'Fade In Down', 'finest-addons' ),
					'fadeInLeft'        => __( 'Fade In Left', 'finest-addons' ),
					'fadeInRight'       => __( 'Fade In Right', 'finest-addons' ),
					'zoomIn'            => __( 'Zoom In', 'finest-addons' ),
					'zoomInUp'          => __( 'Zoom In Up', 'finest-addons' ),
					'zoomInDown'        => __( 'Zoom In Down', 'finest-addons' ),
					'zoomInLeft'        => __( 'Zoom In Left', 'finest-addons' ),
					'zoomInRight'       => __( 'Zoom In Right', 'finest-addons' ),
					'slideInDown'       => __( 'Slide In Down', 'finest-addons' ),
					'slideInUp'         => __( 'Slide In Up', 'finest-addons' ),
					'slideInLeft'       => __( 'Slide In Left', 'finest-addons' ),
					'slideInRight'      => __( 'Slide In Right', 'finest-addons' ),
					'bounce'            => __( 'Bounce', 'finest-addons' ),
					'bounceIn'          => __( 'Bounce In', 'finest-addons' ),
					'bounceInUp'        => __( 'Bounce In Up', 'finest-addons' ),
					'bounceInDown'      => __( 'Bounce In Down', 'finest-addons' ),
					'bounceInLeft'      => __( 'Bounce In Left', 'finest-addons' ),
					'bounceInRight'     => __( 'Bounce In Right', 'finest-addons' ),
					'flash'             => __( 'Flash', 'finest-addons' ),
					'pulse'             => __( 'Pulse', 'finest-addons' ),
					'rotateIn'          => __( 'Rotate In', 'finest-addons' ),
					'rotateInDownLeft'  => __( 'Rotate In Down Left', 'finest-addons' ),
					'rotateInDownRight' => __( 'Rotate In Down Right', 'finest-addons' ),
					'rotateInUpRight'   => __( 'rotate In Up Right', 'finest-addons' ),
					'rotateIn'          => __( 'Rotate In', 'finest-addons' ),
					'rollIn'            => __( 'Roll In', 'finest-addons' ),
					'lightSpeedIn'      => __( 'Light Speed In', 'finest-addons' )
				],
				'condition' => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-morphed-animation'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text Settings
	    */
	    $this->start_controls_section(
	        'finest_section_animated_text_settings',
	        [
				'label' => esc_html__( 'Settings', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_control(
			'finest_animated_text_animation_speed',
			[
				'label'     => __( 'Animation Speed', 'finest-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 100,
				'max'       => 10000,
				'condition' => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-morphed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_type_speed',
			[
				'label'   => __( 'Type Speed', 'finest-addons' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 60,
				'min'     => 10,
				'max'     => 200,
				'step'    => 10,
				'condition' => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_start_delay',
			[
				'label'     => __( 'Start Delay', 'finest-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 1000,
				'max'       => 10000,
				'condition' => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_back_type_speed',
			[
				'label'     => __( 'Back Type Speed', 'finest-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 60,
				'min'       => 10,
				'max'       => 200,
				'step'      => 10,
				'condition' => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_back_delay',
			[
				'label'     => __( 'Back Delay', 'finest-addons' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 1000,
				'min'       => 1000,
				'max'       => 10000,
				'condition' => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_loop',
			[
				'label'        => __( 'Loop', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'finest-addons' ),
				'label_off'    => __( 'OFF', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_show_cursor',
			[
				'label'        => __( 'Show Cursor', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'finest-addons' ),
				'label_off'    => __( 'OFF', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_fade_out',
			[
				'label'        => __( 'Fade Out', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'finest-addons' ),
				'label_off'    => __( 'OFF', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_smart_backspace',
			[
				'label'        => __( 'Smart Backspace', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'finest-addons' ),
				'label_off'    => __( 'OFF', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes',
				'condition'    => [
					'finest_animated_text_animated_heading_animated_type' => 'finest-typed-animation'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text pre animated Text Style
		*/
	    $this->start_controls_section(
	        'finest_pre_animated_text_style',
	        [
				'label'     => esc_html__( 'Pre Animated text', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'finest_animated_text_before_text!' => ''
				]
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'finest_pre_animated_text_typography',
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
				'selector' => '{{WRAPPER}} .finest-animated-text-pre-heading',
			]
		);

		$this->add_control(
			'finest_pre_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .finest-animated-text-pre-heading' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text animated Text Style
	    */
	    $this->start_controls_section(
	        'finest_animated_text_style',
	        [
				'label' => esc_html__( 'Animated text', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'finest_animated_text_typography',
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
				'selector' => '{{WRAPPER}} .finest-animated-text-animated-heading, {{WRAPPER}} span.typed-cursor'
			]
		);

		$this->add_control(
			'finest_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222',
				'selectors' => [
					'{{WRAPPER}} .finest-animated-text-animated-heading, {{WRAPPER}} span.typed-cursor' => 'color: {{VALUE}}'
				]
			]
		);

		$this->add_control(
			'finest_animated_text_spacing',
			[
				'label'      => __( 'Spacing', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-animated-text-animated-heading' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/*
	    * Animated Text post animated Text Style
	    */
	    $this->start_controls_section(
	        'finest_post_animated_text_style',
	        [
				'label'     => esc_html__( 'Post Animated text', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'finest_animated_text_after_text!' => ''
				]
	        ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'finest_post_animated_text_typography',
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
				'selector' => '{{WRAPPER}} .finest-animated-text-post-heading'
			]
		);

		$this->add_control(
			'finest_post_animated_text_color',
			[
				'label'     => esc_html__( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#222222',
				'selectors' => [
					'{{WRAPPER}} .finest-animated-text-post-heading' => 'color: {{VALUE}}'
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings      = $this->get_settings_for_display();
		$id            = substr( $this->get_id_int(), 0, 3 );
		$type_heading  = explode( ',', $settings['finest_animated_text_animated_heading'] );
		$before_text   = $settings['finest_animated_text_before_text'];
		$heading_text  = $settings['finest_animated_text_animated_heading'];
		$after_text    = $settings['finest_animated_text_after_text'];
		$heading_tag   = $settings['finest_animated_text_animated_heading_tag'];
		$heading_align = $settings['finest_animated_text_animated_heading_alignment'];

		$this->add_render_attribute( 'finest_typed_animated_string', 'class', 'finest-typed-strings' );
		$this->add_render_attribute( 'finest_typed_animated_string',
			[
				'data-type_string'       => esc_attr(json_encode($type_heading)),
				'data-heading_animation' => esc_attr( $settings['finest_animated_text_animated_heading_animated_type'] )
			]
		);

		if($settings['finest_animated_text_animated_heading_animated_type'] === 'finest-typed-animation'){
			$this->add_render_attribute( 'finest_typed_animated_string',
				[
					'data-type_speed'      => esc_attr( $settings['finest_animated_text_type_speed'] ),
					'data-back_type_speed' => esc_attr( $settings['finest_animated_text_back_type_speed'] ),
					'data-loop'            => esc_attr( $settings['finest_animated_text_loop'] ),
					'data-show_cursor'     => esc_attr( $settings['finest_animated_text_show_cursor'] ),
					'data-fade_out'        => esc_attr( $settings['finest_animated_text_fade_out'] ),
					'data-smart_backspace' => esc_attr( $settings['finest_animated_text_smart_backspace'] ),
					'data-start_delay'     => esc_attr( $settings['finest_animated_text_start_delay'] ),
					'data-back_delay'      => esc_attr( $settings['finest_animated_text_back_delay'] )
				]
			);
		}

		if($settings['finest_animated_text_animated_heading_animated_type'] === 'finest-morphed-animation'){
			$this->add_render_attribute( 'finest_typed_animated_string',
				[
					'data-animation_style' => esc_attr( $settings['finest_animated_text_animated_heading_animation_style'] ),
					'data-animation_speed' => esc_attr( $settings['finest_animated_text_animation_speed'] )
				]
			);
		}

		$this->add_render_attribute( 'finest_animated_text_animated_heading',
			[
				'id'    => 'finest-animated-text-'.$id,
				'class' => 'finest-animated-text-animated-heading'
			]
		);

		$this->add_render_attribute( 'finest_animated_text_before_text', 'class', 'finest-animated-text-pre-heading' );
        $this->add_inline_editing_attributes( 'finest_animated_text_before_text' );

		$this->add_render_attribute( 'finest_animated_text_after_text', 'class', 'finest-animated-text-post-heading' );
        $this->add_inline_editing_attributes( 'finest_animated_text_after_text' );

		echo '<div class="finest-animated-text-align">';

			do_action( 'finest_animated_text_wrapper_before' );

			echo '<'.esc_attr($heading_tag).' '.$this->get_render_attribute_string( 'finest_typed_animated_string' ).'>';

				do_action( 'finest_animated_text_content_before' );

				$before_text ? printf( '<span '.$this->get_render_attribute_string( 'finest_animated_text_before_text' ).'>%s</span>', wp_kses_post($before_text) ) : '';

				if( 'finest-typed-animation' === $settings['finest_animated_text_animated_heading_animated_type'] ) {
					echo '<span id="finest-animated-text-'.esc_attr($id).'" class="finest-animated-text-animated-heading"></span>';
				}

				if( 'finest-morphed-animation' === $settings['finest_animated_text_animated_heading_animated_type'] ) {
					echo '<span '.$this->get_render_attribute_string( 'finest_animated_text_animated_heading' ).'>'.wp_kses_post($heading_text).'</span>';
				}

				$after_text ? printf( '<span '.$this->get_render_attribute_string( 'finest_animated_text_after_text' ).'>%s</span>', wp_kses_post($after_text) ) : '';

				do_action( 'finest_animated_text_content_after' );

			echo '</'.esc_attr($heading_tag).'>';

			do_action( 'finest_animated_text_wrapper_after' );

		echo '</div>';
	}
}
$widgets_manager->register_widget_type(new \Finest\Widgets\Elementor\Finest_Animated_Text());