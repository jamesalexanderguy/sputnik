import domReady from '@roots/sage/client/dom-ready';
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import '../scripts/components/alpine-blog.js'
import '../scripts/components/wc-buttons.js'

window.Alpine = Alpine;
Alpine.plugin(collapse)


/**
 * Application entrypoint
 */
domReady(async () => {
  Alpine.start();
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
