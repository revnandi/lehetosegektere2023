<div class="flex w-full h-auto text-white">
  <div class="aspect-square">
    <img class="w-full h-full object-fit" src="https://picsum.photos/seed/picsum/200/300" alt="">
  </div>
  <div class="flex flex-col justify-between w-full h-full bg-gradient-to-r from-red-orange to-purple-light">
    <div class="flex flex-col h-full p-2">
      <div class="flex justify-between">
        <?php
        $date_start = get_field('date_start');
        $date_end = get_field('date_end');

        if ($date_start): ?>

          <div class="text-base uppercase">
            <?php echo date_i18n("M.j.", strtotime($date_start)); ?>
          </div>

        <?php endif;
        ?>

        <?php
        $link = get_field('link');
        if ($link):
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a class="max-w-[8ch] text-4xs uppercase text-right" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
            <?php echo esc_html($link_title); ?>
          </a>
        <?php endif; ?>
      </div>

      <h3 class="uppercase text-3xs">
        <?php the_title(); ?>
      </h3>

      <button
        class="relative block w-10 h-10 my-3 rounded-full cursor-pointer bg-gradient-to-r from-red to-purple has-cross event-popup-link"
        data-event-id="<?php the_ID() ?>"></button>

      <div class="mt-auto text-black uppercase text-3xs">
        <?php the_field('bottom_text') ?>
      </div>

    </div>

    <div class="flex justify-between p-2 leading-normal uppercase bg-black text-3xs">
      <div>
        <?php echo date_i18n("G:i", strtotime($date_start)); ?>
        <?php if(get_field('date_end')):
        echo '-' . date_i18n("G:i", strtotime($date_end));
        
        endif; ?>
      </div>

      <?php
      $location = get_field('location');
      $location_link = get_field('location_link');
      if ($location): ?>

        <div>Helyszín |
          <?php if($location_link):
            echo '<a href="' . esc_url($location_link) . '"target="_blank>">' . $location . '</a>';
          else:
            echo $location;
          endif; ?>
        </div>

      <?php endif;
      ?>

    </div>
  </div>
</div>