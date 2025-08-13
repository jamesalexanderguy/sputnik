<div class="prose">
  @php(the_content())
</div>
<div 
  x-data="contentLoop('/wp-json/sputnik/v1/courses', '/wp-json/wp/v2/course_category')" 
  x-init="init()" 
  class="container mx-auto py-4 padmob" style="padding-left: var(--wp--preset--spacing--80); padding-right: var(--wp--preset--spacing--80);"
>
<h3>View Our Other Avalanche Training Courses</h3>
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
            <span class="text-darkroyal hover:text-scarletred font-semibold">Read more →</span>
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
