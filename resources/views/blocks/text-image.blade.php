{{--
  Title: Text with Image
  Description: Content block with text and righthand image
  Category: formatting
  Icon: admin-comments
  Keywords: content, image, text
  Mode: preview
  Align: center
  SupportsAlign: center
  SupportsMode: true
  SupportsMultiple: true
  SupportsAnchor: true
--}}

<div id="{{ $block['anchor'] }}" data="{{ $block['id'] }}" class="relative py-16 {{ $block['classes'] }}">
  <div class="flex flex-col md:flex-row content-stretch max-w-5xl mx-auto px-6 md:px-12 xl:px-6">
    <div class="relative w-full md:w-1/2">
      
      <div class="mt-6 m-auto space-y-6">
        <h2 class="text-left text-3xl text-[#6d6e71] md:text-4xl">{{ the_field('blockheading') }}</h2>
        
        <div class="wysiwyg text-left text-1xl text-gray-800">{{ the_field('blocktext') }}</div>
      </div>
    </div>
    <div class="relative w-full md:w-1/2">
      <div class="md:mx-6 h-full flex flex-col justify-center space-y-6">
          <img
              src="{{ get_field('blockimage') }}"
              class="rounded-lg object-cover"
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