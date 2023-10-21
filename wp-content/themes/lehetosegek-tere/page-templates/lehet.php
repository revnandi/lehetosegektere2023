<?php /* Template Name: Lehet */?>

<?php get_header(); ?>

<div id="content" class="flex-grow site-content">


  <?php do_action('tailpress_content_start'); ?>
  <section class="bg-white">
    <div class="container py-8 mx-auto">

      <?php if (have_posts()): ?>
        <?php
        while (have_posts()):
          the_post();
          ?>

          <?php get_template_part('template-parts/content', get_post_format()); ?>

        <?php endwhile; ?>

      <?php endif; ?>

    </div>
  </section>

  <?php get_template_part('template-parts/bubbles-stars'); ?>
  
  <?php get_template_part('template-parts/staff'); ?>

  <?php get_template_part('template-parts/testimonials'); ?>


  <?php
  get_footer();