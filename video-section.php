<?php
$title = get_field('vs_title');
$video_url = get_field('video_url');
$thumbnail = get_field('vs_thumbnail'); // Get thumbnail image
?>

<section class="video-section">
  <div class="video-section-wrapper container">
    <h2 class="video-section-title"><?php echo esc_html($title); ?></h2>
    <div class="video-container">
      <div class="video-thumbnail" id="video-thumbnail">
        <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>">
      </div>
      <iframe
        id="youtube-video"
        src=""
        data-src="<?php echo esc_url($video_url); ?>?autoplay=1&modestbranding=1&rel=0&showinfo=0&controls=1&disablekb=1"
        srcdoc="<style>*{padding:0;margin:0;overflow:hidden}html,body{height:100%}img,span{position:absolute;width:100%;top:0;bottom:0;margin:auto}span{height:1.5em;text-align:center;font:48px/1.5 sans-serif;color:white;text-shadow:0 0 0.5em black}</style><a href=https://www.youtube.com/embed/MSNau6tGMkc?autoplay=1><img src=https://promo.bathexperts.com/wp-content/uploads/2024/11/video-thumbnail.webp alt='Transform Your Bathroom: From Tub to Walk-In Shower'><span>▶</span></a>"
        frameborder="0"
        allowfullscreen>
      </iframe>
    </div>
  </div>
</section>