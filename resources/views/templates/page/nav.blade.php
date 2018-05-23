<nav class="nav --interior">
  <div class="hidden--up@md ta--c pb--1@xs ot--1@xs">
    <button class="__toggler btn --sm">
      <i class="__icon --left" data-feather="menu"></i> Page Menu
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
