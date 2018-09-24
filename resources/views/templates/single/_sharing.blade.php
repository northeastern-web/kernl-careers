@php
  function url_elements() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    return urlencode($protocol.$url);
  }
  define( 'SHARE_URL', url_elements() );
@endphp

<ul class="share flex--middle">
  <li>
    <a href="javascript:PODShare('facebook', '{{ SHARE_URL }}', 555, 350)">
      <i class="__icon --thin" data-feather="facebook"></i><span class="sr">Share on Facebook</span>
    </a>
    </a>
  </li>
  <li>
    <a href="javascript:PODShare('twitter', '{{ SHARE_URL }}', 520, 442)">
      <i class="__icon --thin" data-feather="twitter"></i><span class="sr">Share on Twitter</span>
    </a>
  </li>
  <li>
    <a href="javascript:PODShare('linkedin', '{{ SHARE_URL }}', 550, 442)">
      <i class="__icon --thin" data-feather="briefcase"></i><span class="sr">Share on LinkedIn</span>
    </a>
  </li>
  <li>
    <a id="podshare_email" href="javascript:PODShare('email', '{{ SHARE_URL }}', 100, 100)">
      <i class="__icon --thin" data-feather="mail"></i><span class="sr">Email this</span>
    </a>
  </li>
</ul>
