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

    <?php
    $images = get_field('gallery');
    $size = 'full'; // (thumbnail, medium, large, full or custom size)
    if ($images): ?>
      <div id="lt_gallery" class="relative w-full splide" aria-label="Gallery Slider">
        <div class="flex justify-end mb-4 space-x-4 splide__arrows">
          <button class="flex items-center justify-center w-16 h-16 splide__arrow bg-turquoise splide__arrow--prev">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.738 12.385" class="w-8 h-8 rotate-180">
              <g fill="none" stroke-miterlimit="10" stroke-width=".706">
                <path stroke="#fff" d="M.247.251 6.24 6.146.344 12.138" />
                <path stroke="#fff" d="M.247.251 6.24 6.146 5 7.406.344 12.138" />
              </g>
            </svg>
          </button>
          <button class="flex items-center justify-center w-16 h-16 splide__arrow splide__arrow--next bg-turquoise">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.738 12.385" class="w-8 h-8">
              <g fill="none" stroke-miterlimit="10" stroke-width=".706">
                <path stroke="#fff" d="M.247.251 6.24 6.146.344 12.138" />
                <path stroke="#fff" d="M.247.251 6.24 6.146 5 7.406.344 12.138" />
              </g>
            </svg>
          </button>
        </div>

        <div class="h-full splide__track">
          <ul class="splide__list">
            <?php foreach ($images as $image): ?>
              <li class="splide__slide">
                <?php if ($image): ?>
                  <div
                    class="relative w-full col-span-1 overflow-hidden border group md:col-span-5 aspect-video border-turquoise">
                    <img class="object-cover w-full h-full" loading="lazy"
                      src="<?php echo wp_get_attachment_image_url($image['ID'], 'lqip') ?>"
                      data-srcset="<?php echo wp_get_attachment_image_url($image['ID'], 'thumbnail') ?> 150w, <?php echo wp_get_attachment_image_url($image['ID'], 'medium') ?> 300w, <?php echo wp_get_attachment_image_url($image['ID'], 'medium_large') ?> 768w, <?php echo wp_get_attachment_image_url($image['ID'], 'large') ?> 1024w, <?php echo wp_get_attachment_image_url($image['ID'], '1536x1536') ?> 1536w, <?php echo wp_get_attachment_image_url($image['ID'], '2048x2048') ?> 2048w"
                      sizes="(max-width: 149px) 150px, (min-width: 150px) 300px, (min-width: 300px) 768px, (min-width: 768px) 1024px, (min-width: 1024px) 1536px, (min-width: 1440px) 2048px" />
                  </div>
                <?php endif; ?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>

  </div>

</div>

<?php
get_footer();