document.addEventListener('DOMContentLoaded', function () {
  const thumbnail = document.getElementById('video-thumbnail');
  const iframe = document.getElementById('youtube-video');

  if (playButton && thumbnail && iframe) {
    playButton.addEventListener('click', function () {
      thumbnail.style.display = 'none'; // Hide thumbnail
      iframe.src = iframe.dataset.src; // Set the video URL
      iframe.style.display = 'block'; // Show iframe
    });
  }
});
