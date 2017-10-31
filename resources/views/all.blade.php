@php
  $taxonomy = 'group';
  $count = -1;
  $terms = get_terms( [ 
    'taxonomy' => $taxonomy,
    'hide_empty' => 1,
    'parent'   => 0
  ] );
@endphp

@foreach($terms as $term)
  @php 
    $q = new \WP_Query([
      'post_type' => ['article'],
      'orderby' => 'menu_order title',
      'order' => 'ASC',
      'posts_per_page' => $count,
      'tax_query' => [
        ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term]
      ]
    ]);
  @endphp

  @if($q->have_posts())
    <section class="section px--0@xs">
      <header class="__header --archive">
        <h2>{{ $term->name }}</h2>
      </header>

      <table class="table --all">
        <thead>
          <tr class="th--sm">
            <th width="25%">Status</th>
            <th width="45%">Title</th>
            <th width="30%">Owner/Editor</th>
          </tr>
        </thead>
        <tbody>
          @while($q->have_posts())
            @php($q->the_post())
            @include('registrar.all-table')
          @endwhile @php(wp_reset_postdata())
        </tbody>
      </table>
    </section>
  @endif
@endforeach
