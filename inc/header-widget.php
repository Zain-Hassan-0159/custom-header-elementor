<?php

/**
 *  Custom Header Elementor
 *
 * @package            Custom Header Elementor
 * @author            Zain Hassan
 *
 */
   


/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

 if(!defined('ABSPATH')){
    exit;
    }
class CustomHeaderWidget extends \Elementor\Widget_Base {
	

	public function get_style_depends() {

		wp_register_style( 'bootstrap-css', plugins_url( 'assets/css/bootstrap.min.css', __FILE__ ) );

		return [
			'bootstrap-css',
		];

	}
	

	/**
	 * Get widget name.
	 *
	 * Retrieve company widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'header-widget-chw';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve company widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Header Widget', 'che-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve company widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-wordpress';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the company of categories the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'el-custom-header' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the company of keywords the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'header', 'widgets', 'custom', 'header widgets' ];
	}

	/**
	 * Register company widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Add Left Menus', 'che-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'show_mega_menu',
			[
				'label' => esc_html__( 'Mega Menu', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'che-elementor' ),
				'label_off' => esc_html__( 'Hide', 'che-elementor' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$repeater->add_control(
			'simple_menu_title', [
				'label' => __( 'Link Title', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'condition' => [
                    'show_mega_menu!' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'simple_menu_link',
			[
				'label' => esc_html__( 'Link Url', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'show_mega_menu!' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'mega_menu_title', [
				'label' => __( 'Mega Menu Title', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'mega_menu_link',
			[
				'label' => esc_html__( 'Mega Menu Link', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col1',
			[
				'label' => esc_html__( 'Column One Data', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col1_title', [
				'label' => __( 'Col Title', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col1_link',
			[
				'label' => esc_html__( 'Col Url', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col1_description',
			[
				'label' => esc_html__( 'Col Description', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'che-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'che-elementor' ),
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col1_image',
			[
				'label' => esc_html__( 'Col Image', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col2',
			[
				'label' => esc_html__( 'Column Two Data', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col2_title', [
				'label' => __( 'Col Title', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col2_link',
			[
				'label' => esc_html__( 'Col Url', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col2_description',
			[
				'label' => esc_html__( 'Col Description', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'che-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'che-elementor' ),
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col2_image',
			[
				'label' => esc_html__( 'Col Image', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col3',
			[
				'label' => esc_html__( 'Column Three Data', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col3_title', [
				'label' => __( 'Col Title', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col3_link',
			[
				'label' => esc_html__( 'Col Url', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col3_description',
			[
				'label' => esc_html__( 'Col Description', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'che-elementor' ),
				'placeholder' => esc_html__( 'Type your description here', 'che-elementor' ),
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);

        $repeater->add_control(
			'col3_image',
			[
				'label' => esc_html__( 'Col Image', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'condition' => [
                    'show_mega_menu' => 'yes',
                ],
			]
		);
		
		$this->add_control(
			'menus_left',
			[
				'label' => __( 'Add Left Menus', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'default' => [
					[
						'show_mega_menu' => esc_html__( 'yes', 'che-elementor' ),
						'mega_menu_title' => esc_html__( 'LOCATIONS', 'che-elementor' ),
						'col1_title' => esc_html__( 'Our Locations', 'che-elementor' ),
						'col1_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col1_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
						'col2_title' => esc_html__( 'Amsterdam', 'che-elementor' ),
						'col2_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col2_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
						'col3_title' => esc_html__( 'Berlin', 'che-elementor' ),
						'col3_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col3_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
					[
						'show_mega_menu' => esc_html__( 'yes', 'che-elementor' ),
						'mega_menu_title' => esc_html__( 'PRODUCT & SERVICES', 'che-elementor' ),
						'col1_title' => esc_html__( 'Our Locations', 'che-elementor' ),
						'col1_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col1_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
						'col2_title' => esc_html__( 'Amsterdam', 'che-elementor' ),
						'col2_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col2_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
						'col3_title' => esc_html__( 'Berlin', 'che-elementor' ),
						'col3_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col3_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
					[
						'show_mega_menu' => esc_html__( 'no', 'che-elementor' ),
						'simple_menu_title' => esc_html__( 'COMMUNITY', 'che-elementor' ),
                    ],
					[
						'show_mega_menu' => esc_html__( 'no', 'che-elementor' ),
						'simple_menu_title' => esc_html__( 'ABOUT US', 'che-elementor' ),
                    ],
					[
						'show_mega_menu' => esc_html__( 'yes', 'che-elementor' ),
						'mega_menu_title' => esc_html__( 'EDGE', 'che-elementor' ),
						'col1_title' => esc_html__( 'Our Locations', 'che-elementor' ),
						'col1_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col1_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
						'col2_title' => esc_html__( 'Amsterdam', 'che-elementor' ),
						'col2_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col2_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
						'col3_title' => esc_html__( 'Berlin', 'che-elementor' ),
						'col3_description' => esc_html__( 'EDGE Workspaces offers a place to unleash your true
                        potential.', 'che-elementor' ),
                        'col3_image' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ]
                    ],
				],
				'title_field' => '{{{ show_mega_menu }}}',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'content_sectionTwo',
			[
				'label' => esc_html__( 'Menu Right', 'che-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new \Elementor\Repeater();


      $repeater->add_control(
			'right_menu_title', [
				'label' => __( 'Link Title', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

        $repeater->add_control(
			'right_menu_link',
			[
				'label' => esc_html__( 'Link Url', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		
        $this->add_control(
			'menus_right',
			[
				'label' => __( 'Add Right Menus', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'default' => [
					[
						'right_menu_title' => esc_html__( 'Careers', 'che-elementor' ),
                    ],
					[
						'right_menu_title' => esc_html__( 'Login', 'che-elementor' ),
                    ],
					[
						'right_menu_title' => esc_html__( 'Contact', 'che-elementor' ),
                    ],
				],
				'title_field' => '{{{ right_menu_title }}}',
			]
		);

        $this->add_control(
			'booktour_title', [
				'label' => __( 'Button Title', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Book a Tour',
				'label_block' => true,
			]
		);

        $this->add_control(
			'booktour_link',
			[
				'label' => esc_html__( 'Button Url', 'che-elementor' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_sectionGeneral',
			[
				'label' => esc_html__( 'Responsive Menus', 'che-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
              'primary_menu_title', [
                  'label' => __( 'Link Title', 'che-elementor' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'label_block' => true,
              ]
          );
  
          $repeater->add_control(
              'primary_menu_link',
              [
                  'label' => esc_html__( 'Link Url', 'che-elementor' ),
                  'type' => \Elementor\Controls_Manager::URL,
                  'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
                  'options' => [ 'url', 'is_external', 'nofollow' ],
                  'default' => [
                      'url' => '',
                      'is_external' => true,
                      'nofollow' => true,
                      // 'custom_attributes' => '',
                  ],
                  'label_block' => true,
              ]
          );
          
          $this->add_control(
              'menus_primary',
              [
                  'label' => __( 'Add Left Menus', 'che-elementor' ),
                  'type' => \Elementor\Controls_Manager::REPEATER,
                  'fields' => $repeater->get_controls(),
                  'default' => [
                      [
                          'primary_menu_title' => esc_html__( 'About', 'che-elementor' ),
                      ],
                      [
                          'primary_menu_title' => esc_html__( 'Careers', 'che-elementor' ),
                      ],
                      [
                          'primary_menu_title' => esc_html__( 'Download', 'che-elementor' ),
                      ],
                  ],
                  'title_field' => '{{{ primary_menu_title }}}',
              ]
          );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
              'sec_menu_title', [
                  'label' => __( 'Link Title', 'che-elementor' ),
                  'type' => \Elementor\Controls_Manager::TEXT,
                  'label_block' => true,
              ]
          );
  
          $repeater->add_control(
              'sec_menu_link',
              [
                  'label' => esc_html__( 'Link Url', 'che-elementor' ),
                  'type' => \Elementor\Controls_Manager::URL,
                  'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
                  'options' => [ 'url', 'is_external', 'nofollow' ],
                  'default' => [
                      'url' => '',
                      'is_external' => true,
                      'nofollow' => true,
                      // 'custom_attributes' => '',
                  ],
                  'label_block' => true,
              ]
          );
          
          $this->add_control(
              'menus_sec',
              [
                  'label' => __( 'Add Right Menus', 'che-elementor' ),
                  'type' => \Elementor\Controls_Manager::REPEATER,
                  'fields' => $repeater->get_controls(),
                  'default' => [
                      [
                          'sec_menu_title' => esc_html__( 'Contact', 'che-elementor' ),
                      ],
                      [
                          'sec_menu_title' => esc_html__( 'Desclaimer', 'che-elementor' ),
                      ]
                  ],
                  'title_field' => '{{{ sec_menu_title }}}',
              ]
          );

          $this->add_control(
            'twitter_link',
            [
                'label' => esc_html__( 'Twitter Url', 'che-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

          $this->add_control(
            'linkedin_link',
            [
                'label' => esc_html__( 'Linkedin Url', 'che-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

          $this->add_control(
            'instagram_link',
            [
                'label' => esc_html__( 'Instagram Url', 'che-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );

          $this->add_control(
            'vimeo_link',
            [
                'label' => esc_html__( 'Vimeo Url', 'che-elementor' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => esc_html__( 'https://your-link.com', 'che-elementor' ),
                'options' => [ 'url', 'is_external', 'nofollow' ],
                'default' => [
                    'url' => '',
                    'is_external' => true,
                    'nofollow' => true,
                    // 'custom_attributes' => '',
                ],
                'label_block' => true,
            ]
        );
		
		$this->end_controls_section();

		$this->start_controls_section(
			'questionaire_style_section',
			[
				'label' => __( 'Style', 'che-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'leftMenu_typography',
                'label' => __( 'Left Menu Typography', 'che-elementor' ),
				'selector' => '{{WRAPPER}} ul.main-nav > li > a',
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'rightMenu_typography',
                'label' => __( 'Right Menu Typography', 'che-elementor' ),
				'selector' => '{{WRAPPER}} .page-links li a',
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'megaMenuHeading_typography',
                'label' => __( 'MegaMenu Heading Typography', 'che-elementor' ),
				'selector' => '{{WRAPPER}} .sub-menu-head',
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'megaMenuContent_typography',
                'label' => __( 'MegaMenu Content Typography', 'che-elementor' ),
				'selector' => '{{WRAPPER}} .dropdown-content p',
			]
		);
		
        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'extraMenuContent_typography',
                'label' => __( 'Mobile Menu Typography', 'che-elementor' ),
				'selector' => '{{WRAPPER}} .resp-mode-links ul li a',
			]
		);

        $this->add_responsive_control(
			'btn_size',
			[
				'label' => esc_html__( 'Button Size', 'custom-location' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'large',
				'options' => [
					'large'  => esc_html__( 'Large', 'custom-location' ),
					'medium' => esc_html__( 'medium', 'custom-location' ),
					'small' => esc_html__( 'small', 'custom-location' ),
				]
			]
		);

        
		$this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Button Background Color', 'custom-location' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#f7b72e',
				'selectors' => [
					'{{WRAPPER}} .page-links .button' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .page-links .button ' => 'border-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_bg_color_hover',
			[
				'label' => esc_html__( 'Button Background Hover', 'custom-location' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .hvr-sweep-to-right:before' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Button Text Color', 'custom-location' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .page-links .button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'btn_color_hover',
			[
				'label' => esc_html__( 'Button Text Hover', 'custom-location' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .page-links .hvr-sweep-to-right:hover, .hvr-sweep-to-right:focus, .hvr-sweep-to-right:active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'label' => esc_html__( 'Button Typography', 'custom-location' ),
				'name' => 'custom_typography',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .page-links .button',
			]
		);
		
		
		$this->end_controls_section();

	}

	/**
	 * Render company widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
			// String of all alphanumeric character
			$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

      ?>
      <style>
        header.main-header {
            min-height: 100px;
        }

        header.main-header nav {
            padding: 75px 50px 0 270px;
            position: fixed !important;
            right: 0;
            left: 0px;
            z-index: 999;
            top: 0px;
        }

        header.main-header nav a:hover {
            color: inherit;
        }

        header.main-header nav a:hover div {
            color: white;
        }

        header.main-header nav .page-links li a {
            color: #929394;
        }

        @media (min-width: 1400px) {
            header.main-header nav {
                padding: 75px 50px 0 290px;
            }
        }

        ul.main-nav {
            list-style-type: none;
            /* font-size: 0px; */
            max-width: 100%;
            margin-bottom: 0px;
            padding-top: 10px;
        }

        .top-level-link.resp-mode {
            display: none;
        }

        ul.main-nav>li {
            display: inline-block;
            margin: 0 18px;
            /* min-width: 150px; */
        }

        .navbar-brand {
            position: fixed;
            top: 42px;
            cursor: pointer;
            left: 45px;
            z-index: 999999999999;
        }

        .brand-logo {
            max-width: 220px;
        }

        .navbar-brand svg {
            transition: transform 0.8s;
            /* Animation */
        }

        .navbar-brand svg path {
            fill: black;
        }

        .inverse .navbar-brand svg path {
            fill: white !important;
        }

        /* .navbar-brand img:hover {
          transform: scale(1.2);
        } */
        .page-menu-items {
            list-style: none;
            display: inline-flex;
        }

        .page-menu-items li {
            display: inline-block;
            margin-right: 16px;
        }

        .page-links {
            display: inline-block;
        }

        .lang-options a,
        .page-links li {
            opacity: 0.6;
            font-size: 16px;
        }

        .lang-options a,
        .page-links li a,
        ul.main-nav>li>a {
            color: black;
        }

        ul.main-nav>li>a {
            font-size: 17px;
            text-transform: uppercase;
        }

        .inverse ul.main-nav>li>a {
            color: #ffffff !important;
        }

        .inverse .navbar-brand svg g {
            fill: #fff !important;
        }

        .inverse .page-links li a {
            color: #fff;
        }

        .hover-underline-animation {
            display: inline-block;
            position: relative;
            cursor: pointer;
            /* font-size: 18px; */
            text-decoration: none;
            font-family: "Raleway", sans-serif;
        }

        .lang-options {
            font-family: "Raleway", sans-serif;
            width: 90px;
            justify-content: space-evenly;
            display: flex;
        }

        ul.main-nav>li>a:after,
        .hover-underline-animation:after {
            content: "";
            position: absolute;
            width: 100%;
            transform: scaleX(0);
            height: 1px;
            bottom: 0;
            left: 0;
            background-color: #000;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
        }

        ul.main-nav>li>a:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        .hover-underline-animation:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
        }

        ul.main-nav>li ul.sub-menu-lists {
            margin: 0px;
            padding: 0px;
            list-style-type: none;
            display: block;
        }

        ul.main-nav>li ul.sub-menu-lists>li {
            padding: 2px 0;
        }

        ul.main-nav>li ul.sub-menu-lists>li>a {
            font-size: 14px;
        }

        .ic {
            position: fixed;
            cursor: pointer;
            display: inline-block;
            right: 25px;
            width: 32px;
            height: 24px;
            text-align: center;
            top: 0px;
            outline: none;
        }

        .ic.close {
            opacity: 0;
            font-size: 0px;
            font-weight: 300;
            color: #fff;
            top: 8px;
            height: 40px;
            display: block;
            outline: none;
            margin-top: 30px;
        }

        /* Menu Icons for Devices*/
        .ic.menu {
            top: 65px;
            z-index: 20;
        }

        .ic.menu .line {
            height: 4px;
            width: 100%;
            display: block;
            margin-bottom: 6px;
        }

        .ic.menu .line-last-child {
            margin-bottom: 0px;
        }

        .sub-menu-head {
            margin: 10px 0;
            font-size: 36px;
            letter-spacing: -0.01em;
            line-height: 1;
            font-weight: bold;
        }

        .dropdown-area a {
            text-decoration: none;
            color: #fff;
        }

        .dropdown-area .dropdown-img {
            margin-top: 45px;
        }

        .dropdown-content p {
            font-size: 18px;
            font-family: "Raleway", sans-serif;
            width: 85%;
            margin-top: 20px;
            padding-top: 20px;
            overflow: hidden;
            line-height: 1.555555555555556;
        }

        .banners-area {
            margin-top: 20px;
            padding-top: 15px;
        }

        .banners-area img {
            width: 150px;
        }

        .sub-menu-head {
            margin: 10px 0;
            font-size: 36px;
            letter-spacing: -0.01em;
            line-height: 1;
            font-weight: bold;
            position: relative;
            display: inline-block;
        }

        .sub-menu-head:before {
            content: "";
            position: absolute;
            width: 30px;
            /* transform: scaleX(0); */
            height: 3px;
            bottom: -15px;
            left: 0;
            background-color: #ffffff;
            /* transform-origin: bottom right; */
            transition: transform 0.25s ease-out;
        }

        .sub-menu-head:after {
            content: "";
            position: absolute;
            width: 0;
            transform: scaleX(0);
            height: 3px;
            bottom: -15px;
            left: 0;
            background-color: #ffffff;
            transform-origin: bottom right;
            transition: transform 0.25s ease-out;
            /* top: 5px; */
        }

        .dropdown-area a:hover .sub-menu-head:after {
            transform: scaleX(1);
            transform-origin: bottom left;
            width: 100px;
        }

        .sub-menu-head:hover:after {
            transform: scaleX(1);
            transform-origin: bottom left;
            width: 100px;
        }


        header.light ul.main-nav>li>a {
            border-right: 1px solid #666;
        }

        header.main-header ul.main-nav>li>a.mega-menu:after {
            background-color: white;
        }

        header.main-header ul.main-nav>li>a:after {
            background-color: black;
        }

        header.light ul.main-nav>li>a:after {
            background-color: #999;
        }

        /* Drop Down/Up Arrow for Mega Menu */
        ul.main-nav>li>a.mega-menu>span {
            display: inline-block;
            vertical-align: middle;
            position: relative;
        }

        .banners-area {
            border-top: 1px solid #ccc;
        }



        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translate3d(0, 30%, 0);
            }

            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        .resp-mode-links,
        .header-social-links,
        .resp-mode-lang,
        .resp-mode-site-link,
        .resp-mode {
            display: none;
        }

        ul.main-nav {
            justify-content: space-between;
        }

        .nav-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .open .sub-menu-block {
            display: none !important;
        }

        @media (max-width: 1281px) {
            ul.main-nav {
                justify-content: right;
                flex-wrap: wrap;
            }
        }

        @media only screen and (min-width: 769px) {
            .ic.menu {
                display: none;
            }

            /* Main Menu for Desktop Devices  */
            ul.main-nav {
                /* display: flex; */
                align-items: center;
                /* justify-content: space-between; */
                padding-left: 0px;
            }

            .sub-menu-block {
                padding: 15px;
            }

            /* Sub Menu */
            ul.main-nav>li>div.sub-menu-block {
                background-color: #292a2c;
                visibility: visible;
                opacity: 1;
                padding: 200px 162px 100px;
                position: absolute;
                top: 0;
                left: 0;
                z-index: -1;
                transition: all 0.8s ease;
                width: 100%;
                top: -700%;
            }

            .inverse #main_navigation .menuActive .sub-menu-block {
                top: 0;
                transition: all 0.8s ease;
            }

            ul.main-nav>li>div.sub-menu-block>* {
                -webkit-transition-property: opacity;
                -moz-transition-property: opacity;
                -o-transition-property: opacity;
                transition-property: opacity;
                -webkit-transition-duration: 2s;
                -moz-transition-duration: 2s;
                -o-transition-duration: 2s;
                transition-duration: 2s;
                transition: all ease-in-out 2s;
                transform-origin: bottom;
                opacity: 0;
                transform: translateY(30px);
                transition: all ease-in-out 1s;
                transform-origin: bottom;
                height: 0;
            }

            .inverse #main_navigation .menuActive .sub-menu-block>* {
                opacity: 1;
                height: 100%;
                transform: translateY(0);
            }
        }

        @media only screen and (max-width: 768px) {
            .ic.menu {
                display: block;
            }

            header.main-header .ic.menu .line {
                background-color: #000;
            }

            header.light .ic.menu .line {
                background-color: #000;
            }

            .ic.menu .line {
                -webkit-transition: all 0.4s ease 0s;
                -o-transition: all 0.4s ease 0s;
                transition: all 0.4s ease 0s;
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                transform: rotate(0deg);
                -webkit-transform-origin: center center;
                -ms-transform-origin: center center;
                transform-origin: center center;
            }

            .inverse .ic.menu .line {
                background-color: #fff !important;
            }

            .inverse .ic.menu .line:nth-child(1) {
                -webkit-transform: rotate(45deg);
                -moz-transform: rotate(45deg);
                -ms-transform: rotate(45deg);
                transform: rotate(45deg);
            }

            .inverse .ic.menu .line:nth-child(2) {
                -webkit-transform: rotate(-45deg);
                -moz-transform: rotate(-45deg);
                -ms-transform: rotate(-45deg);
                transform: rotate(-45deg);
                margin-top: -10px;
            }

            .inverse .ic.menu .line:nth-child(3) {
                transform: translateY(15px);
                opacity: 0;
            }

            .inverse .ic.menu {
                outline: none;
            }

            .inverse .ic.menu~.ic.close {
                opacity: 1;
                z-index: 21;
                outline: none;
            }

            .open-mob-menu .nav-wrapper {
                left: 0px;
                opacity: 1;
                width: 100%;
            }

            nav {
                background-color: transparent;
            }

            /* Main Menu for Handheld Devices  */
            .nav-wrapper {
                z-index: 2;
                padding: 170px 0 0 0;
                position: fixed;
                left: 0%;
                top: 0px;
                width: 0%;
                background-color: rgb(0, 0, 0);
                height: 100%;
                overflow: auto;
                /*CSS animation applied : Slide from Right*/
                -webkit-transition-property: background, width;
                -moz-transition-property: background, width;
                -o-transition-property: background, width;
                transition-property: background, width;
                -webkit-transition-duration: 0.6s;
                -moz-transition-duration: 0.6s;
                -o-transition-duration: 0.6s;
                transition-duration: 0.6s;
            }

            .inverse .ic.menu~.nav-wrapper {
                width: 100%;
                background-color: #262829;
            }

            .nav-wrapper>* {
                -webkit-transition-property: opacity;
                -moz-transition-property: opacity;
                -o-transition-property: opacity;
                transition-property: opacity;
                -webkit-transition-duration: 0.4s;
                -moz-transition-duration: 0.4s;
                -o-transition-duration: 0.4s;
                transition-duration: 0.4s;
                opacity: 0;
            }

            .inverse .ic.menu~.nav-wrapper>* {
                opacity: 1;
            }

            ul.main-nav>li>a:after {
                display: none;
            }

            ul.main-nav>li:first-child {
                border-radius: 0px;
            }

            ul.main-nav>li {
                display: block;
                margin-bottom: 15px;
                padding-left: 5px;
            }

            ul.main-nav>li>a {
                font-weight: 600;
                font-size: 24px;
                text-transform: capitalize;
            }

            ul.main-nav>li ul.sub-menu-lists>li a {
                color: #eee;
                font-size: 14px;
            }

            .sub-menu-head {
                font-size: 16px;
            }

            ul.main-nav>li:hover {
                background-color: transparent;
            }

            ul.main-nav>li:hover>a {
                color: #fff;
                text-decoration: none;
                font-weight: 600;
            }

            .inverse .ic.menu~ul.main-nav>li>div.sub-menu-block {
                border-left: 0px solid #ccc;
                border-right: 0px solid #ccc;
                border-bottom: 0px solid #ccc;
                position: relative;
                visibility: visible;
                opacity: 0;
            }

            .top-level-link.open .sub-menu-block {
                opacity: 1 !important;
            }

            .top-level-link .nav__arrow {
                transform: translateY(-50%) rotate(0deg);
            }

            .top-level-link.open .nav__arrow {
                transform: translateY(-50%) rotate(-180deg);
            }

            .banners-area {
                padding-bottom: 0px;
            }

            .banners-area div {
                margin-bottom: 15px;
            }

            .banners-area {
                border-top: 1px solid #444;
            }

            .sub-menu-block {
                padding: 0px;
            }

            .sub-menu-block img,
            .sub-menu-block p {
                display: none;
                margin: 0;
            }

            .dropdown-area .dropdown-img {
                margin: 0px;
            }

            .navbar-brand {
                width: 18%;
            }

            .lang-options a,
            .page-links li a,
            ul.main-nav>li>a {
                color: #fff;
            }

            /* .page-menu-items,
            .page-links {
              display: none;
            } */
            .resp-mode-links,
            .header-social-links {
                display: block;
            }

            .page-menu-items {
                display: none;
            }

            .resp-mode-links ul li a {
                color: #fff;
                text-decoration: none;
                font-size: 14px;
                font-weight: bold;
                font-family: "Raleway", sans-serif;
            }

            .resp-mode-links {
                display: flex;
                padding-left: 60px;
            }

            .resp-mode-links ul {
                padding-left: 0px;
            }

            .resp-mode-links ul li {
                margin-bottom: 15px;
            }

            .secondary-links {
                padding-left: 40px;
            }

            .navbar-brand {
                top: 30px;
            }

            .header-social-links {
                padding-left: 60px;
                display: flex;
                align-items: baseline;
                margin-top: 23px;
            }

            .header-social-links span {
                color: #fff;
            }

            .header-social-links svg {
                margin-right: 10px;
            }

            .header-social-links .social-links {
                padding-left: 20px;
                display: inline-flex;
                list-style: none;
            }

            .header-social-links span {
                font-family: "Raleway", sans-serif;

                text-transform: uppercase;
                letter-spacing: 0.2em;
                font-size: 12px;
                font-weight: bold;
            }

            .resp-mode-lang {
                display: block;
                margin-top: 23px;
            }

            .resp-mode-lang p {
                padding-left: 60px;
                color: #fff;
                font-family: "Raleway", sans-serif;
                padding-bottom: 15px;
                font-size: 14px;
            }

            .resp-mode-lang span {
                font-weight: bold;
            }

            .resp-mode-site-link {
                display: block;
            }

            .resp-mode-site-link p {
                color: #fff;
                /* position: absolute;
              bottom: 40px;
              left: 0;
              right: 0; */
                text-align: left;
                padding: 0 20px 0 60px;
                font-family: "Raleway", sans-serif;
                font-size: 12px;
            }

            .resp-mode-site-link p a {
                text-decoration: none;
                color: #fff;
            }

            .resp-mode {
                display: block;
            }

            .mega-menu path {
                fill: #fff !important;
            }

            .nav-wrapper {
                display: block;
            }

            .sub-menu-head:before {
                width: 0px;
            }
        }

        @media only screen and (max-width: 480px) {
            .navbar-brand {
                width: 18%;
            }

            .lang-options a,
            .page-links li a,
            ul.main-nav>li>a {
                color: #fff;
            }
        }

        .page-links {
            display: flex !important;
            align-items: end;
            flex-direction: column;
        }

        .page-links .button {
            background: #f7b72e;
            border: none;
            color: black;
            text-decoration: none;
            font-size: 18px;
            font-weight: 400;
            border-radius: 50px 50px 50px 50px;
            margin-right: 16px;

        }

        .page-links .button.large {
            padding: 19px 62px;
        }

        .page-links .button.medium {
            padding: 14px 50px;
        }

        .page-links .button.small {
            padding: 8px 30px;
        }

        /* Sweep To Right */
        .hvr-sweep-to-right {

            display: inline-block;
            vertical-align: middle;
            -webkit-transform: perspective(1px) translateZ(0);
            transform: perspective(1px) translateZ(0);
            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
            position: relative;
            -webkit-transition-property: color;
            transition-property: color;
            -webkit-transition-duration: 0.2s;
            transition-duration: 0.2s;
            border-radius: 50%;
            overflow: hidden;
        }

        .hvr-sweep-to-right:before {
            content: "";
            position: absolute;
            z-index: -1;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: #2098D1;
            -webkit-transform: scaleX(0);
            transform: scaleX(0);
            -webkit-transform-origin: 0 50%;
            transform-origin: 0 50%;
            -webkit-transition-property: transform;
            transition-property: transform;
            -webkit-transition-duration: 0.2s;
            transition-duration: 0.2s;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
            border-radius: 50px;
        }

        .hvr-sweep-to-right:hover,
        .hvr-sweep-to-right:focus,
        .hvr-sweep-to-right:active {
            color: white;
        }

        .hvr-sweep-to-right:hover:before,
        .hvr-sweep-to-right:focus:before,
        .hvr-sweep-to-right:active:before {
            -webkit-transform: scaleX(1);
            transform: scaleX(1);
        }

        .nav__arrow {
            width: 11px;
            display: inline-block;
            left: 2px;
            top: 3px;
            position: relative;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            transition: -webkit-transform 0.4s ease;
            transition: transform 0.4s ease;
            transition: transform 0.4s ease, -webkit-transform 0.4s ease;
            -webkit-transform-origin: 50%;
            -ms-transform-origin: 50%;
            transform-origin: 50%;
        }

        .mega-menu:hover .nav__arrow {
            transform: translateY(-50%) rotate(-180deg);
        }

        /* .inverse .nav__arrow {
          transform: translateY(-50%) rotate(-180deg);
        } */
        .inverse .nav__arrow path {
            fill: #fff !important;
        }
		  
		  .main-header .dropdown-area{
				height: 100%;
			}

			.main-header .dropdown-area a{
				    height: 100%;
					display: flex;
					flex-direction: column;
					justify-content: space-between;
			}

        @media (max-width: 568px) {
            .navbar-brand {
                left: 20px;
            }

            ul.main-nav {
                padding-left: 0;
            }

            .page-links {
                margin-bottom: 15px;
                margin-left: 20px;
                align-items: start;
            }

            .header-social-links{
                margin-left: 20px;
                padding-left: 0;   
            }

            .resp-mode-links {
                margin-left: 20px;
                padding-left: 0;
            }

            .page-links .button.medium {
                padding: 8px 30px;
            }
			
			.main-header ul.main-nav > li > a{
				text-transform: capitalize !important;
			}
			

        }
      </style>
      <header class="main-header">
          <a class="navbar-brand" href="/">
              <svg class="brand-logo" xmlns="http://www.w3.org/2000/svg" width="338.016" height="87.112"
                  viewBox="0 0 338.016 87.112" style="&#10;    fill: black;&#10;">
                  <g id="Logo_-_EDGE_Workspaces" data-name="Logo - EDGE Workspaces" transform="translate(341 -12)">
                      <g id="Group_54" data-name="Group 54" transform="translate(-341 12)">
                          <g id="Ring">
                              <path id="Path_95" data-name="Path 95"
                                  d="M61.2,0c23.2.521,42.757,20.687,42.757,44.012,0,23.652-20.085,41.915-43.737,41.915-.164,0-.327,0-.49,0s-.327,0-.49-.008c-20.5-.519-36.053-16.392-36.053-37.021,0-20.671,15.618-36.283,36.18-36.735-17.865.454-31.3,13.88-31.3,31.853,0,18.259,13.891,32.151,32.151,32.151.142,0,.284,0,.427,0s.284,0,.426-.007c20.562-.452,38-16.351,38-37.022C99.075,18.5,81.7.519,61.2,0"
                                  transform="translate(-16.533)" fill="#fff" />
                              <path id="Path_96" data-name="Path 96"
                                  d="M43.806,4.144A37.945,37.945,0,0,1,80.77,42.076c0,20.671-16.529,35.372-37.091,35.825,17.865-.454,32.208-12.969,32.208-30.942A33.062,33.062,0,0,0,42.826,13.9c-.142,0-.284,0-.426,0s-.284,0-.426.007a38.091,38.091,0,0,0-.127,76.152,42.971,42.971,0,0,1,.98-85.927c.165,0,.327,0,.49,0s.327.005.49.009"
                                  transform="translate(0 -2.946)" fill="#fff" />
                          </g>
                          <g id="Text" transform="translate(115.236 14.953)">
                              <path id="Path_97" data-name="Path 97"
                                  d="M397.129,139.6h2.065l7.834,22.185,7.3-22.257h1.425l7.3,22.257,7.834-22.185h1.923L423.766,164.7h-1.5l-7.3-21.651-7.3,21.651h-1.5Z"
                                  transform="translate(-397.129 -112.678)" fill="#fff" />
                              <path id="Path_98" data-name="Path 98"
                                  d="M591.159,182.527v-.071a9.384,9.384,0,0,1,9.365-9.508,9.286,9.286,0,0,1,9.294,9.437v.071a9.384,9.384,0,0,1-9.366,9.508,9.286,9.286,0,0,1-9.294-9.437m16.772,0v-.071a7.614,7.614,0,0,0-7.478-7.87,7.493,7.493,0,0,0-7.407,7.8v.071a7.615,7.615,0,0,0,7.478,7.87,7.493,7.493,0,0,0,7.407-7.8"
                                  transform="translate(-552.049 -139.688)" fill="#fff" />
                              <path id="Path_99" data-name="Path 99"
                                  d="M716.486,173.949h1.745v5.164a8.587,8.587,0,0,1,8.048-5.448v1.923H726.1c-4.2,0-7.87,3.169-7.87,9.081v7.443h-1.745Z"
                                  transform="translate(-652.25 -140.262)" fill="#fff" />
                              <path id="Path_100" data-name="Path 100"
                                  d="M790.754,134.329H792.5v19.479l11.253-11.645h2.315l-7.941,8.048,8.191,10.114h-2.208l-7.194-8.867-4.416,4.451v4.416h-1.745Z"
                                  transform="translate(-711.471 -108.477)" fill="#fff" />
                              <path id="Path_101" data-name="Path 101"
                                  d="M886.562,189.557l1.033-1.389a10.655,10.655,0,0,0,6.517,2.386c2.457,0,4.38-1.353,4.38-3.454v-.071c0-2.137-2.279-2.92-4.808-3.632-2.956-.855-6.232-1.745-6.232-4.985v-.071c0-2.92,2.457-5.021,5.983-5.021a12.263,12.263,0,0,1,6.445,1.994l-.926,1.46a10.432,10.432,0,0,0-5.591-1.816c-2.493,0-4.131,1.353-4.131,3.17v.071c0,2.03,2.457,2.778,5.057,3.525,2.92.819,5.983,1.888,5.983,5.092v.071c0,3.24-2.778,5.306-6.267,5.306a12.437,12.437,0,0,1-7.443-2.635"
                                  transform="translate(-788.026 -139.987)" fill="#fff" />
                              <path id="Path_102" data-name="Path 102"
                                  d="M987.009,173.375h1.745v4.06c1.567-2.386,3.882-4.487,7.478-4.487a9.019,9.019,0,0,1,8.831,9.437v.071c0,5.911-4.451,9.508-8.831,9.508a8.735,8.735,0,0,1-7.478-4.345v9.615h-1.745Zm16.167,9.152v-.071c0-4.772-3.312-7.834-7.122-7.834a7.606,7.606,0,0,0-7.407,7.8v.071a7.583,7.583,0,0,0,7.407,7.8c3.953,0,7.122-2.884,7.122-7.763"
                                  transform="translate(-868.125 -139.688)" fill="#fff" />
                              <path id="Path_103" data-name="Path 103"
                                  d="M1103.423,182.527v-.071c0-5.911,4.451-9.508,8.832-9.508a8.736,8.736,0,0,1,7.478,4.344v-3.917h1.745v18.161h-1.745v-4.06c-1.567,2.386-3.882,4.487-7.478,4.487a9.019,9.019,0,0,1-8.832-9.437m16.417-.036v-.071a7.583,7.583,0,0,0-7.407-7.8c-3.953,0-7.122,2.885-7.122,7.763v.071c0,4.772,3.312,7.834,7.122,7.834a7.606,7.606,0,0,0,7.407-7.8"
                                  transform="translate(-961.077 -139.688)" fill="#fff" />
                              <path id="Path_104" data-name="Path 104"
                                  d="M1225.593,182.527v-.071a9.432,9.432,0,0,1,9.259-9.508,9.533,9.533,0,0,1,7.265,3.347l-1.246,1.282c-1.567-1.6-3.348-2.991-6.054-2.991a7.5,7.5,0,0,0-7.336,7.8v.071a7.637,7.637,0,0,0,7.478,7.87,8.115,8.115,0,0,0,6.089-3.027l1.211,1.069a9.314,9.314,0,0,1-16.666-5.84"
                                  transform="translate(-1058.682 -139.688)" fill="#fff" />
                              <path id="Path_105" data-name="Path 105"
                                  d="M1328.826,182.492v-.071c0-5.27,3.7-9.472,8.618-9.472,5.092,0,8.333,4.131,8.333,9.508a4.536,4.536,0,0,1-.036.712h-15.063c.321,4.523,3.561,7.158,7.122,7.158a8.157,8.157,0,0,0,6.232-2.849l1.211,1.068a9.547,9.547,0,0,1-7.514,3.419c-4.772,0-8.9-3.811-8.9-9.472m15.064-.89c-.25-3.668-2.351-7.051-6.517-7.051-3.6,0-6.374,3.027-6.695,7.051Z"
                                  transform="translate(-1140.233 -139.688)" fill="#fff" />
                              <path id="Path_106" data-name="Path 106"
                                  d="M1435.588,189.557l1.032-1.389a10.655,10.655,0,0,0,6.517,2.386c2.457,0,4.38-1.353,4.38-3.454v-.071c0-2.137-2.279-2.92-4.807-3.632-2.956-.855-6.232-1.745-6.232-4.985v-.071c0-2.92,2.457-5.021,5.982-5.021a12.262,12.262,0,0,1,6.446,1.994l-.926,1.46a10.432,10.432,0,0,0-5.591-1.816c-2.492,0-4.131,1.353-4.131,3.17v.071c0,2.03,2.457,2.778,5.057,3.525,2.92.819,5.983,1.888,5.983,5.092v.071c0,3.24-2.778,5.306-6.267,5.306a12.437,12.437,0,0,1-7.443-2.635"
                                  transform="translate(-1226.519 -139.987)" fill="#fff" />
                              <path id="Path_107" data-name="Path 107"
                                  d="M397.129,37.632l0-16.42h11.743v1.347H398.523V28.7h9.4v1.347h-9.4v6.233h10.462v1.347Z"
                                  transform="translate(-397.129 -21.212)" fill="#fff" />
                              <path id="Path_108" data-name="Path 108"
                                  d="M494.638,37.643V36.3H500.1c4.221,0,7.285-2.867,7.285-6.818v-.044c0-3.976-3.081-6.863-7.328-6.863h-4.025v7.492h-1.392V21.223h5.439c5.04,0,8.7,3.445,8.7,8.189v.044c0,4.744-3.659,8.187-8.7,8.187Z"
                                  transform="translate(-475.936 -21.221)" fill="#fff" />
                              <path id="Path_109" data-name="Path 109"
                                  d="M707.126,37.667l0-16.42h11.743V22.6H708.519v6.145h9.4v1.347h-9.4V36.32H718.98v1.347Z"
                                  transform="translate(-644.742 -21.241)" fill="#fff" />
                              <path id="Path_110" data-name="Path 110"
                                  d="M604.058,37.66c-5.04,0-8.7-3.444-8.7-8.189v-.044c0-4.744,3.659-8.187,8.7-8.187H609.5v1.347h-5.461c-4.221,0-7.284,2.867-7.285,6.818v.044c0,3.976,3.081,6.863,7.328,6.863h4.025V28.821H609.5V37.66Z"
                                  transform="translate(-555.448 -21.235)" fill="#fff" />
                          </g>
                      </g>
                  </g>
              </svg>
          </a>
          <nav id="main_navigation" role="navigation" class="navbar-nav">

              <a href="javascript:void(0);" class="ic menu" tabindex="1">
                  <span class="line"></span>
                  <span class="line"></span>
                  <span class="line"></span>
              </a>
              <a href="javascript:void(0);" class="ic close"></a>
              <div class="nav-wrapper">
                  <ul class="main-nav">

                      <li class="top-level-link resp-mode">
                          <a class="hover-underline-animation"><span>Home</span></a>
                      </li>

                      <?php
                        if ( $settings['menus_left'] ) {
                            foreach( $settings['menus_left'] as $item){
                                if($item['show_mega_menu'] === 'yes'){
                                    ?>
                                    <li class="top-level-link ">
                                        <a href="<?php echo $item['mega_menu_link']['url']; ?>" class="mega-menu hover-underline-animation"><span><?php echo $item['mega_menu_title']; ?></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14.7 9.1" class="nav__arrow">
                                                <path d="M0 7.4l1.7 1.7 5.6-5.6L13 9.1l1.7-1.7L7.4 0 0 7.4z" style="fill: rgb(41, 42, 44);">
                                                </path>
                                            </svg>
                                        </a>
                                        <div class="sub-menu-block">
                                            <div class="row">
                                                <div class="col-md-10 ms-auto">
                                                    <div class="row">
                                                        <?php
                                                                            if($item['col1_title'] !== ''){
                                                                                ?>
                                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                                            <div class="dropdown-area ">
                                                                <a href="<?php echo $item['col1_link']['url']; ?>">
                                                                    <div class="dropdown-content">
                                                                        <h2 class="sub-menu-head"><?php echo $item['col1_title']; ?></h2>
                                                                        <div>
                                                                            <p><?php echo $item['col1_description']; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-img">
                                                                        <img decoding="async"
                                                                            src="<?php echo $item['col1_image']['url']; ?>" alt="">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                                            }
                                                                            if($item['col2_title'] !== ''){
                                                                                ?>
                                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                                            <div class="dropdown-area ">
                                                                <a href="<?php echo $item['col2_link']['url']; ?>">
                                                                    <div class="dropdown-content">
                                                                        <h2 class="sub-menu-head"><?php echo $item['col2_title']; ?></h2>
                                                                        <div>
                                                                            <p><?php echo $item['col2_description']; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-img">
                                                                        <img decoding="async"
                                                                            src="<?php echo $item['col2_image']['url']; ?>" alt="">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                                            }
                                                                            if($item['col3_title'] !== ''){
                                                                                ?>
                                                        <div class="col-md-4 col-lg-4 col-sm-4">
                                                            <div class="dropdown-area ">
                                                                <a href="<?php echo $item['col3_link']['url']; ?>">
                                                                    <div class="dropdown-content">
                                                                        <h2 class="sub-menu-head"><?php echo $item['col3_title']; ?></h2>
                                                                        <div>
                                                                            <p><?php echo $item['col3_description']; ?>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="dropdown-img">
                                                                        <img decoding="async"
                                                                            src="<?php echo $item['col3_image']['url']; ?>" alt="">
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <?php
                                                                            }
                                                                            ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }else{
                                    ?>
                                    <li class="top-level-link">
                                        <a href="<?php echo $item['simple_menu_link']['url']; ?>"
                                            class="hover-underline-animation"><span><?php echo $item['simple_menu_title']; ?><span></a>
                                    </li>
                      <?php
                                      }
                                  }
                              }
                              ?>
                  </ul>
                  <div class="page-links">
                      <ul class="page-menu-items">
                          <?php
                                  if ( $settings['menus_right'] ) {
                                      foreach( $settings['menus_right'] as $item){
                                          ?>
                          <li><a href="<?php echo $item['right_menu_link']['url']; ?>"
                                  class="hover-underline-animation"><?php echo $item['right_menu_title']; ?></a></li>
                          <?php
                                      }
                                  }
                                  ?>
                      </ul>
                      <a class="button hvr-sweep-to-right large <?php echo $settings['btn_size']; ?>"
                          href="<?php echo $settings['booktour_link']['url']; ?>"><?php echo $settings['booktour_title']; ?></a>
                  </div>
                  <div class="resp-mode-links">
                      <div class="primary-links">
                          <ul>
                              <?php
                                  if ( $settings['menus_primary'] ) {
                                      foreach( $settings['menus_primary'] as $item){
                                          ?>
                              <li><a
                                      href="<?php echo $item['primary_menu_link']['url']; ?>"><?php echo $item['primary_menu_title']; ?></a>
                              </li>
                              <?php
                                      }
                                  }
                                  ?>

                          </ul>
                      </div>
                      <div class="secondary-links">
                          <ul>
                              <?php
                                      if ( $settings['menus_sec'] ) {
                                          foreach( $settings['menus_sec'] as $item){
                                              ?>
                              <li><a
                                      href="<?php echo $item['sec_menu_link']['url']; ?>"><?php echo $item['sec_menu_title']; ?></a>
                              </li>
                              <?php
                                          }
                                      }
                                      ?>

                          </ul>
                      </div>
                  </div>
                  <div class="header-social-links">
                      <span>FOLLOW US:</span>
                      <ul class="social-links">
                          <?php 
                                  if($settings['twitter_link']['url'] !== ''){
                                      ?>
                          <li><a href="<?php echo $settings['twitter_link']['url']; ?>">
                                  <svg fill="#ffffff" width="20" height="20" viewBox="0 0 64 64"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path
                                          d="M20.3 57.3996C43.9 57.3996 56.7 37.8996 56.7 20.9996C56.7 20.5996 56.7 19.8996 56.6 19.2996C59.1 17.4996 61.3 15.1996 63 12.6996C60.6 13.7996 58.2 14.3996 55.7 14.6996C58.4 13.0996 60.4 10.5996 61.3 7.59961C58.8 8.99961 56.2 10.0996 53.1 10.6996C50.7 8.19961 47.5 6.59961 43.8 6.59961C36.7 6.59961 30.9 12.3996 30.9 19.4996C30.9 20.4996 31 21.4996 31.2 22.4996C20.9 21.7996 11.5 16.6996 5.1 8.99961C4 10.9996 3.4 13.0996 3.4 15.3996C3.4 19.8996 5.7 23.6996 9.2 25.9996C7.1 25.8996 5.1 25.2996 3.4 24.3996C3.4 24.4996 3.4 24.4996 3.4 24.4996C3.4 30.5996 7.8 35.8996 13.6 37.0996C12.5 37.3996 11.3 37.4996 10.4 37.4996C9.6 37.4996 8.7 37.3996 8 37.1996C9.7 42.2996 14.4 45.9996 20 46.0996C15.6 49.4996 10.1 51.5996 4.2 51.5996C3 51.7996 2 51.5996 1 51.4996C6.4 55.2996 13.1 57.3996 20.3 57.3996Z" />
                                  </svg>
                              </a></li>

                          <?php
                                  }
                                  if($settings['linkedin_link']['url'] !== ''){
                                      ?>
                          <li><a href="<?php echo $settings['linkedin_link']['url']; ?>">
                                  <svg fill="#ffffff" width="20" height="20" viewBox="0 0 64 64"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path
                                          d="M58.5016 1H5.60156C3.10156 1 1.10156 3 1.10156 5.5V58.5C1.10156 60.9 3.10156 63 5.60156 63H58.3016C60.8016 63 62.8016 61 62.8016 58.5V5.4C63.0016 3 61.0016 1 58.5016 1ZM19.4016 53.7H10.3016V24.2H19.4016V53.7ZM14.8016 20.1C11.8016 20.1 9.50156 17.7 9.50156 14.8C9.50156 11.9 11.9016 9.5 14.8016 9.5C17.7016 9.5 20.1016 11.9 20.1016 14.8C20.1016 17.7 17.9016 20.1 14.8016 20.1ZM53.9016 53.7H44.8016V39.4C44.8016 36 44.7016 31.5 40.0016 31.5C35.2016 31.5 34.5016 35.3 34.5016 39.1V53.7H25.4016V24.2H34.3016V28.3H34.4016C35.7016 25.9 38.6016 23.5 43.1016 23.5C52.4016 23.5 54.1016 29.5 54.1016 37.7V53.7H53.9016Z" />
                                  </svg>

                              </a></li>

                          <?php
                                  }
                                  if($settings['instagram_link']['url'] !== ''){
                                      ?>
                          <li><a href="<?php echo $settings['instagram_link']['url']; ?>">
                                  <svg fill="#ffffff" width="20" height="20" viewBox="0 0 64 64"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path
                                          d="M62.9 19.2C62.8 16 62.2 13.7 61.5 11.6C60.8 9.5 59.7 7.8 58 6.1C56.3 4.4 54.6 3.4 52.6 2.6C50.6 1.8 48.4 1.3 45 1.2C41.5 1 40.5 1 32 1C23.5 1 22.6 1 19.2 1.1C15.8 1.2 13.7 1.8 11.6 2.5C9.5 3.2 7.8 4.4 6.1 6.1C4.4 7.8 3.3 9.5 2.6 11.6C1.8 13.6 1.3 15.8 1.2 19.2C1.1 22.6 1 23.5 1 32C1 40.5 1 41.4 1.1 44.8C1.2 48.2 1.8 50.3 2.5 52.4C3.2 54.5 4.3 56.2 6 57.9C7.7 59.6 9.5 60.7 11.5 61.4C13.5 62.1 15.7 62.7 19.1 62.8C22.5 63 23.4 63 31.9 63C40.4 63 41.3 63 44.7 62.9C48.1 62.8 50.2 62.2 52.3 61.5C54.4 60.8 56.1 59.7 57.8 58C59.5 56.3 60.6 54.5 61.3 52.5C62 50.5 62.6 48.3 62.7 44.9C62.8 41.7 62.8 40.7 62.8 32.2C62.8 23.7 63 22.6 62.9 19.2ZM57.3 44.5C57.2 47.5 56.6 49.1 56.2 50.3C55.6 51.7 54.9 52.8 53.8 53.8C52.7 54.9 51.7 55.5 50.3 56.2C49.2 56.6 47.6 57.2 44.5 57.3C41.3 57.3 40.3 57.3 32.1 57.3C23.9 57.3 22.8 57.3 19.6 57.2C16.6 57.1 15 56.5 13.8 56.1C12.4 55.5 11.3 54.8 10.3 53.7C9.2 52.6 8.6 51.6 7.9 50.2C7.5 49.1 6.9 47.5 6.8 44.4C6.8 41.3 6.8 40.3 6.8 32C6.8 23.7 6.8 22.7 6.9 19.5C7 16.5 7.6 14.9 8 13.7C8.6 12.3 9.3 11.2 10.3 10.2C11.4 9.1 12.4 8.5 13.8 7.9C14.9 7.5 16.5 6.9 19.6 6.8C22.8 6.7 23.8 6.7 32.1 6.7C40.4 6.7 41.4 6.7 44.6 6.8C47.6 6.9 49.2 7.5 50.4 7.9C51.8 8.5 52.9 9.2 53.9 10.2C55 11.3 55.6 12.3 56.3 13.7C56.7 14.8 57.3 16.4 57.4 19.5C57.5 22.7 57.5 23.7 57.5 32C57.5 40.3 57.4 41.3 57.3 44.5Z" />
                                      <path
                                          d="M32.0016 16.0996C23.1016 16.0996 16.1016 23.2996 16.1016 31.9996C16.1016 40.8996 23.3016 47.8996 32.0016 47.8996C40.7016 47.8996 48.0016 40.8996 48.0016 31.9996C48.0016 23.0996 40.9016 16.0996 32.0016 16.0996ZM32.0016 42.3996C26.2016 42.3996 21.6016 37.6996 21.6016 31.9996C21.6016 26.2996 26.3016 21.5996 32.0016 21.5996C37.8016 21.5996 42.4016 26.1996 42.4016 31.9996C42.4016 37.7996 37.8016 42.3996 32.0016 42.3996Z" />
                                      <path
                                          d="M48.7 19.1002C50.7435 19.1002 52.4 17.4436 52.4 15.4002C52.4 13.3567 50.7435 11.7002 48.7 11.7002C46.6565 11.7002 45 13.3567 45 15.4002C45 17.4436 46.6565 19.1002 48.7 19.1002Z" />
                                  </svg></a></li>

                          <?php
                                  }
                                  if($settings['vimeo_link']['url'] !== ''){
                                      ?>
                          <li><a href="<?php echo $settings['vimeo_link']['url']; ?>">
                                  <svg fill="#ffffff" width="20" height="20" viewBox="0 0 64 64"
                                      xmlns="http://www.w3.org/2000/svg">
                                      <path
                                          d="M63 17.6004C62.7 23.7004 58.5 32.0004 50.3 42.5004C41.9 53.5004 34.7 59.0004 28.9 59.0004C25.4 59.0004 22.3 55.8004 19.7 49.0004C18 43.0004 16.5 36.8004 14.7 30.6004C12.9 24.0004 10.9 20.6004 8.6 20.6004C8.2 20.6004 6.5 21.6004 3.7 23.6004L1 19.6004C4.1 16.9004 7.1 14.2004 10.2 11.4004C14.3 7.90041 17.2 6.00041 19.4 5.90041C24.2 5.50041 27.1 8.90041 28.3 15.8004C29.4 23.4004 30.3 28.2004 30.8 30.0004C32.2 36.3004 33.8 39.4004 35.3 39.4004C36.6 39.4004 38.5 37.4004 41.2 33.3004C43.9 29.2004 45.1 26.0004 45.4 23.9004C45.8 20.4004 44.3 18.5004 41.2 18.5004C39.8 18.5004 38.2 18.8004 36.7 19.6004C39.7 9.60041 45.4 4.70041 54 4.90041C60.3 5.20041 63.3 9.40041 63 17.6004Z" />
                                  </svg>

                              </a></li>

                          <?php
                                  }
                                  ?>
                      </ul>

                  </div>
              </div>
              <!--main-wrapper-->

          </nav>
      </header>
      <script>
          jQuery(function() {
              jQuery('.hover-underline-animation').mouseenter(function() {
                  jQuery('.menuActive').removeClass('menuActive');
                  if (jQuery(this).hasClass('mega-menu')) {
                      // Do something if the element has the class
                      jQuery(this).parent().addClass('menuActive');
                      jQuery('.main-header').addClass("inverse");
                  } else {
                      // Do something else if the element does not have the class
                      jQuery('.menuActive').removeClass('menuActive');
                      jQuery('.main-header').removeClass("inverse");
                  }
              })

              jQuery('.ic.menu').click(function() {

                  jQuery('.main-header').addClass("inverse");

              });
              jQuery('.ic.close').click(function() {

                  jQuery('.main-header').removeClass("inverse");

              });

              // .mouseleave(function () {
              //     jQuery('.main-header').removeClass("inverse");
              // });
          });
          jQuery(function() {
              jQuery('.sub-menu-block')
                  .mouseleave(function() {
                      jQuery('.main-header').removeClass("inverse");
                  });
          });
		  if (jQuery(window).width() > 768) {
			            jQuery(window).scroll(function() {

              if (jQuery(this).scrollTop() > 80) {
                  jQuery('.nav-wrapper').stop().fadeOut(100);
              } else {
                  jQuery('.nav-wrapper').stop().fadeIn(100);
              };
          });
			}


        if (jQuery(window).width() < 768) {
            jQuery('li .mega-menu').parent().toggleClass('open');
            jQuery('li .mega-menu').on('click', function(event) {
                event.preventDefault();
                let jQueryli = jQuery(this).parent().toggleClass('open');
            });
        }
      </script>
      <?php
	}


}