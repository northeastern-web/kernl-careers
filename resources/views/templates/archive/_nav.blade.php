@php
  $cat_current = get_category(get_query_var('cat'));
  $cat_parent = get_category($cat_current->category_parent);
  $cat_current_top = (!is_wp_error($cat_parent) ? $cat_parent : $cat_current);
  $cat_current_children = get_categories([
      'orderby' => 'name',
      'order'   => 'ASC',
      'parent'  => $cat_current_top->term_id
  ]);
@endphp

<nav class="nav --tabbed --buttons fs--sm pb--2@xs pb--4@md">
  @if($cat_current_children)
    <ul class="__list">
      <li class="__item">
        <a class="{{ ($cat_current == $cat_current_top) ? '__link --active' : '__link' }}" href="{{ get_category_link($cat_current_top) }}">View All</a>
      </li>

      @foreach($cat_current_children as $cat_child)
        <li class="__item">
          <a class="{{ ($cat_current == $cat_child) ? '__link --active' : '__link' }}" href="{{ get_category_link($cat_child) }}">
            {{ $cat_child->name }}
          </a>
        </li>
      @endforeach
    </ul>
  @endif
</nav>
