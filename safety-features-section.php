<?php

// Get the section background colour
$bg_Colour = $args['bg_colour'] ?? '#FFFFFF';
?>

<section class="safety-features-section" style="background-color: <?php echo $bg_Colour; ?>;">
  <div class="safety-features-wrapper container">
    <div class="safety-features-heading">
      <h2 class="safety-features-title"><?php echo esc_html(get_field('sf_section_title')); ?></h2>
      <p class="safety-features-subtitle"><?php echo esc_html(get_field('sf_section_subtitle')); ?></p>
    </div>
    <div class="safety-cards-container">
      <?php for ($i = 1; $i <= 4; $i++) :
        $image = get_field("sf_image_{$i}");
        $title = get_field("sf_title_{$i}");
        $description = get_field("sf_description_{$i}");

        if ($title || $description || $image) : ?>
          <div class="safety-card card">
            <?php if ($image) : ?>
              <div class="safety-card__img">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
              </div>
            <?php endif; ?>
            <div class="safety-card__content">
              <?php if ($title) : ?>
                <h3 class="safety-card__title"><?php echo esc_html($title); ?></h3>
              <?php endif; ?>
              <?php if ($description) : ?>
                <p class="safety-card__body"><?php echo esc_html($description); ?></p>
              <?php endif; ?>
            </div>
          </div>
      <?php endif;
      endfor; ?>
    </div>
  </div>
</section>