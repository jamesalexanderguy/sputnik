<article 
  @php(post_class('max-w-3xl mx-auto px-4 py-12')) 
  x-data 
  x-init="$el.scrollIntoView({ behavior: 'smooth' })"
>
  <header class="mb-8 border-b border-gray-200 pb-6">
    <h1 class="text-4xl font-bold text-gray-900 leading-tight mb-2" x-data x-intersect="$el.classList.add('animate-fade-in-up')">
      {!! $title !!}
    </h1>
    @php(the_post_thumbnail())
    @include('partials.entry-meta')
  </header>

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

  @include('partials.prev-next')

  <div class="mt-16">
    @php(comments_template())
  </div>
</article>
