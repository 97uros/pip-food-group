<?php get_header(); ?>
<div class="lab">
  <section>
    <?php get_template_part('template-parts/page', 'header') ?>
  </section>
  <section class="container lab-top">
    <div class="row">
      <div class="col-12 col-lg-6 lab-intro-text">
        <p><?php echo the_field('lab_intro_text'); ?></p>
      </div>
      <div class="col-12 col-lg-6 lab-gallery-top">
        <div class="row" data-masonry='{"percentPosition": true }'>
          <?php if( have_rows('about_us_gallery_top') ):
            while( have_rows('about_us_gallery_top') ) : the_row();
              $image = get_sub_field('images'); ?>
              <div class="image-wrap col-md-6">
                <img class="img-fluid" src="<?php echo $image; ?>">
              </div>
            <?php endwhile;
          endif; ?>
        </div>
      </div>
      <div class="lab-gallery-top-mobile">
        <div class="owl-carousel owl-carousel2 owl-theme">
          <?php if( have_rows('about_us_gallery_top') ):
            while( have_rows('about_us_gallery_top') ) : the_row();
              $image = get_sub_field('images'); ?>
              <div class="image-wrap col-md-6">
                <img class="img-fluid" src="<?php echo $image; ?>">
              </div>
            <?php endwhile;
          endif; ?>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>
  </div>
  <section class="lab-content-wrap">
    <?php 
    $args = array(
      'post_type' => 'masine',
      'posts_per_page' => -1
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) {
      while ( $query->have_posts() ) {
        $query->the_post();
        ?>
        <div class="lab-content-wrap__wrapper">
          <div class="container">
            <div class="lab-content">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-5 image-wrapper">
                  <?php echo the_post_thumbnail(); ?>
                </div>
                <div class="col-12 col-md-6 col-lg-7 text-wrapper">
                  <h3><?php the_title(); ?></h3>
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    } 
    wp_reset_postdata(); ?>
  </section>
  <div class="container">
    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>
  </div>
  <?php echo get_template_part('template-parts/team', 'block'); ?>
</div>

<?php get_footer(); ?>