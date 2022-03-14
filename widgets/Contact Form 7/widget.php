<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Css_Filter;
use \Elementor\Icons_Manager;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Quik_Theme_Contact_Form extends Widget_Base {

	public function get_name() {
		return 'quiktheme-contact-form';
	}

	public function get_title() {
		return esc_html__( 'Contact Form 7', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-mail';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
		return [ 'Contact_Form_7', 'Form', 'Contact'];
	}

	protected function _register_controls() {
        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => quik_theme_addons_is_cf7_activated() ? __( 'Contact Form 7', 'quiktheme-addons' ) : __( 'Notice', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        if ( !quik_theme_addons_is_cf7_activated() ) {
            $this->add_control(
                'cf7_missing_notice',
                [
                    'type'            => Controls_Manager::RAW_HTML,
                    'raw'             => sprintf(
                        __( 'Hi, it seems %1$s is missing in your site. Please install and activate %1$s first.', 'Exeter' ),
                        '<a href="https://wordpress.org/plugins/contact-form-7/" target="_blank" rel="noopener">Contact Form 7</a>'
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-warning',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'quik_theme_addons_form_ts',
            [
                'label'     => __( 'Form List Or ShortCode', 'quiktheme-addons' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'formlist',
                'options'   => [
                    'formlist'  => __( 'Form List', 'quiktheme-addons' ),
                    'shortcode' => __( 'Form ShortCode', 'quiktheme-addons' ),
                ],
                'separator' => 'after',
            ]
        );
        $this->add_control(
            'form_id',
            [
                'label'       => __( 'Select Your Form', 'quiktheme-addons' ),
                'type'        => Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => ['' => __( '', 'quiktheme-addons' )]+\quik_theme_addons_get_cf7_forms(),
                'condition'   => [
                    'quik_theme_addons_form_ts' => 'formlist',
                ],
            ]
        );
        $this->add_control(
            'contactform_shortecode',
            [
                'label'     => __( 'Enter your shortcode', 'quiktheme-addons' ),
                'type'      => Controls_Manager::TEXTAREA,
                'separator' => 'after',
                'condition' => [
                    'quik_theme_addons_form_ts' => 'shortcode',
                ],
            ]
        );
        $this->end_controls_section();

        //form fields style
        $this->start_controls_section(
            '_section_fields_style',
            [
                'label' => __( 'Fields', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'field_typography',
                'label'    => __( 'Typography', 'quiktheme-addons' ),
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)',
            ]
        );

        //field focus
        $this->start_controls_tabs( 'tabs_field_state' );
        $this->start_controls_tab(
            'tab_field_normal',
            [
                'label' => __( 'Normal', 'quiktheme-addons' ),
            ]
        );
        $this->add_control(
            'field_color',
            [
                'label'     => __( 'Text Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit)' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'response_field_color',
            [
                'label'     => __( 'Response Output Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-response-output' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'field_placeholder_color',
            [
                'label'     => __( 'Placeholder Text Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} ::-webkit-input-placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} ::-moz-placeholder'          => 'color: {{VALUE}};',
                    '{{WRAPPER}} ::-ms-input-placeholder'     => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'field_bg_color',
            [
                'label'     => __( 'Background Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance)' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'field_border',
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance)',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'field_box_shadow',
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance)',
            ]
        );
        $this->end_controls_tab();
        //f
        $this->start_controls_tab(
            'tab_field_focus',
            [
                'label' => __( 'Focus', 'quiktheme-addons' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'field_focus_border',
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance):focus',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'field_focus_box_shadow',
                'exclude'  => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance):focus',
            ]
        );
        $this->add_control(
            'field_focus_bg_color',
            [
                'label'     => __( 'Background Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance):focus' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control(
            'hr_one',
            [
                'type'  => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_control(
            'popover-toggle',
            [
                'label'        => __( 'Field advanced option', 'quiktheme-addons' ),
                'type'         => Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => __( 'Default', 'quiktheme-addons' ),
                'label_on'     => __( 'Custom', 'quiktheme-addons' ),
                'return_value' => 'yes',
            ]
        );
       //$this->start_popover();

        $this->add_responsive_control(
            'wpcf7_field_height',
            [
                'label'      => __( 'Fields Height', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance),{{WRAPPER}} .ha-cf7-form input:not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance) ' => 'height: {{SIZE}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'wpcf7_textarea_field_height',
            [
                'label'      => __( 'Textarea Height', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} textarea.wpcf7-textarea' => 'min-height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_responsive_control(
            'field_width',
            [
                'label'          => __( 'Width', 'quiktheme-addons' ),
                'type'           => Controls_Manager::SLIDER,
                'default'        => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units'     => ['%', 'px'],
                'range'          => [
                    '%'  => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 500,
                    ],
                ],
                'selectors'      => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance),{{WRAPPER}} .ha-cf7-form label' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'field_margin',
            [
                'label'      => __( 'Spacing Between', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'field_padding',
            [
                'label'      => __( 'Padding', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',

                ],
            ]
        );
        $this->add_responsive_control(
            'field_border_radius',
            [
                'label'      => __( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio):not(.wpcf7-checkbox):not(.wpcf7-acceptance)' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'textarea_margin',
            [
                'label'      => __( 'Textarea Margin', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}}  textarea.wpcf7-textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'textarea_border_radius',
            [
                'label'      => __( 'Textarea Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}}  textarea.wpcf7-textarea' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}!important;',
                ],
            ]
        );

        //$this->end_popover();

        $this->end_controls_section();

        //start button label style
        $this->start_controls_section(
            'cf7-form-label',
            [
                'label' => __( 'Label', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'label_margin',
            [
                'label'      => __( 'Spacing Bottom', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .wpcf7-form label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'hr3',
            [
                'type'  => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'label_typography',
                'label'    => __( 'Typography', 'quiktheme-addons' ),
                'selector' => '{{WRAPPER}} label',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'        => 'list_item_label_typography',
                'label'       => __( 'List Typography', 'quiktheme-addons' ),
                'selector'    => '{{WRAPPER}} .wpcf7-list-item-label',
                'description' => __( 'Chackbox or radio label typography.', 'quiktheme-addons' ),
            ]
        );

        $this->add_control(
            'label_color',
            [
                'label'     => __( 'Text Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} label' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_section();

        //start button
        $this->start_controls_section(
            'section_layout_button',
            [
                'label' => __( 'Button', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'button_text',
                'label'    => __( 'Typography', 'quiktheme-addons' ),
                'selector' => '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]',
            ]
        );
        // Button Position End
        $this->start_controls_tabs(
            'form_button_normals'
        );
        $this->start_controls_tab(
            'form_button_normal',
            [
                'label' => __( 'Normal', 'quiktheme-addons' ),
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label'     => __( 'Button Background Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_color',
            [
                'label'     => __( 'Button Text Color', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow',
                'exclude'  => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .wpcf7-submit',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'button_border',
                'label'    => __( 'Border', 'quiktheme-addons' ),
                'selector' => '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]',
            ]
        );
        $this->end_controls_tab();

        //start hover tab tab
        $this->start_controls_tab(
            'form_button_hover',
            [
                'label' => __( 'Hover', 'quiktheme-addons' ),
            ]
        );
        $this->add_control(
            'button_hover',
            [
                'label'     => __( 'Background Color Hover', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'button_bg_hover',
            [
                'label'     => __( 'Text Color Hover', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'button_box_shadow_hover',
                'exclude'  => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .wpcf7-submit:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'button_border_hover',
                'label'    => __( 'Border', 'quiktheme-addons' ),
                'selector' => '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]:hover',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        //button
        $this->add_control(
            'popover-toggle-icon',
            [
                'label'        => __( 'Icon Color', 'quiktheme-addons' ),
                'type'         => Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => __( 'Default', 'quiktheme-addons' ),
                'label_on'     => __( 'Custom', 'quiktheme-addons' ),
                'return_value' => 'yes',
            ]
        );
        $this->start_popover();


        $this->add_control(
            'icon_color',
            [
                'label'     => __( 'Icon Color', 'quiktheme-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button[type=submit] i, {{WRAPPER}} input[type=submit] i'      => 'color: {{VALUE}}',
                    '{{WRAPPER}} button[type=submit] path, {{WRAPPER}} input[type=submit] path' => 'stroke: {{VALUE}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_fill_color',
            [
                'label'     => __( 'Icon Fill Color', 'quiktheme-addons' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button[type=submit] path, {{WRAPPER}} input[type=submit] path' => 'fill: {{VALUE}}',
                ],
            ]
        );


        $this->end_popover();

        //button
        $this->add_control(
            'popover-toggle-button',
            [
                'label'        => __( 'Button advanced option', 'quiktheme-addons' ),
                'type'         => Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => __( 'Default', 'quiktheme-addons' ),
                'label_on'     => __( 'Custom', 'quiktheme-addons' ),
                'return_value' => 'yes',
            ]
        );
        // $this->start_popover();

        $this->add_responsive_control(
            'form_button_position',
            [
                'label'     => __( 'Position', 'quiktheme-addons' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'default',
                'options'   => [
                    ''         => __( 'Default', 'quiktheme-addons' ),
                    'absolute' => __( 'Absolute', 'quiktheme-addons' ),
                    'static'   => __( 'Static', 'quiktheme-addons' ),
                    'relative' => __( 'Relative', 'quiktheme-addons' ),
                ],
                'separator' => 'after',

                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons--contactform-wraper [type=submit]' => 'position: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'quik_theme_addons_offset_x_end',
            [
                'label'      => __( 'Offset X', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'range'      => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%'  => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'default'    => [
                    'size' => '0',
                ],
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons--contactform-wraper [type=submit]' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'quik_theme_addons_offset_y',
            [
                'label'      => __( 'Offset Y', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'range'      => [
                    'px' => [
                        'min'  => -1000,
                        'max'  => 1000,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min' => -200,
                        'max' => 200,
                    ],
                ],
                'size_units' => ['px', '%'],
                'default'    => [
                    'size' => '0',
                ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons--contactform-wraper [type=submit]' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'hr_there',
            [
                'type'  => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->add_responsive_control(
            'button_width',
            [
                'label'      => __( 'Width', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 150,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'button_height',
            [
                'label'      => __( 'Height', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['%', 'px'],
                'range'      => [
                    'px' => [
                        'min'  => 0,
                        'max'  => 150,
                        'step' => 1,
                    ],
                    '%'  => [
                        'min'  => 0,
                        'max'  => 100,
                        'step' => 1,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'btn_margin',
            [
                'label'      => __( 'Margin', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]'          => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .quiktheme-addons-contact-from [type=submit]' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label'      => __( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from [type=submit]'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .quiktheme-addons-contact-from [type=submit]' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        // $this->end_popover();

        $this->end_controls_section();
        //button end

        //Form Box
        $this->start_controls_section(
            '_form_box_style',
            [
                'label' => __( 'Box', 'quiktheme-addons' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'form_box_align',
            [
                'label'     => __( 'Align', 'quiktheme-addons' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'quiktheme-addons' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'quiktheme-addons' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'quiktheme-addons' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .quiktheme-addons--contactform-wraper input' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .quiktheme-addons--contactform-wraper textarea' => 'text-align: {{VALUE}};',
                ],
                'toggle'    => true,
            ]
        );
        $this->add_control(
            'form_box_bg',
            [
                'label'     => __( 'Background', 'quiktheme-addons' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'form_border',
                'selector' => '{{WRAPPER}} .quiktheme-addons-contact-from',
            ]
        );

        $this->add_responsive_control(
            'wpcf7_form_width',
            [
                'label'      => __( 'Form Width', 'quiktheme-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range'      => [
                    'px' => [
                        'min' => 1,
                        'max' => 2000,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} form.wpcf7-form' => 'width:{{SIZE}}{{UNIT}};',

                ],
            ]
        );

        $this->add_responsive_control(
            'form_box_padding',
            [
                'label'      => __( 'Padding', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from'          => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .quiktheme-addons-contact-from' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'form_box_border_redius',
            [
                'label'      => __( 'Border Radius', 'quiktheme-addons' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-contact-from'          => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .quiktheme-addons-contact-from' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

	protected function render() {
        if ( !quik_theme_addons_is_cf7_activated() ) {
            return;
        }
        $settings = $this->get_settings();
        $quik_theme_addons_form_sl = $settings['quik_theme_addons_form_ts'];
        $quik_theme_addons_form_id = $settings['form_id'];
        $quik_theme_addons_contactform_shortecode = $settings['contactform_shortecode'];

        ?>

        <?php if ( !empty( $quik_theme_addons_form_id && $quik_theme_addons_form_sl == 'formlist' ) ):
        ?>
        <div class="quiktheme-addons--contactform-wraper  quiktheme-addons-contact-from ">
            <?php
            echo quik_theme_addons_do_shortcode( 'contact-form-7', [
            'id' => $settings['form_id'],
        ] );
        ?>
        </div>
        <?php
        elseif ( $quik_theme_addons_form_sl == 'shortcode' ):
        ?>
            <div class="quiktheme-addons--contactform-wraper <?php echo esc_attr( $quik_theme_addons_form_bp ) ?> quiktheme-addons-contact-from">
                <?php echo quik_theme_addons_get_meta( $quik_theme_addons_contactform_shortecode ); ?>
            </div>
            <?php
        endif;
    }

}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Contact_Form() );