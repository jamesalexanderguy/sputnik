import domReady from '@roots/sage/client/dom-ready';

domReady(async () => {
  const triggers = document.querySelectorAll('.branding, .info, .menu-item-info');
  const modal = document.querySelector('#info-modal');
  const body = document.body;
  const html = document.documentElement;
  const wordInfo = document.querySelector('.info.wordinfo');

  if (!modal || !triggers.length) return;

  const toggleModal = () => {
    modal.classList.toggle('hidden');
    body.classList.toggle('open-sesame');
    html.classList.toggle('open-sesame');
    if (wordInfo) {
      const isOpen = body.classList.contains('open-sesame');
      wordInfo.textContent = isOpen ? 'close' : 'info';
    }
  };

  triggers.forEach(trigger => {
    trigger.addEventListener('click', e => {
      e.preventDefault();
      toggleModal();
    });
  });

  document.addEventListener('click', e => {
    const modalIsOpen = body.classList.contains('open-sesame');
    if (!modalIsOpen) return;

    const clickedInsideBio = e.target.closest('.bio');
    const clickedOnLink = e.target.closest('a');
    const clickedTrigger = e.target.closest('.branding, .info, .menu-item-info');

    // Ignore click if it's on a trigger
    if (clickedTrigger) return;

    // Ignore click if it's inside bio or on a link
    if (clickedInsideBio || clickedOnLink) return;

    // Otherwise, close the modal
    toggleModal();
  });
});
