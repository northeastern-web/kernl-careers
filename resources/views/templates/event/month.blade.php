@php(do_action('tribe_events_before_template'))

@include('templates.event.modules.bar')
@include('templates.event.month.content')

@php(do_action('tribe_events_after_template'))
