@php($i_component = 1)
@php($j_component = 0)

@while((have_rows('lay_content')))
  @php(the_row())

  @if(get_row_layout() == 'lay_toggle')
    <div
      id="component_{{ $i_component }}"
      class="{{ strtolower(get_sub_field('opt_type')) }}"
      data-acf="lay_toggle|opt_type">

      @while((have_rows('lay_items')))
        @php(the_row())

        <div class="toggle-wrap" data-acf="lay_items">
          <div
            class="__title {{ ($j_component == 0 ? : 'collapsed') }}"
            data-toggle="collapse"
            data-parent="#component_{{ $i_component }}"
            data-target="#toggle_{{ $j_component }}"
            @if($j_component == 0)
               aria-expanded="true"
            @else
              aria-expanded="false"
            @endif
            data-acf="txt_title">
              {!! the_sub_field('txt_title') !!}
          </div>

          <div
            class="collapse {{ ($j_component == 0 ? 'show' : '') }}"
            id="toggle_{{ $j_component }}"
            data-acf="txt_copy">

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
