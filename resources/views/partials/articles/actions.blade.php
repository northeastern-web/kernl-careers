@if(have_rows('lay_actions'))
  <aside class="alert --action f--r@sm ml--1@sm col --12@xs --4@sm px--0@xs mt--1@xs">
    <div class="__header ta--c">Important Actions</div>
    <div class="__body">
      <ul class=" fs--sm">
        @while(have_rows('lay_actions'))
          @php(the_row())
          <li>
            {!! (get_sub_field('rel_action') ? get_sub_field('rel_action')->name .'<br>' : '') !!}
            <a class="fw--700" href="{!! (get_sub_field('opt_type') == 'File' ? get_sub_field('med_file')['url'] : get_sub_field('txt_url')) !!}">
              {{ get_sub_field('txt_title') }}
            </a>
          </li>
        @endwhile
      </ul>
    </div>
  </aside>
@endif
