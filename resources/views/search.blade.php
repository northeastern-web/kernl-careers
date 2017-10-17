@extends('layouts.app')

@section('content')
  @if (!have_posts())
    <section class="section --contain">
      @if (!have_posts())
        <div class="alert alert-warning">
          {{  __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif
    </section>
  @endif

  {!! get_the_posts_navigation() !!}
@endsection
