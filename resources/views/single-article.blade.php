@extends('chrome.app')

@section('content')
  <article class="article --single --kb-article">
    @while(have_posts()) @php(the_post())
      @include('templates.article.banner')

      <section class="section">
        <div class="row">
          @if(have_rows('lay_actions_group'))
            <div class="col w--30@t w--20@w">
              @include('templates.article._actions')
            </div>
          @endif
          <div class="col w--70@t w--60@w">
            @include('templates._section')
            <section class="section">
              @include('templates.article._related')
            </section>
          </div>
        </div>
      </section>
    </article>
  @endwhile
@endsection
