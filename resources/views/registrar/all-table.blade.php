<tr>
  <td class="edit-status {{ \App\Site::articleStatus()[1] }}">
    {{ \App\Site::articleStatus()[0] }}
  </td>
  <td class="pr--2@xs">
    <a href="{{ the_permalink() }}"><b>{{ the_title() }}</b></a><br>
    <span class="__excerpt">{{ (get_the_excerpt() ? get_the_excerpt() : '!!-- Still needs excerpt --!!') }}</span>
    {{ edit_post_link( __('<i data-feather="edit"></i>','textdomain'),'','') }}
  </td>
  <td>
    @php($owners = get_field('rel_owner'))
    @if($owners)
      @foreach ($owners as $owner)
        @php($user[] = $owner['display_name'])
      @endforeach
      {{ implode(', ', $user) }}
    @else
      <i>!! Assign Owner !!</i>
    @endif          
  </td>
</tr>