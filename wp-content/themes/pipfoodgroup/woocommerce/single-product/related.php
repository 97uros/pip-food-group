<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products">

		<?php
		if( ICL_LANGUAGE_CODE == 'sr' ) :
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Povezani proizvodi', 'woocommerce' ) );
		endif;
		if( ICL_LANGUAGE_CODE == 'en' ) :
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );
		endif;

		if ( $heading ) :
			?>
			<h2><?php echo esc_html( $heading ); ?></h2>
		<?php endif; ?>
		<?php woocommerce_product_loop_start(); ?>
			<div class="row">
				<?php foreach ( $related_products as $related_product ) : ?>
						<?php
						$post_object = get_post( $related_product->get_id() );
						setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found ?>
						<div class="col-12 col-lg-3 product">			
							<div class="img-wrapper">
								<a href="<?php echo the_permalink(); ?>">
									<?php echo the_post_thumbnail(); ?>
								</a>
							</div>
							<h3><?php echo the_title(); ?></h3>
							<p><?php echo wp_trim_words( get_the_excerpt(), 5, '...' );?></p>
							<?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          			<a href="<?php echo the_permalink(); ?>">Pročitajte još <i class="fa-solid fa-chevron-right"></i></a>
							<?php endif; ?>
							<?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
								<a href="<?php echo the_permalink(); ?>">Read more <i class="fa-solid fa-chevron-right"></i></a>
							<?php endif; ?>
						</div>
				<?php endforeach; ?>
			</div>

		<?php woocommerce_product_loop_end(); ?>

	</section>
	<?php
endif;

wp_reset_postdata();
