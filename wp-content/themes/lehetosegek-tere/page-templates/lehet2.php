<?php /* Template Name: Lehetsablon */?>

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

          <article id="post-<?php the_ID(); ?>" <?php post_class('mb-12'); ?>>

            <?php if (is_search() || is_archive()): ?>

              <div class="entry-summary">
                <?php the_excerpt(); ?>
              </div>

            <?php else: ?>

              <div class="entry-content">
                <?php
                /* translators: %s: Name of current post */
                the_content(
                  sprintf(
                    __('Continue reading %s', 'tailpress'),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                  )
                );

                wp_link_pages(
                  array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'tailpress') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'pagelink' => '<span class="screen-reader-text">' . __('Page', 'tailpress') . ' </span>%',
                    'separator' => '<span class="screen-reader-text">, </span>',
                  )
                );
                ?>
              </div>

            <?php endif; ?>

          </article>

        <?php endwhile; ?>

      <?php endif; ?>

    </div>
  </section>

  <?php get_template_part('template-parts/bubbles-stars'); ?>

  <?php get_template_part('template-parts/partners'); ?>

  <?php get_template_part('template-parts/staff'); ?>

  <?php get_template_part('template-parts/testimonials'); ?>


  <?php
  get_footer();