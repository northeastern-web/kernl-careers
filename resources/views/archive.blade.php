@extends('layouts.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('layouts.header-archive')
  </div>

  <section class="section">
    <div class="g-row">
      @php($i = 0)
      @while (have_posts())
        @php(the_post())
        @if ($i == 0)
          <div class="g-col --12@xs --9@lg">
            @include('components.card')
          </div>
        @else
          <div class="g-col --12@xs --3@lg">
            @include('components.card')
          </div>
        @endif
        @php($i++)
      @endwhile
    </div>
  </section>
@endsection
