<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if (! defined('ABSPATH')) {
    die('-1');
} ?>

<?php do_action('tribe_events_list_before_the_content'); ?>

<?php tribe_the_notices() ?>

<?php if (have_posts()) : ?>
  <div class="row">
    <?php do_action('tribe_events_before_loop'); ?>
      <?php //tribe_get_template_part('list/loop')?>
      <?php while (have_posts()) : the_post(); ?>
        <?php do_action('tribe_events_inside_before_loop'); ?>

        <?php tribe_events_list_the_date_headers(); ?>

        <div class="col --3@lg">
          <?php include \App\template_path(locate_template('views/templates/event/_card.blade.php')); ?>
        </div>

        <?php do_action('tribe_events_inside_after_loop'); ?>
      <?php endwhile; ?>

    <?php do_action('tribe_events_after_loop'); ?>
  </div>
<?php endif; ?>
