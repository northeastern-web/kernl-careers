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
                <p><i>Basic Section</i></p>
                {{ the_sub_field('txt_copy') }}

              @else
                <p><i>Tabbed Section</i></p>
                @while((have_rows('lay_tab')))
                  @php(the_row())
                  <h4>{{ the_sub_field('txt_title') }}</h4>
                  {{ the_sub_field('txt_copy') }}
                @endwhile

              @endif
            @endwhile
          </div>
          <div class="col --12@xs --3@md">
            <article class="card --scroll +list-group">
              <header class="__header">
                <div class="__column">
                  <div>Related Articles</div>
                </div>
              </header>
              <div class="__body">
                <div class="__excerpt">
                  <ul class="list-group">
                    <li>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</li>
                    <li>Donec ullamcorper nulla non metus auctor fringilla.</li>
                    <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
                    <li>Donec ullamcorper nulla non metus auctor fringilla.</li>
                    <li>Donec ullamcorper nulla non metus auctor fringilla.</li>
                    <li>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</li>
                  </ul>
                </div>
              </div>
            </article>
          </div>
        </div>
      </section>
    @endwhile
  </article>
@endsection
