<!doctype html>
<html @php(language_attributes()) @php(body_class())>
  @include('layouts.chrome-head')
  <body>
    {!! \Kernl\Utility::getTagManager(\WP_ENV) !!}
    @php(do_action('get_header'))
    @include('layouts.chrome-header')

    <main role="document">
      @yield('content')
    </main>

    @php(do_action('get_footer'))
    @include('layouts.chrome-footer')
    @php(wp_footer())

    {!! \Kernl\Utility::getGoogleAnalytics(\WP_ENV, get_field('txt_analytics','option')) !!}
  </body>
</html>
