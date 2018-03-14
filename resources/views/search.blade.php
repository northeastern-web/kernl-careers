@extends('chrome.app')
@php
  global $wp_query;
  $count = $wp_query->found_posts;
@endphp

@section('content')
<div {{ post_class('--search') }}>
  @include('templates.banner')
</div>
<section class="section">
  <div class="row">
    <div class="col --12@xs --8@md --2-offset@md">
      <form action="{{ home_url() }}" method="GET" class="mb--2@xs">
        <div class="__group __search +line mb--0@xs">
          <input name="s" type="text" class="__control" placeholder="Search by keyword" value="{{ get_search_query() }}" autocomplete="off">
          <button type="submit" class="btn btn--primary">Go</button>
        </div>
        <small class="fs--xs tc--gray-500"><i>Returning {{ $count }} result{{ ($count == 1) ? '' : 's' }}</i></small>
      </form>

      @if (!have_posts())
        <div class="alert bg--yellow ta--c mb--2@xs">
          <div class="__body">
            Sorry, no results were found for your search.
          </div>
        </div>

        <h3 class="fs--d1 fw--700">Now what?</h3>
        <ul>
          <li>Searching using only keywords
            <ul class="ls--none">
              <li><small><i>e.g.</i>, Instead of "How do I calculate my GPA?", try "calculate GPA"</small></li>
            </ul>
          </li>
          <li>Is your spelling correct?
            <ul class="ls--none">
              <li><small><i>e.g.</i>, "email", not "emial"</small></li>
            </ul>
          </li>
          <li>Try using the navigation (at top)</li>
        </ul>
      @endif

      <div class="list-group +indent">
        @while (have_posts())
          @php(the_post())
          @include('templates.single._list')
        @endwhile @php(wp_reset_postdata())
      </div>

      <div class="py--2@xs">
        <?= \Kernl\Pagination::display(); ?>
      </div>
    </div>
  </div>
</section>
@endsection
