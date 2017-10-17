@php($i_col = 1)

<div class="row">
  @while((have_rows('lay_grid')))
    @php(the_row())

    <div class="col {{ implode(' ', get_sub_field('opt_column')) }}"
      data-col="{{ $i_col }}" data-acf="opt_column">

      @include('layouts.sections.content')
    </div>

    @php($i_col++)
  @endwhile
</div>
