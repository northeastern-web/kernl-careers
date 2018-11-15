@php
  $has_excerpt = (!empty($hide_excerpt) ? false : true);
@endphp

<a class="__item {{ (isset($class) ? $class : '') }}" href="{{ the_permalink() }}">
  <h6 class="mb--0">{!! the_title() !!}</h6>

  @if($has_excerpt)
    <div class="text--gray-600 fs--xs pr--1">
      {{ tribe_get_start_date() }}
    </div>
  @endif
</a>
