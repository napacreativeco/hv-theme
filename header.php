<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package highvis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'highvis' ); ?></a>

	<header class="desktop-nav">
		<div class="header-row">

			<div class="logo">
				<?php the_custom_logo(); ?>
			</div>

			<div class="menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu'
					)
				);
				?>
			</div>

		</div>
	</header>

	<header class="mobile-nav">
		<div class="header-row">

			<div class="logo">
				<?php the_custom_logo(); ?>
			</div>

			<div class="hamburger">
				Menu
			</div>

		</div>
	</header>

	<div class="mobile-overlay">
		<div class="mobile-overlay-row">

			<div class="mobile-overlay-close">
				&times;
			</div>

			<div class="logo">
				<img src="http://highvis.local/wp-content/uploads/2024/07/highvis-logo-white.png" alt="High Vis">
			</div>

			<div class="menu">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu'
						)
					);
					?>
			</div>

			<div class="social-icons">
				<?php get_template_part('template-parts/social-media-icons'); ?>
			</div>

		</div>
	</div>
