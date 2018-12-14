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
  <div class="__body">
    <h2 class="fs--d4 fw--300">Design Your Tomorrow Today</h2>
    <form action="" method="GET" class="my--3 w--80@d mx--auto">
      <div class="form__enclosed --search bg--white-alpha">
        <label class="sr--only">Search by keyword</label>
        <input class="fs--sm" name="s" type="text" placeholder="Search by keyword" autocomplete="off" aria-label="Search" />
        <button class="btn bg--none bc--black" type="submit">Go</button>
      </div>
    </form>
  </div>
</div>
