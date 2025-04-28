<?php
class TFPosts_Widget_Free extends \Elementor\Widget_Base {

	public function get_name() {
        return 'tfposts';
    }
    
    public function get_title() {
        return esc_html__( 'TF Posts', 'themesflat-addons' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }
    
    public function get_categories() {
        return [ 'themesflat_addons' ];
    }

	protected function register_controls() {
        // Start Posts Query        
			$this->start_controls_section( 
				'section_posts_query',
	            [
	                'label' => esc_html__('Query', 'themesflat-addons'),
	            ]
	        );	

	        $this->add_control( 
	        	'posts_type',
				[
					'label' => esc_html__( 'Posts Source', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'options' => ThemesFlat_Addon_For_Elementor_Finance::tf_get_post_types(),
					'default' => 'post',
				]
			);

			$this->add_control( 
				'posts_per_page',
	            [
	                'label' => esc_html__( 'Posts Per Page', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::NUMBER,
	                'default' => '2',
	            ]
	        );

	        $this->add_control( 
	        	'order_by',
				[
					'label' => esc_html__( 'Order By', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'date',
					'options' => [						
			            'date' => 'Date',
			            'ID' => 'Post ID',			            
			            'title' => 'Title',
					],
				]
			);

			$this->add_control( 
				'order',
				[
					'label' => esc_html__( 'Order', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'desc',
					'options' => [						
			            'desc' => 'Descending',
			            'asc' => 'Ascending',	
					],
				]
			);

			$this->add_control( 
				'posts_categories',
				[
					'label' => esc_html__( 'Categories', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT2,
					'options' => ThemesFlat_Addon_For_Elementor_Finance::tf_get_taxonomies(),
					'label_block' => true,
	                'multiple' => true,
					'condition' =>[
	                    'posts_type' => 'post',
	                ]
				]
			);

			$this->add_control( 
				'exclude',
				[
					'label' => esc_html__( 'Exclude', 'themesflat-addons' ),
					'type'	=> \Elementor\Controls_Manager::TEXT,	
					'description' => esc_html__( 'Post Ids Will Be Inorged. Ex: 1,2,3', 'themesflat-addons' ),
					'default' => '',
					'label_block' => true,				
				]
			);

			$this->end_controls_section();
        // /.End Posts Query

		// Start Layout        
			$this->start_controls_section( 
				'section_posts_layout',
	            [
	                'label' => esc_html__('Layout', 'themesflat-addons'),
	            ]
	        );	

	        $this->add_control(
				'posts_layout_type',
				[
					'label' => esc_html__( 'Type', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'list' => [
							'title' => esc_html__( 'List', 'themesflat-addons' ),
							'icon' => 'eicon-post-list',
						],
						'grid' => [
							'title' => esc_html__( 'Grid', 'themesflat-addons' ),
							'icon' => 'eicon-posts-grid',
						],
						'masonry' => [
							'title' => esc_html__( 'Masonry', 'themesflat-addons' ),
							'icon' => 'eicon-posts-masonry',
						],
					],
					'default' => 'grid',
					'toggle' => false,
				]
			);		

	        $this->add_control( 
	        	'posts_layout',
				[
					'label' => esc_html__( 'Columns', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'column-2',
					'options' => [
						'column-1' => esc_html__( '1', 'themesflat-addons' ),
						'column-2' => esc_html__( '2', 'themesflat-addons' ),
						'column-3' => esc_html__( '3', 'themesflat-addons' ),
						'column-4' => esc_html__( '4', 'themesflat-addons' ),
						'column-5' => esc_html__( '5', 'themesflat-addons' ),
						'column-6' => esc_html__( '6', 'themesflat-addons' ),
					],
					'condition' => [
	                    'posts_layout_type!'	=> 'list',
	                ],
				]
			);

			$this->add_control( 
	        	'posts_layout_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'tablet-column-1',
					'options' => [
						'tablet-column-1' => esc_html__( '1', 'themesflat-addons' ),
						'tablet-column-2' => esc_html__( '2', 'themesflat-addons' ),
						'tablet-column-3' => esc_html__( '3', 'themesflat-addons' ),
						'tablet-column-4' => esc_html__( '4', 'themesflat-addons' ),
						'tablet-column-5' => esc_html__( '5', 'themesflat-addons' ),
						'tablet-column-6' => esc_html__( '6', 'themesflat-addons' ),
					],
					'condition' => [
	                    'posts_layout_type!'	=> 'list',
	                ],
				]
			);

			$this->add_control( 
	        	'posts_layout_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'mobile-column-1',
					'options' => [
						'mobile-column-1' => esc_html__( '1', 'themesflat-addons' ),
						'mobile-column-2' => esc_html__( '2', 'themesflat-addons' ),
						'mobile-column-3' => esc_html__( '3', 'themesflat-addons' ),
						'mobile-column-4' => esc_html__( '4', 'themesflat-addons' ),
						'mobile-column-5' => esc_html__( '5', 'themesflat-addons' ),
						'mobile-column-6' => esc_html__( '6', 'themesflat-addons' ),
					],
					'condition' => [
	                    'posts_layout_type!'	=> 'list',
	                ],
				]
			);

			$this->add_control( 
	        	'grid_styles',
				[
					'label' => esc_html__( 'Grid Styles', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'grid-styles-default',
					'options' => [
						'grid-styles-default' => esc_html__( 'Default', 'themesflat-addons' ),
						'grid-styles-1' => esc_html__( 'Styles 1', 'themesflat-addons' ),
						'grid-styles-2' => esc_html__( 'Styles 2', 'themesflat-addons' ),
						'grid-styles-3' => esc_html__( 'Styles 3', 'themesflat-addons' ),
						'grid-styles-4' => esc_html__( 'Styles 4', 'themesflat-addons' ),
					],
					'condition' => [
	                    'posts_layout_type'	=> 'grid',
	                ],
				]
			);

			$this->add_control(
				'layout_align',
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
						'{{WRAPPER}} .tf-posts' => 'text-align: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'heading_image',
				[
					'label' => esc_html__( 'Image', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

	        $this->add_control( 
	        	'show_image',
				[
					'label' => esc_html__( 'Show Image', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'image_position',
				[
					'label' => esc_html__( 'Image Position', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'top',
					'options' => [
						'top'  => esc_html__( 'Top', 'themesflat-addons' ),
						'middle' => esc_html__( 'Middle', 'themesflat-addons' ),
						'bottom' => esc_html__( 'Bottom', 'themesflat-addons' ),
					],
					'condition' => [
	                    'show_image'	=> 'yes',
	                ],
				]
			);

			$this->add_group_control( 
				\Elementor\Group_Control_Image_Size::get_type(),
				[
					'name' => 'thumbnail',
					'default' => 'large',
					'condition' => [
						'show_image' => 'yes'
					],
				]
			);

			$this->add_responsive_control(
				'featured_width',
				[
					'label' => esc_html__( 'Width', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [					
						'px' => [
							'min' => 0,
							'max' => 1000,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 200,
					],
					'selectors' => [
						'.tf-posts-wrap .tf-posts.list .blog-post .featured-post' => 'width: {{SIZE}}{{UNIT}};',
						'.tf-posts-wrap .tf-posts.list .blog-post .content' => 'width: calc(100% - {{SIZE}}{{UNIT}});',
					],				
				]
			);

			$this->add_control(
				'featured_width_mobi_image_full',
				[
					'label' => esc_html__( 'Image Width Full ( Mobile )', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Yes', 'themesflat-addons' ),
					'label_off' => esc_html__( 'No', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
	                    'posts_layout_type'	=> 'list',
	                ],
				]
			);

			if ( is_rtl() ) {
				$this->add_control(
					'featured_margin_left',
					[
						'label' => esc_html__( 'Margin Left', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [					
							'px' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 30,
						],
						'selectors' => [
							'.tf-posts-wrap .tf-posts.list .blog-post .featured-post' => 'margin-left: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'posts_layout_type'	=> 'list',
		                ],
					]
				);
			}else {
				$this->add_control(
					'featured_margin_right',
					[
						'label' => esc_html__( 'Margin Right', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [					
							'px' => [
								'min' => 0,
								'max' => 100,
							],
						],
						'default' => [
							'unit' => 'px',
							'size' => 30,
						],
						'selectors' => [
							'.tf-posts-wrap .tf-posts.list .blog-post .featured-post' => 'margin-right: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
		                    'posts_layout_type'	=> 'list',
		                ],
					]
				);
			}

			$this->add_control( 
				'heading_content',
				[
					'label' => esc_html__( 'Content', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);	

			$this->add_control( 
				'show_title',
				[
					'label' => esc_html__( 'Show Title', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'show_excerpt',
				[
					'label' => esc_html__( 'Show Excerpt', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'excerpt_lenght',
				[
					'label' => esc_html__( 'Excerpt Length', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 500,
					'step' => 1,
					'default' => 30,
					'condition' => [
						'show_excerpt' => 'yes'
					],
				]
			);

			$this->add_control( 
				'heading_button',
				[
					'label' => esc_html__( 'Button', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
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

			$this->add_control( 
				'heading_meta',
				[
					'label' => esc_html__( 'Meta', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'show_meta',
				[
					'label' => esc_html__( 'Show Meta', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'meta_position',
				[
					'label' => esc_html__( 'Meta Position', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'top',
					'options' => [
						'top'  => esc_html__( 'Before Title', 'themesflat-addons' ),
						'bottom' => esc_html__( 'After Title', 'themesflat-addons' ),
					],
					'condition' => [
	                    'show_meta'	=> 'yes',
	                ],
				]
			);

			$this->add_control( 
				'show_author',
				[
					'label' => esc_html__( 'Show Author', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
	                    'show_meta'	=> 'yes',
	                ],
				]
			);

			$this->add_control( 
				'show_category',
				[
					'label' => esc_html__( 'Show Category', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
	                    'show_meta'	=> 'yes',
	                ],
				]
			);

			$this->add_control( 
				'show_date',
				[
					'label' => esc_html__( 'Show Date', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
	                    'show_meta'	=> 'yes',
	                ],
				]
			);

			$this->add_control( 
				'show_comment',
				[
					'label' => esc_html__( 'Show Comment', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
	                    'show_meta'	=> 'yes',
	                ],
				]
			);        

			$this->end_controls_section();
        // /.End Layout

		// Start Carousel        
			$this->start_controls_section( 
				'section_posts_carousel',
	            [
	                'label' => esc_html__('Carousel', 'themesflat-addons'),
	            ]
	        );	

	        $this->add_control( 
				'carousel',
				[
					'label' => esc_html__( 'Carousel', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Off', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'no',
					'condition' => [
						'posts_layout_type!' => 'masonry',
					],
				]
			);        

			$this->add_control( 
				'carousel_loop',
				[
					'label' => esc_html__( 'Loop', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Off', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
				'carousel_auto',
				[
					'label' => esc_html__( 'Auto Play', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'On', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Off', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);	

			$this->add_control(
				'carousel_spacer',
				[
					'label' => esc_html__( 'Spacer', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::NUMBER,
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'default' => 30,
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_desk',
				[
					'label' => esc_html__( 'Columns Desktop', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '2',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-addons' ),
						'2' => esc_html__( '2', 'themesflat-addons' ),
						'3' => esc_html__( '3', 'themesflat-addons' ),
						'4' => esc_html__( '4', 'themesflat-addons' ),
						'5' => esc_html__( '5', 'themesflat-addons' ),
						'6' => esc_html__( '6', 'themesflat-addons' ),
					],
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_tablet',
				[
					'label' => esc_html__( 'Columns Tablet', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-addons' ),
						'2' => esc_html__( '2', 'themesflat-addons' ),
						'3' => esc_html__( '3', 'themesflat-addons' ),
						'4' => esc_html__( '4', 'themesflat-addons' ),
						'5' => esc_html__( '5', 'themesflat-addons' ),
						'6' => esc_html__( '6', 'themesflat-addons' ),
					],
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);

			$this->add_control( 
	        	'carousel_column_mobile',
				[
					'label' => esc_html__( 'Columns Mobile', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => '1',
					'options' => [
						'1' => esc_html__( '1', 'themesflat-addons' ),
						'2' => esc_html__( '2', 'themesflat-addons' ),
						'3' => esc_html__( '3', 'themesflat-addons' ),
						'4' => esc_html__( '4', 'themesflat-addons' ),
						'5' => esc_html__( '5', 'themesflat-addons' ),
						'6' => esc_html__( '6', 'themesflat-addons' ),
					],
					'condition' => [
						'carousel' => 'yes',
					],
				]
			);	

			$this->add_control( 
				'carousel_arrow',
				[
					'label' => esc_html__( 'Arrow', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
					'condition' => [
						'carousel' => 'yes',
					],
					'description'	=> 'Just show when you have two slide',
					'separator' => 'before',
				]
			);

			$this->add_control( 
				'carousel_prev_icon', [
	                'label' => esc_html__( 'Prev Icon', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fas fa-chevron-left',
	                'include' => [
						'fas fa-angle-double-left',
						'fas fa-angle-left',
						'fas fa-chevron-left',
						'fas fa-arrow-left',
					],  
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	    	$this->add_control( 
	    		'carousel_next_icon', [
	                'label' => esc_html__( 'Next Icon', 'themesflat-addons' ),
	                'type' => \Elementor\Controls_Manager::ICON,
	                'default' => 'fas fa-chevron-right',
	                'include' => [
						'fas fa-angle-double-right',
						'fas fa-angle-right',
						'fas fa-chevron-right',
						'fas fa-arrow-right',
					], 
	                'condition' => [
	                	'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
	            ]
	        );

	        $this->add_responsive_control( 
	        	'carousel_arrow_fontsize',
				[
					'label' => esc_html__( 'Font Size', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 20,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'font-size: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'w_size_carousel_arrow',
				[
					'label' => esc_html__( 'Width', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 70,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'width: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'h_size_carousel_arrow',
				[
					'label' => esc_html__( 'Height', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 200,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 70,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);	

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_prev',
				[
					'label' => esc_html__( 'Horizontal Position Previous', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_horizontal_position_next',
				[
					'label' => esc_html__( 'Horizontal Position Next', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'right: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_arrow_vertical_position',
				[
					'label' => esc_html__( 'Vertical Position', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -1000,
							'max' => 1000,
							'step' => 1,
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
						'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'top: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_arrow' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_arrow_tabs',
				[
					'condition' => [
		                'carousel_arrow' => 'yes',
		                'carousel' => 'yes',
		            ]
				] );
				$this->start_controls_tab( 
					'carousel_arrow_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
				);
				$this->add_control( 
					'carousel_arrow_color',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->add_control( 
		        	'carousel_arrow_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#0080f0',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );			        
		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border',
						'label' => esc_html__( 'Border', 'themesflat-addons' ),
						'selector' => '{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_arrow_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius Previous', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->add_responsive_control( 
					'carousel_arrow_next_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius Next', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->end_controls_tab();
		        $this->start_controls_tab( 
			    	'carousel_arrow_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					]
				);
		    	$this->add_control( 
		    		'carousel_arrow_color_hover',
		            [
		                'label' => esc_html__( 'Color', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#ffffff',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next:hover' => 'color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->add_control( 
		        	'carousel_arrow_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#222222',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next:hover' => 'background-color: {{VALUE}};',
						],
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_arrow_border_hover',
						'label' => esc_html__( 'Border', 'themesflat-addons' ),
						'selector' => '{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next:hover',
						'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_arrow_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius Previous', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts-wrap .owl-nav .owl-prev:hover, {{WRAPPER}} .tf-posts-wrap .owl-nav .owl-next:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_arrow' => 'yes',
		                ]
		            ]
		        );
	       	$this->end_controls_tab();
	        $this->end_controls_tabs();

			$this->add_control( 
				'carousel_bullets',
	            [
	                'label'         => esc_html__( 'Bullets', 'themesflat-addons' ),
	                'type'          => \Elementor\Controls_Manager::SWITCHER,
	                'label_on'      => esc_html__( 'Show', 'themesflat-addons' ),
	                'label_off'     => esc_html__( 'Hide', 'themesflat-addons' ),
	                'return_value'  => 'yes',
	                'default'       => 'yes',
	                'condition' => [
						'carousel' => 'yes',
	                ],
	                'separator' => 'before',
	            ]
	        );	

	        $this->add_responsive_control( 
	        	'w_size_carousel_bullets',
					[
						'label' => esc_html__( 'Width', 'themesflat-addons' ),
						'type' => \Elementor\Controls_Manager::SLIDER,
						'size_units' => [ 'px' ],
						'range' => [
							'px' => [
								'min' => 0,
								'max' => 100,
								'step' => 1,
							]
						],
						'default' => [
							'unit' => 'px',
							'size' => 10,
						],
						'selectors' => [
							'{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot' => 'width: {{SIZE}}{{UNIT}};',
						],
						'condition' => [
							'carousel' => 'yes',
		                    'carousel_bullets' => 'yes',
		                ]
					]
			);

			$this->add_responsive_control( 
				'h_size_carousel_bullets',
				[
					'label' => esc_html__( 'Height', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 100,
							'step' => 1,
						]
					],
					'default' => [
						'unit' => 'px',
						'size' => 10,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_horizontal_position',
				[
					'label' => esc_html__( 'Horizonta Offset', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 2000,
							'step' => 1,
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
						'{{WRAPPER}} .tf-posts-wrap .owl-dots' => 'left: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->add_responsive_control( 
				'carousel_bullets_vertical_position',
				[
					'label' => esc_html__( 'Vertical Offset', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px', '%' ],
					'range' => [
						'px' => [
							'min' => -200,
							'max' => 1000,
							'step' => 1,
						],
						'%' => [
							'min' => 0,
							'max' => 100,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 0,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .owl-dots' => 'bottom: {{SIZE}}{{UNIT}};',
					],
					'condition' => [
						'carousel' => 'yes',
	                    'carousel_bullets' => 'yes',
	                ]
				]
			);

			$this->start_controls_tabs( 
				'carousel_bullets_tabs',
					[
						'condition' => [
							'carousel' => 'yes',
		                    'carousel_bullets' => 'yes',
		                ]
					] );
				$this->start_controls_tab( 
					'carousel_bullets_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),						
					]
				);
				$this->add_control( 
					'carousel_bullets_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#0080f0',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );			         
		        $this->add_group_control( 
		        	\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border',
						'label' => esc_html__( 'Border', 'themesflat-addons' ),
						'selector' => '{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot',
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_bullets_border_radius',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );
			    $this->end_controls_tab();
		        $this->start_controls_tab( 
		        	'carousel_bullets_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
				]
				); 
	        	$this->add_control( 
	        		'carousel_bullets_hover_bg_color',
		            [
		                'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::COLOR,
		                'default' => '#000000',
		                'selectors' => [
							'{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot.active' => 'background-color: {{VALUE}}',
						],
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        ); 
	        	$this->add_group_control( 
	        		\Elementor\Group_Control_Border::get_type(),
					[
						'name' => 'carousel_bullets_border_hover',
						'label' => esc_html__( 'Border', 'themesflat-addons' ),
						'selector' => '{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot.active',
						'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
					]
				);
				$this->add_responsive_control( 
					'carousel_bullets_border_radius_hover',
		            [
		                'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
		                'type' => \Elementor\Controls_Manager::DIMENSIONS,
		                'size_units' => [ 'px', '%', 'em' ],
		                'selectors' => [
		                    '{{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot:hover, {{WRAPPER}} .tf-posts-wrap .owl-dots .owl-dot.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		                ],
		                'condition' => [
		                    'carousel_bullets' => 'yes',
		                ]
		            ]
		        );
				$this->end_controls_tab();
		    $this->end_controls_tabs();

	        $this->end_controls_section();
        // /.End Carousel

        // Start Pagination        
			$this->start_controls_section( 
				'section_posts_pagination',
	            [
	                'label' => esc_html__('Pagination', 'themesflat-addons'),
	            ]            
	        );

	        $this->add_control( 
				'pagination',
				[
					'label' => esc_html__( 'Pagination', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'no',
				]
			); 

	        $this->end_controls_section();
        // /.End Pagination		

        // Start General Style 
	        $this->start_controls_section( 
	        	'section_style_general',
	            [
	                'label' => esc_html__( 'General', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_responsive_control( 
	        	'padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .column .blog-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
					'default' => [
						'top' => '10',
						'right' => '10',
						'bottom' => '10',
						'left' => '10',
						'unit' => 'px',
						'isLinked' => 'true',
					],
				]
			);	

			$this->add_responsive_control( 
				'margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap',
				]
			);			

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post',
				]
			);    

			$this->add_responsive_control( 
				'border_radius',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_control( 
				'background_color',
				[
					'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post' => 'background-color: {{VALUE}}',
					],
				]
			);  

			$this->start_controls_tabs( 
				'box_shadow_tabs' 
				);

	        	$this->start_controls_tab( 'box_shadow_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );

	        		$this->add_group_control( 
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'box_shadow',
							'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post',
						]
					);
					
				$this->end_controls_tab();

				$this->start_controls_tab( 'box_shadow_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_group_control( 
						\Elementor\Group_Control_Box_Shadow::get_type(),
						[
							'name' => 'box_shadow_hover',
							'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post:hover',
						]
					);
					
				$this->end_controls_tab();

			$this->end_controls_tabs(); 

			$this->add_control( 
				'content_item_post',
				[
					'label' => esc_html__( 'Content Item Post', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			);				

			$this->add_responsive_control( 
	        	'padding_content_item_post',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'default' => [
						'top' => '20',
						'right' => '0',
						'bottom' => '20',
						'left' => '0',
						'unit' => 'px',
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);	

			$this->add_responsive_control( 
				'margin_content_item_post',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_content_item_post',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .content',
				]
			); 

			$this->add_responsive_control( 
				'border_radius_content_item_post',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .content' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 
				'bgcolor_content_item_post_tabs' 
				);

	        	$this->start_controls_tab( 'bgcolor_content_item_post_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );

	        		$this->add_control( 
						'bgcolor_content_item_post',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .content' => 'background-color: {{VALUE}}',
							],
						]
					);
					
				$this->end_controls_tab();

				$this->start_controls_tab( 'bgcolor_content_item_post_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'bgcolor_content_item_post_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .content:hover' => 'background-color: {{VALUE}}',
							],
						]
					);
					
				$this->end_controls_tab();

			$this->end_controls_tabs(); 
	        
	        $this->end_controls_section();    
	    // /.End General Style

	    // Start Image Style 
	        $this->start_controls_section( 
	        	'section_style_image',
	            [
	                'label' => esc_html__( 'Image', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	        

	        $this->add_responsive_control( 
	        	'padding_image',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .featured-post' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					]
				]
			);	

			$this->add_responsive_control( 
				'margin_image',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' ],				
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .featured-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);  

			$this->add_group_control( 
				\Elementor\Group_Control_Box_Shadow::get_type(),
				[
					'name' => 'box_shadow_image',
					'label' => esc_html__( 'Box Shadow', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .featured-post',
				]
			); 

			$this->add_group_control( 
				\Elementor\Group_Control_Border::get_type(),
				[
					'name' => 'border_image',
					'label' => esc_html__( 'Border', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .featured-post',
				]
			); 

			$this->add_responsive_control( 
				'border_radius_image',
				[
					'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px' , '%' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .featured-post, {{WRAPPER}} .tf-posts-wrap .tf-posts .featured-post img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			); 

			$this->add_control( 
				'heading_overlay',
				[
					'label' => esc_html__( 'Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::HEADING,
					'separator' => 'before',
				]
			); 

			$this->add_control( 
				'show_overlay',
				[
					'label' => esc_html__( 'Overlay', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SWITCHER,
					'label_on' => esc_html__( 'Show', 'themesflat-addons' ),
					'label_off' => esc_html__( 'Hide', 'themesflat-addons' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control( 
				'overlay_bgcolor',
				[
					'label' => esc_html__( 'Overlay Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(0, 0, 0, 0.5)',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .featured-post .overlay' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'show_overlay' => 'yes',
					],
				]
			); 

			$this->add_control( 
				'overlay_icon',
				[
					'label' => esc_html__( 'Icon Button', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICONS,
					'fa4compatibility' => 'icon_ol',
					'default' => [
						'value' => 'fas fa-plus',
						'library' => 'fa-solid',
					],
					'condition' => [
	                    'show_overlay'	=> 'yes',
	                ],
				]
			); 

			$this->add_control( 
				'overlay_color_icon',
				[
					'label' => esc_html__( 'Icon Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .featured-post .overlay i, {{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .featured-post .overlay svg' => 'color: {{VALUE}}; fill: {{VALUE}}',
					],
					'condition' => [
						'show_overlay' => 'yes',
					],
				]
			);  

			$this->add_control( 
				'overlay_icon_size',
				[
					'label' => esc_html__( 'Icon Size', 'themesflat-addons' ),
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
						'size' => 30,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .featured-post .overlay i' => 'font-size: {{SIZE}}{{UNIT}};',
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .featured-post .overlay svg' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);        
		        
	        $this->end_controls_section();    
	    // /.End Image Style

        // Start Title Style 
		    $this->start_controls_section( 
		    	'section_style_title',
	            [
	                'label' => esc_html__( 'Title', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );	

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'title_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .title',
				]
			);

			$this->add_control( 
				'title_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .title a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'title_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(0, 0, 0, 0.5)',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .title a:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'title_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		    $this->end_controls_section();
	    // /.End Title Style

	    // Start Text Style 
		    $this->start_controls_section( 
		    	'section_style_text',
	            [
	                'label' => esc_html__( 'Text', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'text_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .content-post',
				]
			);

			$this->add_control( 
				'text_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .content-post' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'text_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .content-post' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

		    $this->end_controls_section();
	    // /.End Text Style

	    // Start Button Style 
		    $this->start_controls_section( 
		    	'section_style_button',
	            [
	                'label' => esc_html__( 'Button', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'button_align',
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
					'default' => 'left',
				]
			);

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'button_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button',
				]
			);

			$this->add_responsive_control( 
				'button_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);		

			$this->add_responsive_control( 
				'button_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);

			$this->start_controls_tabs( 
				'button_style_tabs' 
				);

	        	$this->start_controls_tab( 'button_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );	
	        		$this->add_control( 
						'button_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button',
						]
					);

					$this->add_control( 
						'button_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);

					$this->add_control( 
						'heading_button_icon',
						[
							'label' => esc_html__( 'Icon', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::HEADING,
							'separator' => 'before',
						]
					); 

					$this->add_control( 
						'icon_button',
						[
							'label' => esc_html__( 'Icon Button', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::ICONS,
							'fa4compatibility' => 'icon_bt',
							'default' => [
								'value' => 'fas fa-angle-double-right',
								'library' => 'fa-solid',
							],				
						]
					);

					$this->add_control( 
						'button_icon_size',
						[
							'label' => esc_html__( 'Icon Size', 'themesflat-addons' ),
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
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button i' => 'font-size: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button svg' => 'width: {{SIZE}}{{UNIT}};',
							],
						]
					); 

					$this->add_control( 
						'button_icon_position',
						[
							'label' => esc_html__( 'Icon Position', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::SELECT,
							'default' => 'bt_icon_after',
							'options' => [
								'bt_icon_before'  => esc_html__( 'Before', 'themesflat-addons' ),
								'bt_icon_after' => esc_html__( 'After', 'themesflat-addons' ),
							],
						]
					);

					$this->add_control( 
						'button_icon_spacer',
						[
							'label' => esc_html__( 'Icon Spacer', 'themesflat-addons' ),
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
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_before i' => 'margin-right: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_before svg' => 'margin-right: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_after i' => 'margin-left: {{SIZE}}{{UNIT}};',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_after svg' => 'margin-left: {{SIZE}}{{UNIT}};',
								'body.rtl {{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_before i' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: 0px;',
								'body.rtl {{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_before svg' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: 0px;',
								'body.rtl {{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_after i' => 'margin-right: {{SIZE}}{{UNIT}};margin-left: 0px;',
								'body.rtl {{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button.bt_icon_after svg' => 'margin-right: {{SIZE}}{{UNIT}};margin-left: 0px;',
							],
						]
					);
					
				$this->end_controls_tab();

				$this->start_controls_tab( 'button_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'button_color_hover',
						[
							'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(0, 0, 0, 0.5)',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button:hover' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button:hover i' => 'color: {{VALUE}}',
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button:hover svg' => 'fill: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'button_bg_color_hover',
						[
							'label' => esc_html__( 'Background Color Hover', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button:hover' => 'background-color: {{VALUE}}',
							],
						]
					);

					$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'button_border_hover',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button:hover',
						]
					);

					$this->add_control( 
						'button_border_radius_hover',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .tf-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
					
				$this->end_controls_tab();

			$this->end_controls_tabs();

		    $this->end_controls_section();
	    // /.End Button Style

	    // Start Meta Style 
		    $this->start_controls_section( 
		    	'section_style_meta',
	            [
	                'label' => esc_html__( 'Meta', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

		    $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'meta_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta',
				]
			);

			$this->add_control( 
				'meta_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta' => 'color: {{VALUE}}',
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta a' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control( 
				'meta_color_hover',
				[
					'label' => esc_html__( 'Color Hover', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => 'rgba(0, 0, 0, 0.5)',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta a:hover' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'meta_spacer',
				[
					'label' => esc_html__( 'Spacer', 'themesflat-addons' ),
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
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta > li ' => 'margin-right: {{SIZE}}{{UNIT}};',
						'body.rtl {{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta > li ' => 'margin-left: {{SIZE}}{{UNIT}};margin-right: 0px;',
					],
				]
			);

			$this->add_control(
				'author_icon',
				[
					'label' => esc_html__( 'Author Icons', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICON,
					'include' => [
						'far fa-user',
						'far fa-user-circle',
						'fas fa-user',
						'fas fa-user-alt',
						'fas fa-user-circle',
					],
					'default' => '',
				]
			);

			$this->add_control(
				'category_icon',
				[
					'label' => esc_html__( 'Category Icons', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICON,
					'include' => [
						'far fa-folder',
						'far fa-folder-open',
						'fas fa-folder',
						'fas fa-folder-open',
					],
					'default' => '',
				]
			);

			$this->add_control(
				'date_icon',
				[
					'label' => esc_html__( 'Date Icons', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICON,
					'include' => [
						'far fa-calendar',
						'far fa-calendar-alt',
						'fas fa-calendar',
						'fas fa-calendar-alt',
						'far fa-clock',
						'fas fa-clock',
					],
					'default' => '',
				]
			);

			$this->add_control(
				'comments_icon',
				[
					'label' => esc_html__( 'Comments Icons', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::ICON,
					'include' => [
						'far fa-comment',
						'fas fa-comment',
						'far fa-comments',
						'fas fa-comments',
						'far fa-comment-alt',
						'fas fa-comment-alt',
						'far fa-comment-dots',
						'fas fa-comment-dots',
					],
					'default' => '',
				]
			);

			$this->add_control( 
				'meta_icon_color',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#000000',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta i' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'meta_spacer_icon',
				[
					'label' => esc_html__( 'Spacer Icon', 'themesflat-addons' ),
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
						'size' => 1,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta > li > i' => 'margin-right: {{SIZE}}{{UNIT}};',
						'body.rtl {{WRAPPER}} .tf-posts-wrap .tf-posts .blog-post .post-meta > li > i' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: 0px;',
					],
				]
			);

			$this->add_control( 
				'box_time_color',
				[
					'label' => esc_html__( 'Box Time Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .box-time a' => 'color: {{VALUE}}',
					],
					'separator' => 'before',
					'condition' => [
						'posts_layout_type'	=> 'grid',
						'grid_styles' => ['grid-styles-1','grid-styles-3'],
					],
				]
			);

			$this->add_control( 
				'box_time_background_color',
				[
					'label' => esc_html__( 'Box Time Background Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#d21e2b',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .box-time a' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'posts_layout_type'	=> 'grid',
						'grid_styles' => ['grid-styles-1','grid-styles-3'],
					],
				]
			);

			$this->add_control( 
				'box_time_color:hover',
				[
					'label' => esc_html__( 'Box Time Color Hover', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#ffffff',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .box-time a:hover' => 'color: {{VALUE}}',
					],
					'condition' => [
						'posts_layout_type'	=> 'grid',
						'grid_styles' => ['grid-styles-1','grid-styles-3'],
					],
				]
			);

			$this->add_control( 
				'box_time_background_color:hover',
				[
					'label' => esc_html__( 'Box Time Background Color Hover', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#222222',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .blog-post:hover .box-time a' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'posts_layout_type'	=> 'grid',
						'grid_styles' => ['grid-styles-1','grid-styles-3'],
					],
				]
			);

			$this->add_control( 
				'background_color_wrap_meta',
				[
					'label' => esc_html__( 'Background Color Wrap Meta', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap.grid-styles-2 .blog-post .wrap-featured-post .post-meta' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'posts_layout_type'	=> 'grid',
						'grid_styles' => ['grid-styles-1','grid-styles-3'],
					],
				]
			);

			$this->add_control( 
				'background_color_wrap_meta_hover',
				[
					'label' => esc_html__( 'Hover Background Color Wrap Meta', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '',
					'selectors' => [
						'{{WRAPPER}}  .tf-posts-wrap.grid-styles-2 .blog-post:hover .wrap-featured-post .post-meta' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'posts_layout_type'	=> 'grid',
						'grid_styles' => ['grid-styles-1','grid-styles-3'],
					],
				]
			);

	        $this->end_controls_section();
	    // /.End Meta Style

	    // Start Meta Style 
		    $this->start_controls_section( 
		    	'section_style_line',
	            [
	                'label' => esc_html__( 'Line', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	                'condition' => [
	                	'grid_styles' => 'grid-styles-3',
	                ],
	            ]
	        );

	        $this->add_control(
				'width_of_line',
				[
					'label' => __( 'Width', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 150,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 64,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap.grid-styles-3 .tf-posts .blog-post .content:after' => 'width: {{SIZE}}{{UNIT}};',
					],
				]
			);

			$this->add_control(
				'height_of_line',
				[
					'label' => __( 'Height', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 0,
							'max' => 20,
							'step' => 1,
						],
					],
					'default' => [
						'unit' => 'px',
						'size' => 5,
					],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap.grid-styles-3 .tf-posts .blog-post .content:after' => 'height: {{SIZE}}{{UNIT}};',
					],
				]
			);

		    $this->add_control( 
				'bg_color_of_line',
				[
					'label' => esc_html__( 'Color', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::COLOR,
					'default' => '#18ba60',
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap.grid-styles-3 .tf-posts .blog-post .content:after' => 'background-color: {{VALUE}}',
					],
				]
			);

	    	$this->end_controls_section();
	    // /.End Meta Style

	    // Start Pagination Style 
		    $this->start_controls_section( 
		    	'section_style_pagination',
	            [
	                'label' => esc_html__( 'Pagination', 'themesflat-addons' ),
	                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
	            ]
	        );

	        $this->add_control(
				'pagination_style',
				[
					'label' => esc_html__( 'Style', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::SELECT,
					'default' => 'numeric-link',
					'options' => [
						'numeric-link' => esc_html__( 'Numeric & Page', 'themesflat-addons' ),
						'link'  => esc_html__( 'Page', 'themesflat-addons' ),
						'numeric' => esc_html__( 'Numeric', 'themesflat-addons' ),					
						'loadmore' => esc_html__( 'Load More', 'themesflat-addons' ),
					],
				]
			);

			$this->add_control(
				'pagination_align',
				[
					'label' =>esc_html__( 'Alignment', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::CHOOSE,
					'options' => [
						'left'    => [
							'title' =>esc_html__( 'Left', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-left',
						],
						'center' => [
							'title' =>esc_html__( 'Center', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-center',
						],
						'right' => [
							'title' =>esc_html__( 'Right', 'themesflat-addons' ),
							'icon' => 'eicon-text-align-right',
						],
					],
					'default' => 'left',
					'condition' => [
						'pagination_style' => 'numeric-link',
						'pagination_style' => 'numeric',
						'pagination_style' => 'loadmore',
					],
				]
			);

	        $this->add_group_control( 
	        	\Elementor\Group_Control_Typography::get_type(),
				[
					'name' => 'pagination_typography',
					'label' => esc_html__( 'Typography', 'themesflat-addons' ),
					'selector' => '{{WRAPPER}} .tf-posts-wrap .pagination a, {{WRAPPER}} .tf-posts-wrap .pagination span',
				]
			);

			$this->add_control( 
				'pagination_padding',
				[
					'label' => esc_html__( 'Padding', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .pagination a, {{WRAPPER}} .tf-posts-wrap .pagination span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);		

			$this->add_control( 
				'pagination_margin',
				[
					'label' => esc_html__( 'Margin', 'themesflat-addons' ),
					'type' => \Elementor\Controls_Manager::DIMENSIONS,
					'size_units' => [ 'px', 'em' ],
					'selectors' => [
						'{{WRAPPER}} .tf-posts-wrap .pagination a, {{WRAPPER}} .tf-posts-wrap .pagination span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					],
				]
			);    		        

	        $this->start_controls_tabs( 'pagination_style_tabs' );
	        	$this->start_controls_tab( 'pagination_style_normal_tab',
					[
						'label' => esc_html__( 'Normal', 'themesflat-addons' ),
					] );

	        		$this->add_control( 
						'pagination_color',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '#000000',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .pagination a' => 'color: {{VALUE}}',
							],
						]
					);

					$this->add_control( 
						'pagination_bgcolor',
						[
							'label' => esc_html__( 'Backgound Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .pagination a' => 'background-color: {{VALUE}}',
							],
						]
					);

	        		$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'pagination_border',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-posts-wrap .pagination a, {{WRAPPER}} .tf-posts-wrap .pagination span',
						]
					);

					$this->add_control( 
						'pagination_border_radius',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .pagination a, {{WRAPPER}} .tf-posts-wrap .pagination span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
				$this->start_controls_tab( 'pagination_style_hover_tab',
					[
						'label' => esc_html__( 'Hover', 'themesflat-addons' ),
					] );

					$this->add_control( 
						'pagination_color_hover',
						[
							'label' => esc_html__( 'Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => 'rgba(0, 0, 0, 0.5)',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .pagination a:hover, {{WRAPPER}} .tf-posts-wrap .pagination span.current' => 'color: {{VALUE}};',
							],
						]
					);

					$this->add_control( 
						'pagination_bgcolor_hover',
						[
							'label' => esc_html__( 'Background Color', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::COLOR,
							'default' => '',
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .pagination a:hover, {{WRAPPER}} .tf-posts-wrap .pagination span.current' => 'background-color: {{VALUE}};',
							],
						]
					);

					$this->add_group_control( 
						\Elementor\Group_Control_Border::get_type(),
						[
							'name' => 'pagination_border_hover',
							'label' => esc_html__( 'Border', 'themesflat-addons' ),
							'selector' => '{{WRAPPER}} .tf-posts-wrap .pagination a:hover, {{WRAPPER}} .tf-posts-wrap .pagination span.current',
						]
					);

					$this->add_control( 
						'pagination_border_radius_hover',
						[
							'label' => esc_html__( 'Border Radius', 'themesflat-addons' ),
							'type' => \Elementor\Controls_Manager::DIMENSIONS,
							'size_units' => [ 'px', 'em', '%' ],
							'selectors' => [
								'{{WRAPPER}} .tf-posts-wrap .pagination a:hover, {{WRAPPER}} .tf-posts-wrap .pagination span.current' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
							],
						]
					);
				$this->end_controls_tab();
			$this->end_controls_tabs();

	        $this->end_controls_section();
	    // /.End Pagination Style
	}

	protected function render($instance = []) {
		$settings = $this->get_settings_for_display();

		$has_carousel = $class_carousel = '';
		if ( $settings['carousel'] == 'yes' ) {
			$has_carousel = 'has-carousel';
			$class_carousel = 'owl-carousel owl-theme';
		}
		$carousel_arrow = 'no-arrow';
		if ( $settings['carousel_arrow'] == 'yes' ) {
			$carousel_arrow = 'has-arrow';
		}

		$carousel_bullets = 'no-bullets';
		if ( $settings['carousel_bullets'] == 'yes' ) {
			$carousel_bullets = 'has-bullets';
		}
		
		$responsive_img = '';
		if ( $settings['posts_layout_type'] == 'list' && $settings['featured_width_mobi_image_full'] == 'yes' ) {
			$responsive_img = 'mobi-featured-post-full';
		}

		$this->add_render_attribute( 'tf_posts_wrap', ['id' => "tf-posts-{$this->get_id()}", 'class' => ['tf-posts-wrap', $settings['posts_layout'], $settings['posts_layout_tablet'], $settings['posts_layout_mobile'], $has_carousel, $carousel_arrow, $carousel_bullets, $settings['grid_styles'], 'featured-post-'.$settings['image_position'], $responsive_img ], 'data-tabid' => $this->get_id()] );

		if ( get_query_var('paged') ) {
           $paged = get_query_var('paged');
        } elseif ( get_query_var('page') ) {
           $paged = get_query_var('page');
        } else {
           $paged = 1;
        }
		$query_args = array(
            'post_type' => $settings['posts_type'],
            'posts_per_page' => $settings['posts_per_page'],
            'paged'     => $paged
        );
        if (! empty( $settings['posts_categories'] )) {
        	$query_args['category_name'] = implode(',', $settings['posts_categories']);
        }        
        if ( ! empty( $settings['exclude'] ) ) {				
			if ( ! is_array( $settings['exclude'] ) )
				$exclude = explode( ',', $settings['exclude'] );

			$query_args['post__not_in'] = $exclude;
		}
		$query_args['orderby'] = $settings['order_by'];
		$query_args['order'] = $settings['order'];			
		
		$migrated = isset( $settings['__fa4_migrated']['icon_button'] );	
		$is_new = empty( $settings['icon_bt'] );

		$migrated_ol = isset( $settings['__fa4_migrated']['overlay_icon'] );	
		$is_new_ol = empty( $settings['icon_ol'] );

		$author_icon = ( !empty($settings['author_icon']) ) ? '<i class="' . $settings['author_icon'] . '" aria-hidden="true"></i>' : '' ;

		$category_icon = ( !empty($settings['category_icon']) ) ? '<i class="' . $settings['category_icon'] . '" aria-hidden="true"></i>' : '' ;

		$date_icon = ( !empty($settings['date_icon']) ) ? '<i class="' . $settings['date_icon'] . '" aria-hidden="true"></i>' : '' ;

		$comments_icon = ( !empty($settings['comments_icon']) ) ? '<i class="' . $settings['comments_icon'] . '" aria-hidden="true"></i>' : '' ;
		
		$rtl = 'no';
		if ( is_rtl() ) {
			$rtl = 'yes';
		}

		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) : ?>
		<div <?php echo $this->get_render_attribute_string('tf_posts_wrap'); ?> data-loop="<?php echo esc_attr($settings['carousel_loop']); ?>" data-auto="<?php echo esc_attr($settings['carousel_auto']); ?>" data-column="<?php echo esc_attr($settings['carousel_column_desk']); ?>" data-column2="<?php echo esc_attr($settings['carousel_column_tablet']); ?>" data-column3="<?php echo esc_attr($settings['carousel_column_mobile']); ?>" data-spacer="<?php echo esc_attr($settings['carousel_spacer']); ?>" data-prev_icon="<?php echo esc_attr($settings['carousel_prev_icon']) ?>" data-next_icon="<?php echo esc_attr($settings['carousel_next_icon']) ?>" data-rtl="<?php echo esc_attr($rtl) ?>" >			
			<div class="tf-posts <?php echo esc_attr($class_carousel); ?> <?php echo esc_attr($settings['posts_layout_type']) ?>">	
				<?php if ($settings['posts_layout_type'] == 'masonry'): ?>
					<div class="grid-sizer"></div>
				<?php endif ?>						
				<?php while ( $query->have_posts() ) : $query->the_post();
					$get_post_thumbnail = get_post_thumbnail_id();
					?>
				<div class="column">
					<div class="entry blog-post">
						<?php if ( $settings['show_image'] == 'yes' && $settings['image_position'] == 'top' ): ?>
							<?php if ( $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-1' || $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-2' || $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-3' ): ?>
							<div class="wrap-featured-post">
							<?php endif; ?>
								<div class="featured-post">
									<img src="<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_post_thumbnail, 'thumbnail', $settings ); ?>" alt="image">
									<?php if( $settings['show_overlay'] == 'yes' ): ?>
									<a href="<?php echo esc_url( get_permalink() ) ?>" class="overlay">
										<?php 
										if ( $is_new_ol || $migrated_ol ) {
											if ( isset($settings['overlay_icon']['value']['url']) ) {
												\Elementor\Icons_Manager::render_icon( $settings['overlay_icon'], [ 'aria-hidden' => 'true' ] );
											}else {
												echo '<i class="' . esc_attr($settings['overlay_icon']['value']) . '" aria-hidden="true"></i>';
											}									
										} else {
											echo '<i class="' . esc_attr($settings['icon_ol']) . ' aria-hidden="true""></i>';
										}
										?>
									</a>
									<?php endif; ?>									
								</div>
								<?php if ( $settings['show_date'] == 'yes' ): ?>
									<div class="box-time">
										<?php
										$archive_year  = get_the_time('Y'); 
								        $archive_month = get_the_time('m'); 
								        $archive_day   = get_the_time('d');
										?>
										<a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>">
											<span class="day"><?php echo get_the_date('d'); ?></span>
											<span class="month"><?php echo get_the_date('M'); ?></span>
										</a>
									</div>
								<?php endif; ?>
								<?php if ( $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-2' || $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-3' ): ?>
									<?php if ( $settings['show_meta'] == 'yes' ): ?>
										<?php if ( $settings['meta_position'] == 'top' ): ?>
											<ul class="post-meta">
												<?php if ( $settings['show_author'] == 'yes' ): ?>
												<li class="post-author">
													<?php print($author_icon); ?>
													<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
												</li>
												<?php endif; ?>

												<?php if ( $settings['show_category'] == 'yes' ): ?>
												<li class="post-category">
													<?php 
													if ( get_post_type() == 'portfolios' ) {
														echo the_terms( get_the_ID(), 'portfolios_category', '', ' / ', '' );
													}else {
														print($category_icon); ?><?php echo get_the_category_list(', ');
													}											 
													?>												
												</li>
												<?php endif; ?>

												<?php if ( $settings['show_date'] == 'yes' ): ?>
												<li class="post-date">
													<?php
													$archive_year  = get_the_time('Y'); 
											        $archive_month = get_the_time('m'); 
											        $archive_day   = get_the_time('d');
													?>
													<?php print($date_icon); ?>
													<a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>

												</li>										
												<?php endif; ?>

												<?php if ( $settings['show_comment'] == 'yes' ): ?>
												<li class="post-comments">
													<?php print($comments_icon); ?>
													<?php echo comments_popup_link( esc_html__( '(0)', 'themesflat-addons' ), esc_html__(  '(1)', 'themesflat-addons' ), esc_html__( '(%)', 'themesflat-addons' ) ); ?>											
													</li>
												<?php endif; ?>
											</ul>
										<?php endif; ?>						
									<?php endif; ?>
								<?php endif; ?>

							<?php if ( $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-1' || $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-2' || $settings['posts_layout_type'] == 'grid' && $settings['grid_styles'] == 'grid-styles-3' ): ?>
							</div>
							<?php endif; ?>
						<?php endif; ?>
						<div class="content">
							<?php if ( $settings['show_meta'] == 'yes' ): ?>
								<?php if ( $settings['meta_position'] == 'top' ): ?>
									<ul class="post-meta">
										<?php if ( $settings['show_author'] == 'yes' ): ?>
										<li class="post-author">
											<?php print($author_icon); ?>
											<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
										</li>
										<?php endif; ?>

										<?php if ( $settings['show_category'] == 'yes' ): ?>
										<li class="post-category">
											<?php 
											if ( get_post_type() == 'portfolios' ) {
												echo the_terms( get_the_ID(), 'portfolios_category', '', ' / ', '' );
											}else {
												print($category_icon); ?><?php echo get_the_category_list(', ');
											}											 
											?>												
										</li>
										<?php endif; ?>

										<?php if ( $settings['show_date'] == 'yes' ): ?>
										<li class="post-date">
											<?php
											$archive_year  = get_the_time('Y'); 
									        $archive_month = get_the_time('m'); 
									        $archive_day   = get_the_time('d');
											?>
											<?php print($date_icon); ?>
											<a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>

										</li>										
										<?php endif; ?>

										<?php if ( $settings['show_comment'] == 'yes' ): ?>
										<li class="post-comments">
											<?php print($comments_icon); ?>
											<?php echo comments_popup_link( esc_html__( 'Comment (0)', 'themesflat-addons' ), esc_html__(  'Comment (1)', 'themesflat-addons' ), esc_html__( 'Comments (%)', 'themesflat-addons' ) ); ?>											
											</li>
										<?php endif; ?>
									</ul>
								<?php endif; ?>						
							<?php endif; ?>

							<?php if ( $settings['show_title'] == 'yes' ): ?>
								<h2 class="title"><a href="<?php echo esc_url( get_the_permalink() ); ?>" title="<?php echo esc_attr( get_the_title() ); ?>"><?php echo get_the_title(); ?></a></h2>
							<?php endif; ?>

							<?php if ( $settings['show_meta'] == 'yes' ): ?>
								<?php if ( $settings['meta_position'] == 'bottom' ): ?>
									<ul class="post-meta">
										<?php if ( $settings['show_author'] == 'yes' ): ?>
										<li class="post-author">
											<?php print($author_icon); ?>
											<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
										</li>
										<?php endif; ?>

										<?php if ( $settings['show_category'] == 'yes' ): ?>
										<li class="post-category">
											<?php 
											if ( get_post_type() == 'portfolios' ) {
												echo the_terms( get_the_ID(), 'portfolios_category', '', ' / ', '' );
											}else {
												print($category_icon); ?><?php echo get_the_category_list(', ');
											}											 
											?>												
										</li>
										<?php endif; ?>

										<?php if ( $settings['show_date'] == 'yes' ): ?>
										<li class="post-date">
											<?php
											$archive_year  = get_the_time('Y'); 
									        $archive_month = get_the_time('m'); 
									        $archive_day   = get_the_time('d');
											?>
											<?php print($date_icon); ?>
											<a href="<?php echo get_day_link($archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date(); ?></a>
										</li>
										<?php endif; ?>

										<?php if ( $settings['show_comment'] == 'yes' ): ?>
										<li class="post-comments">
											<?php print($comments_icon); ?>
											<?php echo comments_popup_link( esc_html__( 'Comment (0)', 'themesflat-addons' ), esc_html__(  'Comment (1)', 'themesflat-addons' ), esc_html__( 'Comments (%)', 'themesflat-addons' ) ); ?>											
											</li>
										<?php endif; ?>
									</ul>
								<?php endif; ?>						
							<?php endif; ?>

							<?php if ( $settings['show_image'] == 'yes' && $settings['image_position'] == 'middle' ): ?>
								<div class="featured-post">
									<img src="<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_post_thumbnail, 'thumbnail', $settings ); ?>" alt="image">
									<?php if( $settings['show_overlay'] == 'yes' ): ?>
									<a href="<?php echo esc_url( get_permalink() ) ?>" class="overlay">
										<?php 
										if ( $is_new_ol || $migrated_ol ) {
											if ( isset($settings['overlay_icon']['value']['url']) ) {
												\Elementor\Icons_Manager::render_icon( $settings['overlay_icon'], [ 'aria-hidden' => 'true' ] );
											}else {
												echo '<i class="' . esc_attr($settings['overlay_icon']['value']) . '" aria-hidden="true"></i>';
											}									
										} else {
											echo '<i class="' . esc_attr($settings['icon_ol']) . ' aria-hidden="true""></i>';
										}
										?>
									</a>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if ( $settings['show_excerpt'] == 'yes' ): ?>
								<div class="content-post"><?php echo wp_trim_words( get_the_content(), $settings['excerpt_lenght'], '&hellip;' ); ?></div>
							<?php endif; ?>
							
							<?php if ( $settings['show_button'] == 'yes' ): ?>
								<div class="tf-button-container <?php echo esc_attr($settings['button_align']); ?>">
									<a href="<?php echo esc_url( get_permalink() ) ?>" class="tf-button <?php echo esc_attr($settings['button_icon_position']); ?>">
										<?php
										if ($settings['button_icon_position'] == 'bt_icon_before' ) {
											if ( $is_new || $migrated ) {
												if ( isset($settings['icon_button']['value']['url']) ) {
													\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
												}else {
													echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
												}									
											} else {
												echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
											}
										}

										if ( $settings['button_text'] != '' ) {
											echo esc_attr( $settings['button_text'] );
										}

										if ($settings['button_icon_position'] == 'bt_icon_after' ) {
											if ( $is_new || $migrated ) {
												if ( isset($settings['icon_button']['value']['url']) ) {
													\Elementor\Icons_Manager::render_icon( $settings['icon_button'], [ 'aria-hidden' => 'true' ] );
												}else {
													echo '<i class="' . esc_attr($settings['icon_button']['value']) . '" aria-hidden="true"></i>';
												}									
											} else {
												echo '<i class="' . esc_attr($settings['icon_bt']) . ' aria-hidden="true""></i>';
											}
										}

										?> 
									</a>
								</div>
							<?php endif; ?>						
						</div>
						<?php if ( $settings['show_image'] == 'yes' && $settings['image_position'] == 'bottom' ): ?>
							<div class="featured-post">
								<img src="<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_src( $get_post_thumbnail, 'thumbnail', $settings ); ?>" alt="image">
								<?php if( $settings['show_overlay'] == 'yes' ): ?>
								<a href="<?php echo esc_url( get_permalink() ) ?>" class="overlay">
									<?php 
									if ( $is_new_ol || $migrated_ol ) {
										if ( isset($settings['overlay_icon']['value']['url']) ) {
											\Elementor\Icons_Manager::render_icon( $settings['overlay_icon'], [ 'aria-hidden' => 'true' ] );
										}else {
											echo '<i class="' . esc_attr($settings['overlay_icon']['value']) . '" aria-hidden="true"></i>';
										}									
									} else {
										echo '<i class="' . esc_attr($settings['icon_ol']) . ' aria-hidden="true""></i>';
									}
									?>
								</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</div>

			<?php 	
			if( $settings['pagination'] == 'yes' ){
				tfpost_pagination($query, $paged, $settings['pagination_style'], $settings['pagination_align']);				
			}
			?>
		</div>

		<?php
		else:
			esc_html_e('No posts found', 'themesflat-addons');
		endif;		
		
	}

	

}