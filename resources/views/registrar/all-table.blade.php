<tr>
  <td>
    @if(get_field('select_status'))
      {{ the_field('select_status') }}
    @else
      <i>!! Assign Status !!</i>
    @endif
  </td>
  <td>
    <a style="display: block;" href="{{ the_permalink() }}"><b>{{ the_title() }}</b></a>
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