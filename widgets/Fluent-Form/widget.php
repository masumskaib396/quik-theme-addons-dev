<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Box_Shadow;
use \Elementor\Widget_Base;

class Quik_Theme_Fluent_Form extends Widget_Base {

	public function get_name() {
		return 'quiktheme-fluent-form';
	}

	public function get_title() {
		return esc_html__( 'Quiktheme Fluent Form', 'quiktheme-addons' );
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
	protected function _register_controls()
    {

        if (!defined('FLUENTFORM')) {
            $this->start_controls_section(
                'quik_theme_global_warning',
                [
                    'label' => __('Warning!', 'quiktheme-addons'),
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

            $this->end_controls_section();
        } else {
             $this->start_controls_section(
                'section_form_info_box',
                [
                    'label' => __('Fluent Form', 'quiktheme-addons'),
                ]
            );

            

            $this->add_control(
                'form_list',
                [
                    'label' => esc_html__('Fluent Form', 'quiktheme-addons'),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => quik_theme_get_fluent_forms(),
                    'default' => '0',
                ]
            );
            $this->add_control(
                'custom_title_description',
                [
                    'label' => __('Custom Title & Description', 'quiktheme-addons'),
                    'type' => Controls_Manager::SWITCHER,
                    'label_on' => __('Yes', 'quiktheme-addons'),
                    'label_off' => __('No', 'quiktheme-addons'),
                    'return_value' => 'yes',
                ]
            );

            $this->add_control(
                'form_title_custom',
                [
                    'label' => esc_html__('Title', 'quiktheme-addons'),
                    'type' => Controls_Manager::TEXT,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'label_block' => true,
                    'default' => '',
                    'condition' => [
                        'custom_title_description' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'form_description_custom',
                [
                    'label' => esc_html__('Description', 'quiktheme-addons'),
                    'type' => Controls_Manager::TEXTAREA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => '',
                    'condition' => [
                        'custom_title_description' => 'yes',
                    ],
                ]
            );

            $this->add_control(
                'labels_switch',
                [
                    'label' => __('Labels', 'quiktheme-addons'),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'label_on' => __('Show', 'quiktheme-addons'),
                    'label_off' => __('Hide', 'quiktheme-addons'),
                    'return_value' => 'yes'
                ]
            );

            $this->add_control(
                'placeholder_switch',
                [
                    'label' => __('Placeholder', 'quiktheme-addons'),
                    'type' => Controls_Manager::SWITCHER,
                    'default' => 'yes',
                    'label_on' => __('Show', 'quiktheme-addons'),
                    'label_off' => __('Hide', 'quiktheme-addons'),
                    'return_value' => 'yes',
                ]
            );
            $this->end_controls_section();
        }
       
        $this->start_controls_section(
            'section_form_title_style',
            [
                'label' => __('Title & Description', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_alignment',
            [
                'label' => __('Alignment', 'quiktheme-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'quiktheme-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'quiktheme-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'quiktheme-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-fluentform-title' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .quiktheme-fluentform-description' => 'text-align: {{VALUE}};',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'label' => __('Title', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'form_title_text_color',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-fluentform-title' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_title_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-fluentform-title',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_title_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'allowed_dimensions' => 'vertical',
                'placeholder' => [
                    'top' => '',
                    'right' => 'auto',
                    'bottom' => '',
                    'left' => 'auto',
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-fluentform-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'description_heading',
            [
                'label' => __('Description', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'form_description_text_color',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-fluentform-description' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'form_description_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-fluentform-description',
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_description_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'allowed_dimensions' => 'vertical',
                'placeholder' => [
                    'top' => '',
                    'right' => 'auto',
                    'bottom' => '',
                    'left' => 'auto',
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-fluentform-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_title_description' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_container_style',
            [
                'label' => __('Form Container', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'quik_theme_contact_form_background',
            [
                'label' => esc_html__('Form Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form' => 'background: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'fluentform_link_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'quik_theme_contact_form_alignment',
            [
                'label' => esc_html__('Form Alignment', 'quiktheme-addons'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => true,
                'options' => [
                    'default' => [
                        'title' => __('Default', 'quiktheme-addons'),
                        'icon' => 'fa fa-ban',
                    ],
                    'left' => [
                        'title' => esc_html__('Left', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'default',
            ]
        );

        $this->add_responsive_control(
            'quik_theme_contact_form_max_width',
            [
                'label' => esc_html__('Form Max Width', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 1500,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 80,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form' => 'width: {{SIZE}}{{UNIT}};'
                ],
            ]
        );

        $this->add_responsive_control(
            'quik_theme_contact_form_margin',
            [
                'label' => esc_html__('Form Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'quik_theme_contact_form_padding',
            [
                'label' => esc_html__('Form Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'quik_theme_contact_form_border_radius',
            [
                'label' => esc_html__('Border Radius', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'separator' => 'before',
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'quik_theme_contact_form_border',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'quik_theme_contact_form_box_shadow',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_label_style',
            [
                'label' => __('Labels', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color_label',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_label',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group label',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_fields_style',
            [
                'label' => __('Input & Textarea', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'input_alignment',
            [
                'label' => __('Alignment', 'quiktheme-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'quiktheme-addons'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'quiktheme-addons'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'quiktheme-addons'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=text]):not([type=email]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group input[type=email] ' => 'float: {{VALUE}};',
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group input[type=text] ' => 'float: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_fields_style');

        $this->start_controls_tab(
            'tab_fields_normal',
            [
                'label' => __('Normal', 'quiktheme-addons'),
            ]
        );

        $this->add_control(
            'field_bg_color',
            [
                'label' => __('Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'field_text_color',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'field_border',
                'label' => __('Border', 'quiktheme-addons'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'field_radius',
            [
                'label' => __('Border Radius', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_text_indent',
            [
                'label' => __('Text Indent', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 60,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 30,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'text-indent: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'input_width',
            [
                'label' => __('Input Width', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'input_height',
            [
                'label' => __('Input Height', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'textarea_width',
            [
                'label' => __('Textarea Width', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea' => 'width: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'textarea_height',
            [
                'label' => __('Textarea Height', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 400,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea' => 'height: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'field_spacing',
            [
                'label' => __('Spacing', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group' => 'margin-bottom: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'field_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'field_box_shadow',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group select',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_fields_focus',
            [
                'label' => __('Focus', 'quiktheme-addons'),
            ]
        );

        $this->add_control(
            'field_bg_color_focus',
            [
                'label' => __('Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea:focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'focus_input_border',
                'label' => __('Border', 'quiktheme-addons'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea:focus',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'focus_box_shadow',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]):focus, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea:focus',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Placeholder
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_placeholder_style',
            [
                'label' => __('Placeholder', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'placeholder_switch' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'text_color_placeholder',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group input::-webkit-input-placeholder, {{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group textarea::-webkit-input-placeholder' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'placeholder_switch' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_radio_checkbox_style',
            [
                'label' => __('Radio & Checkbox', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'custom_radio_checkbox',
            [
                'label' => __('Custom Styles', 'quiktheme-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'quiktheme-addons'),
                'label_off' => __('No', 'quiktheme-addons'),
                'return_value' => 'yes',
            ]
        );

        $this->add_responsive_control(
            'radio_checkbox_size',
            [
                'label' => __('Size', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => '15',
                    'unit' => 'px',
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_radio_checkbox_style');

        $this->start_controls_tab(
            'radio_checkbox_normal',
            [
                'label' => __('Normal', 'quiktheme-addons'),
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_checkbox_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_responsive_control(
            'checkbox_border_width',
            [
                'label' => __('Border Width', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 15,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'border-width: {{SIZE}}{{UNIT}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'checkbox_border_color',
            [
                'label' => __('Border Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]' => 'border-color: {{VALUE}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'checkbox_heading',
            [
                'label' => __('Checkbox', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'checkbox_border_radius',
            [
                'label' => __('Border Radius', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_heading',
            [
                'label' => __('Radio Buttons', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING,
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_border_radius',
            [
                'label' => __('Border Radius', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"], {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]:before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'radio_checkbox_checked',
            [
                'label' => __('Checked', 'quiktheme-addons'),
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'radio_checkbox_color_checked',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="checkbox"]:checked:before, {{WRAPPER}} .quiktheme-custom-radio-checkbox input[type="radio"]:checked:before' => 'background: {{VALUE}}',
                ],
                'condition' => [
                    'custom_radio_checkbox' => 'yes',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Section Break Style
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_break_style',
            [
                'label' => __('Section Break Style', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_break_label',
            [
                'label' => __('Label', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING
            ]
        );

        $this->add_control(
            'section_break_label_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break .ff-el-section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_break_label_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '.quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break .ff-el-section-title',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'section_break_label_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break .ff-el-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_break_label_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break .ff-el-section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_break_description',
            [
                'label' => __('Description', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'section_break_description_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break div' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_break_description_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break div',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'section_break_description_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_break_description_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-section-break div' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'section_break_alignment',
            [
                'label' => __('Alignment', 'quiktheme-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'prefix_class' => 'quiktheme-fluentform-section-break-content-'
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_table_grid',
            [
                'label' => __('Checkbox Grid Style', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'section_table_grid_head',
            [
                'label' => __('Grid Table Head', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'section_table_grid_head_color',
            [
                'label' => __('Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table thead th' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'section_table_grid_head_text_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table thead th' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'section_table_grid_head_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table thead th',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'section_table_grid_head_height',
            [
                'label' => __('Height', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table thead th' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'section_table_grid_head_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table thead th' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'section_table_grid_item',
            [
                'label' => __('Grid Table Item', 'quiktheme-addons'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before'
            ]
        );

        $this->add_control(
            'table_grid_item_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table tbody tr td' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'table_grid_item_bg_color',
            [
                'label' => __('Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table tbody tr td' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'table_grid_item_odd_bg_color',
            [
                'label' => __('Odd Item Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .ff-checkable-grids tbody>tr:nth-child(2n)>td' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'table_grid_item_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table tbody tr td',
            ]
        );

        $this->add_responsive_control(
            'section_table_grid_item_height',
            [
                'label' => __('Height', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table tbody tr td' => 'height: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'section_table_grid_item_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-table tbody tr td' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Address Line
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_address_line_style',
            [
                'label' => __('Address Line Style', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'address_line_label_color',
            [
                'label' => __('Label Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .fluent-address label' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'address_line_label_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .fluent-address label',
            ]
        );

        $this->end_controls_section();

        /**
         * Style Tab: Submit Button
         * -------------------------------------------------
         */
        $this->start_controls_section(
            'section_submit_button_style',
            [
                'label' => __('Submit Button', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label' => __('Alignment', 'quiktheme-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => '',
                'prefix_class' => 'quiktheme-fluentform-form-button-',
                'condition' => [
                    'button_width_type' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'button_width_type',
            [
                'label' => __('Width', 'quiktheme-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'custom',
                'options' => [
                    'full-width' => __('Full Width', 'quiktheme-addons'),
                    'custom' => __('Custom', 'quiktheme-addons'),
                ],
                'prefix_class' => 'quiktheme-fluentform-form-button-',
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label' => __('Width', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1200,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit' => 'width: {{SIZE}}{{UNIT}}',
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper.quiktheme-contact-form-align-default .ff-el-group .ff-btn-submit' => 'width: {{SIZE}}{{UNIT}};min-width: inherit;',
                ],
                'condition' => [
                    'button_width_type' => 'custom',
                ],
            ]
        );

        $this->start_controls_tabs('tabs_button_style');

        $this->start_controls_tab(
            'tab_button_normal',
            [
                'label' => __('Normal', 'quiktheme-addons'),
            ]
        );

        $this->add_control(
            'button_bg_color_normal',
            [
                'label' => __('Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#409EFF',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_normal',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border_normal',
                'label' => __('Border', 'quiktheme-addons'),
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Margin Top', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit' => 'margin-top: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

	    $this->add_responsive_control(
		    'button_position',
		    [
			    'label' => __('Button Position', 'quiktheme-addons'),
			    'type' => Controls_Manager::SLIDER,
			    'range' => [
				    'px' => [
					    'min' => 0,
					    'max' => 1000,
					    'step' => 1,
				    ],
			    ],
			    'size_units' => ['px', 'em', '%'],
			    'selectors' => [
				    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper.quiktheme-fluent-form-subscription .ff-el-group .ff-btn-submit' => 'right: {{SIZE}}{{UNIT}};position: relative;min-width: inherit;',
			    ],
		    ]
	    );



        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit',
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'tab_button_hover',
            [
                'label' => __('Hover', 'quiktheme-addons'),
            ]
        );

        $this->add_control(
            'button_bg_color_hover',
            [
                'label' => __('Background Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit:hover' => 'background-color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit:hover' => 'color: {{VALUE}} !important;',
                ],
            ]
        );

        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __('Border Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-contact-form.quiktheme-fluent-form-wrapper .ff-el-group .ff-btn-submit:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /**
         * Style Tab: Success Message
         * -------------------------------------------------
         */

         if( defined("FLUENTFORMPRO") ) {
             
            $this->start_controls_section(
                'section_pagination_style',
                [
                    'label' => __('Pagination', 'quiktheme-addons'),
                    'tab' => Controls_Manager::TAB_STYLE,
                ]
            );
    
            $this->start_controls_tabs('form_progressbar_style_tabs');
    
                $this->start_controls_tab(
                    'form_progressbar_normal',
                    [
                        'label' => __('Normal', 'quiktheme-addons'),
                    ]
                );
    
                $this->add_control(
                    'pagination_progressbar_label',
                    [
                        'label' => __('Label', 'quiktheme-addons'),
                        'type' => Controls_Manager::HEADING
                    ]
                );
    
                $this->add_control(
                    'show_label',
                    [
                        'label'     => __( 'Show Label', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::SWITCHER,
                        'label_on'  => __( 'Show', 'quiktheme-addons' ),
                        'label_off' => __( 'Hide', 'quiktheme-addons' ),
                        'return_value' => 'yes',
                        'default'   => 'yes',
                        'prefix_class'  => 'quiktheme-ff-step-header-'
                    ]
                );
    
                $this->add_control(
                    'label_color',
                    [
                        'label'     => __( 'Label Color', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::COLOR,
                        'scheme'    => [
                            'type'  => Color::get_type(),
                            'value' => Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ff-el-progress-status' => 'color: {{VALUE}}',
                        ],
                        'condition' => [
                            'show_label'    => 'yes'
                        ]
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'label_typography',
                        'label' => __( 'Typography', 'quiktheme-addons' ),
                        'scheme' => Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .ff-el-progress-status',
                        'condition' => [
                            'show_label'    => 'yes'
                        ]
                    ]
                );
    
                $this->add_control(
                    'label_space',
                    [
                        'label' => __( 'Spacing', 'quiktheme-addons' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .ff-el-progress-status' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'condition' => [
                            'show_label'    => 'yes'
                        ],
                        'separator' => 'after'
                    ]
                );
    
                $this->add_control(
                    'pagination_progressbar',
                    [
                        'label' => __('Progressbar', 'quiktheme-addons'),
                        'type' => Controls_Manager::HEADING,
                    ]
                );
    
                $this->add_control(
                    'show_progressbar',
                    [
                        'label'     => __( 'Show Progressbar', 'quiktheme-addons' ),
                        'type'      => Controls_Manager::SWITCHER,
                        'label_on'  => __( 'Show', 'quiktheme-addons' ),
                        'label_off' => __( 'Hide', 'quiktheme-addons' ),
                        'return_value' => 'yes',
                        'default'   => 'yes',
                        'prefix_class'  => 'quiktheme-ff-step-progressbar-'
                    ]
                );
    
                $this->add_control(
                    'progressbar_height',
                    [
                        'label' => __( 'Height', 'quiktheme-addons' ),
                        'type' => Controls_Manager::SLIDER,
                        'size_units' => [ 'px' ],
                        'range' => [
                            'px' => [
                                'min' => 0,
                                'max' => 100,
                                'step' => 1,
                            ]
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ff-el-progress' => 'height: {{SIZE}}{{UNIT}};',
                        ],
                        'condition' => [
                            'show_progressbar'  => 'yes'
                        ]
                    ]
                );
    
                $this->add_control(
                    'progressbar_color',
                    [
                        'label' => __( 'Title Color', 'quiktheme-addons' ),
                        'type'  =>   Controls_Manager::COLOR,
                        'scheme' => [
                            'type' =>   Color::get_type(),
                            'value' =>  Color::COLOR_1,
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .ff-el-progress-bar span' => 'color: {{VALUE}};',
                        ],
                        'condition' => [
                            'show_progressbar'  => 'yes'
                        ]
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'progressbar_border',
                        'label' => __( 'Border', 'quiktheme-addons' ),
                        'selector' => '{{WRAPPER}} .ff-el-progress',
                        'condition' => [
                            'show_progressbar'  => 'yes'
                        ]
                    ]
                );
    
                $this->add_control(
                    'progressbar_border_radius',
                    [
                        'label' => __( 'Border Radius', 'quiktheme-addons' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .ff-el-progress' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                        'condition' => [
                            'show_progressbar'  => 'yes'
                        ]
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'progressbar_bg',
                        'label' => __( 'Background', 'quiktheme-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .ff-el-progress',
                        'condition' => [
                            'show_progressbar'  => 'yes'
                        ],
                        'exclude'    => [
                            'image'
                        ]
                    ]
                );
    
                $this->end_controls_tab();
    
                $this->start_controls_tab(
                    'form_progressbar_filled',
                    [
                        'label' => __('Filled', 'quiktheme-addons'),
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'progressbar_bg_filled',
                        'label' => __( 'Background', 'quiktheme-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .ff-el-progress-bar',
                        'condition' => [
                            'show_progressbar'  => 'yes'
                        ],
                        'exclude'    => [
                            'image'
                        ]
                    ]
                );
    
    
                $this->end_controls_tab();
    
            $this->end_controls_tabs();
    
    
            $this->start_controls_tabs(
                'form_pagination_button_style_tabs',
                [
                    'separator' => 'before'
                ]
            );
    
                $this->start_controls_tab(
                    'form_pagination_button',
                    [
                        'label' => __('Normal', 'quiktheme-addons'),
                    ]
                );
    
                $this->add_control(
                    'pagination_button_style',
                    [
                        'label' => __('Button', 'quiktheme-addons'),
                        'type' => Controls_Manager::HEADING
                    ]
                );
    
                $this->add_control(
                    'pagination_button_color',
                    [
                        'label' => __( 'Color', 'quiktheme-addons' ),
                        'type'  =>   Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .step-nav button' => 'color: {{VALUE}};',
                        ]
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Typography::get_type(),
                    [
                        'name' => 'pagination_button_typography',
                        'label' => __( 'Typography', 'quiktheme-addons' ),
                        'scheme' => Typography::TYPOGRAPHY_1,
                        'selector' => '{{WRAPPER}} .step-nav button',
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'pagination_button_bg',
                        'label' => __( 'Background', 'quiktheme-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .step-nav button',
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'pagination_button_border',
                        'label' => __( 'Border', 'quiktheme-addons' ),
                        'selector' => '{{WRAPPER}} .step-nav button',
                    ]
                );
    
                $this->add_control(
                    'pagination_button_border_radius',
                    [
                        'label' => __( 'Border Radius', 'quiktheme-addons' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .step-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
    
                $this->add_control(
                    'pagination_button_padding',
                    [
                        'label' => __( 'Padding', 'quiktheme-addons' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .step-nav button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
    
                $this->end_controls_tab();
    
                $this->start_controls_tab(
                    'form_pagination_button_hover',
                    [
                        'label' => __('Hover', 'quiktheme-addons'),
                    ]
                );
    
                $this->add_control(
                    'pagination_button_hover_color',
                    [
                        'label' => __( 'Color', 'quiktheme-addons' ),
                        'type'  =>   Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .step-nav button:hover' => 'color: {{VALUE}};',
                        ]
                    ]
                );
    
                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'pagination_button_hover_bg',
                        'label' => __( 'Background', 'quiktheme-addons' ),
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .step-nav button:hover',
                    ]
                );
    
                $this->add_control(
                    'pagination_button_border_hover_radius',
                    [
                        'label' => __( 'Border Radius', 'quiktheme-addons' ),
                        'type' => Controls_Manager::DIMENSIONS,
                        'size_units' => [ 'px', '%', 'em' ],
                        'selectors' => [
                            '{{WRAPPER}} .step-nav button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                        ],
                    ]
                );
    
                $this->end_controls_tab();
    
            $this->end_controls_tabs();
    
    
            $this->end_controls_section();
         }
        

       


    }
    protected function render()
    {

        if( ! defined('FLUENTFORM') ) return;


        $settings = $this->get_settings_for_display();

        $this->add_render_attribute(
            'quik_theme_fluentform_wrapper',
            [
                'class' => [
                    'quiktheme-contact-form',
                    'quiktheme-fluent-form-wrapper',
                    'clearfix'
                ]
            ]
        );

        if ( $settings['placeholder_switch'] != 'yes' ) {
            $this->add_render_attribute( 'quik_theme_fluentform_wrapper', 'class', 'placeholder-hide' );
        }

        if( $settings['labels_switch'] != 'yes' ) {
            $this->add_render_attribute( 'quik_theme_fluentform_wrapper', 'class', 'fluent-form-labels-hide' );
        }

        if ( $settings['custom_radio_checkbox'] == 'yes' ) {
            $this->add_render_attribute( 'quik_theme_fluentform_wrapper', 'class', 'quiktheme-custom-radio-checkbox' );
        }
        if ( $settings['quik_theme_contact_form_alignment'] == 'left' ) {
            $this->add_render_attribute( 'quik_theme_fluentform_wrapper', 'class', 'quiktheme-contact-form-align-left' );
        }
        elseif ( $settings['quik_theme_contact_form_alignment'] == 'center' ) {
            $this->add_render_attribute( 'quik_theme_fluentform_wrapper', 'class', 'quiktheme-contact-form-align-center' );
        }
        elseif ( $settings['quik_theme_contact_form_alignment'] == 'right' ) {
            $this->add_render_attribute( 'quik_theme_fluentform_wrapper', 'class', 'quiktheme-contact-form-align-right' );
        }
        else {
            $this->add_render_attribute( 'quik_theme_fluentform_wrapper', 'class', 'quiktheme-contact-form-align-default' );
        }

        
        ?>
        <div <?php echo $this->get_render_attribute_string('quik_theme_fluentform_wrapper'); ?>>

            <?php if ( $settings['custom_title_description'] == 'yes' ) { ?>
                <div class="quiktheme-fluentform-heading">
                    <?php if ( $settings['form_title_custom'] != '' ) { ?>
                        <h3 class="quiktheme-contact-form-title quiktheme-fluentform-title">
                            <?php echo esc_attr( $settings['form_title_custom'] ); ?>
                        </h3>
                    <?php } ?>
                    <?php if ( $settings['form_description_custom'] != '' ) { ?>
                        <div class="quiktheme-contact-form-description quiktheme-fluentform-description">
                            <?php echo $this->parse_text_editor( $settings['form_description_custom'] ); ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>

            <?php echo do_shortcode( '[fluentform id="' . $settings['form_list'] . '" ]' ); ?>
        </div>

        <?php
    }
	

}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Fluent_Form() );