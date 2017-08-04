@if(get_sub_field('bool_header'))
  <header class="l__header">
    @if(get_sub_field('txt_pretitle'))
      <div class="l__pretitle">{{ get_sub_field('txt_pretitle') }}</div>
    @endif

    @if(get_sub_field('txt_title'))
      <h1 class="l__title">{{ get_sub_field('txt_title') }}</h1>
    @endif

    @if(get_sub_field('txt_subtitle'))
      <div class="l__subtitle">{{ get_sub_field('txt_subtitle') }}</div>
    @endif
  </header>
@endif
