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
  <div class="col">
    <h3 class="fs--root tt--caps ta--c tc--white w--100">
      Important Resources For:
    </h3>
  </div>
  <div class="col w--1/3@d">
    <div class="card bg--black">
      <div class="__body">
        <h2 class="fs--d3 fw--300 ta--l tc--gold">Students</h2>
        <ul class="ls--none fs--xs ta--c ta--l@d">
          @php($count = 0)
          @while ($count < 4 && $trending->have_posts())
            @php($trending->the_post())
              <li><a class="tc--white" href="{{ the_permalink() }}">{{ the_title() }}</a></li>
            @php($count++)
          @endwhile @php(wp_reset_postdata())
        </ul>
      </div>
    </div>
  </div>
  <div class="col w--1/3@d">
    <div class="card bg--black">
      <div class="__body">
        <h2 class="fs--d3 fw--300 ta--l tc--gold">Employers</h2>
        <ul class="ls--none fs--xs ta--c ta--l@d">
          @php($count = 0)
          @while ($count < 4 && $trending->have_posts())
            @php($trending->the_post())
              <li><a class="tc--white" href="{{ the_permalink() }}">{{ the_title() }}</a></li>
            @php($count++)
          @endwhile @php(wp_reset_postdata())
        </ul>
      </div>
    </div>
  </div>
  <div class="col w--1/3@d">
    <div class="card bg--black">
      <div class="__body">
        <h2 class="fs--d3 fw--300 ta--l tc--gold">Alumni</h2>
        <ul class="ls--none fs--xs ta--c ta--l@d">
          @php($count = 0)
          @while ($count < 4 && $trending->have_posts())
            @php($trending->the_post())
              <li><a class="tc--white" href="{{ the_permalink() }}">{{ the_title() }}</a></li>
            @php($count++)
          @endwhile @php(wp_reset_postdata())
        </ul>
      </div>
    </div>
  </div>
</div>
