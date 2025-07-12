<header class="fixed top-1/2 left-0 w-full -translate-y-1/2 z-50 pointer-events-none">
  @if (has_nav_menu('primary_navigation'))
  @php
  $locations = get_nav_menu_locations();
  $menu_id = $locations['primary_navigation'] ?? null;
  $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
@endphp

@if ($menu_items)
  <nav id="pnav" class="px-5 w-full max-w-screen-xl mx-auto flex justify-between items-center pointer-events-auto" aria-label="Main menu">
    <a class="uppercase text-xl font-bold" href="{{ home_url('/') }}">
      {!! $siteName !!}
    </a>
    <ul class="flex flex-1 justify-between pl-[10%] sm:pl-[15%] custom:pl-[35%] space-x-6">
      @foreach ($menu_items as $item)
        <li class="relative isolate">
          <a href="{{ $item->url }}">{{ $item->title }}</a>
        </li>
      @endforeach
    </ul>
  </nav>
@endif
  @endif
</header>
