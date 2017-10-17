@extends('layouts.app')

@section('content')
<article {{ post_class() }}>
  @while(have_posts()) @php(the_post())
    @include('layouts.chrome.header-singular')

    @if (\Kernl\Navigation::display() && !get_field('bool_horizontal_nav'))
      <div class="row">
        <div class="col --12@xs --3@lg">
          @include('components.nav-page')
        </div>
        <div class="col --12@xs --9@lg">
          @include('layouts.sections.section')
        </div>
      </div>
    @else
      @include('layouts.sections.section')
    @endif
  @endwhile
</article>
@endsection
