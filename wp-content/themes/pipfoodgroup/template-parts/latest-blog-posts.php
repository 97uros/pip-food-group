<section class="latest-blog-posts">
  <div class="container blog-section">
    <div class="row">
      <div class="col">
        <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          <h2 class="text-center">Preporučujemo</h2>
        <?php endif; ?>
        <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
          <h2 class="text-center">We recommend</h2>
        <?php endif; ?>
      </div>
    </div>
    <?php $query = new WP_Query( array(
      'posts_per_page' => 3,
      'post_type' => 'post',
      'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
      'orderby'   => array(
          'date' =>'DESC',
        )
    )); ?>
    
    <?php if($query->have_posts()) :  ?>
      <div class="row">
        <?php while($query->have_posts()) : $query->the_post(); ?>
          <div class="col-12 col-md-6 col-lg-4 card border-0 blog-post">
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
              <h5 class="card-title text-uppercase"><?php echo the_title(); ?></h5>
              <p class="card-text"><?php echo wp_trim_words(get_the_content(), 15) ?></p>
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
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>