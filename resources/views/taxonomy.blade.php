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

  <div class="row">
    <div class="col --9@xs">
      @if ($term_children)
        @foreach ($term_children as $term_child)
          @php
            $query = new WP_Query([
              'tax_query' => [
                ['taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term_child]
              ]
            ]);
          @endphp

          <section class="section">
            <header class="__header">
              <h1 class="__title">{{ get_term_by('term_id', $term_child, $taxonomy)->name }}</h1>
            </header>
            <div class="list-group">
              @while ($query->have_posts())
                @php($query->the_post())
                @include('components.list-item')
              @endwhile @php(wp_reset_postdata())
            </div>
          </section>
        @endforeach

      @else
        <section class="section">
          <ul class="media__list">
            @while (have_posts())
              @php(the_post())
              <li class="media">@include('components.media')</li>
            @endwhile
          </ul>
        </section>
      @endif
    </div>
    <div class="col --2@xs">
    </div>
  </div>
@endsection
