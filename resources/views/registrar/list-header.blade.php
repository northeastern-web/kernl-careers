<header class="__header --archive mb--1@xs">
  <h2 class="__title{{ get_field('txt_icon', get_term_by('slug', $term, $taxonomy)) ? ' +icon' : '' }}">
    <a class="__link mr--1@xs" href="{{ get_term_link(get_term_by('slug', $term, $taxonomy)) }}">
      @if(get_field('txt_icon', get_term_by('slug', $term, $taxonomy)))
        <i class="__icon --thin text--red" data-feather="{{ get_field('txt_icon', get_term_by('slug', $term, $taxonomy)) }}"></i>
      @endif

      {{ get_term_by('slug', $term, $taxonomy)->name }}
    </a>

    @if($q->found_posts > $count)
      <a class="btn --gray-500 --outline --xs" href="{{ get_term_link(get_term_by('slug', $term, $taxonomy)) }}">{{ $q->found_posts }} Articles</a>
    @endif
  </h2>
</header>
