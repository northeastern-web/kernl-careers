<!doctype html>
<html @php(language_attributes()) @php(body_class())>
  @include('layouts.chrome.head')
  <body>
    <a class="skip alert" href="#main_content">Skip to main content</a>
    {!! \Kernl\Utility::getTagManager(\WP_ENV) !!}
    @php(do_action('get_header'))
    @include('layouts.chrome.masthead')

    <main id="main_content" role="document">
      @yield('content')
    </main>

    @include('components.modal-search')

    @php(do_action('get_footer'))
    @include('layouts.chrome.footer')
    @php(wp_footer())

    {!! \Kernl\Utility::getGoogleAnalytics(\WP_ENV, get_field('txt_analytics','option')) !!}
  </body>
</html>
