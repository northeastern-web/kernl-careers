@if(get_field('rel_related'))
  <article class="card --scroll +list-group">
    <header class="__header">
      <div class="__column">
        <div>Related Articles</div>
      </div>
    </header>
    <div class="__body">
      <div class="__excerpt">
        <ul class="list-group --sm">
          @foreach (get_field('rel_related') as $article)
            <li><a href="{{ get_permalink($article->ID) }}">{{ $article->post_title }}</a></li>
          @endforeach
        </ul>
      </div>
    </div>
  </article>
@endif
