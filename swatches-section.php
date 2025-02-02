<?php

/**
 * Swatches Section Template
 *
 * @package clever-assessment
 */

// Get the field group prefix (e.g., 'ls_' or 'ss_')
$prefix = $args['prefix'];

// Get the section background colour
$bg_Colour = $args['bg_colour'] ?? '#FFFFFF';

// Get the fields
$section_title = get_field($prefix . 'section_title');
$swatches = [];

// Loop through the swatches (up to 20 for Signature Series, 8 for Lifestyle Series)
for ($i = 1; $i <= 20; $i++) {
  $swatch_image = get_field($prefix . 'image_' . $i);
  $swatch_name = get_field($prefix . 'name_' . $i);

  // Stop the loop if no more swatches are found
  if (empty($swatch_image) && empty($swatch_name)) {
    break;
  }

  $swatches[] = [
    'image' => $swatch_image,
    'name' => $swatch_name,
  ];
}

// Generate a unique ID for the modal
$modal_id = 'swatch-modal-' . sanitize_title($section_title);
?>

<section id="<?php echo esc_attr(sanitize_title($section_title)); ?>" class="swatches-section" style="background-color: <?php echo $bg_Colour ?>;">
  <div class="container">
    <?php if ($section_title) : ?>
      <h2 class="swatches-section__title"><?php echo esc_html($section_title); ?></h2>
    <?php endif; ?>

    <?php if (!empty($swatches)) : ?>
      <div class="swatches-section__swatches">
        <?php foreach ($swatches as $index => $swatch) : ?>
          <div class="swatch" data-modal-id="<?php echo esc_attr($modal_id); ?>" data-slide-index="<?php echo esc_attr($index); ?>">
            <?php if ($swatch['image']) : ?>
              <img class="swatch__image" src="<?php echo esc_url($swatch['image']['url']); ?>" alt="<?php echo esc_attr($swatch['name']) . " colour swatch"; ?>">
            <?php endif; ?>
            <?php if ($swatch['name']) : ?>
              <div class="swatch__label-container">
                <p class="swatch__label"><?php echo esc_html($swatch['name']); ?></p>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <!-- Modal Dialog -->
  <div id="<?php echo esc_attr($modal_id); ?>" class="swatch-modal">
    <div class="swatch-modal__content container">
      <button class="btn btn-tertiary swatch-modal__close">Close</button>
      <div class="swatch-modal__carousel">
        <?php foreach ($swatches as $index => $swatch) : ?>
          <div class="swatch-modal__slide">
            <img src="<?php echo esc_url($swatch['image']['url']); ?>" alt="<?php echo esc_attr($swatch['name']); ?>">
            <p class="swatch-modal__label"><?php echo esc_html($swatch['name']); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swatch-modal__navigation">
        <button class="swatch-modal__prev btn__carousel">&#10094;</button>
        <button class="swatch-modal__next btn__carousel">&#10095;</button>
      </div>
    </div>
  </div>
</section>