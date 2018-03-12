@extends('chrome.app')

@section('content')
  <article class="article --page">
      @include('templates.banner')

      @if (\Kernl\Navigation::display() && !get_field('bool_header_nav'))
        <div class="section">
          <div class="row">
            <div class="col --12@xs --3@lg">
              @include('templates.page.nav')
            </div>
            <div class="col --12@xs --9@lg">
              @include('templates.section')
            </div>
          </div>
        </div>

      @else
        @include('templates.section')
      @endif

      @include('templates.single._edit')
  </article>
@endsection
