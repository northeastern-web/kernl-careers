@if(get_field('rel_related'))
  <aside class="--related mt--3 w--80@d">
    <header class="__header --archive" role="banner">
      <h2 class="__title fs--sm tt--caps tc--gold">Related Content</h2>
    </header>
    <div class="list-group --indent --right w--100">
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

      @php(wp_reset_postdata())
    </div>
  </aside>
@endif
