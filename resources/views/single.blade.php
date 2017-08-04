@extends('layouts.app')

@section('content')
  <article {{ post_class('l --single') }}>
    @while(have_posts()) @php(the_post())
      @include('layouts.header-singular')
      <section class="l__body">
        <div class="l__contain">
          @include('partials.posts-video')
          <div class="l__row">
            <div class="l__col --12@xs --8@lg --offset-2@lg">
              @include('layouts.sections')
              @include('partials.posts-external')
            </div>
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
