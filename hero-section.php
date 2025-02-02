<?php
$title = get_field("hs_title");
$subTitle = get_field("hs_subtitle");
$secondaryTitle = get_field("hs_secondary_main");
$secondarySubTitle = get_field("hs_secondary_subtitle");
$formPromo = get_field("hs_form_promo");
$formPromoSub = get_field("hs_promo_subtitle");
$heroBg = get_field("hs_bg_img");


do_action('qm/debug', $heroBg);
?>

<section class="hero-section">
  <div class="hero-section__bg" style="background-image: url(<?php echo $heroBg['url']; ?>);">
    <div class="hero-content container">
      <div class="hero-text">
        <h1 class="page-title"><?php echo $title ?></h1>
        <p class="page-subtitle"><?php echo $subTitle ?></p>
        <hr class="hero-divider">
        <h5 class="hero-title-secondary"><?php echo $secondaryTitle ?></h5>
        <p class="hero-subtitle-secondary"><?php echo $secondarySubTitle ?></p>
        </hr>
      </div>
    </div>
  </div>
  <div class="hero-form-container" style="background-image: url(<?php echo $heroBg['url']; ?>); background-size: cover;">
    <div class="hero-form">
      <div class="signup-form__header">
        <h5 class="form-promo"><?php echo $formPromo ?></h5>
        <p class="promo-subtitle"><?php echo $formPromoSub ?></p>
        <img src="<?php echo wp_get_attachment_image_src(291, "small")[0] ?>" alt="five stars" class="signup-form__five-stars">
        <p class="form-rating">5.0 out of 5</p>
        <p class="form-rating-sub">Out of 1300+ reviews</p>
      </div>
      <?php echo do_shortcode('[contact-form-7 id="992b550" title="Estimate Form"]'); ?>
    </div>
  </div>
</section>