<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php do_action( 'tribe_events_inside_before_loop' ); ?>

	<!-- Month / Year Headers -->
	<?php tribe_events_list_the_date_headers(); ?>

	<div class="col-12@xs col-3@lg">
		<?php get_template_part('templates/components/card','event'); ?>
	</div>

	<?php do_action( 'tribe_events_inside_after_loop' ); ?>
<?php endwhile; ?>
