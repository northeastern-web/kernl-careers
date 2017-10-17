@php($option = (is_home() ? 'option' : ''))

@if(is_single() && get_the_content())
  {!! the_content() !!}
@endif

@php($i_section = 1)
@while((have_rows('lay_sections', $option)))
  @php(the_row())

  {{-- +if not inside container --}}
  @if(get_sub_field('bool_banner') && !get_sub_field('bool_banner_contain'))
  <div {{ Kernl\Layout::structure('banner', ['class' => '']) }} data-acf="bool_banner">
  @endif
  {{-- /if not inside container --}}

    <section {{ Kernl\Layout::structure('section', ['class' => 'section']) }}
      id="section-{{ $i_section }}"
      data-section="{{ $i_section }}" data-acf="txt_class|etc">

      @if(get_sub_field('bool_banner') && get_sub_field('bool_banner_contain'))<div {{ Kernl\Layout::structure('banner', ['class' => 'section']) }} data-acf="bool_banner">@endif

        @include('layouts.sections.header')
        @include('layouts.sections.grid')

      @if(get_sub_field('bool_banner') && get_sub_field('bool_banner_contain'))</div>@endif
    </section>

  {{-- +if inside container --}}
  @if(get_sub_field('bool_banner') && !get_sub_field('bool_banner_contain'))</div>@endif
  {{-- /if inside container --}}

  @php($i_section++)
@endwhile
