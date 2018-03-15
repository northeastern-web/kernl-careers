<?php
/**
 * List View Template
 * The wrapper template for a list of events. This includes the Past Events and Upcoming Events views
 * as well as those same views filtered to a specific category.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined('ABSPATH') ) {
	die('-1');
}

?>

<?php //do_action('tribe_events_before_template'); ?>

<?php tribe_get_template_part('modules/bar'); ?>

<?php tribe_get_template_part('list/content'); ?>

<?php //do_action('tribe_events_before_footer'); ?>
<div id="tribe-events-footer">
  <?php do_action('tribe_events_before_footer_nav'); ?>
  <?php tribe_get_template_part('list/nav','footer'); ?>
  <?php do_action('tribe_events_after_footer_nav'); ?>
</div>
