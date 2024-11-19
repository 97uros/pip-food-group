<?php get_header(); ?> 
<?php 
  $page_for_posts = get_option( 'page_for_posts' ); // returns id of page that is used for posts - blog page
  $header_background = get_field('header_background',$page_for_posts);
  $header_title = get_field('header_title',$page_for_posts);
  $header_text = get_field('header_text',$page_for_posts);
?>
<section class="page-header" style="background-image: url('<?php echo $header_background; ?>')">
  <div class="container">
    <div class="row">
      <div class="col-12 col-lg-5">
        <?php if( $header_title) : ?>
          <h1><?php echo $header_title; ?></h1>
        <?php endif; ?>
      </div>
      <div class="col-12 col-lg-7">
        <?php if ($header_text) : ?>
          <h4><?php echo $header_text; ?></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<div class="header-text-mobile text-center">
  <?php if ($header_text) : ?>
    <h4><?php echo $header_text; ?></h4>
  <?php endif; ?>
</div>
<section id="primary" class="site-content">
  <div id="content" role="main">
    <?php if (have_posts() ) : ?>
      <div class="container blog-section">
      <div class="dropdown">
        <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Kategorije</button>
          <?php endif; ?>
          <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Categories</button>
        <?php endif; ?>
        <ul class="post-category-dropdown dropdown-menu">
          <?php wp_list_categories( array(
            'orderby' => 'id',
            'title_li' => '',
            'exclude' => array(1)
          ));?>
        </ul>
      </div>
  <div class="row">
    <div class="col-12 col-md-6 col-lg-8 blog-posts">
      <?php new WP_Query( array(
        'posts_per_page' => -1,
        'post_type' => 'post',
        'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
        'orderby'   => array(
            'date' =>'ASC',
          )
      )); ?>
      <div class="row">
        <?php while(have_posts()) {
        the_post(); ?>
          <div class="col-md-6 col-lg-6 card border-0 blog-post">
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
              <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20) ?></p>
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
        <div class="blog-pagination">
          <?php echo paginate_links(array (
            'prev_text' => '<span><i class="fa-solid fa-chevron-left"></i></span>',
            'next_text' => '<span><i class="fa-solid fa-chevron-right"></i></span>'
          )); ?>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6 col-lg-4 sidebar sidebar-desktop">
      <?php echo get_template_part('template-parts/sidebar') ?>
    </div>
  </div>
</div>
<?php endif; ?>
</div>
<div class="col-12 col-md-6 col-lg-4 sidebar sidebar-mobile">
  <?php echo get_template_part('template-parts/sidebar') ?>
</div>
</section>
<?php get_footer(); ?>