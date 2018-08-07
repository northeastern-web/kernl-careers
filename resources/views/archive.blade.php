@extends('chrome.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('templates._banner', ['class' => ''])
  </div>

  <section class="section">
    @include('templates.archive._nav')

    <div class="row">
      @php($i = 0)
      @while (have_posts())
        @php(the_post())
        @if ($i == 0)
          <div class="col --8@d">
            @include('templates.single.card', ['class' => '--overlay --bottom fs--d1'])
          </div>
        @else
          <div class="col --4@d">
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
