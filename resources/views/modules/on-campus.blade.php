<?php /** (On Campus Employers carousel) */ ?>

@php
$oncampus = new \WP_Query([
  'posts_per_page' => 4,
  'post_type' => 'tribe_events',
  'tax_query' => [
    ['taxonomy' => 'tribe_events_cat', 'field' => 'slug', 'terms' => ['information-session', 'employer-in-residence']]
  ]
]);
@endphp

<div class="carousel">
  @if ($oncampus->have_posts())
    @while ($oncampus->have_posts())
      @php($oncampus->the_post())
      <div class="card mb--0 bg--black">
        <div class="__body">
          @if(has_post_thumbnail())
            <div class="__graphic ar--1x1 mb--1">
              <img class="__graphic__img" alt="{{ the_title() }}"
                src="{{ the_post_thumbnail_url('large') }}"
                data-src="{{ the_post_thumbnail_url('large') }}">
            </div>
          @endif
          <h2 class="__title">{{ the_title() }}</h2>
          <ul class="ls--none fs--xs mb--0">
            <li class="mb--0h">{!! \Kernl\Utility::getTribeDate(get_the_id()) !!}</li>
            <li><b>{!! wp_get_post_terms(get_the_id(), 'tribe_events_cat')[0]->name !!}</b></li>
            @if(tribe_has_venue())
              <li>
                <i>{!! tribe_get_venue() !!}</i>
                @if(tribe_address_exists())
                  <div>
                    {{ tribe_get_address() }}, {{ tribe_get_city() }}, {{ tribe_get_region() }}
                  </div>
                @endif
              </li>
            @endif
          </ul>
          <a class="btn --sm --block bg--white mt--1" href="{{ get_permalink() }}">More Info</a>
        </div>
      </div>
    @endwhile @php(wp_reset_postdata())
  @endif
</div>
