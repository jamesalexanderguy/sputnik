{{--
  Title: Gutenmorgan
  Description: Test gutenberg block
  Category: formatting
  Icon: admin-comments
  Keywords: testimonial quote
  Mode: preview
  Align: left

  SupportsMultiple: true
  EnqueueStyle: styles/style.scss
  EnqueueScript: scripts/script.js
  EnqueueAssets: path/to/asset
--}}

<blockquote id="elephant" data-{{ $block['id'] }} class="{{ $block['classes'] }}">
    <p>{{ get_field('testimonial') }}</p>
    <cite class="bg-primary">
      <span>{{ get_field('author') }}</span>
    </cite>
</blockquote>

<style type="text/css">
  [data-{{$block['id']}}] {
    background: {{ get_field('background_color') }};
    color: {{ get_field('text_color') }};
  }
</style>