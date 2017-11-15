<header {{ \Kernl\Layout::structure('banner', ['class' => 'section --header'], 'get_field') }} data-acf="bool_banner">
  <div class="__header">
    @if(get_field('txt_pretitle', get_queried_object()))
      <div class="__pretitle">{{ get_field('txt_pretitle', get_queried_object()) }}</div>
    @endif

    @if(get_field('txt_title', get_queried_object()))
      <h1 class="__title fs--d6">{{ get_field('txt_title', get_queried_object()) }}</h1>
    @else
      <h1 class="__title fs--d6">{{ single_cat_title('', false) }}</h1>
    @endif

    @if(get_field('txt_subtitle', get_queried_object()))
      <div class="__subtitle">{!! get_field('txt_subtitle', get_queried_object()) !!}</div>
    @endif
  </div>
</header>
