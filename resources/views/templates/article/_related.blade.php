@if(get_field('rel_related'))
  <aside class="related mt--3">
    <header class="__header --archive" role="banner">
      <h2 class="__title fw--700 fs--d2 tc--gold">Related Articles</h2>
    </header>
    <div class="list-group --indent w--100 fs--sm">
      @php
        global $post;
      @endphp
      @foreach (get_field('rel_related') as $post)
        @php(setup_postdata($post))
        @include('templates.article.list-item', [
          'excerpt_class' => 'tc--gray-600 fs--xs pr--1',
          'hide_excerpt' => false
          ])
      @endforeach
    </div>
  </aside>
@endif
