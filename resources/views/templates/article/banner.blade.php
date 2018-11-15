@php
  $option = (is_singular() ? get_the_ID() : get_queried_object());
  $layout = new Kernl\Layout($option);
  $pretitle = '<nav class="breadcrumb +icon +chevron mb--0h fs--sm">';
  foreach (\App\Site::getTaxHierarchy(get_the_ID(), 'group') as $term) {
    $pretitle .= '<a class="tc--gray-700" href="' . get_term_link($term->term_id, 'group') . '">' . $term->name . '</a>';
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
