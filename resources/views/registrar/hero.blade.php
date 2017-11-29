<?php /** (Hero) */ ?>

<div class="row">
  <div class="col --12@xs --10@sm --offset-1@sm --8@md --offset-2@md --6@xl --offset-3@xl">
    <form action="" method="GET">
      <div class="__group __search">
        <input class="__control" name="s" type="text" placeholder="Search by keyword" autocomplete="off" aria-label="Search" />
        <button class="btn btn--primary" type="submit">Go</button>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col --12@xs --10@sm --offset-1@sm --6@md --offset-3@md --4@lg --offset-4@lg">
    <h3 class="ta--c tt--caps fs--root --popular">Popular Articles</h3>
  </div>
</div>

<div class="row">
  <div class="col --12@xs --10@sm --offset-1@sm --8@md --offset-2@md --6@xl --offset-3@xl">
    <ul class="--popular">
      @while(have_rows('lay_trending','option'))
        @php(the_row())
        <li>
          <a href="{{ (get_sub_field('opt_type') == 'Article' ?
            get_permalink(get_sub_field('rel_article')->ID) :
            get_sub_field('txt_url')) }}">{{ get_sub_field('txt_title') }}</a>
        </li>
      @endwhile
    </ul>
  </div>
</div>
