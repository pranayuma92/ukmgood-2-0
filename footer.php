<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UKMGood_2.0
 */

?>

	</div><!-- #content -->

	<footer class="site_footer restaurant_footer" data-bg-image="images/restaurant/footer.jpg">
        <div class="footer_top">        
            <div class="container">                
                <div class="row footer_widget">
                    <!--~~~~~ Start Widget Contact ~~~~~-->
                    <div class="col-md-4">
                        <div class="widget widget_contact">
                            <h2 class="widget_title">Kontak</h2>
                            <div class="link-items">
                                <a href="#" class="link-item">
                                    <i class="icon fa fa-phone"></i>
                                    <div class="link-detail">
                                        <h4>Telepon</h4>
                                        <p>+62 877 16288479</p>
                                    </div>
                                </a>
                                <a href="#" class="link-item">
                                    <i class="icon fa fa-envelope-o"></i>
                                    <div class="link-detail">
                                        <h4>Emai</h4>
                                        <p>info@ukmgood.com</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><!--~./ end widget contact ~-->

                    <!--~~~~~ Start Widget Info ~~~~~-->
                    <div class="col-md-4">
                        <div class="widget widget_info">
                            <h2 class="widget_title">Navigasi</h2>
                            <?php 
                    	wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						));
                    ?>
                        </div>
                    </div><!--~./ end widget info ~-->
                    
                    <!--~~~~~ Start Widget Support ~~~~~-->
                    <div class="col-md-4">
                        <div class="widget widget_support">
                            <h2 class="widget_title">Newsletter</h2>
                            <div class="widget-content">
                                <p>Langganan buletin info ukm terbaru</p>
                                <div class="newsletter-content">
                                    <input type="email" class="form-control" placeholder="Email Address" />
                                    <button class="btn btn-red">Subscribe</button>
                                </div><!--  /.newsletter-content -->
                            </div><!--  /.widget-content -->
                        </div>
                    </div><!--~./ end widget support ~-->
                </div>
            </div>
        </div><!--  /.footer_top -->

        <div class="footer_bottom">
            <div class="container">
                <div class="row copyright">
                    <div class="col-lg-8">
                        <div class="copyright_text text-left">
                            <p>© 2019 ukmgood.com | All Rights Reserved. </p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="social_links">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-instagram"></a>
                        </div>
                    </div>
                </div>

                <a href="javascript:" id="return_to_top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div><!--  /.container -->
        </div><!--  /.footer_bottom -->
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
