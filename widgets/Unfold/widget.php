<?php
namespace Quik_Theme_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class Quik_Theme_Unfold extends Widget_Base {

    public $button_condition = [
        'relation' => 'or',
        'terms' => [
            [
                'relation' => 'and',
                'terms' => [
                    [
                        'name' => 'trigger',
                        'operator' => '==',
                        'value' => 'hover',
                    ],
                    [
                        'name' => 'button_disable',
                        'operator' => '!=',
                        'value' => 'yes'
                    ]
                ]
            ],
            [
                'terms' => [
                    [
                        'name' => 'trigger',
                        'operator' => '==',
                        'value' => 'click',
                    ]
                ]
            ]
        ],
    ];

    public function get_name() {
		return 'quiktheme-unfold';
	}
    public function get_title() {
        return __('Unfold', 'quiktheme-addons');
    }

    public function get_icon() {
        return 'feather icon-film';
    }
    public function get_categories() {
        return [ 'quiktheme-addons' ];
    }

    public function get_keywords() {
        return ['unfold', 'fold'];
    }


    protected function register_controls() {

        $this->start_controls_section(
            '_section_content',
            [
                'label' => __('Content', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Title', 'quiktheme-addons'),
                'default' => __('Unfold Magic', 'quiktheme-addons'),
                'placeholder' => __('Type Unfold Title', 'quiktheme-addons'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'editor',
            [
                'label' => __('Content Editor', 'quiktheme-addons'),
                'show_label' => false,
                'type' => Controls_Manager::WYSIWYG,
                'default' => '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );



        $this->add_responsive_control(
            'content_align',
            [
                'label' => __('Alignment', 'quiktheme-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper' => 'align-items:{{VALUE}}; text-align: {{VALUE}}'
                ],
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            '_section_fold',
            [
                'label' => __('Fold/ Unfold Options', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'trigger',
            [
                'label' => __('Trigger', 'quiktheme-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'click',
                'options' => [
                    'click'  => __('Click', 'quiktheme-addons'),
                    'hover' => __('Hover', 'quiktheme-addons'),
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'trigger_notice',
            [
                'raw' => '<strong>' . esc_html__('Note!', 'quiktheme-addons') . '</strong> ' . esc_html__('Please disable the button under "Button" section. ', 'quiktheme-addons') . '<br>'. esc_html__('Having both button & trigger hover will make the button non functioning.', 'quiktheme-addons'),
                'type' => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
                'render_type' => 'ui',
                'condition' => [
                    'trigger' => 'hover',
                ],
            ]
        );

        $this->add_responsive_control(
            'fold_height',
            [
                'label' => __('Fold Height (px)', 'quiktheme-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 1000,
                'step' => 1,
                'default' => 100,
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'transition_duration',
            [
                'label' => __('Transition Duration (ms)', 'quiktheme-addons'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 3000,
                'step' => 1,
                'default' => 500,
                'frontend_available' => true,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            '_section_button',
            [
                'label' => __('Button', 'quiktheme-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_disable',
            [
                'label' => __('Disable Button?', 'quiktheme-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'quiktheme-addons'),
                'label_off' => __('No', 'quiktheme-addons'),
                'return_value' => 'yes',
                'default' => '',
                'condition' => [
                    'trigger' => 'hover',
                ],
            ]
        );

        $this->add_control(
            'content_position',
            [
                'label' => __('Button Position Above Content?', 'quiktheme-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'quiktheme-addons'),
                'label_off' => __('No', 'quiktheme-addons'),
                'return_value' => 'yes',
                'default' => '',
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_control(
            'unfold_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Unfold Text', 'quiktheme-addons'),
                'default' => __('Read More', 'quiktheme-addons'),
                'placeholder' => __('Type Unfold Text', 'quiktheme-addons'),
                'frontend_available' => true,
                'conditions' => $this->button_condition,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'unfold_icon',
            [
                'label' => __('Unfold Icon', 'quiktheme-addons'),
                'type' => Controls_Manager::ICONS,
                'label_block' => false,
                'skin' => 'inline',
                'exclude_inline_options' => ['svg'],
                'frontend_available' => true,
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_control(
            'fold_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Fold Text', 'quiktheme-addons'),
                'default' => __('Read Less', 'quiktheme-addons'),
                'placeholder' => __('Type Fold Text', 'quiktheme-addons'),
                'frontend_available' => true,
                'conditions' => $this->button_condition,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $this->add_control(
            'fold_icon',
            [
                'label' => __('Fold Icon', 'quiktheme-addons'),
                'type' => Controls_Manager::ICONS,
                'label_block' => false,
                'skin' => 'inline',
                'exclude_inline_options' => ['svg'],
                'frontend_available' => true,
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_control(
            'icon_position',
            [
                'label' => __('Icon Position', 'quiktheme-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'before',
                'options' => [
                    'before'  => __('Before', 'quiktheme-addons'),
                    'after' => __('After', 'quiktheme-addons'),
                ],
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label' => __('Alignment', 'quiktheme-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'quiktheme-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn' => 'align-self:{{VALUE}};'
                ],
                'style_transfer' => true,
                'conditions' => $this->button_condition,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_box',
            [
                'label' => __('Box', 'quiktheme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'box_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} > .elementor-widget-container',
            ]
        );

        $this->add_control(
            'box_border_radius',
            [
                'label' => __('Border Radius', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} > .elementor-widget-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('box_background_tabs');

        $this->start_controls_tab(
            'box_background_tab',
            [
                'label' => __('Normal', 'quiktheme-addons'),

            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_background',
                'label' => __('Background', 'quiktheme-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} > .elementor-widget-container',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'box_background_tab_hover',
            [
                'label' => __('Hover', 'quiktheme-addons'),

            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_background_hover',
                'label' => __('Background', 'quiktheme-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'label' => __('Box Shadow', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}}:hover .elementor-widget-container',
            ]
        );

        $this->add_control(
            'box_border_color_hover',
            [
                'label' => __('Border Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'box_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}}:hover .elementor-widget-container' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control(
            'overlay_height',
            [
                'label' => __('Overlay Height', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'separator' => 'before',
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-data::after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'overlay_color',
                'label'    => esc_html__('Overlay Color', 'quiktheme-addons'),
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-data::after',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Overlay Color', 'quiktheme-addons'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __('Title', 'quiktheme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-heading',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'label' => __('Text Shadow', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-heading',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Content', 'quiktheme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '20',
                    'right' => '20',
                    'bottom' => '20',
                    'left' => '20',
                    'unit' => 'px',
                    'isLinked' => 'true',
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-data-render' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __('Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-data-render' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-data-render',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'content_shadow',
                'label' => __('Shadow', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-data-render',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'quiktheme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Margin', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'default' => [
                    'top' => '10',
                    'right' => '16',
                    'bottom' => '10',
                    'left' => '16',
                    'unit' => 'px',
                    'isLinked' => 'false',
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_space_between',
            [
                'label' => __('Space Between Icon & Text', 'quiktheme-addons'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 10,
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn.quiktheme-unfold-icon-after i + span' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn.quiktheme-unfold-icon-before i + span' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn',
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Border', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'quiktheme-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('button_tabs');

        $this->start_controls_tab(
            'button_tab',
            [
                'label' => __('Normal', 'quiktheme-addons'),

            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_icon_color',
            [
                'label' => __('Icon Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn i' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => __('Background', 'quiktheme-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => __('Box Shadow', 'quiktheme-addons'),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_tab_hover',
            [
                'label' => __('Hover', 'quiktheme-addons'),

            ]
        );


        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_icon_color_hover',
            [
                'label' => __('Icon Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background_hover',
                'label' => __('Background', 'quiktheme-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn:hover',
            ]
        );


        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __('Border Color', 'quiktheme-addons'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow_hover',
                'label' => __('Box Shadow', 'quiktheme-addons'),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .quiktheme-unfold-widget-wrapper .quiktheme-unfold-btn:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <div class="quiktheme-unfold-widget-wrapper<?php echo esc_attr(($settings['content_position'] == 'yes') ? ' quiktheme-unfold-direction-below' : ''); ?>">
            <?php if (!empty($settings['title'])) : ?>
                <h2 class="quiktheme-unfold-heading"><?php echo esc_html($settings['title'] ); ?></h2>
            <?php endif; ?>
            <div class="quiktheme-unfold-data">
                <div class="quiktheme-unfold-data-render">
                    <?php

                    echo $this->parse_text_editor($settings['editor']);

                    ?>
                </div>
            </div>

            <?php if (  $settings['button_disable'] == null && $settings['button_disable'] != 'yes' ) : ?>
                <button class="quiktheme-unfold-btn quiktheme-unfold-icon-<?php echo esc_attr($settings['icon_position']); ?>">
                    <?php Icons_Manager::render_icon($settings['unfold_icon'], ['aria-hidden' => 'true']); ?>
                    <?php if (!empty($settings['unfold_text'])) : ?>
                        <span><?php echo esc_html($settings['unfold_text']); ?></span>
                    <?php endif; ?>
                </button>
            <?php endif; ?>
        </div>

    <?php
    }
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Unfold() );