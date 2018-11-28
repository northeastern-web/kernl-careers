@if(get_field('lay_actions'))
BLAH
  <aside class="card --action bs--none">
    <div class="__header px--1 py--0h bb--1 tt--caps bwa--0 bwb--1 bc--gray-300 fs--xs">
      <div class="__column">Important Actions</div>
    </div>
    <div class="__body mt--2">
      <ul class="fs--sm mb--0">
        @foreach (get_field('lay_actions') as $action)
          title
        @endforeach
      </ul>
    </div>
  </aside>
@endif
