@php($option = (is_home() ? 'option' : get_the_ID()))

@php($layout = new Kernl\Layout($option))
{!! $layout->displaySections() !!}
