<?php
namespace Finest_Addons\Widgets;

if ( ! defined( 'ABSPATH' ) ) exit; // If this file is called directly, abort.

use \Elementor\Controls_Manager;
use \Elementor\Repeater;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Background;
use \Elementor\Control_Media;
use \Elementor\Icons_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Css_Filter;
use \Elementor\Utils;
use \Elementor\Widget_Base;

class Finest_Team_Member extends Widget_Base {

	public function get_name() {
		return 'finest-team-member';
	}

	public function get_title() {
		return esc_html__( 'Team Member', 'finest-addons' );
	}

	public function get_icon() {
		return 'feather icon-user-plus';
	}

	public function get_categories() {
		return [ 'finest-addons' ];
	}

	public function get_keywords() {
        return [ 'finest', 'employee', 'staff', 'team', 'member' ];
    }

	protected function register_controls() {

		/**
		* Team Member Content Section
		*/
		$this->start_controls_section(
			'finest_team_content',
			[
				'label' => esc_html__( 'Content', 'finest-addons' )
			]
		);

		$this->add_control(
			'finest_team_member_image',
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
		$this->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'team_member_image_size',
				'default'   => 'medium_large',
				'condition' => [
					'finest_team_member_image[url]!' => ''
				]
			]
		);

		$this->add_control(
			'finest_team_member_mask_shape_position',
			[
				'label'       => __( 'Position', 'finest-addons' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'center',
				'label_block' => true,
				'options'     => [
					'top'     => __( 'Top', 'finest-addons' ),
					'center'  => __( 'Center', 'finest-addons' ),
					'left'    => __( 'Left', 'finest-addons' ),
					'right'   => __( 'Right', 'finest-addons' ),
					'bottom'  => __( 'Bottom', 'finest-addons' ),
					'custom'  => __( 'Custom', 'finest-addons' )
                ],
                'selectors'   => [
					'{{WRAPPER}} .finest-team-member-thumb img' => '-webkit-mask-position: {{VALUE}};'
				],
				'condition' 		   => [
					'finest_team_member_enable_image_mask' => 'yes'
				]
			]
		);

		$this->add_control(
			'finest_team_member_mask_shape_position_x_offset',
			[
				'label'       => __( 'X Offset', 'finest-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px', '%' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 500
					],
					'%'       => [
						'min' => 0,
						'max' => 100
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .finest-team-member-thumb img' => '-webkit-mask-position-y: {{SIZE}}{{UNIT}};'
                ],
                'condition'   => [
					'finest_team_member_enable_image_mask' => 'yes',
                    'finest_team_member_mask_shape_position' => 'custom'
				]
			]
		);

		$this->add_control(
			'finest_team_member_mask_shape_position_y_offset',
			[
				'label'       => __( 'Y Offset', 'finest-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px', '%' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 500
					],
					'%'       => [
						'min' => 0,
						'max' => 100
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .finest-team-member-thumb img' => '-webkit-mask-position-x: {{SIZE}}{{UNIT}};'
                ],
                'condition'   => [
					'finest_team_member_enable_image_mask' => 'yes',
                    'finest_team_member_mask_shape_position' => 'custom'
				]
			]
		);

        $this->add_control(
			'finest_team_member_mask_shape_size',
			[
				'label'       => __( 'Size', 'finest-addons' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'auto',
				'label_block' => true,
				'options'     => [
					'auto'    => __( 'Auto', 'finest-addons' ),
					'contain' => __( 'Contain', 'finest-addons' ),
					'cover'   => __( 'Cover', 'finest-addons' ),
					'custom'  => __( 'Custom', 'finest-addons' )
                ],
                'selectors'   => [
					'{{WRAPPER}} .finest-team-member-thumb img' => '-webkit-mask-size: {{VALUE}};'
				],
				'condition' 		   => [
					'finest_team_member_enable_image_mask' => 'yes'
				]
			]
        );

        $this->add_control(
			'finest_team_member_mask_shape_custome_size',
			[
				'label'       => __( 'Mask Size', 'finest-addons' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => [ 'px', '%' ],
				'range'       => [
					'px'      => [
						'min' => 0,
						'max' => 600
					],
					'%'       => [
						'min' => 0,
						'max' => 100
					]
				],
				'selectors'   => [
					'{{WRAPPER}} .finest-team-member-thumb img' => '-webkit-mask-size: {{SIZE}}{{UNIT}};'
                ],
                'condition'   => [
					'finest_team_member_enable_image_mask' => 'yes',
                    'finest_team_member_mask_shape_size' => 'custom'
				]
			]
		);

        $this->add_control(
			'finest_team_member_mask_shape_repeat',
			[
				'label'         => __( 'Repeat', 'finest-addons' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'no-repeat',
				'label_block'   => true,
				'options'       => [
					'no-repeat' => __( 'No repeat', 'finest-addons' ),
					'repeat'    => __( 'Repeat', 'finest-addons' )
                ],
                'selectors'     => [
					'{{WRAPPER}} .finest-team-member-thumb img' => '-webkit-mask-repeat: {{VALUE}};'
				],
				'condition' 	=> [
					'finest_team_member_enable_image_mask' => 'yes'
				]
			]
		);

		$this->add_control(
			'finest_team_member_name',
			[
				'label'       => esc_html__( 'Name', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'John Doe', 'finest-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_team_member_designation',
			[
				'label'       => esc_html__( 'Designation', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Designation', 'finest-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_team_member_description',
			[
				'label'   => esc_html__( 'Description', 'finest-addons' ),
				'type'    => Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Put team member details here. Click here to edit it from the inline editor.', 'finest-addons' ),
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_section_team_members_cta_btn',
			[
				'label'        => __( 'Call To Action', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'ON', 'finest-addons' ),
				'label_off'    => __( 'OFF', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_control(
			'finest_team_members_cta_btn_text',
			[
				'label'       => esc_html__( 'Text', 'finest-addons' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'default'     => esc_html__( 'Read More', 'finest-addons' ),
				'condition'   => [
					'finest_section_team_members_cta_btn' => 'yes'
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'finest_team_members_cta_btn_link',
			[
				'label'       => esc_html__( 'Link', 'finest-addons' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'default'     => [
					'url'         => '#',
					'is_external' => ''
     			],
				'show_external' => true,
				'condition' => [
					'finest_section_team_members_cta_btn' => 'yes'
				]
			]
		);


		$this->end_controls_section();
		/*
		* Team member Social profiles section
		*/

		$this->start_controls_section(
			'finest_section_team_member_social_profiles',
			[
				'label' => esc_html__( 'Social Profiles', 'finest-addons' )
			]
		);
		$this->add_control(
			'finest_team_member_enable_social_profiles',
			[
				'label'   => esc_html__( 'Display Social Profiles?', 'finest-addons' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'social_icon',
			[
				'label'            => __( 'Icon', 'finest-addons' ),
				'type'             => Controls_Manager::ICONS,
				'label_block'      => true,
				'default'          => [
					'value'        => 'fab fa-wordpress',
					'library'      => 'fa-brands'
				],
				'recommended'      => [
					'fa-brands'    => [
						'android',
						'apple',
						'behance',
						'bitbucket',
						'codepen',
						'delicious',
						'deviantart',
						'digg',
						'dribbble',
						'facebook',
						'flickr',
						'foursquare',
						'free-code-camp',
						'github',
						'gitlab',
						'globe',
						'google-plus',
						'houzz',
						'instagram',
						'jsfiddle',
						'linkedin',
						'medium',
						'meetup',
						'mixcloud',
						'odnoklassniki',
						'pinterest',
						'product-hunt',
						'reddit',
						'shopping-cart',
						'skype',
						'slideshare',
						'snapchat',
						'soundcloud',
						'spotify',
						'stack-overflow',
						'steam',
						'stumbleupon',
						'telegram',
						'thumb-tack',
						'tripadvisor',
						'tumblr',
						'twitch',
						'twitter',
						'viber',
						'vimeo',
						'vk',
						'weibo',
						'weixin',
						'whatsapp',
						'wordpress',
						'xing',
						'yelp',
						'youtube',
						'500px'
					],
					'fa-solid' => [
						'envelope',
						'link',
						'rss'
					]
				]
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'       => __( 'Link', 'finest-addons' ),
				'type'        => Controls_Manager::URL,
				'label_block' => true,
				'default'     => [
					'url'         => '#',
					'is_external' => 'true'
				],
				'dynamic'     => [
					'active'  => true
				],
				'placeholder' => __( 'https://your-link.com', 'finest-addons' )
			]
		);

		$this->add_control(
			'finest_team_member_social_profile_links',
			[
				'label'       => __( 'Social Icons', 'finest-addons' ),
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'condition'   => [
					'finest_team_member_enable_social_profiles!' => ''
				],
				'default'     => [
					[
						'social_icon' => [
							'value'   => 'fab fa-facebook-f',
							'library' => 'fa-brands'
						]
					],
					[
						'social_icon' => [
							'value'   => 'fab fa-twitter',
							'library' => 'fa-brands'
						]
					],
					[
						'social_icon' => [
							'value'   => 'fab fa-linkedin-in',
							'library' => 'fa-brands'
						],
					],
					[
						'social_icon' => [
							'value'   => 'fab fa-google-plus-g',
							'library' => 'fa-brands',
						]
					]
				],
				'title_field' => '{{{ elementor.helpers.getSocialNetworkNameFromIcon( social_icon, false, true, false, true ) }}}'
			]
		);


		$this->end_controls_section();


		/*
		* Team Members Styling Section
		*/

		/*
		* Team Members Container Style
		*/
		$this->start_controls_section(
			'finest_section_team_members_styles_preset',
			[
				'label' => esc_html__( 'Container', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'finest_team_members_bg',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .finest-team-member'
			]
		);

		// $this->add_control(
		// 	'finest_team_members_glass_effect',
		// 	[
		// 		'label' => __( 'Blur Size', 'finest-addons' ),
		// 		'type' => Controls_Manager::SLIDER,
		// 		'size_units' => [ 'px' ],
		// 		'range' => [
		// 			'px' => [
		// 				'min' => 0,
		// 				'max' => 100,
		// 				'step' => 1,
		// 			],
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .finest-team-member' => 'backdrop-filter: blur({{SIZE}}{{UNIT}});',
		// 		],
		// 	]
		// );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'finest_team_members_border',
				'selector' => '{{WRAPPER}} .finest-team-member'
			]
		);

		$this->add_responsive_control(
			'finest_team_members_radius',
			[
				'label'      => __( 'Border radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_members_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_members_margin',
			[
				'label'      => __( 'Margin', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'finest_team_members_box_shadow',
				'selector' => '{{WRAPPER}} .finest-team-member',
				'fields_options'         => [
		            'box_shadow_type'    => [
		                'default'        =>'yes'
		            ],
		            'box_shadow'         => [
		                'default'        => [
		                    'horizontal' => 0,
		                    'vertical'   => 20,
		                    'blur'       => 49,
		                    'spread'     => 0,
		                    'color'      => 'rgba(24, 27, 33, 0.1)'
		                ]
		            ]
	            ]
			]
		);

		$this->end_controls_section();

		/**
		 * For Thumbnail style
		 */

		$this->start_controls_section(
			'finest_section_team_members_image_style',
			[
				'label' => esc_html__( 'Image', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
            'finest_team_membe_image_position',
            [
                'label'         => esc_html__( 'Image Position', 'finest-addons' ),
                'type'          => Controls_Manager::CHOOSE,
                'toggle'        => false,
                'default'       => 'finest-position-top',
                'options'       => [
                    'finest-position-left'  => [
                        'title' => esc_html__( 'Left', 'finest-addons' ),
                        'icon'  => 'eicon-arrow-left'
                    ],
                    'finest-position-top'   => [
                        'title' => esc_html__( 'Top', 'finest-addons' ),
                        'icon'  => 'eicon-arrow-up'
                    ],
                    'finest-position-right' => [
                        'title' => esc_html__( 'Right', 'finest-addons' ),
                        'icon'  => 'eicon-arrow-right'
                    ]
                ]
            ]
        );

		$this->add_control(
			'finest_section_team_members_thumbnail_box',
			[
				'label'        => __( 'Image Box', 'finest-addons' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Show', 'finest-addons' ),
				'label_off'    => __( 'Hide', 'finest-addons' ),
				'return_value' => 'yes',
				'default'      => 'no'
			]
		);

		$this->add_responsive_control(
            'finest_section_team_members_thumbnail_box_height',
            [
                'label'      => __( 'Height', 'finest-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'default'    => [
                    'unit'   => 'px',
                    'size'   => 100
                ],
                'range'        => [
                    'px'       => [
                        'min'  => 50,
                        'max'  => 500,
                        'step' => 5
                    ],
                    '%'        => [
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 2
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-team-member-thumb'=> 'height: {{SIZE}}{{UNIT}};'
                ],
                'condition'  => [
                    'finest_section_team_members_thumbnail_box' => 'yes'
                ]
            ]
        );

        $this->add_responsive_control(
            'finest_section_team_members_thumbnail_box_width',
            [
                'label'      => __( 'Width', 'finest-addons' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'default'    => [
                    'unit'   => 'px',
                    'size'   => 100
                ],
                'range'        => [
                    'px'       => [
                        'min'  => 50,
                        'max'  => 500,
                        'step' => 5
                    ],
                    '%'        => [
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 2
                    ]
                ],
                'selectors'  => [
                    '{{WRAPPER}} .finest-team-member-thumb'=> 'width: {{SIZE}}{{UNIT}};'
                ],
                'condition'  => [
                    'finest_section_team_members_thumbnail_box' => 'yes'
                ]
            ]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'      => 'finest_section_team_members_thumbnail_box_border',
				'selector'  => '{{WRAPPER}} .finest-team-member-thumb',
				'condition' => [
					'finest_section_team_members_thumbnail_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'finest_section_team_members_thumbnail_box_radius',
			[
				'label'      => __( 'Border radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator'  => 'after',
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-thumb' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .finest-team-member-thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_section_team_members_thumbnail_box_margin_top',
			[
				'label'      => __( 'Top Spacing', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default'    => [
					'unit'   => 'px',
					'size'   => 0
				],
				'range'        => [
                    'px'       => [
                        'min'  => -300,
                        'max'  => 300,
                        'step' => 5
                    ],
                    '%'        => [
                        'min'  => -50,
                        'max'  => 50,
                        'step' => 2
                    ]
                ],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-thumb' => 'margin-top: {{SIZE}}{{UNIT}};'
				],
				'condition'  => [
					'finest_section_team_members_thumbnail_box' => 'yes'
				]
			]
		);

		$this->add_responsive_control(
			'finest_section_team_members_thumbnail_box_margin_bottom',
			[
				'label'      => __( 'Bottom Spacing', 'finest-addons' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'default'    => [
					'unit'   => 'px',
					'size'   => 0
				],
				'range'        => [
                    'px'       => [
                        'min'  => -300,
                        'max'  => 300,
                        'step' => 5
                    ],
                    '%'        => [
                        'min'  => -50,
                        'max'  => 50,
                        'step' => 2
                    ]
                ],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};'
				],
				'condition'  => [
					'finest_section_team_members_thumbnail_box' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'      => 'finest_section_team_members_thumbnail_box_shadow',
				'selector'  => '{{WRAPPER}} .finest-team-member-thumb',
				'condition' => [
					'finest_section_team_members_thumbnail_box' => 'yes'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'finest_section_team_members_thumbnail_css_filter',
				'selector' => '{{WRAPPER}} .finest-team-member-thumb img',
			]
		);

		$this->end_controls_section();

		/*
		* Team Members Content Style
		*/
		$this->start_controls_section(
			'finest_section_team_members_content_style',
			[
				'label' => esc_html__( 'Content', 'finest-addons' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'finest_team_member_content_alignment',
			[
				'label'   => __( 'Alignment', 'finest-addons' ),
				'type'    => Controls_Manager::CHOOSE,
				'toggle'  => false,
				'options' => [
					'finest-left'   => [
						'title'   => __( 'Left', 'finest-addons' ),
						'icon'    => 'eicon-text-align-left'
					],
					'finest-center' => [
						'title'   => __( 'Center', 'finest-addons' ),
						'icon'    => 'eicon-text-align-center'
					],
					'finest-right'  => [
						'title'   => __( 'Right', 'finest-addons' ),
						'icon'    => 'eicon-text-align-right'
					]
				],
				'default' => 'finest-center'
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'finest_team_members_content_background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .finest-team-member-content'
			]
		);

		$this->add_responsive_control(
			'finest_section_team_members_content_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '30',
					'right'  => '30',
					'bottom' => '30',
					'left'   => '30'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_section_team_members_content_margin',
			[
				'label'      => __( 'Margin', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_member_content_border_radius',
			[
				'label'      => __( 'Border Radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'finest_section_team_members_content_box_shadow',
				'selector' => '{{WRAPPER}} .finest-team-member-content'
			]
		);

		$this->end_controls_section();

		/*
		* Name style
		*/
		$this->start_controls_section(
            'section_team_carousel_name',
            [
				'label' => __('Name', 'finest-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'finest_team_name_color',
            [
				'label'     => __('Color', 'finest-addons'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#000000',
				'selectors' => [
                    '{{WRAPPER}} .finest-team-member-name' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
				'name'     => 'finest_team_name_typography',
				'selector' => '{{WRAPPER}} .finest-team-member-name'
            ]
		);

		$this->add_responsive_control(
			'finest_team_members_name_margin',
			[
				'label'        => __( 'Margin', 'finest-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'    => [
					'{{WRAPPER}} .finest-team-member-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Designation Style
		 */
        $this->start_controls_section(
            'section_team_member_designation',
            [
				'label' => __('Designation', 'finest-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'finest_team_designation_color',
            [
				'label'     => __('Color', 'finest-addons'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#8a8d91',
				'selectors' => [
                    '{{WRAPPER}} .finest-team-member-designation' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
				'name'     => 'finest_team_designation_typography',
				'selector' => '{{WRAPPER}} .finest-team-member-designation'
            ]
		);

		$this->add_responsive_control(
			'finest_team_members_designation_margin',
			[
				'label'        => __( 'Margin', 'finest-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'    => [
					'{{WRAPPER}} .finest-team-member-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Description Style
		 */

        $this->start_controls_section(
            'section_team_carousel_description',
            [
				'label' => __('Description', 'finest-addons'),
				'tab'   => Controls_Manager::TAB_STYLE
            ]
        );

        $this->add_control(
            'finest_description_color',
            [
				'label'     => __('Color', 'finest-addons'),
				'type'      => Controls_Manager::COLOR,
				'default'   => '#8a8d91',
				'selectors' => [
                    '{{WRAPPER}} .finest-team-member-about' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
				'name'     => 'finest_description_typography',
				'selector' => '{{WRAPPER}} .finest-team-member-about',
				'fields_options'          => [
		              'line_height'       => [
		                'desktop_default' => [
		                    'unit' => 'em',
		                    'size' => 1.5
		                ]
		            ]
	            ]
            ]
		);

		$this->add_responsive_control(
			'finest_team_members_description_margin',
			[
				'label'        => __( 'Margin', 'finest-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'    => [
					'{{WRAPPER}} .finest-team-member-about' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		/**
		 * Call to action Style
		 */
        $this->start_controls_section(
            'finest_team_member_cta_btn_style',
            [
				'label'     => __('Call To Action', 'finest-addons'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'finest_section_team_members_cta_btn' => 'yes'
				]
            ]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'finest_team_member_cta_btn_typography',
				'selector' => '{{WRAPPER}} .finest-team-member-cta'
			]
		);

		$this->add_responsive_control(
			'finest_team_member_cta_btn_margin',
			[
				'label'        => __( 'Margin', 'finest-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '0',
					'right'    => '0',
					'bottom'   => '20',
					'left'     => '0',
					'isLinked' => false
				],
				'selectors'    => [
					'{{WRAPPER}} .finest-team-member-cta' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_member_cta_btn_padding',
			[
				'label'        => __( 'Padding', 'finest-addons' ),
				'type'         => Controls_Manager::DIMENSIONS,
				'size_units'   => [ 'px', '%', 'em' ],
				'default'      => [
					'top'      => '15',
					'right'    => '30',
					'bottom'   => '15',
					'left'     => '30',
					'isLinked' => false
				],
				'selectors'    => [
					'{{WRAPPER}} .finest-team-member-cta' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_member_cta_btn_radius',
			[
				'label'      => __( 'Border Radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-cta' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->start_controls_tabs( 'finest_team_member_cta_btn_tabs' );

			$this->start_controls_tab( 'finest_team_member_cta_btn_tab_normal', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

				$this->add_control(
					'finest_team_member_cta_btn_text_color_normal',
					[
						'label'     => esc_html__( 'Text Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#222222',
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-cta' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'finest_team_member_cta_btn_background_normal',
					[
						'label'     => esc_html__( 'Background Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#d6d6d6',
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-cta' => 'background-color: {{VALUE}};'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'     => 'finest_team_member_cta_btn_border_normal',
						'selector' => '{{WRAPPER}} .finest-team-member-cta'
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab( 'finest_team_member_cta_btn_tab_hover', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

				$this->add_control(
					'finest_team_member_cta_btn_text_color_hover',
					[
						'label'     => esc_html__( 'Text Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#d6d6d6',
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-cta:hover' => 'color: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'finest_team_member_cta_btn_background_hover',
					[
						'label'     => esc_html__( 'Background Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#222222',
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-cta:hover' => 'background-color: {{VALUE}};'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'     => 'finest_team_member_cta_btn_border_hover',
						'selector' => '{{WRAPPER}} .finest-team-member-cta:hover'
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/**
		 * Social icons style
		 */
        $this->start_controls_section(
            'finest_team_member_social_section',
            [
				'label'     => __('Social Icons', 'finest-addons'),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'finest_team_member_enable_social_profiles!' => ''
				]
            ]
		);


		$this->add_responsive_control(
			'finest_team_members_social_icon_size',
			[
				'label'        => __( 'Size', 'finest-addons' ),
				'type'         => Controls_Manager::SLIDER,
				'size_units'   => [ 'px' ],
				'range'        => [
					'px'       => [
						'min'  => 0,
						'max'  => 50,
						'step' => 1
					]
				],
				'default'      => [
					'unit'     => 'px',
					'size'     => 14
				],
				'selectors'    => [
					'{{WRAPPER}} .finest-team-member-social li a i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .finest-team-member-social li a svg' => 'height: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_member_social_padding',
			[
				'label'      => __( 'Padding', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator'  => 'after',
				'default'    => [
					'top'    => '15',
					'right'  => '15',
					'bottom' => '15',
					'left'   => '15'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-social li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_members_social_box_radius',
			[
				'label'      => __( 'Border radius', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'default'    => [
					'top'    => '0',
					'right'  => '0',
					'bottom' => '0',
					'left'   => '0'
				],
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-social li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_responsive_control(
			'finest_team_member_social_margin',
			[
				'label'      => __( 'Margin', 'finest-addons' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator'  => 'after',
				'selectors'  => [
					'{{WRAPPER}} .finest-team-member-social li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->start_controls_tabs( 'finest_team_members_social_icons_style_tabs' );

			$this->start_controls_tab( 'finest_team_members_social_icon_tab', [ 'label' => esc_html__( 'Normal', 'finest-addons' ) ] );

				$this->add_control(
					'finest_team_carousel_social_icon_color_normal',
					[
						'label'     => esc_html__( 'Icon Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#a4a7aa',
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-social li a i' => 'color: {{VALUE}};',
							'{{WRAPPER}} .finest-team-member-social li a svg path' => 'fill: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'finest_team_carousel_social_bg_color_normal',
					[
						'label'     => esc_html__( 'Background Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '',
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-social li a' => 'background-color: {{VALUE}};'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'     => 'finest_team_carousel_social_border_normal',
						'selector' => '{{WRAPPER}} .finest-team-member-social li a'
					]
				);

			$this->end_controls_tab();

			$this->start_controls_tab( 'finest_team_members_social_icon_hover', [ 'label' => esc_html__( 'Hover', 'finest-addons' ) ] );

				$this->add_control(
					'finest_team_carousel_social_icon_color_hover',
					[
						'label'     => esc_html__( 'Icon Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'default'   => '#8a8d91',
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-social li a:hover i' => 'color: {{VALUE}};',
							'{{WRAPPER}} .finest-team-member-social li a:hover svg path' => 'fill: {{VALUE}};'
						]
					]
				);

				$this->add_control(
					'finest_team_carousel_social_bg_color_hover',
					[
						'label'     => esc_html__( 'Background Color', 'finest-addons' ),
						'type'      => Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .finest-team-member-social li a:hover' => 'background-color: {{VALUE}};'
						]
					]
				);

				$this->add_group_control(
					Group_Control_Border::get_type(),
					[
						'name'     => 'finest_team_carousel_social_border_hover',
						'selector' => '{{WRAPPER}} .finest-team-member-social li a:hover'
					]
				);

			$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		/*
		* Team member Animating Mask
		*/

		$this->start_controls_section(
			'finest_section_team_member_animating_mask',
			[
				'label' 	=> esc_html__( 'Animating Mask', 'finest-addons' ),
				'tab'   	=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'finest_team_member_animating_mask_switcher',
			[
				'label' 		=> __( 'Enable Animating Mask', 'finest-addons' ),
				'type' 			=> Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'ON', 'finest-addons' ),
				'label_off' 	=> __( 'OFF', 'finest-addons' ),
				'return_value' 	=> 'yes',
				'default' 		=> 'no',
			]
		);

		$this->add_control(
			'finest_team_member_animating_mask_style',
			[
				'label'        => __( 'Animating Mask Style', 'finest-addons' ),
				'type'         => Controls_Manager::SELECT,
				'default'      => 'style_1',
				'options'      => [
					'style_1'  => __( 'Style 1', 'finest-addons' ),
					'style_2'  => __( 'Style 2', 'finest-addons' ),
					'style_3'  => __( 'Style 3', 'finest-addons' ),
				],
				'condition'		=> [
					'finest_team_member_animating_mask_switcher' => 'yes'
				]
			]
		);

		$this->end_controls_section();
	}


	private function team_member_cta() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'finest_team_members_cta_btn_text', 'class', 'finest-team-cta-button-text' );
		$this->add_inline_editing_attributes( 'finest_team_members_cta_btn_text', 'none' );
		?>
		<span <?php echo $this->get_render_attribute_string( 'finest_team_members_cta_btn_text' ); ?>>
			<?php echo esc_html( $settings['finest_team_members_cta_btn_text'] );	?>
		</span>
		<?php
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_render_attribute( 'finest_team_member_name', 'class', 'finest-team-member-name' );
		$this->add_inline_editing_attributes( 'finest_team_member_name', 'basic' );

		$this->add_render_attribute( 'finest_team_member_designation', 'class', 'finest-team-member-designation' );
		$this->add_inline_editing_attributes( 'finest_team_member_designation', 'basic' );

		$this->add_render_attribute( 'finest_team_member_description', 'class', 'finest-team-member-about' );
		$this->add_inline_editing_attributes( 'finest_team_member_description', 'basic' );

		$this->add_render_attribute( 'finest_team_member_item', [
            'class' => [
                'finest-team-member',
                esc_attr( $settings['finest_team_member_content_alignment'] ),
                esc_attr( $settings['finest_team_membe_image_position'] )
            ]
        ]);

		$this->add_render_attribute( 'finest_team_members_cta_btn_link', 'class', 'finest-team-member-cta' );
		if( isset( $settings['finest_team_members_cta_btn_link']['url'] ) ) {
            $this->add_render_attribute( 'finest_team_members_cta_btn_link', 'href', esc_url( $settings['finest_team_members_cta_btn_link']['url'] ) );
	        if( $settings['finest_team_members_cta_btn_link']['is_external'] ) {
	            $this->add_render_attribute( 'finest_team_members_cta_btn_link', 'target', '_blank' );
	        }
	        if( $settings['finest_team_members_cta_btn_link']['nofollow'] ) {
	            $this->add_render_attribute( 'finest_team_members_cta_btn_link', 'rel', 'nofollow' );
	        }
        }

		?>

		<div class="finest-team-item">
			<div <?php echo $this->get_render_attribute_string( 'finest_team_member_item' ); ?>>
				<?php do_action('finest_team_member_wrapper_before'); ?>
				<?php
					if ( $settings['finest_team_member_image']['url'] || $settings['finest_team_member_image']['id'] ) { ?>
						<div class="finest-team-member-thumb<?php echo ( 'yes' === $settings['finest_team_member_animating_mask_switcher'] ) ? ' '.$settings['finest_team_member_animating_mask_style'] : ''; ?>">
							<?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'team_member_image_size', 'finest_team_member_image' ); ?>
						</div>
					<?php
					}
				?>

				<div class="finest-team-member-content">
					<?php do_action('finest_team_member_content_area_before'); ?>
					<?php if ( !empty( $settings['finest_team_member_name'] ) ) : ?>
						<h2 <?php echo $this->get_render_attribute_string( 'finest_team_member_name' ); ?>><?php echo finest_wp_kses( $settings['finest_team_member_name'] ); ?></h2>
					<?php endif; ?>

					<?php if ( !empty( $settings['finest_team_member_designation'] ) ) : ?>
						<span <?php echo $this->get_render_attribute_string( 'finest_team_member_designation' ); ?>><?php echo finest_wp_kses( $settings['finest_team_member_designation'] ); ?></span>
					<?php endif; ?>

					<?php do_action('finest_team_member_description_before'); ?>
					<?php if ( !empty( $settings['finest_team_member_description'] ) ) : ?>
						<div <?php echo $this->get_render_attribute_string( 'finest_team_member_description' ); ?>><?php echo wp_kses_post( $settings['finest_team_member_description'] ); ?></div>
					<?php endif; ?>
					<?php do_action('finest_team_member_description_after'); ?>

					<?php if ( 'yes' === $settings['finest_section_team_members_cta_btn'] && !empty( $settings['finest_team_members_cta_btn_text'] ) ) : ?>
						<a <?php echo $this->get_render_attribute_string( 'finest_team_members_cta_btn_link' ); ?>>
							<?php echo $this->team_member_cta(); ?>
						</a>
					<?php
					endif;

					if ( 'yes' === $settings['finest_team_member_enable_social_profiles'] ) : ?>
						<ul class="list-inline finest-team-member-social">
							<?php
							foreach ( $settings['finest_team_member_social_profile_links'] as $index => $item ) :
								$social   = '';
								$link_key = 'link_' . $index;

								if ( 'svg' !== $item['social_icon']['library'] ) {
									$social = explode( ' ', $item['social_icon']['value'], 2 );
									if ( empty( $social[1] ) ) {
										$social = '';
									} else {
										$social = str_replace( 'fa-', '', $social[1] );
									}
								}
								if ( 'svg' === $item['social_icon']['library'] ) {
									$social = '';
								}

								if( $item['link']['url'] ) {
									$this->add_render_attribute( $link_key, 'href', esc_url( $item['link']['url'] ) );
									if( $item['link']['is_external'] ) {
										$this->add_render_attribute( $link_key, 'target', '_blank' );
									}
									if( $item['link']['nofollow'] ) {
										$this->add_render_attribute( $link_key, 'rel', 'nofollow' );
									}
								}

								$this->add_render_attribute( $link_key, 'class', [
									'finest-social-icon',
									'elementor-repeater-item-' . $item['_id'],
								] );
								?>
								<li>
									<a <?php echo $this->get_render_attribute_string( $link_key ); ?>>
										<?php Icons_Manager::render_icon( $item['social_icon'], [ 'aria-hidden' => 'true' ] ); ?>
									</a>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php
					endif;

					do_action('finest_team_member_content_area_after'); ?>

				</div>
				<?php do_action('finest_team_member_wrapper_after'); ?>
			</div>
		</div>
		<?php
	}
}
$widgets_manager->register_widget_type( new \Finest_Addons\Widgets\Finest_Team_Member() );