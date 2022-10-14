<article class="card --profile" aria-label="{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}">
  <a class="__link" href="#" data-toggle="modal" data-target="#modal_profile-{{ get_the_ID() }}">
    <div class="__graphic ar--1x1">
      @if(get_field('med_headshot'))
        <img class="__graphic__img" src="{{ get_field('med_headshot')['url'] }}" alt="">
      @endif
    </div>

    <div class="__body py--1">
      <h3 class="__title">{{ the_field('txt_fname') }} {{ the_field('txt_lname') }}</h3>
      @if(get_field('txt_title'))
        <div class="__subtitle">{{ the_field('txt_title') }}</div>
      @endif
    </div>

    <div class="__footer">
      <div class="__column"><i data-feather="more-vertical" class="--sm"></i>View Profile</div>
    </div>
  </a>
</article>

@php
  include \App\template_path(locate_template('views/templates/profile/modal.blade.php'));
@endphp
