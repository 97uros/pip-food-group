<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit; ?>

<?php get_header( 'shop' );

$term_id  = get_queried_object()->term_id;
$taxonomy = get_queried_object()->taxonomy;

$headerBackground = get_field('header_background', $taxonomy . '_' . $term_id);
if(!$headerBackground) {
  $headerBackground = get_field('category_hero_background','options');
}
$headerTitle = get_field('header_title', $taxonomy . '_' . $term_id);
$headerText = get_field('header_text', $taxonomy . '_' . $term_id); 
$header_benefits = get_field('header_benefits', $taxonomy . '_' . $term_id); 
$show_flyers = get_field('show_flyers', $taxonomy . '_' . $term_id); 
$use_default_flyers = get_field('use_default_flyers', $taxonomy . '_' . $term_id); 
$use_different_template = get_field('use_different_template', $taxonomy . '_' . $term_id); 

$products_title = get_field('products_title','options');
$cat = get_queried_object();
$obj_id = get_queried_object_id();
$current_url = get_term_link( $obj_id );
?>
<?php if($use_different_template ) : ?>
  <?php 
     $parent_cat_id = $cat->parent;
     $category_parrent = get_category_link($parent_cat_id);
     $url = $_SERVER['REQUEST_URI'];
     $myArray = explode('/', $url);
   
     array_pop($myArray);
     $current_cat = $myArray;
     array_pop($myArray);
     $parrent_cat = $myArray;
     array_pop($myArray);
     $parrent_of_parrent_cat = $myArray;
     function category_has_parent($catid) {
      $category = get_category($catid);
      if ($category->category_parent > 0){
          return true;
      }
      return false;
    }
  ?>
  <div class="special-cat">
    <div class="container">
      <div class="special-cat__links">
        <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          <?php $main_cat = 'proizvodi'; ?>
        <?php endif; ?>
        <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
          <?php $main_cat = 'products'; ?>
        <?php endif; ?>
        <a href="<?php echo '/'.$main_cat.'/';?>"><?php echo $main_cat; ?></a>
        <i class="fa-solid fa-chevron-right"></i>
        <?php  if($parent_cat_id) { ?>
          <a href="<?php echo '/kategorija-proizvoda'.'/'.$parrent_cat[count($parrent_cat)-1]; ?>"><?php echo $parrent_cat[count($parrent_cat)-1]; ?></a>
          <i class="fa-solid fa-chevron-right"></i>
        <?php } ?>
        
        <a class="bolder" href="<?php echo $current_url; ?>"><?php echo $cat->name; ?></a>
      </div>
      <div class="row">
        <div class="col-12">
          <section class="page-header">
            <h1>
              <?php if($headerTitle):?>
                <?php echo $headerTitle; ?>
              <?php else : ?>
                <?php echo single_cat_title(); ?>
              <?php endif; ?>
            </h1>
          </section>
        </div>
        <div class="col-12 col-lg-8">
          <div class="row">
            <div class="col-12">
              <section class="page-header">
                  <div class="row">
                    <div class="col-12">
                      <?php if( $headerBackground ): ?>
                        <img src="<?php echo $headerBackground; ?>" />
                      <?php endif; ?>
                      <?php if ($headerText) : ?>
                        <p><?php echo $headerText; ?></p>
                      <?php endif; ?>
                    </div>
                  </div>
              </section>

            </div>
            <div class="col-12">
              <div class="container shop-archive"> <?php
                /**
                 * Hook: woocommerce_before_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                 * @hooked woocommerce_breadcrumb - 20
                 * @hooked WC_Structured_Data::generate_website_data() - 30
                 */
                ?>
                <header class="woocommerce-products-header">
                  <?php
                  /**
                   * Hook: woocommerce_archive_description.
                   *
                   * @hooked woocommerce_taxonomy_archive_description - 10
                   * @hooked woocommerce_product_archive_description - 10
                   */
                  do_action( 'woocommerce_archive_description' );
                  ?>
                </header>
                <?php
                if ( woocommerce_product_loop() ) {

                /**
                 * Hook: woocommerce_before_shop_loop.
                 *
                 * @hooked woocommerce_output_all_notices - 10
                 * @hooked woocommerce_result_count - 20
                 * @hooked woocommerce_catalog_ordering - 30
                 */

                woocommerce_product_loop_start();

                if ( wc_get_loop_prop( 'total' ) ) { ?>
                  <h2>
                    <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
                    Proizvodi
                    <?php endif; ?>
                    <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
                    Products
                    <?php endif; ?>
                  </h2>
                  <div class="row">
                    <?php while ( have_posts() ) {
                      the_post(); ?>
                      <div class="col-12">	
                        <div class="products__single">
                          <?php $current_post_id = get_the_id(); ?>
                          <h4><?php echo the_title(); ?></h4>
                          <?php if( have_rows('additional_info',$current_post_id) ): ?>
                            <div class="additional-info">
                              <div class="row">
                                <?php while( have_rows('additional_info',$current_post_id) ) : the_row(); ?>
                                  <div class="col-lg-4">
                                  <?php if(get_sub_field('doziranje')) :
                                      $sub_field = get_sub_field_object('doziranje'); ?>
                                      <p><small><?php echo $sub_field['label'] . ': ' ?></small>&nbsp;<strong><?php echo get_sub_field('doziranje'); ?></strong></p>
                                    <?php endif ?>
                                  </div>
                                  <div class="col-lg-4">
                                  <?php if(get_sub_field('pakovanje')) :
                                      $sub_field = get_sub_field_object('pakovanje'); ?>
                                      <p><small><?php echo $sub_field['label'] . ': ' ?></small>&nbsp;<strong><?php echo get_sub_field('pakovanje'); ?></strong></p>
                                    <?php endif ?>
                                  </div>
                                  <div class="col-lg-4">
                                    <?php if(get_sub_field('rok_trajanja')) :
                                      $sub_field = get_sub_field_object('rok_trajanja'); ?>
                                      <p><small><?php echo $sub_field['label'] . ': ' ?></small>&nbsp;<strong><?php echo get_sub_field('rok_trajanja'); ?></strong></p>
                                    <?php endif ?>
                                  </div>
                                <?php endwhile; ?>
                              </div>
                            </div>
                          <?php	endif; ?>
                          <?php if(get_the_content()) : ?>
                            <p class="description"><?php echo get_the_content(); ?></p>
                          <?php	endif; ?>
                        </div>
                      </div>
                    <?php } ?>
                  </div>
                <?php }

                woocommerce_product_loop_end();

                  /**
                   * Hook: woocommerce_after_shop_loop.
                   *
                   * @hooked woocommerce_pagination - 10
                   */
                  do_action( 'woocommerce_after_shop_loop' );
                } else {
                  /**
                   * Hook: woocommerce_no_products_found.
                   *
                   * @hooked wc_no_products_found - 10
                   */
                  do_action( 'woocommerce_no_products_found' );
                }

                /**
                 * Hook: woocommerce_after_main_content.
                 *
                 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                 */
                do_action( 'woocommerce_after_main_content' );

                /**
                 * Hook: woocommerce_sidebar.
                 *
                 * @hooked woocommerce_get_sidebar - 10
                 */
                ?>

              </div> 
            </div>
          </div>
        <!-- </div> -->
        <div class="col-12 col-lg-4">
          <div class="special-cat__right-side">

            <?php $term_id  = get_queried_object()->term_id; ?>
            <?php $taxonomy = get_queried_object()->taxonomy; ?>
            <?php $barTitle = get_field('bar_title', 'options', $taxonomy . '_' . $term_id); ?>
            <?php $queried_object = get_queried_object(); ?>
          
            <?php if($show_flyers) : ?>
              <?php if($header_benefits) : ?>
                <h2>
                  <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
                    Benefiti:
                  <?php endif; ?>
                  <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
                    Benefits:
                  <?php endif; ?>
                </h2>
                <div class="category-benefits">
                  <?php echo $header_benefits; ?>
                </div>
              <?php endif; ?>

            <?php else : ?>
              <?php if($header_benefits) : ?>
                <div class="special-cat__benefits">
                  <h5>
                    <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
                      Benefiti:
                    <?php endif; ?>
                    <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
                      Benefits:
                    <?php endif; ?>
                  </h5>
                  <div class="category-benefits">
                    <?php echo $header_benefits; ?>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>

            <?php if($show_flyers) : ?>
          
              <?php if($use_default_flyers) : ?>
                <?php if(have_rows('flyer', 'options', $queried_object) ) : ?>
                  <div class="flyers">
                    <div class="flyers__wrapper">
                      <h6 class="flyers-download-text"><?php echo $barTitle; ?></h6>
                      <?php while(have_rows('flyer', 'options', $queried_object) ) : the_row(); 
                        $flyer_link = get_sub_field('flyer_link','options');
                        if( $flyer_link ): 
                          $link_url = $flyer_link['url'];
                          $link_title = $flyer_link['title'];
                          ?>
                          <div class="flyer">
                            <a href="<?php echo esc_url( $link_url ); ?>" target="_blank">
                              <i class="fa-light fa-arrow-down flyer-arrow"></i>
                              <svg class="flyer-image" width="42" viewBox="0 0 26 43" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.8826 6.51607H25.2354C25.6578 6.51607 26 6.80791 26 7.16754V42.3485C26 42.7085 25.6578 43 25.2354 43H0.765581C0.343136 43 0.000953197 42.7085 0.000953197 42.3485V7.19288C-0.0127759 6.95263 0.121346 6.70608 0.432906 6.5804C0.45086 6.5729 0.469166 6.5663 0.487825 6.56001L18.8239 0.0507775C19.3274 -0.127984 19.8825 0.187246 19.8825 0.652151L19.8826 6.51607ZM1.53026 7.81902V41.697H24.4707V7.81902H1.53026ZM18.3532 6.51607V1.62975L4.58899 6.51607H18.3532ZM6.11835 26.0615C5.6959 26.0615 5.35372 25.7697 5.35372 25.41C5.35372 25.0501 5.6959 24.7586 6.11835 24.7586H19.8826C20.305 24.7586 20.6472 25.0501 20.6472 25.41C20.6472 25.7697 20.305 26.0615 19.8826 26.0615H6.11835ZM6.11835 20.8495C5.6959 20.8495 5.35372 20.5576 5.35372 20.198C5.35372 19.8381 5.6959 19.5465 6.11835 19.5465H19.8826C20.305 19.5465 20.6472 19.8381 20.6472 20.198C20.6472 20.5576 20.305 20.8495 19.8826 20.8495H6.11835ZM6.11835 31.2737C5.6959 31.2737 5.35372 30.9818 5.35372 30.6222C5.35372 30.2623 5.6959 29.9707 6.11835 29.9707H19.8826C20.305 29.9707 20.6472 30.2623 20.6472 30.6222C20.6472 30.9818 20.305 31.2737 19.8826 31.2737H6.11835Z" fill="#31312F"/></svg>
                              <h6 class="flyer-text"><?php echo esc_html( $link_title ); ?></h6>
                            </a>
                          </div>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </div>    
                  </div> 
                <?php endif; ?>
              <?php else : ?>
                <?php if(have_rows('header_flyers', $taxonomy . '_' . $term_id)) : ?>
                  <div class="flyers">
                    <div class="flyers__wrapper">
                      <h6 class="flyers-download-text"><?php echo $barTitle; ?></h6>
                      <?php while(have_rows('header_flyers', $taxonomy . '_' . $term_id) ) : the_row(); ?>
                        <?php
                        $flyer_name = get_sub_field('flyer_name');
                        $flyer_file = get_sub_field('flyer_file');
                        ?>
                        <?php
                        if( $flyer_file ): 
                          ?>
                          <div class="flyer <?php if( $flyer_file ) {echo  $flyer_file['url']; } ?>">
                            <a href="<?php echo $flyer_file['url']; ?>" target="_blank">
                              <i class="fa-light fa-arrow-down flyer-arrow"></i>
                              <svg class="flyer-image" width="42" viewBox="0 0 26 43" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.8826 6.51607H25.2354C25.6578 6.51607 26 6.80791 26 7.16754V42.3485C26 42.7085 25.6578 43 25.2354 43H0.765581C0.343136 43 0.000953197 42.7085 0.000953197 42.3485V7.19288C-0.0127759 6.95263 0.121346 6.70608 0.432906 6.5804C0.45086 6.5729 0.469166 6.5663 0.487825 6.56001L18.8239 0.0507775C19.3274 -0.127984 19.8825 0.187246 19.8825 0.652151L19.8826 6.51607ZM1.53026 7.81902V41.697H24.4707V7.81902H1.53026ZM18.3532 6.51607V1.62975L4.58899 6.51607H18.3532ZM6.11835 26.0615C5.6959 26.0615 5.35372 25.7697 5.35372 25.41C5.35372 25.0501 5.6959 24.7586 6.11835 24.7586H19.8826C20.305 24.7586 20.6472 25.0501 20.6472 25.41C20.6472 25.7697 20.305 26.0615 19.8826 26.0615H6.11835ZM6.11835 20.8495C5.6959 20.8495 5.35372 20.5576 5.35372 20.198C5.35372 19.8381 5.6959 19.5465 6.11835 19.5465H19.8826C20.305 19.5465 20.6472 19.8381 20.6472 20.198C20.6472 20.5576 20.305 20.8495 19.8826 20.8495H6.11835ZM6.11835 31.2737C5.6959 31.2737 5.35372 30.9818 5.35372 30.6222C5.35372 30.2623 5.6959 29.9707 6.11835 29.9707H19.8826C20.305 29.9707 20.6472 30.2623 20.6472 30.6222C20.6472 30.9818 20.305 31.2737 19.8826 31.2737H6.11835Z" fill="#31312F"/></svg>
                              <h6 class="flyer-text"><?php echo $flyer_name; ?></h6>
                            </a>
                          </div>
                        <?php endif; ?>
                      <?php endwhile; ?>
                    </div>    
                  </div> 
                <?php endif; ?>
              <?php endif; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php else : ?>
  
