@extends('layouts.app')

@section('content')
<header class="section">
  <div class="__header">
    <h1 class="__title">Search Results</h1>
  </div>

  <form action="{{ home_url() }}" method="GET">
    <div class="form__group">
      <input name="s" type="text" class="form__control form__control--lg" placeholder="" value="{{ get_search_query() }}">
    </div>
  </form>
</header>

<section class="section">
  <div class="row">
    <div class="--9@sm">
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
