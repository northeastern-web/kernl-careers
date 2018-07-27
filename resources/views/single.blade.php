@extends('chrome.app')

@section('content')
  <article class="article --single">
    @while(have_posts()) @php(the_post())
      @include('templates.banner', ['class' => 'ta--c'])

      <section class="section pb--2@xs">
        @include('templates.single.video')

        <div class="row">
          <div class="col w--2/3@t ow--1/6@t">
            @include('templates.single.external')
            @include('templates.section')

            <div class="ta--c">
              @include('templates.single._sharing')
            </div>
          </div>
        </div>
      </section>

      @include('templates.edit')
    @endwhile
  </article>
@endsection
