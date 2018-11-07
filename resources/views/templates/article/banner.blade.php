<header class="section --banner" role="banner">
  <div class="__header">
    <div class="__pretitle">
      <nav class="breadcrumb +icon +chevron mb--0h fs--sm">
        {{-- @foreach (\App\Site::getTaxHierarchy(get_the_ID(), 'group') as $term)
          <a class="tc--gray-700" href="{{ get_term_link($term->term_id, 'group') }}">{!! $term->name !!}</a>
        @endforeach --}}
      </nav>
    </div>
    <h1 class="__title">{{ the_title() }}</h1>
  </div>
</header>
