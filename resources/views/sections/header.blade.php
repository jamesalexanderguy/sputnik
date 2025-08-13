<div x-data="{ open: false }" x-effect="document.body.classList.toggle('overflow-hidden', open)">
  <header class="fixed top-0 inset-x-0 z-[100] bg-transparent {{ is_user_logged_in() ? 'mt-[32px]' : '' }}">
    <div class="w-full flex items-end justify-between pr-4 py-0 relative z-50">
      <a href="{{ home_url('/') }}" class="kaclogo block">
        <img src="@asset('images/kootenay-avalanche-courses-logo.svg')" alt="{{ get_bloginfo('name', 'display') }}" class="h-20 w-auto">
      </a>
      <button
        @click="open = !open"
        :class="{ 'open': open } bg-darkroyal/40 rounded-md"
        class="relative w-10 h-10 z-50 focus:outline-none group mb-3 mr-8 hamburger"
        ><span
          class="block absolute h-0.5 pt-[2px] border-t-3 border-darkroyal w-10 bg-white transform transition duration-300 ease-in-out origin-center"
          :class="open ? 'rotate-45 top-4 translate-x-[1px] translate-y-[1px]' : 'top-2 translate-y-0'"
        ></span>
        <span
          class="block absolute h-0.5 pt-[2px] border-t-3 border-darkroyal w-10 bg-white transform transition duration-300 ease-in-out origin-[left_50%]"
          :class="open ? 'opacity-0 top-4' : 'top-4'"
        ></span>
        <span
          class="block absolute h-0.5 pt-[2px] border-t-3 w-10 border-darkroyal bg-white transform transition duration-300 ease-in-out origin-center"
          :class="open ? '-rotate-45 top-4 translate-y-[0.5px]' : 'top-6 translate-y-0'"
        ></span>
      </button>
    </div>

    @php
      $locations = get_nav_menu_locations();
      $menu_id = $locations['primary_navigation'] ?? null;

      $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
      $menu_items = is_array($menu_items) ? $menu_items : [];

      $top_level_items = array_filter($menu_items, fn($item) => $item->menu_item_parent == 0);

      // Left-to-right: white, darkroyal, babybluelight, white
      $colors = [
        'bg-white',
        'bg-darkroyal text-white',
        'bg-babybluelight',
        'bg-white',
      ];
    @endphp

    <div
      x-show="open"
      x-transition:enter="transition ease-out duration-300"
      x-transition:enter-start="opacity-0 translate-y-2.5"
      x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-300"
      x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 translate-y-2.5"
      x-cloak
      class="absolute top-full inset-x-0 z-50 overflow-y-auto max-h-[calc(100vh-80px)]"
    >
      <div
        x-data="menuAccordion()"
        x-init="init()"
        class="bg-white grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 w-full text-darkroyal border border-white divide-white divide-x divide-y sm:divide-y-0"
      >
        @foreach ($top_level_items as $index => $item)
          @php
            $children = array_filter($menu_items, fn($child) => $child->menu_item_parent == $item->ID);
            $color_class = $colors[$index % count($colors)];
          @endphp
          <div class="col-span-1 p-8 {{ $color_class }}">
            <button
              @click="openIndex = openIndex === {{ $index }} ? -1 : {{ $index }}"
              class="flex items-center w-full text-left sm:cursor-default sm:pointer-events-none"
            >
              <span
                class="mr-2 text-lg sm:hidden"
                x-text="isOpen({{ $index }}) ? '−' : '+'"
              ></span>
              <span class="uppercase font-inter text-lg">{!! $item->title !!}</span>
            </button>

            <ul
              x-show="isOpen({{ $index }})"
              x-collapse.duration.300ms
              x-init="$el.style.overflow = 'hidden'"
              class="mt-2 space-y-1 transition-all duration-300 ease-in-out"
            >
              @foreach ($children as $child)
                <li>
                  <a href="{{ esc_url($child->url) }}" class="hover:text-blue-700 block">
                    {!! $child->title !!}
                  </a>
                </li>
              @endforeach
            </ul>

            @if ($loop->first)
            <div class="mt-6 space-y-1">
                <a href="https://www.instagram.com/kootenayavalanchecourses/" target="_blank" class="flex items-center space-x-2 text-darkroyal hover:text-scarletred transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7.5 3h9a4.5 4.5 0 0 1 4.5 4.5v9a4.5 4.5 0 0 1-4.5 4.5h-9A4.5 4.5 0 0 1 3 16.5v-9A4.5 4.5 0 0 1 7.5 3z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0z" />
                        <circle cx="17.25" cy="6.75" r="0.75" fill="currentColor" />
                    </svg>
                    <span>Follow KAC on Instagram</span>
                </a>
                
                <a href="https://www.youtube.com/@kootenayavalanchecourses" target="_blank" class="flex items-center space-x-2 text-darkroyal hover:text-scarletred transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M21.8 8s-.2-1.4-.8-2c-.8-.8-1.7-.8-2.1-.9C16.4 5 12 5 12 5s-4.4 0-6.9.1c-.4 0-1.3.1-2.1.9-.6.6-.8 2-.8 2S2 9.6 2 11.2v1.6c0 1.6.2 3.2.2 3.2s.2 1.4.8 2c.8.8 1.9.8 2.4.9 1.8.2 7.6.1 7.6.1s4.4 0 6.9-.1c.4 0 1.3-.1 2.1-.9.6-.6.8-2 .8-2s.2-1.6.2-3.2v-1.6c0-1.6-.2-3.2-.2-3.2zM9.75 14.25v-4.5l4.5 2.25-4.5 2.25z"/>
                    </svg>
                    <span>Follow KAC on YouTube</span>
                </a>
            </div>
        @endif

            @if ($loop->last)
            <div class="mt-4 wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
              <div class="wp-block-button is-style-outline is-style-outline--1">
                <a class="wp-block-button__link has-white-color has-scarletred-background-color has-text-color has-background has-link-color has-lg-font-size has-custom-font-size wp-element-button" href="/avalanche-training-courses">View All Courses</a>
              </div>
            </div>
            @endif

          </div>
        @endforeach
      </div>
    </div>
  </header>

  <div
    x-show="open"
    x-cloak
    x-transition:enter="transition-opacity ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition-opacity ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 bg-darkroyal/85 backdrop-blur-sm z-10"
    @click="open = false"
  ></div>
</div>

<script>
  function menuAccordion() {
    return {
      openIndex: 0,
      windowWidth: window.innerWidth,
      init() {
        window.addEventListener('resize', () => {
          this.windowWidth = window.innerWidth;
        });
      },
      isOpen(index) {
        return this.windowWidth >= 640 || this.openIndex === index;
      },
    };
  }
</script>
