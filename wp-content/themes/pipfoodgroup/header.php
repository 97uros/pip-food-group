<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <script src="https://kit.fontawesome.com/ef33ab82de.js" crossorigin="anonymous"></script> -->
  <script src="https://kit.fontawesome.com/19df2edaa8.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<nav class="navbar navbar-expand-xl bg-light">
  <div class="nav-container container-fluid">
		<a class="navbar-brand" href="<?php echo site_url('/pocetna') ?>">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" width="200px">
		</a>
		<form class="search-container container-mobile" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
			<input class="input" type="text" name="s" id="search" value="<?php the_search_query(); ?>">
			<i class="fa fa-search" aria-hidden="true"></i>
		</form>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
			<div class="offcanvas-header">
				<?php $link = get_field('demo_center_button', 'options'); ?>
				<?php if( $link ): ?>
					<?php 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<div class="button">
						<a class="btn btn-primary demo-centar-mobile" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
      	<?php endif; ?>
				<div class="language-dropdown language-dropdown--mobile">
					<!-- <i class="bi bi-globe"></i> -->
          <?php do_action('wpml_add_language_selector'); ?>
				</div>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
			<div class="offcanvas-body">
				<?php 
        if (has_nav_menu ('primary-menu')){
					wp_nav_menu (array (
						'theme_location' => 'primary-menu',
						'depth' => 4, // 1 = no dropdowns, 2 = with dropdowns, 3 = multilevel dropdowns.
						'container' => '',
						'items_wrap' => '<ul class="navbar-nav ms-auto">%3$s</ul>',
						'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
						'walker' => new WP_Bootstrap_Navwalker(),
					));
					}
				?>
				<?php $link = get_field('demo_center_button', 'options'); ?>
				<?php if( $link ): ?>
					<?php 
						$link_url = $link['url'];
						$link_title = $link['title'];
						$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<div class="button">
						<a class="btn btn-primary demo-centar" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
					</div>
      	<?php endif; ?>
				<form class="search-container container-desktop" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<input class="input" type="text" name="s" id="search" value="<?php the_search_query(); ?>"/>
					<i class="fa fa-search" aria-hidden="true"></i>
				</form>
				<div class="language-dropdown dropdown">
          <?php do_action('wpml_add_language_selector'); ?>
				</div>
			</div>
		</div>
  </div>
</nav>