<section class="reviews-section">
  <h2 class="reviews-section-heading heading container"><?php echo esc_html(get_field('rs_section_title')); ?></h2>
  <div class="review-cards-container">
    <?php for ($i = 1; $i <= 6; $i++) :
      $title = get_field("rs_title_{$i}");
      $name = get_field("rs_name_{$i}");
      $reviewerTitle = get_field("rs_reviewer_title_{$i}");
      $review = get_field("rs_review_{$i}");
      $imgA = get_field("review_image_a_{$i}");
      $imgB = get_field("review_image_b_{$i}");
    ?>

      <div class="review-card card">
        <div class="review-card__header">
          <div class="review-card__header-text">
            <p class="review-card__title">
              <?php echo $title ?>
            </p>
            <img src="<?php echo wp_get_attachment_image_src(291, "small")[0] ?>" alt="five stars" class="review-card__five-stars">
            <p class="review-card__reviewer"><span class="review-card__reviewer--name"><?php echo $name ?></span> - <?php echo $reviewerTitle ?></p>
          </div>
          <img src="<?php echo wp_get_attachment_image_src(290, 'thumbnail')[0] ?>" alt="google logo" class="review-card__logo">
        </div>
        <div class="review-card__content">
          <p class="review-card__body"><?php echo esc_html($review); ?></p>
          <div class="review-card__imgs">
            <img src="<?php echo $imgA['sizes']['thumbnail'] ?>" alt="<?php echo $imgA['alt'] ?>" class="review-card__img">
            <img src="<?php echo $imgB['sizes']['thumbnail'] ?>" alt="<?php echo $imgA['alt'] ?>" class="review-card__img">
          </div>
        </div>
      </div>
    <?php endfor; ?>
    <?php for ($i = 1; $i <= 6; $i++) :
      $title = get_field("rs_title_{$i}");
      $name = get_field("rs_name_{$i}");
      $reviewerTitle = get_field("rs_reviewer_title_{$i}");
      $review = get_field("rs_review_{$i}");
      $imgA = get_field("review_image_a_{$i}");
      $imgB = get_field("review_image_b_{$i}");
    ?>

      <div class="review-card card">
        <div class="review-card__header">
          <div class="review-card__header-text">
            <p class="review-card__title">
              <?php echo $title ?>
            </p>
            <img src="<?php echo wp_get_attachment_image_src(291, "small")[0] ?>" alt="five stars" class="review-card__five-stars">
            <p class="review-card__reviewer"><span class="review-card__reviewer--name"><?php echo $name ?></span> - <?php echo $reviewerTitle ?></p>
          </div>
          <img src="<?php echo wp_get_attachment_image_src(290, 'thumbnail')[0] ?>" alt="google logo" class="review-card__logo">
        </div>
        <div class="review-card__content">
          <p class="review-card__body"><?php echo esc_html($review); ?></p>
          <div class="review-card__imgs">
            <img src="<?php echo $imgA['sizes']['thumbnail'] ?>" alt="<?php echo $imgA['alt'] ?>" class="review-card__img">
            <img src="<?php echo $imgB['sizes']['thumbnail'] ?>" alt="<?php echo $imgA['alt'] ?>" class="review-card__img">
          </div>
        </div>
      </div>
    <?php endfor; ?>

  </div>
  <div class="reviews-nav container">
    <div class="reviews-nav__btns">
      <button class="reivews__prev btn__carousel">&#10094;</button>
      <button class="reivews__next btn__carousel">&#10095;</button>
    </div>
  </div>
</section>