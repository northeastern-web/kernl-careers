<article {{ post_class('post --single --article') }}>
  @while(have_posts()) @php(the_post())
    @include('registrar.header-article')

    <section class="section">
      <div class="row">
        <div class="col --12@xs --9@md pr--3@md">
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

        <div class="col --12@xs --3@md" id="waypoint">
          @include('registrar.sidebar-article')
        </div>
      </div>
    </section>
  @endwhile

  @if(get_field('select_status'))
    @php ($status = the_field('select_status'))
    @php ($status_class = '')
  @else
    @php ($status = '<i>!! Assign Status !!</i>')
    @php ($status_class = '')
  @endif

  @switch($status_class)
    @case($status == "Incomplete (needs editing)")
      @php($status_class = '--incomplete')
      @break

    @case($status == "Complete (needs review)")
      @php($status_class = '--complete')
      @break

    @case($status == "Finalized (no further review needed)")
      @php($status_class = '--finalized')
      @break

    @default
      @php($status_class = '--assign')
  @endswitch

  {{ edit_post_link(
    '<span class="edit-status ' . $status_class . '"><b>Status</b>: ' . $status . '</span> Edit Page',
    '',
    '')
  }}
</article>
