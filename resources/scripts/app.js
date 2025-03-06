import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {


  // ...


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



  var siteHead = document.getElementById('header');
  var websites = document.getElementById('bannerline');
  var movWebsites = websites.offsetTop;
  var features = document.getElementById('websites');
  var movFeatures = features.offsetTop;
  var portfolio = document.getElementById('portfolio');
  var movPortfolio = portfolio.offsetTop;
  var getStarted = document.getElementById('get-started');
  var movGetStarted = getStarted.offsetTop;

  var resWebsites = movWebsites - document.documentElement.scrollTop;
  var resFeatures = movFeatures - document.documentElement.scrollTop;
  var resPortfolio = movPortfolio - document.documentElement.scrollTop;
  var resGetStarted = movGetStarted - document.documentElement.scrollTop;

  if (resWebsites <= 0) {
    siteHead.classList.remove('bg-secondary');
    siteHead.classList.add('bg-white');
  } 
  if (resFeatures <= 0) {
    siteHead.classList.remove('bg-white');
    siteHead.classList.add('bg-secondary');
  }
  if (resPortfolio <= 0) {
    siteHead.classList.remove('bg-secondary');
    siteHead.classList.add('bg-white');
  } 
  if (resGetStarted <= 0) {
    siteHead.classList.remove('bg-white');
    siteHead.classList.remove('bg-secondary');
  }
  
window.onscroll = function(e) {

  var siteHead = document.getElementById('header');
  var websites = document.getElementById('bannerline');
  var movWebsites = websites.offsetTop;
  var features = document.getElementById('websites');
  var movFeatures = features.offsetTop;
  var portfolio = document.getElementById('portfolio');
  var movPortfolio = portfolio.offsetTop;
  var getStarted = document.getElementById('get-started');
  var movGetStarted = getStarted.offsetTop;

  var resWebsites = movWebsites - document.documentElement.scrollTop;
  var resFeatures = movFeatures - document.documentElement.scrollTop;
  var resPortfolio = movPortfolio - document.documentElement.scrollTop;
  var resGetStarted = movGetStarted - document.documentElement.scrollTop;

  // on load

  // on scroll
  if(this.oldScroll < this.scrollY){
    
    // scrolling down
    if (resWebsites <= 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
    } 
    if (resFeatures <= 0) {
      siteHead.classList.remove('bg-white');
      siteHead.classList.add('bg-secondary');
    }
    if (resPortfolio <= 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
    } 
    if (resGetStarted <= 0) {
      siteHead.classList.remove('bg-white');
      siteHead.classList.remove('bg-secondary');
    }
  }
  else if (this.oldScroll > this.scrollY){

    // scrolling up
    if (resGetStarted > 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
    }
    if (resPortfolio > 0) {
      siteHead.classList.remove('bg-white');
      siteHead.classList.add('bg-secondary');
    } 
    if (resFeatures > 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.add('bg-white');
    } 
    if (resWebsites > 0) {
      siteHead.classList.remove('bg-secondary');
      siteHead.classList.remove('bg-white');
    }
  }
  
  this.oldScroll = this.scrollY;
}

});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
