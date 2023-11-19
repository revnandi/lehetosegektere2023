<?php
/**
 * Testimonial Block template.
 *
 * @param array $block The block settings and attributes.
 */


// Load values and assign defaults.
$slides = get_field('slides');
// pretty_dump($slides);
$slides = $slides ?: [];
$image = get_sub_field('Szerkesztés Duplicate Move Delete
image');
$title = get_sub_field('title');
$button = get_sub_field('button');

?>

<?php if (have_rows('slides')): ?>
  <section class="lt_splide splide relative h-[100dvh] w-full" aria-label="Splide Basic HTML Example">
    <div class="h-full splide__track">
      <ul class="splide__list">
        <?php while (have_rows('slides')):
          the_row();
          $image = get_sub_field('image');
          // $lqip = $image['sizes']['lqip'];
          // $thumb = $image['sizes']['thumbnail'];
          // $medium = $image['sizes']['medium'];
          // $medium_large = $image['sizes']['medium_large'];
          // $large = $image['sizes']['large'];
          // $xl = $image['sizes']['1536x1536'];
          // $xxl = $image['sizes']['2048x2048'];

          $link = get_sub_field('button');
          if ($link):
            $link_url = $link['url'] ?? '#';
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
          endif;
          ?>
          <li class="splide__slide">

            <div class="w-full h-full">

                  <img
                  class="object-cover object-center w-full h-full"
                  alt="<?php echo esc_attr($image['alt']); ?>"
                  data-splide-lazy="<?php echo esc_url($image['sizes']['2048x2048']); ?>"
                  data-splide-lazy-srcset="<?php echo esc_url($image['sizes']['thumbnail']); ?> 150w, <?php echo esc_url($image['sizes']['medium']); ?> 300w, <?php echo esc_url($image['sizes']['medium_large']); ?> 768w, <?php echo esc_url($image['sizes']['large']); ?> 1024w, <?php echo esc_url($image['sizes']['1536x1536']); ?> 1536w, <?php echo esc_url($image['sizes']['2048x2048']); ?> 2048w"
                  sizes="(max-width: 150px) 150px, (max-width: 300px) 300px, (max-width: 768px) 768px, (max-width: 1024px) 1024px, (max-width: 1536px) 1536px, 2048px"
                />
            </div>
            <div class="absolute top-0 left-0 flex items-center justify-center w-full h-full">
              <div class="flex flex-col items-center space-x-6 text-center">
                <h3 class="text-xl sm:text-3xl md:text-5xl !leading-normal text-white">
                  <?php the_sub_field('title') ?>
                </h3>
                <?php
                if ($link):
                  get_template_part(
                    'template-parts/link-button',
                    'component',
                    array(
                      'url' => '#',
                      'text' => 'Történetünk',
                    )
                  );
                endif;
                ?>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </section>
<?php endif; ?>