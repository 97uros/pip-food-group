<section class="cta-block text-center" style="background-image: url('<?php echo the_field('cta_background', 'options') ?>')">
  <div class="cta-content">  
    <div class="container">
      <div class="back-button d-sm-block d-none">
        <a id="back-to-top" style="display:flex;">
          <i class="fa-light fa-arrow-up"></i>
        </a>
      </div>
      <div class="row">
        <div class="col">
          <h2><?php echo the_field('cta_heading', 'options'); ?></h2>
          <p><?php echo the_field('cta_text', 'options'); ?></p>
            <?php 
              $cta_link = get_field('cta_link','options');
              if( $cta_link ): 
                $link_url = $cta_link['url'];
                $link_title = $cta_link['title'];
                $link_target = $cta_link['target'] ? $cta_link['target'] : '_self';
                ?>
                <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>