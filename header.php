<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clever-assessment
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header id="masthead" class="site-header">
			<nav id="site-navigation" class="main-navigation container">
				<a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/bath-experts-logo-blue.svg" alt="Bath Experts Logo" width="200" height="auto">
				</a>
				<div class="contact-btns">
					<button class="btn btn-secondary desktop-contact-btn">
						<a href="tel:+18666468843" target="_self" aria-label="866-646-8843">866-646-8843</a>
					</button>
					<button class="mobile-contact-btn">
						<a href="tel:+18666468843" target="_self" aria-label="866-646-8843">
							<img src="<?php echo get_template_directory_uri(); ?>/img/phone.svg" alt="Bath Experts Logo" width="16" height="16">
						</a>
					</button>
				</div>
			</nav>
		</header>