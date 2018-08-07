@extends('chrome.app')

@section('content')
  @php($class = (is_singular('tribe_events') ? ['class' => '--md'] : ['class' => '--md']))
  @include('templates._banner', $class)

  <div id="tribe-events-pg-template" class="section tribe">
    @if(tribe_is_month())
      @php(tribe_get_view())
    @else
      @include('templates.event.'. basename(tribe_get_current_template(), '.php'))
    @endif
  </div>
@endsection
