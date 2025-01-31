document.addEventListener('DOMContentLoaded', function () {
  // Get all swatch elements
  const swatches = document.querySelectorAll('.swatch');

  // Add click event listeners to all swatches
  swatches.forEach((swatch) => {
    swatch.addEventListener('click', () => {
      const modalId = swatch.getAttribute('data-modal-id');
      const slideIndex = parseInt(swatch.getAttribute('data-slide-index'), 10);
      const modal = document.getElementById(modalId);

      if (modal) {
        modal.style.display = 'flex';
        showSlide(modal, slideIndex);
      }
    });
  });

  // Close modal when the close button is clicked
  document.querySelectorAll('.swatch-modal__close').forEach((closeButton) => {
    closeButton.addEventListener('click', () => {
      const modal = closeButton.closest('.swatch-modal');
      if (modal) {
        modal.style.display = 'none';
      }
    });
  });

  // Handle previous and next buttons for all modals
  document.querySelectorAll('.swatch-modal__prev, .swatch-modal__next').forEach((button) => {
    button.addEventListener('click', () => {
      const modal = button.closest('.swatch-modal');
      const slides = modal.querySelectorAll('.swatch-modal__slide');
      let currentSlideIndex = Array.from(slides).findIndex((slide) =>
        slide.classList.contains('active')
      );

      if (button.classList.contains('swatch-modal__prev')) {
        navigateSlide(modal, currentSlideIndex - 1, 'left');
      } else {
        navigateSlide(modal, currentSlideIndex + 1, 'right');
      }
    });
  });

  // Function to show a specific slide in a modal
  function showSlide(modal, index) {
    const slides = modal.querySelectorAll('.swatch-modal__slide');
    slides.forEach((slide) => {
      slide.classList.remove('active', 'slide-left', 'slide-right');
      slide.style.opacity = '0'; // Hide all slides
    });
    slides[index].classList.add('active');
    slides[index].style.opacity = '1'; // Show the active slide
  }

  // Function to navigate between slides with animations
  function navigateSlide(modal, newIndex, direction) {
    const slides = modal.querySelectorAll('.swatch-modal__slide');
    const totalSlides = slides.length;

    // Handle wrap-around for slide index
    if (newIndex >= totalSlides) {
      newIndex = 0;
    } else if (newIndex < 0) {
      newIndex = totalSlides - 1;
    }

    const currentSlide = modal.querySelector('.swatch-modal__slide.active');
    const nextSlide = slides[newIndex];

    // Add animation classes based on direction
    if (direction === 'left') {
      // Current slide slides off to the right
      currentSlide.classList.add('slide-right');
      // Next slide slides in from the left
      nextSlide.classList.add('slide-in-from-left');
    } else if (direction === 'right') {
      // Current slide slides off to the left
      currentSlide.classList.add('slide-left');
      // Next slide slides in from the right
      nextSlide.classList.add('slide-in-from-right');
    }

    // Wait for the animation to complete before updating the active slide
    setTimeout(() => {
      currentSlide.classList.remove(
        'active',
        'slide-left',
        'slide-right',
        'slide-in-from-left',
        'slide-in-from-right'
      );
      currentSlide.style.opacity = '0'; // Hide the current slide
      nextSlide.classList.add('active');
      nextSlide.style.opacity = '1'; // Show the next slide
      nextSlide.classList.remove(
        'slide-left',
        'slide-right',
        'slide-in-from-left',
        'slide-in-from-right'
      );
    }, 500); // Match the duration of the CSS transition
  }
});
