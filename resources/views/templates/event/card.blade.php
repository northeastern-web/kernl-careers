@php
  $has_badge = (!empty($hide_badge) ? false : true);
  $has_excerpt = (!empty($hide_excerpt) ? false : true);
@endphp

<article class="card {{ (isset($class) ? $class : '--v') }}">
  <a href="{{ the_permalink() }}" class="__link">
    @if(get_the_category() && $has_badge)
      <header class="__header">
        <div class="__column">
          <div class="badge --left {{ (get_field('radio_color', 'category_'.get_the_category()[0]->term_id) ? get_field('radio_color', 'category_'.get_the_category()[0]->term_id) : '') }}">
              {{ get_the_category()[0]->name }}
          </div>
        </div>
      </header>
    @endif

    @if(has_post_thumbnail())
      <div class="__graphic ar--16x9">
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

      @if($has_excerpt)
        {!! (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20)) !!}
      @endif
    </section>
  </a>
</article>
