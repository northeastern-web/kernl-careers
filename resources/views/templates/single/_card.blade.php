<article {{ post_class('card') }}>
  <a href="{{ the_permalink() }}" class="__link">
    <header class="__header">
      @if (get_the_category())
        <div class="__column"><div class="badge --{{ (get_field('radio_color', 'category_'.get_the_category()[0]->term_id) ? get_field('radio_color', 'category_'.get_the_category()[0]->term_id) : 'transparent' ) }}">{{ get_the_category()[0]->name }}</div></div>
      @endif
    </header>

    @if (has_post_thumbnail())
      <div class="__graphic">
        <img class="__graphic__img" alt="{{ the_title() }}"
          src="{{ the_post_thumbnail_url('large') }}"
          data-src="{{ the_post_thumbnail_url('large') }}">
      </div>
    @endif

    <section class="__body">
      <h2 class="__title">{{ the_title() }}</h2>
      <div class="__excerpt">
        @if (has_excerpt())
          {{ get_the_excerpt() }}
        @else
          {{ wp_trim_words(get_the_content(), 20) }}
        @endif
      </div>
    </section>
    <footer class="__footer">
      <div class="__column">by <b>{{ get_the_author() }}</b></div>
      <div class="__column">&raquo;</div>
    </footer>
  </a>
</article>
