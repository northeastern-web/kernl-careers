{{-- <h6 class="mt--2@xs"><i>Information For:</i></h6> --}}
<nav class="nav --tabbed --bordered pt--1@xs">
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
<div class="tabcontent mb--2@xs">
  @php($i = 0)
  @while((have_rows('lay_tab')))
    @php(the_row())
    <div class="hidden +clearfix {{ ($i == 0 ? 'active' : '') }}" id="tab_{{ $i }}" role="tabpanel">
      @include('registrar.alert')

      @if(have_rows('lay_actions'))
        <div class="f--r@sm ml--1@sm col --12@xs --4@sm px--0@xs mt--1@xs">
          @include('registrar.actions')
        </div>
      @endif

      {{ the_sub_field('txt_copy') }}

      @include('registrar.contact')
    </div>
    @php($i++)
  @endwhile
</div>
