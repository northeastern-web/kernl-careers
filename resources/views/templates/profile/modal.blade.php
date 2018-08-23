<div class="modal --base" id="modal_profile-{{ get_the_ID() }}" tabindex="-1" role="dialog" aria-labelledby="modal_base_label" aria-hidden="true">
  <div class="__screen" data-dismiss="modal"></div>
  <div class="__content bg--white pa--0">
    <div class="row">
      <div class="col w--2/3@t ow--1/6@t">
        @if(get_field('med_headshot'))
          <div class="__graphic ar--1x1 w--1/3@d f--r@d">
            <img class="__graphic__img" src="{{ get_field('med_headshot')['url'] }}" alt="{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}">
          </div>
        @endif

        <div class="__body">
          <h3 class="__title">{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h3>

          @if(get_field('txt_title'))
            <div class="__subtitle">{{ the_field('txt_title') }}</div>
          @endif

          <div class="__meta">
            <ul class="ls--none">
              @if(get_field('txt_email'))
                <li><a class="__link" href="mailto:{{ the_field('txt_email') }}">{{ the_field('txt_email') }}</a></li>
              @endif
              @if(get_field('txt_phone'))
                <li><a class="__link" href="tel:{{ the_field('txt_phone') }}">{{ the_field('txt_phone') }}</a></li>
              @endif
            </ul>
          </div>

          {{ the_content() }}
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="__close" data-dismiss="modal" aria-label="Close">
    <i data-feather="x"></i>
  </button>
</div>
