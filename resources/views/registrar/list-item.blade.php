<a class="__item" href="{{ the_permalink() }}">
  <h6 class="mb--0@xs">{{ the_title() }}</h6>
  <div class="text--gray-600 fs--xs">
    {{ (get_the_excerpt() ? get_the_excerpt() : 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.') }}
  </div>
</a>
