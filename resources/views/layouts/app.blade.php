<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>.wpcf7-response-output {margin-left: 0; margin-right: 0;}.grecaptcha-badge {visibility: hidden !important;position: relative;z-index: -1;}.wpcf7-spinner {position: absolute;}.contactButton {margin-top: 1rem;}</style>
  </head>

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app" class="bg-white dark:bg-gray-900"><!-- wrapper -->
      
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content') }}
      </a>

      @include('sections.header')

      <main id="main" class="main">
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
<style>
	html {
		font-family: Urbanist, sans-serif;
		scroll-behavior: smooth;
	}

	body {
		margin: 0;
	}
</style>
