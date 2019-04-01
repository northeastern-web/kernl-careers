@extends('chrome.app')
@section('content')
  @php
    global $wp_query;
    $count = $wp_query->found_posts;
  @endphp

  <header class="section --banner --center bg--black">
    <div class="__header">
      <h1 class="__title">Search Results</h1>
    </div>
  </header>

  <section class="section">
    <div class="row">
      <div class="col w--2/3@t ow--1/6@t">
        <form action="{{ home_url() }}" method="GET" class="form mb--1">
          <div class="form__enclosed --search mb--0">
            <input name="s" type="text" class="__control" placeholder="Search by keyword" value="{{ get_search_query() }}" autocomplete="off" {{ ($count ? 'autofocus' : '') }}>
            <button type="submit" class="btn btn--primary">Go</button>
          </div>
          <small class="fs--xs tc--gray-500"><i>Returning {{ $count }} result{{ ($count == 1) ? '' : 's' }}</i></small>
        </form>

        @if (!have_posts())
          <div class="bg--yellow pa--1 my--2 ta--c">
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

        @else
          <div class="list-group --indent --right">
            @while (have_posts())
              @php(the_post())
              @include('templates.search.list-item', [
                'excerpt_class' => 'tc--gray-600 fs--xs pr--1',
                'hide_excerpt' => false
              ])
            @endwhile
          </div>

          <div class="py--2">
            {!! \Kernl\Pagination::display() !!}
          </div>

          @php(wp_reset_postdata())

        @endif
      </div>
    </div>
  </section>
@endsection
