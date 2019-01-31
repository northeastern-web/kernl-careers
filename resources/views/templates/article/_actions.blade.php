@if(have_rows('lay_actions_group'))
  <aside>
    @while(have_rows('lay_actions_group'))
      @php(the_row())
      <div class="--action mb--0 pr--1">
        <div class="__header pa--0 fs--sm tt--caps tc--black">
          {{ get_sub_field('txt_group_title') }}
        </div>
        <div class="__body mt--0h px--0 pb--1">
          <ul class="__list fs--xs mb--0 ls--none">
            @while(have_rows('lay_actions'))
              @php(the_row())
              <li class="__item">
                <a class="__link tc--gray-800" {!! (get_sub_field('opt_type') == 'File' ? 
                  'href="' . get_sub_field('med_file')['url'] . '"' : 
                  'href="' . get_sub_field('txt_url') . '" target="_blank" rel="noopener"') !!}>

                  {!! (get_sub_field('opt_type') == 'File' ? 
                  '<i class="--sm --thin" data-feather="file-text"></i>' : 
                  '<i class="--sm --thin" data-feather="external-link"></i>') !!}

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
