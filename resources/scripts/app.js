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


  [...document.getElementsByClassName('minibrowser')].forEach(el => {

  const observer = new window.IntersectionObserver(   
    ([entry]) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("roll");
        return;
      }
      entry.target.classList.remove("roll");
    },
    {
      root: null,
      threshold: 0.0 // 0.0 - 1.0   
    } );

    observer.observe(el);

  })


  var headerHeight = 66;
  var siteHead = document.getElementById('shortHead');
  var navMenu = document.getElementById('navMenu');
  var websites = document.getElementById('bannerline');
  var movWebsites = websites.offsetTop - headerHeight;
  var features = document.getElementById('websites');
  var movFeatures = features.offsetTop - headerHeight;
  var portfolio = document.getElementById('portfolio');
  var movPortfolio = portfolio.offsetTop - headerHeight;
  var getStarted = document.getElementById('get-started');
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
  var getStarted = document.getElementById('get-started');
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
