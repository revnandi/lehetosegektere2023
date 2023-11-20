<?php
$image = get_field('big_image');
if ($image):

  // Image variables.
  $url = $image['url'];
  $title = $image['title'];
  $alt = $image['alt'];
  $caption = $image['caption'];
  ?>
  <div class="mb-8 overflow-hidden h-[100dvh]">
    <img
      class="object-cover w-full h-full"
      loading="lazy"
      data-custom-lazy
      src="<?php echo $image['sizes']['lqip']; ?>"
      data-srcset="<?php echo $image['sizes']['thumbnail']; ?> 150w, <?php echo $image['sizes']['medium']; ?> 300w, <?php echo $image['sizes']['large']; ?> 1024w, <?php echo $image['sizes']['1536x1536']; ?> 1536w, <?php echo $image['sizes']['2048x2048']; ?> 2048w"
      sizes="((max-width: 150px) 150px, max-width: 300px) 300px, (max-width: 768px) 768px, (max-width: 1024px) 1024px, (max-width: 1536px) 1536px, 2048px" />
  </div>

<?php endif; ?>