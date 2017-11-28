<?php /** (Dates) */ ?>

@php
  global $query_string;
  $display = 'D, M d';
  $date_count = 0;
@endphp

<h3 class="fs--root tt--caps ta--c mb--1@xs mb--2@md --popular">Important Dates</h3>
<div class="row">
  <div class="overflow">
  @if(have_rows('lay_calendar', $query_string['id']))
    @while(have_rows('lay_calendar', $query_string['id']))
      @php
        the_row();
        // date manipulation
        $date = DateTime::createFromFormat('Ymd', get_sub_field('date'));
        $today = date($display);

        // audience
        $audiences = array_reduce(get_sub_field('rel_audience'), function($carry, $item) {
          $carry .= $item->name .', ';
          return $carry;
        });
      @endphp

      @if($date->format('Ymd') >= date('Ymd') && $date_count <= 11 )
        <div class="col --2@md --12@xs">
          <article class="card --tile +noshadow">
            <div class="__date fs--xs tt--caps fw--700">{{ $date->format($display) }}</div>
            <div class="__body pl--0@xs pt--0@xs">
              <div class="__excerpt">
                <h2 class="__title">{{ get_sub_field('txt_title') }}</h2>
                <p class="fs--sm">
                  {{ (rtrim($audiences, ', ') == 'Students') ? 'All Students' : rtrim($audiences, ', ') }}
                </p>
              </div>
            </div>
          </article>
        </div>
        @php($date_count++)
      @endif
    @endwhile
  @endif
  </div>
</div>

<p class="ta--c fs--sm mt--1@xs mb--0@xs">
  <a class="btn" href="{{ get_permalink($query_string['id']) }}">Current Calendar</a>
</p>
<p class="ta--c fs--xs text--gray-600 mt--1@xs mb--0@xs"><i>* See complete calendar for semester-specific details.</i></p>

