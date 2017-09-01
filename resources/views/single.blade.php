@extends('layouts.app')

@section('content')
  <article {{ post_class('--single') }}>
    @while(have_posts()) @php(the_post())
      @include('layouts.header-singular')
      <section class="section">
        @include('partials.posts-video')
        <div class="g-row">
          <div class="g-col --12@xs --8@lg --offset-2@lg">
            @include('layouts.sections')
            @include('partials.posts-external')
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
