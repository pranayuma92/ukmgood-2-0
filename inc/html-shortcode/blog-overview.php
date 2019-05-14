<div class="row restaurant_blog masonry_grid">
    <?php 
    $blog = new WP_Query($args);

    while($blog->have_posts()) : $blog->the_post();
    ?>
    <div class="col-lg-6 grid">
        <article class="post card post-list">
            <div class="post-thumbnail">
               <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="img"></a>
            </div>
            <div class="post-info">
                <div class="entry-meta">
                    <span class="date"><i class="fa fa-calendar"></i><?php the_time('F j, Y')?></span>
                </div>
                <div class="entry-content">
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h2>
                    <a class="link-more" href="<?php the_permalink(); ?>">Baca</a>
                </div>
            </div>
        </article>
    </div><!--./ end single post -->
<?php endwhile; ?>
</div>
<div class="btn_links text-center">
    <button class="btn btn-red btn-default" onclick="window.location.href='<?php echo esc_url(home_url())?>/blog'">Semua blog</button>
</div>