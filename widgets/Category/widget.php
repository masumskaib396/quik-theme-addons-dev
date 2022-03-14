<?php
namespace Quik_Theme_Addons\Widgets;
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Icons_Manager;
/**
 * heading widget.
 *
 * widget that displays an eye-catching headlines.
 *
 * @since 1.0.0
 */
class Quik_Theme_Blog_Category extends Widget_Base {
    /**
     * Get widget name.
     *
     * Retrieve heading widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'quiktheme-category';
    }
    /**
     * Get widget title.
     *
     * Retrieve heading widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __('Quiktheme Blog Category', 'quiktheme-addons');
    }

    /**
     * Get widget icon.
     *
     * Retrieve heading widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'feather icon-settings';
    }
    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the heading widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * @since 2.0.0
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
		return [ 'quiktheme-addons' ];
    }
    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['blog', 'meta', 'category'];
    }
    /**
     * Register heading widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function _register_controls() {
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'quiktheme-addons'),
            ]
        );

        $this->add_control(
            'category_count',
            [
                'label'       => __('Category Limit', 'quiktheme-addons'),
                'type'        => Controls_Manager::NUMBER,
                'default'     => '',
                'description' => 'user emty value show all posts',
                'default' => 6,
            ]
        );
        $this->add_responsive_control('per_line', [
            'label'              => __('Columns per row', 'quiktheme-addons'),
            'type'               => Controls_Manager::SELECT,
            'default'            => '3',
            'tablet_default'     => '4',
            'mobile_default'     => '12',
            'options'            => [
                '12' => '1',
                '6'  => '2',
                '4'  => '3',
                '3'  => '4',
            ],
            'frontend_available' => true,
        ]);
        $this->end_controls_section();

        /* 
        *Title
        */
        $this->start_controls_section('cate_box_title',
            [
                'label' => __('Category', 'quiktheme-addons'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'style_ta_bbutton'
        );

        // normal
        $this->start_controls_tab(
            'cate_normal',
            [
                'label' => __('Normal', 'quiktheme-addons'),
            ]
        );
        $this->add_control(
            'advis_title_color',
            [
                'label'     => __('Color', 'quiktheme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .quiktheme-addons-cat-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'advis_title_typo',
                'label'    => __('Typography', 'quiktheme-addons'),
                'selector' => '{{WRAPPER}}   .quiktheme-addons-cat-title',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'      => 'title_border',
                'selector'  => '{{WRAPPER}} .quiktheme-addons-cat-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'title_box_shadow',
                'exclude'  => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .quiktheme-addons-cat-title',
            ]
        );
        $this->add_responsive_control(
            'title_border_radius',
            [
                'label'      => __('Border Radius', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-addons-cat-title' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}} .quiktheme-addons-cat-title' => 'border-radius: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'advis_title_padding',
            [
                'label'      => __('Padding', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}}  .quiktheme-addons-cat-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}}  .quiktheme-addons-cat-title' => 'padding: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'advis_title_margin',
            [
                'label'      => __('Margin', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}}  .quiktheme-addons-cat-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    'body.rtl {{WRAPPER}}  .quiktheme-addons-cat-title' => 'margin: {{TOP}}{{UNIT}} {{LEFT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{RIGHT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();

        // Hover
        $this->start_controls_tab(
            'cate_hover',
            [
                'label' => __('Hover', 'quiktheme-addons'),
            ]
        );
        $this->add_control(
            'advis_title_bg_color_hover',
            [
                'label'     => __('Background Color', 'quiktheme-addons'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}}  .quiktheme-addons-cat:hover .quiktheme-addons-cat-title' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        
    }
    /**
     * Render heading widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_render_attribute('cat_version', 'class', array('job-categories-wrap row justify-content-center' ));

        //grid class
        $grid_classes = [];
        $grid_classes[] = 'col-lg-' . $settings['per_line'];
        $grid_classes[] = 'col-md-' . $settings['per_line_tablet'];
        $grid_classes[] = 'col-sm-' . $settings['per_line_mobile']; 
        $grid_classes = implode(' ', $grid_classes);
        $this->add_render_attribute('cat_grid_classes', 'class', [$grid_classes]);

        $term = get_queried_object();

        $numabr_of_cat = !empty($settings['category_count']) ? $settings['category_count'] : -1;

        $taxonomy     = 'category';
        $orderby      = 'date';
        $show_count   = 1;
        $pad_counts   = 0;
        $hierarchical = 0;
        $title        = '';
        $empty        = 0;

        $args = array(
            'taxonomy'     => $taxonomy,
            'order'        => 'DESC',
            'orderby'      => 'date',
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty,
            'number'       => $numabr_of_cat + 1,
        );

        $all_categories = get_categories($args);
        ?>
        <div <?php echo $this->get_render_attribute_string('cat_version'); ?>>
            <?php
            foreach ($all_categories as $cat) {
                $category_id = $cat->term_id;
                $list = ''; 
                ?> 
                <div <?php echo $this->get_render_attribute_string('cat_grid_classes'); ?>>
                    <a class="quiktheme-addons-cat" href="<?php echo get_term_link($cat->slug, 'category') ?>">
                        <div class="advis-cat-contnt">
                            <h4 class="quiktheme-addons-cat-title"><?php echo $cat->name ?></h4>
                        </div>
                    </a>
                </div>
                
            <?php
            } ?>
        </div>
        <?php 
    }
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Blog_Category() );