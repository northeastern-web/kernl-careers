<tr class="edit-status {{ \App\Site::articleStatus()[1] }}">
  <td class="fs--xs">
    {{ \App\Site::articleStatus()[0] }}
  </td>
  <td class="pr--3@xs">
    <a href="{{ the_permalink() }}"><b>{{ the_title() }}</b></a><br>
    <span class="__excerpt">{{ (get_the_excerpt() ? get_the_excerpt() : '!!-- Still needs excerpt --!!') }}</span>
    {{ edit_post_link( __('<i data-feather="edit"></i>','textdomain'),'','') }}
  </td>
  <td class="fs--xs text--gray">
    @php ($owners = get_field('rel_owner'))
    @if ($owners)
      @foreach ($owners as $owner)
        @php($user[] = $owner['display_name'])
      @endforeach
      {{ implode(', ', $user) }}
    @else
      <i>!! Assign Owner !!</i>
    @endif
  </td>
  <td class="ta--c --related">
    @if (get_field('rel_related'))
      <i class="text--green-dark" data-feather="check"></i>
    @else
      <i class="text--red-light" data-feather="x"></i>
    @endif
  </td>
  <td class="ta--c --related">
    @php($i = 0)
    @while((have_rows('lay_section')))
      @php(the_row())
      @if(get_row_layout() == 'lay_basic' && $i == 0)
        @if(get_sub_field('rel_contact'))
          <i class="text--green-dark" data-feather="check"></i>
        @else
          <i class="text--red-light" data-feather="x"></i>
        @endif
      @endif
      @php($i++)
    @endwhile
  </td>
  <td class="ta--c --related">
    @if (has_term('faculty-staff','audience'))
      <i class="text--green-dark" data-feather="check"></i>
    @else
      <i class="text--red-light" data-feather="x"></i>
    @endif
  </td>
  <td class="ta--c --related">
    @if (has_term('form','type'))
      <i class="text--green-dark" data-feather="check"></i>
    @else
      <i class="text--red-light" data-feather="x"></i>
    @endif
  </td>
</tr>
