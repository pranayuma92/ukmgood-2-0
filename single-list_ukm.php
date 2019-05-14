<?php

get_header(); 
$terms = get_the_terms(get_the_ID(), 'kategori_ukm');?>
<section class="container rel-pos pd-t-100 pd-b-100">
	<div class="section_header left_section_header short medium d-md-flex">
		<h2 class="section_title"><?php the_title();?></h2>
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="col-md-3">
			<div class="sidebar-estate">
				<div class="sidebar-widget">
					<h4 class="widget-title">Info Detail</h4>
					<div class="item">
						<span class="key"><i class="fa fa-tags" aria-hidden="true"></i> Kategori</span>
						<span class="value"><?php echo $terms[0]->name ?></span>
					</div>
					<div class="item">
						<span class="key"><i class="fa fa-user" aria-hidden="true"></i> Pemilik</span>
						<span class="value"><?php $owner = get_field('owner') ? get_field('owner') : '-'; echo $owner; ?></span>
					</div>
					<div class="item">
						<span class="key"><i class="fa fa-map" aria-hidden="true"></i> Alamat</span>
						<span class="value"><?php $address = get_field('address') ? get_field('address') : '-'; echo $address; ?></span>
					</div>
					<div class="item">
						<span class="key"><i class="fa fa-phone" aria-hidden="true"></i> Telepon/WA</span>
						<span class="value"><?php $phone = get_field('phone') ? get_field('phone') : '-'; echo $phone; ?></span>
					</div>
					<div class="item">
						<span class="key"><i class="fa fa-envelope" aria-hidden="true"></i> Email</span>
						<span class="value"><?php $email = get_field('email') ? get_field('email') : '-'; echo $email; ?></span>
					</div>
					<div class="item">
						<span class="key"><i class="fa fa-globe" aria-hidden="true"></i> Website</span>
						<span class="value"><?php $website = get_field('website') ? get_field('website') : '-'; echo $website; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="ukm-related direktori rel-pos pd-t-100 pd-b-100">
		<div class="section_header left_section_header short medium d-md-flex">
			<h2 class="section_title">UKM Dari Kategori Yang Sama</h2>
		</div>
		<?php $terms = get_the_terms( $post->ID , 'kategori_ukm', 'string');
		$term_ids = wp_list_pluck($terms,'term_id');

	  	$related = new WP_Query( 
		  	array(
			    'post_type' => 'list_ukm',
			    'tax_query' => array(
                    array(
                        'taxonomy' => 'kategori_ukm',
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

	    if($related->have_posts()) : ?>
			<div class="row ukm-item">
				<?php while($related->have_posts()) : $related->the_post(); ?>
					<div class="col-md-3 grid bar" data-jplist-item>
				        <div class="card card_food">
				            <div class="card_image_area">
				                <div class="card_image">
				                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large')?>" alt="img">
				                </div>
				            </div>
				            <div class="card_body">
				                <h2 class="card_title"><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
				                <div class="card_location"><span><?php echo $address?></span></div>
				            </div>
				            <div class="card_footer">
				                <button class="btn btn-default btn-small" onclick="window.location.href='<?php the_permalink(); ?>'">Detail</button>
				            </div>
				        </div>
				    </div>
				<?php endwhile; ?>
			</div>
	    <?php endif; ?>
	</div>
</section>

<?php
get_footer();