<section class="page-header" style="background-image: url('<?php echo $headerBackground; ?>')">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-5">
        <h1>
          <?php if($headerTitle):?>
            <?php echo $headerTitle; ?>
          <?php else : ?>
            <?php if ( $obj_id) : ?>
              <?php echo single_cat_title(); ?>
            <?php else : ?>
              <?php if( $products_title) : ?>
                <?php echo $products_title; ?>
              <?php endif; ?>
            <?php endif; ?>
          <?php endif; ?>
        </h1>
      </div>
      <div class="col-12 col-lg-7">
        <?php if ($headerText) : ?>
          <h4><?php echo $headerText; ?></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <div class="header-text-mobile text-center">
    <?php if ($headerText) : ?>
        <h4><?php echo $headerText; ?></h4>
    <?php endif; ?>
  </div>
</div>

<div class="container shop-archive"> <?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
?>
<header class="woocommerce-products-header">
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) { ?>
		<div class="row">
			<?php while ( have_posts() ) {
				the_post(); ?>
				<div class="col-12 col-md-6 col-lg-4 col-xl-3 product p-3">			
					<div class="img-wrapper">
						<!-- <a href="<?php //echo the_permalink(); ?>"> -->
							<?php echo the_post_thumbnail(); ?>
						<!-- </a> -->
					</div>
					<h3><?php echo the_title(); ?></h3>
					<p><?php echo wp_trim_words( get_the_excerpt(), 5, '...' );?></p>
					<!-- <?php //if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          	<a href="<?php //echo the_permalink(); ?>">Pročitajte još <i class="fa-solid fa-chevron-right"></i></a>
          <?php //endif; ?>
          <?php //if( ICL_LANGUAGE_CODE == 'en' ) : ?>
            <a href="<?php //echo the_permalink(); ?>">Read more <i class="fa-solid fa-chevron-right"></i></a>
          <?php //endif; ?> -->
				</div>
			<?php } ?>
		</div>
	<?php }

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
?>
</div> 


  <?php $term_id  = get_queried_object()->term_id; ?>
  <?php $taxonomy = get_queried_object()->taxonomy; ?>

  <?php $barTitle = get_field('bar_title', 'options', $taxonomy . '_' . $term_id); ?>

  <?php $queried_object = get_queried_object(); ?>

