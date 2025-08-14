import domReady from '@roots/sage/client/dom-ready';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse';
import '../scripts/components/alpine-blog.js';

window.Alpine = Alpine;
Alpine.plugin(collapse);

/**
 * Application entrypoint
 */
domReady(async () => {
  Alpine.start();

  /**
   * WC Buttons Logic — runs only if relevant DOM elements exist
   */
  if (document.querySelector('.single-course, .product_cat-lodge, .product_cat-tbd, li.product.outofstock')) {
    var buttonData = [
      {
        selector: '.single-course .product_cat-lodge',
        html: '<a href="/ast2-plus-application" class="appbutton button add_to_cart_button" rel="nofollow">Apply now</a>',
        replace: false,
      },
      {
        selector: '.single-course .product_cat-tbd',
        html: '<a href="/register-interest" class="tbdbutton button add_to_cart_button" rel="nofollow">Register interest</a>',
        replace: false,
      },
      {
        selector: 'li.product.outofstock',
        html: '<a href="/register-interest" class="tbdbutton button add_to_cart_button" rel="nofollow">Register interest</a>',
        replace: true,
      },
    ];

    buttonData.forEach(function (item) {
      document.querySelectorAll(item.selector).forEach(function (el) {
        if (item.replace) {
          var existingButton = el.querySelector('a.button');
          if (existingButton) {
            existingButton.outerHTML = item.html;
          }
        } else {
          el.insertAdjacentHTML('beforeend', item.html);
        }
      });
    });
  }
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
