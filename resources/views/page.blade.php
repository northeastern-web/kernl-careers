@extends('chrome.app')

@section('content')
  <article class="article --page">
      @include('templates.banner')

      @if(\Kernl\Navigation::display())
        @if(\Kernl\Navigation::isBanner() && !\Kernl\Navigation::isBannerSubnav())
          @include('templates.section')

        @else
          <div class="section">
            <div class="row">
              <div class="col w--1/4@t">
                @include('templates.page.nav')
              </div>
              <div class="col w--3/4@t">
                @include('templates.section')
              </div>
            </div>
          </div>
        @endif

      @else
        @include('templates.section')
      @endif

      @include('templates.single._edit')
  </article>
@endsection
