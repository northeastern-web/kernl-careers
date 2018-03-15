@extends('chrome.app')

@section('content')
  @include('templates.banner')

  <div id="tribe-events-pg-template" class="section tribe-events-style-skeleton">
    @if(tribe_is_month())
      @php(tribe_get_view())
    @else
      @include('templates.event.'. basename(tribe_get_current_template(), '.php'))
    @endif
  </div>
@endsection
