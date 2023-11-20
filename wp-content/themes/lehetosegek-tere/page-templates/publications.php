<?php /* Template Name: Kiadványok */?>

<?php get_header(); ?>

<div id="content" class="flex-grow inline-block w-full bg-white site-content">

  <?php do_action('tailpress_content_start'); ?>

  <div class="container px-8 pt-16 pb-8 mx-auto my-8">

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

    <?php if (have_rows('publications')): ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-x-2 gap-y-6">
        <?php  while( have_rows('publications') ) : the_row();
        $image = get_sub_field('image');
        $description = get_sub_field('description');
        $location = get_sub_field('location');
        $price = get_sub_field('price');
        
        ?>

          <div class="text-turquoise">
            <?php if ($image): ?>
              <div
                class="relative mb-8 overflow-hidden border group aspect-wide-header aspect-square ">
                <img
                  class="object-cover w-full h-full"
                  loading="lazy"
                  data-custom-lazy
                  src="<?php echo $image['sizes']['lqip']; ?>"
                  data-srcset="<?php echo $image['sizes']['thumbnail']; ?> 150w, <?php echo $image['sizes']['medium']; ?> 300w, <?php echo $image['sizes']['large'];?> 1024w"
                  data-sizes="auto" />
              </div>
            <?php endif; ?>
            <h3 class="text-3xl text-center uppercase">
              <?php the_sub_field('title') ?>
            </h3>
            <?php if (get_sub_field('location')): ?>
              <div class="mt-4 text-lg text-center uppercase">
                <?php
                if (function_exists('pll__')):
                  echo pll__('elérhető');
                else:
                  echo 'elérhető';
                endif;
                ?> |
                <?php echo get_sub_field('location') ?><br />
                <?php if (get_sub_field('price')):
                  echo get_sub_field('price') . ' Ft';
                endif; ?>
              </div>
            <?php endif; ?>
            <div class="mt-6 text-base">
              <?php echo get_sub_field('description') ?>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>

</div>

<?php get_template_part('template-parts/big-image'); ?>

<?php
get_footer();