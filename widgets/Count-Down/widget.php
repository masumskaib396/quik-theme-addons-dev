<?php
namespace Quiktheme\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
use \Elementor\Widget_Base;
/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Quik_Theme_CountDown extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'quiktheme-addons-countdown';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Countdown', 'quiktheme-addons' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'feather icon-life-buoy';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	 public function get_categories() {
 	   return [ 'quiktheme-addons' ];
 	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_countdown',
			[
				'label' => __( 'Countdown', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'countdown_type',
			[
				'label' => __( 'Type', 'quiktheme-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'due_date' => __( 'Due Date', 'quiktheme-addons' ),
					'evergreen' => __( 'Evergreen Timer', 'quiktheme-addons' ),
				],
				'default' => 'due_date',
			]
		);

		$this->add_control(
			'due_date',
			[
				'label' => __( 'Due Date', 'quiktheme-addons' ),
				'type' => Controls_Manager::DATE_TIME,
				'default' => gmdate( 'Y-m-d H:i', strtotime( '+1 month' ) + ( get_option( 'gmt_offset' ) * HOUR_IN_SECONDS ) ),
				/* translators: %s: Time zone. */
				'description' => sprintf( __( 'Date set according to your timezone: %s.', 'quiktheme-addons' ), Utils::get_timezone_string() ),
				'condition' => [
					'countdown_type' => 'due_date',
				],
			]
		);

		$this->add_control(
			'evergreen_counter_hours',
			[
				'label' => __( 'Hours', 'quiktheme-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 47,
				'placeholder' => __( 'Hours', 'quiktheme-addons' ),
				'condition' => [
					'countdown_type' => 'evergreen',
				],
			]
		);

		$this->add_control(
			'evergreen_counter_minutes',
			[
				'label' => __( 'Minutes', 'quiktheme-addons' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 59,
				'placeholder' => __( 'Minutes', 'quiktheme-addons' ),
				'condition' => [
					'countdown_type' => 'evergreen',
				],
			]
		);

		$this->add_control(
			'divider',
			[
				'label' => __( 'Divider', 'quiktheme-addons' ),
				'type' => Controls_Manager::TEXT,
	
			]
		);

		$this->add_control(
			'divider_hide_in_mobile',
			[
				'label' => __( 'Hide divider in mobile ?', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'quiktheme-addons' ),
				'label_off' => __( 'No', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'active_inline',
			[
				'label' => __( 'Active Inline', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'quiktheme-addons' ),
				'label_off' => __( 'No', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'show_days',
			[
				'label' => __( 'Days', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'quiktheme-addons' ),
				'label_off' => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_hours',
			[
				'label' => __( 'Hours', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'quiktheme-addons' ),
				'label_off' => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_minutes',
			[
				'label' => __( 'Minutes', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'quiktheme-addons' ),
				'label_off' => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_seconds',
			[
				'label' => __( 'Seconds', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'quiktheme-addons' ),
				'label_off' => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_labels',
			[
				'label' => __( 'Show Label', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'quiktheme-addons' ),
				'label_off' => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'custom_labels',
			[
				'label' => __( 'Custom Label', 'quiktheme-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'condition' => [
					'show_labels!' => '',
				],
			]
		);

		$this->add_control(
			'label_days',
			[
				'label' => __( 'Days', 'quiktheme-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Days', 'quiktheme-addons' ),
				'placeholder' => __( 'Days', 'quiktheme-addons' ),
				'condition' => [
					'show_labels!' => '',
					'custom_labels!' => '',
					'show_days' => 'yes',
				],
			]
		);

		$this->add_control(
			'label_hours',
			[
				'label' => __( 'Hours', 'quiktheme-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Hours', 'quiktheme-addons' ),
				'placeholder' => __( 'Hours', 'quiktheme-addons' ),
				'condition' => [
					'show_labels!' => '',
					'custom_labels!' => '',
					'show_hours' => 'yes',
				],
			]
		);

		$this->add_control(
			'label_minutes',
			[
				'label' => __( 'Minutes', 'quiktheme-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Minutes', 'quiktheme-addons' ),
				'placeholder' => __( 'Minutes', 'quiktheme-addons' ),
				'condition' => [
					'show_labels!' => '',
					'custom_labels!' => '',
					'show_minutes' => 'yes',
				],
			]
		);

		$this->add_control(
			'label_seconds',
			[
				'label' => __( 'Seconds', 'quiktheme-addons' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Seconds', 'quiktheme-addons' ),
				'placeholder' => __( 'Seconds', 'quiktheme-addons' ),
				'condition' => [
					'show_labels!' => '',
					'custom_labels!' => '',
					'show_seconds' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
            'content_align',
            [
                'label' => __('Align', 'trydus-hp'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'trydus-hp'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('top', 'trydus-hp'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'trydus-hp'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'devices' => ['desktop', 'tablet', 'mobile'],
                'prefix_class' => 'content-align%s-',
                'toggle' => true,
            ]
        );

/* 		$this->add_control(
			'expire_actions',
			[
				'label' => __( 'Actions After Expire', 'quiktheme-addons' ),
				'type' => Controls_Manager::SELECT2,
				'options' => [
					'redirect' => __( 'Redirect', 'quiktheme-addons' ),
					'hide' => __( 'Hide', 'quiktheme-addons' ),
					'message' => __( 'Show Message', 'quiktheme-addons' ),
				],
				'label_block' => true,
				'separator' => 'before',
				'render_type' => 'none',
				'multiple' => true,
			]
		);

		$this->add_control(
			'message_after_expire',
			[
				'label' => __( 'Message', 'quiktheme-addons' ),
				'type' => Controls_Manager::TEXTAREA,
				'separator' => 'before',
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'expire_actions' => 'message',
				],
			]
		);

		$this->add_control(
			'expire_redirect_url',
			[
				'label' => __( 'Redirect URL', 'quiktheme-addons' ),
				'type' => Controls_Manager::URL,
				'separator' => 'before',
				'options' => false,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'expire_actions' => 'redirect',
				],
			]
		); */

		$this->end_controls_section();

		$this->start_controls_section(
			'section_box_style',
			[
				'label' => __( 'Boxes', 'quiktheme-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'container_width',
			[
				'label' => __( 'Container Width', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'tablet_default' => [
					'unit' => '%',
				],
				'mobile_default' => [
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 2000,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'size_units' => [ '%', 'px' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'box_background_color',
			[
				'label' => __( 'Background Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown-item' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_border',
				'selector' => '{{WRAPPER}} .quiktheme-addons-countdown-item',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'box_border_radius',
			[
				'label' => __( 'Border Radius', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_spacing',
			[
				'label' => __( 'Space Between', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 10,
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'body:not(.rtl) {{WRAPPER}} .quiktheme-addons-countdown-item:not(:first-of-type)' => 'margin-left:{{SIZE}}{{UNIT}};',
					'body:not(.rtl) {{WRAPPER}} .quiktheme-addons-countdown-item:not(:last-of-type)' => 'margin-right:{{SIZE}}{{UNIT}};',
					'body.rtl {{WRAPPER}} .quiktheme-addons-countdown-item:not(:first-of-type)' => 'margin-right:{{SIZE}}{{UNIT}};',
					'body.rtl {{WRAPPER}} .quiktheme-addons-countdown-item:not(:last-of-type)' => 'margin-left:{{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'box_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_style',
			[
				'label' => __( 'Content', 'quiktheme-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_digits',
			[
				'label' => __( 'Digits', 'quiktheme-addons' ),
				'type' => Controls_Manager::HEADING,
			]
		);

		$this->add_control(
			'digits_color',
			[
				'label' => __( 'Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown__count' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'digits_typography',
				'selector' => '{{WRAPPER}} .quiktheme-addons-countdown__count',
			]
		);

		$this->add_responsive_control(
			'digits_width',
			[
				'label' => __( 'Digits Width', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown__count' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'digits_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown__count' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'heading_label',
			[
				'label' => __( 'Label', 'quiktheme-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => __( 'Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-addons-countdown-item .text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .quiktheme-addons-countdown-item .text',
			]
		);

		$this->add_responsive_control(
			'label_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .elemequiktheme-addons-countdown-item .text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'divider_style',
			[
				'label' => __( 'Divider', 'quiktheme-addons' ),
				'type' => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'divider_color',
			[
				'label' => __( 'Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .divider' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'divider_typography',
				'selector' => '{{WRAPPER}} .divider',
			]
		);

		$this->add_responsive_control(
			'divider_positon',
			[
				'label' => __( 'Divider Position', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -1000,
						'max' => 1000,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .divider' => 'top: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'divider_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .divider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

/* 		$this->start_controls_section(
			'section_expire_message_style',
			[
				'label' => __( 'Message', 'quiktheme-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => [
					'expire_actions' => 'message',
				],
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label' => __( 'Alignment', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'selectors' => [
					'{{WRAPPER}} .elementor-countdown-expire--message' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => __( 'Text Color', 'quiktheme-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .elementor-countdown-expire--message' => 'color: {{VALUE}};',
				],
				'global' => [
					'default' => Global_Colors::COLOR_TEXT,
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				'global' => [
					'default' => Global_Typography::TYPOGRAPHY_TEXT,
				],
				'selector' => '{{WRAPPER}} .elementor-countdown-expire--message',
			]
		);

		$this->add_responsive_control(
			'message_padding',
			[
				'label' => __( 'Padding', 'quiktheme-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .elementor-countdown-expire--message' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section(); */

	}


	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings();
		$label_display = 'yes' == $settings['active_inline'] ? 'inline' : 'block';
		$hide_divider  = 'yes' == $settings['divider_hide_in_mobile'] ? 'elementor-hidden-phone' : '';
		$label_days = '';
		$label_hours = '';
		$label_minutes = '';
		$label_seconds =  '';

		if( 'yes' == $settings['show_labels'] ){

			$label_days = $settings['label_days'] ? $settings['label_days'] : __( 'Days', 'quiktheme-addons' );
			$label_hours = $settings['label_hours'] ? $settings['label_hours'] : __( 'Hours', 'quiktheme-addons' );
			$label_minutes = $settings['label_minutes'] ? $settings['label_minutes'] : __( 'Minutes', 'quiktheme-addons' );
			$label_seconds = $settings['label_seconds'] ? $settings['label_seconds'] : __( 'Seconds', 'quiktheme-addons' );

		}
		
		if ( 'evergreen' == $settings['countdown_type'] ){
			$evergreen_date = strtotime( " +{$settings['evergreen_counter_hours']} Hours {$settings['evergreen_counter_minutes']} Minutes" );
			$due_date = gmdate( 'Y-m-d H:i', $evergreen_date);
		}else{
			$due_date =  $settings['due_date'];
		}

		?>
		<div class="quiktheme-addons-countdown-wrapper ">
			<ul class="quiktheme-addons-countdown d-inline-flex flex-wrap align-items-center justify-content-lg-start" id="date" data-date="<?php echo $due_date; ?>">
	
				<li class="quiktheme-addons-countdown-item count-down-<?php echo esc_attr( $label_display ) ?> show-<?php echo ( 'yes' == $settings['show_days'] ) ? esc_attr( 'yes' ) : esc_attr( 'no' ); ?>">
					<span class="quiktheme-addons-countdown__count h3-font font-w-700 color-primary" id="days"></span>
	
					<?php echo ( 'yes' == $settings['show_labels'] ) ? sprintf( '<span class="text">%s</span>', $label_days ) : ''; ?>
	

				</li>
				<?php 
				if( ! empty( $settings['divider'] ) ) {
					echo sprintf('<span class="divider %s">%s</span>', esc_attr(  $hide_divider ) , esc_attr( $settings['divider'] )); 
				}
				?>
	
				<li class="quiktheme-addons-countdown-item count-down-<?php echo esc_attr( $label_display ) ?> show-<?php echo ( 'yes' == $settings['show_hours'] ) ? esc_attr( 'yes' ) : esc_attr( 'no' ); ?>">
					<span class="quiktheme-addons-countdown__count h3-font font-w-700 color-primary" id="hours"></span>
				<?php echo ( 'yes' == $settings['show_labels'] ) ? sprintf( '<span class="text">%s</span>', $label_hours ) : ''; ?>
	
	
				</li>
					<?php 
					if( ! empty( $settings['divider'] ) ) {
						echo sprintf('<span class="divider %s">%s</span>', esc_attr(  $hide_divider ) , esc_attr( $settings['divider'] ));  
					}
					?>
	
	
		
				<li class="quiktheme-addons-countdown-item count-down-<?php echo esc_attr( $label_display ) ?> show-<?php echo ( 'yes' == $settings['show_minutes'] ) ? esc_attr( 'yes' ) : esc_attr( 'no' ); ?>">
	
					<span class="quiktheme-addons-countdown__count h3-font font-w-700 color-primary" id="minutes"></span>
	
					<?php echo ( 'yes' == $settings['show_labels'] ) ? sprintf( '<span class="text">%s</span>', $label_minutes ) : ''; ?>
	
				</li>
					<?php 
					if( ! empty( $settings['divider'] ) ) {
						echo sprintf('<span class="divider %s">%s</span>', esc_attr(  $hide_divider ) , esc_attr( $settings['divider'] ));  
					}
					?>
	
	
	
	
				<li class="quiktheme-addons-countdown-item count-down-<?php echo esc_attr( $label_display ) ?> show-<?php echo ( 'yes' == $settings['show_seconds'] ) ? esc_attr( 'yes' ) : esc_attr( 'no' ); ?>">
					<span class="quiktheme-addons-countdown__count h3-font font-w-700 color-primary" id="seconds"></span>
					<?php echo ( 'yes' == $settings['show_labels'] ) ? sprintf( '<span class="text">%s</span>', $label_seconds ) : ''; ?>
				</li>
	
	
			</ul>
		</div>
		<!-- end of countdown -->
        <?php
	}

}
$widgets_manager->register_widget_type( new \Quiktheme\Widgets\Elementor\Quik_Theme_CountDown() );