<header class="fixed top-0 inset-x-0 z-50 bg-babyblue">
  <div class="container mx-auto px-0 py-4 flex items-center justify-between">
    <a href="{{ home_url('/') }}" class="text-xl font-bold text-blue-400 hover:text-blue-500 transition">
      <img src="@asset('images/kootenay-avalanche-courses-logo.png')" alt="{{ get_bloginfo('name', 'display') }}" class="h-12 w-auto">
    </a>

    <nav class="hidden md:flex space-x-6">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu([
          'theme_location' => 'primary_navigation',
          'menu_class' => 'menu flex space-x-6 text-sm font-medium text-gray-700',
          'echo' => false,
          'container' => false,
          'walker' => new \App\Walkers\Tailwind_Navwalker(),
        ]) !!}
      @endif
    </nav>

    <button x-data="{ open: false }" @click="open = !open" class="md:hidden text-blue-400 focus:outline-none">
      <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
      <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>
  </div>

  <div x-data="{ open: false }" x-show="open" x-cloak class="md:hidden bg-white shadow-md">
    @if (has_nav_menu('primary'))
      {!! wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class' => 'menu flex flex-col space-y-4 px-4 py-4 text-sm font-medium text-gray-700',
        'echo' => false,
        'container' => false,
      ]) !!}
    @endif
  </div>
</header>
