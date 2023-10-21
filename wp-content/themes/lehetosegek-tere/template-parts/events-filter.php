<h2 class="mb-4 md:mb-0 text-2xl sm:text-3xl md:text-4xl">Aktuális Programok</h2>
<div class="flex flex-col md:flex-row">
  <?php $categories = get_categories(); ?>
  <ul class="cat-list grid grid-cols-2 gap-2 sm:grid-cols-4 mb-4 md:mb-0 md:inline-block md:space-y-2">
    <li class="px-2 rounded-[1em] text-white bg-transparent border border-white text-center cursor-pointer cat-list_item active">
      <a class="block uppercase text-3xs" href="#!" data-slug="" data-type="event">Összes</a>
    </li>

    <?php foreach ($categories as $category): ?>
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
      <input id="lt_search_keyword_input" class="w-full pl-3 pr-10 py-2 uppercase text-xs text-turquoise placeholder-turquoise" type="text" placeholder="Program kereső">
    </label>
  </div>

</div>