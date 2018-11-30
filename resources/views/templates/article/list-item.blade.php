@php
  $has_excerpt = (!empty($hide_excerpt) ? false : true);
@endphp

<a class="__item{{ (has_term('form','type') ? ' +icon +form' : '') }}" href="{{ the_permalink() }}">
    {!! the_title() !!}
    @if (has_term('form','type'))
      <i class="__icon tc--gray-300" data-feather="file-text"></i>
    @endif
  @if($has_excerpt)
    <div class="__excerpt{{ (isset($excerpt_class) ? ' ' . $excerpt_class : '') }}">
      {!! (get_the_excerpt() ? get_the_excerpt() : '!! Still needs excerpt !!') !!}
    </div>
  @endif
</a>
