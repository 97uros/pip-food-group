<?php
/*
Template Name: Search Results Page
*/
get_header(); ?>
<section class="page-header" style="background-image: url('<?php echo the_field('search_header_background', 'options'); ?>')">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <h1><?php echo the_field('search_header_title', 'options'); ?></h1>
      </div>
    </div>
  </div>
</section>
<div class="header-text-mobile text-center">
  <?php if (get_field('search_header_text')) : ?>
    <h4><?php echo the_field('search_header_text'); ?></h4>
  <?php endif; ?>
</div>
<div id="primary">
	<main id="main" class="site-main search">
  <?php global $wp_query; ?>
		<?php $search_term = get_search_query(); ?>
    <?php if(have_posts()) { ?>
     <div class="section-links container">
      <?php echo 'Pronađeno' ?>&nbsp;<strong><?php echo $wp_query->found_posts ?></strong>&nbsp;<?php echo 'rezultata iz oblasti:' ?>
        <?php
        $section_count = 0;
        $section_links = '';
        $args = array(
          'post_type' => 'product',
          's' => $search_term,
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
          $section_count++;
          $section_links .= '<a href="#products">Proizvodi</a>';
        }
        $args = array(
          'post_type' => 'post',
          's' => $search_term,
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
          if ( $section_count > 0 ) {
            $section_links .= ', ';
          }
          $section_count++;
          $section_links .= '<a href="#posts">Pipoklagija</a>';
        }
        $args = array(
          'post_type' => 'masine',
          's' => $search_term,
        );
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) {
          if ( $section_count > 0 ) {
            $section_links .= ', ';
          }
          $section_count++;
          $section_links .= '<a href="#laboratorija">Laboratorija</a>';
        }
        if ( $section_count > 0 ) {
          echo $section_links;
        }
      ?>
    </div>
    <?php } ?>
	<?php
    // Section 1: Products
		$args = array(
			'post_type' => 'product',
			's' => $search_term,
      'posts_per_page' => -1
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) { ?>
    <div id="products" class="container">
			<div class="search-heading">
        <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          <h2>Proizvodi</h2><hr>
        <?php endif; ?>
        <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
          <h2>Products</h2><hr>
        <?php endif; ?>
      </div>
      <div class="row p-0">
			<?php while ($query->have_posts() ) {
				$query->the_post(); ?>
				<div class="col-12 col-md-6 col-lg-3 product">			
					<div class="img-wrapper">
						<a href="<?php echo the_permalink(); ?>">
							<?php echo the_post_thumbnail(); ?>
						</a>
					</div>
					<h3><?php echo the_title(); ?></h3>
					<p><?php echo wp_trim_words( get_the_excerpt(), 5, '...' );?></p>
          <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          	<a href="<?php echo the_permalink(); ?>">Pročitajte još <i class="fa-solid fa-chevron-right"></i></a>
          <?php endif; ?>
          <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
            <a href="<?php echo the_permalink(); ?>">Read more <i class="fa-solid fa-chevron-right"></i></a>
          <?php endif; ?>
				</div>
			<?php } ?>
		  </div>
    </div>
		<?php }

		wp_reset_postdata();

		// Section 2: Posts
		$args = array(
			'post_type' => 'post',
			's' => $search_term,
      'posts_per_page' => -1
		);
		$query = new WP_Query( $args );

		if ( $query->have_posts() ) { ?>
    <div id="posts" class="container">
			<div class="search-heading">
        <h2>Pipoklagija</h2><hr>
      </div>
      <div class="row">
			<?php while ( $query->have_posts() ) {
				$query->the_post(); ?>
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
            <h5 class="card-title"><?php echo the_title(); ?></h5>
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
			<?php } ?>
      </div>
    </div>
	  <?php } 

		wp_reset_postdata(); ?>

  <?php  // Section 3: Laboratorija ?>
    <section id="laboratorija" class="lab-content-wrap">
    <?php 
    $args = array(
      'post_type' => 'masine',
      's' => $search_term,
      'posts_per_page' => -1
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) { ?>
      <div class="search-heading container">
        <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          <h2>Laboratorija</h2><hr>
        <?php endif; ?>
        <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
          <h2>Laboratory</h2><hr>
        <?php endif; ?>
      </div>
    <?php  while ( $query->have_posts() ) {
        $query->the_post();
        ?>
        <div class="lab-content-wrap__wrapper">
          <div class="container">
            <div class="lab-content">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-5 image-wrapper">
                  <?php echo the_post_thumbnail(); ?>
                </div>
                <div class="col-12 col-md-6 col-lg-7 text-wrapper">
                  <h3><?php the_title(); ?></h3>
                  <?php the_content(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    } ?>
  </section>
  <?php wp_reset_postdata(); ?>

  <?php
		$args = array(
      'post_type' => array('masine', 'post','product'),
			's' => $search_term,
      'posts_per_page' => -1
		);
		$query = new WP_Query( $args );
  ?>

	<?php	if ( ! $query->have_posts() ) { ?>
      <div class="search-no-results container text-center">
        <div class="search-no-results-image m-3">
          <?php the_field('search_no_results_image', 'options'); ?>
        </div>
        <div class="search-no-results-text mb-3">
          <h4><?php the_field('search_no_results_heading', 'options'); ?></h4>
          <p><?php the_field('search_no_results_text', 'options'); ?></p>
        </div>
        <div class="search-no-results-btn mb-3">
          <a href="<?php echo site_url('/pocetna'); ?>">
            <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
              <button class="btn btn-primary text-uppercase">vratite se na početnu stranu</button>
            <?php endif; ?>
            <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
              <button class="btn btn-primary text-uppercase">Return to homepage</button>
            <?php endif; ?>
          </a>
        </div>
      </div>
<!--       <?php echo get_template_part('template-parts/latest', 'blog-posts'); ?> -->
	<?php	} ?>
	</main>
</div>
<?php echo get_template_part('template-parts/cta', 'block'); ?>

<?php get_footer(); ?>