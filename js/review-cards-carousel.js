document.addEventListener('DOMContentLoaded', function () {
  const container = document.querySelector('.review-cards-container');
  const prevBtn = document.querySelector('.reivews__prev');
  const nextBtn = document.querySelector('.reivews__next');
  const cardWidth = 288; // Fixed width of each review card
  const transitionTime = 300; // Transition duration in ms

  if (!container || !prevBtn || !nextBtn) return;

  // Move last card to the front to enable seamless looping
  function moveLastToFront() {
    const lastCard = container.lastElementChild;
    container.prepend(lastCard);
    container.style.transition = 'none';
    container.style.transform = `translateX(-${cardWidth}px)`;
    requestAnimationFrame(() => {
      setTimeout(() => {
        container.style.transition = `transform ${transitionTime}ms ease-in-out`;
        container.style.transform = 'translateX(0)';
      });
    });
  }

  // Move first card to the back to enable seamless looping
  function moveFirstToBack() {
    container.style.transition = `transform ${transitionTime}ms ease-in-out`;
    container.style.transform = `translateX(-${cardWidth}px)`;

    setTimeout(() => {
      const firstCard = container.firstElementChild;
      container.appendChild(firstCard);
      container.style.transition = 'none';
      container.style.transform = 'translateX(0)';
    }, transitionTime);
  }

  // Previous Button (moves left)
  prevBtn.addEventListener('click', () => {
    moveLastToFront();
  });

  // Next Button (moves right)
  nextBtn.addEventListener('click', () => {
    moveFirstToBack();
  });

  // Initialize correct position
  container.style.transform = 'translateX(0)';
});
