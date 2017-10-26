@extends('layouts.app')

@section('content')
<section class="section">
  <div class="__header">
    <h1 class="__title mb--1@xs">Search Results</h1>
  </div>
  <div class="row">
    <div class="col --8@sm --12@xs">
      <form action="{{ home_url() }}" method="GET" class="mb--2@xs">
        <div class="__group __search +line">
          <input name="s" type="text" class="__control" placeholder="Search by keyword" value="{{ get_search_query() }}">
          <button type="submit" class="btn btn--primary">Go</button>
        </div>
        <small class="fs--xs text--gray-500"><b>Returning:</b> XYZ results</small>
      </form>

      @if (!have_posts())
        <div class="alert --red --outline">
          <div class="__body">
            Sorry, no results were found for your search.
          </div>
        </div>
      @endif

      <div class="list-group +indent">
        @while (have_posts())
          @php(the_post())
          @include('registrar.list-item')
        @endwhile @php(wp_reset_postdata())
      </div>
    </div>
</section>

@endsection
