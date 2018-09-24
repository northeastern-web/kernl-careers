<header class="{{ \Kernl\Masthead::getClass() }}" role="banner">
  <a class="__logo" href="{{ home_url('/') }}">
    <img class="__logo__image" src="{{ \Kernl\Masthead::getLogo() }}" alt="<?= get_bloginfo('name', 'display'); ?> logo">
  </a>

  <button class="__toggler hidden--up@d" aria-label="Open"><i data-feather="menu"></i></button>

  <nav class="__drawer" role="navigation">
    <div class="w--100 d--flex justify--between hidden--up@d">
      <a class="__logo" href="{{ home_url('/') }}">
        <img class="__logo__image" src="<?= get_field('med_logo_white', 'option'); ?>" alt="<?= get_bloginfo('name', 'display'); ?> logo">
      </a>
      <button class="__toggler" aria-label="Close"><i data-feather="x"></i></button>
    </div>

    @if (has_nav_menu('primary_navigation'))
      @php
      wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'depth' => 10,
        'menu_id' => 'masthead-primary',
        'menu_class' => '__list',
        'walker' => new \Kernl\Masthead()
      ]);
      @endphp
    @endif

    @if (\Kernl\Masthead::getMenu('Utility Navigation'))
      <ul class="__list --utility">
        @foreach (\Kernl\Masthead::getMenu('Utility Navigation') as $item)
          <li class="__item {{ (\Kernl\Masthead::isActiveMenu('Utility Navigation', $item) ? '--active' : '') }}">
            <a class="__link" href="{{ $item->url }}">{{ $item->title }}</a>
          </li>
        @endforeach
      </ul>
    @endif
  </nav>
</header>
