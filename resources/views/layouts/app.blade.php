<!doctype html>
<html @php(language_attributes()) @php(body_class())>
  @include('layouts.chrome-head')

  <body>
    @php(do_action('get_header'))
    @include('layouts.chrome-header')

    <main role="document">
      @yield('content')
    </main>

    @php(do_action('get_footer'))
    @include('layouts.chrome-footer')

    @php(wp_footer())
  </body>
</html>
