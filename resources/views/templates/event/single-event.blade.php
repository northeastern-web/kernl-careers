@while(have_posts()) @php(the_post())
  <div class="row">
    <div class="col w--1/2@d">
      {{ tribe_the_notices() }}
      {!! the_content() !!}

      @if(tribe_get_event_website_url())
        <p><a target="_blank" class="btn --right bg--black" href="<?= tribe_get_event_website_url(); ?>">Register <i data-feather="arrow-right"></i></a></p>
      @endif
    </div>
    <div class="col w--1/4@d">
      <div class="card h--auto mb--1">
        <div class="__body pb--1">
          <div class="__title mb--1">{!! \Kernl\Utility::getTribeDate(get_the_id()) !!}</div>
          <div class="mb--1"><a class="btn --sm" href="?ical"><i data-feather="calendar"></i> iCal</a></div>
          <p>{!! '<b>' . tribe_get_venue() . '</b>' . (tribe_address_exists() ? '<br>'. tribe_get_full_address() : '') !!}</p>
          {!! tribe_get_event_categories(null, ['label_before' => '<div class="tt--u">', 'wrap_before' => '<ul class="fs--sm">']) !!}
        </div>
      </div>
    </div>
  </div>
@endwhile
