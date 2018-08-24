@extends('chrome.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('templates._banner')
  </div>

  <section class="section">
    @include('templates.archive._nav')

    <div class="row">
      @php($i = 0)
      @while (have_posts())
        @php(the_post())
        @if ($i == 0 && get_query_var('paged') < 2)
          <div class="col">
            @include('templates.single.card', ['class' => '--h@t fs--root', 'hide_badge' => true])
          </div>
        @else
          <div class="col w--1/3@d">
            @include('templates.single.card')
          </div>
        @endif
        @php($i++)
      @endwhile
    </div>

    <div class="py--2">
      <?= \Kernl\Pagination::display(); ?>
    </div>
  </section>
@endsection
