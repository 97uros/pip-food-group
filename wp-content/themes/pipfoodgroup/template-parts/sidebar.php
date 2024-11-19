<div class="categories-box">
<?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
  <h4 class="categories-heading">Kategorije</h4>
  <?php endif; ?>
  <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
    <h4 class="categories-heading">Categories</h4>
<?php endif; ?>
<ul class="post-category-list">
  <?php wp_list_categories( array(
    'orderby' => 'id',
    'title_li' => '',
    'exclude' => array(1)
  ));?>
</ul>
</div>
<div class="featured-posts">
  <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
    <h4 class="featured-posts-heading">Istaknuto</h4>
  <?php endif; ?>
  <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
    <h4 class="featured-posts-heading">Featured</h4>
  <?php endif; ?>
  <?php if(is_active_sidebar('blog-sidebar')) : ?>
    <?php dynamic_sidebar('blog-sidebar') ?>
  <?php endif; ?>
</div>
