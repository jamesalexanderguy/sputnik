<footer class="bg-white border-t mt-12">
  <div class="container mx-auto px-4 py-8 text-center text-sm text-gray-600 space-y-4">
    
    {{-- Site Title or Logo --}}
    <div>
      <a href="{{ home_url('/') }}" class="text-xl font-bold text-blue-400 hover:text-blue-500 transition">
        <img src="@asset('images/kootenay-avalanche-courses-logo.png')" alt="{{ get_bloginfo('name', 'display') }}" class="h-12 w-auto">
      </a>
    </div>

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
</footer>

