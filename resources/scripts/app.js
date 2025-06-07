import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {


  // ...

  var hamburger = document.getElementById('hamburger');
  var navLayer = document.getElementById('navLayer');
  var navMenu = document.getElementById('navMenu');
  


  // hamburger on click toggle 
  hamburger.addEventListener('click', function() {
    this.classList.toggle('clicked');
    navLayer.classList.toggle('blurryFace');
    navMenu.classList.toggle('openSesame');
  });

  // close menu on click
  navMenu.addEventListener('click', function() {
  let count = 0;
  let interval = setInterval(() => {
      count++;
      if (count === 1) {
        navLayer.classList.remove('blurryFace');
        navMenu.classList.remove('openSesame');
        hamburger.classList.remove('clicked');
          clearInterval(interval);
          
      }
  }, 1500);
});

// modal setup for blocks
    const slides = document.querySelectorAll('.slide');
    let currentSlide = 0;

    const showSlide = (index) => {
      slides.forEach((slide, i) => {
        slide.classList.toggle('hidden', i !== index);
      });
    };

    document.getElementById('nextSlide').addEventListener('click', () => {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    });

    document.getElementById('prevSlide').addEventListener('click', () => {
      currentSlide = (currentSlide - 1 + slides.length) % slides.length;
      showSlide(currentSlide);
    });

    // Optional: reset to first slide when modal opens
    document.getElementById('openModalBtn').addEventListener('click', () => {
      currentSlide = 0;
      showSlide(currentSlide);
    });

    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('packModal');
    const body = document.body;
    
    openBtn.addEventListener('click', function (e) {
      e.preventDefault();
      modal.classList.remove('hidden');
      modal.classList.add('flex');
      body.classList.add('overflow-hidden'); // lock scroll
    });
    
    closeBtn.addEventListener('click', function () {
      modal.classList.add('hidden');
      modal.classList.remove('flex');
      body.classList.remove('overflow-hidden'); // unlock scroll
    });
    
    modal.addEventListener('click', function (e) {
      if (e.target === modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        body.classList.remove('overflow-hidden'); // unlock scroll
      }
    });

  // close menu on backdrop click
  navLayer.addEventListener('click', function() {
    let count = 0;
    let interval = setInterval(() => {
        count++;
        if (count === 1) {
          navLayer.classList.toggle('blurryFace');
          navMenu.classList.toggle('openSesame');
          hamburger.classList.toggle('clicked');
            clearInterval(interval);
            
        }
    }, 500);
  });


});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
