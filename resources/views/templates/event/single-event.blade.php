@php
$start_date = tribe_get_start_date(get_the_id(), false, 'F j, Y');
$start_time = tribe_get_start_date(get_the_id(), false, 'g:i a');
$end_date = tribe_get_end_date(get_the_id(), false, 'F j, Y');
$end_time = tribe_get_end_date(get_the_id(), false, 'g:i a');

if (tribe_event_is_multiday()) {
  $event_date = $start_date .' &mdash; '. $end_date;
} elseif (tribe_event_is_all_day()) {
  $event_date = $start_date .'<br>All Day';
} else {
  $event_date = $start_date .'<br>'. $start_time .' - '. $end_time;
}
@endphp

@while(have_posts()) @php(the_post())
  <div class="row">
    <div class="col w--1/4@d">
      <div class="card h--auto mb--1">
        <div class="__body pb--1">
          <div class="__title mb--1">{!! $event_date !!}</div>
          <p>{!! '<b>' . tribe_get_venue() . '</b>' . (tribe_address_exists() ? '<br>'. tribe_get_full_address() : '') !!}</p>
          <div class="mt--2">@include('templates.single._sharing')</div>
        </div>
      </div>
    </div>

    <div class="col w--1/2@d">
      {{ tribe_the_notices() }}
      @include('templates._section')

      @if(tribe_get_event_website_url())
        <p><a target="_blank" class="btn --right bg--black" href="<?= tribe_get_event_website_url(); ?>">Register <i data-feather="arrow-right"></i></a></p>
      @endif
    </div>
  </div>
@endwhile
