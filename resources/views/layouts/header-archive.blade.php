<header {{ \Kernl\Layout::structure('banner', ['class' => 'l__header'], 'get_field') }} data-acf="bool_banner">
  @if(get_field('bool_header', get_queried_object()))

    @if(get_field('txt_pretitle', get_queried_object()))
      <div class="__pretitle">{{ get_field('txt_pretitle', get_queried_object()) }}</div>
    @endif

    @if(get_field('txt_title', get_queried_object()))
      <h1 class="__title">{{ get_field('txt_title', get_queried_object()) }}</h1>
    @endif

    @if(get_field('txt_subtitle', get_queried_object()))
      <div class="__subtitle">{!! get_field('txt_subtitle', get_queried_object()) !!}</div>
    @endif

  @else
    <h1 class="__title">{{ single_cat_title('', false) }}</h1>
  @endif
</header>
