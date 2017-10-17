<?php if (get_post_format() == 'link') : ?>
  <div class="alert m--t-2@xs">
    <a href="{{ the_field('url_external') }}" class="alert__link">
      <div class="alert__body">
        <div class="alert__icon"><i class="ion-log-in"></i></div>
        <div class="alert__excerpt">
          Originally Published at
          <i>{{ (get_field('bool_nunews') ? 'News@Northeastern' : get_field('text_source')) }}</i>
          {{ (get_field('text_author') ? 'by ' .get_field('text_author') : '') }}
        </div>
      </div>
    </a>
  </div>
<?php endif; ?>
