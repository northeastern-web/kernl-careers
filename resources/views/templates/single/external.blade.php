<?php if (get_post_format() == 'link') : ?>
  <div class="alert m--t-2@xs">
    <a href="{{ the_field('url_external') }}" class="__link">
      <div class="__body">
        <div class="__icon"><i class="ion-log-in"></i></div>
        Originally Published at
        <i>{{ (get_field('bool_nunews') ? 'News@Northeastern' : get_field('text_source')) }}</i>
        {{ (get_field('text_author') ? 'by ' .get_field('text_author') : '') }}
      </div>
    </a>
  </div>
<?php endif; ?>
