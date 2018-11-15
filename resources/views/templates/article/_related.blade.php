@if(get_field('related_articles'))
  <aside class="card bs--none related">
    <div class="__header pa--1 bg--gray-200 tt--caps">
      <div class="__column">Related Articles</div>
    </div>
    <div class="__body pt--3 px--0 pb--0 bg--gray-100">
      <div class="list-group mb--0">
        @foreach (get_field('related_articles') as $article)
          <a class="__item px--1" href="{{ get_permalink($article->ID) }}">{{ $article->post_title }}</a>
        @endforeach
      </div>
    </div>
  </aside>
@endif
