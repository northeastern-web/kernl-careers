@php
  $option = (is_singular() ? get_the_ID() : get_queried_object());
  $layout = new Kernl\Layout($option);
@endphp

{!! $layout->displayHeader() !!}
