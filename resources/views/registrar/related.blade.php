@if(get_field('rel_related'))
  <aside class="card +noshadow --extend ">
    <div class="__header bg--gray-200 tt--caps">
      <div class="__column">Related Articles</div>
    </div>
    <div class="__body py--0@xs bg--gray-100">
      <div class="__excerpt">
        <div class="list-group">
          @foreach (get_field('rel_related') as $article)
            <a href="{{ get_permalink($article->ID) }}">{{ $article->post_title }}</a>
          @endforeach
        </div>
      </div>
    </div>
  </aside>
@endif
