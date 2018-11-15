@php($i = 0)

{{-- https://www.w3.org/TR/wai-aria-practices/#accordion --}}
<div id="accordion" class="accordion my--2 +clear" role="tablist">
  @while((have_rows('lay_tab')))
    @php(the_row())
    <div class="__item">
      <div class="__title"
            data-swap-group="#accordion"
            data-swap-target="#collapse_{{ $i }}"
            id="accordion_{{ $i }}"
            role="tab">
        <div role="button" aria-expanded="false">
          {{ the_sub_field('txt_title') }}
        </div>
      </div>
      <div class="__content" id="collapse_{{ $i }}" role="region" aria-labelledby="accordion_{{ $i }}">
        <div class="__copy">
          @include('templates.article.alert')
          @if(have_rows('lay_actions'))
            <div class="col px--0 w--1/3@t f--r@t ml--1@t">
              @include('templates.article.actions')
            </div>
          @endif
          {{ the_sub_field('txt_copy') }}
        </div>
      </div>
    </div>
    @php($i++)
  @endwhile
</div>
