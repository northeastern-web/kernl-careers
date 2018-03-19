@extends('chrome.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('templates.banner', ['class' => '--md'])
  </div>

  <section class="section pt--0@xs">
    @include('templates.archive._nav')

    <div class="row">
      @php($i = 0)
      @while (have_posts())
        @php(the_post())
        @if ($i == 0)
          <div class="col --12@xs --8@lg">
            @include('templates.single._card', ['class' => '--overlay --bottom fs--d1'])
          </div>
        @else
          <div class="col --12@xs --4@lg">
            @include('templates.single._card')
          </div>
        @endif
        @php($i++)
      @endwhile
    </div>

    <div class="py-3@xs">
      <?= \Kernl\Pagination::display(); ?>
    </div>
  </section>
@endsection
