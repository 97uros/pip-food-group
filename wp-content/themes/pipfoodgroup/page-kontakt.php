<?php get_header(); ?>
<main class="main contact">
  <section class="contact__locations">
    <div class="contact__locations-slider">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="contact__title d-block d-lg-none">
              <?php echo get_the_title(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="locations-slider">
        <?php get_template_part('template-parts/map', 'slider'); ?>
      </div>
    </div>
    <div class="contact__map">
      <?php get_template_part('template-parts/map-contact'); ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>