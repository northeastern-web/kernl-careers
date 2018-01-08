<article class="article --single">
  @while(have_posts()) @php(the_post())
    @include('layouts.chrome.header-singular')
    <section class="section">
      @include('layouts.posts.video')
      <div class="row">
        <div class="col --12@xs --8@lg">
          @include('layouts.sections.section')

          @include('layouts.posts.external')
        </div>
      </div>
    </section>
  @endwhile
</article>
