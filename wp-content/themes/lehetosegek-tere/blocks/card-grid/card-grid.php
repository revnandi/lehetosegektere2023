<?php
/**
 * Card Grid Block template.
 *
 * @param array $block The block settings and attributes.
 */


// Load values and assign defaults.
$cards = get_field('cards');
$cards = $cards ?: [];
$color = get_field('color');

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}
?>

<?php if (have_rows('cards')): ?>
  <section <?php echo esc_attr( $anchor ); ?> class="px-10 pt-24 <?php echo ($color == 'white') ? 'bg-white text-turquoise' : ''; ?> <?php echo ($color == 'turquoise') ? 'bg-turquoise text-white' : ''; ?>">
  <div
    class="grid grid-cols-1 pb-16 md:grid-cols-2 gap-x-8 gap-y-16 md:gap-x-8 md:gap-y-16 lg:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 3xl:grid-cols-5 xl:gap-6 2xl:gap-8">
    <?php while (have_rows('cards')):
      the_row();
      $image = get_sub_field('image');
      $title = get_sub_field('title');
      ?>
      <div class="text-turquoise">
        <div
          class="relative col-span-1 mb-8 overflow-hidden rounded-full group md:col-span-5 aspect-wide-header aspect-square <?php echo ($color == 'turquoise') ? 'bg-white' : ''; ?>">
          <img
            class="object-cover object-center w-full h-full"
            loading="lazy"
            alt="<?php echo esc_attr($image['alt']); ?>"
            data-custom-lazy
            data-src="<?php echo esc_url($image['sizes']['lqip']); ?>"
            data-srcset="<?php echo esc_url($image['sizes']['thumbnail']); ?> 150w, <?php echo esc_url($image['sizes']['medium']); ?> 300w, <?php echo esc_url($image['sizes']['medium_large']); ?> 768w"
            sizes="(max-width: 150px) 150px, (max-width: 300px) 300px, 768px" />
        </div>
        <h3 class="text-3xl text-center uppercase <?php echo ($color == 'turquoise') ? 'bg-turquoise text-white' : ''; ?>">
          <?php echo $title ?>
        </h3>
        <?php if (get_sub_field('sub_title')): ?>
          <div class="mt-4 text-lg text-center uppercase <?php echo ($color == 'turquoise') ? 'bg-turquoise text-white' : ''; ?>">
            <?php echo the_sub_field('sub_title') ?>
          </div>
        <?php endif; ?>
        <div class="mt-6 text-base <?php echo ($color == 'turquoise') ? 'bg-turquoise text-white' : ''; ?>">
          <?php echo get_sub_field('description') ?>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
  </section>
<?php endif; ?>