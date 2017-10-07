<header
  class="masthead
    {{ (get_field('bool_megamenu','option') ? '--megamenu' : '') }}
    {{ (\App\Site::getMenu('Utility Navigation') ? '+utility' : '') }}
    {{ (get_field('bool_masthead_overylay','option') ? '--overlay' : '') }}">
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
      @php
      wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'depth' => 10,
        'menu_id' => 'masthead-primary',
        'menu_class' => '__list',
        'walker' => new \Kernl\Masthead()
      ]);
      @endphp

    {{--
      <ul class="__list">
        @foreach (\App\Site::getMenu('Primary Navigation') as $item)
          <li class="__item {{ (\App\Site::isActiveMenu('Primary Navigation', $item) ? '--active' : '') }}">
            <a class="__link" href="{{ $item->url }}">{{ $item->title }}</a>
          </li>
        @endforeach
      </ul>
    --}}
    @endif

    @if (\App\Site::getMenu('Utility Navigation'))
      <ul class="__list --utility">
        @foreach (\App\Site::getMenu('Utility Navigation') as $item)
          <li class="__item {{ (\App\Site::isActiveMenu('Utility Navigation', $item) ? '--active' : '') }}">
            <a class="__link" href="{{ $item->url }}">{{ $item->title }}</a>
          </li>
        @endforeach
      </ul>
    @endif
  </nav>
</header>
