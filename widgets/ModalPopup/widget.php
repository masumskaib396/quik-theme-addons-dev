<?php
namespace Finest_Addons\Widgets;

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

class Finest_Modal_Popup extends Widget_Base {

	public function get_name() {
		return 'finest-modal-popup';
	}

	public function get_title() {
		return esc_html__( 'Modal Popup', 'finest-addons' );
	}

	public function get_icon() {
		return 'eicon-video-playlist';
	}

	public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
		return [ 'finest', 'lightbox', 'popup', 'quickview', 'video' ];
	}

	protected function register_controls() {

		/**
		 * Modal Popup Content section
		 */
		$this->start_controls_section(
			'finest_modal_content_section',
			[
				'label' => __( 'Contents', 'finest-addons' )
			]
		);

		$this->add_control(
			'finest_modal_content',
			[
				'label'   => __( 'Type of Modal', 'finest-addons' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'image',
                'options' => [
					'image'          => __( 'Image', 'finest-addons' ),
					'image-gallery'  => __( 'Image Gallery', 'finest-addons' ),
					'html_content'   => __( 'HTML Content', 'finest-addons' ),
					'youtube'        => __( 'Youtube Video', 'finest-addons' ),
					'vimeo'          => __( 'Vimeo Video', 'finest-addons' ),
					'external-video' => __( 'Self Hosted Video', 'finest-addons' ),
					'external_page'  => __( 'External Page', 'finest-addons' ),
					'shortcode'      => __( 'ShortCode', 'finest-addons' )
				]
			]
		);

		/**
		 * Modal Popup image section
		 */
		$this->add_control(
			'finest_modal_image',
			[
				'label'      => __( 'Image', 'finest-addons' ),
				'type'       => Controls_Manager::MEDIA,
				'default'    => [
					'url' 	 => Utils::get_placeholder_image_src()
				],
				'dynamic'    => [
					'active' => true
                ],
                'condition'  => [
                    'finest_modal_content' => 'image'
                ]
			]
		);

		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'thumbnail',
				'default'   => 'full',
				'condition' => [
                    'finest_modal_content' => 'image'
                ]
			]
		);

		/**
		 * Modal Popup image gallery
		 */

		$this->add_control(
			'finest_modal_image_gallery_column',
			[
				'label'   => __( 'Column', 'finest-addons' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'column-three',
                'options' => [
					'column-one'   => __( 'Column 1', 'finest-addons' ),
					'column-two'   => __( 'Column 2', 'finest-addons' ),
					'column-three' => __( 'Column 3', 'finest-addons' ),
					'column-four'  => __( 'Column 4', 'finest-addons' ),
					'column-five'  => __( 'Column 5', 'finest-addons' ),
					'column-six'   => __( 'Column 6', 'finest-addons' )
				],
				'condition' => [
					'finest_modal_content' => 'image-gallery'
				]
			]
		);

		$image_repeater = new Repeater();

		$image_repeater->add_control(
			'finest_modal_image_gallery',
			[
				'label'   => __( 'Image', 'finest-addons' ),
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
			'finest_modal_image_gallery_text',
			[
				'label' => __( 'Description', 'finest-addons' ),
				'type'  => Controls_Manager::TEXTAREA,
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_modal_image_gallery_repeater',
			[
				'label'   => esc_html__( 'Image Gallery', 'finest-addons' ),
				'type'    => Controls_Manager::REPEATER,
				'fields'  => $image_repeater->get_controls(),
				'default' => [
					[ 'finest_modal_image_gallery' => Utils::get_placeholder_image_src() ],
					[ 'finest_modal_image_gallery' => Utils::get_placeholder_image_src() ],
					[ 'finest_modal_image_gallery' => Utils::get_placeholder_image_src() ]
				],
				'condition' => [
					'finest_modal_content' => 'image-gallery'
				]
			]
		);
		/**
		 * Modal Popup html content section
		 */
		$this->add_control(
			'finest_modal_html_content',
			[
				'label'     => __( 'Add your content here (HTML/Shortcode)', 'finest-addons' ),
				'type'      => Controls_Manager::WYSIWYG,
				'default'   => __( 'Add your popup content here', 'finest-addons' ),
				'dynamic'   => [ 'active' => true ],
				'condition' => [
				  	'finest_modal_content' => 'html_content'
			  	]
			]
		);

		/**
		 * Modal Popup video section
		 */

		$this->add_control(
            'finest_modal_youtube_video_url',
            [
				'label'       => __( 'Provide Youtube Video URL', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'https://www.youtube.com/watch?v=b1lyIT1FvDo',
				'placeholder' => __( 'Place Youtube Video URL', 'finest-addons' ),
				'title'       => __( 'Place Youtube Video URL', 'finest-addons' ),
				'condition'   => [
                    'finest_modal_content' => 'youtube'
                ],
				'dynamic' => [
					'active' => true,
				]
            ]
        );


        $this->add_control(
            'finest_modal_vimeo_video_url',
            [
				'label'       => __( 'Provide Vimeo Video URL', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'https://vimeo.com/347565673',
				'placeholder' => __( 'Place Vimeo Video URL', 'finest-addons' ),
				'title'       => __( 'Place Vimeo Video URL', 'finest-addons' ),
				'condition'   => [
                    'finest_modal_content' => 'vimeo'
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
			'finest_modal_external_video',
			[
				'label'      => __( 'External Video', 'finest-addons' ),
				'type'       => Controls_Manager::MEDIA,
				'media_type' => 'video',
				'dynamic' => [
					'active' => true,
				],
				'condition'  => [
                    'finest_modal_content' => 'external-video'
                ]
			]
		);

		$this->add_control(
            'finest_modal_external_page_url',
            [
				'label'       => __( 'Provide External URL', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => 'https://finestdevs.com',
				'placeholder' => __( 'Place External Page URL', 'finest-addons' ),
				'condition'   => [
                    'finest_modal_content' => 'external_page'
                ],
				'dynamic' => [
					'active' => true,
				]
            ]
        );

        $this->add_responsive_control(
            'finest_modal_video_width',
            [
				'label'        => __( 'Content Width', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element iframe,
					{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-video-hosted' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-modal-item' => 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'finest_modal_content' => [ 'youtube', 'vimeo', 'external_page', 'external-video' ]
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_modal_video_height',
            [
				'label'        => __( 'Content Height', 'finest-addons' ),
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
                    '{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element iframe' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .finest-modal-item' => 'height: {{SIZE}}{{UNIT}};'
                ],
                'condition'    => [
                    'finest_modal_content' => [ 'youtube', 'vimeo', 'external_page' ]
                ]
            ]
        );

        $this->add_control(
            'finest_modal_shortcode',
            [
				'label'       => __( 'Enter your shortcode', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( '[gallery]', 'finest-addons' ),
				'condition'   => [
                    'finest_modal_content' => 'shortcode'
                ]
            ]
		);

		$this->add_responsive_control(
			'finest_modal_content_width',
			[
				'label' => __( 'Content Width', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-modal-item' => 'width: {{SIZE}}{{UNIT}};',
				],
				'condition'    => [
                    'finest_modal_content' => [ 'image', 'image-gallery', 'html_content', 'shortcode' ]
                ]
			]
		);

		$this->add_control(
			'finest_modal_btn_text',
			[
				'label'       => __( 'Button Text', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'default'     => __( '', 'finest-addons' ),
				'dynamic'     => [
					'active'  => true
				]
			]
		);

		$this->add_control(
			'finest_modal_btn_icon',
			[
				'label'       => __( 'Button Icon', 'finest-addons' ),
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
			'finest_modal_setting_section',
			[
				'label' => __( 'Settings', 'finest-addons' )
			]
		);

		$this->add_control(
			'finest_modal_overlay',
			[
				'label'        => __( 'Overlay', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'finest-addons' ),
				'label_off'    => __( 'Hide', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->add_control(
			'finest_modal_overlay_click_close',
			[
				'label'     => __( 'Close While Clicked Outside', 'finest-addons' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'ON', 'finest-addons' ),
				'label_off' => __( 'OFF', 'finest-addons' ),
				'default'   => 'yes',
				'condition' => [
					'finest_modal_overlay' => 'yes'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Modal Popup button style
		 */

		$this->start_controls_section(
			'finest_modal_display_settings',
			[
				'label' => __( 'Button', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);


		/**
		 * display settings for button normal and hover
		 */
		$this->start_controls_tabs( 'finest_modal_btn_typhography_color', ['separator' => 'before' ] );

			$this->start_controls_tab( 'finest_modal_btn_typhography_color_normal_tab', [ 'label' => esc_html__( 'Normal', 'finest-addons' )] );

				$this->add_control(
					'finest_modal_btn_typhography_color_normal',
					[
						'label'     => __( 'Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#ffffff',
						'selectors' => [
							'{{WRAPPER}} .finest-modal-button .finest-modal-image-action span' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'finest_modal_btn_background_normal',
					[
						'label'     => __( 'Background Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#4243DC',
						'selectors' => [
							'{{WRAPPER}} .finest-modal-button .finest-modal-image-action' => 'background-color: {{VALUE}};'
						]
					]
				);

				$this->add_responsive_control(
					'finest_modal_btn_align',
					[
						'label'         => __( 'Alignment', 'finest-addons' ),
						'type'          => Controls_Manager::CHOOSE,
						'default'       => 'center',
						'toggle'        => false,
						'separator'     => 'before',
						'options'       => [
							'left'      => [
								'title' => __( 'Left', 'finest-addons' ),
								'icon'  => 'eicon-text-align-left'
							],
							'center'    => [
								'title' => __( 'Center', 'finest-addons' ),
								'icon'  => 'eicon-text-align-center'
							],
							'right'     => [
								'title' => __( 'Right', 'finest-addons' ),
								'icon'  => 'eicon-text-align-right'
							]
						],
						'selectors'     => [
							'{{WRAPPER}} .finest-modal-button' => 'text-align: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Typography::get_type(),
					[
						'name'      => 'finest_modal_btn_typhography',
						'label'     => __( 'Button Typography', 'finest-addons' ),
						'selector'  => '{{WRAPPER}} .finest-modal-button .finest-modal-image-action span'
					]
				);

				$this->add_control(
					'finest_modal_btn_enable_fixed_width_height',
					[
						'label' => __( 'Enable Fixed Height & Width?', 'finest-addons' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'finest-addons' ),
						'label_off' => __( 'Hide', 'finest-addons' ),
						'return_value' => 'yes',
						'default' => 'no',
					]
				);

				$this->add_control(
					'finest_modal_btn_fixed_width_height',
					[
						'label' => __( 'Fixed Height & Width', 'finest-addons' ),
						'type' => Controls_Manager::POPOVER_TOGGLE,
						'label_off' => __( 'Default', 'finest-addons' ),
						'label_on' => __( 'Custom', 'finest-addons' ),
						'return_value' => 'yes',
						'default' => 'yes',
						'condition' => [
							'finest_modal_btn_enable_fixed_width_height' => 'yes'
						]
					]
				);

				$this->start_popover();

					$this->add_responsive_control(
						'finest_modal_btn_fixed_width',
						[
							'label'      => esc_html__( 'Width', 'finest-addons' ),
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
								'{{WRAPPER}} .finest-modal-button .finest-modal-image-action' => 'width: {{SIZE}}{{UNIT}};'

							],
							'condition' => [
								'finest_modal_btn_enable_fixed_width_height' => 'yes'
							]
						]
					);

					$this->add_responsive_control(
						'finest_modal_btn_fixed_height',
						[
							'label'      => esc_html__( 'Height', 'finest-addons' ),
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
								'{{WRAPPER}} .finest-modal-button .finest-modal-image-action' => 'height: {{SIZE}}{{UNIT}};'
							],
							'condition' => [
								'finest_modal_btn_enable_fixed_width_height' => 'yes'
							]
						]
					);

				$this->end_popover();

				$this->add_responsive_control(
					'finest_modal_btn_width',
					[
						'label'        => esc_html__( 'Width', 'finest-addons' ),
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
							'{{WRAPPER}} .finest-modal-button .finest-modal-image-action' => 'width: {{SIZE}}{{UNIT}};'
						],
						'condition' => [
							'finest_modal_btn_enable_fixed_width_height!' => 'yes'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'               => 'finest_modal_btn_border_normal',
						'selector'           => '{{WRAPPER}} .finest-modal-button .finest-modal-image-action'
					]
				);

				$this->add_responsive_control(
					'finest_modal_btn_radius',
					[
						'label'      => __( 'Border Radius', 'finest-addons' ),
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
							'{{WRAPPER}} .finest-modal-image-action, {{WRAPPER}} .finest-modal-image-action::before' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						]
					]
				);

				$this->add_responsive_control(
					'finest_modal_btn_padding',
					[
						'label'        => __( 'Padding', 'finest-addons' ),
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
							'{{WRAPPER}} .finest-modal-image-action' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
						]
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab( 'finest_modal_btn_typhography_color_hover_tab', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

				$this->add_control(
					'finest_modal_btn_color_hover',
					[
						'label'     => __( 'Text Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#fff',
						'selectors' => [
							'{{WRAPPER}} .finest-modal-button .finest-modal-image-action:hover span' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'finest_modal_btn_background_hover',
					[
						'label'     => __( 'Background Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#EF2469',
						'selectors' => [
							'{{WRAPPER}} .finest-modal-button .finest-modal-image-action:hover' => 'background-color: {{VALUE}};'
						]
					]
				);
				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'     => 'finest_modal_btn_border_hover',
						'selector' => '{{WRAPPER}} .finest-modal-button .finest-modal-image-action:hover'
					]
				);

			$this->end_controls_tab();
		$this->end_controls_tabs();

        $this->end_controls_section();

		/**
		 * Modal Popup Icon section
		 */
		$this->start_controls_section(
			'finest_modal_icon_section',
			[
				'label' => __( 'Icon', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
				]
		);

		$this->add_control(
			'finest_modal_btn_icon_color',
			[
				'label'     => __( 'Icon Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .finest-modal-button .finest-modal-image-action span i' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'finest_modal_btn_icon_align',
			[
				'label'     => __( 'Icon Position', 'finest-addons' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => [
					'left'  => __( 'Before', 'finest-addons' ),
					'right' => __( 'After', 'finest-addons' )
				],
				'condition' => [
                    'finest_modal_btn_icon[value]!' => ''
                ]
			]
		);

		$this->add_responsive_control(
			'finest_modal_btn_icon_indent',
			[
				'label'       => __( 'Icon Spacing', 'finest-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'range'       => [
					'px'      => [
						'max' => 50
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .finest-modal-button .finest-modal-image-action span.finest-modal-action-icon-left i' => 'margin-right: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-modal-button .finest-modal-image-action span.finest-modal-action-icon-right i' => 'margin-left: {{SIZE}}{{UNIT}};'
				],
				'condition'   => [
                    'finest_modal_btn_icon[value]!' => ''
                ]
			]
		);
		$this->end_controls_section();

		/**
		 * Modal Popup Container section
		 */
		$this->start_controls_section(
			'finest_modal_container_section',
			[
				'label' => __( 'Container', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'finest_modal_content_align',
			[
				'label'     => __( 'Alignment', 'finest-addons' ),
				'type'      => Controls_Manager::CHOOSE,
				'toggle'    => false,
				'default'   => 'center',
				'options'   => [
					'left'  => [
						'title' => __( 'Left', 'finest-addons' ),
						'icon'  => 'eicon-text-align-left'
					],
					'center'    => [
						'title' => __( 'Center', 'finest-addons' ),
						'icon'  => 'eicon-text-align-center'
					],
					'right'     => [
						'title' => __( 'Right', 'finest-addons' ),
						'icon'  => 'eicon-text-align-right'
					]
				],
				'selectors' => [
					'{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element' => 'text-align: {{VALUE}};'
				],
				'condition' => [
					'finest_modal_content' => ['image-gallery', 'html_content']
				]
			]
		);

		$this->add_responsive_control(
			'finest_modal_content_height',
			[
				'label' => __( 'Contant Height for Tablet & Mobile', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-modal-item.modal-vimeo' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'      => 'finest_modal_image_gallery_description_typography',
				'selector'  => '{{WRAPPER}} .finest-modal-content .finest-modal-element .finest-modal-element-card .finest-modal-element-card-body p',
				'condition' => [
					'finest_modal_content' => [ 'image-gallery' ]
				]
			]
		);

		$this->add_control(
			'finest_modal_image_gallery_description_color',
			[
				'label'     => __( 'Description Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .finest-modal-content .finest-modal-element .finest-modal-element-card .finest-modal-element-card-body p'  => 'color: {{VALUE}};'
				],
				'condition' => [
					'finest_modal_content' => [ 'image-gallery' ]
				]
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'finest_modal_content_border',
				'selector' => '{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element'
			]
		);

		$this->add_control(
			'finest_modal_image_gallery_bg',
			[
				'label'     => __( 'Background Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element'  => 'background: {{VALUE}};'
				],
				'condition' => [
					'finest_modal_content' => ['image-gallery', 'html_content']
				]
			]
		);

		$this->add_control(
			'finest_modal_image_gallery_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element .finest-modal-element-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition'  => [
					'finest_modal_content' => [ 'image-gallery', 'html_content' ]
				]
			]
		);

        $this->add_responsive_control(
            'finest_modal_image_gallery_description_margin',
            [
                'label'      => __('Margin(Description)', 'finest-addons'),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .finest-modal-item .finest-modal-content .finest-modal-element .finest-modal-element-card-body' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
				'condition'  => [
					'finest_modal_content' => [ 'image-gallery' ]
				]
            ]
        );

		$this->add_control(
			'finest_modal_overlay_overflow_x',
			[
				'label'        => __( 'Overflow X', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'finest-addons' ),
				'label_off'    => __( 'No', 'finest-addons' ),
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'finest_modal_overlay_overflow_y',
			[
				'label'        => __( 'Overflow Y', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'finest-addons' ),
				'label_off'    => __( 'No', 'finest-addons' ),
				'default'      => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'finest_modal_animation_tab',
			[
				'label' => __( 'Animation', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'finest_modal_transition',
			[
				'label'   => __( 'Style', 'finest-addons' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'top-to-middle',
				'options' => [
					'top-to-middle'    => __( 'Top To Middle', 'finest-addons' ),
					'bottom-to-middle' => __( 'Bottom To Middle', 'finest-addons' ),
					'right-to-middle'  => __( 'Right To Middle', 'finest-addons' ),
					'left-to-middle'   => __( 'Left To Middle', 'finest-addons' ),
					'zoom-in'          => __( 'Zoom In', 'finest-addons' ),
					'zoom-out'         => __( 'Zoom Out', 'finest-addons' ),
					'left-rotate'      => __( 'Rotation', 'finest-addons' )
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Modal Popup overlay style
		 */

		$this->start_controls_section(
			'finest_modal_overlay_tab',
			[
				'label'     => __( 'Overlay', 'finest-addons' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'finest_modal_overlay' => 'yes'
				]
			]
		);

		$this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name'            => 'finest_modal_overlay_color',
                'types'           => [ 'classic' ],
                'selector'        => '{{WRAPPER}} .finest-modal-overlay',
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
			'finest_modal_close_btn_style',
			[
				'label' => __( 'Close Button', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'finest_modal_close_btn_position',
			[
				'label' => __( 'Close Button Position', 'finest-addons' ),
				'type' => Controls_Manager::POPOVER_TOGGLE,
				'label_off' => __( 'Default', 'finest-addons' ),
				'label_on' => __( 'Custom', 'finest-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
        );

        $this->start_popover();

            $this->add_responsive_control(
                'finest_modal_close_btn_position_x_offset',
                [
                    'label' => __( 'X Offset', 'finest-addons' ),
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
                        '{{WRAPPER}} .finest-modal-item.modal-vimeo .finest-modal-content .finest-close-btn' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_responsive_control(
                'finest_modal_close_btn_position_y_offset',
                [
                    'label' => __( 'Y Offset', 'finest-addons' ),
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
                        '{{WRAPPER}} .finest-modal-item.modal-vimeo .finest-modal-content .finest-close-btn' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_popover();

		$this->add_responsive_control(
            'finest_modal_close_btn_icon_size',
            [
				'label'      => __( 'Icon Size', 'finest-addons' ),
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
					'{{WRAPPER}} .finest-modal-item.modal-vimeo .finest-modal-content .finest-close-btn span::before' => 'width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .finest-modal-item.modal-vimeo .finest-modal-content .finest-close-btn span::after' => 'height: {{SIZE}}{{UNIT}}'
                ],
            ]
        );

        $this->add_control(
			'finest_modal_close_btn_color',
			[
				'label'     => __( 'Color', 'finest-addons' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .finest-modal-item.modal-vimeo .finest-modal-content .finest-close-btn span::before, {{WRAPPER}} .finest-modal-item.modal-vimeo .finest-modal-content .finest-close-btn span::after'  => 'background: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'finest_modal_close_btn_bg_color',
			[
				'label'    => __( 'Background Color', 'finest-addons' ),
				'type'     => Controls_Manager::COLOR,
				'default'  => 'transparent',
				'selectors' => [
					'{{WRAPPER}} .finest-modal-item.modal-vimeo .finest-modal-content .finest-close-btn'  => 'background: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings            = $this->get_settings_for_display();

		if( 'youtube' === $settings['finest_modal_content'] ){
			$url = $settings['finest_modal_youtube_video_url'];

			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $matches);

			$youtube_id = $matches[1];
		}

		if( 'vimeo' === $settings['finest_modal_content'] ){
			$vimeo_url       = $settings['finest_modal_vimeo_video_url'];
			$vimeo_id_select = explode('/', $vimeo_url);
			$vidid           = explode( '&', str_replace('https://vimeo.com', '', end($vimeo_id_select) ) );
			$vimeo_id        = $vidid[0];
		}

		$this->add_render_attribute( 'finest_modal_action', [
			'class'             => 'finest-modal-image-action image-modal',
			'data-finest-modal'   => '#finest-modal-' . $this->get_id(),
			'data-finest-overlay' => esc_attr( $settings['finest_modal_overlay'] )
		] );

		$this->add_render_attribute( 'finest_modal_overlay', [
			'class'                         => 'finest-modal-overlay',
			'data-finest_overlay_click_close' => $settings['finest_modal_overlay_click_close']
		] );

		$this->add_render_attribute( 'finest_modal_item', 'class', 'finest-modal-item' );
		$this->add_render_attribute( 'finest_modal_item', 'class', 'modal-vimeo' );
		$this->add_render_attribute( 'finest_modal_item', 'class', $settings['finest_modal_transition'] );
		$this->add_render_attribute( 'finest_modal_item', 'class', $settings['finest_modal_content'] );
		$this->add_render_attribute( 'finest_modal_item', 'class', esc_attr('finest-content-overflow-x-' . $settings['finest_modal_overlay_overflow_x'] ) );
		$this->add_render_attribute( 'finest_modal_item', 'class', esc_attr('finest-content-overflow-y-' . $settings['finest_modal_overlay_overflow_y'] ) );
		?>

		<div class="finest-modal">
			<div class="finest-modal-wrapper">

				<div class="finest-modal-button finest-modal-btn-fixed-width-<?php echo esc_attr($settings['finest_modal_btn_enable_fixed_width_height']);?>">
					<a href="#" <?php echo $this->get_render_attribute_string('finest_modal_action');?> >
						<span class="finest-modal-action-icon-<?php echo esc_attr($settings['finest_modal_btn_icon_align']);?>">
							<?php if( 'left' === $settings['finest_modal_btn_icon_align'] && !empty( $settings['finest_modal_btn_icon']['value'] ) ) {
								Icons_Manager::render_icon( $settings['finest_modal_btn_icon'], [ 'aria-hidden' => 'true' ] );
							}
							echo esc_html( $settings['finest_modal_btn_text'] );
							if( 'right' === $settings['finest_modal_btn_icon_align'] && !empty( $settings['finest_modal_btn_icon']['value'] ) ) {
								Icons_Manager::render_icon( $settings['finest_modal_btn_icon'], [ 'aria-hidden' => 'true' ] );
							} ;?>
						</span>
					</a>
				</div>

				<div id="finest-modal-<?php echo esc_attr( $this->get_id() );?>" <?php echo $this->get_render_attribute_string('finest_modal_item') ;?> >
					<div class="finest-modal-content">
						<div class="finest-modal-element <?php echo esc_attr( $settings['finest_modal_image_gallery_column'] );?>">
							<?php if ( 'image' === $settings['finest_modal_content'] ) {
								echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'finest_modal_image' );
							}

							if ( 'image-gallery' === $settings['finest_modal_content'] ) {
								foreach ( $settings['finest_modal_image_gallery_repeater'] as $gallery ) : ?>
									<div class="finest-modal-element-card">
										<div class="finest-modal-element-card-thumb">
											<?php echo Group_Control_Image_Size::get_attachment_image_html( $gallery, 'thumbnail', 'finest_modal_image_gallery' );?>
										</div>
										<?php if ( !empty( $gallery['finest_modal_image_gallery_text'] ) ) {?>
											<div class="finest-modal-element-card-body">
												<p><?php echo wp_kses_post( $gallery['finest_modal_image_gallery_text'] );?></p>
											</div>
										<?php } ;?>
									</div>
								<?php
								endforeach;
							}

							if ( 'html_content' === $settings['finest_modal_content'] ) { ?>
								<div class="finest-modal-element-body">
									<p><?php echo wp_kses_post( $settings['finest_modal_html_content'] );?></p>
								</div>
							<?php }

							if ( 'youtube' === $settings['finest_modal_content'] ) { ?>
								<iframe src="https://www.youtube.com/embed/<?php echo esc_attr( $youtube_id );?>" frameborder="0" allowfullscreen></iframe>
							<?php }

							if ( 'vimeo' === $settings['finest_modal_content'] ) { ?>
								<iframe id="vimeo-video" src="https://player.vimeo.com/video/<?php echo esc_attr( $vimeo_id );?>" frameborder="0" allowfullscreen ></iframe>
							<?php }

							if ( 'external-video' === $settings['finest_modal_content'] ) { ?>
								<video class="finest-video-hosted" src="<?php echo esc_url( $settings['finest_modal_external_video']['url'] );?>" controls="" controlslist="nodownload">
								</video>
							<?php }

							if ( 'external_page' === $settings['finest_modal_content'] ) { ?>
								<iframe src="<?php echo esc_url( $settings['finest_modal_external_page_url'] );?>" frameborder="0" allowfullscreen ></iframe>
							<?php }

							if ( 'shortcode' === $settings['finest_modal_content'] ) {
								echo do_shortcode( $settings['finest_modal_shortcode'] );
							} ;?>

							<div class="finest-close-btn">
								<span></span>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div <?php echo $this->get_render_attribute_string('finest_modal_overlay');?>></div>
		</div>
	<?php
	}
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Modal_Popup() );