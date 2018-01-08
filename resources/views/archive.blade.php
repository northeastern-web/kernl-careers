@extends('layouts.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('layouts.chrome.header-archive')
  </div>

  <section class="section">
    <div class="row">
      @php($i = 0)
      @while (have_posts())
        @php(the_post())
        @if ($i == 0)
          <div class="col --12@xs --9@lg">
            @include('components.card')
          </div>
        @else
          <div class="col --12@xs --3@lg">
            @include('components.card')
          </div>
        @endif
        @php($i++)
      @endwhile
    </div>
  </section>
@endsection
