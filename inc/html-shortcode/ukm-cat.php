<div class="row foods_categories">
    <?php $i = 0; foreach(array_slice($terms, 0, 6) as $term) :
    //print_r($term);
    $image = get_field('gambar_sampul', 'kategori_ukm_' . $term->term_id, 'medium');?> 
    <div class="col-lg-4" onclick="window.location.href='<?php echo esc_url(home_url())?>/direktori-ukm/?cat=<?php echo $term->slug; ?>'">
        <div class="card single_food_cat <?php echo $cat[$i] ?> bg_gray">
            <div class="image">
                <img src="<?php echo $image['url']; ?>" alt="" />
            </div><br/>
            <div class="card_body">
                <h2 class="card_title"><?php echo $term->name; ?></h2>
                <button class="btn btn-default"><?php echo $term->count; ?></button>
            </div>
        </div>
    </div>
    <?php $i++; endforeach; ?>
</div>
<div class="btn_links text-center">
    <button class="btn btn-red btn-default" onclick="window.location.href='<?php echo esc_url(home_url())?>/direktori-ukm'">Semua kategori</button>
</div>