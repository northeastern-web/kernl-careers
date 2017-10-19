<article {{ post_class('--single') }}>
  @while(have_posts()) @php(the_post())
    @include('layouts.chrome.header-singular')
    <section class="section">
      @include('layouts.posts.video')
      <div class="g-row">
        <div class="g-col --12@xs --8@lg --offset-2@lg">
          @include('layouts.sections.section')

          @include('layouts.posts.external')
        </div>
      </div>
    </section>
  @endwhile
</article>
