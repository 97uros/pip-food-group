<section class="container quality text-center">
  <h2><?php echo the_field('quality_heading', 'options'); ?></h2>
  <p><?php echo the_field('quality_text', 'options') ?></p>
  <?php if( have_rows('quality_cards', 'options') ): ?>
    <div class="quality-cards row">
      <?php while( have_rows('quality_cards', 'options') ) : the_row();
        $qimage = get_sub_field('quality_image', 'options');
        $qtitle = get_sub_field('quality_title', 'options'); ?>
        <div class="col-3 card border-0">
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