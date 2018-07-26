<div class="hidden--up@d ta--c pb--1">
  <button class="btn --block bc--gray-600" data-toggle="nav" data-swap-target="#nav-interior">
    <i class="__icon" data-feather="align-left"></i> Page Menu
  </button>
</div>

<nav id="nav-interior" class="nav --interior">
  <ul class="__list">
    @if(\Kernl\Navigation::isBanner())
      {!! \Kernl\Navigation::display('', 2) !!}

    @else
      {!! \Kernl\Navigation::display('top', 1, false, 'parent') !!}

    @endif
  </ul>
</nav>
