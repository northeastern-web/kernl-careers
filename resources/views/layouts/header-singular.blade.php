<header {{ \Kernl\Layout::structure('banner', ['class' => 'l__header'], 'get_field') }} data-acf="bool_banner">
  <div class="l__header__wrap">
    @if(get_field('bool_header'))

      @if(get_field('txt_pretitle'))
        <div class="l__header__pretitle">{{ get_field('txt_pretitle') }}</div>
      @endif

      @if(get_field('txt_title'))
        <h1 class="l__header__title">{{ get_field('txt_title') }}</h1>
      @endif

      @if(get_field('txt_subtitle'))
        <div class="l__header__subtitle">{!! get_field('txt_subtitle') !!}</div>
      @endif

    @else

      @if(is_single())
        <div class="l__header__pretitle">{{ get_the_category()[0]->name }}</div>
      @endif
      <h1 class="l__header__title">{{ the_title() }}</h1>
    @endif

    @if(is_page() && get_field('bool_horizontal_nav'))
      <nav class="l__header__nav nav nav--tabbed">
        <ul class="nav__list container">
          <?= \Kernl\Navigation::display(); ?>
        </ul>
      </nav>
    @endif
  </div>
</header>
