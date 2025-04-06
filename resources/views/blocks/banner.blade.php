{{--
  Title: Banner
  Description: Test gutenberg block
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: preview
  Align: center
  SupportsAlign: center
  SupportsMode: true
  SupportsMultiple: true
  SupportsJsx: true
--}}

<div class="relative {{ $block['classes'] }}">
    <div class="max-w-7xl mx-auto px-2">
        <div class="relative py-12 ml-auto">
            <div class="lg:w-2/3 text-center mx-auto">
            <h1 id="bannerline" data="{{ $block['id'] }}" class="text-[#6d6e71] text-5xl md:text-6xl xl:text-7xl leading-[1.1] xl:leading-[1.1] md:leading-[1.1]"><span class="text-secondary">{{ get_field('site_title_coloured') }}</span>{{ get_field('site_title') }}</h1>
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