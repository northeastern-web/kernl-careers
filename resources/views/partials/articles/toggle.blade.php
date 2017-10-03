<h6 class="mt--2@xs"><i>Information For:</i></h6>
<nav class="nav --tabbed --buttons mb--2@xs">
  <ul class="__list" role="tablist">
    @php($i = 0)
    @while((have_rows('lay_tab')))
      @php(the_row())
      <li class="__item">
        <a class="__link {{ ($i == 0 ? '' : '') }}" data-toggle="tab" href="#tab_{{ $i }}" role="tab" aria-expanded="true">{{ the_sub_field('txt_title') }}</a>
      </li>
      @php($i++)
    @endwhile
  </ul>
</nav>

@php($i = 0)
@while((have_rows('lay_tab')))
  @php(the_row())
  <div class="hidden {{ ($i == 0 ? '' : '') }}" id="tab_{{ $i }}" role="tabpanel">
    @include('partials.articles.actions')
    {{ the_sub_field('txt_copy') }}

    @include('partials.articles.contact')
  </div>
  @php($i++)
@endwhile
