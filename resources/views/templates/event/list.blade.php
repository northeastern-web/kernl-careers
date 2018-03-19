@include('templates.event.modules.bar')
@include('templates.event.list.content')

<div id="tribe-events-footer">
  @php(do_action('tribe_events_before_footer_nav'))
    @include('templates.event.list.nav-footer')
  @php(do_action('tribe_events_after_footer_nav'))
</div>
