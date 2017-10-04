@extends('layouts.app')

@section('content')
  <article {{ post_class('--single --article') }}>
    @while(have_posts()) @php(the_post())
      @include('partials.articles.header')

      <section class="section">
        <div class="row">
          <div class="col --12@xs --9@md pr--3@md">
            @while((have_rows('lay_section')))
              @php(the_row())

              @if(get_row_layout() == 'lay_basic')
                @include('partials.articles.actions')
                {{ the_sub_field('txt_copy') }}

              @else
                @include('partials.articles.toggle')

              @endif
            @endwhile
          </div>

          <div class="col --12@xs --3@md">
            @while((have_rows('lay_section')))
              @php(the_row())
              @if(get_row_layout() == 'lay_basic')
                @include('partials.articles.contact')
              @endif
            @endwhile

            @include('partials.articles.related')
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
