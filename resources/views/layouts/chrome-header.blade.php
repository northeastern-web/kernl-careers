<header class="masthead">
  <a class="__logo" href="{{ home_url('/') }}" data-ga-click="Home Logo">
    <img class="__logo__image" src="<?= get_field('med_logo','option'); ?>" alt="<?= get_bloginfo('name', 'display'); ?> logo">
  </a>
  <button class="__toggler hidden--up@lg"><i data-feather="menu"></i></button>

  <nav class="__drawer" role="navigation">
    <div class="clearfix hidden--up@lg">
      <a class="__logo" href="{{ home_url('/') }}" data-ga-click="Mobile Drawer Logo">
        <img class="__logo__image" src="<?= get_field('med_logo_white'); ?>" alt="<?= get_bloginfo('name', 'display'); ?> logo">
      </a>
      <button class="__toggler menu-is-open"><i data-feather="x"></i></button>
    </div>

    @if (has_nav_menu('primary_navigation'))
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => '__list']) !!}
    @else
      <ul class="__list">
        <li class="__item active">
          <a class="__link" href="#">Lorem Ipsum</a>
        </li>
        <li class="__item +children">
          <a class="__link" href="#">Bibendum</a>
          <ul class="__submenu">
            <li class="__item"><a class="__link" href="#">Quam Vulputate Nibh</a></li>
            <li class="__item"><a class="__link" href="#">Tortor Fusce</a></li>
          </ul>
        </li>
        <li class="__item +children">
          <a class="__link" href="#">Pudgi Homunculi</a>
          <ul class="__submenu">
            <li class="__item"><a class="__link" href="#">Malesuada Bibendum</a></li>
            <li class="__item"><a class="__link" href="#">Bibendum Mattis Dapibus</a></li>
            <li class="__item"><a class="__link" href="#">Venenatis Pharetra Sit Dolor</a></li>
          </ul>
        </li>
        <li class="__item">
          <a class="__link" href="#">Malesuada Nucleus</a>
        </li>
      </ul>
    @endif
  </nav>
</header>
