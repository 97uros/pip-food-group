<?php

 	// Styles
	 function pipfoodgroup_styles() {
		wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', array(), false, 'all' );
		wp_enqueue_style( 'bootstrap-icons-css', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css');
		wp_enqueue_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
		wp_enqueue_style( 'owlcarousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
		wp_enqueue_style( 'owlcarousel-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
		wp_enqueue_style('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');
		wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css'); // main.scss: 
	}
	add_action('wp_enqueue_scripts', 'pipfoodgroup_styles');

  // Scripts.
	function pipfoodgroup_scripts() {
		wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', false, true);
    wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null , true);
    wp_enqueue_script( 'owlcarousel-script', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), '' ,true);
		wp_enqueue_script('masonry', 'https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js');
    wp_enqueue_script('matchHeight-script', get_template_directory_uri() . '/assets/js/jquery.matchHeight.js', array(), '', true );
		wp_enqueue_script( 'scriptjs', get_template_directory_uri() . '/assets/js/script.js', array(), true );
		wp_enqueue_script( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', array(), true );
		wp_enqueue_script( 'fontawesome', 'https://kit.fontawesome.com/c744dacd1e.js', array(), true );
		wp_enqueue_script('swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js');
	}
	add_action('wp_enqueue_scripts', 'pipfoodgroup_scripts');

	function pipfoodgroup_theme_support() {
		add_theme_support('title-tag');
		add_theme_support('post-thumbnail');
		add_theme_support('html5', array('search-form'));
		add_theme_support('custom-logo');
		add_theme_support('custom-background');
		add_theme_support('custom-header');
		add_theme_support('post-thumbnails');
		add_theme_support( 'post-formats' );
		add_theme_support('widgets');
		add_theme_support('woocommerce', array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			'product_grid'          => array(
					'default_rows'    => 3,
					'min_rows'        => 2,
					'max_rows'        => 8,
					'default_columns' => 4,
					'min_columns'     => 2,
					'max_columns'     => 5,
			),
		));
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support('post-thumbnails');
		add_post_type_support( 'masine', 'thumbnail' );  

	} 
	
	add_action('after_setup_theme', 'pipfoodgroup_theme_support'); 

	function mytheme_add_woocommerce_support() {
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
	
					'product_grid'          => array(
							'default_rows'    => 3,
							'min_rows'        => 2,
							'max_rows'        => 8,
							'default_columns' => 4,
							'min_columns'     => 2,
							'max_columns'     => 5,
					),
		) );
	}
	add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );
	
	function pipfoodgroup_menus() {
		register_nav_menus(array(
			'primary-menu' => __('Top Navigation Menu', 'text_domain'),
			'footer-menu' => __('Footer Menu', 'text_domain'),
		));
		}
	
	add_action('init', 'pipfoodgroup_menus');

	$custom_walker = get_template_directory() . '/inc/wp_bootstrap_navwalker.php';
	if ( is_readable( $custom_walker ) ) {
		require_once $custom_walker;
	}

	if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
		acf_add_options_sub_page('Header');
    acf_add_options_sub_page('CTA Block');
		acf_add_options_sub_page('404');
		acf_add_options_sub_page('Quality');
		acf_add_options_sub_page('Team');
		acf_add_options_sub_page('Footer');
		acf_add_options_sub_page('Product Archive');
		acf_add_options_sub_page('Search');
		acf_add_options_sub_page('Product');
	}
	function cc_mime_types($mimes) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	// Number Pagination Function 

	global $wp_query;
	$big = 9999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'show_all'           => false,
		'end_size'           => 1,
		'mid_size'           => 2,
		'add_args'           => false,
		'add_fragment'       => '',
		'before_page_number' => '',
		'after_page_number'  => ''));
		
	// Sidebar 

	function pipfoodgroup_sidebar() {
		register_sidebar( array(
			'name'          => 'Blog Sidebar',
			'id'            => 'blog-sidebar',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	add_action('widgets_init', 'pipfoodgroup_sidebar');

	// Post Types 

	// Our custom post type function
function create_posttype() {
  
	register_post_type( 'masine',
	// CPT Options
			array(
					'labels' => array(
							'name' => __( 'Mašine' ),
							'singular_name' => __( 'Mašina' )
					),
					'public' => true,
					'rewrite' => array('slug' => 'masine'),
					'show_in_rest' => true,
					'menu_icon' => 'dashicons-admin-generic',
			)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

// Featured Posts 

function be_dps_output_customization( $output, $original_atts, $image, $title, $date, $excerpt, $inner_wrapper, $content, $class, $author, $category_display_text ) {
  $output = '<div class="featured-post">' . '<div class="image">' . $image . '</div>' . '<div class="text">' . '<div class="title">' . $title . '</div>' . '<div class="meta">' . $category_display_text . '&nbsp;•&nbsp;' . $date . '</div>' . '</div>' . '</div>';
  return $output;
}
add_filter( 'display_posts_shortcode_output', 'be_dps_output_customization', 10, 11 );

// Social Media Share 

	$postUrl = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

/***********************************************************WOOCOMMERCE*******************************************************/

	// Remove Default Product Tabs 

	add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

		function woo_remove_product_tabs( $tabs ) {

			unset( $tabs['description'] );      	// Remove the description tab
			unset( $tabs['reviews'] ); 			// Remove the reviews tab
			unset( $tabs['additional_information'] );  	// Remove the additional information tab

			return $tabs;
		}

	// Add Custom Product Tabs 

	add_filter( 'woocommerce_product_tabs', 'benefits_tab' );

	function benefits_tab( $tabs ) {

		if( ICL_LANGUAGE_CODE == 'sr' ) :
			$tabs['benefits'] = array(
			'title' => __( 'Benefiti', 'woocommerce' ),
			'priority' => 50,
			'callback' => 'benefits_tab_content'
		);
		endif;
		if( ICL_LANGUAGE_CODE == 'en' ) :
			$tabs['benefits'] = array(
			'title' => __( 'Benefits', 'woocommerce' ),
			'priority' => 50,
			'callback' => 'benefits_tab_content'
		);
		endif;
		return $tabs;
	}

	// Add content to a custom product tab
	function benefits_tab_content() { ?>

		<div class="container benefits">
			<div class="row align-items-center">
			<?php if( have_rows('single_product_benefits') ):
					while( have_rows('single_product_benefits') ) : the_row();
						$label = get_sub_field('label'); ?>
						<div class="col-lg-3 benefit">
							<p><?php echo $label; ?></p>
						</div>
					<?php endwhile;
				endif; ?>
			</div>
		</div>

	<?php }

	add_filter( 'woocommerce_product_tabs', 'tech_info_tab' );

	function tech_info_tab( $tabs ) {
		if( ICL_LANGUAGE_CODE == 'sr' ) :
			$tabs['tech_info'] = array(
			'title' => __( 'Tehnološke informacije', 'woocommerce' ),
			'priority' => 50,
			'callback' => 'tech_info_tab_content'
		);
		endif;
		if( ICL_LANGUAGE_CODE == 'en' ) :
			$tabs['tech_info'] = array(
			'title' => __( 'Tech info', 'woocommerce' ),
			'priority' => 50,
			'callback' => 'tech_info_tab_content'
		);
		endif;
		return $tabs;
	}

	// Add content to a custom product tab
	function tech_info_tab_content() { ?>
	<div class="container tech-info">
			<div class="justify-content-center align-items-center">
					<?php if( have_rows('tech_info') ):
					while( have_rows('tech_info') ) : the_row();
						$title = get_sub_field('title');
						$text = get_sub_field('text'); ?>
						<div class="row tech-info-item">
							<div class="tech-info-title col-lg-4">
								<h6><?php echo $title; ?></h6>
							</div>
							<div class="texh-info-text col-lg-8">
								<p><?php echo $text; ?></p>
							</div>
						</div>
					<?php endwhile;
				endif; ?>
			</div>
		</div>
	<?php }

	// Add Buy Now Button 

	function add_content_after_addtocart() {
    
		// get the current post/product ID
		$current_product_id = get_the_ID();

		// get the product based on the ID
		$product = wc_get_product( $current_product_id );

		// get the "Checkout Page" URL
		$checkout_url = WC()->cart->get_checkout_url();

		// run only on simple products
		if( $product->is_type( 'simple' ) ){ ?>
			<?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
				<a href="<?php echo site_url('/kontakt')?>" class="buy-now button">Kontaktirajte nas</a>
			<?php endif; ?>
			<?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
				<a href="<?php echo site_url('/kontakt')?>" class="buy-now button">Contact us</a>
			<?php endif; ?>
		<?php }
	}

add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );

if ( ! function_exists( 'woocommerce_breadcrumb' ) ) {

	/**
	 * Output the WooCommerce Breadcrumb.
	 *
	 * @param array $args Arguments.
	 */
	function woocommerce_breadcrumb( $args = array() ) {
		$args = wp_parse_args(
			$args,
			apply_filters(
				'woocommerce_breadcrumb_defaults',
				array(
					'delimiter'   => '&nbsp;<i class="fa-solid fa-chevron-right"></i>&nbsp;',
					'wrap_before' => '<div class="woocommerce-breadcrumb-wrapper"><div class="container"><div class="row"><div class="col"><nav class="woocommerce-breadcrumb test">',
					'wrap_after'  => '</div></div></div></div></nav>',
					'before'      => '',
					'after'       => '',
					'home'        => _x( '', 'breadcrumb', 'woocommerce' ),
				)
			)
		);

		$breadcrumbs = new WC_Breadcrumb();

		if ( ! empty( $args['home'] ) ) {
			$breadcrumbs->add_crumb( $args['home'], apply_filters( 'woocommerce_breadcrumb_home_url', home_url() ) );
		}

		$args['breadcrumb'] = $breadcrumbs->generate();

		/**
		 * WooCommerce Breadcrumb hook
		 *
		 * @hooked WC_Structured_Data::generate_breadcrumblist_data() - 10
		 */
		do_action( 'woocommerce_breadcrumb', $breadcrumbs, $args );

		wc_get_template( 'global/breadcrumb.php', $args );
	}
}

?>