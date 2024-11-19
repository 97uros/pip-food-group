<section class="testimonials">
  <h2 class="text-center"><?php echo the_field('testimonials_heading') ?></h2>
  <div class="owl-carousel owl-carousel1 owl-theme">
    <?php if( have_rows('testimonials') ):
      while( have_rows('testimonials') ) : the_row();
        $timage = get_sub_field('testimonial_image');
        $ttitle = get_sub_field('testimonial_title');
        $ttext = get_sub_field('testimonial_text');
        $tname = get_sub_field('testimonial_name'); 
        $tprofession = get_sub_field('testimonial_profession_title'); ?>
        <div class="item">
          <div class="card border-0">
            <div class="row">
              <div class="col-md-4 image-wrapper">
                <img src="<?php echo $timage; ?>" class="img-fluid">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">                    
                    <?php echo $ttitle; ?>
                  </h4>
                  <p class="card-text"><?php echo $ttext; ?></p>
                  <p class="card-info"><?php echo $tname; ?><small class="text-muted">&nbsp;|&nbsp;<?php echo $tprofession; ?></small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile;
    endif; ?>
  </div>
</section>