<article {{ post_class('post --single --article') }}>
  @while(have_posts()) @php(the_post())
    @include('registrar.header-article')

    <section class="section">
      <div class="row">
        <div class="col --12@xs --8@md --9@lg pr--3@md">
          @while((have_rows('lay_section')))
            @php(the_row())

            @if(get_row_layout() == 'lay_basic')
              @include('registrar.alert')
              @if(have_rows('lay_actions'))
                <div class="f--r@sm ml--1@sm col --12@xs --4@sm px--0@xs">
                  @include('registrar.actions')
                </div>
              @endif
              {{ the_sub_field('txt_copy') }}

            @else
              @if(isset($_GET['tab']))
                @include('registrar.tabs')
              @else
                @include('registrar.accordion')
              @endif
            @endif
          @endwhile
        </div>

        <div class="col --12@xs --4@md --3@lg" id="waypoint">
          @include('registrar.sidebar-article')
        </div>
      </div>
    </section>
  @endwhile

  {{ edit_post_link(
    __('<span class="edit-status ' . \App\Site::articleStatus()[1] . '"><b>Status</b>: ' . \App\Site::articleStatus()[0] . '</span> Edit Page','textdomain'),
    '',
    ''
  ) }}

  <a class="all-articles-link" href="{{ home_url('/all') }}">All Articles</a>
</article>
