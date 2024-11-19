<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
} ?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="product-top">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php do_action( 'woocommerce_before_single_product' ); ?>
          <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
          <div class="summary entry-summary">
            <div class="category-top">
              <?php echo wc_get_product_category_list( $product->get_id()); ?>
            </div>
            <h1><?php echo woocommerce_template_single_title(); ?></h1>
            <p class="description"><?php echo get_the_content(); ?></p>
            <?php $table = get_field( 'preparation' );
            if ( ! empty ( $table ) ) { ?>
              <?php	if ( ! empty( $table['caption'] ) ) {	?>
                <h5><?php echo $table['caption']; ?> </h5>
              <?php	} ?>
              <table>
                <?php	if ( ! empty( $table['header'] ) ) { ?>
                    <thead>	
                      <tr>	
                        <?php	foreach ( $table['header'] as $th ) {	?>
                          <th>
                            <?php	echo $th['c']; ?>
                          </th>
                        <?php	} ?>		
                      </tr>	
                    </thead>
                <?php	}	?>
                  <tbody>	
                    <?php	foreach ( $table['body'] as $tr ) { ?>
                      <tr>		
                        <?php	foreach ( $tr as $td ) { ?>	
                          <td>
                            <li><?php	echo $td['c']; ?></li>
                          </td>
                        <?php	} ?>
                      </tr>
                    <?php	}	?>
                  </tbody>	
              </table> 
            <?php	} ?>
            <hr>
            <p class="additional-tip"><?php echo the_field('additional_tip'); ?></p>
            <?php echo woocommerce_template_single_meta(); ?>
              <?php if( have_rows('additional_info') ): ?>
                <div class="row additional-info">
                  <?php while( have_rows('additional_info') ) : the_row(); ?>
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
            <?php	endif; ?>
            <div class="row product-end">
              <div class="col-8">
                <?php echo add_content_after_addtocart(); ?>
              </div>
              <div class="download-text col-2">
              <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
                <p>Preuzmite flajer</p>
              <?php endif; ?>
              <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
                <p>Download the flyer</p>
              <?php endif; ?>
              </div>
              <div class="col-2">
                <?php if(get_field('product_flyer')) : ?>
                  <?php $product_flyer = get_field('product_flyer'); ?>
                <?php elseif (get_field('product_flyer' , 'options')) : ?>
                  <?php $product_flyer = get_field('product_flyer' , 'options'); ?>
                <?php endif; ?>
                <a class="flyer-btn" href="<?php echo $product_flyer['url']; ?>" target="_blank"><i class="fa-solid fa-file-arrow-down"></i></a>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
	</div>
  <div class="container">
    <div class="row">
      <div class="col">
        <?php echo woocommerce_output_product_data_tabs(); ?>
        <hr>
        <?php echo woocommerce_output_related_products(); ?>
        <?php echo woocommerce_upsell_display(); ?>
      </div>
    </div>
  </div>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
