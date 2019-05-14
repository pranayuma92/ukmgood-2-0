<?php 
$ukm_cat = $_GET['cat']; ?>
<div class="ukm-filter buttons">
    <button
        data-jplist-control="buttons-path-filter"
        data-group="data-ukm"
        data-mode="radio"
        data-path="default"
        data-selected="true"
        name="name1">
        All
    </button>
    <?php $terms = get_terms(array('taxonomy' => 'kategori_ukm','hide_empty' => true));
    foreach($terms as $term) :?>
        <button
            data-jplist-control="buttons-path-filter"
            data-path=".<?php echo $term->slug;?>"
            data-group="data-ukm"
            data-mode="radio"
            name="name1">
            <?php echo $term->name;?>
        </button>
    <?php endforeach; ?>
</div>
<div class="row ukm-item" data-jplist-group="data-ukm">
    <?php $ukm = new WP_Query($args);
    while($ukm->have_posts()) : $ukm->the_post(); 
        $address = get_field('address') ? get_field('address') : '-';
        $cat = get_the_terms(get_the_ID(), 'kategori_ukm');?>  
    <div class="col-md-3 grid bar" data-jplist-item>
        <div class="card card_food <?php echo $cat[0]->slug;?>">
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
<div class="filter-no-result" data-jplist-control="no-results" data-group="data-ukm" data-name="no-results"><h4>No Results Found</h4></div>
    <div
        data-jplist-control="pagination"
        data-group="data-ukm"
        data-items-per-page="8"
        data-current-page="0"
        data-name="pagination1">

        <div class="row mb-3 pagination-ukm">
            <div class="jplist-holder" data-type="pages">
                <button type="button" data-type="page">{pageNumber}</button>
            </div>
        </div>
    </div>
<script type="text/javascript">
        jplist.init();
        (function($){
            $('[data-path=".<?php echo $ukm_cat?>"]').click();
        })(jQuery);
    </script>