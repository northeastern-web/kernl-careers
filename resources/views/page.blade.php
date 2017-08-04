@extends('layouts.app')

@section('content')
<article {{ post_class('l --page') }}>
  @while(have_posts()) @php(the_post())
    @include('layouts.header-singular')

    @if (\Kernl\Navigation::display() && !get_field('bool_horizontal_nav'))
      <div class="g-contain">
        <div class="g-row">
          <div class="g-12@xs g-3@lg">
            @include('partials.nav-page')
          </div>
          <div class=" g-12@xs g-9@lg">
            @include('layouts.sections')
          </div>
        </div>
      </div>
    @else
      @include('layouts.sections')
    @endif
  @endwhile
</article>
@endsection
