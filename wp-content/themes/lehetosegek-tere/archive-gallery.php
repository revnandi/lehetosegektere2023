<?php get_header(); ?>

<div id="content" class="flex-grow inline-block w-full bg-white site-content">

  <?php do_action('tailpress_content_start'); ?>

  <div class="container px-8 mx-auto my-8">

    <div class="text-center">
      <h2
        class="mx-auto w-full inline-block max-w-[20ch] text-center text-xl sm:text-3xl md:text-5xl leading-normal text-turquoise mb-24 uppercase">
        <?php
        if (function_exists('pll__')):
          echo pll__('Galéria');
        else:
          echo 'Galéria';
        endif;
        ?>
      </h2>
    </div>

    <?php if (have_posts()): ?>
      <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-x-2 gap-y-6">
        <?php while (have_posts()): the_post();
          $date = get_field('date');
          ?>
          <div>
            <?php if (has_post_thumbnail()): ?>
              <div
                class="relative col-span-1 overflow-hidden border group md:col-span-5 aspect-wide-header aspect-square">
                <img
                  class="object-cover w-full h-full"
                  loading="lazy"
                  data-custom-lazy
                  src="<?php echo get_the_post_thumbnail_url(null, 'lqip') ?>"
                  data-srcset="<?php echo get_the_post_thumbnail_url(null, 'thumbnail') ?> 300w, <?php echo get_the_post_thumbnail_url(null, 'medium') ?> 768w, <?php echo get_the_post_thumbnail_url(null, 'medium_large') ?> 1024w"
                  sizes="(max-width: 300px) 300px, (max-width: 768px) 768px, 1024px" />
              </div>
            <?php endif; ?>

            <di class="flex justify-between">
              <div class="flex flex-col justify-end">
                <div class="uppercase text-3xs text-turquoise">
                  <?php the_title() ?>
                </div>
                <?php if ($date): ?>
                  <div class="uppercase text-3xs text-turquoise">
                    <?php echo $date ?>
                  </div>
                <?php endif; ?>
              </div>
              <a href="<?php the_permalink()  ?>" class="flex items-center justify-center w-12 h-12 bg-turquoise aspect-square">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.738 12.385" class="w-5 h-5">
                  <g fill="none" stroke-miterlimit="10" stroke-width=".706">
                    <path stroke="#fff" d="M.247.251 6.24 6.146.344 12.138" />
                    <path stroke="#fff" d="M.247.251 6.24 6.146 5 7.406.344 12.138" />
                  </g>
                </svg>
              </a>
            </di>

          </div>

        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>

</div>

<?php
get_footer();