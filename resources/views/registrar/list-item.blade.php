<a class="__item" href="{{ the_permalink() }}">
  @if (has_term('form','type'))
    <h6 class="mb--0@xs +form">
  @else
    <h6 class="mb--0@xs">
  @endif
    {{ the_title() }}
    @if (has_term('form','type'))
      <i class="text--gray-300 +form" data-feather="file-text"></i>
    @endif
  </h6>
  <div class="text--gray-600 fs--xs">
    {{ (get_the_excerpt() ? get_the_excerpt() : '!! Still needs excerpt !!') }}
  </div>
</a>
