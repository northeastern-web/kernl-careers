<?php /** (Hero) */ ?>

@php
$companies = [
  [
    $business_full = "Raytheon Corporation",
    $business_short = "Raytheon",
    $private = true,
    $type = "Info Session",
    $location = "Stearns Center, Room G12",
    $date_start = "2019-01-12 11:00:00",
    $date_end = "2019-01-12 13:30:00",
    $link_url = "#",
    $link_label = "Register"
  ],
  [
    $business_full = "Bose Corporation",
    $business_short = "Bose",
    $private = true,
    $type = "Info Session",
    $location = "Stearns Center, Room G12",
    $date_start = "2019-02-10 09:00:00",
    $date_end = "2019-02-10 11:30:00",
    $link_url = "#",
    $link_label = "Learn more"
  ],
  [
    $business_full = "Insight Education Services",
    $business_short = "Insight",
    $private = false,
    $type = "Employer in Residence",
    $location = "Stearns Center, Room G12",
    $date_start = "2019-02-26 10:30:00",
    $date_end = "2019-02-26 13:30:00",
    $link_url = "#",
    $link_label = "Register"
  ]
]
@endphp

<div class="carousel">
  @foreach($companies as $company)
  <div class="card">
    <div class="__body">
      <img class="mb--1" src="app/uploads/{{ $company[1] }}-logo.png" alt="{{ $company[1] }}">
      <h4 class="__title">{{ $company[0] }}</h4>
      <p class="mb--0h">{{ $company[2]  ? 'Private: ' : '' }}{{ $company[3] }}</p>
      <p class="fs--xs">{{ date('F j, Y', strtotime($company[5])) }}<br>
        {{ date('h:i a', strtotime($company[5])) }}{!! $company[6] ? '&ndash;' . date('h:i a', strtotime($company[6])) : '' !!}<br>
        {{ $company[4] }}
      </p>
      {!! $company[7] && $company[8] ? '<a class="btn --sm" href="' . $company[7] . '">' . $company[8] . '</a>' : '' !!}
    </div>
  </div>
  @endforeach
</div>
