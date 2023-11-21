<h2 class="mb-4 text-2xl md:mb-0 sm:text-3xl md:text-4xl">Aktuális Programok</h2>
<div class="flex flex-col md:flex-row">
  <?php
    $allCategories = get_categories();
    $filteredAcategories = array_filter($allCategories, function($obj) {
      return $obj->slug === 'esemeny' || $obj->slug === 'rendszeres';
   });
  ?>
  <ul class="grid grid-cols-2 gap-2 mb-4 cat-list sm:grid-cols-4 md:mb-0 md:inline-block md:space-y-2">
    <li class="px-2 rounded-[1em] text-white bg-transparent border border-white text-center cursor-pointer cat-list_item active">
      <a class="block uppercase text-3xs" href="#!" data-slug="" data-type="event">Összes</a>
    </li>

    <?php foreach ($filteredAcategories as $category): ?>
      <li class="px-2 rounded-[1em] text-white bg-transparent border border-white text-center cursor-pointer cat-list_item">
        <a class="block uppercase text-3xs" href="#!" data-slug="<?= $category->slug; ?>" data-type="event">
          <?= $category->name; ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <div class="flex flex-col w-full space-y-4">
    <?php get_template_part('template-parts/weekpicker') ?>
    <label class="relative h-fit before:content-[''] before:absolute before:right-3 before:top-1.5 before:w-5 before:h-5 before:translate-y-1/2 before:bg-magnifier before:bg-contain">
      <input id="lt_search_keyword_input" class="w-full py-2 pl-3 pr-10 text-xs uppercase text-turquoise placeholder-turquoise" type="text" placeholder="Program kereső">
    </label>
  </div>

</div>