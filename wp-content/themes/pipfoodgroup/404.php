<?php get_header(); ?>
<section class="page-header" style="background-image: url('<?php echo the_field('404_header_background', 'options'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h1><?php echo the_field('404_header_title', 'options'); ?></h1>
      </div>
      <div class="col-12 col-lg-6">
        <?php if (get_field('404_header_text')) : ?>
          <h4><?php echo the_field('404_header_text'); ?></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<div class="header-text-mobile text-center">
  <?php if (get_field('404_header_text')) : ?>
    <h4><?php echo the_field('404_header_text'); ?></h4>
  <?php endif; ?>
</div>
<div class="container text-center page-not-found">
  <div class="page-not-found__image">
    <?php the_field('404_image', 'options'); ?>
  </div>
  <div class="page-not-found__text">
    <h6><?php the_field('404_text', 'options'); ?></h6>
  </div>
  <?php $link = get_field('404_link', 'options'); ?>
    <?php if( $link ): ?>
        <?php 
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <div class="page-not-found__btn">
          <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
          <button class="btn btn-primary"><?php echo esc_html( $link_title ); ?></button>
        </a>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php echo get_template_part('template-parts/cta', 'block'); ?>
<?php get_footer(); ?>