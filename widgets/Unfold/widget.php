<?php
namespace Finest_Addons\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Background;
use Elementor\Icons_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;

class Finest_Unfold extends Widget_Base {

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
		return 'finest-unfold';
	}
    public function get_title() {
        return __('Unfold', 'finest-addons');
    }

    public function get_icon() {
        return 'eicon-click';
    }
    public function get_categories() {
        return [ 'finest-addons' ];
    }

    public function get_keywords() {
        return ['unfold', 'fold'];
    }


    protected function register_controls() {

        $this->start_controls_section(
            '_section_content',
            [
                'label' => __('Content', 'finest-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Title', 'finest-addons'),
                'default' => __('Unfold Magic', 'finest-addons'),
                'placeholder' => __('Type Unfold Title', 'finest-addons'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'editor',
            [
                'label' => __('Content Editor', 'finest-addons'),
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
                'label' => __('Alignment', 'finest-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'finest-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'finest-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'finest-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => false,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper' => 'align-items:{{VALUE}}; text-align: {{VALUE}}'
                ],
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();



        $this->start_controls_section(
            '_section_fold',
            [
                'label' => __('Fold/ Unfold Options', 'finest-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'trigger',
            [
                'label' => __('Trigger', 'finest-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'click',
                'options' => [
                    'click'  => __('Click', 'finest-addons'),
                    'hover' => __('Hover', 'finest-addons'),
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'trigger_notice',
            [
                'raw' => '<strong>' . esc_html__('Note!', 'finest-addons') . '</strong> ' . esc_html__('Please disable the button under "Button" section. ', 'finest-addons') . '<br>'. esc_html__('Having both button & trigger hover will make the button non functioning.', 'finest-addons'),
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
                'label' => __('Fold Height (px)', 'finest-addons'),
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
                'label' => __('Transition Duration (ms)', 'finest-addons'),
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
                'label' => __('Button', 'finest-addons'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_disable',
            [
                'label' => __('Disable Button?', 'finest-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'finest-addons'),
                'label_off' => __('No', 'finest-addons'),
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
                'label' => __('Button Position Above Content?', 'finest-addons'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'finest-addons'),
                'label_off' => __('No', 'finest-addons'),
                'return_value' => 'yes',
                'default' => '',
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_control(
            'unfold_text',
            [
                'type' => Controls_Manager::TEXT,
                'label' => __('Unfold Text', 'finest-addons'),
                'default' => __('Read More', 'finest-addons'),
                'placeholder' => __('Type Unfold Text', 'finest-addons'),
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
                'label' => __('Unfold Icon', 'finest-addons'),
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
                'label' => __('Fold Text', 'finest-addons'),
                'default' => __('Read Less', 'finest-addons'),
                'placeholder' => __('Type Fold Text', 'finest-addons'),
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
                'label' => __('Fold Icon', 'finest-addons'),
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
                'label' => __('Icon Position', 'finest-addons'),
                'type' => Controls_Manager::SELECT,
                'default' => 'before',
                'options' => [
                    'before'  => __('Before', 'finest-addons'),
                    'after' => __('After', 'finest-addons'),
                ],
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_responsive_control(
            'button_align',
            [
                'label' => __('Alignment', 'finest-addons'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'start' => [
                        'title' => __('Left', 'finest-addons'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'finest-addons'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'end' => [
                        'title' => __('Right', 'finest-addons'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn' => 'align-self:{{VALUE}};'
                ],
                'style_transfer' => true,
                'conditions' => $this->button_condition,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_box',
            [
                'label' => __('Box', 'finest-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'box_margin',
            [
                'label' => __('Margin', 'finest-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'box_padding',
            [
                'label' => __('Padding', 'finest-addons'),
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
                    '{{WRAPPER}} .finest-unfold-widget-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'box_border',
                'label' => __('Border', 'finest-addons'),
                'selector' => '{{WRAPPER}} > .elementor-widget-container',
            ]
        );

        $this->add_control(
            'box_border_radius',
            [
                'label' => __('Border Radius', 'finest-addons'),
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
                'label' => __('Normal', 'finest-addons'),

            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_background',
                'label' => __('Background', 'finest-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __('Box Shadow', 'finest-addons'),
                'selector' => '{{WRAPPER}} > .elementor-widget-container',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'box_background_tab_hover',
            [
                'label' => __('Hover', 'finest-addons'),

            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'box_background_hover',
                'label' => __('Background', 'finest-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow_hover',
                'label' => __('Box Shadow', 'finest-addons'),
                'selector' => '{{WRAPPER}}:hover .elementor-widget-container',
            ]
        );

        $this->add_control(
            'box_border_color_hover',
            [
                'label' => __('Border Color', 'finest-addons'),
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
                'label' => __('Overlay Height', 'finest-addons'),
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
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-data::after' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'     => 'overlay_color',
                'label'    => esc_html__('Overlay Color', 'finest-addons'),
                'types'    => ['gradient'],
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-data::after',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__('Overlay Color', 'finest-addons'),
                    ],
                ],
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __('Title', 'finest-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_margin',
            [
                'label' => __('Margin', 'finest-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Color', 'finest-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-heading' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'finest-addons'),
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-heading',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_shadow',
                'label' => __('Text Shadow', 'finest-addons'),
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-heading',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Content', 'finest-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __('Margin', 'finest-addons'),
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
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-data-render' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __('Color', 'finest-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-data-render' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __('Typography', 'finest-addons'),
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-data-render',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'content_shadow',
                'label' => __('Shadow', 'finest-addons'),
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-data-render',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __('Button', 'finest-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'conditions' => $this->button_condition,
            ]
        );

        $this->add_responsive_control(
            'button_margin',
            [
                'label' => __('Margin', 'finest-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'finest-addons'),
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
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'button_space_between',
            [
                'label' => __('Space Between Icon & Text', 'finest-addons'),
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
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn.finest-unfold-icon-after i + span' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn.finest-unfold-icon-before i + span' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'finest-addons'),
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn',
            ]
        );


        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Border', 'finest-addons'),
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'finest-addons'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs('button_tabs');

        $this->start_controls_tab(
            'button_tab',
            [
                'label' => __('Normal', 'finest-addons'),

            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'finest-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_icon_color',
            [
                'label' => __('Icon Color', 'finest-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn i' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'label' => __('Background', 'finest-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow',
                'label' => __('Box Shadow', 'finest-addons'),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn',
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'button_tab_hover',
            [
                'label' => __('Hover', 'finest-addons'),

            ]
        );


        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __('Text Color', 'finest-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn:hover span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'button_icon_color_hover',
            [
                'label' => __('Icon Color', 'finest-addons'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn:hover i' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_background_hover',
                'label' => __('Background', 'finest-addons'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn:hover',
            ]
        );


        $this->add_control(
            'button_border_color_hover',
            [
                'label' => __('Border Color', 'finest-addons'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_shadow_hover',
                'label' => __('Box Shadow', 'finest-addons'),
                'separator' => 'before',
                'selector' => '{{WRAPPER}} .finest-unfold-widget-wrapper .finest-unfold-btn:hover',
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        ?>

        <div class="finest-unfold-widget-wrapper<?php echo esc_attr(($settings['content_position'] == 'yes') ? ' finest-unfold-direction-below' : ''); ?>">
            <?php if (!empty($settings['title'])) : ?>
                <h2 class="finest-unfold-heading"><?php echo esc_html($settings['title'] ); ?></h2>
            <?php endif; ?>
            <div class="finest-unfold-data">
                <div class="finest-unfold-data-render">
                    <?php

                    echo $this->parse_text_editor($settings['editor']);

                    ?>
                </div>
            </div>

            <?php if (  $settings['button_disable'] == null && $settings['button_disable'] != 'yes' ) : ?>
                <button class="finest-unfold-btn finest-unfold-icon-<?php echo esc_attr($settings['icon_position']); ?>">
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
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Unfold() );