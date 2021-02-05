@php($option = (is_home() ? 'option' : get_the_ID()))
@php($layout = new \Kernl\Lib\Layout($option))

{!! $layout->displaySections() !!}
