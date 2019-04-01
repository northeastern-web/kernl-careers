@if(get_field('bool_chrome_footer', 'option'))
  <footer role="contentinfo">
    <div id="nu__global-footer">
      {!! \Kernl\Utility::getBrandChrome('footer') !!}
    </div>
  </footer>
@else
  {!! \Kernl\Utility::getFooter() !!}
@endif
