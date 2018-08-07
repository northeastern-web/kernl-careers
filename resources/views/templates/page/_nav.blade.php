<div class="hidden--up@t ta--c pb--1 np">
  <button class="btn bc--gray-600" data-toggle="nav" data-swap-target="#nav-interior">
    <i data-feather="align-left"></i> Page Menu
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
