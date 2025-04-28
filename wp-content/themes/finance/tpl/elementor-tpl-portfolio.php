<?php
/*
Template Name: Elementor Portfolio
*/
get_header(); ?>
<div class="col-md-12">

	
		<main id="main" class="post-wrap" role="main">
		<?php if ( have_posts() ) : ?>

			<?php
			$style = themesflat_choose_opt( 'portfolio_style' );
			$columns = themesflat_choose_opt( 'portfolio_grid_columns' );
			$limit = (int) themesflat_choose_opt( 'portfolio_post_perpage');
			$show_filter_portfolio = '';
            $show_filter = themesflat_choose_opt('show_filter_portfolio');
            $orderby = themesflat_choose_opt('portfolio_order_by');
            $order = themesflat_choose_opt('portfolio_order_direction');
			
			if ( get_query_var('paged') ) {
	           $paged = get_query_var('paged');
	        } elseif ( get_query_var('page') ) {
	           $paged = get_query_var('page');
	        } else {
	           $paged = 1;
	        }  

	        $terms_slug = wp_list_pluck( get_terms( 'portfolios_category','orderby=name&hide_empty=0'), 'slug' );        
	        $tax =  $terms_slug; 

	        $query_args = array(
	            'post_type' => 'portfolios',
	            'orderby'   => $orderby,
	            'order' => $order,
	            'posts_per_page' => $limit,
	            'paged' => $paged,          
	            'tax_query' => array(
	                array(
	                    'taxonomy' => 'portfolios_category',   
	                    'field'    => 'slug',                   
                    	'terms'    => $tax,
	                ),
	            ),
	        );

	        $query = new WP_Query( $query_args );
			$GLOBALS['wp_query']->max_num_pages = $query->max_num_pages; 
		
			if ( ! $query->have_posts() )
				return;	

			echo '<div class="flat-portfolio clearfix">';

				//Build the filter navigation
		        if ( $show_filter == 1 ) {	   
		        	$show_filter_portfolio = 'show_filter_portfolio';     	
		            $terms = get_terms('portfolios_category','orderby=name&hide_empty=0');            
		            if ( count($terms) > 0 ) { 
		                echo '<ul class="portfolio-filter"><li class="active"><a data-filter="*" href="#">' . esc_html__( 'All', 'finance' ) . '</a></li>';                
		                foreach ( $terms as $term ) {
		                    $termname = strtolower( $term->name );  
		                    $termname = str_replace(' ', '-', $termname);
		                    echo '<li><a data-filter=".' . esc_attr( $termname ) . '" href="#" title="' . esc_attr( $term->name ) . '">' . esc_html( $term->name ) . '</a></li>';                                  
		                }
		                echo '</ul>'; //portfolio-filter
		            }
		        } 
		        echo '<div class="portfolio-container '.esc_attr( $style ).' '.esc_attr( $columns ).' '.esc_attr( $show_filter_portfolio ).'">';        
					while ( $query->have_posts() ) : $query->the_post();
						global $post;
				        $id = $post->ID;
				        $termsArray = get_the_terms( $id, 'portfolios_category' );
				        $termsString = "";
				         
				        if ( $termsArray ) {
				            foreach ( $termsArray as $term ) {
				            	$itemname = strtolower( $term->name ); 
				                $itemname = str_replace( ' ', '-', $itemname );
				                $termsString .= $itemname.' ';
				            }
				        }

				        $img_portfolio = 'themesflat-portfolio-thumb';

				        if ( has_post_thumbnail() ):	

				        	// Enqueue shortcode assets
							wp_enqueue_script( 'themesflat-manific-popup' );
							echo '<div class="item ' . $termsString . '">';
								echo '<div class="wrap-border">';
					            echo '<div class="featured-post">';	            
						            echo '<div class="link"><a class="popup-gallery" href="'.themesflat_thumbnail_url('').'"><i class="fa fa-arrows-alt"></i></a></div>';	            
						            if ( has_post_thumbnail() ) {                              
		                                the_post_thumbnail( $img_portfolio );
		                            }	                                                                   
					            echo '</div>';
				            	echo '<div class="title-post"><a title="' . get_the_title() . '" href="' . get_the_permalink() . '">' . get_the_title() . '</a></div>';				            	
			                    echo '<div class="category-post">';
			                    echo the_terms( get_the_ID(), 'portfolios_category', 
			                        '', ' / ', '' );                        
			                    echo '</div>';					            
					            echo '</div>';
				            echo '</div>';
				            			
						endif;
					endwhile;	
					wp_reset_postdata();
				
				echo "</div>";
			echo "</div>";
			?>
						
		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		</main><!-- #main -->
		<div class="clearfix">
		<?php
			global $paging_style, $paging_for;
			$paging_for = 'portfolio';
	        $paging_style = themesflat_choose_opt( 'portfolio_archive_pagination_style' );		        
			get_template_part( 'tpl/pagination' );				
		?>
		</div>
	
</div><!-- /.col-md-12 -->

<?php get_footer(); ?>
