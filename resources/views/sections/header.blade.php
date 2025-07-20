<header class="left-0 w-full pointer-events-none">
          
  @if (has_nav_menu('primary_navigation'))
    @php
      $locations = get_nav_menu_locations();
      $menu_id = $locations['primary_navigation'] ?? null;
      $menu_items = $menu_id ? wp_get_nav_menu_items($menu_id) : [];
    @endphp

    @if ($menu_items)
    <nav id="mobnav" class="px-5 w-full max-w-screen-xl mx-auto sm:flex justify-between items-center pointer-events-auto" aria-label="Main menu">
        <div class="headwrap w-full fixed px-6 left-0 top-[10%] sm:flex items-center mix-blend-difference">
          
          <ul class="w-full flex flex-col space-y-6 pl-[10%] sm:pl-[15%] custom:pl-[35%]">
            @foreach ($menu_items as $item)
              @php
                // Convert array of class names into a string
                $classes = implode(' ', $item->classes ?? []);
                $isInfoLink = in_array('inst', $item->classes ?? []);
              @endphp
              <li class="">
                <a href="{{ $item->url }}" @if ($item->target) target="{{ $item->target }}" rel="noopener" @endif class="mix-blend-difference text-white hover:text-hovercolor hover:mix-blend-normal {{ $classes }}" 
                >
                  {{ $item->title }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
      </nav>

      <nav id="pnav" class="px-5 w-full max-w-screen-xl mx-auto flex justify-between items-center pointer-events-auto" aria-label="Main menu">
        <div class="headwrap w-full fixed px-6 left-0 top-[35%] flex items-center mix-blend-difference">

          <button class="branding uppercase text-left text-2xl font-bold mix-blend-difference text-white hover:text-hovercolor hover:mix-blend-normal" class="info" role="button" aria-haspopup="dialog" aria-controls="info-modal">
            {!! $siteName !!}
          </button>
          <ul class="flex flex-1 justify-between pl-[10%] sm:pl-[15%] custom:pl-[35%] space-x-6">
            <button class="text-xl info wordinfo mix-blend-difference text-white hover:text-hovercolor hover:mix-blend-normal" class="info" role="button" aria-haspopup="dialog" aria-controls="info-modal">
              info
            </button>
            @foreach ($menu_items as $item)
              @php
                // Convert array of class names into a string
                $classes = implode(' ', $item->classes ?? []);
        
              @endphp
              
              <li class="{{ $classes }}">
                
                  <a href="{{ $item->url }}" @if ($item->target) target="{{ $item->target }}" rel="noopener" @endif class="mix-blend-difference text-white hover:text-hovercolor hover:mix-blend-normal" 
                  >
                    {{ $item->title }}
                  </a>
                
              </li>
              
            @endforeach
          </ul>
        </div>
      </nav>
    @endif
  @endif
</header>
