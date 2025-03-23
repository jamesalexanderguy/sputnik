{{--
  Title: Text with Image
  Description: Content block with text and righthand image
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: true
  EnqueueStyle: styles/style.scss
  EnqueueScript: scripts/script.js
  EnqueueAssets: path/to/asset
--}}

<div class="relative py-16 {{ $block['classes'] }}">
  <div class="flex max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
    <div class="relative w-3/5">
      
      <div class="mt-6 m-auto space-y-6 md:w-8/12 lg:w-7/12">
        <h2 class="text-left text-4xl font-bold text-gray-800 dark:text-white md:text-5xl">{{ get_field('blockhead') }}</h2>
        <p class="text-left text-xl text-gray-600 dark:text-gray-300">
        {{ the_field('blocktext') }}</p>
      </div>
    </div>
    <div class="group relative w-2/5">
      <div class="mx-6 h-full flex flex-col justify-center space-y-8 py-12 p-8">
          <img
              src="{{ get_field('blockimage') }}"
              class=""
              alt="All Set Packs"
            />
      </div>
    </div>
  </div>
</div>


<style type="text/css">
  [data-{{$block['id']}}] {
    background: {{ get_field('background_color') }};
    color: {{ get_field('text_color') }};
  }
</style>