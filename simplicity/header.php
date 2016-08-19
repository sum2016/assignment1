<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simplicity
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'simplicity' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<div class="site-branding">
			<?php
				$options = get_option( 'options_settings'); //Applying Theme Options Setting
					if ( is_front_page() && is_home() ){
						if ($options[radio_field] == '1'){ ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php } elseif ($options[radio_field] == '2'){ ?>
							<div id="logo" class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" alt="webiste logo"></a></div>
					<?php }
					}
					else {
						if ($options[radio_field] == '1'){ ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php } elseif ($options[radio_field] == '2'){ ?>
							<div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" alt="webiste logo"></a></div>
					<?php }
					};

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->
		
		<?php
		if ($options[select_field] == '1'){ ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'simplicity' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		<?php } ?>
		<div id="header_widget">
	            <?php if ( is_active_sidebar( 'header_widget' ) ) : ?>
	                <section id="widget-header" class="widget-area">
	                    <?php dynamic_sidebar( 'header_widget' ); ?>
	                </section>
	            <?php endif; ?>
	        </div><!-- end #header_widget-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
