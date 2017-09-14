@extends('layouts.app')

@section('content')
  <article {{ post_class('--single --article') }}>
    @while(have_posts()) @php(the_post())
      @include('layouts.header-singular')

      <section class="section">
        <div class="row">
          <div class="col --12@xs">
            @while((have_rows('lay_section')))
              @php(the_row())

              @if(get_row_layout() == 'lay_basic')
                <p><i>Basic Section</i></p>
                {{ the_sub_field('txt_copy') }}

              @else
                <p><i>Tabbed Section</i></p>
                <h4>{{ the_sub_field('txt_title') }}</h4>
                {{ the_sub_field('txt_copy') }}

              @endif
            @endwhile
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
