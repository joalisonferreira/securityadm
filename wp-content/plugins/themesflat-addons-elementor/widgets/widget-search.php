<?php
class TFSearch_Widget_Free extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tf-search';
    }
    
    public function get_title() {
        return esc_html__( 'TF Search', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-site-search';
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
        // Start Menu Setting        
			$this->start_controls_section( 
				'section_logo_setting',
	            [
	                'label' => esc_html__('Logo Setting', 'themesflat-addons'),
	            ]
	        );	
			
			$this->add_control(
				'icon_search',
				[			        
			        'label' => esc_html__('Icon Search', 'themesflat-addons'),
			        'type' => \Elementor\Controls_Manager::ICONS,
			        'default' => [
			            'value' => 'fas fa-search',
			            'library' => 'fa-solid',
			        ],
			    ]
			);			

			$this->end_controls_section();
        // /.End Menu Setting		

		// Start Button Search Style 
	        $this->start_controls_section( 
	        	'section_style_button_search',
	            [
	                'label' => esc_html__( 'Button Search', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'button_search_position',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-addons' ),
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
					],
					'default' => 'tf-alignment-left',
				]
			);

	        $this->add_responsive_control(
				'btn_search_font_size',
				[
					'label' => esc_html__( 'Font size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', 'em' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
	                    ],
	                    'em' => [
							'min' => 0,
							'max' => 10,
							'step' => 1,
						],
	                ],
					'default' => [
						'size' => 20,
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .tf-icon-search' => 'font-size: {{SIZE}}{{UNIT}};',
					],					
				]
			);

			$this->add_control(
				'btn_search_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
	                    'top' => 8,
	                    'right' => 16,
	                    'bottom' => 8,
	                    'left' => 16,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .tf-icon-search' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'btn_search_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .tf-icon-search' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'btn_search_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-widget-search .tf-icon-search',
				]
			);

			$this->start_controls_tabs( 'btn_search_tabs' );				

				$this->start_controls_tab( 
					'btn_search_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
					);

			        $this->add_control(
						'btn_search_background',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,0)',
							'selectors' => [
								'{{WRAPPER}} .tf-widget-search .tf-icon-search' => 'background-color: {{VALUE}} !important',
							],
						]
					);

			        $this->add_control(
						'btn_search_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .tf-widget-search .tf-icon-search' => 'color: {{VALUE}} !important',
							],
						]
					);	

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'btn_search_border',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-widget-search .tf-icon-search',
						]
					);

					$this->add_control(
						'btn_search_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .tf-widget-search .tf-icon-search' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);		
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'btn_search_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					]
					);	

					$this->add_control(
						'btn_search_background_hover',
						[
							'label' => esc_html__( 'Background', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(255,255,255,0)',
							'selectors' => [
								'{{WRAPPER}} .tf-widget-search .tf-icon-search:hover' => 'background-color: {{VALUE}} !important',
							],
						]
					);

					$this->add_control(
						'btn_search_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#23A455',
							'selectors' => [
								'{{WRAPPER}} .tf-widget-search .tf-icon-search:hover' => 'color: {{VALUE}} !important',
							],
						]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'btn_search_border_hover',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-widget-search .tf-icon-search:hover',
						]
					);				
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->end_controls_section();
	    // /.End Button Search Style

	    // Start Form Search Style 
	        $this->start_controls_section( 
	        	'section_style_form_search',
	            [
	                'label' => esc_html__( 'Form Search', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'form_search_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
	                    'top' => 0,
	                    'right' => 0,
	                    'bottom' => 0,
	                    'left' => 0,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .search-field' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					],
				]
			);

			$this->add_control(
				'form_search_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'default' => [
	                    'top' => 0,
	                    'right' => 0,
	                    'bottom' => 0,
	                    'left' => 0,
	                    'unit' => 'px',
	                ],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .search-field' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'form_search_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-widget-search .search-field, {{WRAPPER}} .tf-widget-search input[type="search"], {{WRAPPER}} .tf-widget-search .search-field::placeholder',
				]
			);

			$this->add_control(
				'form_search_background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(255,255,255,0)',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .search-field' => 'background-color: {{VALUE}}',
					],
				]
			);	        

			$this->add_control(
				'form_search_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .search-field' => 'color: {{VALUE}} !important;',
						'{{WRAPPER}} .tf-widget-search .search-field' => 'border-color: {{VALUE}};',
						'{{WRAPPER}} .tf-widget-search .search-submit' => 'color: {{VALUE}};',
						'{{WRAPPER}} .tf-widget-search input[type="search"]' => 'color: {{VALUE}} !important;',
						
					],
				]
			);

			$this->add_control(
				'form_search_placeholder_color',
				[
					'label' => esc_html__( 'Placeholder Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .search-field::placeholder' => 'color: {{VALUE}}',
					],
				]
			);				

			$this->start_controls_tabs( 'form_search_tabs' );				

				$this->start_controls_tab( 
					'form_search_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
					);

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'form_search_border',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-widget-search .search-field',
						]
					);

					$this->add_control(
						'form_search_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .tf-widget-search .search-field' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				
				$this->end_controls_tab();

				$this->start_controls_tab( 
			    	'form_search_hover_tab',
					[
						'label' => esc_html__( 'Forus', 'themesflat-addons' ),
					]
					);	

					$this->add_group_control(
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'form_search_border_forus',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-widget-search .search-field:focus',
						]
					);

					$this->add_control(
						'form_search_border_radius_forus',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em' ],
							'selectors' => [
								'{{WRAPPER}} .tf-widget-search .search-field:focus' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				
				$this->end_controls_tab();

	        $this->end_controls_tabs();

	        $this->add_control(
				'h_btn_submit',
				[
					'label' => esc_html__( 'Button Submit Search', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'icon_submit_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 15,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-widget-search .search-submit' => 'font-size: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'h_overlay',
				[
					'label' => esc_html__( 'Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'overlay_background',
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .tf-widget-search .tf-modal-search-panel',
				]
			);

	        $this->end_controls_section();
	    // /.End Form Search Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		$class = $icon_search = '';
		$class .= $settings['button_search_position'];

		if ( $settings['icon_search']['value'] != '' ) {
			if ( !empty( $settings['icon_search']['value']['url'] ) ) {
				$icon_search = sprintf(
		           '<img class="logo_svg" src="%1$s" alt="%2$s"/>',
		             $settings['icon_search']['value']['url'],
		             $settings['icon_search']['value']['id']
		            
		         ); 
			} else {
				$icon_search = sprintf(
		             '<i class="%1$s"></i>',
		            $settings['icon_search']['value']
		        );  
			}
		}
		
		echo sprintf ( 
			'<div class="tf-widget-search %1$s">
				<button class="tf-icon-search">%2$s</button>
				<div class="tf-modal-search-panel">
					<div class="search-panel">
						<form role="search" method="get" class="tf-search-form" action="%3$s">
		                    <input type="search" class="search-field" placeholder="Search…" value="%4$s" name="s">
		                    <button type="submit" class="search-submit"><i aria-hidden="true" class="fas fa-search"></i></button>
		                </form>
					</div>
					<button class="tf-close-modal"></button>
				</div>				
			</div>',
			$class,
			$icon_search,
			esc_url(home_url( '/' )),
			get_search_query()
			
        );
	}

}
