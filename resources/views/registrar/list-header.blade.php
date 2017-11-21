<header class="__header --archive">
  <h2 class="__title{{ get_field('txt_icon', get_term_by('term_id', $term, $taxonomy)) ? ' +icon' : '' }} +oh--x">
    <a class="__link mr--1@xs" href="{{ get_term_link(get_term_by('term_id', $term, $taxonomy)) }}">
      @if(get_field('txt_icon', get_term_by('term_id', $term, $taxonomy)))
        <i class="__icon --thin text--red" data-feather="{{ get_field('txt_icon', get_term_by('term_id', $term, $taxonomy)) }}"></i>
      @endif

      {{ get_term_by('term_id', $term, $taxonomy)->name }}
    </a>

    @if($q->found_posts > $count)
      <a class="btn --gray-500 --outline --xs" href="{{ get_term_link(get_term_by('term_id', $term, $taxonomy)) }}">{{ $q->found_posts }} Articles</a>
    @endif
  </h2>
</header>
