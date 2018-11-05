@extends('chrome.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('templates._banner')
  </div>

  <section class="section col--stretch">
    <div class="list-group --indent w--100">
      @php($i = 0)
      @while (have_posts())
        @php(the_post())
          @include('templates.article.list-item')
        @php($i++)
      @endwhile
    </div>
    <div class="py--2">
      <?= \Kernl\Pagination::display(); ?>
    </div>
  </section>
@endsection
