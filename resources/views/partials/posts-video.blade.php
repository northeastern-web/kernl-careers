@if (get_post_format() == 'video')
  <div class="l__video g-row">
    <div class="g-12@md m--b-2@xs">
      <div class="l__video_embed embed embed--16by9 o--x-3@xs">
          <iframe src="{{ the_field('url_video') }}?title=0&byline=0&portrait=0&color=CC0000" class="embed__item"></iframe>
      </div>
      <div class="l__video__excerpt">
        {{ the_field('wys_description') }}
      </div>
    </div>
  </div>
@endif
