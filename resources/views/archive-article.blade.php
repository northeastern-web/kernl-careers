@extends('chrome.app')

@section('content')
  <div {{ post_class('--archive') }}>
    @include('templates._banner')
  </div>

  <section class="section">
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
                <th width="20%">Status</th>
                <th width="40%">Title</th>
                <th>Owner/Editor</th>
                <th class="ta--c">Related<br>Assigned</th>
                <th class="ta--c">Contact<br>Assigned</th>
              </tr>
            </thead>
            <tbody>
              @while($q->have_posts())
                @php($q->the_post())
                <tr>
                  <td class="fs--xs edit-status {{ \App\Site::articleStatus()[1] }}">
                    {{ \App\Site::articleStatus()[0] }}
                  </td>
                  <td class="pr--3@xs">
                    <a href="{{ the_permalink() }}"><b>{{ the_title() }}</b></a><br>
                    <span class="__excerpt">{{ (get_the_excerpt() ? get_the_excerpt() : '!!-- Still needs excerpt --!!') }}</span>
                    {{ edit_post_link( __('<i data-feather="edit"></i>','textdomain'),'','') }}
                  </td>
                  <td class="fs--xs text--gray">
                    @if (get_field('select_owner'))
                      {{ the_field('select_owner') }}
                    @else
                      <i>!! Assign Owner !!</i>
                    @endif
                  </td>
                  <td class="ta--c --related">
                    @if (get_field('rel_related'))
                      <i class="text--green-dark" data-feather="check"></i>
                    @else
                      <i class="text--red-light" data-feather="x"></i>
                    @endif
                  </td>
                  <td class="ta--c --related">
                    @if (get_sub_field('rel_contact'))
                      <i class="text--green-dark" data-feather="check"></i>
                    @else
                      <i class="text--red-light" data-feather="x"></i>
                    @endif
                  </td>
                </tr>
              @endwhile @php(wp_reset_postdata())
            </tbody>
          </table>
        </section>
      @endif
    @endforeach
  </section>
@endsection
