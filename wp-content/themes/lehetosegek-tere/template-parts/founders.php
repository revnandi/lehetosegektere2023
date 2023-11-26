<section class="bg-turquoise">

  <div class="container pt-16 mx-auto">

    <div class="text-center">
      <h2
        class="mx-auto w-full inline-block max-w-[20ch] text-center text-xl sm:text-3xl md:text-5xl leading-normal text-white mb-24 uppercase">
        <?php
        if (function_exists('pll__')):
          echo pll__('Alapító Tagok');
        else:
          echo 'Alapító Tagok';
        endif;
        ?>
      </h2>
    </div>

    <?php
    $args = [
      'post_type' => 'founder',
      'posts_per_page' => -1,
    ];

    $query = new WP_Query($args);
    
    if ($query->have_posts()): ?>
      <div
        class="grid grid-cols-1 pb-16 md:grid-cols-2 gap-x-8 gap-y-16 md:gap-x-8 md:gap-y-16 xl:grid-cols-3 2xl:grid-cols-4 3xl:grid-cols-5 xl:gap-6 2xl:gap-8">
        <?php foreach ($query->posts as $post): ?>
          <div class="text-white">
            <?php if (has_post_thumbnail()): ?>
              <div
                class="relative col-span-1 mb-8 overflow-hidden bg-white border border-white rounded-full group md:col-span-5 aspect-wide-header aspect-square">
                <img
                  class="object-cover w-full h-full p-8"
                  loading="lazy"
                  data-custom-lazy
                  src="<?php echo get_the_post_thumbnail_url(null, 'lqip') ?>"
                  data-srcset="<?php echo get_the_post_thumbnail_url(null, 'thumbnail') ?> 150w, <?php echo get_the_post_thumbnail_url(null, 'medium') ?> 300w, <?php echo get_the_post_thumbnail_url(null, 'large') ?> 1024w"
                  data-sizes="auto" />
              </div>
            <?php endif; ?>
            <h3 class="text-3xl text-center uppercase">
              <?php the_title() ?>
            </h3>
            <?php if (get_field('title')): ?>
              <div class="mt-4 text-lg text-center uppercase">
                <?php echo the_field('title') ?>
              </div>
            <?php endif; ?>
            <div class="mt-6 text-base">
              <?php echo $post->post_content ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif;


    wp_reset_postdata();
    ?>
  </div>
</section>