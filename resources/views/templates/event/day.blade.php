@php
global $more, $post, $wp_query;
$more = false;
$current_timeslot = null;
@endphp

<h2 class="ta--c">{{ tribe_get_events_title() }}</h2>

<div class="row">
  @while (have_posts())
    @php(the_post())
    @php(do_action('tribe_events_inside_before_loop'))
      <div class="col w--1/2@t w--1/3@d w--1/4@w col--stretch">
        <?php include \App\template_path(locate_template('views/templates/event/card.blade.php')); ?>
      </div>
    @php(do_action('tribe_events_inside_after_loop'))
  @endwhile
</div>
