<?php
namespace Finest\Widgets\Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Widget_Base;
use Finest\Elementor\Traits\Finest_Inline_Button_Markup;

class Finest_Inline_Button extends Widget_Base {

	use Finest_Inline_Button_Markup;

    /**
     * Get widget name.
     */
    public function get_name() {
		return 'finest-inline-button';
	}

	/**
	 * Get widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Inline Button', 'finest-addons' );
	}

	/**
     * Get widget icon.
     */
    public function get_icon() {
        return 'eicon-animated-headline';
    }

    /**
     * Get widget category.
     */
    public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return ['link', 'hover', 'animation', 'finest', 'inline'];
	}

	/**
     * Register widget content controls
     */
	protected function register_controls() {

		$this->start_controls_section(
			'_section_title',
			[
				'label' => __( 'Button Content', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
            ],
		);

		$this->add_control(
			'animation_style',
			[
				'label'   => __( 'Animation Style', 'finest-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'carpo',
				'options' => [
					'carpo'   => __( 'Carpo', 'finest-addons' ),
					'carme'   => __( 'Carme', 'finest-addons' ),
					'dia'     => __( 'Dia', 'finest-addons' ),
					'eirene'  => __( 'Eirene', 'finest-addons' ),
					'elara'   => __( 'Elara', 'finest-addons' ),
					'ersa'    => __( 'Ersa', 'finest-addons' ),
					'helike'  => __( 'Helike', 'finest-addons' ),
					'herse'   => __( 'Herse', 'finest-addons' ),
					'io'      => __( 'Io', 'finest-addons' ),
					'iocaste' => __( 'Iocaste', 'finest-addons' ),
					'kale'    => __( 'Kale', 'finest-addons' ),
					'leda'    => __( 'Leda', 'finest-addons' ),
					'metis'   => __( 'Metis', 'finest-addons' ),
					'mneme'   => __( 'Mneme', 'finest-addons' ),
					'thebe'   => __( 'Thebe', 'finest-addons' ),
                ],
            ],
		);

		$this->add_control(
			'link_text',
			[
				'label'       => __( 'Title', 'finest-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'default'     => __( 'Inline Button', 'finest-addons' ),
				'placeholder' => __( 'Type Link Title', 'finest-addons' ),
				'dynamic'     => [
					'active' => true,
                ],
            ]
		);

		$this->add_responsive_control(
            'link_align',
            [
                'label' => __( 'Alignment', 'finest-addons' ),
                'type' => Controls_Manager::CHOOSE,
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
                'default' => 'left',
                'toggle' => true,
                'selectors_dictionary' => [
                    'left' => 'justify-content: flex-start',
                    'center' => 'justify-content: center',
                    'right' => 'justify-content: flex-end',
                ],
                'selectors' => [
                    '{{WRAPPER}} .finest_content__item' => '{{VALUE}}'
                ]
            ]
        );

		$this->add_control(
			'link_url',
			[
				'label'         => __( 'Link', 'finest-addons' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'finest-addons' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => false,
					'nofollow'    => true,
                ],
            ]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_media_style',
			[
				'label' => __( 'Button Content', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE,
            ]
		);

		$this->add_responsive_control(
			'content_padding',
			[
				'label'      => __( 'Content Box Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em', '%'],
				'selectors'  => [
					'{{WRAPPER}} .finest_content__item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => __( 'Link Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-link' => 'color: {{VALUE}};',
                ],
            ]
		);

        $this->add_control(
			'title_hover_color',
			[
				'label'     => __( 'Link Hover Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-link:hover' => 'color: {{VALUE}};',
                ],
            ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'finest-addons' ),
				'selector' => '{{WRAPPER}} .finest-link',
				'scheme'   => Typography::TYPOGRAPHY_2,
            ]
		);
		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		self::{'render_' . $settings['animation_style'] . '_markup'}( $settings );
	}

}
$widgets_manager->register_widget_type(new \Finest\Widgets\Elementor\Finest_Inline_Button());