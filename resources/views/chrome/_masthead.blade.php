
<header class="{{ \Kernl\Lib\Masthead::getClass() }} {{ (has_nav_menu('utility_navigation') ? '+utility' : '') }}" role="banner">
  <a class="__logo" href="{{ home_url('/') }}">
    <img class="__logo__image" src="{{ \Kernl\Lib\Masthead::getLogo() }}" alt="<?= get_bloginfo('name', 'display'); ?> logo">
  </a>

  @if (has_nav_menu('primary_navigation') || has_nav_menu('utility_navigation'))
    <button class="__toggler hidden--up@d" aria-label="Open"><i data-feather="menu"></i></button>
  @endif

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
          'walker' => new \Kernl\Lib\Masthead()
        ]);
      @endphp
    @endif

    @if (has_nav_menu('utility_navigation'))
      <ul class="__list --utility">
        @foreach (\Kernl\Lib\Masthead::getMenu('Utility Navigation') as $item)
          <li class="__item {{ (\Kernl\Lib\Masthead::isActiveMenu('Utility Navigation', $item) ? '--active' : '') }}">
            <a class="__link" href="{{ $item->url }}">{{ $item->title }}</a>
          </li>
        @endforeach
      </ul>
    @endif
  </nav>
</header>
