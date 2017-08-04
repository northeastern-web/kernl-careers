@php($i_component = 1)
@php($j_component = 0)

@while((have_rows('lay_content')))
  @php(the_row())

  @if(get_row_layout() == 'lay_toggle')
    <div id="component_{{ $i_component }}"
        class="l__copy {{ get_sub_field('opt_type') }}"
        data-acf="lay_toggle|opt_type">
      @while((have_rows('lay_items')))
        @php(the_row())
        <div class="toggle-wrap" data-acf="lay_items">
          <div
            @if($j_component == 0)
              class="txt_title"
            @else
              class="txt_title collapsed"
            @endif
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
            @if($j_component == 0)
              class="collapse show"
            @else
              class="collapse"
            @endif
            id="toggle_{{ $j_component }}"
            data-acf="txt_copy">
              <div class="txt_copy">
              {!! the_sub_field('txt_copy') !!}
              </div>
          </div>
        </div>
        @php($j_component++)
      @endwhile
    </div>

  @else
    <div class="l__copy" data-acf="txt_copy">
      {!! the_sub_field('txt_copy') !!}
    </div>

  @endif
  @php($i_component++)
@endwhile
