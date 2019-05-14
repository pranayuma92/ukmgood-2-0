<?php

class ExtendedFunctions {

	private $directory = '';
	
	private $content_type_name = 'ukmgood_2_0_';

	public function __construct(){
		$this->set_directory_value();
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_filter('nav_menu_css_class', array($this, 'add_additional_class_on_li'), 1, 3);
		add_filter('wp_nav_menu_items', array($this, 'add_last_nav_item'));
		add_action('init', array($this, 'simple_slider_image'), 0 );
		add_action('after_setup_theme', array($this, 'slider_metaboxes'));
		add_filter( 'excerpt_length', array($this, 'custom_excerpt_length'), 999 );
		add_filter('excerpt_more', array($this, 'new_excerpt_more'));
		add_shortcode('slider-banner', array($this, 'slider_banner'));
		add_shortcode('ukm-cat', array($this, 'ukm_cat'));
		add_shortcode('bazar-slider', array($this, 'bazar_slider'));
		add_shortcode('blog-overview', array($this, 'blog_overview'));
		add_shortcode('ukm-directory', array($this, 'ukm_dir'));
		add_shortcode('blog-archive', array($this, 'blog_archive'));
		add_shortcode('login-form', array($this, 'login_form'));
		add_action('init', array($this, 'redirect_login_page'));
		add_action('wp_login_failed', array($this, 'login_failed'));
		add_action( 'rest_api_init', array($this, 'create_api_posts_meta_field') );
		add_filter( 'rest_poin_code_query', array($this, 'post_meta_request_params'), 99, 2 );
		add_action( 'rest_api_init', array($this, 'create_api_poin_meta_field') );
	}

	public function render( $filePath, $viewData = null ) {
 
        ( $viewData ) ? extract( $viewData ) : null;
 
        ob_start();
        include( $filePath );
        $template = ob_get_contents();
        ob_end_clean();
 
        return $template;
    }

	public function set_directory_value(){
		$this->directory = get_template_directory_uri() . '/assets/';
	}

