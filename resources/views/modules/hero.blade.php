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
    <h2 class="fs--d4 fw--300">How can we help you?</h2>
    <form action="" method="GET" class="my--3 mx--auto">
      <div class="form__enclosed --search">
        <label class="sr--only">Search by keyword</label>
        <input class="fs--sm" name="s" type="text" placeholder="Search by keyword" autocomplete="off" aria-label="Search" />
        <button class="btn" type="submit">Go</button>
      </div>
    </form>
  </div>
</div>
