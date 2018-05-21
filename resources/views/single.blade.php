@extends('chrome.app')

@section('content')
  <article class="article --single">
    @while(have_posts()) @php(the_post())
      @include('templates.banner', ['class' => 'ta--c'])

      <section class="section pb--2@xs">
        @include('templates.single.video')

        <div class="row">
          <div class="col --1@md --1-offset@lg ta--c">
            @include('templates.single._sharing')
          </div>
          <div class="col --10@md --8@lg">
            @include('templates.section')

            @include('templates.single.external')
          </div>
        </div>
      </section>

      @include('templates.single._edit')
    @endwhile
  </article>
@endsection
