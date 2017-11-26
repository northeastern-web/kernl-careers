<?php /** (Article Dashboard) */ ?>

@php
  $all = new \WP_Query([
    'post_type' => ['article'],
    'posts_per_page' => -1
  ]);
  $incomplete = new \WP_Query([
    'post_type' => ['article'],
    'posts_per_page' => -1,
    'meta_query' => [['key' => 'select_status', 'value' => 'edit', 'compare' => 'LIKE']]
  ]);
  $complete = new \WP_Query([
    'post_type' => ['article'],
    'posts_per_page' => -1,
    'meta_query' => [['key' => 'select_status', 'value' => 'needs review', 'compare' => 'LIKE']]
  ]);
  $finalized = new \WP_Query([
    'post_type' => ['article'],
    'posts_per_page' => -1,
    'meta_query' => [['key' => 'select_status', 'value' => 'no further', 'compare' => 'LIKE']]
  ]);
@endphp


<section class="section">
  <div class="row">
    <div class="col --12@xs --2@sm">
      @if(!empty($_GET))
        <a class="btn --block --red-dark mb--1@xs" href="<?= get_permalink(569); ?>">Clear</a>
      @endif

      <nav class="nav --interior">
        <ul class="__list">
          <li class="__item +children">
            <a class="__link" href="#">Status</a>
            <ul class="__list --child">
              <li class="__item {{ (isset($_GET['status']) && $_GET['status'] == 'edit' ? '--active' : '') }}"><a class="__link" href="{{ esc_url(add_query_arg('status', 'edit')) }}">Incomplete</a></li>
              <li class="__item {{ (isset($_GET['status']) && $_GET['status'] == 'review' ? '--active' : '') }}"><a class="__link" href="{{ esc_url(add_query_arg('status', 'review')) }}">Complete</a></li>
              <li class="__item {{ (isset($_GET['status']) && $_GET['status'] == 'final' ? '--active' : '') }}"><a class="__link" href="{{ esc_url(add_query_arg('status', 'final')) }}">Finalized</a></li>
            </ul>
          </li>
          <li class="__item +children">
            <a class="__link" href="#">Owner/Editor</a>
            <ul class="__list --child">
              @foreach(get_users(['exclude' => [1,2]]) as $u)
                <li class="__item {{ (isset($_GET['user']) && $_GET['user'] == $u->ID ? '--active' : '') }}">
                  <a class="__link" href="{{ esc_url(add_query_arg('user', $u->ID)) }}">{{ $u->user_login }}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="__item +children">
            <a class="__link" href="#">Misc</a>
            <ul class="__list --child">
              <li class="__item {{ (isset($_GET['audience']) && $_GET['audience'] == 'faculty-staff' ? '--active' : '') }}"><a class="__link" href="{{ esc_url(add_query_arg('audience', 'faculty-staff')) }}">Faculty/Staff</a></li>
              <li class="__item {{ (isset($_GET['type']) && $_GET['type'] == 'form' ? '--active' : '') }}"><a class="__link" href="{{ esc_url(add_query_arg('type', 'form')) }}">Form</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>

    <div class="col --12@xs --10@sm">
      <div class="row --nogutters mb--2@xs">
        <div class="col" style="overflow-x: hidden; white-space: nowrap; flex: 0 0 {{ floor(abs(count($finalized->posts) / count($all->posts) * 100)) }}%;">
          <article class="alert --green fs--xs">
            <div class="__body">
              <div class="__excerpt">
                <b>{{ floor(abs(count($finalized->posts) / count($all->posts) * 100)) }}% Finalized</b>
                <i>({{ count($finalized->posts) }} articles)</i>
              </div>
            </div>
          </article>
        </div>
        <div class="col" style="overflow-x: hidden; white-space: nowrap; flex: 0 0 {{ floor(abs(count($complete->posts) / count($all->posts) * 100)) }}%;">
          <article class="alert --orange fs--xs">
            <div class="__body">
              <div class="__excerpt">
                <b>{{ floor(abs(count($complete->posts) / count($all->posts) * 100)) }}% Complete</b>
                <i>({{ count($complete->posts) }} articles)</i>
              </div>
            </div>
          </article>
        </div>
        <div class="col" style="overflow-x: hidden; white-space: nowrap; flex: 0 0 {{ floor(abs(count($incomplete->posts) / count($all->posts) * 100)) }}%;">
          <article class="alert --red fs--xs">
            <div class="__body">
              <div class="__excerpt">
                <b>{{ floor(abs(count($incomplete->posts) / count($all->posts) * 100)) }}% Incomplete</b>
                <i>({{ count($incomplete->posts) }} articles)</i>
              </div>
            </div>
          </article>
        </div>
        <div class="col">
          <p class="ta--r@xs fs--xs"><i>{{ count($all->posts) }} total articles</i></p>
        </div>
      </div>

      @php
        $terms = get_terms([
          'taxonomy' => 'group',
          'hide_empty' => 1,
          'parent'   => 0
        ]);
      @endphp
      @foreach($terms as $term)
        @php
          $taxquery = [];
          $taxquery[] = ['taxonomy' => 'group', 'field' => 'term_id', 'terms' => $term->term_id];
          if (isset($_GET['audience'])) {
            $taxquery[] = ['taxonomy' => 'audience', 'field' => 'slug', 'terms' => $_GET['audience']];
          }
          if (isset($_GET['type'])) {
            $taxquery[] = ['taxonomy' => 'type', 'field' => 'slug', 'terms' => $_GET['type']];
          }

          $metaquery = [];
          if (isset($_GET['user'])) {
            $metaquery[] = ['key' => 'rel_owner', 'value' => '"'. $_GET['user'] .'"', 'compare' => 'LIKE'];
          }
          if (isset($_GET['status'])) {
            $metaquery[] = ['key' => 'select_status', 'value' => $_GET['status'], 'compare' => 'LIKE'];
          }
          // die(var_dump($metaquery));
          $q = new \WP_Query([
            'post_type' => ['article'],
            'orderby' => 'menu_order title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'tax_query' => [$taxquery],
            'meta_query' => [$metaquery]
          ]);
        @endphp

        <section class="section px--0@xs pt--0@xs">
          <header class="__header --archive">
            <h2>{{ $term->name }}</h2>
          </header>

          @if($q->have_posts())
            <table class="table --all">
              <thead>
                <tr class="th--sm">
                  <th width="20%">Status</th>
                  <th width="40%">Title</th>
                  <th>Owner/Editor</th>
                  <th class="ta--c">Related<br>Assigned</th>
                  <th class="ta--c">Contact<br>Assigned</th>
                  <th class="ta--c">Faculty/Staff</th>
                  <th class="ta--c">Is Form</th>
                </tr>
              </thead>
              <tbody>
                @while($q->have_posts())
                  @php($q->the_post())
                  @include('registrar.dashboard-table')
                @endwhile @php(wp_reset_postdata())
              </tbody>
            </table>
          @else
            <div class="mt--1@xs text--red"><i>No Articles</i></div>
          @endif
        </section>
      @endforeach
    </div>
  </div>
</section>
