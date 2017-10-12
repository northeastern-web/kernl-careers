@if(get_field('rel_related'))
<aside class="card --outline --extend" style="border-color: #d0d0d0;">
  <div class="__header fw--700 bg--gray-100">
    <div class="__column">Related Articles</div>
  </div>
  <div class="__body py--0@xs">
    <div class="__excerpt fs--xs">
      <div class="list-group --sm">
        @foreach (get_field('rel_related') as $article)
          <a href="{{ get_permalink($article->ID) }}">{{ $article->post_title }}</a>
        @endforeach
      </div>
    </div>
  </div>
</aside>
@endif
