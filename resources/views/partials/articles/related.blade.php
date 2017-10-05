@if(get_field('rel_related'))
<aside>
  <h6 class="fw--700">Related Articles</h6>
  <ul class="list-group --sm --striped">
    @foreach (get_field('rel_related') as $article)
      <li><a href="{{ get_permalink($article->ID) }}">{{ $article->post_title }}</a></li>
    @endforeach
  </ul>
</aside>
@endif
