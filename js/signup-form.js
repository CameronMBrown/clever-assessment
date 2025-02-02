document.addEventListener('DOMContentLoaded', function () {
  const consentLabel = document.querySelector('.wpcf7-list-item-label');

  if (consentLabel) {
    const fullText = consentLabel.innerHTML;
    const truncatedText =
      'I understand and agree that by checking this box and clicking "SCHEDULE YOUR FREE ESTIMATE", I consent to Bath Experts...';

    // Create Read More button
    const readMoreBtn = document.createElement('button');
    readMoreBtn.textContent = 'Read More';
    readMoreBtn.type = 'button';
    readMoreBtn.classList.add('read-more-btn');

    // Apply truncated text initially
    consentLabel.innerHTML = truncatedText;
    consentLabel.appendChild(readMoreBtn);

    // Expand text on button click
    readMoreBtn.addEventListener('click', function () {
      consentLabel.innerHTML = fullText; // Restore full text
    });
  }
});
