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

@php
  include \App\template_path(locate_template('views/templates/profile/modal.blade.php'));
@endphp
