
<div class="latest_listing_carousel owl-carousel" data-owl-items="4" data-owl-margin="30" data-owl-extranav="1" data-owl-loop="1">
    <?php foreach ($products as $product ) :
    $cat_product = get_the_terms($product->ID, 'product_category');
    $image = get_field('gambar_sampul', 'product_category_' . $cat_product[0]->term_id, 'medium'); 
       //print_r($product);
    $meta = get_post_meta($product->ID, 'ukmp', true );
    if($meta['sale']){
        $price = sprintf('<span><strong>Rp %1$s </strong></span><del>Rp %2$s</del>', number_format($meta['sale'], 0, '', '.'), number_format($meta['price'], 0, '', '.'));
    } else {
        $price = sprintf('<span><strong>Rp %s</strong></span>', number_format($meta['price'], 0, '', '.'));
    }
    ?>

    <div class="card card_food">
        <div class="card_image_area">
            <div class="card_image">
                <img src="<?php echo get_the_post_thumbnail_url($product->ID)?>" alt="img">
            </div>
            <div class="food_type_group">
                <a href="#" class="food_type">
                    <img src="<?php echo $image['url']; ?>" alt="" />
                </a>
            </div>
        </div>
        <div class="card_body">
            <h2 class="card_title"><a href="<?php echo get_post_permalink($product->ID)?>"><?php echo $product->post_title; ?></a></h2>
            
            <div class="price"><span><?php echo $price; ?></span></div>
        </div>
        <div class="card_footer">
            <button class="btn btn-default btn-small" onclick="window.location.href='<?php echo get_post_permalink($product->ID)?>'">Detail</button>
        </div>
    </div>
    <?php endforeach; ?> 
</div><!-- /.latest_listing_carousel -->

<div class="btn_links text-center with-image">
    <button class="btn btn-prev btn-default btn-large"><i class="lp lp-arrow-left"></i></button>
    <button class="btn btn-red btn-default" onclick="window.location.href='<?php echo esc_url(home_url())?>/bazaar'">Semua Produk</button>
    <button class="btn btn-next btn-default btn-large"><i class="lp lp-arrow-right"></i></button>
</div><!-- /.btn_links -->
