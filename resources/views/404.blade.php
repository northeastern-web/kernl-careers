@extends('chrome.app')

@section('content')
  @if (!have_posts())
    @include('templates._banner', ['class' => '--center bg--black', 'pre'])

    <section class="section ta--c pb--5">
      <div class="row">
        <div class="col w--1/2@t ow--1/4@t">
          @if(get_field('txt_404', 'option'))
            {!! get_field('txt_404', 'option') !!}

          @else
            <p class="fs--d1">Sorry, but we couldn't find the page you're looking for.<br>
            Please try browsing the site, or search below.</p>
          @endif


          <form action="{{ home_url() }}" method="GET" class="pt--2">
            <div class="form__enclosed --search">
              <input name="s" type="text" placeholder="Search by keyword" value="{{ get_search_query() }}" autocomplete="off">
              <button type="submit" class="btn btn--primary">Go</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  @endif
@endsection
