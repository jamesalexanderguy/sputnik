<article 
  @php(post_class('mx-auto pb-12')) 
  x-data 
  x-init="$el.scrollIntoView({ behavior: 'smooth' })"
>


  <div class="prose prose-lg max-w-none e-content text-gray-800">
    @php(the_content())
  </div>


  @if ($pagination)
    <footer class="mt-12">
      <nav 
        class="page-nav flex justify-center space-x-4 text-blue-600 font-medium"
        aria-label="Page"
        x-data
      >
        {!! $pagination !!}
      </nav>
    </footer>
  @endif
  @if (get_post_type() != 'course')
  @include('partials.prev-next')
  @endif

</article>

</div>
<div class="prose">
  {!! apply_filters('the_content', get_post(2935)->post_content) !!}
  {!! apply_filters('the_content', get_post(2897)->post_content) !!}

