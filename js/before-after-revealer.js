document.addEventListener('DOMContentLoaded', function () {
  const revealers = document.querySelectorAll('.before-after-revealer');

  revealers.forEach((revealer) => {
    const beforeImage = revealer.querySelector('.before-image');
    const divider = revealer.querySelector('.divider');

    let isDragging = false;

    function updatePosition(clientX) {
      const revealerRect = revealer.getBoundingClientRect();
      let offsetX = clientX - revealerRect.left;
      let newWidth = (offsetX / revealerRect.width) * 100;

      // Ensure the width stays within bounds
      newWidth = Math.max(0, Math.min(newWidth, 100));

      beforeImage.style.width = `${newWidth}%`;
      divider.style.left = `${newWidth}%`;
    }

    function startDragging(e) {
      e.preventDefault();
      isDragging = true;
      updatePosition(e.clientX);

      document.addEventListener('mousemove', onMouseMove);
      document.addEventListener('mouseup', stopDragging);
    }

    function onMouseMove(e) {
      if (isDragging) {
        updatePosition(e.clientX);
      }
    }

    function stopDragging() {
      isDragging = false;
      document.removeEventListener('mousemove', onMouseMove);
      document.removeEventListener('mouseup', stopDragging);
    }

    // Click and drag on the divider
    divider.addEventListener('mousedown', startDragging);

    // Click anywhere in the revealer should also allow dragging
    revealer.addEventListener('mousedown', startDragging);

    // Mobile Support
    divider.addEventListener('touchstart', (e) => {
      e.preventDefault();
      isDragging = true;
      updatePosition(e.touches[0].clientX);

      document.addEventListener('touchmove', onTouchMove);
      document.addEventListener('touchend', stopTouchDragging);
    });

    function onTouchMove(e) {
      if (isDragging) updatePosition(e.touches[0].clientX);
    }

    function stopTouchDragging() {
      isDragging = false;
      document.removeEventListener('touchmove', onTouchMove);
      document.removeEventListener('touchend', stopTouchDragging);
    }
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const carousel = document.querySelector('.before-after-carousel');
  const prevButton = document.querySelector('.before-after__prev');
  const nextButton = document.querySelector('.before-after__next');
  const revealers = document.querySelectorAll('.before-after-revealer');
  const gap = 16;
  let currentIndex = 0;

  function getRevealerWidth() {
    return window.screen.width >= 768 ? 350 : 280;
  }

  function updateCarousel() {
    const revealerWidth = getRevealerWidth();
    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
    let scrollPosition = currentIndex * (revealerWidth + gap);

    scrollPosition = Math.max(0, Math.min(scrollPosition, maxScroll));

    carousel.scrollTo({
      left: scrollPosition,
      behavior: 'smooth',
    });

    updateButtons();
  }

  function updateButtons() {
    prevButton.disabled = currentIndex === 0;
    nextButton.disabled = currentIndex >= revealers.length - 1;
  }

  prevButton.addEventListener('click', () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateCarousel();
    }
  });

  nextButton.addEventListener('click', () => {
    if (currentIndex < revealers.length - 1) {
      currentIndex++;
      updateCarousel();
    }
  });

  window.addEventListener('resize', updateCarousel);

  updateButtons(); // Ensure initial state is correct
});
