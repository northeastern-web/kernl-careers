<article {{ post_class('card') }}>
  <a href="{{ the_permalink() }}" class="card__link">
    <header class="card__header">
      <div class="card__column"><div class="badge badge--{{ (get_field('radio_color', 'category_'.get_the_category()[0]->term_id) ? get_field('radio_color', 'category_'.get_the_category()[0]->term_id) : 'transparent' ) }}">{{ get_the_category()[0]->name }}</div></div>
      {{-- <div class="card__column"><div class="badge badge--transparent">Video</div></div> --}}
    </header>

    @if (has_post_thumbnail())
      <div class="card__graphic">
        <img class="card__graphic__img" alt="{{ the_title() }}"
          src="{{ the_post_thumbnail_url('large') }}"
          data-src="{{ the_post_thumbnail_url('large') }}">
      </div>
    @endif

    <section class="card__body">
      <h2 class="card__title">{{ the_title() }}</h2>
      <div class="card__excerpt">
        @if (has_excerpt())
          {{ get_the_excerpt() }}
        @else
          {{ wp_trim_words(get_the_content(), 20) }}
        @endif
      </div>
    </section>
    <footer class="card__footer">
      <div class="card__column">by <b>{{ get_the_author() }}</b></div>
      <div class="card__column">&raquo;</div>
    </footer>
  </a>
</article>
