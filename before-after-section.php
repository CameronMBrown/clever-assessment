<?php

// Get the section background colour
$bg_Colour = $args['bg_colour'] ?? '#FFFFFF';
?>

<section class="before-after-section" style="background-color: <?php echo $bg_Colour ?>;">
  <div class="before-after-wrapper container">

    <div class="before-after-heading-container">
      <?php // section title
      if (get_field('bacs_title')) { ?>
        <h2 class="heading before-after-heading"><?php echo get_field('bacs_title') ?></h2>
      <?php } ?>

      <div class="before-after-nav">
        <?php // section subtitle
        if (get_field('bacs_carousel_title')) { ?>
          <h3 class="before-after-subtitle"><?php echo get_field('bacs_carousel_title') ?></h3>
        <?php } ?>
        <div class="before-after-nav__buttons">
          <button class="before-after__prev btn__carousel">&#10094;</button>
          <button class="before-after__next btn__carousel">&#10095;</button>
        </div>
      </div>
    </div>

    <div class="before-after-carousel">
      <?php
      // Loop through all revealers
      for ($i = 1; $i <= 6; $i++) {
        $before_image = get_field("bacs_before_$i");
        $after_image = get_field("bacs_after_$i");

        // Only display if both before and after images exist
        if ($before_image && $after_image) {
      ?>
          <div class="before-after-revealer">
            <!-- Before Image -->
            <div class="before-image">
              <img src="<?php echo $before_image['sizes']['medium_large']; ?>" alt="Before Image">
            </div>

            <!-- After Image -->
            <div class="after-image">
              <img src="<?php echo $after_image['sizes']['medium_large']; ?>" alt="After Image">
            </div>

            <!-- Draggable Divider -->
            <div class="divider"></div>
          </div>
      <?php
        }
      }
      ?>
    </div>
  </div>
</section>