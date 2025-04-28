<?php
class TFImageBoxType2_Widget_Free extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfimagebox-type2';
    }
    
    public function get_title() {
        return esc_html__( 'TF Image Box Type 02', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-image-box';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
		// Start Image        
			$this->start_controls_section( 
				'section_image',
	            [
	                'label' => esc_html__('Image', 'themesflat-addons'),
	            ]
	        );	

	        $this->add_control(
				'image',
				[
					'label' => esc_html__( 'Choose Image', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::MEDIA,
					'default' => [
						'url' => URL_THEMESFLAT_ADDONS_ELEMENTOR."assets/img/placeholder.jpg",
					],
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'include' => [],
					'default' => 'large',
				]
			);

	    	$this->end_controls_section();
	    // /.End Image

        // Start Content        
			$this->start_controls_section( 
				'section_content',
	            [
	                'label' => esc_html__('Content', 'themesflat-addons'),
	            ]
	        );	       	

			$this->add_control(
				'title',
				[
					'label' => esc_html__( 'Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( 'FINANCIAL PROJECTIONS AND ANALYSIS', 'themesflat-addons' ),
				]
			); 

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => 'Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudantium, totam aperiam.',
				]
			); 

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-addons' ),
					'default' => [
						'url' => '#',
					],
				]
			);
					
	        $this->end_controls_section();
        // /.End Content

	    // Start Button        
			$this->start_controls_section( 
				'section_button',
	            [
	                'label' => esc_html__('Button', 'themesflat-addons'),
	            ]
	        );

	        $this->add_control(
				'show_button',
				[
					'label' => esc_html__( 'Show Button', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'button_text',
				[
					'label' => esc_html__( 'Button Text', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXT,
					'default' => esc_html__( 'Read More', 'themesflat-addons' ),
					'condition' => [
	                    'show_button'	=> 'yes',
	                ],
				]
			);

	        $this->end_controls_section();
        // /.End Button	

	    // Start General Style       
			$this->start_controls_section( 
				'section_style_general',
	            [
	                'label' => esc_html__('General', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'style',
				[
					'label' => esc_html__( 'Style', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'style-1',
					'options' => [
						'style-1'  => esc_html__( 'Style 1', 'themesflat-addons' ),
						'style-2' => esc_html__( 'Style 2', 'themesflat-addons' ),
						'style-3' => esc_html__( 'Style 3', 'themesflat-addons' ),
					],
				]
			);

	        $this->add_responsive_control(
				'wrap_align',
				[
					'label' => esc_html__( 'Alignment', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left'    => [
							'title' => esc_html__( 'Left', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' => esc_html__( 'Center', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' => esc_html__( 'Right', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-right',
						],
						'justify' => [
							'title' => esc_html__( 'Justified', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-justify',
						],
					],
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox' => 'text-align: {{VALUE}}',
					],
				]
			);

	    	$this->end_controls_section();
        // /.End General Style  
        
        // Start Image Style       
			$this->start_controls_section( 
				'section_style_image',
	            [
	                'label' => esc_html__('Image', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 	  

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'image_border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-imagebox .flat-imagebox-image',
				]
			);

	        $this->add_responsive_control( 
				'image_border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-image, {{WRAPPER}} .flat-imagebox .flat-imagebox-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_group_control(
				\Elementor\Group_Control_Background::get_type(),
				[
					'name' => 'image_background',
					'label' => esc_html__( 'Background', 'themesflat-addons' ),
					'types' => [ 'classic', 'gradient' ],
					'selector' => '{{WRAPPER}} .flat-imagebox .flat-imagebox-image',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'image_box_shadow',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-imagebox .flat-imagebox-image',
				]
			);

			$this->add_control( 
				'image_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'image_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 
				'image_style_tabs' 
				);

	        	$this->start_controls_tab( 
	        		'image_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );	
	        		
	        		$this->add_control( 
						'image_opacity',
						[
							'label' => esc_html__( 'Image Opacity', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 1,
									'step' => 0.01,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 1,
							],
							'selectors' => [
								'{{WRAPPER}} .flat-imagebox .flat-imagebox-image img' => 'opacity: {{SIZE}};',
							],
						]
					);			
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'image_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'image_opacity_hover',
						[
							'label' => esc_html__( 'Image Opacity', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 0,
									'max' => 1,
									'step' => 0.01,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 1,
							],
							'selectors' => [
								'{{WRAPPER}} .flat-imagebox:hover .flat-imagebox-image img' => 'opacity: {{SIZE}};',
							],
						]
					);

					$this->add_control( 
						'image_scale_hover',
						[
							'label' => esc_html__( 'Image Scale', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SLIDER,
							'size_units' => [ 'px' ],
							'range' => [
								'px' => [
									'min' => 1,
									'max' => 2,
									'step' => 0.1,
								],
							],
							'default' => [
								'unit' => 'px',
								'size' => 1,1,
							],
							'selectors' => [
								'{{WRAPPER}} .flat-imagebox:hover .flat-imagebox-image img' => 'transform: scale({{SIZE}});',
							],
						]
					);	
										
				$this->end_controls_tab();

			$this->end_controls_tabs();				       

	        $this->end_controls_section();
        // /.End Image Style 

        // Start Content Style        
			$this->start_controls_section( 
				'section_style_content',
	            [
	                'label' => esc_html__('Content', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

			$this->add_control( 
				'heading_title',
				[
					'label' => esc_html__( 'Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control(
				'wrap_heading',
				[
					'label' => esc_html__( 'Wrap Heading', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'h4',
					'options' => [
						'h1'  => esc_html__( 'H1', 'themesflat-addons' ),
						'h2'  => esc_html__( 'H2', 'themesflat-addons' ),
						'h3'  => esc_html__( 'H3', 'themesflat-addons' ),
						'h4'  => esc_html__( 'H4', 'themesflat-addons' ),
						'h5'  => esc_html__( 'H5', 'themesflat-addons' ),
						'h6'  => esc_html__( 'H6', 'themesflat-addons' ),
					],
				]
			);

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-imagebox .flat-imagebox-title',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'title_text_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-imagebox .flat-imagebox-title',
				]
			);

			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-title, .flat-imagebox .flat-imagebox-title a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-title a:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control( 
				'title_spacer',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_control( 
				'heading_description',
				[
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'description_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-imagebox .flat-imagebox-desc',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'description_text_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-imagebox .flat-imagebox-desc',
				]
			);

			$this->add_control( 
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-desc' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control( 
				'description_spacer',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .flat-imagebox .flat-imagebox-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

	    	$this->end_controls_section();
        // /.End Content Style 

	    // Start Button Style 
		    $this->start_controls_section( 
		    	'section_style_button',
	            [
	                'label' => esc_html__( 'Button', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-imagebox .tf-button',
				]
			);

			$this->start_controls_tabs( 
				'button_style_tabs' 
				);

	        	$this->start_controls_tab( 
	        		'button_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );	
	        		$this->add_control( 
						'button_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .flat-imagebox .tf-button' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-imagebox .tf-button i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-imagebox .tf-button svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .flat-imagebox .tf-button' => 'background-color: {{VALUE}}',
							],
						]
					);		
					
				$this->end_controls_tab();

				$this->start_controls_tab( 
					'button_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'button_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .flat-imagebox .tf-button:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-imagebox .tf-button:hover i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-imagebox .tf-button:hover svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .flat-imagebox .tf-button:hover' => 'background-color: {{VALUE}}',
							],
						]
					);						
				$this->end_controls_tab();

			$this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Button Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();
		
		$image =  \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' );

		$html_title = $html_description = $html_image_overlay = $button = '';

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'url_link', $settings['link'] );
		}

		if ( $settings['show_button'] == 'yes' ) {
			if ( ! empty( $settings['link']['url'] ) ) {
				$button =  sprintf ('<div class="flat-imagebox-button"><a class="tf-button" %2$s>%1$s</a></div>',$settings['button_text'] , $this->get_render_attribute_string( 'url_link' ) );
			}else {
				$button =  sprintf ('<div class="flat-imagebox-button"><a class="tf-button">%1$s</a></div>',$settings['button_text'] );
			}		
		}	

		if ($settings['title'] != '') {
			if ( ! empty( $settings['link']['url'] ) ) {
				$html_title = sprintf('<%2$s class="flat-imagebox-title"><a %3$s>%1$s</a></%2$s>', $settings['title'], $settings['wrap_heading'], $this->get_render_attribute_string( 'url_link' ));
			}else {
				$html_title = sprintf('<%2$s class="flat-imagebox-title">%1$s</%2$s>', $settings['title'], $settings['wrap_heading']);
			}
		}

		if ($settings['description'] != '') {
			$html_description = sprintf('<div class="flat-imagebox-desc">%1$s</div>', $settings['description']);
		}	

		echo sprintf ( 
			'<div class="flat-imagebox %5$s"> 
				<div class="flat-imagebox-inner">
	                <div class="flat-imagebox-image">%1$s</div>
	                <div class="flat-imagebox-header">%2$s</div>
	                <div class="flat-imagebox-content">
		                %3$s
		                %4$s
					</div>
				</div>
            </div>',
            $image,
            $html_title,
            $html_description,           
            $button,
            $settings['style']
        );
			
	}	

}