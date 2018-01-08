@extends('layouts.app')
@php
  global $wp_query;
  $count = $wp_query->found_posts;
@endphp

@section('content')
<section class="section">
  <div class="__header">
    <h1 class="__title mb--3@xs">Search Results</h1>
  </div>
  <div class="row">
    <div class="col --12@xs --8@md">
      <form action="{{ home_url() }}" method="GET" class="mb--2@xs">
        <div class="__group __search +line mb--0@xs">
          <input name="s" type="text" class="__control" placeholder="Search by keyword" value="{{ get_search_query() }}" autocomplete="off">
          <button type="submit" class="btn btn--primary">Go</button>
        </div>
        <small class="fs--xs text--gray-500"><i>Returning {{ $count }} result{{ ($count == 1) ? '' : 's' }}</i></small>
      </form>

      @if (!have_posts())
        <div class="alert --red mb--2@xs">
          <div class="__body">
            Sorry, no results were found for your search.
          </div>
        </div>
      @endif

      <div class="list-group +indent">
        @while (have_posts())
          @php(the_post())
          @include('components.list-item')
        @endwhile @php(wp_reset_postdata())
      </div>

      <div class="py--2@xs">
        <?= \Kernl\Pagination::display(); ?>
      </div>
    </div>
  </div>
</section>
@endsection
