@extends('chrome.app')

@section('content')
  @include('templates._banner')

  <div id="tribe-events-pg-template" class="section tribe">
    @if(tribe_is_month())
      <div class="tribe-month-title">{{ tribe_get_current_month_text() }}</div>
      @php(tribe_get_view())

    @else
      @include('templates.event.'. basename(tribe_get_current_template(), '.php'))
    @endif
  </div>
@endsection
