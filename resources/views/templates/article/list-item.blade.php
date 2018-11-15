<a class="__item" href="{{ the_permalink() }}">
  <h6 class="mb--0 {{ (has_term('form','type') ? '+icon +form' : '') }}">
    {!! the_title() !!}
    @if (has_term('form','type'))
      <i class="__icon tc--gray-300" data-feather="file-text"></i>
    @endif
  </h6>
  <div class="__excerpt tc--gray-600 fs--xs pr--1">
    {!! (get_the_excerpt() ? get_the_excerpt() : '!! Still needs excerpt !!') !!}
  </div>
</a>
