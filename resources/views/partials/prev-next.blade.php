@php
  $prev_post = get_previous_post();
  $next_post = get_next_post();
@endphp

<div class="container prevnext mx-auto py-16 padmob" 
     style="padding-left: var(--wp--preset--spacing--80); padding-right: var(--wp--preset--spacing--80);">
  <div class="grid md:grid-cols-2 gap-8 items-stretch">
    
    {{-- Previous post column --}}
    @if ($prev_post)
      <div class="flex justify-start h-full">
        <a href="{{ get_permalink($prev_post) }}" class="group border border-gray-200 rounded overflow-hidden shadow hover:shadow-lg transition duration-300 max-w-[300px] h-full flex flex-col">
          <img 
            src="{{ get_the_post_thumbnail_url($prev_post, 'medium') }}" 
            alt="{{ esc_attr(get_the_title($prev_post)) }}" 
            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
          >
          <div class="p-4 flex flex-col flex-grow">
            <h3 class="text-lg font-semibold mb-2">{!! html_entity_decode(get_the_title($prev_post)) !!}</h3>
            <p class="text-sm text-gray-600 mb-4 flex-grow">{!! html_entity_decode(wp_trim_words(get_the_excerpt($prev_post), 25)) !!}</p>
            <span class="text-blue-600 font-semibold">← Previous Post</span>
          </div>
        </a>
      </div>
    @else
      <div></div>
    @endif

    {{-- Next post column --}}
    @if ($next_post)
      <div class="flex justify-end h-full">
        <a href="{{ get_permalink($next_post) }}" class="group border border-gray-200 rounded overflow-hidden shadow hover:shadow-lg transition duration-300 max-w-[300px] h-full flex flex-col">
          <img 
            src="{{ get_the_post_thumbnail_url($next_post, 'medium') }}" 
            alt="{{ esc_attr(get_the_title($next_post)) }}" 
            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
          >
          <div class="p-4 flex flex-col flex-grow">
            <h3 class="text-lg font-semibold mb-2">{!! html_entity_decode(get_the_title($next_post)) !!}</h3>
            <p class="text-sm text-gray-600 mb-4 flex-grow">{!! html_entity_decode(wp_trim_words(get_the_excerpt($next_post), 25)) !!}</p>
            <span class="text-blue-600 font-semibold">Next Post →</span>
          </div>
        </a>
      </div>
    @else
      <div></div>
    @endif

  </div>
</div>
