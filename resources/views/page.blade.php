@extends('chrome.app')

@section('content')
  <article class="article --page">
      @include('templates._banner')

      @if(\Kernl\Navigation::display())
        @if(\Kernl\Navigation::isBanner() && !\Kernl\Navigation::isBannerSubnav())
          @include('templates._section')

        @else
          <div class="section">
            <div class="row">
              <div class="col w--1/4@t">
                @include('templates.page._nav')
              </div>
              <div class="col w--3/4@t">
                @include('templates._section')
              </div>
            </div>
          </div>
        @endif

      @else
        @include('templates._section')
      @endif
  </article>
@endsection
