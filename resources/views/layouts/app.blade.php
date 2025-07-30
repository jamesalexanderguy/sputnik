<!doctype html>
<html @php(language_attributes()) x-data="{ mobileMenuOpen: false }" class="scroll-smooth antialiased text-gray-900 bg-white">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
  </head>

  <body class="{{ implode(' ', get_body_class()) }} font-sans leading-relaxed tracking-wide">
    @php(wp_body_open())

    <div id="app" class="min-h-screen flex flex-col mt-[80px]">
      <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-blue-600 text-white px-4 py-2 rounded">
        {{ __('Skip to content') }}
      </a>

      @include('sections.header')

      <main id="main" class="flex-grow" role="main">
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="w-full bg-gray-100 border-t border-gray-200">
          <div class="container mx-auto px-4 py-6">
            @yield('sidebar')
          </div>
        </aside>
      @endif

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
