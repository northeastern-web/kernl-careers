@php
  $option = (is_home() ? 'option' : get_the_ID());
  $class = (get_field('bool_megamenu', 'option') ? ' --megamenu +chevron' : '');
  $class .= (\Kernl\Masthead::getMenu('Utility Navigation') ? ' +utility' : '');
  $class .= (get_field('bool_masthead_overylay', $option) || \Kernl\Layout::getParentValues('bool_masthead_overylay') ? ' --overlay' : '');
@endphp
{{ \Kernl\Layout::getParentValues('bool_megamenu') }}

<header class="masthead{{ $class }}" role="banner">
  <a class="__logo" href="{{ home_url('/') }}" data-ga-click="Home Logo">
    <img class="__logo__image" src="{{ (get_field('bool_customize', $option) && get_field('bool_masthead_overylay', $option) || \Kernl\Layout::getParentValues('bool_masthead_overylay') ? get_field('med_logo_white','option') : get_field('med_logo','option')) }}" alt="<?= get_bloginfo('name', 'display'); ?> logo">
  </a>
  <button class="__toggler hidden--up@lg"><i data-feather="menu"></i></button>

  <nav class="__drawer" role="navigation">
    <div class="clearfix hidden--up@lg">
      <a class="__logo" href="{{ home_url('/') }}" data-ga-click="Mobile Drawer Logo">
        <img class="__logo__image" src="<?= get_field('med_logo_white', 'option'); ?>" alt="<?= get_bloginfo('name', 'display'); ?> logo">
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
