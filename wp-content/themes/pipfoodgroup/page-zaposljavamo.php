<?php get_header(); ?>
  <?php get_template_part('template-parts/page', 'header') ?>
<section class="positions container">
<?php if( have_rows('positions') ):
  while( have_rows('positions') ) : the_row();
    $title = get_sub_field('position_title');
    $location = get_sub_field('position_location');
    $requirement = get_sub_field('position_requirement'); 
    $link = get_sub_field('position_link');
    ?>
    <div class="position row">
      <div class="col-12 col-lg-10">
        <h5><?php echo $title; ?>&nbsp;<i class="fa-solid fa-minus"></i><br><mark><?php echo $location; ?></mark></h5>
        <p><?php echo $requirement; ?></p>
      </div>
      <?php if( $link ): ?>
        <?php 
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <div class="col-12 col-lg-2 button">
          <a class="btn btn-secondary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      </div>
      <?php endif; ?>
    </div>
    <hr>
  <?php endwhile;
endif; ?>
</section>
<?php echo get_template_part('template-parts/cta', 'block'); ?>

<?php get_footer(); ?>