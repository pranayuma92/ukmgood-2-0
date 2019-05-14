<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package UKMGood_2.0
 */

get_header();
?>

	<section class="container rel-pos pd-t-100 pd-b-100">
		<div class="section_header left_section_header short medium d-md-flex">
			<h2 class="section_title"><?php the_title();?></h2>
		</div>
		<section class="page-blog">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9">
                        <div class="blog-page-content blog-content">
                            <!-- Start Single Post -->
                            <article class="post post-item">
                                <div class="post-thumbnail">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full')?>" alt="img">
                                </div><br>
                                <div class="entry-content">
                                	<?php the_content(); ?>
                                </div>
                            </article><!-- End Single Post -->
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="sidebar-estate right">

                            <div class="sidebar-widget wow fadeIn" data-wow-duration="1000ms" data-wow-delay="">
                                <h4 class="widget-title">Artikel Lainnya</h4>
                             		<?php $terms = get_the_terms( $post->ID , 'category', 'string');
										$term_ids = wp_list_pluck($terms,'term_id');

									  	$related = new WP_Query( 
										  	array(
											    'post_type' => 'post',
											    'tax_query' => array(
								                    array(
								                        'taxonomy' => 'category',
								                        'field' => 'id',
								                        'terms' => $term_ids,
								                        'operator'=> 'IN' 
								                    )),
										      	'posts_per_page' => 4,
										      	'ignore_sticky_posts' => 1,
										      	'orderby' => 'rand',
										      	'post__not_in'=>array($post->ID)
											) 
									  	);

									    if($related->have_posts()) : 
									    	while($related->have_posts()) : $related->the_post();?>
	                                        <div class="post-item">
	                                          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="" class="post-image">
	                                          <div class="post-info">
	                                            <a href="#" class="post-title"><?php the_title();?></a>
	                                            <div class="date"><?php the_time('F j, Y')?></div>
	                                          </div>
	                                        </div>
	                                       <?php endwhile;
	                                    endif; ?>
        
                                
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
	</section>

<?php
get_footer();
