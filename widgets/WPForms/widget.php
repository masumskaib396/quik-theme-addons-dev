<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use \Elementor\Widget_Base;

class Quik_Theme_WP_Forms extends Widget_Base {

	public function get_name() {
		return 'quiktheme-wp-forms';
	}

	public function get_title() {
		return esc_html__( 'WP Forms', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-mail';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
		return [ 'wpf', 'wpform', 'form', 'contact', 'cf7', 'contact form', 'gravity', 'ninja' ];
	}

	protected function _register_controls() { 

		if ( !class_exists('WPForms') ) {
			$this->start_controls_section(
                'quik_theme_global_warning',
                [
                    'label'             => __('Warning!', 'quiktheme-addons'),
                ]
            );

            $this->add_control(
                'quik_theme_wpforms_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __( 'Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'happy-elementor-addons' ),
                        '<a href="'.esc_url( admin_url( 'plugin-install.php?s=WPForms&tab=search&type=term' ) ).'" target="_blank" rel="noopener">WPForms</a>',
                        quik_theme_get_current_user_display_name()
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->add_control(
                'quik_theme_wpforms_install',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<a href="'.esc_url( admin_url( 'plugin-install.php?s=WPForms&tab=search&type=term' ) ).'" target="_blank" rel="noopener">Click to install or activate WPForms</a>',
                ]
            );
			$this->end_controls_section();
        } else {
			$this->quik_theme_register_controls();
			$this->quik_theme_title_description_style_controls();
			$this->quik_theme_text_inputara_control();
		}
	}
	protected function quik_theme_register_controls() {
		$this->start_controls_section(
			'quik_theme_section_wpforms',
			[
				'label'                 => __( 'WPForms', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'contact_form_list',
			[
				'label'                 => esc_html__( 'Contact Form', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SELECT,
				'label_block'           => true,
				'options'               => quik_theme_get_contact_wp_forms( 'WP_Forms' ),
				'default'               => '0',
			]
		);
		$this->add_control(
			'custom_title_description',
			[
				'label'                 => __( 'Custom Title & Description', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SWITCHER,
				'label_on'              => __( 'Yes', 'quiktheme-addons' ),
				'label_off'             => __( 'No', 'quiktheme-addons' ),
				'return_value'          => 'yes',
			]
		);

		$this->add_control(
			'form_title',
			[
				'label'                 => __( 'Title', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => __( 'Show', 'quiktheme-addons' ),
				'label_off'             => __( 'Hide', 'quiktheme-addons' ),
				'return_value'          => 'yes',
				'condition'             => [
					'custom_title_description!'   => 'yes',
				],
			]
		);

		$this->add_control(
			'form_description',
			[
				'label'                 => __( 'Description', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => __( 'Show', 'quiktheme-addons' ),
				'label_off'             => __( 'Hide', 'quiktheme-addons' ),
				'return_value'          => 'yes',
				'condition'             => [
					'custom_title_description!'   => 'yes',
				],
			]
		);

		$this->add_control(
			'form_title_custom',
			[
				'label'                 => esc_html__( 'Title', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::TEXT,
				'label_block'           => true,
				'default'               => '',
				'condition'             => [
					'custom_title_description'   => 'yes',
				],
			]
		);

		$this->add_control(
			'form_description_custom',
			[
				'label'                 => esc_html__( 'Description', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::TEXTAREA,
				'default'               => '',
				'condition'             => [
					'custom_title_description'   => 'yes',
				],
			]
		);

		$this->add_control(
			'labels_switch',
			[
				'label'                 => __( 'Labels', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => __( 'Show', 'quiktheme-addons' ),
				'label_off'             => __( 'Hide', 'quiktheme-addons' ),
				'return_value'          => 'yes',
				'prefix_class'          => 'quiktheme-wpforms-labels-',
			]
		);

		$this->add_control(
			'placeholder_switch',
			[
				'label'                 => __( 'Placeholder', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SWITCHER,
				'default'               => 'yes',
				'label_on'              => __( 'Show', 'quiktheme-addons' ),
				'label_off'             => __( 'Hide', 'quiktheme-addons' ),
				'return_value'          => 'yes',
			]
		);
		$this->end_controls_section();
	}
	protected function quik_theme_title_description_style_controls() {

		$this->start_controls_section(
			'section_form_title_style',
			[
				'label'                 => __( 'Title & Description', 'quiktheme-addons' ),
				'tab'                   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'heading_alignment',
			[
				'label'                 => __( 'Alignment', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::CHOOSE,
				'options'               => [
					'left'      => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'    => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'     => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .wpforms-head-container, {{WRAPPER}} .quiktheme-wpforms-heading' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'title_heading',
			[
				'label'                 => __( 'Title', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::HEADING,
				'separator'             => 'before',
			]
		);

		$this->add_control(
			'form_title_text_color',
			[
				'label'                 => __( 'Text Color', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-contact-form-title, {{WRAPPER}} .wpforms-title' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'form_title_typography',
				'label'                 => __( 'Typography', 'quiktheme-addons' ),
				'selector'              => '{{WRAPPER}} .quiktheme-contact-form-title, {{WRAPPER}} .wpforms-title',
			]
		);

		$this->add_responsive_control(
			'form_title_margin',
			[
				'label'                 => __( 'Margin', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', 'em', '%' ],
				'allowed_dimensions'    => 'vertical',
				'placeholder'           => [
					'top'      => '',
					'right'    => 'auto',
					'bottom'   => '',
					'left'     => 'auto',
				],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-contact-form-title, {{WRAPPER}} .wpforms-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'description_heading',
			[
				'label'                 => __( 'Description', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::HEADING,
				'separator'             => 'before',
			]
		);

		$this->add_control(
			'form_description_text_color',
			[
				'label'                 => __( 'Text Color', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-contact-form-description, {{WRAPPER}} .wpforms-description' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'form_description_typography',
				'label'                 => __( 'Typography', 'quiktheme-addons' ),
				'selector'              => '{{WRAPPER}} .quiktheme-contact-form-description, {{WRAPPER}} .wpforms-description',
			]
		);

		$this->add_responsive_control(
			'form_description_margin',
			[
				'label'                 => __( 'Margin', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', 'em', '%' ],
				'allowed_dimensions'    => 'vertical',
				'placeholder'           => [
					'top'      => '',
					'right'    => 'auto',
					'bottom'   => '',
					'left'     => 'auto',
				],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-contact-form-description, {{WRAPPER}} .wpforms-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Labels
		 * -------------------------------------------------
		 */
		$this->start_controls_section(
			'section_label_style',
			[
				'label'             => __( 'Labels', 'quiktheme-addons' ),
				'tab'               => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_color_label',
			[
				'label'             => __( 'Text Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'form_lebel_typography',
				'label'                 => __( 'Typography', 'quiktheme-addons' ),
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-field label',
			]
		);

		$this->end_controls_section();
	}
	protected function quik_theme_text_inputara_control() {
		$this->start_controls_section(
			'section_fields_style',
			[
				'label'             => __( 'Input & Textarea', 'quiktheme-addons' ),
				'tab'               => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'input_alignment',
			[
				'label'                 => __( 'Alignment', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::CHOOSE,
				'options'               => [
					'left'      => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon'  => 'fa fa-align-left',
					],
					'center'    => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'     => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_fields_style' );

		$this->start_controls_tab(
			'tab_fields_normal',
			[
				'label'                 => __( 'Normal', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'field_bg_color',
			[
				'label'             => __( 'Background Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'field_text_color',
			[
				'label'             => __( 'Text Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'              => 'field_border',
				'label'             => __( 'Border', 'quiktheme-addons' ),
				'placeholder'       => '1px',
				'default'           => '1px',
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select',
				'separator'         => 'before',
			]
		);

		$this->add_control(
			'field_radius',
			[
				'label'             => __( 'Border Radius', 'quiktheme-addons' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'text_indent',
			[
				'label'                 => __( 'Text Indent', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SLIDER,
				'range'                 => [
					'px'        => [
						'min'   => 0,
						'max'   => 60,
						'step'  => 1,
					],
					'%'         => [
						'min'   => 0,
						'max'   => 30,
						'step'  => 1,
					],
				],
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'text-indent: {{SIZE}}{{UNIT}}',
				],
				'separator'         => 'before',
			]
		);

		$this->add_responsive_control(
			'input_width',
			[
				'label'             => __( 'Input Width', 'quiktheme-addons' ),
				'type'              => Controls_Manager::SLIDER,
				'range'             => [
					'px' => [
						'min'   => 0,
						'max'   => 1200,
						'step'  => 1,
					],
				],
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'input_height',
			[
				'label'             => __( 'Input Height', 'quiktheme-addons' ),
				'type'              => Controls_Manager::SLIDER,
				'range'             => [
					'px' => [
						'min'   => 0,
						'max'   => 80,
						'step'  => 1,
					],
				],
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'textarea_width',
			[
				'label'             => __( 'Textarea Width', 'quiktheme-addons' ),
				'type'              => Controls_Manager::SLIDER,
				'range'             => [
					'px' => [
						'min'   => 0,
						'max'   => 1200,
						'step'  => 1,
					],
				],
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'textarea_height',
			[
				'label'             => __( 'Textarea Height', 'quiktheme-addons' ),
				'type'              => Controls_Manager::SLIDER,
				'range'             => [
					'px' => [
						'min'   => 0,
						'max'   => 400,
						'step'  => 1,
					],
				],
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea' => 'height: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_responsive_control(
			'field_padding',
			[
				'label'             => __( 'Padding', 'quiktheme-addons' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator'         => 'before',
			]
		);

		$this->add_responsive_control(
			'field_spacing',
			[
				'label'                 => __( 'Spacing', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SLIDER,
				'range'                 => [
					'px'        => [
						'min'   => 0,
						'max'   => 100,
						'step'  => 1,
					],
				],
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field' => 'margin-bottom: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'box_typography',
				'label'                 => __( 'Typography', 'quiktheme-addons' ),
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select',
				'separator'         => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'              => 'field_box_shadow',
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea, {{WRAPPER}} .quiktheme-wpforms .wpforms-field select',
				'separator'         => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_fields_focus',
			[
				'label'                 => __( 'Focus', 'quiktheme-addons' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'              => 'focus_input_border',
				'label'             => __( 'Border', 'quiktheme-addons' ),
				'placeholder'       => '1px',
				'default'           => '1px',
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:focus, {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea:focus',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'              => 'focus_box_shadow',
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-field input:focus, {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea:focus',
				'separator'         => 'before',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/**
		 * Style Tab: Field Description
		 * -------------------------------------------------
		 */
		$this->start_controls_section(
			'section_field_description_style',
			[
				'label'                 => __( 'Field Description', 'quiktheme-addons' ),
				'tab'                   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'field_description_text_color',
			[
				'label'                 => __( 'Text Color', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::COLOR,
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field .wpforms-field-description, {{WRAPPER}} .quiktheme-wpforms .wpforms-field .wpforms-field-sublabel' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'field_description_typography',
				'label'                 => __( 'Typography', 'quiktheme-addons' ),
				'selector'              => '{{WRAPPER}} .quiktheme-wpforms .wpforms-field .wpforms-field-description, {{WRAPPER}} .quiktheme-wpforms .wpforms-field .wpforms-field-sublabel',
			]
		);

		$this->add_responsive_control(
			'field_description_spacing',
			[
				'label'                 => __( 'Spacing', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SLIDER,
				'range'                 => [
					'px'        => [
						'min'   => 0,
						'max'   => 100,
						'step'  => 1,
					],
				],
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field .wpforms-field-description, {{WRAPPER}} .quiktheme-wpforms .wpforms-field .wpforms-field-sublabel' => 'padding-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Placeholder
		 * -------------------------------------------------
		 */
		$this->start_controls_section(
			'section_placeholder_style',
			[
				'label'             => __( 'Placeholder', 'quiktheme-addons' ),
				'tab'               => Controls_Manager::TAB_STYLE,
				'condition'             => [
					'placeholder_switch'   => 'yes',
				],
			]
		);

		$this->add_control(
			'text_color_placeholder',
			[
				'label'             => __( 'Text Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-field input::-webkit-input-placeholder, {{WRAPPER}} .quiktheme-wpforms .wpforms-field textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
				],
				'condition'             => [
					'placeholder_switch'   => 'yes',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Style Tab: Radio & Checkbox
		 * -------------------------------------------------
		 */
		$this->start_controls_section(
			'section_radio_checkbox_style',
			[
				'label'                 => __( 'Radio & Checkbox', 'quiktheme-addons' ),
				'tab'                   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'custom_radio_checkbox',
			[
				'label'                 => __( 'Custom Styles', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SWITCHER,
				'label_on'              => __( 'Yes', 'quiktheme-addons' ),
				'label_off'             => __( 'No', 'quiktheme-addons' ),
				'return_value'          => 'yes',
			]
		);

		$this->add_responsive_control(
			'radio_checkbox_size',
			[
				'label'                 => __( 'Size', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => [
					'size'      => '15',
					'unit'      => 'px',
				],
				'range'                 => [
					'px'        => [
						'min'   => 0,
						'max'   => 80,
						'step'  => 1,
					],
				],
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'width: {{SIZE}}{{UNIT}} !important; height: {{SIZE}}{{UNIT}}',
				],
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_radio_checkbox_style' );

		$this->start_controls_tab(
			'radio_checkbox_normal',
			[
				'label'                 => __( 'Normal', 'quiktheme-addons' ),
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_control(
			'radio_checkbox_color',
			[
				'label'                 => __( 'Color', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'background: {{VALUE}}',
				],
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_responsive_control(
			'radio_checkbox_border_width',
			[
				'label'                 => __( 'Border Width', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SLIDER,
				'range'                 => [
					'px'        => [
						'min'   => 0,
						'max'   => 15,
						'step'  => 1,
					],
				],
				'size_units'            => [ 'px' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'border-width: {{SIZE}}{{UNIT}}',
				],
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_control(
			'radio_checkbox_border_color',
			[
				'label'                 => __( 'Border Color', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'border-color: {{VALUE}}',
				],
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_control(
			'checkbox_heading',
			[
				'label'                 => __( 'Checkbox', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::HEADING,
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_control(
			'checkbox_border_radius',
			[
				'label'                 => __( 'Border Radius', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_control(
			'radio_heading',
			[
				'label'                 => __( 'Radio Buttons', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::HEADING,
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_control(
			'radio_border_radius',
			[
				'label'                 => __( 'Border Radius', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::DIMENSIONS,
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'radio_checkbox_checked',
			[
				'label'                 => __( 'Checked', 'quiktheme-addons' ),
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->add_control(
			'radio_checkbox_color_checked',
			[
				'label'                 => __( 'Color', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::COLOR,
				'default'               => '',
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"]:checked:before, {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]:checked:before' => 'background: {{VALUE}}',
				],
				'condition'             => [
					'custom_radio_checkbox' => 'yes',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();

		/**
		 * Style Tab: Submit Button
		 * -------------------------------------------------
		 */
		$this->start_controls_section(
			'section_submit_button_style',
			[
				'label'             => __( 'Submit Button', 'quiktheme-addons' ),
				'tab'               => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'button_align',
			[
				'label'             => __( 'Alignment', 'quiktheme-addons' ),
				'type'              => Controls_Manager::CHOOSE,
				'options'           => [
					'left'        => [
						'title'   => __( 'Left', 'quiktheme-addons' ),
						'icon'    => 'eicon-h-align-left',
					],
					'center'      => [
						'title'   => __( 'Center', 'quiktheme-addons' ),
						'icon'    => 'eicon-h-align-center',
					],
					'right'       => [
						'title'   => __( 'Right', 'quiktheme-addons' ),
						'icon'    => 'eicon-h-align-right',
					],
				],
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container'   => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit' => 'display:inline-block;',
				],
				'condition'             => [
					'button_width_type' => 'custom',
				],
			]
		);

		$this->add_control(
			'button_width_type',
			[
				'label'                 => __( 'Width', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SELECT,
				'default'               => 'custom',
				'options'               => [
					'full-width'    => __( 'Full Width', 'quiktheme-addons' ),
					'custom'        => __( 'Custom', 'quiktheme-addons' ),
				],
				'prefix_class'          => 'quiktheme-wpforms-form-button-',
			]
		);

		$this->add_responsive_control(
			'button_width',
			[
				'label'                 => __( 'Width', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SLIDER,
				'default'               => [
					'size'      => '100',
					'unit'      => 'px',
				],
				'range'                 => [
					'px'        => [
						'min'   => 0,
						'max'   => 1200,
						'step'  => 1,
					],
				],
				'size_units'            => [ 'px', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit' => 'width: {{SIZE}}{{UNIT}}',
				],
				'condition'             => [
					'button_width_type' => 'custom',
				],
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label'             => __( 'Normal', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'button_bg_color_normal',
			[
				'label'             => __( 'Background Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_text_color_normal',
			[
				'label'             => __( 'Text Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'              => 'button_border_normal',
				'label'             => __( 'Border', 'quiktheme-addons' ),
				'placeholder'       => '1px',
				'default'           => '1px',
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'             => __( 'Border Radius', 'quiktheme-addons' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'             => __( 'Padding', 'quiktheme-addons' ),
				'type'              => Controls_Manager::DIMENSIONS,
				'size_units'        => [ 'px', 'em', '%' ],
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'button_margin',
			[
				'label'                 => __( 'Margin Top', 'quiktheme-addons' ),
				'type'                  => Controls_Manager::SLIDER,
				'range'                 => [
					'px'        => [
						'min'   => 0,
						'max'   => 100,
						'step'  => 1,
					],
				],
				'size_units'            => [ 'px', 'em', '%' ],
				'selectors'             => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container' => 'margin-top: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'                  => 'button_typography',
				'label'                 => __( 'Typography', 'quiktheme-addons' ),
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit',
				'separator'         => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'              => 'button_box_shadow',
				'selector'          => '{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit',
				'separator'         => 'before',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label'             => __( 'Hover', 'quiktheme-addons' ),
			]
		);

		$this->add_control(
			'button_bg_color_hover',
			[
				'label'             => __( 'Background Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit:hover' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_text_color_hover',
			[
				'label'             => __( 'Text Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'button_border_color_hover',
			[
				'label'             => __( 'Border Color', 'quiktheme-addons' ),
				'type'              => Controls_Manager::COLOR,
				'default'           => '',
				'selectors'         => [
					'{{WRAPPER}} .quiktheme-wpforms .wpforms-submit-container .wpforms-submit:hover' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

	}
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'contact-form', 'class', [
			'quiktheme-contact-form',
			'quiktheme-wpforms',
		] );

		$this->add_render_attribute( 'contact-form', 'class', 'placeholder-hide' );
		$this->add_render_attribute( 'contact-form', 'class', 'title-description-hide' );
		$this->add_render_attribute( 'contact-form', 'class', 'quiktheme-custom-radio-checkbox' );
		

		if ( function_exists( 'wpforms' ) ) {
			if ( ! empty( $settings['contact_form_list'] ) ) { ?>
				<div <?php echo wp_kses_post( $this->get_render_attribute_string( 'contact-form' ) ); ?>>
					<?php if ( 'yes' === $settings['custom_title_description'] ) { ?>
						<div class="quiktheme-wpforms-heading">
							<?php if ( $settings['form_title_custom'] ) { ?>
								<h3 class="quiktheme-contact-form-title quiktheme-wpforms-title">
									<?php echo esc_attr( $settings['form_title_custom'] ); ?>
								</h3>
							<?php } ?>
							<?php if ( $settings['form_description_custom'] ) { ?>
								<div class="quiktheme-contact-form-description quiktheme-wpforms-description">
									<?php echo $this->parse_text_editor( $settings['form_description_custom'] );  ?> 
								</div>
							<?php } ?>
						</div>
					<?php } ?>
					<?php
						$quik_theme_form_title = $settings['form_title'];
						$quik_theme_form_description = $settings['form_description'];

					if ( 'yes' === $settings['custom_title_description'] ) {
						$quik_theme_form_title = false;
						$quik_theme_form_description = false;
					}

						echo wpforms_display( $settings['contact_form_list'], $quik_theme_form_title, $quik_theme_form_description );  
					?>
				</div>
				<?php
			} 
		}
	}

}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_WP_Forms() );