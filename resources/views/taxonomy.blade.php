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
                'tax_query' => [
                  ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term_child]
                ]
              ]);
            @endphp

            <section class="section px--0@xs">
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
      </div>
    </div>
  </div>
@endsection
