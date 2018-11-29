@if(have_rows('lay_actions_group'))
  @while(have_rows('lay_actions_group'))
    @php(the_row())
    <aside class="card --action">
      <div class="__header px--1 py--1 bb--1 tt--caps bwa--0 bwb--1 bc--gray-300 fs--xs">
        <div class="__column">{{ get_sub_field('txt_group_title') }}</div>
      </div>
      <div class="__body mt--2h pa--1">
        <ul class="fs--sm mb--0 ls--none">
          @while(have_rows('lay_actions'))
            @php(the_row())
            <li>
              <a class="fw--700" {!! (get_sub_field('opt_type') == 'File' ? 
                'href="' . get_sub_field('med_file')['url'] . '"' : 
                'href="' . get_sub_field('txt_url') . '" target="_blank" rel="noopener"') !!}>
                {{ get_sub_field('txt_title') }}
              </a>
            </li>
          @endwhile
        </ul>
      </div>
    </aside>
  @endwhile
@endif
