<div id="carouselExampleDark" class="map-slider carousel carousel-dark carousel-fade slide" data-bs-ride="false">
  <div class="carousel-inner">
    <?php if( have_rows('home_locations_slider') ):
      while( have_rows('home_locations_slider') ) : the_row();
        $image = get_sub_field('slider_image');
        $logo = get_sub_field('slider_logo');
        $title = get_sub_field('slider_title');
        $address = get_sub_field('slider_address');
        $zip = get_sub_field('slider_zip');
        $phone = get_sub_field('slider_phone');
        $mail = get_sub_field('slider_mail'); 
        $add_marker = get_sub_field('add_marker'); 
        $marker_width = get_sub_field('marker_width'); 
        $marker_height = get_sub_field('marker_height'); 
        $marker_id = get_sub_field('marker_id'); 
        $marker_state = get_sub_field('marker_state'); 
        ?>
        <?php if($image || $logo || $title || $address || $zip || $phone || $mail ) :?>
        <div class="carousel-item <?php if($add_marker && $marker_id) { echo $marker_id; }?> <?php if($add_marker && $marker_state) { echo $marker_state; }?> <?php if (get_row_index() == 1) echo 'active'; ?>" id="location<?php echo get_row_index(); ?>">
          <div class="card border-0">
            <div class="card-img-wrapper">
              <img src="<?php echo $image; ?>" class="card-img-top">
            </div>
            <div class="card-body">
              <div class="card-logo__wrapper">
                <img class="card-logo" src="<?php echo $logo; ?>">
              </div>
              <h5 class="card-title"><?php echo $title ?></h5>
              <p class="card-address"><?php echo $address ?></p>
              <p class="card-location"><?php echo $zip ?></p>
              <?php 
                $page_url = get_bloginfo('template_url');  
                $page_url = $page_url.'/page-kontakt.php';  
                $page_template_url = get_page_template();  
                $page_url_arr = explode ("/", $page_url); 
                $page_template_url_arr = explode ("/", $page_template_url); 
                $page_url_arr= end($page_url_arr);
                $page_template_url_arr = end($page_template_url_arr);
               ?>
              <?php if(!$page_url_arr == $page_template_url_arr) :  ?>
                <p class="card-tel"><?php echo $phone ?></p>
                <a class="card-mail" href="mailto:<?php echo $mail; ?>">
                  <?php echo $mail ?>
                </a>
              <?php  endif; ?>
              <?php if($page_url_arr == $page_template_url_arr) :  ?>
                <a class="card-tel" href="tel:<?php echo $phone; ?>">
                  <?php echo $phone ?>
                </a>
                <a class="card-mail" href="mailto:<?php echo $mail; ?>">
                  <?php echo $mail ?>
                </a>
              <?php  endif; ?>
            </div>
          </div>
        </div>
        <?php  endif; ?>
      <?php endwhile;
    endif; ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>