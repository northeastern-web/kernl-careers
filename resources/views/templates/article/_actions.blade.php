@if(have_rows('lay_actions_group'))
  <aside>
    @while(have_rows('lay_actions_group'))
      @php(the_row())
      <div class="card --action bs--none bw--0 bwr--1 bs--solid bc--gray-300 mb--0">
        <div class="__header px--0 py--1 fs--sm tt--caps">
          <div class="__column">{{ get_sub_field('txt_group_title') }}</div>
        </div>
        <div class="__body mt--0h px--0 pb--1">
          <ul class="fs--sm mb--0 ls--none">
            @while(have_rows('lay_actions'))
              @php(the_row())
              <li>
                <a class="py--1 tc--gray-700" {!! (get_sub_field('opt_type') == 'File' ? 
                  'href="' . get_sub_field('med_file')['url'] . '"' : 
                  'href="' . get_sub_field('txt_url') . '" target="_blank" rel="noopener"') !!}>

                  {!! (get_sub_field('opt_type') == 'File' ? 
                  '<i class="--sm" data-feather="file-text"></i>' : 
                  '<i class="--sm" data-feather="external-link"></i>') !!}

                  {{ get_sub_field('txt_title') }}
                </a>
              </li>
            @endwhile
          </ul>
        </div>
      </div>
    @endwhile
  </aside>
@endif
