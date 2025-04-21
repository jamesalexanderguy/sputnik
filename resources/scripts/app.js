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
   
  [...document.getElementsByClassName('minibrowser')].forEach(el => {

    function scrollToDiv(el, targetY, duration) {
      const startY = el.scrollTop;
      const startTime = performance.now();
    
      function scroll(currentTime) {
        const timeElapsed = currentTime - startTime;
        let progress = timeElapsed / duration;
    
        if (progress > 1) {
          progress = 1;
        }
    
        el.scrollTop = startY + (targetY - startY) * progress;
    
        if (progress < 1) {
          requestAnimationFrame(scroll);
        }
      }
    
      requestAnimationFrame(scroll);
    }
    
    
    // Calculate the target Y offset relative to the container
    
    
    
  const observer = new window.IntersectionObserver(   
    ([entry]) => {
      if (entry.isIntersecting) {

      setTimeout(function() {
        const targetY = el.scrollHeight;
        scrollToDiv(el, targetY, 10000);
        setTimeout(function() {
          const targetY = 0;
          scrollToDiv(el, targetY, 750);
        }, 10000);

      }, 2500);
      
        return;
      }
      
    },
    {
      root: null,
      threshold: 0.0 // 0.0 - 1.0   
    } );

    observer.observe(el);

  })

  // First, define a helper function.
function animateScroll(duration) {
  var start = someElement.scrollTop;
  var end = someElement.scrollHeight;
  var change = end - start;
  var increment = 20;
  function easeInOut(currentTime, start, change, duration) {
    // by Robert Penner
    currentTime /= duration / 2;
    if (currentTime < 1) {
      return change / 2 * currentTime * currentTime + start;
    }
    currentTime -= 1;
    return -change / 2 * (currentTime * (currentTime - 2) - 1) + start;
  }
  function animate(elapsedTime) {
    elapsedTime += increment;
    var position = easeInOut(elapsedTime, start, change, duration);
    someElement.scrollTop = position;
    if (elapsedTime < duration) {
      setTimeout(function() {
        animate(elapsedTime);
      }, increment)
    }
  }
  animate(0);
}
// Here's our main callback function we passed to the observer
function scrollToBottom() {
  var duration = 300 // Or however many milliseconds you want to scroll to last
  animateScroll(duration);
}


  var headerHeight = 66;
  var siteHead = document.getElementById('shortHead');
  var navMenu = document.getElementById('navMenu');
  var websites = document.getElementById('bannerline');
  var movWebsites = websites.offsetTop - headerHeight;
  var features = document.getElementById('websites');
  var movFeatures = features.offsetTop - headerHeight;
  var portfolio = document.getElementById('portfolio');
  var movPortfolio = portfolio.offsetTop - headerHeight;
  var getStarted = document.getElementById('make-contact');
  var movGetStarted = getStarted.offsetTop - headerHeight;

  var resWebsites = movWebsites - document.documentElement.scrollTop;
  var resFeatures = movFeatures - document.documentElement.scrollTop;
  var resPortfolio = movPortfolio - document.documentElement.scrollTop;
  var resGetStarted = movGetStarted - document.documentElement.scrollTop;

  if (resWebsites <= 0) {
    siteHead.classList.remove('bg-secondary');
    siteHead.classList.add('bg-white');
    navMenu.classList.remove('bg-secondary');
    navMenu.classList.add('bg-white');
  } 
  if (resFeatures <= 0) {
    siteHead.classList.remove('bg-white');
    siteHead.classList.add('bg-secondary');
    navMenu.classList.remove('bg-white');
    navMenu.classList.add('bg-secondary');
  }
  if (resPortfolio <= 0) {
    siteHead.classList.remove('bg-secondary');
    siteHead.classList.add('bg-white');
    navMenu.classList.remove('bg-secondary');
    navMenu.classList.add('bg-white');
  } 
  if (resGetStarted <= -60) {
    siteHead.classList.remove('bg-white');
    siteHead.classList.add('bg-secondary');
    navMenu.classList.remove('bg-white');
    navMenu.classList.add('bg-secondary');
  }
  
window.onscroll = function(e) {
  var headerHeight = 66;
  var siteHead = document.getElementById('shortHead');
  var navMenu = document.getElementById('navMenu');
  var websites = document.getElementById('bannerline');
  var movWebsites = websites.offsetTop - headerHeight;
  var features = document.getElementById('websites');
  var movFeatures = features.offsetTop - headerHeight;
  var portfolio = document.getElementById('portfolio');
  var movPortfolio = portfolio.offsetTop - headerHeight;
  var getStarted = document.getElementById('make-contact');
  var movGetStarted = getStarted.offsetTop - headerHeight;

  var resWebsites = movWebsites - document.documentElement.scrollTop;
  var resFeatures = movFeatures - document.documentElement.scrollTop;
  var resPortfolio = movPortfolio - document.documentElement.scrollTop;
  var resGetStarted = movGetStarted - document.documentElement.scrollTop;

  // on scroll
  if(this.oldScroll < this.scrollY){
    
    // scrolling down
    if (resWebsites <= 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
      navMenu.classList.remove('bg-secondary');
      navMenu.classList.add('bg-white');
    } 
    if (resFeatures <= 0) {
      siteHead.classList.remove('bg-white');
      siteHead.classList.add('bg-secondary');
      navMenu.classList.remove('bg-white');
      navMenu.classList.add('bg-secondary');
    }
    if (resPortfolio <= 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
      navMenu.classList.remove('bg-secondary');
      navMenu.classList.add('bg-white');
    } 
    if (resGetStarted <= -100) {
      siteHead.classList.remove('bg-white');
      siteHead.classList.add('bg-secondary');
      navMenu.classList.remove('bg-white');
      navMenu.classList.add('bg-secondary');
    }
  }
  else if (this.oldScroll > this.scrollY){

    // scrolling up
    if (resGetStarted > -100) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
      navMenu.classList.remove('bg-secondary');
      navMenu.classList.add('bg-white');
    }
    if (resPortfolio > 0) {
      siteHead.classList.remove('bg-white');
      siteHead.classList.add('bg-secondary');
      navMenu.classList.remove('bg-white');
      navMenu.classList.add('bg-secondary');
    } 
    if (resFeatures > 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
      navMenu.classList.remove('bg-secondary');
      navMenu.classList.add('bg-white');
    } 
    if (resWebsites > 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.remove('bg-white');
      navMenu.classList.remove('bg-secondary');
      navMenu.classList.add('bg-white');
    }
  }
  
  this.oldScroll = this.scrollY;
}

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
