<footer class="bg-darkroyal border-t mt-12 relative">
  <div class="container mx-auto px-4 py-8 text-center text-sm text-white space-y-4">    

    {{-- Optional Footer Menu --}}
    @if (has_nav_menu('footer'))
      <nav>
        {!! wp_nav_menu([
          'theme_location' => 'footer',
          'menu_class' => 'flex justify-center space-x-6',
          'echo' => false,
          'container' => false,
        ]) !!}
      </nav>
    @endif

    {{-- Copyright --}}
    <div>
      &copy; {{ date('Y') }} {{ get_bloginfo('name') }}. All rights reserved.
    </div>

  </div>
  <div class="pt-12 sm:pt-0">
      <a href="{{ home_url('/') }}">
        <img src="@asset('images/kootenay-avalanche-courses-logo.png')" alt="{{ get_bloginfo('name', 'display') }}" class="absolute bottom-0 left-0 h-20 w-auto">
      </a>
    </div>
</footer>

