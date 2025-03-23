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
        navLayer.classList.toggle('blurryFace');
        navMenu.classList.toggle('openSesame');
        hamburger.classList.toggle('clicked');
          clearInterval(interval);
          
      }
  }, 1500);
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
