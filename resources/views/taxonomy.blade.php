@extends('chrome.app')

@section('content')
  @php
    $current_taxonomy = get_query_var('taxonomy');
    $current_term = get_term_by('slug', get_query_var('term'), $current_taxonomy);
    $current_term_children = get_term_children($current_term->term_id, $current_taxonomy);
    $type = get_query_var('type');

    $segment = null;
    $orderby = 'menu_order title';
    $count = 5;

    if (is_tax('type','form') || is_tax('audience','faculty-staff')) {
      $count = 20;
      $taxonomy = 'group';
      $term_children = get_terms('group', ['parent' => 0, 'fields' => 'ids', 'exclude' => [18]]);
      $segment = ['taxonomy' => $current_taxonomy, 'field' => 'term_id', 'terms' => $current_term];
      $orderby = 'title';
    } else {
      $taxonomy = $current_taxonomy;
      $term_children = $current_term_children;
      if ($type) {
        $segment = ['taxonomy' => 'type', 'field' => 'slug', 'terms' => $type];
      }
    }
  @endphp

  @include('templates._banner', ['class' => 'mb--1'])

  <div class="section">
    <div class="row">
      <div class="col w--2/3@t w--3/4@w --content">
        @if(isset($_GET['type']) || isset($_GET['audience']))
          <div class="alert --btn --yellow">
            <div class="__body">
              <div class="__excerpt">
                <ul class="list--inline">
                  <li>You are filtering by: </li>
                  {!! (isset($_GET['type']) ? '<li>'. $_GET['type'] .'</li>' : '') !!}
                  {!! (isset($_GET['audience']) ? '<li>'. $_GET['audience'] .'</li>' : '') !!}
                </ul>
              </div>
            </div>
            <footer class="__footer">
              <a href="#" class="__footer__link --xs --gray-dark">Clear</a>
            </footer>
          </div>
        @endif

        @if ($term_children)
          @foreach ($term_children as $term)
            @php
              $q = new \WP_Query([
                'orderby' => $orderby,
                'order' => 'ASC',
                'posts_per_page' => $count,
                'tax_query' => [
                  ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term],
                  $segment
                ]
              ]);
            @endphp

            @if ($q->have_posts())
              <section class="section px--0 pt--0 pb--2@t" id="tax-{{ get_term_by('term_id', $term, $taxonomy)->slug }}">
                @include('templates.article.list-header')

                <div class="list-group --indent --right">
                  @while ($q->have_posts())
                    @php($q->the_post())
                    @include('templates.article.list-item', [
                      'excerpt_class' => 'tc--gray-600 fs--sm pr--1',
                      'hide_excerpt' => false
                      ])
                  @endwhile @php(wp_reset_postdata())
                </div>
              </section>
            @endif
          @endforeach

        @else
          <section class="section px--0 pt--0">
            <div class="list-group --indent --right">
              @while (have_posts())
                @php(the_post())
                @include('templates.article.list-item', [
                  'excerpt_class' => 'tc--gray-600 fs--xs pr--1',
                  'hide_excerpt' => false
                  ])
              @endwhile @php(wp_reset_postdata())
            </div>
          </section>
        @endif
      </div>

      <div class="col w--1/3@t w--1/4@w pl--3@w mb--2 --aside">
        @if ($term_children)
          <aside class="card pos--sticky tt--caps bs--none">
            <div class="__header pa--1 fs--xs bg--gray-900 tc--gray-100">
              <div class="__column">On this page</div>
            </div>
            <div class="__body pt--3 px--0 pb--0 bg--gray-100">
              <div class="list-group fs--xs mb--0">
                @foreach ($term_children as $term_child)
                  <a class="__item px--1" href="#tax-{{ get_term_by('term_id', $term_child, $taxonomy)->slug }}">{!! get_term_by('term_id', $term_child, $taxonomy)->name !!}</a>
                @endforeach
              </div>
            </div>
          </aside>
        @endif

        @if(get_field('txt_ad', get_queried_object()))
          <aside>
            {!! get_field('txt_ad', get_queried_object()) !!}
          </aside>
        @endif
      </div>
    </div>
  </div>
@endsection
