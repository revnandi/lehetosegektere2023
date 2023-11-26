<div class="flex w-full h-auto text-white">
  <div class="aspect-square">
    <img class="w-full h-full object-fit" src="https://picsum.photos/seed/picsum/200/300" alt="">
  </div>
  <div class="w-full bg-gradient-to-r from-red-orange to-purple-light">
    <div class="p-2">
      <div class="flex justify-between">
        <?php
          $date_start = get_field('date_start');
    
          if ($date_start): ?>
      
            <div class="text-base uppercase">
              <?php echo date_i18n("M.j.", strtotime($date_start)); ?>
            </div>
      
          <?php endif;
        ?>

        <div class="max-w-[8ch] text-4xs uppercase text-right">Facebook esemény</div>
      </div>
    
      <h3 class="uppercase text-3xs">
        <?php the_title(); ?>
      </h3>

      <button class="relative block w-10 h-10 my-3 rounded-full cursor-pointer bg-gradient-to-r from-red to-purple has-cross event-popup-link" data-event-id="<?php the_ID() ?>"></button>
  
      <div class="text-black uppercase text-3xs">
        Vezető | Kovács Peti
      </div>
  
    </div>
  
    <div class="flex justify-between p-2 leading-normal uppercase bg-black text-3xs">
      <div><?php echo date_i18n("G:i", strtotime($date_start)); ?></div>
  
      <?php
        $location = get_field('location');
        if($location): ?>
  
          <div>Helyszín | <?php echo $location ?></div>
  
        <?php endif;
      ?>
  
    </div>
  </div>

</div>