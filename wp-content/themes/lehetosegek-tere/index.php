<?php get_header(); ?>

<div id="content" class="flex-grow site-content">

<section class="inline-block w-full px-4 mx-auto my-8 md:px-11 bg-turquoise">


</section>

<?php do_action('tailpress_content_start'); ?>

</div>
	<div>
	<!-- <div class="container px-8 mx-auto my-8"> -->

		<?php if (have_posts()): ?>
			<?php
			while (have_posts()):
				the_post();
				?>

				<?php get_template_part('template-parts/content', get_post_format()); ?>

			<?php endwhile; ?>

		<?php endif; ?>

	</div>

</div>

<?php
get_footer();