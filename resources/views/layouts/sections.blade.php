@php($option = (is_home() ? 'option' : ''))

@if(is_single() && get_the_content())
  {{ the_content() }}
@endif

@php($i_section = 1)
@while((have_rows('lay_sections', $option)))
  @php(the_row())

  {{-- condition blocks if banner inside or outside container --}}
  @if(get_sub_field('bool_banner', $option) && !get_sub_field('bool_banner_contain', $option))<div {{ Kernl\Layout::structure('banner', ['class' => 'banner banner--outside']) }} data-acf="bool_banner">@endif

    <section {{ Kernl\Layout::structure('section', ['class' => 'l']) }} id="section-{{ $i_section }}"
      data-section="{{ $i_section }}" data-acf="txt_class|etc">

      @if(get_sub_field('bool_banner', $option) && get_sub_field('bool_banner_contain', $option))<div {{ Kernl\Layout::structure('banner', ['class' => 'banner banner--inside']) }} data-acf="bool_banner">@endif

        @include('layouts.sections-grid')

      @if(get_sub_field('bool_banner', $option) && get_sub_field('bool_banner_contain', $option))</div>@endif
    </section>

  @if(get_sub_field('bool_banner', $option) && !get_sub_field('bool_banner_contain', $option))</div>@endif

  @php($i_section++)
@endwhile
