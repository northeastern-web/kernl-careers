@extends('layouts.app')

@section('content')
<article {{ post_class() }}>
  @while(have_posts()) @php(the_post())
    @include('layouts.header-singular')

    @if (\Kernl\Navigation::display() && !get_field('bool_horizontal_nav'))
      <div class="row">
        <div class="col --12@xs --3@lg">
          @include('partials.nav-page')
        </div>
        <div class="col --12@xs --9@lg">
          @include('layouts.sections')
        </div>
      </div>
    @else
      @include('layouts.sections')
    @endif
  @endwhile
</article>
@endsection
