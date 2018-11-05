<header class="__header --archive" role="banner">
  <h2 class="__title fs--d3 {{ (isset($icon) || get_field('txt_icon', get_term_by('term_id', $term, $taxonomy)) ? '+icon' : '') }}">
    <a class="__link mr--1" href="{{ get_term_link(get_term_by('term_id', $term, $taxonomy)) }}">
      @if(isset($icon) || get_field('txt_icon', get_term_by('term_id', $term, $taxonomy)))
        <i class="__icon --thin tc--red" data-feather="{{ (isset($icon) ? $icon : get_field('txt_icon', get_term_by('term_id', $term, $taxonomy))) }}"></i>
      @endif

      {!! (isset($title) ? $title : get_term_by('term_id', $term, $taxonomy)->name) !!}
    </a>

    @if($q->found_posts > $count)
      <a class="btn --sm" href="{{ get_term_link(get_term_by('term_id', $term, $taxonomy)) }}">{{ $q->found_posts }} Articles</a>
    @endif
  </h2>
</header>
