<section class="page-header" style="background-image: url('<?php echo the_field('header_background'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-5">
        <h1><?php echo the_field('header_title'); ?></h1>
      </div>
      <div class="col-12 col-lg-7">
        <?php if (get_field('header_text')) : ?>
          <h4><?php echo the_field('header_text'); ?></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<div class="header-text-mobile text-center">
  <?php if (get_field('header_text')) : ?>
      <h4><?php echo the_field('header_text'); ?></h4>
  <?php endif; ?>
</div>