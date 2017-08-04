@extends('layouts.app')

@section('content')
  <div {{ post_class('l --archive') }}>
    @include('layouts.header-archive')
  </div>

  <section class="l__section">
    <div class="l__row">
      @php($i = 0)
      @while (have_posts())
        @php(the_post())
        @if ($i == 0)
          <div class="l__col --12@xs --9@lg">
            @include('components.card')
          </div>
        @else
          <div class="l__col --12@xs --3@lg">
            @include('components.card')
          </div>
        @endif
        @php($i++)
      @endwhile
    </div>
  </section>
@endsection
