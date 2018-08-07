@php
  $current = get_category(get_query_var('cat'));
  $parent = get_category($current->category_parent);
  $current_top = (!is_wp_error($parent) ? $parent : $current);
  $current_children = get_categories([
      'orderby' => 'name',
      'order'   => 'ASC',
      'parent'  => $current_top->term_id
  ]);
@endphp

@if($current_children)
  <nav class="nav --tabbed --buttons fs--sm pb--2 pb--4@d">
    <ul class="__list">
      <li class="__item">
        <a class="{{ ($current == $current_top) ? '__link --active' : '__link' }}" href="{{ get_category_link($current_top) }}">View All</a>
      </li>

      @foreach($current_children as $child)
        <li class="__item">
          <a class="{{ ($current == $child) ? '__link --active' : '__link' }}" href="{{ get_category_link($child) }}">
            {{ $child->name }}
          </a>
        </li>
      @endforeach
    </ul>
  </nav>
@endif
