@php
  $has_excerpt = (!empty($hide_excerpt) ? false : true);
  $has_icon = (has_term('video','collection') ? 'play-circle' : '');
@endphp

<a class="__item {{ ($has_icon ? '--right' : '') }}" href="{{ the_permalink() }}">
    {!! the_title() !!}
    @if ($has_icon)
      <i class="__icon tc--gray-300" data-feather="{{ $has_icon }}"></i>
    @endif
  @if($has_excerpt)
    <div class="__excerpt {{ (isset($excerpt_class) ? $excerpt_class : 'tc--gray-600 fs--xs pr--1') }}">
      {!! (get_the_excerpt() ? get_the_excerpt() : '!! Still needs excerpt !!') !!}
    </div>
  @endif
</a>
