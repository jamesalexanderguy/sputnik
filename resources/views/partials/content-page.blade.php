<div 
  x-data 
  x-init="$nextTick(() => {
    const hash = window.location.hash;
    if (hash && hash.includes('page')) {
      $el.scrollIntoView({ behavior: 'smooth' });
    }
  })"
  class="prose max-w-none prose-blue prose-lg"
>
  @php(the_content())
</div>

@if ($pagination)
  <footer class="mt-12">
    <nav 
      class="page-nav flex flex-wrap justify-center gap-2 text-blue-600 font-medium"
      aria-label="Page"
    >
      {!! str_replace(
        ['class="page-numbers current"', 'class="page-numbers"'],
        ['class="page-numbers current px-3 py-1 rounded bg-blue-600 text-white font-semibold"', 'class="page-numbers px-3 py-1 rounded hover:bg-blue-100 transition"'],
        $pagination
      ) !!}
    </nav>
  </footer>
@endif
