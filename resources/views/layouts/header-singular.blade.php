<header {{ \Kernl\Layout::structure('banner', ['class' => 'header section'], 'get_field') }} data-acf="bool_banner">
    @if(get_field('bool_header'))

      @if(get_field('txt_pretitle'))
        <div class="__pretitle">{{ get_field('txt_pretitle') }}</div>
      @endif

      @if(get_field('txt_title'))
        <h1 class="__title">{{ get_field('txt_title') }}</h1>
      @endif

      @if(get_field('txt_subtitle'))
        <div class="__subtitle">{!! get_field('txt_subtitle') !!}</div>
      @endif

    @else

      @if(is_single('post'))
        <div class="__pretitle">{{ get_the_category()[0]->name }}</div>
      @endif
      <h1 class="__title">{{ the_title() }}</h1>
    @endif

    @if(is_page() && get_field('bool_horizontal_nav'))
      <nav class="nav --tabbed">
        <ul>
          <?= \Kernl\Navigation::display(); ?>
        </ul>
      </nav>
    @endif
</header>
