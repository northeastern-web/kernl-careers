@extends('chrome.app')

@section('content')
  <article class="article --single">
    @while(have_posts()) @php(the_post())
      @include('templates._banner', ['class' => '--measure-wide --center'])

      <section class="section">
        <div class="row">
          <div class="col w--2/3@t ow--1/6@t">
            @include('templates.single._external')
            {!! the_content() !!}
          </div>
        </div>

        @if(members_has_post_permissions() && !is_user_logged_in())
          @include('templates.single._sharing')
        @endif
      </section>
    @endwhile
  </article>
@endsection
