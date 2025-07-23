@php
  $prev_post = get_previous_post();
  $next_post = get_next_post();
@endphp

<div class="container mx-auto px-4 py-16 border-t border-gray-200 mt-16">
  <div class="grid md:grid-cols-2 gap-8">
    @if ($prev_post)
      <a href="{{ get_permalink($prev_post) }}" class="block group border border-gray-200 rounded overflow-hidden shadow hover:shadow-lg transition duration-300">
        <img 
          src="{{ get_the_post_thumbnail_url($prev_post, 'medium') }}" 
          alt="{{ esc_attr(get_the_title($prev_post)) }}" 
          class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
        >
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">{{ get_the_title($prev_post) }}</h3>
          <p class="text-sm text-gray-600 mb-4">{{ wp_trim_words(get_the_excerpt($prev_post), 25) }}</p>
          <span class="text-blue-600 font-semibold text-right">← Previous Post</span>
        </div>
      </a>
    @endif

    @if ($next_post)
      <a href="{{ get_permalink($next_post) }}" class="block group border border-gray-200 rounded overflow-hidden shadow hover:shadow-lg transition duration-300">
        <img 
          src="{{ get_the_post_thumbnail_url($next_post, 'medium') }}" 
          alt="{{ esc_attr(get_the_title($next_post)) }}" 
          class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
        >
        <div class="p-4">
          <h3 class="text-lg font-semibold mb-2">{{ get_the_title($next_post) }}</h3>
          <p class="text-sm text-gray-600 mb-4">{{ wp_trim_words(get_the_excerpt($next_post), 25) }}</p>
          <span class="text-blue-600 font-semibold">Next Post →</span>
        </div>
      </a>
    @endif
  </div>
</div>
