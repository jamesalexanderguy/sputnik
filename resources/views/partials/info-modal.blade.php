<div id="info-modal" class="hidden fixed inset-0 z-40 bg-white/95 flex items-center justify-center pointer-events-none">
  <div class="bio px-6 pb-12 pointer-events-auto fixed bottom-0 w-[450px] max-w-full left-0">
    <div class="modal-content text-xs">
      @php $bio = get_field('bio'); @endphp

      @if($bio)
        {!! $bio !!}
      @endif
    </div>
  </div>
</div>
