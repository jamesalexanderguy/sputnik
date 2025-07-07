
<div class="w-full">

  @php $rows = get_field('rows'); @endphp

  @if($rows)
    @foreach($rows as $row)
      <section class="flex flex-row w-full">
        @foreach($row['columns'] as $column)
          @php
            $photo = $column['photo'] ?? null;
            $details = $column['details'] ?? null;
            $movetop = $column['move_top'] ?? bottom;
            $marginTop = $column['margin_top'] ?? $row['margin_top'] ?? 0;
            $width = $column['width'] ?? 100;
            $pt = $column['padding_top'] ?? 0;
            $pr = $column['padding_right'] ?? 0;
            $pb = $column['padding_bottom'] ?? 0;
            $pl = $column['padding_left'] ?? 0;
            $colstyle = "width: {$width}%; margin-top: -{$marginTop}%;";
            $style = "padding-top: {$pt}%; padding-right: {$pr}%; padding-bottom: {$pb}%; padding-left: {$pl}%;";
            
          @endphp

          <div class="flex flex-col justify-center" style="{{ $colstyle }} ">
            <div style="{{ $style }}">
              <div class="relative">
                @if($details)
                <div class="absolute @if($movetop) top-0 @else bottom-0 @endif left-0 p-[20px] w-full text-[#7f7f7f]">
                  {!! $details !!}
                </div>
                @endif

                @if($photo)
                  <img 
                    src="{{ $photo['url'] }}" 
                    alt="{{ $photo['alt'] ?? '' }}" 
                    class="w-full h-auto"
                  >
                @endif

              </div>
            </div>
          </div>
        @endforeach
      </section>
    @endforeach
  @endif

</div>

@if ($pagination)
  <nav class="page-nav" aria-label="Page">
    {!! $pagination !!}
  </nav>
@endif
