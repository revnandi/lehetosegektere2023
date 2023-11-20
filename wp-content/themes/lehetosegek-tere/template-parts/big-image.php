<?php
$image = get_field('big_image');
if ($image):

  // Image variables.
  $url = $image['url'];
  $title = $image['title'];
  $alt = $image['alt'];
  $caption = $image['caption'];
  ?>
  <div class="mb-8 overflow-hidden border group aspect-wide-header aspect-square ">
    <img class="object-cover w-full h-full" loading="lazy" src="<?php echo get_the_post_thumbnail_url(null, 'lqip') ?>"
      data-srcset="<?php echo get_the_post_thumbnail_url(null, 'thumbnail') ?> 150w, <?php echo get_the_post_thumbnail_url(null, 'medium') ?> 300w, <?php echo get_the_post_thumbnail_url(null, 'large') ?> 1024w"
      data-sizes="auto" />
  </div>

<?php endif; ?>