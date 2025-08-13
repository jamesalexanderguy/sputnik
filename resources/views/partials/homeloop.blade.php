{{-- Blog loop to show in the 'home' template aka blog index --}}

{!! apply_filters('the_content', get_post(3090)->post_content) !!}
<div 
  x-data="contentLoop('/wp-json/sputnik/v1/posts', '/wp-json/wp/v2/categories?per_page=100')" 
  x-init="init()" 
  class="container px-4 py-12 padmob" style="padding-left: var(--wp--preset--spacing--80); padding-right: var(--wp--preset--spacing--80);"
>
  <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <input 
      type="text" 
      x-model="search" 
      @input.debounce.300ms="fetchPosts" 
      placeholder="Search..." 
      class="w-full md:w-1/3 border border-gray-300 rounded px-4 py-2"
    />

    <div class="flex flex-wrap gap-2">
      <template x-for="cat in categories" :key="cat.id">
        <button 
          :class="{
            'bg-scarletred bold text-white': activeCategories.includes(cat.id),
            'bg-darkroyal bold text-white': !activeCategories.includes(cat.id)
          }"
          class="px-3 py-1 rounded text-sm"
          @click="toggleCategory(cat.id)"
        >
          <span x-html="cat.name"></span>
        </button>
      </template>
    </div>
  </div>

  <div 
    class="grid md:grid-cols-2 lg:grid-cols-3 gap-8"
    x-show="posts.length > 0"
    x-transition
  >
    <template x-for="post in posts" :key="post.id">
      <div class="border border-gray-200 rounded overflow-hidden shadow hover:shadow-lg transition duration-300">
        <a :href="post.link" class="block group">
          <img 
            :src="post.featured_image" 
            :alt="post.title" 
            class="w-full h-48 object-cover transition-transform duration-300 group-hover:scale-105"
          />
          <div class="p-4">
            <h3 class="text-lg font-semibold mb-2" x-html="post.title"></h3>
            <p class="text-sm text-gray-600 mb-4" x-html="post.excerpt"></p>
            <span class="text-blue-600 font-semibold">Read more →</span>
          </div>
        </a>
      </div>
    </template>
  </div>

  <div x-show="!loading && posts.length === 0" class="text-center text-gray-500 py-8">
    No posts found.
  </div>


  <div x-show="loading" class="text-center py-4 text-gray-500">Loading…</div>

</div>
<div class="prose">
  {!! apply_filters('the_content', get_post(2935)->post_content) !!}
  {!! apply_filters('the_content', get_post(2897)->post_content) !!}
</div>

