<div class="main-slide main-restaurant">
    <div class="owl-carousel" id="mainSlide" data-owl-anim-out="fadeOut" data-owl-dots="1">
        <?php 
        $i = 0;
        foreach ($posts as $post ) : 
            $img = get_post_meta($post->ID, 's_mb');
        ?>
        <div class="slide-item">
            <div class="overlay"></div>
            <img src="<?php echo $img[0]['slider'] ?>" alt="" class="background-image">
            <div class="slide-content">
                <div class="container">
                    <div class="title"><?php echo $img[0]['text'] ?></div>
                </div>
            </div>
        </div>
        <?php $i++; endforeach; ?>
    </div><!-- /.owl-carousel -->
</div><!-- /.main-slide -->