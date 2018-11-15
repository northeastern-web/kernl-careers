@while((have_rows('lay_section')))
  @php(the_row())
  @if(get_row_layout() == 'lay_basic')
    @include('templates.article.contact')
  @endif
@endwhile

@include('templates.article.related')
