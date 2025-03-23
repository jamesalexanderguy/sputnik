{{--
  Title: Contact Form
  Description: Insert a contact form with heading and intro
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

<div id="{{ $block['id'] }}" class="overflow-hidden relative pb-16 pt-4 bg-gradient-to-b from-transparent to-secondary {{ $block['classes'] }}">

    <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
      <div class="relative">

        <div class="mt-6 m-auto space-y-6 md:w-8/12 lg:w-7/12">
          <h1 class="text-left text-4xl font-bold text-gray-800 dark:text-white md:text-5xl">{{ get_field('contactHead') }}</h1>
          <p class="text-left text-xl text-gray-600 dark:text-gray-300">
          {{ get_field('contactIntro') }}
          </p>
          <div class="flex items-left justify-left -space-x-2">
            
            @php echo do_shortcode('[contact-form-7 id="7110611" title="Contact form 1"]') @endphp
          </div>
          <div class="flex flex-wrap justify-left mt-0">
            <span class="relative flex h-12 w-full items-left justify-left px-8 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max">
                <input type="submit" class="wpcf7-form-control wpcf7-submit has-spinner relative text-base font-semibold text-white" value="Contact">
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