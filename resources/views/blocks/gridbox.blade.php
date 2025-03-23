{{--
  Title: Features Grid
  Description: Grid with image and text blocks
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

<div id="portfolio" class="pb-8 pt-4 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
    

   <!--Osprey Community Foundation-->
   <section class="container mt-14 mb-24 md:my-16 lg:my-18 2xl:mt-0 2xl:mb-30">
      <div class="grid gap-4 md:grid-cols-2 2xl:gap-6 content-stretch">
        <!--block one-->
        <div class="flex order-3 overflow-hidden rounded-lg bg-tertiary md:order-1 lg:row-span-2">

          <img class="object-cover" alt="Selkirk Snowcat Skiings" loading="lazy" src="{{ get_field('gridimage') }}">
        </div>

        <!--block two-->
        <div class="relative overflow-hidden border border-gray-200 order-1 flex flex-col items-start rounded-lg bg-secondary md:order-3 md:col-span-2 lg:order-2 lg:col-span-1">
          
          
            <img class="w-full" alt="Osprey Community Foundation" loading="lazy" src="{{ get_field('gridimage2') }}">
          
        </div>
        <!--block three-->
        <div class="group order-2 flex grow-1 h-full flex-col rounded-lg bg-tertiary px-6 py-8 text-white lg:order-3">
          <h2 class="text-4xl font-bold mb-6">{{ get_field('gridhead') }}</h2>
          {{ get_field('gridtext') }}
          
        </div>
      </div>
    </section>
    <!--end Osprey-->
  </div>
</div>


<style type="text/css">
  [data-{{$block['id']}}] {
    background: {{ get_field('background_color') }};
    color: {{ get_field('text_color') }};
  }
</style>