	public function enqueue_scripts(){
		wp_enqueue_style( $this->content_type_name . 'bootstrap', $this->directory . 'css/bootstrap.min.css' );
		wp_enqueue_style( $this->content_type_name . 'custom_style', $this->directory . 'css/style.css' );
		wp_enqueue_style( $this->content_type_name . 'font-awesome', $this->directory . 'css/fontawesome.min.css' );
		wp_enqueue_style( $this->content_type_name . 'listing-icons', $this->directory . 'css/listing-icons.css' );
		wp_enqueue_style( $this->content_type_name . 'color-yellow', $this->directory . 'css/color-yellow.css' );
		wp_enqueue_style( $this->content_type_name . 'owl-carousel', $this->directory . 'css/owl.carousel.min.css' );
		wp_enqueue_style( $this->content_type_name . 'datepicker', $this->directory . 'css/datepicker.css' );
		wp_enqueue_style( $this->content_type_name . 'bootstrap-slider', $this->directory . 'css/bootstrap-slider.min.css' );
		wp_enqueue_style( $this->content_type_name . 'animate', $this->directory . 'css/animate.min.css' );
		wp_enqueue_style( $this->content_type_name . 'select-default', $this->directory . 'css/tail.select-default.css' );

		wp_enqueue_script( $this->content_type_name . 'jquery-js', $this->directory . "js/jquery.min.js", array(), '1.0',true);
		wp_enqueue_script( $this->content_type_name . 'pooper', $this->directory . "js/popper.min.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'bootstrap-js', $this->directory . "js/bootstrap.min.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'owl-carousel-js', $this->directory . "js/owl.carousel.min.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'bootstrap-datepicker', $this->directory . "js/bootstrap-datepicker.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'bootstrap-slider', $this->directory . "js/bootstrap-slider.min.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'isotope', $this->directory . "js/isotope.pkgd.min.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'wow', $this->directory . "js/wow.min.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'tail-select', $this->directory . "js/tail.select.min.js", array(), '1.0',true);
	    wp_enqueue_script( $this->content_type_name . 'functions', $this->directory . "js/functions.js", array(), '1.0',true);
	    //wp_enqueue_script( $this->content_type_name . 'jplist', $this->directory . "js/jplist.js", array(), '1.0',true);
	}

	public function add_additional_class_on_li($classes, $item, $args) {
	    if($args->add_li_class) {
	        $classes[] = $args->add_li_class;
	    }
	    return $classes;
	}

	public function add_last_nav_item($items) {
		return $items .= '<li class="nav-item"><div class="search_wrap"><button class="searchd"><i class="fa fa-search"></i></button></div></li>';
	}

	public function simple_slider_image() {
	    $labels1 = array(
	        'name'                => _x( 'Banner Slider', 'Post Type General Name', '' ),
	        'singular_name'       => _x( 'Banner Slider', 'Post Type Singular Name', '' ),
	        'menu_name'           => __( 'Banner Slider', '' ),
	        'all_items'           => __( 'All Slider Child', '' ),
	        'view_item'           => __( 'Banner Slider', '' ),
	        'add_new_item'        => __( 'Add New Child', '' ),
	        'add_new'             => __( 'Add New Child', '' ),
	        'edit_item'           => __( 'Edit Banner Slider Child', '' ),
	        'update_item'         => __( 'Update Banner Slider', '' ),
	        'search_items'        => __( 'Search Banner Slider', '' ),
	        'not_found'           => __( 'Not Found', '' ),
	        'not_found_in_trash'  => __( 'Not found in Trash', '' ),
	    );

	    $args1 = array(
	        'label'               => __( 'Banner Slider', '' ),
	        'description'         => __( 'Banner Slider news and reviews', '' ),
	        'labels'              => $labels1,
	        'supports'            => array( 'title'),
	        'menu_icon'           => 'dashicons-format-gallery', 
	        'hierarchical'        => false,
	        'public'              => false,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_nav_menus'   => false,
	        'show_in_admin_bar'   => false,
	        'menu_position'       => 30,
	        'can_export'          => true,
	        'has_archive'         => false,
	        'exclude_from_search' => true,
	        'publicly_queryable'  => true,
	        'capability_type'     => 'page',
	    );

	    register_post_type( 'banner_slider', $args1 );
	    flush_rewrite_rules();

	}

	public function slider_metaboxes() {
	    
	    $mb = new VP_Metabox(array(
	        'id'          => 's_mb',
	        'types'       => array('banner_slider'),
	        'title'       => __('Slider Option', 'ukmgood-2-0'),
	        'priority'    => 'high',
	        'is_dev_mode' => false,
	        'template'    => array(
			    array(
			        'type' => 'upload',
			        'name' => 'slider',
			        'label' => __('Image', 'ukmgood-2-0'),
			        'description' => __('Slider image', 'ukmgood-2-0'),
			        'default' => '',
			        'validation' => 'required'
			    ),
			    array(
			        'type' => 'textarea',
			        'name' => 'text',
			        'label' => __('Text', 'ukmgood-2-0'),
			        'description' => __('Slider text', 'ukmgood-2-0'),
			        'default' => '',
			        'validation' => ''
			    ),  
			)
		));
	}

	public function custom_excerpt_length( $length ) {
	    return 40;
	}

	public function new_excerpt_more( $more ) {
	    return '...';
	}

	//All shortcode function
	public function slider_banner(){

        $viewData = array(
            'posts' => get_posts( array( 'post_type'   => 'banner_slider' ) ),
        );

		$templatePath = dirname( __FILE__ ) .'/html-shortcode/slider.php';
		return $this->render($templatePath, $viewData);
	}

	public function ukm_cat(){
 
        $viewData = array(
            'terms' => get_terms( array(
				'taxonomy'=>'kategori_ukm',
				'hide_empty' => true,
			)),
			'cat' => array('restaurant', 'fastfood', 'cake', 'bar', 'caffe', 'pizza'),
        );

		$templatePath = dirname( __FILE__ ) .'/html-shortcode/ukm-cat.php';
		return $this->render($templatePath, $viewData);
	}

	public function bazar_slider(){
 
        $viewData = array(
            'products' => get_posts( array( 'post_type'   => 'ukm_products' ))
        );

		$templatePath = dirname( __FILE__ ) .'/html-shortcode/bazar.php';
		return $this->render($templatePath, $viewData);
	}

	public function blog_overview(){

		$viewData = array(
			'args' => array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 4)
		);

		$templatePath = dirname( __FILE__ ) .'/html-shortcode/blog-overview.php';
		return $this->render($templatePath, $viewData);
	}

