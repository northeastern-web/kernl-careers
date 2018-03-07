@extends('chrome.app')

@section('content')
  @if (!have_posts())
    <section class="section">
      @if(get_field('txt_404', 'option'))
        {!! get_field('txt_404', 'option') !!}

      @else
        <h1>Page Not Found</h1>
        <p class="fs--lead">Sorry, we couldn't find the page you're looking for.</p>
        <p>Please try browsing the site, or get in touch with us.</p>
      @endif
    </section>
  @endif
@endsection
