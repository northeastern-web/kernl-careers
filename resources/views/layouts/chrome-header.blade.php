<header class="masthead">
  <a class="masthead__logo" href="{{ home_url('/') }}" data-ga-click="Home Logo">
    <img class="masthead__logo__image" src="<?= get_field('img_logo','option')['url']; ?>" alt="<?= get_bloginfo('name', 'display'); ?> logo">
  </a>
  <button class="masthead__toggler hidden--up@lg"><i data-feather="menu"></i></button>

  <nav class="masthead__drawer" role="navigation">
    <div class="clearfix hidden--up@lg">
      <a class="masthead__logo" href="{{ home_url('/') }}" data-ga-click="Mobile Drawer Logo">
        <img class="masthead__logo__image" src="<?= get_field('img_logo_inversed','option')['url']; ?>" alt="<?= get_bloginfo('name', 'display'); ?> logo">
      </a>
      <button class="masthead__toggler menu-is-open"><i data-feather="x"></i></button>
    </div>

    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'masthead__menu__list']) !!}
    @else
      <ul class="masthead__menu__list">
        <li class="menu-item active">
          <a class="menu-link" href="#">Lorem Ipsum</a>
        </li>
        <li class="menu-item menu-item-has-children">
          <a class="menu-link" href="#">Bibendum</a>
          <ul class="sub-menu">
            <li class="menu-item"><a class="menu-link" href="#">Quam Vulputate Nibh</a></li>
            <li class="menu-item"><a class="menu-link" href="#">Tortor Fusce</a></li>
          </ul>
        </li>
        <li class="menu-item menu-item-has-children">
          <a class="menu-link" href="#">Pudgi Homunculi</a>
          <ul class="sub-menu">
            <li class="menu-item"><a class="menu-link" href="#">Malesuada Bibendum</a></li>
            <li class="menu-item"><a class="menu-link" href="#">Bibendum Mattis Dapibus</a></li>
            <li class="menu-item"><a class="menu-link" href="#">Venenatis Pharetra Sit Dolor</a></li>
          </ul>
        </li>
        <li class="menu-item">
          <a class="menu-link" href="#">Malesuada Nucleus</a>
        </li>
      </ul>
    @endif
  </nav>
</header>
