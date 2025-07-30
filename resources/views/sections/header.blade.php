<div x-data="{ open: false }">
  <header class="fixed top-0 inset-x-0 z-[100] bg-white {{ is_user_logged_in() ? 'mt-[32px]' : '' }}">
    <div class="w-full flex items-end justify-between pr-4 py-0 relative z-50">
      <a href="{{ home_url('/') }}" class="block">
        <img src="@asset('images/kootenay-avalanche-courses-logo.svg')" alt="{{ get_bloginfo('name', 'display') }}" class="h-20 w-auto">
      </a>
      <button
        @click="open = !open"
        :class="{ 'open': open }"
        class="relative w-10 h-10 z-50 focus:outline-none group mb-3 mr-8"
        ><span
          class="block absolute h-0.5 w-8 bg-darkroyal transform transition duration-300 ease-in-out"
          :class="open ? 'rotate-45 top-4' : 'top-2'"
        ></span>
        <span
          class="block absolute h-0.5 w-8 bg-darkroyal transform transition duration-300 ease-in-out"
          :class="open ? 'opacity-0' : 'top-4'"
        ></span>
        <span
          class="block absolute h-0.5 w-8 bg-darkroyal transform transition duration-300 ease-in-out"
          :class="open ? '-rotate-45 top-4' : 'top-6'"
        ></span>
      </button>

    </div>

    @php
    $locations = get_nav_menu_locations();
    $menu_id = $locations['primary_navigation'] ?? null;

    $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
    $menu_items = is_array($menu_items) ? $menu_items : [];

    $top_level_items = array_filter($menu_items, fn($item) => $item->menu_item_parent == 0);
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
    class="bg-white grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 w-full text-darkroyal pb-12"
  >
      

      @foreach ($top_level_items as $index => $item)
        @php
          $children = array_filter($menu_items, fn($child) => $child->menu_item_parent == $item->ID);
        @endphp
        <div class="col-span-1 p-8 border-b sm:border-none">
          <button
            @click="openIndex = openIndex === {{ $index }} ? -1 : {{ $index }}"
            class="flex items-center w-full text-left sm:cursor-default sm:pointer-events-none"
          >
          <span
              class="mr-2 text-lg sm:hidden"
              x-text="isOpen({{ $index }}) ? '−' : '+'"
            ></span>
            <span class="uppercase font-inter text-lg">{{ $item->title }}</span>
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
                {{ $child->title }}
              </a>
            </li>
          @endforeach
        </ul>
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
    class="fixed inset-0 bg-black/50 backdrop-blur-sm z-10"
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



