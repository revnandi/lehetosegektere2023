<?php
/**
 * Big Carousel Alt Block template.
 *
 * @param array $block The block settings and attributes.
 */


// Load values and assign defaults.
$slides = get_field('slides');
// pretty_dump($slides);
$slides = $slides ?: [];
?>

<?php if (have_rows('slides')): ?>
  <section class="lt_splide_alt splide relative h-[100dvh] w-full bg-white py-8" aria-label="Carousel">
    <div class="h-full splide__track">
      <ul class="splide__list">
        <?php while (have_rows('slides')): the_row();
          $image = get_sub_field('image');

          $text = get_sub_field('text');
          ?>
          <li class="relative splide__slide">

            <div class="w-full h-full">

              <img class="object-cover object-center w-full h-full" alt="<?php echo esc_attr($image['alt']); ?>"
                data-splide-lazy="<?php echo esc_url($image['sizes']['2048x2048']); ?>"
                data-splide-lazy-srcset="<?php echo esc_url($image['sizes']['thumbnail']); ?> 150w, <?php echo esc_url($image['sizes']['medium']); ?> 300w, <?php echo esc_url($image['sizes']['medium_large']); ?> 768w, <?php echo esc_url($image['sizes']['large']); ?> 1024w, <?php echo esc_url($image['sizes']['1536x1536']); ?> 1536w, <?php echo esc_url($image['sizes']['2048x2048']); ?> 2048w"
                sizes="(max-width: 150px) 150px, (max-width: 300px) 300px, (max-width: 768px) 768px, (max-width: 1024px) 1024px, (max-width: 1536px) 1536px, 2048px" />
            </div>
            <div class="absolute bottom-0 z-10 flex flex-col-reverse items-end justify-center md:flex-row md:bottom-4 md:right-12">
              <div class="flex w-full md:w-auto">
                <button class="flex items-center justify-center w-1/2 h-16 md:w-16 lt_button_prev bg-turquoise">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.738 12.385" class="w-8 h-8 rotate-180">
                    <g fill="none" stroke-miterlimit="10" stroke-width=".706">
                      <path stroke="#fff" d="M.247.251 6.24 6.146.344 12.138" />
                      <path stroke="#fff" d="M.247.251 6.24 6.146 5 7.406.344 12.138" />
                    </g>
                  </svg>
                </button>
                <button class="flex items-center justify-center w-1/2 h-16 md:w-16 lt_button_next bg-turquoise">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 6.738 12.385" class="w-8 h-8">
                    <g fill="none" stroke-miterlimit="10" stroke-width=".706">
                      <path stroke="#fff" d="M.247.251 6.24 6.146.344 12.138" />
                      <path stroke="#fff" d="M.247.251 6.24 6.146 5 7.406.344 12.138" />
                    </g>
                  </svg>
                </button>
              </div>
              <?php if ($text): ?>
                <div class="md:w-[55vw] lg:w-[45vw] min-h-[12rem] bg-white bg-opacity-60 p-4 alt-carousel-text">
                  <?php echo $text ?>
                </div>
              <?php endif; ?>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>
<?php endif; ?>