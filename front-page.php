<?php

/**
 * The template for displaying the front page
 *
 * @package clever-assessment
 */

get_header();
?>
<main id="primary" class="site-main">
  <?php
  // Hero Section
  include locate_template('hero-section.php', false);

  // Video Section
  if (get_field('video_url')) {
    $args = [
      'bg_colour' => get_field('vs_bg_colour')
    ];
    include locate_template('video-section.php', false);
  }

  // Shower Features Section
  if (get_field('ds_section_title')) {
    $args = [
      'bg_colour' => get_field('ds_bg_colour')
    ];
    include locate_template('shower-features-section.php', false);
  }

  // Reviews Section
  if (get_field('rs_section_title')) {
    $args = [
      'bg_colour' => get_field('rs_bg_colour')
    ];
    include locate_template('reviews-section.php', false);
  }

  // Safety Features Section
  if (get_field('sf_section_title')) {
    $args = [
      'bg_colour' => get_field('sf_bg_colour')
    ];
    include locate_template('safety-features-section.php', false);
  }

  // Before & After Section
  if (get_field('bacs_title')) {
    $args = [
      'bg_colour' => get_field('bacs_bg_colour')
    ];
    include locate_template('before-after-section.php', false);
  }

  // Lifestyle Series Swatches
  if (get_field('ls_section_title')) {
    $args = [
      'prefix' => 'ls_',
      'bg_colour' => get_field('ls_bg_colour')
    ];
    include locate_template('swatches-section.php', false);
  }

  // Signature Series Swatches
  if (get_field('ss_section_title')) {
    $args = [
      'prefix' => 'ss_',
      'bg_colour' => get_field('ss_bg_colour')
    ];
    include locate_template('swatches-section.php', false);
  }
  ?>
</main><!-- #main -->
<?php
get_footer();
