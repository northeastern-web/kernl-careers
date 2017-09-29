@extends('layouts.app')

@section('content')
  <article {{ post_class('--single --article') }}>
    @while(have_posts()) @php(the_post())
      @include('layouts.header-singular')

      <section class="section">
        <div class="row">
          <div class="col --12@xs --9@md">
            @while((have_rows('lay_section')))
              @php(the_row())

              @if(get_row_layout() == 'lay_basic')
                @include('partials.articles.actions')
                {{ the_sub_field('txt_copy') }}

              @else
                <div class="nav --tabbed">
                  <ul class="__list" role="tablist">
                    @php($i = 0)
                    @while((have_rows('lay_tab')))
                      @php(the_row())
                      <li class="__item">
                        <a class="__link {{ ($i == 0 ? 'active' : '') }}" data-toggle="tab" href="#tab_{{ $i }}" role="tab" aria-expanded="true">{{ the_sub_field('txt_title') }}</a>
                      </li>
                      @php($i++)
                    @endwhile
                  </ul>
                  <div class="tab-content">
                    @php($i = 0)
                    @while((have_rows('lay_tab')))
                      @php(the_row())
                      <div class="tab-pane {{ ($i == 0 ? 'active' : '') }}" id="tab_{{ $i }}" role="tabpanel">
                        @include('partials.articles.actions')
                        {{ the_sub_field('txt_copy') }}

                        @include('partials.articles.contact')
                      </div>
                      @php($i++)
                    @endwhile
                  </div>
                </div>
              @endif
            @endwhile

            @while((have_rows('lay_section')))
              @php(the_row())
              @if(get_row_layout() == 'lay_basic')
                @include('partials.articles.contact')
              @endif
            @endwhile
          </div>

          <div class="col --12@xs --3@md">
            @include('partials.articles.related')
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
