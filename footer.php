<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package clever-assessment
 */

?>
<?php
$stickyFooter = get_field("sticky_footer_banner");

// optional sticky footer banner CTA
if ($stickyFooter) { ?>
	<a href="#estimateform" class="sticky-footer">
		<img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/img/calendar.svg" alt="Calendar icon" width="24" height="24">
		<span class="footer-body">Schedule Your Free Estimate</span>
	</a>
<?php
}
?>

<footer class="site-footer">
	<div class="footer-container">
		<img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/img/bath-experts-logo-white.svg" alt="Bath Experts Logo" width="200" height="auto">
		<div class="footer-main">
			<h2 class="footer-heading">Get Your Free, No-Obligation Estimate Today!</h2>
			<p class="footer-body">Transform your outdated tub or shower with Bath Experts!</p>
		</div>
		<div class="footer-btns">
			<button class="btn"><a href="#estimateform">Contact Us</a></button>
			<button class="btn btn-tertiary">
				<a href="tel:+18666468843" target="_self" aria-label="866-646-8843">866-646-8843</a>
			</button>
		</div>
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>