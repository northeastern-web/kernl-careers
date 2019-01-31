@php
  $option = (is_singular() ? get_the_ID() : get_queried_object());
  $layout = new Kernl\Layout($option);
  $pretitle = '<nav class="breadcrumb +icon +chevron mb--0h fs--sm">';
  foreach (\Kernl\Site::getTaxTerms(get_the_ID(), 'group') as $term) {
    if ($term['ancestors']) {
      foreach (array_reverse($term['ancestors']) as $ancestor) {
        $pretitle .= '<a class="tc--gray-700" href="' . get_term_link($ancestor->term_id, 'group') . '">' . $ancestor->name . '</a>';
      }
    }

    $pretitle .= '<a class="tc--gray-700" href="' . get_term_link($term['item']->term_id, 'group') . '">' . $term['item']->name . '</a>';
  }
  $pretitle .= '</nav>';

  $args = [
    'title' => App::title(),
    'pretitle' => $pretitle,
    'subtitle' => '',
    'nav_parent' => true,
    'class' => (isset($class) ? $class : '')
  ];
@endphp

{!! $layout->displayHeader($args) !!}
