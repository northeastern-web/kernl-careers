<?php /** (Audience Feature) */ ?>

@php
  $segment = (isset($_GET['college']) ? ['taxonomy' => 'collection', 'field' => 'name', 'terms' => sanitize_text_field($_GET['college'])] : false);
  $trending = new \WP_Query([
    'posts_per_page' => 10,
    'tax_query' => [
      ['taxonomy' => 'collection', 'field' => 'name', 'terms' => 'featured'],
      $segment
    ]
  ]);
@endphp

<div class="row audience-feature">
{{--   <div class="col">
    <h3 class="fs--root tt--caps ta--c tc--white w--100">
      Important Resources For:
    </h3>
  </div> --}}
  <div class="col w--1/3@t">
    <div class="card bg--black">
      <div class="__body pt--1h@t">
        <h2 class="fs--d2 ta--l tc--gold">Students</h2>
        <ul class="ls--none fs--xs">
          <li><a class="tc--gray-50" href="#">Engage in co-op</a></li>
          <li><a class="tc--gray-50" href="#">Cover letters, resumes and CVs</a></li>
          <li><a class="tc--gray-50" href="#">Explore career guides</a></li>
          <li><a class="tc--gray-50" href="#">Access NUcareers</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col w--1/3@t">
    <div class="card bg--black">
      <div class="__body pt--1h@t">
        <h2 class="fs--d2 ta--l tc--gold">Employers</h2>
        <ul class="ls--none fs--xs">
          <li><a class="tc--gray-50" href="#">Hire a student</a></li>
          <li><a class="tc--gray-50" href="#">View employer handbook</a></li>
          <li><a class="tc--gray-50" href="#">Post a job</a></li>
          <li><a class="tc--gray-50" href="#">Recruiting activities</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="col w--1/3@t">
    <div class="card bg--black">
      <div class="__body pt--1h@t">
        <h2 class="fs--d2 ta--l tc--gold">Alumni</h2>
        <ul class="ls--none fs--xs">
          <li><a class="tc--gray-50" href="#">Find a job</a></li>
          <li><a class="tc--gray-50" href="#">Change careers</a></li>
          <li><a class="tc--gray-50" href="#">Graduate school advising</a></li>
          <li><a class="tc--gray-50" href="#">Husky nation</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
