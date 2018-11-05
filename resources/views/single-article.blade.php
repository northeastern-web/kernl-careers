@extends('chrome.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <article class="post --single --article">
      @include('templates.article.banner')

      <section class="section">
        <div class="row">
          <div class="col w--3/4@d pb--2 pr--3@d">
            @while((have_rows('lay_section')))
              @php(the_row())

              @if(get_row_layout() == 'lay_basic')
                @include('templates.article.alert')
                @if(have_rows('lay_actions'))
                  <div class="f--r@t ml--1@t col w--1/3@t px--0">
                    @include('templates.article.actions')
                  </div>
                @endif
                {{ the_sub_field('txt_copy') }}

              @else
                @if(isset($_GET['tab']))
                  @include('templates.article.tabs')
                @else
                  @include('templates.article.accordion')
                @endif
              @endif
            @endwhile
          </div>

          <div class="col w--1/4@d" id="waypoint">
            @include('templates.article.sidebar-article')
          </div>
        </div>
      </section>
    </article>
  @endwhile
@endsection
