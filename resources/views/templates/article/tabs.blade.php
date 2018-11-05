<nav class="nav --tabbed --bordered pt--1">
  <ul class="__list" role="tablist">
    @php($i = 0)
    @while((have_rows('lay_tab')))
      @php(the_row())
      <li class="__item">
        <a class="__link {{ ($i == 0 ? 'active' : '') }}" data-toggle="tab" href="#tab_{{ $i }}" role="tab" aria-expanded="true">{{ the_sub_field('txt_title') }}</a>
      </li>
      @php($i++)
    @endwhile
  </ul>
</nav>
<div class="tabcontent mb--2">
  @php($i = 0)
  @while((have_rows('lay_tab')))
    @php(the_row())
    <div class="hidden +clearfix {{ ($i == 0 ? 'active' : '') }}" id="tab_{{ $i }}" role="tabpanel">
      @include('templates.article.alert')

      @if(have_rows('lay_actions'))
        <div class="f--r@t ml--1@t col w--1/3@t px--0 mt--1">
          @include('templates.article.actions')
        </div>
      @endif

      {{ the_sub_field('txt_copy') }}

      @include('templates.article.contact')
    </div>
    @php($i++)
  @endwhile
</div>
