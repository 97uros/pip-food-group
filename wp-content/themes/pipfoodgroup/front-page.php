<?php get_header(); ?>

<section class="container hero-block">
  <?php 
    $choice = get_field('choice');
    $image = get_field('image');
    $video_mp4 = get_field('video_mp4');
  ?>
  <div class="row hero-row">
    <div class="col-12 col-lg-6">
      <h1><?php echo the_field('hero_heading'); ?></h1>
      <h4><?php echo the_field('hero_text'); ?></h4>
      <div class="hero-button">
        <button class="btn btn-primary"><?php echo the_field('hero_link_text') ?>&nbsp;<i class="fa-solid fa-arrow-right"></i>
      </div>
      </button>
    </div>
    <div class="hero-video col-12 col-lg-6">
      <svg class="svg-back" width="604" height="471" viewBox="0 0 604 471" fill="none" xmlns="http://www.w3.org/2000/svg">
        <ellipse rx="307" ry="223" transform="matrix(-0.94782 -0.318805 0.317785 -0.948163 302.144 235.29)" stroke="white" stroke-width="5"/>
      </svg>
      <svg class="svg-front" width="619" height="452" viewBox="0 0 619 452" fill="none" xmlns="http://www.w3.org/2000/svg">
        <ellipse rx="307" ry="223" transform="matrix(0.999211 -0.0397201 0.0395789 0.999216 309.448 225.947)" stroke="white" stroke-width="5"/>
      </svg>
      <?php if($choice) : ?>
        <?php if( !empty( $image ) ): ?>
          <div class="video-wrapper">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          </div>
        <?php endif; ?>
      <?php else : ?>
        <?php if($video_mp4) : ?>
          <div class="video-wrapper">
            <video type="video/mp4" contols loop autoplay muted src="<?php echo  $video_mp4; ?>"></video>
          </div> 
        <?php endif;  ?>
      <?php endif; ?>  
    </div>
  </div>
</section>
<section class="container logos text-center">
<hr>
  <div class="row justify-content-center logos-desktop">
    <?php if( have_rows('pip_logos') ):
      while( have_rows('pip_logos') ) : the_row();
        $logo = get_sub_field('pip_logo'); ?>
        <div class="col-4 col-md-2 logo">
          <img src="<?php echo $logo; ?>">
        </div>
      <?php endwhile;
    endif; ?>
  </div>
  <div class="logos-mobile owl-carousel owl-carousel3 owl-theme">
    <?php if( have_rows('pip_logos') ):
      while( have_rows('pip_logos') ) : the_row();
        $logo = get_sub_field('pip_logo'); ?>
        <div class="logo">
          <img src="<?php echo $logo; ?>">
        </div>
      <?php endwhile;
    endif; ?>
  </div>
  <hr>
</section>
<section class="container home-about-us text-center">
  <h2><?php echo the_field('about_us_heading'); ?></h2>
  <p><?php echo the_field('about_us_text') ?></p>
  <div class="about-us-images row">
  <?php if( have_rows('about_us_images') ):
      while( have_rows('about_us_images') ) : the_row();
        $image = get_sub_field('about_us_image'); ?>
        <div class="col-12 col-md-6 col-lg-4 img-wrapper">
          <img class="img-fluid" src="<?php echo $image; ?>">
        </div>
      <?php endwhile;
    endif; ?>
  </div>
  <div class="about-us-images-mobile owl-carousel owl-carousel2 owl-theme">
  <?php if( have_rows('about_us_images') ):
      while( have_rows('about_us_images') ) : the_row();
        $image = get_sub_field('about_us_image'); ?>
        <div class="item">
          <img class="img-fluid" src="<?php echo $image; ?>">
        </div>
      <?php endwhile;
    endif; ?>
  </div>
</section>
<section class="container locations">
  <h2 class="text-center locations-heading"><?php echo the_field('locations_heading'); ?></h2>
  <div class="row">
    <div class="locations-map col-12 col-md-5 col-lg-6">
      <?php get_template_part('template-parts/map'); ?>
    </div>
    <div class="locations-slider col-12 col-md-6 col-lg-5">
      <?php get_template_part('template-parts/map', 'slider'); ?>
    </div>
  </div>
</section>
<?php echo get_template_part('template-parts/quality'); ?>
<div class="container">
  <div class="row">
    <div class="col">
      <hr>
    </div>
  </div>
</div>
<section class="container latest-blog-posts-home">
  <div class="row">
    <div class="col-12 col-md-4">
      <h2><?php echo the_field('home_blog_posts_heading'); ?></h2>
      <p><?php echo the_field('home_blog_posts_text'); ?></p>
      <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
        <a href="<?php echo site_url('/pipoklagija') ?>">Pogledajte više&nbsp;<i class="fa fa-solid fa-arrow-right"></i></a>
      <?php endif; ?>
      <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
        <a href="<?php echo site_url('/pipoklagija') ?>">See more&nbsp;<i class="fa fa-solid fa-arrow-right"></i></a>
      <?php endif; ?>
    </div>
    <div class="col-12 col-md-8">
    <?php $query = new WP_Query( array(
        'posts_per_page' => 2,
        'post_type' => 'post',
        'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        'orderby'   => array(
            'date' =>'DESC',
          )
      )); ?>
        <div class="row">
          <?php while($query->have_posts()) {
          $query->the_post(); ?>
            <div class="col-12 col-md-6 card border-0 blog-post">
              <div class="card-image-wrapper">
                <a href="<?php echo the_permalink(); ?>">
                  <?php the_post_thumbnail('thumbnail', array('class' => 'card-img-top img-fluid')); ?>
                </a>
              </div>
              <div class="card-body">
                <div class="card-info">
                  <?php echo the_category(',&nbsp;'); ?>
                  <time class="info-date" datetime="<?php echo get_the_date('M d, Y'); ?>" itemprop="datePublished">
                  •
                  <?php echo get_the_date('M d, Y'); ?>
                  </time>
                </div>
                <h5 class="card-title"><?php echo the_title(); ?></h5>
                <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20) ?></p>
                <a href="<?php the_permalink(); ?>">
                <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
                  <button class="btn btn-primary">Pročitajte više&nbsp;<i class="fa fa-solid fa-arrow-right"></i></button>
                <?php endif; ?>
                <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
                  <button class="btn btn-primary">Read more&nbsp;<i class="fa fa-solid fa-arrow-right"></i></button>
                <?php endif; ?>
                </a>
              </div>
            </div>
          <?php } ?>
          <?php wp_reset_postdata(); ?>
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
<section class="container join-our-team">
    <div class="row">
      <div class="col-lg-6">
        <img class="img-fluid" src="<?php echo the_field('join_image') ?>">
      </div>
      <div class="col-lg-6">
        <h3><?php echo the_field('join_heading') ?></h2>
        <h6><?php echo the_field('join_subheading') ?></h6>
        <p><?php echo the_field('join_text') ?></p>
        <a href="<?php echo site_url('/zaposljavamo'); ?>">
          <button class="btn btn-secondary"><?php echo the_field('join_link_text') ?>&nbsp;<i class="fa fa-solid fa-arrow-right"></i></button>
        </a>
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
<?php echo get_template_part('template-parts/testimonials'); ?>
<?php echo get_template_part('template-parts/cta', 'block'); ?>
<?php get_footer(); ?>