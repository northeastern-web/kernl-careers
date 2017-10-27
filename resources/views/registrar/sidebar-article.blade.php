@include('registrar.status')

@while((have_rows('lay_section')))
  @php(the_row())
  @if(get_row_layout() == 'lay_basic')
    @include('registrar.contact')
  @endif
@endwhile

@include('registrar.related')
