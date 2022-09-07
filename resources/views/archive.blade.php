@extends('chrome.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('templates._banner')
  </div>

  <section class="section col--stretch">
    @include('templates.archive._nav')

    <div class="row">
      @while (have_posts())
        @php(the_post())
        <div class="col w--1/3@d">
          @include('templates.single.card')
        </div>
      @endwhile
    </div>

    <div class="py--2">
      {!! \Kernl\Lib\Pagination::display() !!}
    </div>
  </section>
@endsection
