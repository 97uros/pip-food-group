<?php get_header(); ?>
<section>
  <?php get_template_part('template-parts/page', 'header') ?>
</section>
<div class="company">
  <section class="container about-us-top p-0">
    <div class="row">
      <div class="col-12 col-xxl-6 about-us-intro-text">
        <p><?php echo the_field('about_us_intro_text'); ?></p>
      </div>
      <div class="col-12 col-xxl-6 about-us-gallery-top">
        <div class="row" data-masonry='{"percentPosition": true }'>
          <?php if( have_rows('about_us_gallery_top') ):
            while( have_rows('about_us_gallery_top') ) : the_row();
              $image = get_sub_field('images'); ?>
              <div class="image-wrap">
                <img class="img-fluid" src="<?php echo $image; ?>">
              </div>
            <?php endwhile;
          endif; ?>
        </div>
      </div>
      <div class="col-12 col-lg-6 about-us-gallery-top-mobile">
        <div class="owl-carousel owl-carousel2 owl-theme">
          <?php if( have_rows('about_us_gallery_top') ):
            while( have_rows('about_us_gallery_top') ) : the_row();
              $image = get_sub_field('images'); ?>
              <div class="item">
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
  <section class="container company-our-history">
    <h2 class="text-center"><?php echo the_field('our_history_heading'); ?></h2>
    <div class="row">
      <div class="col-12 col-xl-5">
        <div id="carouselExampleDark" class="history-slider carousel carousel-dark carousel-fade slide" data-bs-ride="false">
          <div class="carousel-inner">
            <?php if( have_rows('our_history_cards') ):
              while( have_rows('our_history_cards') ) : the_row();
                $image = get_sub_field('card_image');
                $title = get_sub_field('card_title');
                $year = get_sub_field('card_year'); ?>
                <div class="carousel-item year-info <?php if (get_row_index() == 1) echo 'active'; ?>" id="year<?php echo get_row_index(); ?>">
                  <div class="card border-0">
                    <div class="card-img-wrapper">
                      <img src="<?php echo $image; ?>" class="card-img-top">
                    </div>
                    <div class="card-body">
                      <h5 class="card-title text-uppercase"><?php echo $title; ?></h5>
                      <h1 class="card-year"><?php echo $year; ?></h1>
                    </div>
                  </div>
                </div>
              <?php endwhile;
            endif; ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
      <div class="col-12 col-xl-7 history-ellipse text-center">
        <?php echo get_template_part('template-parts/our', 'history'); ?>
      </div>
    </div>
  </section>
  <section class="quality text-center">
    <h2><?php echo the_field('quality_heading', 'options'); ?></h2>
    <p><?php echo the_field('quality_text', 'options') ?></p>
    <?php if( have_rows('quality_cards', 'options') ): ?>
      <div class="quality-cards row">
        <?php while( have_rows('quality_cards', 'options') ) : the_row();
          $qimage = get_sub_field('quality_image', 'options');
          $qtitle = get_sub_field('quality_title', 'options'); ?>
          <div class="col-6 col-md-4 col-lg-3 card border-0">
            <div class="quality__card-wrapper">
              <div class="card-img-top">
                <img class="img-fluid" src="<?php echo $qimage; ?>" width="416">
              </div>
              <div class="card-body">
                <h6 class="card-title"><?php echo $qtitle; ?></h6>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </section>
  <div class="container">
    <div class="row">
      <div class="col">
        <hr class="hr-quality">
      </div>
    </div>
  </div>
  <section class="container lab-block">
    <div class="row">
      <div class="col-12 col-xl-6 lab-block-gallery-wrapper">
        <div class="row lab-block-gallery" data-masonry='{"percentPosition": true }'>
          <?php  if( have_rows('about_us_gallery_bottom') ): ?>
              <?php while( have_rows('about_us_gallery_bottom') ) : the_row();
                $mainImage = get_sub_field('main_image'); 
                $images = get_sub_field('images'); ?>
                  <div class="main-image-wrap col-12">
                    <img id="current" class="img-fluid" src="<?php echo $mainImage; ?>">  
                  </div>
                  <div class="thumb-wrap row">
                    <?php foreach($images as $image): ?>                                    
                      <div class="image-wrap col-4 mb-3">
                        <img src="<?php echo $image; ?>" class="img-fluid thumb">                            
                      </div>
                    <?php endforeach; ?>
                  </div>
              <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <h2 class="text-center lab-block-heading-mobile"><?php echo the_field('lab_block_heading'); ?></h2>
        <div class="lab-block-gallery-mobile owl-carousel owl-carousel2 owl-theme">
          <?php  if( have_rows('about_us_gallery_bottom') ): ?>
              <?php while( have_rows('about_us_gallery_bottom') ) : the_row();
                $mainImage = get_sub_field('main_image'); 
                $images = get_sub_field('images'); ?>                
                  <?php foreach($images as $image): ?>     
                    <div class="item">                               
                      <img src="<?php echo $image; ?>" class="img-fluid">   
                    </div>                            
                  <?php endforeach; ?> 
              <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-12 col-xl-6 lab-block-text">
        <h2><?php echo the_field('lab_block_heading'); ?></h2>
        <p><?php echo the_field('lab_block_text'); ?></p>
        <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          <a class="lab-block-link" href="<?php echo site_url('/laboratorija'); ?>">Pogledajte više&nbsp;<i class="fa fa-solid fa-arrow-right"></i></a>
        <?php endif; ?>
        <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
          <a class="lab-block-link" href="<?php echo site_url('/en/laboratorija'); ?>">See more&nbsp;<i class="fa fa-solid fa-arrow-right"></i></a>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>
<?php echo get_template_part('template-parts/cta', 'block'); ?>

<?php get_footer(); ?>