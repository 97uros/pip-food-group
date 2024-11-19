<section class="our-technologists container">
    <div class="cards-bottom row">
    <h2 class="text-center"><?php echo the_field('tehnolozi', 'options'); ?></h2>
      <?php if( have_rows('team_member_card_tehnolozi', 'options') ):
        while( have_rows('team_member_card_tehnolozi', 'options') ) : the_row();
          $image = get_sub_field('card_image');
          $name = get_sub_field('card_name');
          $position = get_sub_field('card_position'); 
          $text = get_sub_field('card_text');
          $mail = get_sub_field('card_mail');
          ?>
          <div class="card border-0 col-12 col-md-4 text-center">
            <div class="card-img-top">
              <img class="img-fluid" src="<?php echo $image; ?>">
            </div>
            <div class="card-body">
              <h5><?php echo $name; ?></h5>
              <p class="card-position text-uppercase"><?php echo $position; ?></p>
              <p><?php echo $text; ?></p>
              <p class="card-mail"><i class="fa-solid fa-envelope"></i>&nbsp;<a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a></p>
            </div>
          </div>
        <?php endwhile;
      endif; ?>
    </div>
</section>