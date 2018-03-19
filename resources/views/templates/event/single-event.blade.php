@php
  $events_label_singular = tribe_get_event_label_singular();
  $events_label_plural = tribe_get_event_label_plural();

  $start_date = tribe_get_start_date(get_the_id(), false, 'M j');
  $start_time = tribe_get_start_date(get_the_id(), false, 'g:i a');
  $end_date = tribe_get_end_date(get_the_id(), false, 'M j');
  $end_time = tribe_get_end_date(get_the_id(), false, 'g:i a');

  if (tribe_event_is_multiday()) {
    $event_date = $start_date .' &mdash; '. $end_date;
  } elseif (tribe_event_is_all_day()) {
    $event_date = $start_date .' &bull; All Day';
  } else {
    $event_date = $start_date .' &bull; '. $start_time .' - '. $end_time;
  }
@endphp

@while(have_posts()) @php(the_post())
  <div class="row">
    <div class="col --12@xs --1@md --1-offset@lg ta--c">
      @include('templates.single._sharing')
    </div>

    <div class="col --12@xs --10@md --8@lg">
      {{ tribe_the_notices() }}
      @include('templates.section')

      <div class="mb-2@xs fs--sm">
        {{ tribe_get_venue() . (tribe_address_exists() ? ', '. tribe_get_full_address() : '') }}
      </div>

      @if(tribe_get_event_website_url())
        <p><a target="_blank" class="btn --xs" href="<?= tribe_get_event_website_url(); ?>">Event Website</a></p>
      @endif
    </div>
  </div>
@endwhile
