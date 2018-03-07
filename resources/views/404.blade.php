@extends('chrome.app')

@section('content')
  @if (!have_posts())
    <section class="section ta--c py--3@xs pt--5@lg pb--7@lg" style="border-top: 1px solid #eee;">
      <div class="row">
        <div class="col --12@xs --10@sm --1-offset@sm --8@lg --2-offset@lg --6@xl --3-offset@xl">
          <h1 class="fw--300 tc--gray">Page Not Found</h1>
          @if(get_field('txt_404', 'option'))
            {!! get_field('txt_404', 'option') !!}

          @else
            <p>Sorry, but we couldn't find the page you're looking for.<br>
            Please try browsing the site, or search below.</p>
          @endif

          <form action="{{ home_url() }}" method="GET">
              <label for="search" class="sr--only">Search</label>
              <div class="__group __search">
                <input name="s" type="search" id="search" class="__control" placeholder="Search by keyword">
                <button type="submit" class="btn btn--primary">Go</button>
              </div>
          </form>
        </div>
      </div>
    </section>
  @endif
@endsection
