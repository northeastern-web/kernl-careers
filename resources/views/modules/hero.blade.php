<?php /** (Hero) */ ?>

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

<div class="__header">
  <div class="card bg--black mb--0">
    <div class="__body">
      <h2 class="fs--d2 d--inline">Design Your Career</h2>
      <div class="f--r">
        @if(!$segment)
          <a class="btn bg--red --sm" href="?college=coe">Personalize</a>
        @else
          <div class="fs--sm mt--0h" href="#">
            <i>Welcome Becky Collet (logout)</i>
          </div>
        @endif
      </div>
      <form action="" method="GET" class="my--1">
        <div class="form__enclosed --search --dark bg--gray-500 my--2">
          <label class="sr--only">Search by keyword</label>
          <input class="fs--sm" name="s" type="text" placeholder="Search by keyword" autocomplete="off" aria-label="Search" />
          <button class="btn bg--none bc--black" type="submit">Go</button>
        </div>
      </form>

      <h3 class="fs--root tt--u">
        @if(!$segment)
          Trending Resources
        @else
          Resources for <i>Becky Collet</i>
        @endif
      </h3>
      <div class="row">
        <div class="col w--100@d">
          <ul class="ls--inline fs--xs ta--c ta--l@d ml--0">
            @while ($trending->have_posts())
              @php($trending->the_post())
              <li class="w--40@d mr--2@d"><a href="{{ the_permalink() }}">{{ the_title() }}</a></li>
            @endwhile @php(wp_reset_postdata())
          </ul>
        </div>
      </div>

      @if(!$segment)
        <div class="bwa--0 bwt--2 bc--red mt--1 pt--1">
          <a href="{{ get_permalink(137) }}"><span class="tt--caps">Employers</span>: Hire, train and onboard talent</a>
        </div>
      @endif
    </div>
  </div>
</div>