	public function ukm_dir(){

		$viewData = array(
			'args' => array('post_type' => 'list_ukm', 'post_status' => 'publish', 'posts_per_page' => -1)
		);

		$templatePath = dirname( __FILE__ ) .'/html-shortcode/ukm-direktori.php';
		return $this->render($templatePath, $viewData);
	}

	public function blog_archive(){

		$viewData = array(
			'args' => array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1)
		);

		$templatePath = dirname( __FILE__ ) .'/html-shortcode/blog-archive.php';
		return $this->render($templatePath, $viewData);
	}

	public function login_form() {

		if ( is_user_logged_in() ){
			$menu = '<ul class="login-menu">';
			$menu .= sprintf('<li><a href="%s">Logout</a></li>', wp_logout_url('/'));
			$menu .= '</ul>';

			echo $menu;
		} else {
			ob_start();
		    $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
		    if ($login === "failed") {
		        echo '<br><p class="error-login-msg"><strong>ERROR:</strong> Invalid email or password.</p><br>';
		    } elseif ($login === "empty") {
		        echo '<br><p class="error-login-msg"><strong>ERROR:</strong> Username and/or Password is empty.</p><br>';
		    } elseif ($login === "false") {
		        echo '<br><p class="success-login-msg"> You are logged out now.</p><br><br>';
		    }

		    $args = array(
		        'echo'           => true,
		        'remember'       => true,
		        'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
		        'form_id'        => 'loginform',
		        'id_username'    => 'user_login',
		        'id_password'    => 'user_pass',
		        'id_remember'    => 'rememberme',
		        'id_submit'      => 'wp-submit',
		        'label_username' => __( 'Email' ),
		        'label_password' => __( 'Password' ),
		        'label_remember' => __( 'Remember Me' ),
		        'label_log_in'   => __( 'LOG IN' ),
		        'value_username' => '',
		        'value_remember' => false
		    );

		    wp_login_form($args); 
		}
	}

	public function redirect_login_page() {
	    $login_page = get_home_url();
	    $page_viewed = basename($_SERVER['REQUEST_URI']);

	    if ($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
	        wp_redirect($login_page);
	        exit;
	    }
	}

	public function login_failed() {
	    $login_page = get_home_url();
	    wp_redirect($login_page . '?login=failed');
	    exit;
	}

	public function create_api_posts_meta_field() {
	 	// register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
	 	register_rest_field( 'info_poin', 'meta', array(
	 			'get_callback' => array($this, 'get_post_meta_for_api'),
	 			'schema' => null,
	 		)
	 	);
	}

	public function get_post_meta_for_api( $object ) {
 		//get the id of the post object array
	 	$post_id = $object['id'];
	 
	 	//return the post meta
	 	return get_post_meta( $post_id , 'poin');
	}

	public function register_api_hooks_get_point() {
		register_rest_route(
		    'point', '/get_point/',
		    array(
		      'methods'  => 'GET',
		      'callback' => 'get_points',
		    )
		);
	}

	public function get_points($request){
	    $creds = array();
	    $creds['user_login'] = $request["username"];
	    $creds['user_password'] =  $request["password"];
	    $creds['remember'] = true;
	    $user = wp_signon( $creds, false );

	    if ( is_wp_error($user) )
	      echo $user->get_error_message();



	    return $user;
	}

	public function post_meta_request_params( $args, $request ) {
		$args += array(
			'meta_key'   => $request['meta_key'],
			'meta_value' => $request['meta_value'],
			'meta_query' => $request['meta_query'],
		);
	    return $args;
	}

	public function create_api_poin_meta_field() {
	 	// register_rest_field ( 'name-of-post-type', 'name-of-field-to-return', array-of-callbacks-and-schema() )
	 	register_rest_field( 'poin_code', 'points', array(
	 			'get_callback' => array($this, 'get_poin_meta_for_api'),
	 			'schema' => null,
	 		)
	 	);
	}

	public function get_poin_meta_for_api( $object ) {
 		//get the id of the post object array
	 	$post_id = $object['id'];
	 
	 	//return the post meta
	 	return get_post_meta( $post_id , 'poin');
	}

}