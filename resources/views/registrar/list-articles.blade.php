<?php /** (List Articles) */ ?>

@php
  global $query_string;
  $taxonomy = (isset($query_string['taxonomy']) ? $query_string['taxonomy'] : 'group');
  $term = (isset($query_string['term']) ? $query_string['term'] : 'catalog');
  $count = (isset($query_string['count']) ? $query_string['count'] : 3);

  $term = get_term_by('slug', $term, $taxonomy)->term_id;
  $q = new \WP_Query([
    'post_type' => 'article',
    'orderby' => 'menu_order title',
    'order' => 'ASC',
    'posts_per_page' => $count,
    'tax_query' => [
      ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term]
    ]
  ]);
@endphp

@if ($q->have_posts())
  <section class="mb--3@xs">
    @include('registrar.list-header')

    <div class="list-group +indent">
      @while ($q->have_posts())
        @php($q->the_post())
        @include('registrar.list-item')
      @endwhile
      @php(wp_reset_postdata())
    </div>
  </section>
@endif
