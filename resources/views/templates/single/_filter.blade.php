@php 
  $category = get_the_category();
  $category_parent_id = $category[0]->category_parent; // id of parent category
  $category_parent = get_term( $category_parent_id, 'category' ); // name of parent category
  $cat_id = get_category( get_query_var( 'cat' ) )->cat_ID; // current category id
@endphp

<ul class="fs--sm list--inline category-filter">
  <li>
    <a {{ ($cat_id == $category_parent_id) ? " class='selected' " : ""; }} href="{{ get_category_link( $category_parent_id ); }}">All {!! get_cat_name($category_parent_id) !!}</a>
  </li>

@php
  $categories = get_categories(
    [
      'orderby' => 'name',
      'order'   => 'ASC',
      'parent'  => $category_parent_id
    ]
  );
@endphp

  @foreach ( $categories as $category )
    @if( $cat_id == $category->term_id )
      @php( $selected = 'class="selected" '; )
    @else
      @php( $selected = ' '; )
    
    @php
    $category_link = sprintf( 
      '<a ' . $selected . 'href="%1$s">%2$s</a>',
      esc_url( get_category_link( $category->term_id ) ),
      esc_html( $category->name )
    );
    @endphp

    <li>@php( sprintf( esc_html__( '%s' ), $category_link ); )</li>
  @endforeach

</ul>