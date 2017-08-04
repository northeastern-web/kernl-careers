<header {{ \Kernl\Layout::structure('banner', ['class' => 'l__header'], 'get_field') }} data-acf="bool_banner">
  <div class="l__header__wrap">
    @if(get_field('bool_header', get_queried_object()))

      @if(get_field('txt_pretitle', get_queried_object()))
        <div class="l__header__pretitle">{{ get_field('txt_pretitle', get_queried_object()) }}</div>
      @endif

      @if(get_field('txt_title', get_queried_object()))
        <h1 class="l__header__title">{{ get_field('txt_title', get_queried_object()) }}</h1>
      @endif

      @if(get_field('txt_subtitle', get_queried_object()))
        <div class="l__header__subtitle">{!! get_field('txt_subtitle', get_queried_object()) !!}</div>
      @endif

    @else
      <h1 class="l__header__title">{{ single_cat_title('', false) }}</h1>
    @endif
  </div>
</header>
