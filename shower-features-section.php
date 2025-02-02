<?php
$title = get_field("ds_section_title");
$before_img = get_field("ds_before_img");
$after_img = get_field("ds_after_img");
?>


<section class="shower-features-section container">
  <h2 class="shower-features__heading"><?php echo $title ?></h2>
  <div class="shower-features__content">
    <div class="shower-features__cards">
      <?php for ($i = 1; $i <= 4; $i++) {
        $cardImgSrc = get_template_directory_uri() . "/img/" . get_field("ds_card_img_{$i}") . ".svg";
        $cardTxt = get_field("ds_card_txt_{$i}");
      ?>
        <div class="shower-features__card card">
          <img src="<?php echo $cardImgSrc ?>">
          <p class="shower-features__card--text"><? echo $cardTxt ?></p>
        </div>
      <?php } ?>
    </div>
    <div class="before-after-revealer">
      <!-- Before Image -->
      <div class="before-image">
        <img src="<?php echo $before_img['sizes']['medium_large']; ?>" alt="Before Image">
      </div>

      <!-- After Image -->
      <div class="after-image">
        <img src="<?php echo $after_img['sizes']['medium_large']; ?>" alt="After Image">
      </div>

      <!-- Draggable Divider -->
      <div class="divider"></div>
    </div>
  </div>
</section>