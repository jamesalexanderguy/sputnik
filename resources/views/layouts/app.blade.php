<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  <body class="{{ implode(' ', array_merge(['min-h-screen', 'flex', 'flex-col', 'relative'], get_body_class())) }}">
    @php(wp_body_open())

    <div id="app" class="flex-grow bg-white">
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content') }}
      </a>


      <main id="main" class="main">
        @yield('content')
      </main>
    </div>

    {{-- Moved here to avoid parent-child blending issue --}}
    @include('sections.header')

    @include('sections.footer')
    @include('partials.info-modal')
    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
