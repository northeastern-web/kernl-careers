<a class="__item" href="{{ the_permalink() }}">
  <h6 class="mb--0@xs {{ (has_term('form','type') ? '+form' : '') }}">
    {!! the_title() !!}
    @if (has_term('form','type'))
      <i class="text--gray-300 +form" data-feather="file-text"></i>
    @endif
  </h6>
  <div class="__excerpt text--gray-600 fs--xs pr--1@xs">
    {!! (get_the_excerpt() ? get_the_excerpt() : '!! Still needs excerpt !!') !!}
  </div>
</a>
