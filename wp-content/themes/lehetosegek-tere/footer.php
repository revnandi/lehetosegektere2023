<section class="block px-12 mx-auto my-16 bg-turquoise">
	<div class="text-center">
		<h2
			class="mx-auto w-full inline-block max-w-[20ch] text-center text-xl sm:text-3xl md:text-5xl leading-normal text-white mb-24 uppercase">
			<?php
			if (function_exists('pll__')):
				echo pll__('Iratkozz fel a
				programajánlónkra');
			else:
				echo 'Iratkozz fel a
				programajánlónkra';
			endif;
			?>
		</h2>
	</div>
	<p class="max-w-md mx-auto mt-4 text-center text-white uppercase">Hírlevelünk időben tájékoztat az aktuális
		programjainkról és az induló workshopjainkról! Csatlakozz a lehetőségek tere közösségéhez!</p>

	<?php echo do_shortcode('[mc4wp_form id=64]'); ?>

</section>

<section class="my-8 bg-turquoise">
	<?php get_template_part('template-parts/big-carousel') ?>
</section>

</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>

<footer id="colophon" class="py-12 site-footer bg-gray-50" role="contentinfo">
	<?php do_action('tailpress_footer'); ?>

	<div class="container mx-auto text-center text-gray-500">
		&copy;
		<?php echo date_i18n('Y'); ?> -
		<?php echo get_bloginfo('name'); ?>
	</div>
</footer>

</div>

<?php wp_footer(); ?>

<?php get_template_part('template-parts/events-popup') ?>
</body>

</html>