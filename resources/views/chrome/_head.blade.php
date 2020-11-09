<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @php(wp_head())
  <link href="//fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900" rel="stylesheet">

  @if (get_field('bool_chrome_header', 'option') || get_field('bool_chrome_footer', 'option'))
    <link rel="stylesheet" href="{{ \Kernl\Lib\Utility::getBrandChrome('css') }}">
  @endif
</head>
