@extends('layouts.app')

@section('content')
  @php
    $taxonomy = get_query_var('taxonomy');
    $term = get_term_by('slug', get_query_var('term'), $taxonomy);
    $term_children = get_term_children($term->term_id, $taxonomy);
  @endphp

  <div {{ post_class('--archive') }}>
    @include('layouts.header-archive')
  </div>

  <div class="section">
    <div class="row">
      <div class="col --9@xs">
        @if ($term_children)
          @foreach ($term_children as $term_child)
            @php
              $query = new \WP_Query([
                'orderby' => 'menu_order title',
                'order' => 'ASC',
                'posts_per_page' => 5,
                'tax_query' => [
                  ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term_child]
                ]
              ]);
            @endphp

            <section class="section px--0@xs" id="tax-{{ get_term_by('term_id', $term_child, $taxonomy)->slug }}">
              <header class="__header">
                <div class="f--r@xs fs--xs pt--1@xs"><a href="{{ get_term_link(get_term_by('term_id', $term_child, $taxonomy)) }}">View More</a></div>
                <h1 class="__title">{{ get_term_by('term_id', $term_child, $taxonomy)->name }}</h1>
              </header>

              <div class="list-group +indent">
                @while ($query->have_posts())
                  @php($query->the_post())
                  @include('components.list-item')
                @endwhile @php(wp_reset_postdata())
              </div>
            </section>
          @endforeach

        @else
          <section class="section px--0@xs">
            <div class="list-group +indent">
              @while (have_posts())
                @php(the_post())
                @include('components.list-item')
              @endwhile @php(wp_reset_postdata())
            </div>
          </section>
        @endif
      </div>

      <div class="col --3@xs">
        @if ($term_children)
          <aside class="card --outline --extend" style="border-color: #d0d0d0;">
            <div class="__header fw--700 bg--gray-100">
              <div class="__column">Navigation</div>
            </div>
            <div class="__body py--0@xs">
              <div class="__excerpt fs--xs">
                <div class="list-group --sm">
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
