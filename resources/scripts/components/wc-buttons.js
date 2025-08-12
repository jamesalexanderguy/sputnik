document.addEventListener('DOMContentLoaded', function () {
  var buttonData = [
    {
      selector: '.single-course .product_cat-lodge',
      html: '<a href="/ast2-plus-application" class="appbutton button add_to_cart_button" rel="nofollow">Apply now</a>',
      replace: false
    },
    {
      selector: '.single-course .product_cat-tbd',
      html: '<a href="/register-interest" class="tbdbutton button add_to_cart_button" rel="nofollow">Register interest</a>',
      replace: false
    },
    {
      selector: 'li.product.outofstock',
      html: '<a href="/register-interest" class="tbdbutton button add_to_cart_button" rel="nofollow">Register interest</a>',
      replace: true
    }
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
});
