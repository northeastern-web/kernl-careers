@if(have_rows('lay_actions'))
  <aside class="alert --outline f--r@sm col --3@sm">
    @while(have_rows('lay_actions'))
      @php(the_row())
      <h6>Actions</h6>
      @php(var_dump(get_sub_field('rel_action')))
      <ul>
        @if(get_sub_field('rel_action'))
          <li>{{ get_sub_field('rel_action')->post_title }}</li>
        @else
          <li>
            <a href="{{ get_sub_field('txt_url') }}">{{ get_sub_field('txt_title') }}</a><br>
            {{ get_sub_field('txt_description') }}
          </li>
        @endif
      </ul>
    @endwhile
  </aside>
@endif
