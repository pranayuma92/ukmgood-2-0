<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UKMGood_2.0
 */

if ( is_user_logged_in() ) {
    $login_text = get_the_author_meta('display_name', get_current_user_id());
} else {
    $login_text = 'Log In';
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="serach-header">
        <div class="searchbox">
            <button class="close">×</button>
            <form>
                <input type="search" placeholder="Search …">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
    <header class="site_header header_three">
        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg header-menu-three expand-navbar">
                <?php the_custom_logo(); ?>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#collapsiveHeaderMenu">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="collapsiveHeaderMenu">
                    <?php 
                    	wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'depth'         => 1,
    						'fallback_cb'   => false,
    						'add_li_class'  => 'nav-item',
							'container'		 => 'ul',
							'menu_class'	 => 'navbar-nav',
						));
                    ?>
                </div>

                <div class="nav-item signin dropdown d-none d-lg-block">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $login_text; ?></a>
                    <div class="dropdown-menu">
                        <div class="form-login">
                           <!--  <div class="form-title">Login</div>
                            <div class="form-group username">
                                <input type="text" class="form-control" placeholder="Username" autofocus>
                            </div>
                            <div class="form-group password">
                                <input type="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="text-red">Forgot password?</div>
                            <button class="btn btn-red btn-small w-100">Login</button> -->
                            <?php echo do_shortcode('[login-form]') ?>
                        </div>
                        <div class="form-signup">
                            <div class="text-alert">Don't have an account?</div>
                            <div class="text-red">Sign up now!</div>
                            <button class="btn btn-default w-100">Sign up Free</button>
                        </div>
                    </div>
                   <!--  <div class="button_container" id="toggle">
                      <span class="top"></span>
                      <span class="middle"></span>
                      <span class="bottom"></span>
                    </div>

                    <div class="overlay" id="overlay">
                      <nav class="overlay-menu">
                        <ul>
                          <li ><a href="#">Home</a></li>
                          <li><a href="#">About</a></li>
                          <li><a href="#">Work</a></li>
                          <li><a href="#">Contact</a></li>
                        </ul>
                      </nav>
                    </div> -->
                </div>
            </nav>
        </div>
    </header><!-- /.site_header -->

    <?php 
    if(is_front_page()) {
    	echo do_shortcode('[slider-banner]');
    } else { ?>
    	<div class="bg_image" style="background-image:url('<?php echo get_template_directory_uri()?>/assets/images/bg-banner.jpg')">
            
        </div>
    <?php }?>

	<div id="content" class="site-content">
