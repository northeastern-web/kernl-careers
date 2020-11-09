<!doctype html>
<html @php(language_attributes()) @php(body_class()) id="html">
  @include('chrome._head')
  <body {!! (\Kernl\Lib\Utility::getGlobalContain()) !!}>

    @php(wp_body_open())

    @php(do_action('get_header'))

    @include('chrome._masthead')

    <main id="main_content" role="main">
      @yield('content')
      {{ (is_singular() ? edit_post_link('<i data-feather="edit"></i></span><span class="edit-text">Edit ' . (is_single() ? 'Post' : 'Page') . '', '', '', 0, 'post-edit-link btn --sm bg--blue') : '') }}
    </main>

    @php(do_action('get_footer'))

    @include('chrome._footer')

    @include('templates.search._modal')

    @php(wp_footer())
  </body>
</html>
