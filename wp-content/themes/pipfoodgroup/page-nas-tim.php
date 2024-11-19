<?php get_header(); ?>
<div class="team">
  <section>
    <?php get_template_part('template-parts/page', 'header') ?>
  </section>
  <section class="cards">
    <div class="container">
    <div class="cards-top row">
      <?php if( have_rows('team_member_card_top') ):
        while( have_rows('team_member_card_top') ) : the_row();
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
    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>
    <div class="cards-middle row">
    <h2 class="text-center"><?php echo the_field('marketing'); ?></h2>
      <?php if( have_rows('team_member_card_marketing') ):
        while( have_rows('team_member_card_marketing') ) : the_row();
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
    <div class="row">
      <div class="col">
        <hr>
      </div>
    </div>
    <div class="cards-bottom row">
    <h2 class="text-center"><?php echo the_field('tehnolozi'); ?></h2>
      <?php if( have_rows('team_member_card_tehnolozi') ):
        while( have_rows('team_member_card_tehnolozi') ) : the_row();
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
    </div>
  </section>
  <section class="join-our-team text-center">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2><?php echo the_field('join_our_team_heading'); ?></h2>
          <h6><?php echo the_field('join_our_team_subheading'); ?></h6>
          <p><?php echo the_field('join_our_team_text'); ?></p>
          <a href="<?php echo site_url('/zaposljavamo'); ?>">
            <?php if( ICL_LANGUAGE_CODE == 'sr' ) : ?>
              <button class="btn btn-secondary">KONKURIŠITE&nbsp;<i class="fa fa-solid fa-arrow-right"></i></button>
            <?php endif; ?>
            <?php if( ICL_LANGUAGE_CODE == 'en' ) : ?>
              <button class="btn btn-secondary">APPLY&nbsp;<i class="fa fa-solid fa-arrow-right"></i></button>
            <?php endif; ?>
          </a>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>