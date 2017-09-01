@if(get_sub_field('bool_header'))
  <header class="__header">
    @if(get_sub_field('txt_pretitle'))
      <div class="__pretitle">{{ get_sub_field('txt_pretitle') }}</div>
    @endif

    @if(get_sub_field('txt_title'))
      <h1 class="__title">{{ get_sub_field('txt_title') }}</h1>
    @endif

    @if(get_sub_field('txt_subtitle'))
      <div class="__subtitle">{{ get_sub_field('txt_subtitle') }}</div>
    @endif
  </header>
@endif
