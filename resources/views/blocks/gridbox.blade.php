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
        <div class="flex order-3 overflow-hidden rounded-lg bg-tertiary md:order-1 md:row-span-2">

          <img class="object-cover" alt="Allset Evacuation Backpacks" loading="lazy" src="{{ get_field('gridimage') }}">
        </div>

        <!--block two-->
        <div class="relative overflow-hidden border border-gray-200 order-1 flex flex-col items-start rounded-lg bg-secondary md:order-2 lg:col-span-1">
  
          <img class="h-full w-full object-cover aspect-[5/3.5]" alt="Allset Evacuation Backpacks" loading="lazy" src="{{ get_field('gridimage2') }}">
          @if ( get_field('modal_button'))
            <a href="#" id="openModalBtn" class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 flex h-9 items-center justify-center before:absolute before:inset-0 before:rounded-md before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 min-w-[50%] w-auto">
              <span class="relative text-sm font-semibold text-white">{{ get_field('modal_button') }}</span>
            </a>
          @endif

        <!-- Modal -->
        <div id="packModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70">
          <div class="relative p-12 rounded-lg shadow-lg max-h-full max-w-full w-full h-auto">
            <button id="closeModalBtn" class="fixed top-2 right-2 transition duration-300 text-white hover:text-tertiary text-5xl">&times;</button>

            <!-- Wrapper that doesn't clip overflow -->
            <div class="relative flex flex-col items-center justify-center">

              <!-- Left Chevron OUTSIDE the image area -->
              <button id="prevSlide"
                class="absolute -left-12 top-1/2 -translate-y-1/2 text-white text-5xl p-2 rounded-full focus:outline-none z-10">
                &#10094;
              </button>

              <!-- Only the slider image container clips overflow -->
              <div class="overflow-hidden w-full max-w-full rounded-md">
              <div class="slider">
                @if (have_rows('lightbox_gallery'))
                  @php $first = true; @endphp
                  @while (have_rows('lightbox_gallery')) @php the_row(); @endphp
                    <img src="{{ get_sub_field('lightbox_img') }}" class="slide {{ $first ? 'block' : 'hidden' }} max-h-[80vh] max-w-full h-auto w-auto mx-auto" />
                    @php $first = false; @endphp
                  @endwhile
                @endif
              </div>
              </div>

              <!-- Right Chevron OUTSIDE the image area -->
              <button id="nextSlide"
                class="absolute -right-12 top-1/2 -translate-y-1/2 text-white text-5xl p-2 rounded-full focus:outline-none z-10">
                &#10095;
              </button>

              <a class="text-white mt-2 underline" target="_blank" href="{{ get_field('pdf_url') }}">{{ get_field('pdf_text') }}</a>

            </div>
          </div>
        </div>


        </div>
        <!--block three-->
        <div class="group order-2 flex grow-1 h-full flex-col rounded-lg bg-tertiary px-6 py-8 text-gray-800 md:order-3">
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