@php
  $option = (is_singular() ? get_the_ID() : get_queried_object());
  $layout = new Kernl\Layout($option);
  $args = [
    'title' => App::title(),
    'pretitle' => App::pretitle(),
    'subtitle' => App::subtitle()
  ];
@endphp

{!! $layout->displayHeader($args) !!}
