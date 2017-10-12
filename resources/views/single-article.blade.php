@extends('layouts.app')

@section('content')
  <article {{ post_class('post --single --article bg--canvas') }}>
    @while(have_posts()) @php(the_post())
      @include('partials.articles.header')

      <section class="section">
        <div class="row">
          <div class="col --12@xs --9@md pr--3@md">
            @while((have_rows('lay_section')))
              @php(the_row())

              @if(get_row_layout() == 'lay_basic')
                @include('partials.articles.alert')

                @if(have_rows('lay_actions'))
                  <div class="f--r@sm ml--1@sm col --12@xs --4@sm px--0@xs">
                    @include('partials.articles.actions')
                  </div>
                @endif

                {{ the_sub_field('txt_copy') }}

              @else
                @include('partials.articles.toggle')

              @endif
            @endwhile
          </div>

          <div class="col --12@xs --3@md">
            @while((have_rows('lay_section')))
              @php(the_row())
              @if(get_row_layout() == 'lay_basic')
                @include('partials.articles.contact')
              @endif
            @endwhile

            @include('partials.articles.related')
          </div>
        </div>
      </section>
    @endwhile

    <?php edit_post_link('Edit Page', '', ''); ?>
  </article>
@endsection
