@php
  function url_elements() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $url = "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
    return urlencode($protocol.$url);
  }
  define( 'SHARE_URL', url_elements() );
@endphp

<ul class="share-buttons">
  <li>
    <a href="javascript:PODShare('facebook', '<?php echo SHARE_URL; ?>', 555, 350)">
      <span class="__icon --thin"><i data-feather="facebook"></i></span>
    </a>
    </a>
  </li>
  <li>
    <a href="javascript:PODShare('twitter', '<?php echo SHARE_URL; ?>', 520, 442)">
      <span class="__icon --thin"><i data-feather="twitter"></i></span>
    </a>
  </li>
  <li>
    <a href="javascript:PODShare('linkedin', '<?php echo SHARE_URL; ?>', 550, 442)">
      <span class="__icon --thin"><i data-feather="briefcase"></i></span>
    </a>
  </li>
  <li>
    <a id="podshare_email" href="javascript:PODShare('email', '<?php echo SHARE_URL; ?>', 100, 100)">
      <span class="__icon --thin"><i data-feather="mail"></i></span>
    </a>
  </li>
</ul>
