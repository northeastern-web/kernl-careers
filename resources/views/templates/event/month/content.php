<?php
/**
 * Month View Content Template
 * The content template for the month view of events. This template is also used for
 * the response that is returned on month view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if (! defined('ABSPATH')) {
    die('-1');
} ?>

<div id="tribe-events-content" class="tribe-events-month">

  <!-- Month Title -->
  <?php do_action('tribe_events_before_the_title') ?>
  <h2 class="tribe-events-page-title"><?php tribe_events_title() ?></h2>
  <?php do_action('tribe_events_after_the_title') ?>

  <!-- Notices -->
  <?php tribe_the_notices() ?>

  <!-- Month Header -->
  <?php do_action('tribe_events_before_header') ?>
  <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
    <!-- Header Navigation -->
    <?php include \App\template_path(locate_template('views/templates/event/month/nav.php')); ?>
  </div>


  <?php do_action('tribe_events_after_header') ?>
  <!-- Month Grid -->
  <?php include \App\template_path(locate_template('views/templates/event/month/loop-grid.php')); ?>


  <!-- Month Footer -->
  <?php do_action('tribe_events_before_footer') ?>
  <div id="tribe-events-footer">

    <!-- Footer Navigation -->
    <?php do_action('tribe_events_before_footer_nav'); ?>
    <?php include \App\template_path(locate_template('views/templates/event/month/nav.php')); ?>
    <?php do_action('tribe_events_after_footer_nav'); ?>

  </div>
  <!-- #tribe-events-footer -->
  <?php do_action('tribe_events_after_footer') ?>

  <?php include \App\template_path(locate_template('views/templates/event/month/mobile.php')); ?>
  <?php include \App\template_path(locate_template('views/templates/event/month/tooltip.php')); ?>

</div><!-- #tribe-events-content -->
