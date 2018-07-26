@extends('chrome.app')

@section('content')
  <article class="article --single">
    @while(have_posts()) @php(the_post())
      @include('templates.banner', ['class' => 'ta--c'])

      <section class="section pb--2@xs">
        @include('templates.single.video')

        <div class="row">
          <div class="col --10@md --1-offset@md --8@lg --2-offset@lg">
            @include('templates.single.external')
            @include('templates.section')
            @include('templates.single._sharing')
          </div>
        </div>
      </section>

      @include('templates.edit')
    @endwhile
  </article>
@endsection
