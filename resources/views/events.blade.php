@extends('chrome.app')

@section('content')
  @include('templates._banner', ['class' => '--measure-wide'])

  <div id="tribe-events-pg-template" class="section tribe col--stretch">
    @if(tribe_is_month())
      @php(tribe_events_before_html())
      <div class="tribe-month-title tribe-events-page-title">{{ tribe_get_current_month_text() }}</div>
      @php(tribe_get_view())
      @php(tribe_events_after_html())
    @else
      @include('templates.event.'. basename(tribe_get_current_template(), '.php'))
    @endif
  </div>
@endsection
