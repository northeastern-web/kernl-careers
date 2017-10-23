@php($i_component = 1)
@php($j_component = 0)

@while((have_rows('lay_content')))
  @php(the_row())

  @if(get_row_layout() == 'lay_accordion')
    <div
      id="component_{{ $i_component }}"
      class="accordion {{ strtolower(get_sub_field('opt_type')) }} {{ the_sub_field('txt_class') }}"
      data-acf="lay_toggle|opt_type">

      @while((have_rows('lay_items')))
        @php(the_row())
        <div class="__item" data-acf="lay_items">
          <div class="__title collapsed mb--0@xs"
            data-toggle="collapse"
            data-parent="#component_{{ $i_component }}"
            data-target="#toggle_{{ $j_component }}"
            aria-expanded="false"
            data-acf="txt_title">
              {!! the_sub_field('txt_title') !!}
          </div>

          <div class="collapse" id="toggle_{{ $j_component }}" data-acf="txt_copy">
              <div class="__copy">
                {!! the_sub_field('txt_copy') !!}
              </div>
          </div>
        </div>

        @php($j_component++)
      @endwhile
    </div>

  @else
    <div class="__copy" data-acf="txt_copy">
      {!! the_sub_field('txt_copy') !!}
    </div>

  @endif
  @php($i_component++)
@endwhile
