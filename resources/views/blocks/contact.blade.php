{{--
  Title: Contact Form
  Description: Insert a contact form with heading and intro
  Category: formatting
  Icon: admin-comments
  Keywords: Contact Form Area
  Mode: preview
  Align: center
  SupportsAlign: center
  SupportsAnchor: true
--}}

<div id="{{ $block['anchor'] }}" data="{{ $block['id'] }}" class="overflow-hidden relative pb-16 pt-4 {{ $block['classes'] }}">

    <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6 text-gray-800">
      <div class="relative">

        <div class="mt-6 m-auto space-y-6 md:w-8/12 lg:w-7/12">
          <h2 class="text-left text-3xl text-[#6d6e71] md:text-4xl"><span class="text-primary">{{ get_field('contactHead_coloured') }}</span>{{ get_field('contactHead') }}</h2>
          <div class="wysiwyg text-left text-xl">{{ get_field('contactIntro') }}
          </div>
          <div class="flex items-left justify-left -space-x-2">
            
            @php echo do_shortcode('[contact-form-7 id="7110611" title="Contact form 1"]') @endphp
          </div>
          <div class="inline-block flex-wrap justify-left mt-0">
            <span class="relative flex h-12 w-full items-left justify-left px-8 before:absolute before:inset-0 before:rounded-md before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
                <input type="submit" class="wpcf7-form-control wpcf7-submit has-spinner relative text-base text-white" value="Contact">
</span>
              
          </div>
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