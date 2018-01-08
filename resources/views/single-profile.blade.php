@extends('layouts.app')

@section('content')
  @php($layout = new Kernl\Layout(get_the_ID()))
  {!! $layout->displayHeader(['title' => 'Profiles', 'pretitle' =>'The Pre', 'subtitle' =>'testing subtitle', 'bgimg' => 'http://sail.northeastern.dev/app/uploads/2017/12/16x9-hero5.jpg']) !!}

@endsection
