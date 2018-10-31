@php
  $has_badge = (!empty($hide_badge) ? false : true);
  $has_excerpt = (!empty($hide_excerpt) ? false : true);
  $alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)
@endphp

<article class="card {{ (isset($class) ? $class : '') }}">
  <a href="{{ the_permalink() }}" class="__link">
    @if(get_the_category() && $has_badge)
      <header class="__header{{ has_post_thumbnail() ? '' : ' pa--1' }}">
        <div class="__column">
          <div class="badge --left {{ (get_field('radio_color', 'category_'.get_the_category()[0]->term_id) ? get_field('radio_color', 'category_'.get_the_category()[0]->term_id) : '') }}">
              {{ get_the_category()[0]->name }}
          </div>
        </div>
      </header>
    @endif

    @if(has_post_thumbnail())
      <div class="__graphic ar--16x9">
        <img class="__graphic__img" alt="{{ $alt ? $alt : the_title() }}"
          src="{{ the_post_thumbnail_url('large') }}"
          data-src="{{ the_post_thumbnail_url('large') }}">
      </div>
    @endif

    <section class="__body">
      <h2 class="__title">{{ the_title() }}</h2>

      @if($has_excerpt)
        {!! (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20)) !!}
      @endif
    </section>
  </a>
</article>
