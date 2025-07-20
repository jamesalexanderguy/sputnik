<div class="w-full bg-white">
  @php $rows = get_field('rows'); @endphp

  @if($rows)
    @foreach($rows as $row)
      @php
        $is_video = $row['is_video'] ?? false;
        $video = $row['video'] ?? null;
      @endphp
      <section class="flex flex-row w-full">
        @if ($is_video && $video)
        @php
        $pt = $row['padding_top'] ?? 0;
          $pr = $row['padding_right'] ?? 0;
          $pb = $row['padding_bottom'] ?? 0;
          $pl = $row['padding_left'] ?? 0;
          $style = "padding-top: {$pt}%; padding-right: {$pr}%; padding-bottom: {$pb}%; padding-left: {$pl}%;";
        @endphp

          <div class="w-full aspect-video" style="{{ $style }}">
          {!! apply_filters('the_content', $video) !!}
          </div>
        @else
          @foreach($row['columns'] as $column)
            @php
              $photo = $column['photo'] ?? null;
              $details = $column['details'] ?? null;
              $movetop = $column['move_top'] ?? 'bottom';
              $marginTop = $column['margin_top'] ?? $row['margin_top'] ?? 0;
              $width = $column['width'] ?? 100;
              $pt = $column['padding_top'] ?? 0;
              $pr = $column['padding_right'] ?? 0;
              $pb = $column['padding_bottom'] ?? 0;
              $pl = $column['padding_left'] ?? 0;
              $colstyle = "width: {$width}%; margin-top: -{$marginTop}%;";
              $style = "padding-top: {$pt}%; padding-right: {$pr}%; padding-bottom: {$pb}%; padding-left: {$pl}%;";
            @endphp

            <div class="flex flex-col justify-center" style="{{ $colstyle }}">
              <div style="{{ $style }}">
                <div class="relative">
                  @if($details)
                    <div class="absolute @if($movetop) top-0 @else bottom-0 @endif left-0 p-[20px] w-full text-[#7f7f7f] [font-size:clamp(0.5rem,1.25vw,0.85rem)]">
                      {!! $details !!}
                    </div>
                  @endif

                  @if($photo)
                    <picture>
                      <source media="(min-width: 1024px)" srcset="{{ $photo['sizes']['xlarge'] ?? $photo['url'] }}">
                      <source media="(min-width: 640px)" srcset="{{ $photo['sizes']['medium_large'] ?? $photo['url'] }}">
                      <img 
                        src="{{ $photo['sizes']['medium'] ?? $photo['url'] }}" 
                        alt="{{ $photo['alt'] ?? '' }}" 
                        class="w-full h-auto"
                      >
                    </picture>
                  @endif

                </div>
              </div>
            </div>
          @endforeach
        @endif
      </section>
    @endforeach
  @endif
</div>

@if ($pagination)
  <nav class="page-nav" aria-label="Page">
    {!! $pagination !!}
  </nav>
@endif
