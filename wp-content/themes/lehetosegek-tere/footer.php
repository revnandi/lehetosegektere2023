
</main>

<?php do_action('tailpress_content_end'); ?>

</div>

<?php do_action('tailpress_content_after'); ?>

<footer id="colophon" class="py-12 site-footer bg-turquoise" role="contentinfo">
	<?php do_action('tailpress_footer'); ?>

	<div class="flex justify-center">
		<div class="text-center">
			<div class="mb-4 text-xs uppercase">
				<?php
				if (function_exists('pll__')):
					echo pll__('Kövessetek bennünket!');
				else:
					echo 'Kövessetek bennünket!';
				endif;
				?>
			</div>
			<div class="flex items-center space-x-48">
				<a href="/partnerek" target="_blank"
					class="inline-block py-4 text-white uppercase px-8 min-w-[14rem] text-center bg-gradient-to-t to-purple from-red rounded-4xl">
					<?php
					if (function_exists('pll__')):
						echo pll__('Partnerek');
					else:
						echo 'Partnerek';
					endif;
					?>
				</a>
				<div class="relative">
					<svg class="w-40 h-auto mx-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
						viewBox="0 0 341.42 312.13" class="c-gradient-heart" data-v-401ca3ae="">
						<defs data-v-d10db16a="">
							<linearGradient data-v-d10db16a="" id="gradient-heart-linear-gradient" x1="120.71" y1="100" x2="220.71"
								y2="100" gradientTransform="translate(-20.71 150) rotate(-45)" gradientUnits="userSpaceOnUse">
								<stop data-v-d10db16a="" offset="0" stop-color="#f9101e"></stop>
								<stop data-v-d10db16a="" offset="1" stop-color="#ff00fd"></stop>
							</linearGradient>
							<linearGradient data-v-d10db16a="" id="gradient-heart-linear-gradient-2" x1="20.71" y1="100" x2="120.71"
								y2="100" xlink:href="#gradient-heart-linear-gradient"></linearGradient>
							<linearGradient data-v-d10db16a="" id="gradient-heart-linear-gradient-3" x1="220.71" y1="150" x2="220.71"
								y2="250" xlink:href="#gradient-heart-linear-gradient"></linearGradient>
							<linearGradient data-v-d10db16a="" id="gradient-heart-linear-gradient-4" x1="120.71" y1="100" x2="320.71"
								y2="100" gradientTransform="translate(-20.71 150) rotate(-45)" gradientUnits="userSpaceOnUse">
								<stop data-v-d10db16a="" offset="0" stop-color="#f9101e"></stop>
								<stop data-v-d10db16a="" offset="0.17" stop-color="#f91021"></stop>
								<stop data-v-d10db16a="" offset="0.31" stop-color="#f90f2b"></stop>
								<stop data-v-d10db16a="" offset="0.44" stop-color="#fa0e3c"></stop>
								<stop data-v-d10db16a="" offset="0.56" stop-color="#fa0c54"></stop>
								<stop data-v-d10db16a="" offset="0.67" stop-color="#fb0a73"></stop>
								<stop data-v-d10db16a="" offset="0.78" stop-color="#fc0799"></stop>
								<stop data-v-d10db16a="" offset="0.89" stop-color="#fe04c5"></stop>
								<stop data-v-d10db16a="" offset="0.99" stop-color="#ff00f8"></stop>
								<stop data-v-d10db16a="" offset="1" stop-color="#ff00fd"></stop>
							</linearGradient>
						</defs>
						<title data-v-d10db16a="">Szív</title>
						<g data-v-d10db16a="" id="gradient-heart-layer_2" data-name="gradient-heart-layer 2">
							<g data-v-d10db16a="" id="gradient-heart-layer_1-2" data-name="gradient-heart-layer 1">
								<g data-v-d10db16a="">
									<path data-v-d10db16a=""
										d="M29.29,29.29,170.71,170.71l70.71,70.71,70.71-70.71L170.71,29.29A100,100,0,0,0,29.29,29.29Z"
										style="fill: url(&quot;#gradient-heart-linear-gradient&quot;);"></path>
									<path data-v-d10db16a=""
										d="M29.29,170.71,170.71,312.13l70.71-70.71-70.71-70.71L29.29,29.29A100,100,0,0,0,29.29,170.71Z"
										style="fill: url(&quot;#gradient-heart-linear-gradient-2&quot;);"></path>
									<path data-v-d10db16a="" d="M170.71,170.71l70.71,70.71,70.71-70.71a100,100,0,0,0,0-141.42Z"
										style="fill: url(&quot;#gradient-heart-linear-gradient-3&quot;);"></path>
									<path data-v-d10db16a="" d="M312.13,29.29a100,100,0,0,0-141.42,0L241.42,100Z"
										style="fill: url(&quot;#gradient-heart-linear-gradient-4&quot;);"></path>
								</g>
							</g>
						</g>
					</svg>
					<div class="absolute top-[15%] v-center">
						<a href="#" class="text-5xl">facebook</a>
						<a href="#" class="text-5xl">insta</a>
					</div>
				</div>
				<a href="/partnerek" target="_blank"
					class="inline-block py-4 text-white uppercase px-8 min-w-[14rem] text-center bg-gradient-to-t to-purple from-red rounded-4xl">
					<?php
					if (function_exists('pll__')):
						echo pll__('Kapcsolat');
					else:
						echo 'Kapcsolat';
					endif;
					?>
				</a>
			</div>
		</div>

	</div>
</footer>

</div>

<?php wp_footer(); ?>

<?php get_template_part('template-parts/events-popup') ?>
</body>

</html>