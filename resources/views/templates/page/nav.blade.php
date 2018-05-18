<nav class="nav --interior">
  <div class="hidden--up@md ta--c pb--1@xs ot--1@xs">
    <button class="__toggler btn --sm">
      <span class="__icon --left mr--1@xs"><i data-feather="menu"></i></span>
      Page Menu
    </button>
  </div>

  <ul class="__list">
    @if(\Kernl\Navigation::isBanner())
      {!! \Kernl\Navigation::display('', 2) !!}

    @else
      {!! \Kernl\Navigation::display('top', 1, false, 'parent') !!}

    @endif
  </ul>
</nav>
