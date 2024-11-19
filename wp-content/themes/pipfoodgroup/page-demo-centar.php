<?php get_header(); ?>
<div class="demo-centar">
  <section class="demo-centar-hero">
    <?php 
      $demo_centar_hero_video = get_field('demo_centar_hero_video');
    ?>
    <div class="hero-video">
      <?php if($demo_centar_hero_video) : ?>
        <video  oncontextmenu="return false;" type="video/mp4" contols loop autoplay muted src="<?php echo $demo_centar_hero_video; ?>"></video>
      <?php endif; ?>
      <h1><?php echo the_title(); ?></h1>
    </div>
   <div class="container">
    <div class="row">
      <div class="col">
        <div class="hero-container">
          <p><?php echo the_field('demo_centar_intro_text'); ?></p>
        </div>
      </div>
    </div>
   </div>
  </section>
  <section class="demo-centar-intro-content text-center">
  <div class="container">
    <div class="row">
      <?php if( have_rows('demo_centar_intro_content') ):
        while( have_rows('demo_centar_intro_content') ) : the_row();
          $image = get_sub_field('image');
          $title = get_sub_field('title');
          $text = get_sub_field('text'); ?>
          <div class="col-12 col-md-6 content-group">
            <img class="img-fluid" src="<?php echo $image; ?>">
            <h4><?php echo $title; ?></h4>
            <p><?php echo $text; ?></p>
          </div>
        <?php endwhile;
      endif; ?>
    </div>
  </div>
  </section>
  <section class="demo-centar-form-block">
    <div class="container">
      <div class="row">
        <?php 
         $demo_centar_contact_form = get_field('demo_centar_contact_form');
        ?>
    
        <div class="col-12 col-xl-6 form">
          <?php if($demo_centar_contact_form) : ?>
            <?php echo do_shortcode($demo_centar_contact_form); ?>
            <?php endif; ?>
        </div>
        <?php $img = get_field('demo_centar_form_block_image'); ?>
        <?php if($img) : ?>
          <div class="col-12 col-xl-6 form-block-image">
            <svg class="svg-back" width="499" height="362" viewBox="0 0 604 471" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse rx="307" ry="223" transform="matrix(-0.94782 -0.318805 0.317785 -0.948163 302.144 235.29)" stroke="white" stroke-width="5"/>
            </svg>
            <svg class="svg-front" width="499" height="362" viewBox="0 0 619 452" fill="none" xmlns="http://www.w3.org/2000/svg">
              <ellipse rx="307" ry="223" transform="matrix(0.999211 -0.0397201 0.0395789 0.999216 309.448 225.947)" stroke="white" stroke-width="5"/>
            </svg>
            <div class="image-wrapper">
              <div class="image-wrapper__frame" style="background-image: url( <?php echo the_field('demo_centar_form_block_image'); ?>)"></div>
            </div>  
          </div>
        <?php endif ; ?>
      </div>
    </div>
  </section>
  <?php echo get_template_part('template-parts/team', 'block');?>
</div>
<?php get_footer(); ?>