{{--
  Title: Banner
  Description: Test gutenberg block
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: edit
  Align: left
  PostTypes: page post
  SupportsAlign: left right
  SupportsMode: false
  SupportsMultiple: false
  EnqueueStyle: styles/style.scss
  EnqueueScript: scripts/script.js
  EnqueueAssets: path/to/asset
--}}

<div class="relative {{ $block['classes'] }}">
    <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
        <div class="relative py-36 ml-auto">
            <div class="lg:w-2/3 text-center mx-auto">
            <h1 id="bannerline" class="font-bold text-5xl md:text-6xl xl:text-7xl leading-[1.1] xl:leading-[1.1] md:leading-[1.1]"><span class="text-primary dark:text-white">{{ get_field('site_title') }}</h1>
            <h2 class="text-3xl mt-8 text-gray-700">{{ get_field('tagline') }}</h2>
        </div>
    </div>


</div>



<style type="text/css">
  [data-{{$block['id']}}] {
    background: {{ get_field('background_color') }};
    color: {{ get_field('text_color') }};
  }
</style>