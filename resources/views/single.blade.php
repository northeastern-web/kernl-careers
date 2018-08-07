@extends('chrome.app')

@section('content')
  <article class="article --single">
    @while(have_posts()) @php(the_post())
      @include('templates._banner', ['class' => 'ta--c'])

      <section class="section pb--2@xs">
        @include('templates.single.video')

        <div class="row">
          <div class="col w--2/3@t ow--1/6@t">
            @include('templates.single.external')
            @include('templates._section')

            <div class="ta--c">
              @include('templates.single._sharing')
            </div>
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
