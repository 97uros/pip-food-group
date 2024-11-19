<?php get_header(); ?>
<div class="container single-blog-post">
  <div class="row">
    <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
      <a class="back-to-blog" href="<?php echo site_url('/pipoklagija');  ?>"><i class="fa-solid fa-arrow-left-long"></i>&nbsp;Nazad na Pipoklagiju</a>
      <?php endif; ?>
      <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
        <a class="back-to-blog" href="<?php echo site_url('/pipoklagija');  ?>"><i class="fa-solid fa-arrow-left-long"></i>&nbsp;Back to Pipoklagija</a>
    <?php endif; ?>
    <h1 class="post-title"><?php the_title(); ?></h1>
    <div class="post-info">
      <?php echo the_category(',&nbsp;'); ?>
      <time class="post-date" datetime="<?php echo get_the_date('M d, Y'); ?>" itemprop="datePublished">
      •
      <?php echo get_the_date('M d, Y'); ?>
      </time>
    </div>
    <div class="col-12 col-lg-8">
      <?php while ( have_posts() ) : the_post(); ?>
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
      <div class="post-content"><?php the_content(); ?></div>
      <?php endwhile; ?>
      <div class="row blog-post-social">
        <div class="col-12 col-lg-6">
          <hr>
        </div>
        <div class="col-12 col-lg-6 share">
          <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
            <h6>Podelite artikal na društvenim mrežama</h6>
          <?php endif; ?>
          <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
            <h6>Share this article to social media</h6>
          <?php endif; ?>
          <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $postUrl; ?>"  target="_blank">
          <i class="fa-brands fa-facebook fa-xl"></i>
          </a>
          <a href="https://www.linkedin.com/shareArticle?url=<?php echo $postUrl; ?>" target="_blank">
            <i class="fa-brands fa-linkedin fa-xl"></i>
          </a>
        </div>
      </div>
    </div> 
    <div class="col-12 col-md-6 col-lg-4 sidebar sidebar-desktop">
      <?php echo get_template_part('template-parts/sidebar') ?>
    </div>
  </div>
</div>
<div class="col-12 col-md-6 col-lg-4 sidebar sidebar-mobile">
  <?php echo get_template_part('template-parts/sidebar') ?>
</div>
<!-- <?php echo get_template_part('template-parts/latest', 'blog-posts'); ?> -->

<?php get_footer(); ?>