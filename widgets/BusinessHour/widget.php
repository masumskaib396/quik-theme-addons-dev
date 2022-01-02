<?php
namespace Finest\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Widget_Base;



class Finest_Business_Hour extends Widget_Base {

    public function get_name() {
		return 'finest-business';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __('Business Hour', 'finest-addons');
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'feather icon-clock';
	}

    public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return ['list', 'watch', 'business', 'hour', 'time', 'business-hour', 'time-list', 'finest'];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'_section_business_hour',
			[
				'label' => __('Business Hour', 'finest-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Title', 'finest-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Working Hour', 'finest-addons'),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'day',
			[
				'label' => __('Day', 'finest-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Monday', 'finest-addons'),
				'placeholder' => __('Monday', 'finest-addons'),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'time',
			[
				'label' => __('Time', 'finest-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('10:00AM - 07:00PM', 'finest-addons'),
				'placeholder' => __('10:00AM - 07:00PM', 'finest-addons'),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'individual_style',
			[
				'label' => __('Individual Style?', 'finest-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'finest-addons'),
				'label_off' => __('No', 'finest-addons'),
				'return_value' => 'yes',
				'default' => 'no',
                'style_transfer' => true,
			]
		);

		$repeater->add_control(
			'day_time_color',
			[
				'label' => __('Text Color', 'finest-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.finest-business-hour-item' => 'color: {{VALUE}};',
				],
				'condition' => [
					'individual_style' => 'yes'
				],
				'separator' => 'before',
                'style_transfer' => true,
			]
		);

		$repeater->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'day_time_border',
				'label' => __('Border', 'finest-addons'),
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.finest-business-hour-item',
                'style_transfer' => true,
				'condition' => [
					'individual_style' => 'yes'
				],
			]
		);

		$repeater->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'day_time_background',
				'label' => __('Background', 'finest-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.finest-business-hour-item',
				'condition' => [
					'individual_style' => 'yes'
				],
				'separator' => 'before',
                'style_transfer' => true,
			]
		);

		$repeater->add_control(
			'day_time_border_radius',
			[
				'label' => __('Border Radius', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.finest-business-hour-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'individual_style' => 'yes'
				],
                'style_transfer' => true,
			]
		);

		$repeater->add_control(
			'day_time_margin',
			[
				'label' => __('Margin', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.finest-business-hour-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition' => [
					'individual_style' => 'yes'
				],
                'style_transfer' => true,
			]
		);

		$this->add_control(
			'business_hour_list',
			[
				'show_label' => false,
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ day }}}',
				'default' => [
					[
						'day' => __('Monday', 'finest-addons'),
						'time' => __('10:00AM - 07:00PM', 'finest-addons'),
					],
					[
						'day' => __('Tuesday', 'finest-addons'),
						'time' => __('10:00AM - 07:00PM', 'finest-addons'),
					],
					[
						'day' => __('Wednesday', 'finest-addons'),
						'time' => __('10:00AM - 07:00PM', 'finest-addons'),
					],
					[
						'day' => __('Thursday', 'finest-addons'),
						'time' => __('10:00AM - 07:00PM', 'finest-addons'),
					],
					[
						'day' => __('Friday', 'finest-addons'),
						'time' => __('10:00AM - 07:00PM', 'finest-addons'),
					],
					[
						'day' => __('Saturday', 'finest-addons'),
						'time' => __('10:00AM - 07:00PM', 'finest-addons'),
					],
					[
						'day' => __('Sunday', 'finest-addons'),
						'time' => __('Closed', 'finest-addons'),
					],
				],
			]
		);

    $this->end_controls_section();



		$this->start_controls_section(
			'_section_business_settings',
			[
				'label' => __('Settings', 'finest-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_alignment',
			[
				'label' => __( 'Title Alignment', 'finest-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'finest-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-title' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'day_alignment',
			[
				'label' => __( 'Day Alignment', 'finest-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'finest-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-item .finest-business-hour-day' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'time_alignment',
			[
				'label' => __( 'Time Alignment', 'finest-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'finest-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon' => 'eicon-text-align-right',
					]
				],
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-item .finest-business-hour-time' => 'text-align: {{VALUE}}',
				],
			]
		);

    $this->end_controls_section();


		$this->start_controls_section(
			'_section_business_hour_title_style',
			[
				'label' => __('Title', 'finest-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Text Color', 'finest-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-title h3' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .finest-business-hour-title h3',
				'scheme' => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => __('Border', 'finest-addons'),
				'selector' => '{{WRAPPER}} .finest-business-hour-title',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_background',
				'label' => __('Background', 'finest-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .finest-business-hour-title',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'title_border_radius',
			[
				'label' => __('Border Radius', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_padding',
			[
				'label' => __('Padding', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_margin',
			[
				'label' => __('Margin', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'_section_business_hour_list_style',
			[
				'label' => __('Hour List', 'finest-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_color',
			[
				'label' => __('Text Color', 'finest-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-item' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_typography',
				'selector' => '{{WRAPPER}} .finest-business-hour-item',
				'scheme' => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'list_border',
				'label' => __('Border', 'finest-addons'),
				'selector' => '{{WRAPPER}} .finest-business-hour-item',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'list_background',
				'label' => __('Background', 'finest-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .finest-business-hour-item',
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'list_shadow',
				'label' => __( 'Box Shadow', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-business-hour-item',
			]
		);

		$this->add_control(
			'list_border_radius',
			[
				'label' => __('Border Radius', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'list_padding',
			[
				'label' => __('Padding', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'list_margin',
			[
				'label' => __('Margin', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'_section_business_hour_container_style',
			[
				'label' => __('Container', 'finest-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'container_border',
				'label' => __('Border', 'finest-addons'),
				'selector' => '{{WRAPPER}} .finest-business-hour-wrapper ul',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'container_background',
				'label' => __('Background', 'finest-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .finest-business-hour-wrapper ul',
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'container_shadow',
				'label' => __( 'Box Shadow', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-business-hour-wrapper ul',
			]
		);

		$this->add_control(
			'container_border_radius',
			[
				'label' => __('Border Radius', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-wrapper ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'container_padding',
			[
				'label' => __('Padding', 'finest-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .finest-business-hour-wrapper ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="finest-business-hour-wrapper">
			<ul>
				<?php if ($settings['title']) : ?>
					<li class="finest-business-hour-title">
						<?php printf('<h3>%s</h3>', esc_html($settings['title'])) ?>
					</li>
				<?php endif; ?>
				<?php if (is_array($settings['business_hour_list']) && 0 != count($settings['business_hour_list'])):
					foreach ($settings['business_hour_list'] as $key => $item) :
						// Day
						$day_key = $this->get_repeater_setting_key('day', 'business_hour_list', $key);
						$this->add_inline_editing_attributes($day_key, 'basic');
						$this->add_render_attribute($day_key, 'class', 'finest-business-hour-day');
						// Time
						$time_key = $this->get_repeater_setting_key('time', 'business_hour_list', $key);
						$this->add_inline_editing_attributes($time_key, 'basic');
						$this->add_render_attribute($time_key, 'class', 'finest-business-hour-time');
						?>
						<li class="finest-business-hour-item elementor-repeater-item-<?php echo $item['_id']; ?>">
							<?php if ($item['day']) : ?>
								<span <?php echo $this->get_render_attribute_string($day_key); ?>><?php echo esc_html($item['day']) ?></span>
							<?php endif; ?>
							<?php if ($item['time']) : ?>
								<span <?php echo $this->get_render_attribute_string($time_key); ?>><?php echo esc_html($item['time']) ?></span>
							<?php endif; ?>
						</li>
					<?php
					endforeach;
				endif;
				?>
			</ul>
		</div>
    <?php
	}

}
$widgets_manager->register_widget_type( new \Finest\Widgets\Elementor\Finest_Business_Hour());