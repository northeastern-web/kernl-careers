@if(have_rows('lay_actions'))
  <aside class="card --action bs--none">
    <div class="__header px--1 py--0h bb--1 tt--caps bwa--0 bwb--1 bc--gray-300 fs--xs">
      <div class="__column">Important Actions</div>
    </div>
    <div class="__body mt--2">
      <ul class="fs--sm mb--0">
        @while(have_rows('lay_actions'))
          @php(the_row())
          {!! the_sub_field('txt_title') !!}
        @endwhile
      </ul>
    </div>
  </aside>
@endif
