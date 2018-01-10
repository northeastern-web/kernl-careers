<div class="media">
  <a class="__link" href="#" data-toggle="modal" data-target="#modal_profile-{{ get_the_ID() }}">
    @if(get_field('med_headshot'))
      <div class="__graphic">
        <img class="__graphic__img" src="{{ get_field('med_headshot')['url'] }}" alt="{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}">
      </div>
    @endif

    <div class="__body">
      <h4 class="__title">{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h4>

      @if(get_field('txt_title'))
        <div><i>{{ the_field('txt_title') }}</i></div>
      @endif

      @if(get_field('txt_email'))
        <div class="fs--sm">{{ the_field('txt_email') }}</div>
      @endif
    </div>
  </a>
</div>

{{-- @include('components.modal-profile') --}}

<div class="modal --contact fade" id="modal_profile-{{ get_the_ID() }}" tabindex="-1" role="dialog" aria-labelledby="modal_contact_label">
  <div class="modal-dialog __dialog" role="document">
    <div class="__content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      <div class="row">
        <div class="col --12@xs --4@md">
          @if(get_field('med_headshot'))
            <div class="__image__wrapper">
              <img class="__image" src="{{ get_field('med_headshot')['url'] }}" alt="{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}">
            </div>
          @endif
          <div class="__body">
            <div class="--contact__info">
              <ul class="list--unstyled">
                @if(get_field('txt_email'))
                  <li><a href="mailto:{{ the_field('txt_email') }}">{{ the_field('txt_email') }}</a></li>
                @endif
                @if(get_field('txt_phone'))
                  <li><a href="tel:{{ the_field('txt_phone') }}">{{ the_field('txt_phone') }}</a></li>
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col --12@xs --8@md">
          <div class="__body --contact__bio">
            <h3 class="--contact__name">{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h3>
            <p class="--contact__title">{{ the_field('txt_title') }}</p>
            {{ the_content() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
