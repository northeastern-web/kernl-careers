@extends('chrome.app')

@section('content')
  @if (!have_posts())
    @include('templates.banner', ['class' => 'ta--c'])

    <section class="section ta--c pt--0@xs pb--5@xs">
      <div class="row">
        <div class="col --12@xs --10@sm --1-offset@sm --8@lg --2-offset@lg --6@xl --3-offset@xl">
          @if(get_field('txt_404', 'option'))
            {!! get_field('txt_404', 'option') !!}

          @else
            <p class="fs--d1">Sorry, but we couldn't find the page you're looking for.<br>
            Please try browsing the site, or search below.</p>
          @endif

          <form action="{{ home_url() }}" method="GET">
            <label for="search" class="sr--only">Search</label>
            <div class="__group __search mb--2@xs">
              <input name="s" type="search" id="search" class="__control" placeholder="Search by keyword">
              <button type="submit" class="btn btn--primary">Go</button>
            </div>
          </form>
        </div>
      </div>
    </section>
  @endif
@endsection
