<?php /* Template Name: Főoldal */?>

<?php get_header(); ?>

<div id="content" class="flex-grow site-content">

  <section class="inline-block w-full px-4 mx-auto my-8 md:px-11 bg-turquoise">

    <?php if (is_front_page()): ?>
      <!-- Start introduction -->

      <div class="grid grid-cols-2 gap-6">
        <div class="">
          <?php get_template_part('/template-parts/puzzle') ?>
        </div>

        <div class="grid col-span-2 grid-rows-3 gap-3 md:col-span-1 aspect-square">
          <div class="row-span-1 bg-white">
          </div>
          <div class="relative row-span-2 overflow-x-hidden bg-white">
            <?php get_template_part('/template-parts/small-carousel') ?>
          </div>
        </div>
      </div>

      <div class="mt-4">
        <?php get_template_part('/template-parts/events-filter') ?>
      </div>

      <?php

      // Get the current date.
      $currentDate = new DateTime();

      // Calculate the start of the week (Monday).
      $startOfWeek = $currentDate->modify('this week monday')->format('Y-m-d');

      // Calculate the end of the week (Sunday).
      $endOfWeek = $currentDate->modify('this week sunday')->format('Y-m-d');

      $events = new WP_Query([
        'post_type' => 'event',
        'posts_per_page' => -1,
        'order_by' => 'date',
        'order' => 'desc',
        'meta_query' => [
          'relation' => 'AND',
          [
            'relation' => 'OR',
            [
              'key' => 'date_start',
              'value' => $startOfWeek,
              'compare' => '>=',
              'type' => 'DATE',
            ],
            [
              'key' => 'date_end',
              'value' => $startOfWeek,
              'compare' => '>=',
              'type' => 'DATE',
            ]
          ],
          [
            'relation' => 'OR',
            [
              'key' => 'date_start',
              'value' => $endOfWeek,
              'compare' => '<=',
              'type' => 'DATE',
            ],
            [
              'key' => 'date_end',
              'value' => $endOfWeek,
              'compare' => '<=',
              'type' => 'DATE',
            ]
          ]
        ],
      ]);
      ?>


      <?php if ($events->have_posts()): ?>
        <div class="grid grid-cols-1 gap-4 project-tiles lg:grid-cols-2">
          <?php
          while ($events->have_posts()):
            $events->the_post();
            get_template_part('/template-parts/event-card.php');
          endwhile;
          ?>
        </div>
        <?php wp_reset_postdata(); ?>
      <?php else:

        echo 'No events found.';
      endif; ?>


    <?php endif; ?>

  </section>

  <?php do_action('tailpress_content_start'); ?>

</div>
<div class="container mx-auto my-8">

  <?php if (have_posts()): ?>
    <?php
    while (have_posts()):
      the_post();
      ?>

      <?php get_template_part('/template-parts/content', get_post_format()); ?>

    <?php endwhile; ?>

  <?php endif; ?>

</div>

</div>

<?php
get_footer();