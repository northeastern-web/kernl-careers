@extends('layouts.app')

@section('content')
  @php
    $current_taxonomy = get_query_var('taxonomy');
    $current_term = get_term_by('slug', get_query_var('term'), $current_taxonomy);
    $current_term_children = get_term_children($current_term->term_id, $current_taxonomy);
    $type = get_query_var('type');
    $segment = '';
    $count = 5;

    if (is_tax('type','form') || is_tax('audience','faculty-staff')) {
      $count = 20;
      $taxonomy = 'group';
      $term_children = get_terms('group', ['parent' => 0, 'fields' => 'ids', 'exclude' => [18]]);
      $segment = ['taxonomy' => $current_taxonomy, 'field' => 'term_id', 'terms' => $current_term];
    } else {
      $taxonomy = $current_taxonomy;
      $term_children = $current_term_children;
      if ($type) {
        $segment = ['taxonomy' => 'type', 'field' => 'slug', 'terms' => $type];
      }
    }
  @endphp
  <div {{ post_class('--archive') }}>
    @include('layouts.chrome.header-archive')
  </div>

  <div class="section">
    <div class="row">
      <div class="col --9@md --12@xs">
        @if ($term_children)
          @foreach ($term_children as $term)
            @php
              $q = new \WP_Query([
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'posts_per_page' => $count,
                'tax_query' => [
                  ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term],
                  $segment
                ]
              ]);
            @endphp

            @if ($q->have_posts())
              <section class="section px--0@xs" id="tax-{{ get_term_by('term_id', $term, $taxonomy)->slug }}">
                <header class="__header --archive">
                  <div class="f--r@xs fs--xs pt--1@xs">
                    <a href="{{ get_term_link(get_term_by('term_id', $term, $taxonomy)) }}">View All
                      <span class="__icon --right"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></span>
                    </a>
                  </div>
                  <h2 class="__title">{{ get_term_by('term_id', $term, $taxonomy)->name }}</h2>
                </header>

                <div class="list-group +indent">
                  @while ($q->have_posts())
                    @php($q->the_post())
                    @include('registrar.list-item')
                  @endwhile @php(wp_reset_postdata())
                </div>
              </section>
            @endif
          @endforeach

        @else
          <section class="section px--0@xs pt--0@xs">
            <div class="list-group +indent">
              @while (have_posts())
                @php(the_post())
                @include('registrar.list-item')
              @endwhile @php(wp_reset_postdata())
            </div>
          </section>
        @endif
      </div>

      <div class="col --3@md --12@xs">
        @if ($term_children)
          <aside class="card --extend tt--caps +noshadow">
            <div class="__header bg--blue-dark text--gray-100">
              <div class="__column">Jump to Section</div>
            </div>
            <div class="__body py--0@xs">
              <div class="__excerpt">
                <div class="list-group bg--gray-100 fs--xs">
                  @foreach ($term_children as $term_child)
                    <a href="#tax-{{ get_term_by('term_id', $term_child, $taxonomy)->slug }}">{{ get_term_by('term_id', $term_child, $taxonomy)->name }}</a>
                  @endforeach
                </div>
              </div>
            </div>
          </aside>
        @endif
      </div>
    </div>
  </div>
@endsection
