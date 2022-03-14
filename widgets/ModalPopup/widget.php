<?php
namespace Quik_Theme_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit;

use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Icons_Manager;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Quik_Theme_Modal_Popup extends Widget_Base {

	public function get_name() {
		return 'quiktheme-modal-popup';
	}

	public function get_title() {
		return esc_html__( 'Modal Popup', 'quiktheme-addons' );
	}

	public function get_icon() {
		return 'feather icon-maximize';
	}

	public function get_categories() {
		return [ 'quiktheme-addons' ];
	}

	public function get_keywords() {
		return [ 'quik-theme-addons', 'lightbox', 'popup', 'quickview', 'video' ];
	}

	protected function register_controls() {

		/**
		 * Modal Popup Content section
		 */
		$this->start_controls_section(
			'quik_theme_modal_content_section',
			[
				'label' => __( 'Contents', 'quiktheme-addons' )
			]
		);

		$this->add_control(
			'quik_theme_modal_content',
			[
				'label'   => __( 'Type of Modal', 'quiktheme-addons' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
					'image'          => __( 'Image', 'quiktheme-addons' ),
					'image-gallery'  => __( 'Image Gallery', 'quiktheme-addons' ),
					'html_content'   => __( 'HTML Content', 'quiktheme-addons' ),
					'youtube'        => __( 'Youtube Video', 'quiktheme-addons' ),
					'vimeo'          => __( 'Vimeo Video', 'quiktheme-addons' ),
					'external-video' => __( 'Self Hosted Video', 'quiktheme-addons' ),
					'external_page'  => __( 'External Page', 'quiktheme-addons' ),
					'shortcode'      => __( 'ShortCode', 'quiktheme-addons' )
				]
			]
		);

		/**
		 * Modal Popup image section
		 */
		$this->add_control(
			'quik_theme_modal_image',
			[
				'label'      => __( 'Image', 'quiktheme-addons' ),
				'type'       => Controls_Manager::MEDIA,
				'default'    => [
					'url' 	 => Utils::get_placeholder_image_src()
				],
				'dynamic'    => [
					'active' => true
                ],
                'condition'  => [
                    'quik_theme_modal_content' => 'image'
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'full',
				'condition' => [
                    'quik_theme_modal_content' => 'image'
                ]
			]
		);

		/**
		 * Modal Popup image gallery
		 */

		$this->add_control(
			'quik_theme_modal_image_gallery_column',
			[
				'label'   => __( 'Column', 'quiktheme-addons' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'column-three',
                'options' => [
					'column-one'   => __( 'Column 1', 'quiktheme-addons' ),
					'column-two'   => __( 'Column 2', 'quiktheme-addons' ),
					'column-three' => __( 'Column 3', 'quiktheme-addons' ),
					'column-four'  => __( 'Column 4', 'quiktheme-addons' ),
					'column-five'  => __( 'Column 5', 'quiktheme-addons' ),
					'column-six'   => __( 'Column 6', 'quiktheme-addons' )
				],
				'condition' => [
					'quik_theme_modal_content' => 'image-gallery'
				]
			]
		);

		$image_repeater = new Repeater();

		$image_repeater->add_control(
			'quik_theme_modal_image_gallery',
			[
				'label'   => __( 'Image', 'quiktheme-addons' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src()
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$image_repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'full',
			]
		);

		$image_repeater->add_control(
			'quik_theme_modal_image_gallery_text',
			[
				'label' => __( 'Description', 'quiktheme-addons' ),
				'type'  => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'quik_theme_modal_image_gallery_repeater',
			[
				'label'   => esc_html__( 'Image Gallery', 'quiktheme-addons' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $image_repeater->get_controls(),
				'default' => [
					[ 'quik_theme_modal_image_gallery' => Utils::get_placeholder_image_src() ],
					[ 'quik_theme_modal_image_gallery' => Utils::get_placeholder_image_src() ],
					[ 'quik_theme_modal_image_gallery' => Utils::get_placeholder_image_src() ]
				],
				'condition' => [
					'quik_theme_modal_content' => 'image-gallery'
				]
			]
		);
		/**
		 * Modal Popup html content section
		 */
		$this->add_control(
			'quik_theme_modal_html_content',
			[
				'label'     => __( 'Add your content here (HTML/Shortcode)', 'quiktheme-addons' ),
				'type'      => Controls_Manager::WYSIWYG,
				'default'   => __( 'Add your popup content here', 'quiktheme-addons' ),
				'dynamic'   => [ 'active' => true ],
				'condition' => [
				  	'quik_theme_modal_content' => 'html_content'
			  	]
			]
		);

		/**
		 * Modal Popup video section
		 */

		$this->add_control(
            'quik_theme_modal_youtube_video_url',
            [
				'label'       => __( 'Provide Youtube Video URL', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'https://www.youtube.com/watch?v=b1lyIT1FvDo',
				'placeholder' => __( 'Place Youtube Video URL', 'quiktheme-addons' ),
				'title'       => __( 'Place Youtube Video URL', 'quiktheme-addons' ),
				'condition'   => [
                    'quik_theme_modal_content' => 'youtube'
                ],
				'dynamic' => [
					'active' => true,
				]
            ]
        );


        $this->add_control(
            'quik_theme_modal_vimeo_video_url',
            [
				'label'       => __( 'Provide Vimeo Video URL', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'https://vimeo.com/347565673',
				'placeholder' => __( 'Place Vimeo Video URL', 'quiktheme-addons' ),
				'title'       => __( 'Place Vimeo Video URL', 'quiktheme-addons' ),
				'condition'   => [
                    'quik_theme_modal_content' => 'vimeo'
                ],
				'dynamic' => [
					'active' => true,
				]
            ]
		);

		/**
		 * Modal Popup external video section
		 */
		$this->add_control(
			'quik_theme_modal_external_video',
			[
				'label'      => __( 'External Video', 'quiktheme-addons' ),
				'type'       => Controls_Manager::MEDIA,
				'media_type' => 'video',
				'dynamic' => [
					'active' => true,
				],
				'condition'  => [
                    'quik_theme_modal_content' => 'external-video'
                ]
			]
		);

		$this->add_control(
            'quik_theme_modal_external_page_url',
            [
				'label'       => __( 'Provide External URL', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'https://quiktheme-devs.com',
				'placeholder' => __( 'Place External Page URL', 'quiktheme-addons' ),
				'condition'   => [
                    'quik_theme_modal_content' => 'external_page'
                ],
				'dynamic' => [
					'active' => true,
				]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_modal_video_width',
            [
				'label'        => __( 'Content Width', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'size_units'   => [ 'px', '%' ],
				'range'        => [
                    'px'       => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5
                    ],
                    '%'        => [
                        'min'  => 0,
                        'max'  => 100
                    ]
                ],
                'default'      => [
                    'unit'     => 'px',
                    'size'     => 720
                ],
                'selectors'    => [
					'{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element iframe,
					{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-video-hosted' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-modal-item' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'quik_theme_modal_content' => [ 'youtube', 'vimeo', 'external_page', 'external-video' ]
                ]
            ]
        );

        $this->add_responsive_control(
            'quik_theme_modal_video_height',
            [
				'label'        => __( 'Content Height', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'size_units'   => [ 'px', '%' ],
				'range'        => [
                    'px'       => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 5
                    ],
                    '%'        => [
						'min'  => 0,
						'max'  => 100
                    ]
                ],
                'default'      => [
					'unit'     => 'px',
					'size'     => 400
                ],
                'selectors'    => [
                    '{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element iframe' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .quiktheme-modal-item' => 'height: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'quik_theme_modal_content' => [ 'youtube', 'vimeo', 'external_page' ]
                ]
            ]
        );

        $this->add_control(
            'quik_theme_modal_shortcode',
            [
				'label'       => __( 'Enter your shortcode', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( '[gallery]', 'quiktheme-addons' ),
				'condition'   => [
                    'quik_theme_modal_content' => 'shortcode'
                ]
            ]
		);

		$this->add_responsive_control(
			'quik_theme_modal_content_width',
			[
				'label' => __( 'Content Width', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
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
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-item' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'    => [
                    'quik_theme_modal_content' => [ 'image', 'image-gallery', 'html_content', 'shortcode' ]
                ]
			]
		);

		$this->add_control(
			'quik_theme_modal_btn_text',
			[
				'label'       => __( 'Button Text', 'quiktheme-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'quiktheme-addons' ),
				'dynamic'     => [
					'active'  => true
				]
			]
		);

		$this->add_control(
			'quik_theme_modal_btn_icon',
			[
				'label'       => __( 'Button Icon', 'quiktheme-addons' ),
				'label_block' => true,
				'type'        => Controls_Manager::ICONS,
                'default'     => [
                    'value'   => 'fas fa-play',
                    'library' => 'fa-brands'
                ]
			]
		);

		$this->end_controls_section();

		/**
		 * Modal Popup settings section
		 */
		$this->start_controls_section(
			'quik_theme_modal_setting_section',
			[
				'label' => __( 'Settings', 'quiktheme-addons' )
			]
		);

		$this->add_control(
			'quik_theme_modal_overlay',
			[
				'label'        => __( 'Overlay', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'quiktheme-addons' ),
				'label_off'    => __( 'Hide', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->add_control(
			'quik_theme_modal_overlay_click_close',
			[
				'label'     => __( 'Close While Clicked Outside', 'quiktheme-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'ON', 'quiktheme-addons' ),
				'label_off' => __( 'OFF', 'quiktheme-addons' ),
				'default'   => 'yes',
				'condition' => [
					'quik_theme_modal_overlay' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Modal Popup button style
		 */

		$this->start_controls_section(
			'quik_theme_modal_display_settings',
			[
				'label' => __( 'Button', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);


		/**
		 * display settings for button normal and hover
		 */
		$this->start_controls_tabs( 'quik_theme_modal_btn_typhography_color', ['separator' => 'before' ] );

			$this->start_controls_tab( 'quik_theme_modal_btn_typhography_color_normal_tab', [ 'label' => esc_html__( 'Normal', 'quiktheme-addons' )] );

				$this->add_control(
					'quik_theme_modal_btn_typhography_color_normal',
					[
						'label'     => __( 'Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action span' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'quik_theme_modal_btn_background_normal',
					[
						'label'     => __( 'Background Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#4243DC',
						'selectors' => [
							'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action' => 'background-color: {{VALUE}};'
						]
					]
				);

				$this->add_responsive_control(
					'quik_theme_modal_btn_align',
					[
						'label'         => __( 'Alignment', 'quiktheme-addons' ),
						'type'          => Controls_Manager::CHOOSE,
						'default'       => 'center',
						'toggle'        => false,
						'separator'     => 'before',
						'options'       => [
							'left'      => [
								'title' => __( 'Left', 'quiktheme-addons' ),
								'icon'  => 'eicon-text-align-left'
							],
							'center'    => [
								'title' => __( 'Center', 'quiktheme-addons' ),
								'icon'  => 'eicon-text-align-center'
							],
							'right'     => [
								'title' => __( 'Right', 'quiktheme-addons' ),
								'icon'  => 'eicon-text-align-right'
							]
						],
						'selectors'     => [
							'{{WRAPPER}} .quiktheme-modal-button' => 'text-align: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name'      => 'quik_theme_modal_btn_typhography',
						'label'     => __( 'Button Typography', 'quiktheme-addons' ),
						'selector'  => '{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action span'
					]
				);

				$this->add_control(
					'quik_theme_modal_btn_enable_fixed_width_height',
					[
						'label' => __( 'Enable Fixed Height & Width?', 'quiktheme-addons' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'quiktheme-addons' ),
						'label_off' => __( 'Hide', 'quiktheme-addons' ),
						'return_value' => 'yes',
						'default' => 'no',
					]
				);

				$this->add_control(
					'quik_theme_modal_btn_fixed_width_height',
					[
						'label' => __( 'Fixed Height & Width', 'quiktheme-addons' ),
						'type' => Controls_Manager::POPOVER_TOGGLE,
						'label_off' => __( 'Default', 'quiktheme-addons' ),
						'label_on' => __( 'Custom', 'quiktheme-addons' ),
						'return_value' => 'yes',
						'default' => 'yes',
						'condition' => [
							'quik_theme_modal_btn_enable_fixed_width_height' => 'yes'
						]
					]
				);

				$this->start_popover();

					$this->add_responsive_control(
						'quik_theme_modal_btn_fixed_width',
						[
							'label'      => esc_html__( 'Width', 'quiktheme-addons' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px'     => [
									'min'  => 0,
									'max'  => 500,
									'step' => 1
								],
								'%'        => [
									'min'  => 0,
									'max'  => 100
								]
							],
							'default'    => [
								'unit'   => 'px',
								'size'   => 70
							],
							'selectors'  => [
								'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action' => 'width: {{SIZE}}{{UNIT}};'

							],
							'condition' => [
								'quik_theme_modal_btn_enable_fixed_width_height' => 'yes'
							]
						]
					);

					$this->add_responsive_control(
						'quik_theme_modal_btn_fixed_height',
						[
							'label'      => esc_html__( 'Height', 'quiktheme-addons' ),
							'type'       => Controls_Manager::SLIDER,
							'size_units' => [ 'px', '%' ],
							'range'      => [
								'px'     => [
									'min'  => 0,
									'max'  => 500,
									'step' => 1
								],
								'%'        => [
									'min'  => 0,
									'max'  => 100
								]
							],
							'default'    => [
								'unit'   => 'px',
								'size'   => 70
							],
							'selectors'  => [
								'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action' => 'height: {{SIZE}}{{UNIT}};'
							],
							'condition' => [
								'quik_theme_modal_btn_enable_fixed_width_height' => 'yes'
							]
						]
					);

				$this->end_popover();

				$this->add_responsive_control(
					'quik_theme_modal_btn_width',
					[
						'label'        => esc_html__( 'Width', 'quiktheme-addons' ),
						'type'         => Controls_Manager::SLIDER,
						'size_units'   => [ 'px', '%' ],
						'range'        => [
							'px'       => [
								'min'  => 0,
								'max'  => 500,
								'step' => 1
							],
							'%'        => [
								'min'  => 0,
								'max'  => 100
							]
						],
						'default'      => [
							'unit'     => 'px',
							'size'     => 70
						],
						'selectors'    => [
							'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action' => 'width: {{SIZE}}{{UNIT}};'
						],
						'condition' => [
							'quik_theme_modal_btn_enable_fixed_width_height!' => 'yes'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'               => 'quik_theme_modal_btn_border_normal',
						'selector'           => '{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action'
					]
				);

				$this->add_responsive_control(
					'quik_theme_modal_btn_radius',
					[
						'label'      => __( 'Border Radius', 'quiktheme-addons' ),
						'type'       => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%' ],
						'default'    => [
							'top'    => '50',
							'right'  => '50',
							'bottom' => '50',
							'left'   => '50',
							'unit'   => 'px'
						],
						'selectors'  => [
							'{{WRAPPER}} .quiktheme-modal-image-action, {{WRAPPER}} .quiktheme-modal-image-action::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						]
					]
				);

				$this->add_responsive_control(
					'quik_theme_modal_btn_padding',
					[
						'label'        => __( 'Padding', 'quiktheme-addons' ),
						'type'         => Controls_Manager::DIMENSIONS,
						'size_units'   => [ 'px', '%' ],
						'default'      => [
							'top'      => '20',
							'right'    => '0',
							'bottom'   => '20',
							'left'     => '0',
							'unit'     => 'px',
							'isLinked' => false
						],
						'selectors'    => [
							'{{WRAPPER}} .quiktheme-modal-image-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						]
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab( 'quik_theme_modal_btn_typhography_color_hover_tab', [ 'label' => esc_html__( 'Hover', 'quiktheme-addons' ) ] );

				$this->add_control(
					'quik_theme_modal_btn_color_hover',
					[
						'label'     => __( 'Text Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#fff',
						'selectors' => [
							'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action:hover span' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'quik_theme_modal_btn_background_hover',
					[
						'label'     => __( 'Background Color', 'quiktheme-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#EF2469',
						'selectors' => [
							'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action:hover' => 'background-color: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'     => 'quik_theme_modal_btn_border_hover',
						'selector' => '{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action:hover'
					]
				);

			$this->end_controls_tab();
		$this->end_controls_tabs();

        $this->end_controls_section();

		/**
		 * Modal Popup Icon section
		 */
		$this->start_controls_section(
			'quik_theme_modal_icon_section',
			[
				'label' => __( 'Icon', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
				]
		);

		$this->add_control(
			'quik_theme_modal_btn_icon_color',
			[
				'label'     => __( 'Icon Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action span i' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'quik_theme_modal_btn_icon_align',
			[
				'label'     => __( 'Icon Position', 'quiktheme-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => [
					'left'  => __( 'Before', 'quiktheme-addons' ),
					'right' => __( 'After', 'quiktheme-addons' )
				],
				'condition' => [
                    'quik_theme_modal_btn_icon[value]!' => ''
                ]
			]
		);

		$this->add_responsive_control(
			'quik_theme_modal_btn_icon_indent',
			[
				'label'       => __( 'Icon Spacing', 'quiktheme-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => [
					'px'      => [
						'max' => 50
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action span.quiktheme-modal-action-icon-left i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-modal-button .quiktheme-modal-image-action span.quiktheme-modal-action-icon-right i' => 'margin-left: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
                    'quik_theme_modal_btn_icon[value]!' => ''
                ]
			]
		);
		$this->end_controls_section();

		/**
		 * Modal Popup Container section
		 */
		$this->start_controls_section(
			'quik_theme_modal_container_section',
			[
				'label' => __( 'Container', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'quik_theme_modal_content_align',
			[
				'label'     => __( 'Alignment', 'quiktheme-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'toggle'    => false,
				'default'   => 'center',
				'options'   => [
					'left'  => [
						'title' => __( 'Left', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center'    => [
						'title' => __( 'Center', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'right'     => [
						'title' => __( 'Right', 'quiktheme-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element' => 'text-align: {{VALUE}};'
				],
				'condition' => [
					'quik_theme_modal_content' => ['image-gallery', 'html_content']
				]
			]
		);

		$this->add_responsive_control(
			'quik_theme_modal_content_height',
			[
				'label' => __( 'Contant Height for Tablet & Mobile', 'quiktheme-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range'        => [
					'px'       => [
						'min'  => 0,
						'max'  => 500,
						'step' => 1
					],
					'%'        => [
						'min'  => 0,
						'max'  => 100
					]
				],
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-item.modal-vimeo' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'quik_theme_modal_image_gallery_description_typography',
				'selector'  => '{{WRAPPER}} .quiktheme-modal-content .quiktheme-modal-element .quiktheme-modal-element-card .quiktheme-modal-element-card-body p',
				'condition' => [
					'quik_theme_modal_content' => [ 'image-gallery' ]
				]
			]
		);

		$this->add_control(
			'quik_theme_modal_image_gallery_description_color',
			[
				'label'     => __( 'Description Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-content .quiktheme-modal-element .quiktheme-modal-element-card .quiktheme-modal-element-card-body p'  => 'color: {{VALUE}};'
				],
				'condition' => [
					'quik_theme_modal_content' => [ 'image-gallery' ]
				]
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'quik_theme_modal_content_border',
				'selector' => '{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element'
			]
		);

		$this->add_control(
			'quik_theme_modal_image_gallery_bg',
			[
				'label'     => __( 'Background Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element'  => 'background: {{VALUE}};'
				],
				'condition' => [
					'quik_theme_modal_content' => ['image-gallery', 'html_content']
				]
			]
		);

		$this->add_control(
			'quik_theme_modal_image_gallery_padding',
			[
				'label'      => __( 'Padding', 'quiktheme-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '10',
					'right'  => '10',
					'bottom' => '10',
					'left'   => '10',
					'unit'   => 'px'
				],
				'selectors'  => [
					'{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element .quiktheme-modal-element-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition'  => [
					'quik_theme_modal_content' => [ 'image-gallery', 'html_content' ]
				]
			]
		);

        $this->add_responsive_control(
            'quik_theme_modal_image_gallery_description_margin',
            [
                'label'      => __('Margin(Description)', 'quiktheme-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .quiktheme-modal-item .quiktheme-modal-content .quiktheme-modal-element .quiktheme-modal-element-card-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
				'condition'  => [
					'quik_theme_modal_content' => [ 'image-gallery' ]
				]
            ]
        );

		$this->add_control(
			'quik_theme_modal_overlay_overflow_x',
			[
				'label'        => __( 'Overflow X', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'quiktheme-addons' ),
				'label_off'    => __( 'No', 'quiktheme-addons' ),
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'quik_theme_modal_overlay_overflow_y',
			[
				'label'        => __( 'Overflow Y', 'quiktheme-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'quiktheme-addons' ),
				'label_off'    => __( 'No', 'quiktheme-addons' ),
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'quik_theme_modal_animation_tab',
			[
				'label' => __( 'Animation', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'quik_theme_modal_transition',
			[
				'label'   => __( 'Style', 'quiktheme-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top-to-middle',
				'options' => [
					'top-to-middle'    => __( 'Top To Middle', 'quiktheme-addons' ),
					'bottom-to-middle' => __( 'Bottom To Middle', 'quiktheme-addons' ),
					'right-to-middle'  => __( 'Right To Middle', 'quiktheme-addons' ),
					'left-to-middle'   => __( 'Left To Middle', 'quiktheme-addons' ),
					'zoom-in'          => __( 'Zoom In', 'quiktheme-addons' ),
					'zoom-out'         => __( 'Zoom Out', 'quiktheme-addons' ),
					'left-rotate'      => __( 'Rotation', 'quiktheme-addons' )
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Modal Popup overlay style
		 */

		$this->start_controls_section(
			'quik_theme_modal_overlay_tab',
			[
				'label'     => __( 'Overlay', 'quiktheme-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'quik_theme_modal_overlay' => 'yes'
				]
			]
		);

		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'quik_theme_modal_overlay_color',
                'types'           => [ 'classic' ],
                'selector'        => '{{WRAPPER}} .quiktheme-modal-overlay',
                'fields_options'  => [
                    'background'  => [
                        'default' => 'classic'
                    ],
                    'color'       => [
                        'default' => 'rgba(0,0,0,.5)'
                    ]
                ]
            ]
        );

		$this->end_controls_section();

		/**
		 * Modal Popup Close button style
		 */

		$this->start_controls_section(
			'quik_theme_modal_close_btn_style',
			[
				'label' => __( 'Close Button', 'quiktheme-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'quik_theme_modal_close_btn_position',
			[
				'label' => __( 'Close Button Position', 'quiktheme-addons' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'Default', 'quiktheme-addons' ),
				'label_on' => __( 'Custom', 'quiktheme-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );

        $this->start_popover();

            $this->add_responsive_control(
                'quik_theme_modal_close_btn_position_x_offset',
                [
                    'label' => __( 'X Offset', 'quiktheme-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -4000,
                            'max' => 4000,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .quiktheme-modal-item.modal-vimeo .quiktheme-modal-content .quiktheme-close-btn' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'quik_theme_modal_close_btn_position_y_offset',
                [
                    'label' => __( 'Y Offset', 'quiktheme-addons' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -4000,
                            'max' => 4000,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .quiktheme-modal-item.modal-vimeo .quiktheme-modal-content .quiktheme-close-btn' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_popover();

		$this->add_responsive_control(
            'quik_theme_modal_close_btn_icon_size',
            [
				'label'      => __( 'Icon Size', 'quiktheme-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
                    'px'       => [
						'min'  => 0,
						'max'  => 30,
                    ],
                ],
                'default'   => [
                    'unit'  => 'px',
                    'size'  => 20
                ],
                'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-item.modal-vimeo .quiktheme-modal-content .quiktheme-close-btn span::before' => 'width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .quiktheme-modal-item.modal-vimeo .quiktheme-modal-content .quiktheme-close-btn span::after' => 'height: {{SIZE}}{{UNIT}}'
                ],
            ]
        );

        $this->add_control(
			'quik_theme_modal_close_btn_color',
			[
				'label'     => __( 'Color', 'quiktheme-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-item.modal-vimeo .quiktheme-modal-content .quiktheme-close-btn span::before, {{WRAPPER}} .quiktheme-modal-item.modal-vimeo .quiktheme-modal-content .quiktheme-close-btn span::after'  => 'background: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'quik_theme_modal_close_btn_bg_color',
			[
				'label'    => __( 'Background Color', 'quiktheme-addons' ),
				'type'     => Controls_Manager::COLOR,
				'default'  => 'transparent',
				'selectors' => [
					'{{WRAPPER}} .quiktheme-modal-item.modal-vimeo .quiktheme-modal-content .quiktheme-close-btn'  => 'background: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings            = $this->get_settings_for_display();

		if( 'youtube' === $settings['quik_theme_modal_content'] ){
			$url = $settings['quik_theme_modal_youtube_video_url'];

			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches);

			$youtube_id = $matches[1];
		}

		if( 'vimeo' === $settings['quik_theme_modal_content'] ){
			$vimeo_url       = $settings['quik_theme_modal_vimeo_video_url'];
			$vimeo_id_select = explode('/', $vimeo_url);
			$vidid           = explode( '&', str_replace('https://vimeo.com', '', end($vimeo_id_select) ) );
			$vimeo_id        = $vidid[0];
		}

		$this->add_render_attribute( 'quik_theme_modal_action', [
			'class'             => 'quiktheme-modal-image-action image-modal',
			'data-quiktheme-modal'   => '#quiktheme-modal-' . $this->get_id(),
			'data-quiktheme-overlay' => esc_attr( $settings['quik_theme_modal_overlay'] )
		] );

		$this->add_render_attribute( 'quik_theme_modal_overlay', [
			'class'                         => 'quiktheme-modal-overlay',
			'data-quik_theme_overlay_click_close' => $settings['quik_theme_modal_overlay_click_close']
		] );

		$this->add_render_attribute( 'quik_theme_modal_item', 'class', 'quiktheme-modal-item' );
		$this->add_render_attribute( 'quik_theme_modal_item', 'class', 'modal-vimeo' );
		$this->add_render_attribute( 'quik_theme_modal_item', 'class', $settings['quik_theme_modal_transition'] );
		$this->add_render_attribute( 'quik_theme_modal_item', 'class', $settings['quik_theme_modal_content'] );
		$this->add_render_attribute( 'quik_theme_modal_item', 'class', esc_attr('quiktheme-content-overflow-x-' . $settings['quik_theme_modal_overlay_overflow_x'] ) );
		$this->add_render_attribute( 'quik_theme_modal_item', 'class', esc_attr('quiktheme-content-overflow-y-' . $settings['quik_theme_modal_overlay_overflow_y'] ) );
		?>

		<div class="quiktheme-modal">
			<div class="quiktheme-modal-wrapper">

				<div class="quiktheme-modal-button quiktheme-modal-btn-fixed-width-<?php echo esc_attr($settings['quik_theme_modal_btn_enable_fixed_width_height']);?>">
					<a href="#" <?php echo $this->get_render_attribute_string('quik_theme_modal_action');?> >
						<span class="quiktheme-modal-action-icon-<?php echo esc_attr($settings['quik_theme_modal_btn_icon_align']);?>">
							<?php if( 'left' === $settings['quik_theme_modal_btn_icon_align'] && !empty( $settings['quik_theme_modal_btn_icon']['value'] ) ) {
								Icons_Manager::render_icon( $settings['quik_theme_modal_btn_icon'], [ 'aria-hidden' => 'true' ] );
							}
							echo esc_html( $settings['quik_theme_modal_btn_text'] );
							if( 'right' === $settings['quik_theme_modal_btn_icon_align'] && !empty( $settings['quik_theme_modal_btn_icon']['value'] ) ) {
								Icons_Manager::render_icon( $settings['quik_theme_modal_btn_icon'], [ 'aria-hidden' => 'true' ] );
							} ;?>
						</span>
					</a>
				</div>

				<div id="quiktheme-modal-<?php echo esc_attr( $this->get_id() );?>" <?php echo $this->get_render_attribute_string('quik_theme_modal_item') ;?> >
					<div class="quiktheme-modal-content">
						<div class="quiktheme-modal-element <?php echo esc_attr( $settings['quik_theme_modal_image_gallery_column'] );?>">
							<?php if ( 'image' === $settings['quik_theme_modal_content'] ) {
								echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'quik_theme_modal_image' );
							}

							if ( 'image-gallery' === $settings['quik_theme_modal_content'] ) {
								foreach ( $settings['quik_theme_modal_image_gallery_repeater'] as $gallery ) : ?>
									<div class="quiktheme-modal-element-card">
										<div class="quiktheme-modal-element-card-thumb">
											<?php echo Group_Control_Image_Size::get_attachment_image_html( $gallery, 'thumbnail', 'quik_theme_modal_image_gallery' );?>
										</div>
										<?php if ( !empty( $gallery['quik_theme_modal_image_gallery_text'] ) ) {?>
											<div class="quiktheme-modal-element-card-body">
												<p><?php echo wp_kses_post( $gallery['quik_theme_modal_image_gallery_text'] );?></p>
											</div>
										<?php } ;?>
									</div>
								<?php
								endforeach;
							}

							if ( 'html_content' === $settings['quik_theme_modal_content'] ) { ?>
								<div class="quiktheme-modal-element-body">
									<p><?php echo wp_kses_post( $settings['quik_theme_modal_html_content'] );?></p>
								</div>
							<?php }

							if ( 'youtube' === $settings['quik_theme_modal_content'] ) { ?>
								<iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id );?>" frameborder="0" allowfullscreen></iframe>
							<?php }

							if ( 'vimeo' === $settings['quik_theme_modal_content'] ) { ?>
								<iframe id="vimeo-video" src="https://player.vimeo.com/video/<?php echo esc_attr( $vimeo_id );?>" frameborder="0" allowfullscreen ></iframe>
							<?php }

							if ( 'external-video' === $settings['quik_theme_modal_content'] ) { ?>
								<video class="quiktheme-video-hosted" src="<?php echo esc_url( $settings['quik_theme_modal_external_video']['url'] );?>" controls="" controlslist="nodownload">
								</video>
							<?php }

							if ( 'external_page' === $settings['quik_theme_modal_content'] ) { ?>
								<iframe src="<?php echo esc_url( $settings['quik_theme_modal_external_page_url'] );?>" frameborder="0" allowfullscreen ></iframe>
							<?php }

							if ( 'shortcode' === $settings['quik_theme_modal_content'] ) {
								echo do_shortcode( $settings['quik_theme_modal_shortcode'] );
							} ;?>

							<div class="quiktheme-close-btn">
								<span></span>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div <?php echo $this->get_render_attribute_string('quik_theme_modal_overlay');?>></div>
		</div>
	<?php
	}
}
$widgets_manager->register_widget_type( new \Quik_Theme_Addons\Widgets\Quik_Theme_Modal_Popup() );