@php($option = (is_home() ? 'option' : get_the_ID()))

@if(is_single() && get_the_content())
  {!! the_content() !!}
@endif

@php($layout = new Kernl\Layout($option))
{!! $layout->displaySections() !!}
