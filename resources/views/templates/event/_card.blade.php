<article class="card {{ (isset($class) ? $class : '--h@sm --v@lg') }}">
  <a href="{{ the_permalink() }}" class="__link">
    {{--
    <header class="__header">
      @if (get_the_category())
        <div class="__column"><div class="badge --left {{ (get_field('radio_color', 'category_'.get_the_category()[0]->term_id) ? get_field('radio_color', 'category_'.get_the_category()[0]->term_id) : '' ) }}">{{ get_the_category()[0]->name }}</div></div>
      @endif
    </header>
    --}}

    @if (has_post_thumbnail())
      <div class="__graphic">
        <img class="__graphic__img" alt="{{ the_title() }}"
          src="{{ the_post_thumbnail_url('large') }}"
          data-src="{{ the_post_thumbnail_url('large') }}">
      </div>
    @endif

    <section class="__body">
      <h2 class="__title">{{ the_title() }}</h2>
      <div class="mb--0h@xs">
        {{ tribe_get_start_date(get_the_id(), false, 'M j') }} at {{ tribe_get_start_time() }}
      </div>

      @if (has_excerpt())
        {!! get_the_excerpt() !!}
      @else
        {!! wp_trim_words(get_the_content(), 20) !!}
      @endif
    </section>
  </a>
</article>
