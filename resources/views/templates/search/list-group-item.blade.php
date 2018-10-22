<a class="__item" href="{{ the_permalink() }}">
  <h6 class="mb--0">{!! the_title() !!}</h6>
  <div class="text--gray-600 fs--xs pr--1">
    {!! get_the_excerpt() ? get_the_excerpt() . '<br>' : '' !!}
    <span class="tc--gray d--block tt--c" style="margin-top: 2px;">{!! (get_post_type() == 'post') ? get_the_category(get_the_ID())[0]->name : get_post_type() !!}</span>
  </div>
</a>
