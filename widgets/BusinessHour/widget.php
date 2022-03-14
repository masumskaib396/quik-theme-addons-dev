<?php
namespace Quiktheme\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Repeater;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Widget_Base;



class Quik_Theme_Business_Hour extends Widget_Base {

    public function get_name() {
		return 'quiktheme-business';
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
		return __('Business Hour', 'quiktheme-addons');
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
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
		return ['list', 'watch', 'business', 'hour', 'time', 'business-hour', 'time-list', 'quik-theme-addons'];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'_section_business_hour',
			[
				'label' => __('Business Hour', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __('Title', 'quiktheme-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Working Hour', 'quiktheme-addons'),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'day',
			[
				'label' => __('Day', 'quiktheme-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('Monday', 'quiktheme-addons'),
				'placeholder' => __('Monday', 'quiktheme-addons'),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'time',
			[
				'label' => __('Time', 'quiktheme-addons'),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
				'placeholder' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'individual_style',
			[
				'label' => __('Individual Style?', 'quiktheme-addons'),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __('Yes', 'quiktheme-addons'),
				'label_off' => __('No', 'quiktheme-addons'),
				'return_value' => 'yes',
				'default' => 'no',
                'style_transfer' => true,
			]
		);

		$repeater->add_control(
			'day_time_color',
			[
				'label' => __('Text Color', 'quiktheme-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.quiktheme-business-hour-item' => 'color: {{VALUE}};',
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
				'label' => __('Border', 'quiktheme-addons'),
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.quiktheme-business-hour-item',
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
				'label' => __('Background', 'quiktheme-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.quiktheme-business-hour-item',
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
				'label' => __('Border Radius', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.quiktheme-business-hour-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'label' => __('Margin', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}.quiktheme-business-hour-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
						'day' => __('Monday', 'quiktheme-addons'),
						'time' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
					],
					[
						'day' => __('Tuesday', 'quiktheme-addons'),
						'time' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
					],
					[
						'day' => __('Wednesday', 'quiktheme-addons'),
						'time' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
					],
					[
						'day' => __('Thursday', 'quiktheme-addons'),
						'time' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
					],
					[
						'day' => __('Friday', 'quiktheme-addons'),
						'time' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
					],
					[
						'day' => __('Saturday', 'quiktheme-addons'),
						'time' => __('10:00AM - 07:00PM', 'quiktheme-addons'),
					],
					[
						'day' => __('Sunday', 'quiktheme-addons'),
						'time' => __('Closed', 'quiktheme-addons'),
					],
				],
			]
		);

    $this->end_controls_section();



		$this->start_controls_section(
			'_section_business_settings',
			[
				'label' => __('Settings', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_alignment',
			[
				'label' => __( 'Title Alignment', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
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
					]
				],
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-title' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'day_alignment',
			[
				'label' => __( 'Day Alignment', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
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
					]
				],
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-item .quiktheme-business-hour-day' => 'text-align: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'time_alignment',
			[
				'label' => __( 'Time Alignment', 'quiktheme-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
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
					]
				],
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-item .quiktheme-business-hour-time' => 'text-align: {{VALUE}}',
				],
			]
		);

    $this->end_controls_section();


		$this->start_controls_section(
			'_section_business_hour_title_style',
			[
				'label' => __('Title', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => __('Text Color', 'quiktheme-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-title h3' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-title h3',
				'scheme' => Typography::TYPOGRAPHY_2,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => __('Border', 'quiktheme-addons'),
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-title',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_background',
				'label' => __('Background', 'quiktheme-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-title',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'title_border_radius',
			[
				'label' => __('Border Radius', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_padding',
			[
				'label' => __('Padding', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'title_margin',
			[
				'label' => __('Margin', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'_section_business_hour_list_style',
			[
				'label' => __('Hour List', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'list_color',
			[
				'label' => __('Text Color', 'quiktheme-addons'),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-item' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_typography',
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-item',
				'scheme' => Typography::TYPOGRAPHY_3,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'list_border',
				'label' => __('Border', 'quiktheme-addons'),
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-item',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'list_background',
				'label' => __('Background', 'quiktheme-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-item',
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'list_shadow',
				'label' => __( 'Box Shadow', 'quiktheme-addons' ),
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-item',
			]
		);

		$this->add_control(
			'list_border_radius',
			[
				'label' => __('Border Radius', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'list_padding',
			[
				'label' => __('Padding', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'list_margin',
			[
				'label' => __('Margin', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();



		$this->start_controls_section(
			'_section_business_hour_container_style',
			[
				'label' => __('Container', 'quiktheme-addons'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'container_border',
				'label' => __('Border', 'quiktheme-addons'),
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-wrapper ul',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'container_background',
				'label' => __('Background', 'quiktheme-addons'),
				'types' => ['classic', 'gradient'],
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-wrapper ul',
				'separator' => 'before'
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'container_shadow',
				'label' => __( 'Box Shadow', 'quiktheme-addons' ),
				'selector' => '{{WRAPPER}} .quiktheme-business-hour-wrapper ul',
			]
		);

		$this->add_control(
			'container_border_radius',
			[
				'label' => __('Border Radius', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-wrapper ul' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'container_padding',
			[
				'label' => __('Padding', 'quiktheme-addons'),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', '%', 'em'],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-business-hour-wrapper ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		?>
		<div class="quiktheme-business-hour-wrapper">
			<ul>
				<?php if ($settings['title']) : ?>
					<li class="quiktheme-business-hour-title">
						<?php printf('<h3>%s</h3>', esc_html($settings['title'])) ?>
					</li>
				<?php endif; ?>
				<?php if (is_array($settings['business_hour_list']) && 0 != count($settings['business_hour_list'])):
					foreach ($settings['business_hour_list'] as $key => $item) :
						// Day
						$day_key = $this->get_repeater_setting_key('day', 'business_hour_list', $key);
						$this->add_inline_editing_attributes($day_key, 'basic');
						$this->add_render_attribute($day_key, 'class', 'quiktheme-business-hour-day');
						// Time
						$time_key = $this->get_repeater_setting_key('time', 'business_hour_list', $key);
						$this->add_inline_editing_attributes($time_key, 'basic');
						$this->add_render_attribute($time_key, 'class', 'quiktheme-business-hour-time');
						?>
						<li class="quiktheme-business-hour-item elementor-repeater-item-<?php echo $item['_id']; ?>">
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
$widgets_manager->register_widget_type( new \Quiktheme\Widgets\Elementor\Quik_Theme_Business_Hour());