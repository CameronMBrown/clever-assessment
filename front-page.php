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
  // Lifestyle Series Swatches
  if (get_field('ls_section_title')) {
    $args = ['prefix' => 'ls_'];
    include locate_template('swatches-section.php', false);
  }

  // Signature Series Swatches
  if (get_field('ss_section_title')) {
    $args = ['prefix' => 'ss_'];
    include locate_template('swatches-section.php', false);
  }
  ?>
</main><!-- #main -->
<?php
get_footer();
