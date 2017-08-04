<header class="chrm__header">
  <a class="chrm__logo" href="{{ home_url('/') }}" data-ga-click="Home Logo">
    <img class="chrm__logo__img" src="<?= get_field('img_logo','option')['url']; ?>" alt="<?= get_bloginfo('name', 'display'); ?> logo">
  </a>

  @if (has_nav_menu('primary_navigation'))
    <nav class="chrm__nav">
      {{-- {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'masthead__menu__list']) !!} --}}
    </nav>
  @endif
</header>
