@while(have_posts()) @php(the_post())
  <div class="row">

    <div class="col w--8@t w--3/4@d">
      {{ tribe_the_notices() }}
      @include('templates._section')

      <div class="mb--2 fs--sm">
        {!! '<b>' . tribe_get_venue() . '</b>' . (tribe_address_exists() ? '<br>'. tribe_get_full_address() : '') !!}
      </div>

      @if(tribe_get_event_website_url())
        <p><a target="_blank" class="btn --sm" href="<?= tribe_get_event_website_url(); ?>">Event Website</a></p>
      @endif
    </div>
    <div class="col ta--c">
      @include('templates.single._sharing')
    </div>
  </div>
@endwhile
