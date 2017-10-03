<header class="section header">
  <div class="__pretitle">{{ wp_get_post_terms(get_the_ID(), 'group')[0]->name }}</div>
  <h1 class="__title">{{ the_title() }}</h1>
</header>
