@extends('chrome.app')

@section('content')
  <article class="article --single --kb-article">
    @while(have_posts()) @php(the_post())
      @include('templates.article.banner', ['class' => 'bg--black'])

      <section class="section bg--gray-50 pt--0@t pr--0@t">
        <div class="row">
          @if(have_rows('lay_actions_group'))
            <div class="col w--25@t w--20@w pt--1 pt--2h@t">
                @include('templates.article._actions')
            </div>
          @endif
          <div class="col w--75@t w--80@w bg--white pa--1 pa--2@t">
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
    </article>
  @endwhile
@endsection
