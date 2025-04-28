<?php
class TFIconBox_Widget_Free extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tficonbox';
    }
    
    public function get_title() {
        return esc_html__( 'TF Icon Box', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-icon-box';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
		// Start Icon        
			$this->start_controls_section( 
				'section_image',
	            [
	                'label' => esc_html__('Icon', 'themesflat-addons'),
	            ]
	        );	

	        $this->add_control(
				'selected_icon',
				[
					'label' => esc_html__( 'Icon', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'default' => [
						'value' => 'ion-wand',
						'library' => 'finance_ion_icons',
					],
				]
			);

	    	$this->end_controls_section();
	    // /.End Icon

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
					'default' => esc_html__( 'Accumulation', 'themesflat-addons' ),
				]
			); 

			$this->add_control(
				'sub_title',
				[
					'label' => esc_html__( 'Sub Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => esc_html__( '', 'themesflat-addons' ),
				]
			); 

			$this->add_control(
				'description',
				[
					'label' => esc_html__( 'Description', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::TEXTAREA,
					'default' => 'Donec lacinia mi rutrum sagittis consequat. Donec sagittis, tellus sodales sollicitudin commodo',
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
					'default' => 'no',
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

			$this->add_control(
				'link',
				[
					'label' => esc_html__( 'Link', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::URL,
					'placeholder' => esc_html__( 'https://your-link.com', 'themesflat-addons' ),
					'default' => [
						'url' => '#',
					],
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
					'default' => 'iconbox-style1',
					'options' => [
						'iconbox-style1'  => esc_html__( 'Style 1', 'themesflat-addons' ),
						'iconbox-style2' => esc_html__( 'Style 2', 'themesflat-addons' ),
						'iconbox-style3' => esc_html__( 'Style 3', 'themesflat-addons' ),
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
						'{{WRAPPER}} .flat-iconbox' => 'text-align: {{VALUE}}',
					],
				]
			);

	    	$this->end_controls_section();
        // /.End General Style  
        
        // Start Icon Style       
			$this->start_controls_section( 
				'section_style_image',
	            [
	                'label' => esc_html__('Icon', 'themesflat-addons'),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        ); 	  

			$this->add_control(
				'icon_position',
				[
					'label' => esc_html__( 'Icon align', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'left',
					'options' => [
						'top'  => esc_html__( 'Top', 'themesflat-addons' ),
						'left' => esc_html__( 'Left', 'themesflat-addons' ),
						'inline-left' => esc_html__( 'Inline Left', 'themesflat-addons' ),
						'right' => esc_html__( 'Right', 'themesflat-addons' ),
					],
				]
			);

			$this->add_control(
				'icon_style',
				[
					'label' => esc_html__( 'Icon Type', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'rounded',
					'options' => [
						'default'  => esc_html__( 'Default', 'themesflat-addons' ),
						'circle'  => esc_html__( 'Circle', 'themesflat-addons' ),
						'circle-outlined'  => esc_html__( 'Circle Background', 'themesflat-addons' ),
						'rounded'  => esc_html__( 'Square Radius Background', 'themesflat-addons' ),
						'outlined'  => esc_html__( 'Square Radius Border', 'themesflat-addons' ),
						'square'  => esc_html__( 'Square Background', 'themesflat-addons' ),
						'square-outlined'  => esc_html__( 'Square Border', 'themesflat-addons' ),
					],
				]
			);

			$this->add_responsive_control(
				'icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-icon' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};display: flex;justify-content: center;align-items: center;',
					],
				]
			);	

			$this->add_responsive_control(
				'icon_font_size',
				[
					'label' => esc_html__( 'Icon Font Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						],
					],
					'selectors' => [
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-icon svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);	

			$this->add_control( 
				'icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-icon' => 'color: {{VALUE}}',
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-icon svg' => 'fill: {{VALUE}}',
					],
				]
			);			       

	        $this->end_controls_section();
        // /.End Icon Style 

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
					'selector' => '{{WRAPPER}} .flat-iconbox .flat-iconbox-title',
				]
			);

			$this->add_group_control(
				\Elementor\Group_Control_Text_Shadow::get_type(),
				[
					'name' => 'title_text_shadow',
					'label' => esc_html__( 'Text Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .flat-iconbox .flat-iconbox-title',
				]
			);

			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-title, .flat-iconbox .flat-iconbox-title a' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .flat-iconbox .flat-iconbox-content',
				]
			);

			$this->add_control( 
				'description_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-content' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .flat-iconbox .flat-iconbox-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'selector' => '{{WRAPPER}} .flat-iconbox .box-readmore a',
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
								'{{WRAPPER}} .flat-iconbox .box-readmore a' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-iconbox .box-readmore a i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-iconbox .box-readmore a svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .flat-iconbox .box-readmore a' => 'background-color: {{VALUE}}',
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
								'{{WRAPPER}} .flat-iconbox .box-readmore a:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-iconbox .box-readmore a:hover i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .flat-iconbox .box-readmore a:hover svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'selectors' => [
								'{{WRAPPER}} .flat-iconbox .box-readmore a:hover' => 'background-color: {{VALUE}} !important',
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

		if ( ! empty( $settings['link']['url'] ) ) {
			$this->add_link_attributes( 'url_link', $settings['link'] );
		}
		?>
		<div class="flat-iconbox <?php esc_attr_e($settings['style']) ?> <?php esc_attr_e( $settings['icon_position'] ) ?> <?php esc_attr_e( $settings['icon_style'] ) ?>">
			<div class="flat-iconbox-header">

				<?php if (! empty( $settings['selected_icon']['value'] )):?>
					<div class="flat-iconbox-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ]); ?></div>
				<?php endif; ?>

				<?php if ($settings['title'] != ''): ?>
					<<?php esc_attr_e($settings['wrap_heading']) ?> class="flat-iconbox-title"><?php esc_attr_e($settings['title']); ?></<?php esc_attr_e($settings['wrap_heading']) ?>>
				<?php endif; ?>

				<?php if ($settings['sub_title'] != ''): ?>
					<div class="sub-title"><?php esc_attr_e($settings['sub_title']); ?></div>
				<?php endif; ?>
				
			</div>
			<?php if ($settings['description'] != ''): ?>
				<div class="flat-iconbox-content">
					<?php esc_attr_e($settings['description']); ?>
					
					<?php if ( $settings['show_button'] == 'yes' ): ?>
						<div class="box-readmore">
							<a <?php echo $this->get_render_attribute_string( 'url_link' ); ?>><?php esc_attr_e($settings['button_text']) ?></a>
						</div>
					<?php endif; ?>
				</div>				
			<?php endif; ?>
		</div>
		<?php			
	}	

}