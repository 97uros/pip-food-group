<footer>
  <div class="container">
    <div class="back-button d-block d-sm-none">
      <a id="back-to-top-mobile" style="display:flex;">
        <i class="fa-light fa-arrow-up"></i>
      </a>
    </div>
    <div class="footer row">
      <div class=" footer-nav col-12 col-lg-10">
        <a class="footer-logo" href="<?php echo bloginfo('url'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" width="134">
        </a>
        <?php 
          if (has_nav_menu ('footer-menu',)){
          wp_nav_menu (array (
            'theme_location' => 'footer-menu',
            'container' => 'div',
            'items_wrap' => '<ul class="">%3$s</ul>'
          ));
          }
        ?>  
      </div>
      <div class="footer-social-links col-12 col-lg-2">
        <?php 
          if(have_rows('footer_links','options')) : 
            while(have_rows('footer_links','options')) : the_row();
              $footer_link = get_sub_field('footer_link','options');
              $image = get_sub_field('footer_link_image','options');
              if( $footer_link ):
                $link_url = $footer_link['url'];
                $link_title = $footer_link['title'];
                $link_target = $footer_link['target'] ? $footer_link['target'] : '_self';
                ?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                  <?php if( $link_title) { echo esc_html( $link_title ); } ?>    
                  <?php if($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> 
                  <?php endif; ?>
                </a>
              <?php endif;
            endwhile;
          endif;
        ?>
      </div>
      <div class="col">
        <hr>
      </div>
      <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
        <p class="text-center all-rights-reserved">Sva prava zadržana © <?php echo date("Y"); ?> PIP</p>
      <?php endif; ?>
      <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
        <p class="text-center all-rights-reserved">All rights reserved © <?php echo date("Y"); ?> PIP</p>
      <?php endif; ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
