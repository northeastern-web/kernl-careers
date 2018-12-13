<a class="__item" href="{{ the_permalink() }}">
  <h6 class="mb--0">{!! the_title() !!}</h6>
  {!! get_the_excerpt() ? '<div class="__excerpt text--gray-700 fs--xs pr--1">' . get_the_excerpt() . '</div>' : '' !!}
  <div class="__meta tt--c">{!! (get_post_type() == 'post') ? get_the_category(get_the_ID())[0]->name : get_post_type() !!}</div>
</a>
