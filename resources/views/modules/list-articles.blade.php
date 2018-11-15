<?php /** (List Articles) */ ?>

@php
  global $query_string;
  $count = (isset($query_string['count']) ? $query_string['count'] : 3);
  $title = (isset($query_string['title']) ? $query_string['title'] : null);
  $icon = (isset($query_string['icon']) ? $query_string['icon'] : null);

  // Primary Taxonomy
  $taxonomy = (isset($query_string['taxonomy']) ? $query_string['taxonomy'] : 'group');
  $term = (isset($query_string['term']) ? $query_string['term'] : null);
  $term = get_term_by('slug', $term, $taxonomy)->term_id;

  // Setup tax_query
  $tax_query = ['relation' => 'OR'];
  $tax_query[] = ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term];

  // Optional 2nd Taxonomy
  $taxonomy2 = (isset($query_string['taxonomy2']) ? $query_string['taxonomy2'] : 'group');
  $term2 = (isset($query_string['term2']) ? $query_string['term2'] : null);
  if ($term2) {
    $term2 = get_term_by('slug', $term2, $taxonomy2)->term_id;
    $tax_query[] = ['taxonomy' => $taxonomy2, 'field' => 'term_id', 'terms' => $term2];
  }

  $q = new \WP_Query([
    'post_type' => 'article',
    'orderby' => 'menu_order title',
    'order' => 'ASC',
    'posts_per_page' => $count,
    'tax_query' => $tax_query
  ]);
@endphp

@if ($q->have_posts())
  <section class="mb--2">
    @include('templates.article.list-header')

    <div class="list-group --indent">
      @while ($q->have_posts())
        @php($q->the_post())
        @include('templates.article.list-item')
      @endwhile
      @php(wp_reset_postdata())
    </div>
  </section>
@endif
