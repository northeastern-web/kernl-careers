@php
  $has_excerpt = (!empty($hide_excerpt) ? false : true);
  $alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)
@endphp

<div class="media {{ (isset($class) ? $class : '') }}">
  <a class="__link" href="{{ the_permalink() }}">
    @if(has_post_thumbnail())
      <div class="__graphic">
        <img class="__graphic__img" alt="{{ $alt ? $alt : the_title() }}"
          src="{{ the_post_thumbnail_url('thumbnail') }}"
          data-src="{{ the_post_thumbnail_url('thumbnail') }}">
      </div>
    @endif


    <div class="__body">
      <h4 class="__title">{{ the_title() }}</h4>

      @if($has_excerpt)
        <div class="fs--sm">
          {!! (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20)) !!}
        </div>
      @endif
    </div>
  </a>
</div>
