@if(get_field('rel_related'))
  <aside class="related">
    <header class="__header --archive" role="banner">
      <h2 class="__title fw--300">Related Articles</h2>
    </header>
    <div class="list-group --indent w--100">
      @foreach (get_field('rel_related') as $article)
        <a class="__item" href="{{ get_permalink($article->ID) }}">
          <h6 class="mb--0">
            {{ $article->post_title }}
          </h6>
        </a>
      @endforeach
    </div>
  </aside>
@endif
