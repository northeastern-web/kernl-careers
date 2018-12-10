<?php /** (Hero) */ ?>

@php
  $trending = new \WP_Query([
    'posts_per_page' => 4,
    'tax_query' => [
      ['taxonomy' => 'collection', 'field' => 'name', 'terms' => 'featured']
    ]
  ]);
  $trending2 = new \WP_Query([
    'posts_per_page' => 4,
    'offset' => 4,
    'tax_query' => [
      ['taxonomy' => 'collection', 'field' => 'name', 'terms' => 'featured']
    ]
  ]);
@endphp

<div class="__header">
  <div class="card bg--black mb--0">
    <div class="__body">
      <h2 class="fs--d2 d--inline">Find Tools for Your Career</h2>
      <a class="btn bg--red --sm f--r" href="#">Personalize</a>
      <form action="" method="GET" class="my--1">
        <div class="form__enclosed --search --dark bg--gray-500 my--2">
          <label class="sr--only">Search by keyword</label>
          <input class="fs--sm" name="s" type="text" placeholder="Search by keyword" autocomplete="off" aria-label="Search" />
          <button class="btn bg--none bc--black" type="submit">Go</button>
        </div>
      </form>

      <h3 class="fs--root --popular">Trending Resources</h3>
      <div class="row">
        <div class="col w--50@d">
          <ul class="ls--none fs--xs ta--c ta--l@d ml--0">
            @while ($trending->have_posts())
              @php($trending->the_post())
              <li><a href="{{ the_permalink() }}">{{ the_title() }}</a></li>
            @endwhile @php(wp_reset_postdata())
          </ul>
        </div>
        <div class="col w--50@d">
          <ul class="ls--none fs--xs ta--c ta--l@d">
            @while ($trending2->have_posts())
              @php($trending2->the_post())
              <li><a href="{{ the_permalink() }}">{{ the_title() }}</a></li>
            @endwhile @php(wp_reset_postdata())
          </ul>
        </div>
      </div>
      <div class="bwa--0 bwt--2 bc--red mt--1 pt--1">
        <a href="{{ get_permalink(137) }}"><span class="tt--caps">Employers</span>: Hire, train and onboard talent</a>
      </div>
    </div>
  </div>
</div>
