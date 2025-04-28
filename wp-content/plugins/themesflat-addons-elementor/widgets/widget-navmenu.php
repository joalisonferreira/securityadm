<?php
class TFNavMenu_Widget_Free extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-nav-menu';
    }
    
    public function get_title() {
        return esc_html__( 'TF Nav Menu', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

    public function get_menus(){
        $list = [];
        $menus = wp_get_nav_menus();
        foreach($menus as $menu){
            $list[$menu->slug] = $menu->name;
        }

        return $list;
    }

	protected function register_controls() {
        // Start Menu Settings        
			$this->start_controls_section( 
				'section_menu_setting',
	            [
	                'label' => esc_html__('Menu Settings', 'themesflat-addons'),
	            ]
	        );

	        $this->add_control(
            	'one_page_enable',
	            [
					'label' => esc_html__('Enable one page?', 'themesflat-addons'),
					'description'	=> esc_html__('This works in the current page.', 'themesflat-addons'),
	                'type' => \Elementor\Controls_Manager::SWITCHER,
	                'default' => 'no',
	                'label_on' =>esc_html__( 'Yes', 'themesflat-addons' ),
	                'label_off' =>esc_html__( 'No', 'themesflat-addons' ),
	            ]
			);	

	        $this->add_control(
	            'nav_menu',
	            [
	                'label'     =>esc_html__( 'Select menu', 'themesflat-addons' ),
	                'type'      =>  \Elementor\Controls_Manager::SELECT,
	                'options'   => $this->get_menus(),
	            ]
			);

			$this->add_control(
				'layout',
				[
					'label' => esc_html__( 'Layout', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'horizontal',
					'options' => [
						'horizontal'  => esc_html__( 'Horizontal', 'themesflat-addons' ),
						'only-icon' => esc_html__( 'Only Icon', 'themesflat-addons' ),
					],
				]
			);

			$this->add_control(
				'menu_panel_style',
				[
					'label' => esc_html__( 'Menu Panel Style', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'menu-panel-style-default',
					'options' => [
						'menu-panel-style-default'  => esc_html__( 'Default', 'themesflat-addons' ),
						'menu-panel-style-left' => esc_html__( 'Left', 'themesflat-addons' ),
					],
				]
			);

			$this->add_control(
				'main_menu_position',
				[
					'label' => esc_html__( 'Alignment Menu', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'tf-alignment-left'    => [
							'title' => esc_html__( 'Left', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'tf-alignment-center' => [
							'title' => esc_html__( 'Center', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'tf-alignment-right' => [
							'title' => esc_html__( 'Right', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-right',
						],
						'tf-alignment-justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'default' => 'tf-alignment-left',
				]
			);

	        $this->add_control(
				'submenu_icon',
				[
					'label' => esc_html__( 'Submenu Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'arrows',
					'options' => [
						'classic'  => esc_html__( 'Classic', 'themesflat-addons' ),
						'arrows' => esc_html__( 'Arrows', 'themesflat-addons' ),
						'plus' => esc_html__( 'Plus', 'themesflat-addons' ),
					],
				]
			);			

			$this->add_control(
				'heading_responsive',
				[
					'label' => esc_html__( 'Responsive', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);			

	        $this->add_control(
				'nav_menu_logo',
				[
					'label' => esc_html__( 'Choose Mobile Menu Logo', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_control(
				'nav_menu_logo_url_to',
				[
					'label' => esc_html__( 'Link Logo', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'home',
					'options' => [
						'home' => esc_html__( 'Home', 'themesflat-addons' ),
						'custom' => esc_html__( 'Custom URL', 'themesflat-addons' ),
					],
					'condition' => [
						'nav_menu_logo[url]!' => '',
					],
				]
			);

			$this->add_control(
				'nav_menu_logo_link',
				[
					'label' => esc_html__( 'URL', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => 'https://your-link.com',
					'condition' => [
						'nav_menu_logo_url_to' => 'custom',
					],
					'show_label' => false,
				]
			);

			$this->add_control(
				'btn_menu_mobile_icon',
				[			        
			        'label' => esc_html__('Icon Button Menu Mobile & Only Icon', 'themesflat-addons'),
			        'type' => \Elementor\Controls_Manager::ICONS,
			        'default' => [
			            'value' => 'fas fa-bars',
			            'library' => 'fa-solid',
			        ],
			    ]
			);

			$this->add_control(
				'btn_menu_close',
				[			        
			        'label' => esc_html__('Icon Close Menu', 'themesflat-addons'),
			        'type' => \Elementor\Controls_Manager::ICONS,
			        'default' => [
			            'value' => 'fas fa-times',
			            'library' => 'fa-solid',
			        ],
			    ]
			);			

			$this->end_controls_section();
        // /.End Menu Settings

        // Start Main Menu Style 
	        $this->start_controls_section( 
	        	'section_style_menu',
	            [
	                'label' => esc_html__( 'Main Menu', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'item_menu_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a',
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'item_menu_border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a',
					
				]
			);

	        $this->start_controls_tabs( 'item_menu_tabs' );				

				$this->start_controls_tab( 
					'item_menu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
					);

					$this->add_control(
						'item_menu_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a' => 'color: {{VALUE}}',
							],
						]
					);	

			        $this->add_control(
						'item_menu_background',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a' => 'background-color: {{VALUE}}',
							],
						]
					);			        		
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'item_menu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					]
					);

					$this->add_control(
						'item_menu_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_underline .mainnav .menu-container > ul > li > a:after' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_overline .mainnav .menu-container > ul > li > a:after' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_double-line .mainnav .menu-container > ul > li > a:before' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_double-line .mainnav .menu-container > ul > li > a:after' => 'background-color: {{VALUE}}',
							],
						]
					);	

					$this->add_control(
						'item_menu_background_hover',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a:hover' => 'background-color: {{VALUE}}',
							],
						]
					);									
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'item_menu_active_tab',
					[
						'label' => esc_html__( 'Active', 'themesflat-addons' ),
					]
					);

					$this->add_control(
						'item_menu_color_active',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li.current-menu-ancestor > a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li.current-menu-item > a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_underline .mainnav .menu-container > ul > li.current-menu-ancestor > a:after' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_overline .mainnav .menu-container > ul > li.current-menu-ancestor > a:after' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_double-line .mainnav .menu-container > ul > li.current-menu-ancestor > a:before' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf_link_effect_double-line .mainnav .menu-container > ul > li.current-menu-ancestor > a:after' => 'background-color: {{VALUE}}',

							],
						]
					);

					$this->add_control(
						'item_menu_background_active',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li.current-menu-ancestor > a' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li.current-menu-item > a' => 'background-color: {{VALUE}}',
							],
						]
					);										
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();
	        

	        $this->add_control(
				'item_menu_horizontal_padding',
				[
					'label' => esc_html__( 'Horizontal Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',					
				]
			);

			$this->add_control(
				'item_menu_vertical_padding',
				[
					'label' => esc_html__( 'Vertical Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > a' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'item_menu_space_between',
				[
					'label' => esc_html__( 'Space Between', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li' => 'margin-right: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li:last-child' => 'margin-right: 0;',
					],
				]
			);

			$this->add_control(
				'link_hover_effect',
				[
					'label' => esc_html__( 'Link Hover Effect', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'none',
					'options' => [
						'none'  => esc_html__( 'None', 'themesflat-addons' ),
						'underline' => esc_html__( 'Underline', 'themesflat-addons' ),
						'overline' => esc_html__( 'Overline', 'themesflat-addons' ),
						'double-line' => esc_html__( 'Double Line', 'themesflat-addons' ),
						'text' => esc_html__( 'Text', 'themesflat-addons' ),
					],
				]
			);

			$this->add_control(
				'animation_line',
				[
					'label' => esc_html__( 'Animation', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'fade',
					'options' => [
						'normal'  => esc_html__( 'Normal', 'themesflat-addons' ),
						'fade'  => esc_html__( 'Fade', 'themesflat-addons' ),
						'slide' => esc_html__( 'Slide', 'themesflat-addons' ),
						'drop-in' => esc_html__( 'Drop In', 'themesflat-addons' ),
						'drop-out' => esc_html__( 'Drop Out', 'themesflat-addons' ),						
					],
					'condition' => [
						'link_hover_effect!' => 'none',
					],
				]
			);	   

			$this->add_control(
				'submenu_icon_margin',
				[
					'label' => esc_html__( 'Submenu Icon Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container li.menu-item-has-children > a > i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			); 

	        $this->end_controls_section();
	    // /.End Main Menu Style

	    // Start Dropdown Style 
	        $this->start_controls_section( 
	        	'section_style_submenu',
	            [
	                'label' => esc_html__( 'Dropdown', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'item_submenu_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul li ul.sub-menu li',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'item_submenu_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul li ul.sub-menu',
					
				]
			);

	        $this->start_controls_tabs( 
	        	'item_submenu_tabs' 
	        	);				

				$this->start_controls_tab( 
					'item_submenu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
					);	

					$this->add_control(
						'item_submenu_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu a' => 'color: {{VALUE}}',
							],
						]
					);			

			        $this->add_control(
						'item_submenu_background_color',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#1d2738',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu' => 'background-color: {{VALUE}}',
							],
						]
					);			        					
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'item_submenu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					]
					);

					$this->add_control(
						'item_submenu_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu a:hover' => 'color: {{VALUE}}',
							],
						]
					);	

					$this->add_control(
						'item_submenu_background_color_hover',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu li:hover' => 'background-color: {{VALUE}}',
							],
						]
					);			        				
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'item_submenu_active_tab',
					[
						'label' => esc_html__( 'Active', 'themesflat-addons' ),
					]
					);

					$this->add_control(
						'item_submenu_color_active',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu li.current_page_item > a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu > li.current-menu-item > a' => 'color: {{VALUE}}',
							],
						]
					);	

					$this->add_control(
						'item_submenu_background_color_active',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu li.current_page_item' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container ul.sub-menu > li.current-menu-item' => 'background-color: {{VALUE}}',
							],
						]
					);			        					
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();	        		        

			$this->add_responsive_control(
				'item_submenu_width',
				[
					'label' => esc_html__( 'Dropdown Width', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
	                    ]
	                ],
					'default' => [
						'size' => 250,
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu' => 'min-width: {{SIZE}}{{UNIT}};',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'item_submenu_spacing',
				[
					'label' => esc_html__( 'Top Distance', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 300,
							'step' => 1,
	                    ],
	                    '%' => [
							'min' => 0,
							'max' => 200,
						],
	                ],
	                'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'desktop_default' => [
						'size' => 100,
						'unit' => '%',
					],
					'tablet_default' => [
						'size' => 100,
						'unit' => '%',
					],
					'mobile_default' => [
						'size' => 100,
						'unit' => '%',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li > ul.sub-menu' => 'top: {{SIZE}}{{UNIT}};',
					],					
				]
			);

			$this->add_control(
				'item_submenu_horizontal_padding',
				[
					'label' => esc_html__( 'Horizontal Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul li ul.sub-menu li a' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}};',
					],					
				]
			);

			$this->add_control(
				'item_submenu_vertical_padding',
				[
					'label' => esc_html__( 'Vertical Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 50,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul li ul.sub-menu li a' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
					],
				]
			);

	        $this->add_control(
				'heading_dropdown_divider',
				[
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'dropdown_divider_border',
				[
					'label'       => esc_html__( 'Border Style', 'themesflat-addons' ),
					'type'        => \Elementor\Controls_Manager::SELECT,
					'default'     => 'none',
					'label_block' => false,
					'options'     => [
						'none'   => esc_html__( 'None', 'themesflat-addons' ),
						'solid'  => esc_html__( 'Solid', 'themesflat-addons' ),
						'double' => esc_html__( 'Double', 'themesflat-addons' ),
						'dotted' => esc_html__( 'Dotted', 'themesflat-addons' ),
						'dashed' => esc_html__( 'Dashed', 'themesflat-addons' ),
					],
					'selectors'   => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:not(:last-child)' => 'border-bottom-style: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'divider_border_color',
				[
					'label'     => esc_html__( 'Border Color', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#f7f7f7',
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:not(:last-child)' => 'border-bottom-color: {{VALUE}};',
					],
					'condition' => [
						'dropdown_divider_border!' => 'none',
					],
				]
			);

			$this->add_control(
				'dropdown_divider_width',
				[
					'label'     => esc_html__( 'Border Width', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'max' => 50,
						],
					],
					'default'   => [
						'size' => '1',
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:not(:last-child)' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'dropdown_divider_border!' => 'none',
					],
				]
			);

			$this->add_control(
				'heading_dropdown_divider_first_child',
				[
					'label' => esc_html__( 'Border First Child', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'dropdown_divider_border_first_child',
				[
					'label'       => esc_html__( 'Border Style', 'themesflat-addons' ),
					'type'        => \Elementor\Controls_Manager::SELECT,
					'default'     => 'none',
					'label_block' => false,
					'options'     => [
						'none'   => esc_html__( 'None', 'themesflat-addons' ),
						'solid'  => esc_html__( 'Solid', 'themesflat-addons' ),
						'double' => esc_html__( 'Double', 'themesflat-addons' ),
						'dotted' => esc_html__( 'Dotted', 'themesflat-addons' ),
						'dashed' => esc_html__( 'Dashed', 'themesflat-addons' ),
					],
					'selectors'   => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:first-child' => 'border-top-style: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'divider_border_color_first_child',
				[
					'label'     => esc_html__( 'Border Color', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#f7f7f7',
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:first-child' => 'border-top-color: {{VALUE}};',
					],
					'condition' => [
						'dropdown_divider_border_first_child!' => 'none',
					],
				]
			);

			$this->add_control(
				'dropdown_divider_width_first_child',
				[
					'label'     => esc_html__( 'Border Width', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'max' => 50,
						],
					],
					'default'   => [
						'size' => '1',
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:first-child' => 'border-top-width: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'dropdown_divider_border_first_child!' => 'none',
					],
				]
			);

			$this->add_control(
				'heading_dropdown_divider_last_child',
				[
					'label' => esc_html__( 'Border Last Child', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'dropdown_divider_border_last_child',
				[
					'label'       => esc_html__( 'Border Style', 'themesflat-addons' ),
					'type'        => \Elementor\Controls_Manager::SELECT,
					'default'     => 'none',
					'label_block' => false,
					'options'     => [
						'none'   => esc_html__( 'None', 'themesflat-addons' ),
						'solid'  => esc_html__( 'Solid', 'themesflat-addons' ),
						'double' => esc_html__( 'Double', 'themesflat-addons' ),
						'dotted' => esc_html__( 'Dotted', 'themesflat-addons' ),
						'dashed' => esc_html__( 'Dashed', 'themesflat-addons' ),
					],
					'selectors'   => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:last-child' => 'border-bottom-style: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'divider_border_color_last_child',
				[
					'label'     => esc_html__( 'Border Color', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#f7f7f7',
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:last-child' => 'border-bottom-color: {{VALUE}};',
					],
					'condition' => [
						'dropdown_divider_border_last_child!' => 'none',
					],
				]
			);

			$this->add_control(
				'dropdown_divider_width_last_child',
				[
					'label'     => esc_html__( 'Border Width', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'max' => 50,
						],
					],
					'default'   => [
						'size' => '1',
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav .menu-container > ul > li ul.sub-menu li:last-child' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'dropdown_divider_border_last_child!' => 'none',
					],
				]
			);

	        $this->end_controls_section();
	    // /.End Dropdown Style

	    // Start Mobile Button & Close Icon Style 
	        $this->start_controls_section( 
	        	'section_style_menu_trigger',
	            [
	                'label' => esc_html__( 'Mobile Button & Close Icon', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->start_controls_tabs( 
	        	'toggle_button_menu_tabs' 
	        	);				

				$this->start_controls_tab( 
					'toggle_button_menu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
					);	

					$this->add_control(
						'toggle_button_menu_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile, {{WRAPPER}} .tf-nav-menu .btn-menu-only' => 'color: {{VALUE}}',
							],
						]
					);	

			        $this->add_control(
						'toggle_button_menu_bgcolor',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,0)',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile, {{WRAPPER}} .tf-nav-menu .btn-menu-only' => 'background-color: {{VALUE}}',
							],
						]
					);												
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'toggle_button_menu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					]
					);

					$this->add_control(
						'toggle_button_menu_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile:hover, {{WRAPPER}} .tf-nav-menu .btn-menu-only:hover' => 'color: {{VALUE}}',
							],
						]
					);	

					$this->add_control(
						'toggle_button_menu_bgcolor_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,0)',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile:hover, {{WRAPPER}} .tf-nav-menu .btn-menu-only:hover' => 'background-color: {{VALUE}}',
							],
						]
					);									
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->add_responsive_control(
				'toggle_button_menu_size',
				[
					'label'     => esc_html__( 'Icon Size', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'min' => 15,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile, {{WRAPPER}} .tf-nav-menu .btn-menu-only' => 'font-size: {{SIZE}}{{UNIT}}',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'toggle_button_menu_border_width',
				[
					'label'     => esc_html__( 'Border Width', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'max' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile, {{WRAPPER}} .tf-nav-menu .btn-menu-only' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
					],
				]
			);

			$this->add_responsive_control(
				'toggle_button_menu_border_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type'       => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile, {{WRAPPER}} .tf-nav-menu .btn-menu-only' => 'border-radius: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'toggle_button_menu_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px' ],
	                'default' => [
	                    'top' => 8,
	                    'right' => 16,
	                    'bottom' => 8,
	                    'left' => 16,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile, {{WRAPPER}} .tf-nav-menu .btn-menu-only' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
	        );

	        $this->add_responsive_control(
				'toggle_button_menu_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px' ],
	                'default' => [
	                    'top' => 0,
	                    'right' => 0,
	                    'bottom' => 0,
	                    'left' => 0,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .btn-menu-mobile, {{WRAPPER}} .tf-nav-menu .btn-menu-only' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
	        );

	        $this->add_control(
				'heading_panel_btn_close',
				[
					'label' => esc_html__( 'Button Close', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->start_controls_tabs( 
	        	'panel_button_close_tabs' 
	        	);				

				$this->start_controls_tab( 
					'panel_button_close_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
					);	

					$this->add_control(
						'panel_button_close_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,0.5)',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default' => 'color: {{VALUE}}',
							],
						]
					);	

			        $this->add_control(
						'panel_button_close_bgcolor',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,0)',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default' => 'background-color: {{VALUE}}',
							],
						]
					);												
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'panel_button_close_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					]
					);

					$this->add_control(
						'panel_button_close_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,1)',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default:hover' => 'color: {{VALUE}}',
							],
						]
					);	

					$this->add_control(
						'panel_button_close_bgcolor_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,0)',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close:hover' => 'background-color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default:hover' => 'background-color: {{VALUE}}',
							],
						]
					);									
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->add_responsive_control(
				'panel_button_close_size',
				[
					'label'     => esc_html__( 'Icon Size', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'min' => 15,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close' => 'font-size: {{SIZE}}{{UNIT}}',
						'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default' => 'font-size: {{SIZE}}{{UNIT}}',
					],
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'panel_button_close_border_width',
				[
					'label'     => esc_html__( 'Border Width', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'max' => 10,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
						'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default' => 'border-width: {{SIZE}}{{UNIT}}; border-style: solid;',
					],
				]
			);

			$this->add_responsive_control(
				'panel_button_close_border_radius',
				[
					'label'      => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type'       => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'selectors'  => [
						'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close' => 'border-radius: {{SIZE}}{{UNIT}}',
						'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default' => 'border-radius: {{SIZE}}{{UNIT}}',
					],
				]
			);

			$this->add_responsive_control(
				'panel_button_close_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px' ],
	                'default' => [
	                    'top' => 10,
	                    'right' => 10,
	                    'bottom' => 10,
	                    'left' => 10,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
	        );

	        $this->add_responsive_control(
				'panel_button_close_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::DIMENSIONS,
	                'size_units' => [ 'px' ],
	                'default' => [
	                    'top' => 0,
	                    'right' => 0,
	                    'bottom' => 0,
	                    'left' => 0,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay .tf-close' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						'{{WRAPPER}} .tf-nav-menu .close-menu-panel-style-default' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
	        );

	    	$this->end_controls_section();
	    // /.End Mobile Button & Close Icon Style

	    // Start Menu Panel Style 
	        $this->start_controls_section( 
	        	'section_style_mobile_panel',
	            [
	                'label' => esc_html__( 'Menu Panel', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'mobile_menu_alignment',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'mobile-menu-alignment-left'    => [
							'title' => esc_html__( 'Left', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'mobile-menu-alignment-center' => [
							'title' => esc_html__( 'Center', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-center',
						],
					],
					'default' => 'mobile-menu-alignment-center',
				]
			);

	        $this->add_control(
				'panel_background',
				[
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#212529',
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .nav-panel' => 'background-color: {{VALUE}}',
					],
				]
			);

	        $this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'panel_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-nav-menu .nav-panel',
				]
			);

	        $this->add_control(
				'panel_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
	                    'top' => 0,
	                    'right' => 0,
	                    'bottom' => 0,
	                    'left' => 0,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .nav-panel' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_responsive_control(
				'panel_width',
				[
					'label' => esc_html__( 'Width', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 700,
							'step' => 1,
	                    ],
	                    '%' => [
							'min' => 0,
							'max' => 200,
						],
	                ],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'desktop_default' => [
						'size' => 300,
						'unit' => 'px',
					],
					'tablet_default' => [
						'size' => 300,
						'unit' => 'px',
					],
					'mobile_default' => [
						'size' => 250,
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .nav-panel' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'menu_panel_style' => 'menu-panel-style-left',
					],
				]
			);			

			$this->add_control(
				'heading_panel_overlay',
				[
					'label' => esc_html__( 'Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
					'condition' => [
						'menu_panel_style' => 'menu-panel-style-left',
					],
				]
			);

			$this->add_control(
				'panel_background_overlay',
				[
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(0, 0, 0, 0.9)',
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mobile-menu-overlay' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'menu_panel_style' => 'menu-panel-style-left',
					],
				]
			);

	        $this->add_control(
				'heading_panel_logo',
				[
					'label' => esc_html__( 'Logo', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_responsive_control(
				'panel_logo_width',
				[
					'label' => esc_html__( 'Width', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 500,
							'step' => 1,
	                    ],
	                    '%' => [
							'min' => 0,
							'max' => 200,
						],
	                ],
	                'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'desktop_default' => [
						'size' => 200,
						'unit' => 'px',
					],
					'tablet_default' => [
						'size' => 200,
						'unit' => 'px',
					],
					'mobile_default' => [
						'size' => 200,
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .nav-panel .logo-nav' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'panel_logo_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .nav-panel .logo-nav' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'panel_logo_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'default' => [
	                    'top' => 20,
	                    'right' => 0,
	                    'bottom' => 20,
	                    'left' => 20,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .nav-panel .logo-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'heading_memu_mobile_divider',
				[
					'label' => esc_html__( 'Border Menu', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'memu_mobile_divider_border',
				[
					'label'       => esc_html__( 'Border Style', 'themesflat-addons' ),
					'type'        => \Elementor\Controls_Manager::SELECT,
					'default'     => 'none',
					'label_block' => false,
					'options'     => [
						'none'   => esc_html__( 'None', 'themesflat-addons' ),
						'solid'  => esc_html__( 'Solid', 'themesflat-addons' ),
						'double' => esc_html__( 'Double', 'themesflat-addons' ),
						'dotted' => esc_html__( 'Dotted', 'themesflat-addons' ),
						'dashed' => esc_html__( 'Dashed', 'themesflat-addons' ),
					],
					'selectors'   => [
						'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li' => 'border-top-style: {{VALUE}};',
						'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container > ul > li:last-child' => 'border-bottom-style: {{VALUE}};',
					],
				]
			);

			$this->add_control(
				'memu_mobile_divider_border_color',
				[
					'label'     => esc_html__( 'Border Color', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::COLOR,
					'default'   => '#f7f7f7',
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li' => 'border-top-color: {{VALUE}};',
						'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container > ul > li:last-child' => 'border-bottom-color: {{VALUE}};',
					],
					'condition' => [
						'memu_mobile_divider_border!' => 'none',
					],
				]
			);

			$this->add_control(
				'memu_mobile_divider_width',
				[
					'label'     => esc_html__( 'Border Width', 'themesflat-addons' ),
					'type'      => \Elementor\Controls_Manager::SLIDER,
					'range'     => [
						'px' => [
							'max' => 50,
						],
					],
					'default'   => [
						'size' => '1',
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li' => 'border-top-width: {{SIZE}}{{UNIT}}',
						'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container > ul > li:last-child' => 'border-bottom-width: {{SIZE}}{{UNIT}}',
					],
					'condition' => [
						'memu_mobile_divider_border!' => 'none',
					],
				]
			);

			$this->add_control(
				'heading_panel_menu',
				[
					'label' => esc_html__( 'Menu', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);			

			$this->add_control(
				'panel_memu_mobile_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', '%', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-nav-menu .mainnav-mobi' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);			

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'panel_menu_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-nav-menu .nav-panel .mainnav-mobi ul li a',
				]
			);	

			$this->start_controls_tabs( 'panel_menu_tabs' );				

				$this->start_controls_tab( 
					'panel_menu_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
					);

			        $this->add_control(
						'panel_menu_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#ffffff',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li a, {{WRAPPER}} .tf-nav-menu .mainnav-mobi .btn-submenu i' => 'color: {{VALUE}}',
							],
						]
					);		
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'panel_menu_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					]
					);

			        $this->add_control(
						'panel_menu_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li a:hover' => 'color: {{VALUE}}',
							],
						]
					);					
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'panel_menu_active_tab',
					[
						'label' => esc_html__( 'Active', 'themesflat-addons' ),
					]
					);

			        $this->add_control(
						'panel_menu_color_active',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li.current_page_item > a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li.current-menu-ancestor > a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li.current-menu-item > a' => 'color: {{VALUE}}',
							],
						]
					);						
				
				$this->end_controls_tab();

				$this->add_control(
					'horizontal_padding_link',
					[
						'label'     => esc_html__( 'Horizontal Padding Link (px)', 'themesflat-addons' ),
						'type'      => \Elementor\Controls_Manager::SLIDER,
						'separator' => 'before',
						'range'     => [
							'px' => [
								'max' => 200,
							],
						],
						'default'   => [
							'size' => '20',
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li a' => 'padding-left: {{SIZE}}{{UNIT}}; padding-right: {{SIZE}}{{UNIT}}',
							'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul.sub-menu li a' => 'padding-left: calc({{SIZE}}{{UNIT}} + 10px); padding-right: calc({{SIZE}}{{UNIT}} + 10px)',
			 			'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul.sub-menu ul.sub-menu li a' => 'padding-left: calc({{SIZE}}{{UNIT}} + 20px); padding-right: calc({{SIZE}}{{UNIT}} + 20px)',
						],
					]
				);

				$this->add_control(
					'vertical_padding_link',
					[
						'label'     => esc_html__( 'Vertical Padding Link (px)', 'themesflat-addons' ),
						'type'      => \Elementor\Controls_Manager::SLIDER,
						'range'     => [
							'px' => [
								'max' => 200,
							],
						],
						'default'   => [
							'size' => '12',
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .menu-container ul li a' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}}',
						],
					]
				);

				$this->add_control(
					'width_icon_submenu',
					[
						'label'     => esc_html__( 'Width Icon Submenu (px)', 'themesflat-addons' ),
						'type'      => \Elementor\Controls_Manager::SLIDER,						
						'range'     => [
							'px' => [
								'max' => 200,
							],
						],
						'default'   => [
							'size' => '45',
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .btn-submenu' => 'width: {{SIZE}}{{UNIT}};',
						],
					]
				);

				$this->add_control(
					'height_icon_submenu',
					[
						'label'     => esc_html__( 'Height Icon Submenu (px)', 'themesflat-addons' ),
						'type'      => \Elementor\Controls_Manager::SLIDER,						
						'range'     => [
							'px' => [
								'max' => 200,
							],
						],
						'default'   => [
							'size' => '45',
							'unit' => 'px',
						],
						'selectors' => [
							'{{WRAPPER}} .tf-nav-menu .mainnav-mobi .btn-submenu' => 'height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
						],
					]
				);

	        $this->end_controls_tabs();	        

	    	$this->end_controls_section();
	    // /.End Menu Panel Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		$class = $btn_menu_mobile_icon = $btn_menu_close = $url_logo = $logo = $submenu_icon = $one_page = '';

		if ($settings['one_page_enable'] == 'yes') {
			$one_page = ' has-one-page';
		}

		$class .= $settings['main_menu_position'] . ' ' . $settings['layout'] . ' '.$settings['menu_panel_style'] .' tf_link_effect_'. $settings['link_hover_effect'] .' tf_animation_line_'. $settings['animation_line'] . $one_page;

		switch ($settings['submenu_icon']) {
			case 'classic':
				$submenu_icon = '<i class="fa fa-caret-right" aria-hidden="true"></i>';
				break;
			case 'arrows':
				$submenu_icon = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
				break;	
			case 'plus':
				$submenu_icon = '<i>+</i>';
				break;		
			default:
				$submenu_icon = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
				break;
		}

		if ( $settings['btn_menu_mobile_icon']['value'] != '' ) {
			if ( !empty( $settings['btn_menu_mobile_icon']['value']['url'] ) ) {
				$btn_menu_mobile_icon = sprintf(
		           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
		             $settings['btn_menu_mobile_icon']['value']['url'],
		             $settings['btn_menu_mobile_icon']['value']['id']
		            
		         ); 
			} else {
				$btn_menu_mobile_icon = sprintf(
		             '<i class="%1$s"></i>',
		            $settings['btn_menu_mobile_icon']['value']
		        );  
			}
		}


		if ( $settings['btn_menu_close']['value'] != '' ) {
			if ( !empty( $settings['btn_menu_close']['value']['url'] ) ) {
				$btn_menu_close = sprintf(
		           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
		             $settings['btn_menu_close']['value']['url'],
		             $settings['btn_menu_close']['value']['id']
		            
		         ); 
			} else {
				$btn_menu_close = sprintf(
		             '<i class="%1$s"></i>',
		            $settings['btn_menu_close']['value']
		        );  
			}
		}

		if ($settings['nav_menu_logo']['url']) {
			$url_logo = $settings['nav_menu_logo']['url'];			
			if ($settings['nav_menu_logo_url_to'] == 'custom') {			
				$logo = '<a href="'.$settings['nav_menu_logo_link']['url'].'" class="logo-nav"> <img src="'.$url_logo.'" alt="'.get_bloginfo('name').'"> </a>';

			}else {		
				$logo = '<a href="'. esc_url(home_url('/')).'" class="logo-nav"> <img src="'.$url_logo.'" alt="'.get_bloginfo('name').'"></a>';
			}
		}else {
			if ($settings['nav_menu_logo_url_to'] == 'custom') {			
				$logo = '<a href="'.$settings['nav_menu_logo_link']['url'].'" class="logo-nav">'.get_bloginfo('name').'</a>';

			}else {		
				$logo = '<a href="'. esc_url(home_url('/')).'" class="logo-nav">'.get_bloginfo('name').'</a>';
			}
		}

		
		$id_random = 'tf-nav-'.uniqid();

		$args = array(
	        'menu'            => $settings['nav_menu'],
	        'container'       => 'div',
	        'container_class' => 'menu-container tf-menu-container',
	        'container_id'    => '',
	        'menu_class'      => 'menu',
	        'menu_id'         => '',
	        'echo'            => false,
	        'fallback_cb'     => 'wp_page_menu',
	        'before'          => '',
	        'after'           => '',
	        'link_before'     => '',
	        'link_after'      => $submenu_icon,
	        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	        'item_spacing'    => 'preserve',
	        'depth'           => 0,
	        'walker'          => '',
	        'theme_location'  => '',
	    );
		
		echo sprintf ( 
			'<div class="tf-nav-menu %1$s %6$s" data-id_random="%6$s">
				<div class="nav-panel %7$s">
					<div class="wrap-logo-nav">%4$s</div>
					<div class="mainnav-mobi">%2$s</div>
					<div class="wrap-close-menu-panel-style-default"><button class="close-menu-panel-style-default">%5$s</button></div>					
				</div>				
				<div class="mainnav nav">%2$s</div>
				<div class="mobile-menu-overlay"><button class="tf-close">%5$s</button></div>
				<button class="btn-menu-mobile">
					<span class="open-icon">%3$s</span>
				</button>
				<button class="btn-menu-only">
					<span class="open-icon">%3$s</span>
				</button>
			</div>',
			$class,
            wp_nav_menu($args),
            $btn_menu_mobile_icon,
            $logo,
            $btn_menu_close,
            $id_random,
            $settings['mobile_menu_alignment']         
        );
	}

}
