@extends('chrome.app')

@section('content')
  <article class="article --single --kb-article">
    @while(have_posts()) @php(the_post())
      @include('templates.article.banner', ['class' => 'bg--black'])

      <section class="section bg--gray-50 pt--0@d pr--0@d">
        <div class="row">
          @if(have_rows('lay_actions_group'))
            <div class="col w--25@d w--20@w pb--1 pt--2h@d">
                @include('templates.article._actions')
            </div>
          @endif
          <div class="col w--75@d w--80@w __content bg--white pa--1 pa--2@d">
            <div class="measure--wide">
              @include('templates._section')
            </div>
            <section class="section">
              <div class="measure--wide">
                  @include('templates.article._related')
              </div>
            </section>
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
