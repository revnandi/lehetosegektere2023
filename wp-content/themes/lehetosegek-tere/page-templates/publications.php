<?php /* Template Name: Kiadványok */?>

<?php get_header(); ?>

<div id="content" class="flex-grow inline-block w-full bg-white site-content">

  <?php do_action('tailpress_content_start'); ?>

  <div class="container px-8 py-16 mx-auto my-8">

    <div class="text-center">
      <h2
        class="mx-auto w-full inline-block max-w-[20ch] text-center text-xl sm:text-3xl md:text-5xl leading-normal text-turquoise mb-24 uppercase">
        <?php
        if (function_exists('pll__')):
          echo pll__('Kiadványaink');
        else:
          echo 'Kiadványaink';
        endif;
        ?>
      </h2>
    </div>

    <?php if (have_posts()): ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-x-2 gap-y-6">
        <?php while (have_posts()):
          the_post(); ?>

          <div class="text-turquoise">
            <?php if (has_post_thumbnail()): ?>
              <div
                class="relative mb-8 overflow-hidden border group aspect-wide-header aspect-square ">
                <img class="object-cover w-full h-full" loading="lazy"
                  src="<?php echo get_the_post_thumbnail_url(null, 'lqip') ?>"
                  data-srcset="<?php echo get_the_post_thumbnail_url(null, 'thumbnail') ?> 150w, <?php echo get_the_post_thumbnail_url(null, 'medium') ?> 300w, <?php echo get_the_post_thumbnail_url(null, 'large') ?> 1024w"
                  data-sizes="auto" />
              </div>
            <?php endif; ?>
            <h3 class="text-3xl text-center uppercase">
              <?php the_title() ?>
            </h3>
            <?php if (get_field('location')): ?>
              <div class="mt-4 text-lg text-center uppercase">
                <?php
                if (function_exists('pll__')):
                  echo pll__('elérhető');
                else:
                  echo 'elérhető';
                endif;
                ?> |
                <?php echo the_field('location') ?><br />
                <?php if (get_field('price')):
                  echo the_field('price') . ' Ft';
                endif; ?>
              </div>
            <?php endif; ?>
            <div class="mt-6 text-base">
              <?php echo $post->post_content ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>

</div>

<?php
get_footer();