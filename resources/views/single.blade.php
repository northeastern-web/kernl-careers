@extends('chrome.app')

@section('content')
  <article class="article --single">
    @while(have_posts()) @php(the_post())
      @include('templates.banner')

      <section class="section">
        @include('templates.single.video')

        <div class="row">
          <div class="col --12@xs --1@md --1-offset@lg ta--c">
            @include('templates.single._sharing')
          </div>
          <div class="col --12@xs --10@md --8@lg">
            @include('templates.section')
            @include('templates.single.external')
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
