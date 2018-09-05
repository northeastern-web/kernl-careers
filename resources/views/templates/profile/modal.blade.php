<div class="modal" id="modal_profile-{{ get_the_ID() }}" tabindex="-1" role="dialog" aria-labelledby="modal_base_label" aria-hidden="true">
  <div class="__screen" data-dismiss="modal"></div>

  <div class="__content bg--white pa--0 section --nogutters">
    <div class="row">
      <div class="col mx--auto w--2/3@t">
        @if(get_field('med_headshot'))
          <div class="w--1/3@d f--r@d pt--2h@t ml--1@d mb--1@d ta--c">
            <img class="w--100 w--90@t w--100@d" src="{{ get_field('med_headshot')['url'] }}" alt="{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}">
          </div>
        @endif

        <div class="__body">
          <h2>{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h2>

          @if(get_field('txt_title'))
            <h3 class="fs--d1 fs--italic">{{ the_field('txt_title') }}</h3>
          @endif

          <ul class="ls--none fs--sm">
            @if(get_field('txt_email'))
              <li><a class="__link" href="mailto:{{ the_field('txt_email') }}"><i data-feather="mail" class="--sm --thin mr--0h tc--gray-900"></i> {{ the_field('txt_email') }}</a></li>
            @endif
            @if(get_field('txt_phone'))
              <li><a class="__link" href="tel:{{ the_field('txt_phone') }}"><i data-feather="phone" class="--sm --thin mr--0h tc--gray-900"></i> {{ the_field('txt_phone') }}</a></li>
            @endif
          </ul>

          {{ the_content() }}
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="__close" data-dismiss="modal" aria-label="Close">
    <i data-feather="x"></i>
  </button>
</div>
