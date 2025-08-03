<footer class="bg-darkroyal relative">
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
    <div class="pb-12 sm:pb-0">
      &copy; {{ date('Y') }} {{ get_bloginfo('name') }}. All rights reserved.
    </div>

  </div>
  <div class="absolute left-0 z-10 inset-x-0 bottom-0 flex items-end">
      <a href="{{ home_url('/') }}">
        <img src="@asset('images/kootenay-avalanche-courses-logo.svg')" alt="{{ get_bloginfo('name', 'display') }}" class="align-bottom h-20 w-auto">
      </a>
    </div>
</footer>

