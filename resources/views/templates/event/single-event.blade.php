@while(have_posts()) @php(the_post())
  <div class="row">
    <div class="col w--2/3@t w--3/4@w">
      {{ tribe_the_notices() }}
      @include('templates._section')

      @if(tribe_get_event_website_url())
        <p><a target="_blank" class="btn --sm --right bc--red" href="<?= tribe_get_event_website_url(); ?>">Event Website <i data-feather="arrow-right"></i></a></p>
      @endif
    </div>

    <div class="col w--1/3@t w--1/4@w">
      <div class="card bg--red h--auto mb--1">
        <div class="__body">
          <div class="__title mb--1">{!! tribe_get_start_date(get_the_id(), false, 'F j, Y') !!}</div>
          {!! '<b>' . tribe_get_venue() . '</b>' . (tribe_address_exists() ? '<br>'. tribe_get_full_address() : '') !!}
        </div>
      </div>
    </div>
    <div class="col ta--c">
      @include('templates.single._sharing')
    </div>
  </div>
@endwhile
