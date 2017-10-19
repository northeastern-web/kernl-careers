@extends('layouts.app')

@section('content')
  @if(get_post_type() == 'post')
    @include('layouts.posts.single')
  @else
    @include('registrar.single-article')
  @endif
@endsection
