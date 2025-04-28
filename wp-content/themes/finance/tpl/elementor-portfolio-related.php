<?php
if (  themesflat_choose_opt( 'show_related_portfolio') != 1)
	return;

$style = themesflat_choose_opt( 'related_portfolio_style' );
$columns = themesflat_choose_opt( 'grid_columns_portfolio_related' );
$limit = (int) themesflat_choose_opt( 'number_related_portfolio');

if ( $categories = get_the_terms( get_the_ID(), 'portfolios_category' ) ) {
	$term_ids = array_values( wp_list_pluck( $categories, 'slug' ) );
}

$args = array(
	'post_type' => 'portfolios',
	'posts_per_page' => $limit,
	'tax_query' => array(
		array(
		'taxonomy' => 'portfolios_category',
		'field' => 'term_id',
		'terms' => $term_ids,
		'operator'=> 'IN'
		)),
	'ignore_sticky_posts' => 1,
	'post__not_in'=> array( $post->ID )
);

?>
<section class="related-portfolios">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 				
				if( get_theme_mod( 'title_related_portfolio','Related Portfolio' ) != "" ) {
					echo '<div class="title_related_portfolio">'.get_theme_mod( 'title_related_portfolio','Related Portfolio' ).'</div>';
				}
				?>
				<div class="flat-portfolio no">
				    <div class="portfolio-container <?php echo esc_attr($style) . ' ' .  esc_attr($columns);?>">
				    	<?php  
				    	$query = new WP_Query($args);
				    	if( $query->have_posts() ):
				    		while ( $query->have_posts() ) : $query->the_post();
				    		?>
					        <div class="item services trading">
					            <div class="wrap-border">
					                <div class="featured-post">
					                    <div class="link">
					                        <a class="popup-gallery" href="<?php echo themesflat_thumbnail_url(''); ?>"><i class="fa fa-arrows-alt"></i></a>
					                    </div>
					                    <?php 
		                                    if ( has_post_thumbnail() ) { 
		                                        $themesflat_thumbnail = "themesflat-portfolio-thumb";                              
		                                        the_post_thumbnail( $themesflat_thumbnail );
		                                    }                                           
		                                ?>
					                </div>
					                <div class="title-post"><a title="<?php the_title(); ?>" href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></div>
					                <div class="category-post">
					                    <?php echo the_terms( get_the_ID(), 'portfolios_category', '', ' / ', '' ); ?>
					                </div>
					            </div>
					        </div>
					    	<?php 
					    	endwhile;
					    endif;
	            		wp_reset_postdata();
					    ?>
				    </div>
				</div>


			</div>
		</div>
	</div>
</section>