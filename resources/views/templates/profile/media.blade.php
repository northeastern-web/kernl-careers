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

<div class="modal --grid fade" id="modal_profile-{{ get_the_ID() }}" tabindex="-1" role="dialog" aria-labelledby="modal_contact_label">
  <div class="__dialog" role="document">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <i class="__icon" data-feather="x-circle"></i>
    </button>
    <div class="__content">
      <div class="row">
        <div class="col --4@md">
          @if(get_field('med_headshot'))
            <div class="__graphic">
              <img class="__graphic__img" src="{{ get_field('med_headshot')['url'] }}" alt="{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}">
            </div>
          @endif
        </div>
        <div class="col --8@md">
          <div class="__header">
            <h3 class="__title">{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h3>
            <p class="__subtitle">{{ the_field('txt_title') }}</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col --4@md">
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
        </div>
        <div class="col --8@md">
          <div class="__body">
            {{ the_content() }}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
