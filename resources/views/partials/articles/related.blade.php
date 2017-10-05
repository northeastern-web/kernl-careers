@if(get_field('rel_related'))
<aside>
  <h5>Related Articles</h5>
  <ul class="list-group">
    @foreach (get_field('rel_related') as $article)
      <li><a href="{{ get_permalink($article->ID) }}">{{ $article->post_title }}</a></li>
    @endforeach
  </ul>
</aside>
@endif
