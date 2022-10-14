@extends('chrome.app')

@section('content')
  @if(is_home())
    <h1 class="sr--only"><?= get_bloginfo('name', 'display'); ?> Homepage</h1>
  @endif
  @include('templates._section')
@endsection