<?php if(have_rows('flyer', 'options', $queried_object)) : ?>
  <div class="flyers">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="flyers__wrapper">
            <h6 class="flyers-download-text"><?php echo $barTitle; ?></h6>
            <?php while(have_rows('flyer', 'options', $queried_object)) : the_row(); 
              $flyer_link = get_sub_field('flyer_link','options');
              if( $flyer_link ): 
                $link_url = $flyer_link['url'];
                $link_title = $flyer_link['title'];
                ?>
                <div class="flyer">
                  <a href="<?php echo esc_url( $link_url ); ?>" target="_blank">
                    <i class="fa-light fa-arrow-down flyer-arrow"></i>
                    <svg class="flyer-image" width="42" viewBox="0 0 26 43" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.8826 6.51607H25.2354C25.6578 6.51607 26 6.80791 26 7.16754V42.3485C26 42.7085 25.6578 43 25.2354 43H0.765581C0.343136 43 0.000953197 42.7085 0.000953197 42.3485V7.19288C-0.0127759 6.95263 0.121346 6.70608 0.432906 6.5804C0.45086 6.5729 0.469166 6.5663 0.487825 6.56001L18.8239 0.0507775C19.3274 -0.127984 19.8825 0.187246 19.8825 0.652151L19.8826 6.51607ZM1.53026 7.81902V41.697H24.4707V7.81902H1.53026ZM18.3532 6.51607V1.62975L4.58899 6.51607H18.3532ZM6.11835 26.0615C5.6959 26.0615 5.35372 25.7697 5.35372 25.41C5.35372 25.0501 5.6959 24.7586 6.11835 24.7586H19.8826C20.305 24.7586 20.6472 25.0501 20.6472 25.41C20.6472 25.7697 20.305 26.0615 19.8826 26.0615H6.11835ZM6.11835 20.8495C5.6959 20.8495 5.35372 20.5576 5.35372 20.198C5.35372 19.8381 5.6959 19.5465 6.11835 19.5465H19.8826C20.305 19.5465 20.6472 19.8381 20.6472 20.198C20.6472 20.5576 20.305 20.8495 19.8826 20.8495H6.11835ZM6.11835 31.2737C5.6959 31.2737 5.35372 30.9818 5.35372 30.6222C5.35372 30.2623 5.6959 29.9707 6.11835 29.9707H19.8826C20.305 29.9707 20.6472 30.2623 20.6472 30.6222C20.6472 30.9818 20.305 31.2737 19.8826 31.2737H6.11835Z" fill="#31312F"/></svg>
                    <h6 class="flyer-text"><?php echo esc_html( $link_title ); ?></h6>
                  </a>
                </div>
              <?php endif; ?>
            <?php endwhile; ?>
          </div>    
        </div>    
      </div>   
    </div>
  </div> 
<?php endif; ?>

<?php endif; ?>
<?php get_footer( 'shop' ); ?>