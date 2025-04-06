{{--
  Title: Features Grid
  Description: Grid with image and text blocks
  Category: formatting
  Icon: admin-comments
  Keywords: features, content
  Mode: preview
  Align: center
  SupportsAlign: center
  SupportsMode: true
  SupportsMultiple: true
  SupportsAnchor: true
--}}

<div id="{{ $block['anchor'] }}" data="{{ $block['id'] }}" class="flex justify-center pb-8 pt-4 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
    

   <!--Start features grid-->
   <section class="container">
      <div class="grid gap-4 md:grid-cols-2 2xl:gap-6 content-stretch">
        <!--block one-->
        <div class="flex order-3 overflow-hidden rounded-lg bg-tertiary md:order-1 lg:row-span-2">

          <img class="object-cover" alt="Allset Evacuation Backpacks" loading="lazy" src="{{ get_field('gridimage') }}">
        </div>

        <!--block two-->
        <div class="relative overflow-hidden border border-gray-200 order-1 flex flex-col items-start rounded-lg bg-secondary md:order-3 md:col-span-2 lg:order-2 lg:col-span-1">
          
          
            <img class="w-full" alt="Allset Evacuation Backpacks" loading="lazy" src="{{ get_field('gridimage2') }}">
          
        </div>
        <!--block three-->
        <div class="group order-2 flex grow-1 h-full flex-col rounded-lg bg-tertiary px-6 py-8 text-gray-800 lg:order-3">
          <h2 class="text-[#6d6e71] text-4xl mb-6">{{ the_field('gridhead') }}</h2>
          <div class="wysiwyg">{{ the_field('gridtext') }}</div>
          
        </div>
      </div>
    </section>
    <!--end Features grid-->
  </div>
</div>


<style type="text/css">
  [data-{{$block['id']}}] {
    background: {{ get_field('background_color') }};
    color: {{ get_field('text_color') }};
  }
</style>