@extends('chrome.app')

@section('content')
  <article class="article --single">
    @while(have_posts()) @php(the_post())
      @include('templates._banner', ['class' => '--measure-wide --center'])

      <section class="section">
        @include('templates.single._video')

        <div class="row">
          <div class="col w--2/3@t ow--1/6@t">
            @include('templates.single._external')
            @include('templates._section')
          </div>
        </div>

        @if(! post_password_required())
          @include('templates.single._sharing')
        @endif
      </section>
    @endwhile
  </article>
@endsection
