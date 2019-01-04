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

          @if(tribe_has_venue())
            <div>
              <i>{!! tribe_get_venue() !!}</i>
              @if(tribe_address_exists())
                <div>
                  {{ tribe_get_address() }}, {{ tribe_get_city() }}, {{ tribe_get_region() }}
                </div>
              @endif
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endwhile
