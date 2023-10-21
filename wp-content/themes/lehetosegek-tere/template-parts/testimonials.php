<section class="bg-white">
  <div class="container pb-48 mx-auto">
    <div class="text-center">
      <h2
        class="mx-auto w-full inline-block max-w-[20ch] text-center text-xl sm:text-3xl md:text-5xl leading-normal text-turquoise mb-24 uppercase">
        <?php
        if (function_exists('pll__')):
          echo pll__('Rólunk mondták');
        else:
          echo 'Rólunk mondták';
        endif;
        ?>
      </h2>
    </div>
    <?php if (have_rows('testimonials')): ?>
      <div class="grid grid-cols-1 gap-16 md:grid-cols-2 xl:grid-cols-3">
        <?php while (have_rows('testimonials')):
          the_row();

          $quote = get_sub_field('quote');
          $source = get_sub_field('source');
          $date = get_sub_field('date');
          $link = get_sub_field('link');
          ?>
          <div class="">
            <div class="text-xl text-turquoise">
              <?php echo '“' . $quote . '”' ?>
            </div>
            <div class="mt-6 text-base uppercase text-turquoise">
              <?php echo $source ?>
            </div>
            <?php if ($date): ?>
              <div class="text-base uppercase text-turquoise">
                <?php echo $date ?>
              </div>
            <?php endif; ?>
            <?php if ($link):
              $link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <div class="mt-16 text-base text-white uppercase">
                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"
                  class="px-16 py-4 bg-turquoise rounded-3xl">
                  <?php echo $link['title'] ?>
                </a>
              </div>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>