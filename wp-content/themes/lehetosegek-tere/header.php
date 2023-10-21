<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=krona-one:400" rel="stylesheet" />
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class('relative text-black-500 antialiased bg-turquoise'); ?>>

	<?php do_action('tailpress_site_before'); ?>

	<div id="page" class="flex flex-col min-h-screen">

		<?php do_action('tailpress_header'); ?>

		<header>
			<div class="px-4 mx-auto bg-white md:px-11">
				<div class="py-6 border-b lg:flex lg:justify-between lg:items-center">
					<div class="flex items-center justify-between">

						<div class="w-32 md:w-32 lg:w-60">
							<a href="/" title="Főoldal">
								<?php get_template_part('template-parts/logo') ?>
							</a>
						</div>

						<div class="lg:hidden">
							<a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
								<svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1" xmlns="http://www.w3.org/2000/svg"
									xmlns:xlink="http://www.w3.org/1999/xlink">
									<g stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
										<g id="icon-shape">
											<path
												d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
												id="Combined-Shape"></path>
										</g>
									</g>
								</svg>
							</a>
						</div>
					</div>

					<div class="flex">
						<?php
						wp_nav_menu(
							array(
								'container_id' => 'primary-menu',
								'container_class' => 'bg-gray-100 mt-4 lg:mr-12 xl:mr-24 p-4 lg:mt-0 lg:p-0 lg:bg-transparent lg:block',
								'menu_class' => 'lg:flex lg:-mx-4',
								'theme_location' => 'primary',
								'li_class' => 'group relative lg:mx-4 text-2xs lg:text-xs xl:text-sm uppercase [&>a]:whitespace-nowrap',
								'fallback_cb' => false,
								'submenu_class' => 'hidden absolute left-1/2 -translate-x-50 z-10 px-1 pt-8 pb-2 bg-white group-hover:block [&>li]:text-2xs [&>li]:text-turquoise'
							)
						);
						?>

						<ul class="flex items-center space-x-4 text-2xs lg:text-xs xl:text-sm">
							<li class="relative uppercase">
								<a href="https://www.facebook.com/lehetosegektere/">Facebook</a>
							</li>
							<li
								class="relative uppercase before:content-[''] before:absolute before:top-[0.085em] before:-left-2 before:-translate-y-1/2 before:inline-block before:w-0.5 before:h-[1.25em] before:bg-purple">
								<a href="https://www.instagram.com/lehetosegek_tere/">Insta</a>
							</li>
							<li
								class="relative uppercase before:content-[''] before:absolute before:top-[0.085em] before:-left-2 before:-translate-y-1/2 before:inline-block before:w-0.5 before:h-[1.25em] before:bg-purple">
								<a href="https://www.youtube.com/channel/UCP9a3wY5--Wx_8jEJKMzIkw">Youtube</a>
							</li>
						</ul>
					</div>

				</div>
			</div>
		</header>

		<div class="flex justify-end my-3 space-x-3 mr-11">
			<a href="https://www.erstestiftung.org/de/">
				<svg width="55" height="21" viewBox="0 0 55 21" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_6_8)">
						<path
							d="M26.1858 4.03275H30.9428V5.24618H27.5637V6.50322H30.5375V7.71476H27.5637V9.01541H30.9872V10.2383H26.1858V4.03275Z"
							fill="white" />
						<path
							d="M32.228 4.03275H35.1035C35.9043 4.03275 36.5277 4.25458 36.9407 4.66221C37.1224 4.85088 37.2639 5.07341 37.3567 5.31666C37.4495 5.55991 37.4918 5.81896 37.481 6.07852V6.09558C37.5012 6.51693 37.3799 6.93312 37.1359 7.28014C36.8918 7.62716 36.5384 7.88578 36.1301 8.01622L37.674 10.2288H36.0529L34.7021 8.24564H33.6117V10.2383H32.228V4.03275ZM35.0205 7.04168C35.6959 7.04168 36.0838 6.68713 36.0838 6.16574V6.14867C36.0838 5.56471 35.6689 5.26324 34.9935 5.26324H33.6156V7.04168H35.0205Z"
							fill="white" />
						<path
							d="M38.2993 9.32637L39.1195 8.36131C39.6869 8.82203 40.2774 9.1197 41.003 9.1197C41.5704 9.1197 41.9139 8.89787 41.9139 8.53574V8.51867C41.9139 8.1736 41.6977 7.99538 40.6441 7.72994C39.3742 7.41142 38.5541 7.06635 38.5541 5.83395V5.81689C38.5541 4.69256 39.4726 3.94934 40.7618 3.94934C41.6113 3.93749 42.4384 4.21709 43.1007 4.73996L42.3809 5.7657C41.8232 5.3865 41.2732 5.15519 40.7405 5.15519C40.2079 5.15519 39.93 5.39408 39.93 5.69554V5.71261C39.93 6.12025 40.2002 6.25297 41.2809 6.52788C42.5604 6.85589 43.2802 7.30714 43.2802 8.38596V8.40302C43.2802 9.63352 42.3249 10.3237 40.9644 10.3237C39.9818 10.3228 39.0336 9.96794 38.2993 9.32637Z"
							fill="white" />
						<path d="M45.8294 5.28979H43.9111V4.03275H49.1371V5.28979H47.2189V10.2383H45.8313L45.8294 5.28979Z"
							fill="white" />
						<path
							d="M50.1985 4.03275H54.9555V5.24618H51.5764V6.50322H54.5502V7.71476H51.5764V9.01541H54.9999V10.2383H50.1985V4.03275Z"
							fill="white" />
						<path
							d="M26.0776 16.6847L26.3768 16.3359C26.5689 16.5267 26.798 16.6777 27.0506 16.78C27.3032 16.8823 27.5741 16.9337 27.8473 16.9312C28.4262 16.9312 28.8122 16.6297 28.8122 16.2145V16.2031C28.8122 15.8126 28.598 15.5888 27.6968 15.403C26.7106 15.1926 26.2571 14.8797 26.2571 14.1877V14.1763C26.2571 13.5146 26.8515 13.0274 27.6659 13.0274C28.216 13.0119 28.7526 13.1961 29.1731 13.545L28.8913 13.9128C28.5459 13.619 28.1035 13.4587 27.6466 13.4615C27.0889 13.4615 26.7338 13.763 26.7338 14.1422V14.1536C26.7338 14.5498 26.9538 14.7736 27.8917 14.9727C28.8296 15.1717 29.2889 15.5206 29.2889 16.1652V16.1766C29.2889 16.899 28.6771 17.3692 27.8241 17.3692C27.1737 17.3721 26.5475 17.1267 26.0776 16.6847Z"
							fill="white" />
						<path
							d="M30.3387 16.4819V14.5992H29.8967V14.1953H30.3387V13.2473H30.8095V14.1953H31.815V14.5992H30.8095V16.4174C30.7998 16.4881 30.8069 16.5601 30.8303 16.6277C30.8538 16.6952 30.8928 16.7565 30.9445 16.8067C30.9961 16.8569 31.0589 16.8946 31.1279 16.9169C31.197 16.9391 31.2703 16.9454 31.3422 16.935C31.5019 16.9357 31.6594 16.8986 31.8015 16.8269V17.2232C31.6231 17.3151 31.4238 17.3607 31.2225 17.3559C30.7246 17.3616 30.3387 17.1151 30.3387 16.4819Z"
							fill="white" />
						<path
							d="M32.6603 13.0046H33.193V13.5165H32.6545L32.6603 13.0046ZM32.6912 14.1972H33.164V17.3066H32.6912V14.1972Z"
							fill="white" />
						<path
							d="M34.4376 14.5991H34.0034V14.201H34.4376V13.9299C34.4276 13.7852 34.4468 13.64 34.4941 13.5027C34.5415 13.3654 34.6161 13.2386 34.7136 13.1298C34.8051 13.0479 34.9123 12.9848 35.029 12.9441C35.1456 12.9034 35.2693 12.886 35.3929 12.8928C35.57 12.8869 35.7466 12.9133 35.9139 12.9705V13.3743C35.7656 13.3263 35.6108 13.3001 35.4546 13.2966C35.088 13.2966 34.9027 13.5146 34.9027 13.9583V14.2105H35.9082V14.5991H34.9104V17.3066H34.4396L34.4376 14.5991Z"
							fill="white" />
						<path
							d="M36.6665 16.4819V14.5992H36.2246V14.1953H36.6665V13.2473H37.1374V14.1953H38.1429V14.5992H37.1374V16.4174C37.1277 16.4881 37.1348 16.5601 37.1582 16.6277C37.1816 16.6952 37.2207 16.7565 37.2724 16.8067C37.324 16.8569 37.3868 16.8946 37.4558 16.9169C37.5248 16.9391 37.5982 16.9454 37.67 16.935C37.8298 16.9357 37.9873 16.8986 38.1293 16.8269V17.2232C37.951 17.3151 37.7517 17.3607 37.5504 17.3559C37.0525 17.3616 36.6665 17.1151 36.6665 16.4819Z"
							fill="white" />
						<path
							d="M38.938 16.1273V14.1953H39.4089V16.0136C39.4089 16.5824 39.7273 16.9521 40.285 16.9521C40.4139 16.9541 40.5418 16.93 40.6608 16.8812C40.7798 16.8324 40.8872 16.76 40.9763 16.6685C41.0655 16.577 41.1344 16.4684 41.1788 16.3495C41.2233 16.2306 41.2422 16.104 41.2345 15.9775V14.1953H41.6996V17.3066H41.2345V16.7663C41.1263 16.9563 40.967 17.1134 40.774 17.2204C40.581 17.3274 40.3618 17.3802 40.1403 17.373C39.3838 17.373 38.938 16.8743 38.938 16.1273Z"
							fill="white" />
						<path
							d="M42.7609 14.1953H43.2279V14.7376C43.3343 14.548 43.4918 14.3908 43.6831 14.2835C43.8745 14.1761 44.0922 14.1226 44.3125 14.129C45.0844 14.129 45.5264 14.6333 45.5264 15.3746V17.3066H45.0535V15.4903C45.0535 14.9215 44.7351 14.5423 44.1774 14.5423C44.0475 14.5395 43.9184 14.5635 43.7985 14.6127C43.6785 14.6619 43.5704 14.7351 43.481 14.8278C43.3916 14.9205 43.3229 15.0305 43.2793 15.1508C43.2357 15.2711 43.2182 15.399 43.2279 15.5263V17.3085H42.7551L42.7609 14.1953Z"
							fill="white" />
						<path
							d="M46.5087 17.8489L46.723 17.4886C47.0746 17.7482 47.5028 17.888 47.9426 17.8868C48.6412 17.8868 49.1005 17.5076 49.1005 16.7795V16.4098C48.9622 16.6126 48.7749 16.7785 48.5553 16.8927C48.3357 17.0069 48.0907 17.0657 47.8422 17.0639C47.6465 17.067 47.4521 17.0315 47.2705 16.9594C47.089 16.8874 46.924 16.7804 46.7853 16.6446C46.6466 16.5089 46.537 16.3472 46.463 16.1691C46.3889 15.991 46.352 15.8002 46.3544 15.6078V15.5964C46.3553 15.2837 46.4576 14.9793 46.6464 14.7274C46.8351 14.4755 47.1006 14.2892 47.4043 14.1955C47.708 14.1017 48.0343 14.1053 48.3357 14.2059C48.6372 14.3064 48.8983 14.4986 49.0812 14.7546V14.1858H49.5521V16.7663C49.5636 16.9671 49.5338 17.1681 49.4645 17.3574C49.3952 17.5466 49.2878 17.7202 49.1487 17.8678C48.9854 18.0117 48.7948 18.1224 48.5878 18.1936C48.3808 18.2649 48.1616 18.2953 47.9426 18.2831C47.4305 18.2872 46.9296 18.1355 46.5087 17.8489ZM49.0986 15.604V15.5927C49.0986 14.9537 48.5351 14.5404 47.9407 14.5404C47.7976 14.5339 47.6547 14.5563 47.5207 14.6062C47.3868 14.6561 47.2647 14.7324 47.1619 14.8305C47.0592 14.9286 46.9781 15.0463 46.9235 15.1764C46.8689 15.3065 46.842 15.4463 46.8445 15.587V15.5983C46.8437 15.7392 46.8717 15.8788 46.9267 16.0088C46.9817 16.1389 47.0627 16.2568 47.1649 16.3556C47.267 16.4544 47.3883 16.5321 47.5216 16.5841C47.6548 16.636 47.7973 16.6612 47.9407 16.6582C48.2364 16.669 48.5244 16.564 48.7415 16.3664C48.9586 16.1687 49.087 15.8946 49.0986 15.604Z"
							fill="white" />
						<path
							d="M10.6969 11.0403C10.2106 11.0403 9.47725 11.2299 9.43286 11.6414C9.43286 11.6869 9.43286 11.7362 9.44444 11.7893H11.9532C11.9532 11.7381 11.9532 11.6888 11.9648 11.6414C11.9165 11.2337 11.1929 11.0422 10.6969 11.0403Z"
							fill="white" />
						<path
							d="M6.04613 7.91955C6.70218 8.15077 7.33954 8.43027 7.9528 8.75568C8.33172 8.74385 8.71101 8.75969 9.08754 8.80308C8.99971 8.56279 8.94393 8.31233 8.92157 8.05796C8.34262 7.83992 5.83385 6.94122 3.71105 6.88434H3.56245C2.14017 6.88434 1.93368 7.46451 1.91438 7.53277C1.90027 7.60859 1.90352 7.68655 1.92388 7.76099C1.94424 7.83544 1.98121 7.90449 2.0321 7.96316L2.04561 7.98022V7.9916C2.19636 8.19698 2.39485 8.36403 2.62455 8.47887C2.81716 8.19098 3.08455 7.95888 3.39906 7.80654C3.71357 7.65421 4.06379 7.58719 4.4135 7.6124C4.97008 7.63575 5.52015 7.73924 6.04613 7.91955Z"
							fill="white" />
						<path
							d="M4.63157 8.72156C4.84593 8.52863 5.07931 8.35715 5.32824 8.20964C5.02488 8.13969 4.71527 8.09905 4.40386 8.0883C4.14376 8.0682 3.88278 8.11435 3.64614 8.22229C3.4095 8.33023 3.2052 8.49632 3.05298 8.7045C3.41313 8.88872 3.73929 9.13097 4.01789 9.42118C4.19325 9.16471 4.39928 8.92982 4.63157 8.72156Z"
							fill="white" />
						<path
							d="M9.55651 12.9022H11.8395C11.8665 12.6747 11.8916 12.4586 11.909 12.2614H9.48511C9.50441 12.4586 9.52756 12.6747 9.55651 12.9022Z"
							fill="white" />
						<path
							d="M10.697 16.4572C10.7877 16.4572 11.027 16.2676 11.2856 15.5528H10.1084C10.367 16.2733 10.614 16.4572 10.697 16.4572Z"
							fill="white" />
						<path
							d="M9.84218 14.6503C9.87885 14.8077 9.91551 14.9518 9.95218 15.0845H11.4266C11.4632 14.9518 11.4999 14.8077 11.5366 14.6503C11.5501 14.5916 11.5636 14.5328 11.5752 14.4721H9.81323C9.82481 14.5309 9.84218 14.5991 9.84218 14.6503Z"
							fill="white" />
						<path
							d="M7.14039 8.87893C6.764 8.69592 6.37742 8.53388 5.9825 8.39355C5.61304 8.57016 5.27015 8.79602 4.96355 9.06474C4.73298 9.27029 4.53348 9.50716 4.37109 9.76815C4.61567 9.93938 4.88859 10.0677 5.17776 10.1473C5.66569 9.51712 6.35815 9.06959 7.14039 8.87893Z"
							fill="white" />
						<path
							d="M9.72044 14H11.6754C11.714 13.7896 11.7468 13.5791 11.7757 13.3724H9.61816C9.64904 13.5791 9.68185 13.7896 9.72044 14Z"
							fill="white" />
						<path
							d="M7.6499 9.25812C7.18236 9.31719 6.73408 9.47781 6.33761 9.72832C6.03032 9.92008 5.76201 10.1663 5.54639 10.4545C5.58032 10.5033 5.61705 10.5501 5.65639 10.5948C5.82033 10.7213 6.02809 10.7798 6.23533 10.7578C6.3106 10.7578 6.38779 10.7578 6.46691 10.7465C7.91235 10.6175 8.86568 10.1758 9.20919 9.47995C9.20919 9.4553 9.24393 9.38515 9.26516 9.32069L9.26323 9.29035C8.72902 9.21244 8.18689 9.20161 7.6499 9.25812Z"
							fill="white" />
						<path
							d="M16.4344 9.06663C16.1278 8.79791 15.7849 8.57205 15.4155 8.39545C15.0205 8.53577 14.634 8.69782 14.2576 8.88082C15.0426 9.07303 15.7368 9.52412 16.2241 10.1587C16.5132 10.079 16.7862 9.95075 17.0307 9.77952C16.8679 9.51491 16.6671 9.2748 16.4344 9.06663Z"
							fill="white" />
						<path
							d="M16.9825 8.0902C16.6711 8.10095 16.3615 8.14159 16.0581 8.21155C16.3096 8.35802 16.5456 8.52888 16.7625 8.72157C16.9921 8.93027 17.1955 9.16514 17.3685 9.42119C17.6471 9.13098 17.9732 8.88873 18.3334 8.7045C18.1809 8.49667 17.9765 8.33096 17.7399 8.22335C17.5033 8.11575 17.2424 8.06989 16.9825 8.0902Z"
							fill="white" />
						<path
							d="M0 0V21H21.3747V0H0ZM8.83281 4.27546L9.07018 4.24323C9.07053 4.23944 9.07053 4.23564 9.07018 4.23185C9.07018 4.23185 9.11649 4.42145 9.44456 4.65276C9.52368 4.71154 10.2165 5.23104 10.4597 5.57042C10.5008 5.6366 10.5369 5.70568 10.5677 5.77709H10.6989H10.8302C10.861 5.70568 10.8971 5.6366 10.9382 5.57042C11.1718 5.23104 11.8742 4.71154 11.9533 4.65276C12.2814 4.41197 12.3277 4.23375 12.3277 4.23185C12.3274 4.23564 12.3274 4.23944 12.3277 4.24323L12.5651 4.27546L12.8025 4.30769C12.8025 4.36647 12.7291 4.67172 12.2409 5.03007C11.9077 5.26239 11.6038 5.53289 11.3358 5.83586V5.84913C11.4546 5.87617 11.5703 5.91491 11.6812 5.96479L11.5751 6.17524L11.4689 6.3857C10.9815 6.19759 10.4396 6.19759 9.95211 6.3857L9.72632 5.96479C9.83722 5.91494 9.95295 5.87619 10.0718 5.84913V5.83586C9.80354 5.53361 9.49972 5.26375 9.16667 5.03196C8.67842 4.67362 8.61474 4.36647 8.60509 4.30959L8.84246 4.27736L8.83281 4.27546ZM12.8353 5.85861L12.3798 6.70991L11.9649 6.48998L12.4204 5.63868L12.8353 5.85861ZM8.97561 5.63868L9.43105 6.48998L9.00649 6.70991L8.5607 5.85861L8.97561 5.63868ZM7.68263 14.4531L7.47614 14.3337L7.27737 14.2199C7.46602 13.8805 7.59643 13.5128 7.66333 13.1316L8.13228 13.2264C8.05525 13.6569 7.90659 14.072 7.69228 14.455L7.68263 14.4531ZM8.16702 12.9363L7.69614 12.851C7.79319 12.3499 7.79319 11.8353 7.69614 11.3342L8.16123 11.2186C8.27852 11.7849 8.28377 12.3681 8.17667 12.9363H8.16702ZM12.4319 11.6566C12.3623 12.6972 12.2185 13.7318 12.0016 14.7527C11.6716 16.1956 11.2296 16.9274 10.6874 16.9274C10.1451 16.9274 9.70509 16.1956 9.37316 14.7527C9.16022 13.7322 9.02029 12.6982 8.95439 11.6585V11.6262C9.00842 10.8546 10.0274 10.572 10.6912 10.572C11.3551 10.572 12.3818 10.8546 12.4281 11.6262V11.6585L12.4319 11.6566ZM13.2154 11.2224L13.6805 11.338C13.5835 11.8391 13.5835 12.3537 13.6805 12.8548L13.2096 12.9401C13.1028 12.3725 13.1081 11.79 13.2251 11.2243L13.2154 11.2224ZM13.9005 14.3337L13.7018 14.455C13.4877 14.0707 13.3397 13.6543 13.2637 13.2226L13.7326 13.1278C13.7995 13.509 13.9299 13.8767 14.1186 14.2161L13.9005 14.3337ZM19.7286 8.26652C19.496 8.58159 19.1823 8.83024 18.8196 8.987C18.3579 9.18254 17.9489 9.48116 17.6251 9.85915C17.3916 10.1663 16.8011 10.5038 16.307 10.6176C16.2462 10.7197 16.175 10.8156 16.0947 10.9038C15.9018 11.1162 15.5833 11.2243 15.1491 11.2243C15.0584 11.2243 14.9561 11.2243 14.8693 11.211C13.2444 11.0631 12.1675 10.5265 11.7468 9.66197V9.64301V9.62974C11.4672 9.85287 11.117 9.97293 10.7568 9.96912H10.6681C10.3054 9.9732 9.95288 9.8517 9.67228 9.62595V9.64301V9.66197C9.25544 10.5284 8.17474 11.0631 6.54982 11.211C6.45719 11.211 6.35684 11.2243 6.27193 11.2243C5.83965 11.2243 5.52123 11.1162 5.32632 10.9038C5.23734 10.8167 5.15779 10.7208 5.08895 10.6176C4.59298 10.4981 4.00439 10.1587 3.77088 9.85915C3.44458 9.47928 3.03213 9.17991 2.56667 8.9851C2.20399 8.82843 1.89027 8.57976 1.65772 8.26463C1.56021 8.14584 1.49204 8.00647 1.45856 7.85745C1.42508 7.70843 1.42719 7.55382 1.46474 7.40574C1.53421 7.16116 1.90667 6.36484 3.73614 6.41414C5.80491 6.47102 8.14772 7.26923 8.94667 7.56311C8.98828 7.40118 9.07131 7.25238 9.18789 7.13082C9.59895 6.70233 10.3458 6.65683 10.6449 6.65683H10.7588C11.0656 6.65683 11.8105 6.70233 12.2216 7.13082C12.338 7.25174 12.4211 7.39989 12.4628 7.56121C13.2675 7.26544 15.6026 6.46912 17.6733 6.41414C19.5028 6.36295 19.8753 7.15926 19.9447 7.40574C19.9801 7.55455 19.9799 7.70939 19.9441 7.85809C19.9082 8.0068 19.8378 8.14531 19.7382 8.26273L19.7286 8.26652Z"
							fill="white" />
						<path
							d="M17.6772 6.88245C15.566 6.93933 13.0707 7.83045 12.4821 8.05417C12.4598 8.30855 12.404 8.55901 12.3162 8.7993C12.6902 8.75683 13.0669 8.74162 13.4432 8.75379C14.0564 8.42838 14.6938 8.14887 15.3498 7.91766C15.8762 7.73993 16.4263 7.639 16.9825 7.61809C17.3322 7.59308 17.6823 7.6602 17.9968 7.81251C18.3113 7.96483 18.5787 8.19682 18.7714 8.48456C19.0011 8.36966 19.1996 8.20262 19.3504 7.99729V7.98592L19.3639 7.96885C19.4148 7.90845 19.4512 7.8375 19.4702 7.76132C19.4893 7.68514 19.4905 7.6057 19.4739 7.52898C19.4546 7.45883 19.2346 6.84074 17.6772 6.88245Z"
							fill="white" />
						<path
							d="M10.7606 7.12704H10.6429C10.2569 7.12704 9.76483 7.21236 9.53325 7.45316C9.47878 7.51228 9.43758 7.58199 9.41231 7.65777C9.38705 7.73355 9.37828 7.8137 9.38658 7.89303C9.44641 8.8998 9.92114 9.50083 10.6564 9.50083H10.7452C11.4824 9.50083 11.9571 8.8998 12.015 7.89492C12.0243 7.8157 12.0162 7.73543 11.9912 7.65955C11.9663 7.58367 11.925 7.51393 11.8703 7.45505C11.6387 7.20478 11.1447 7.12704 10.7606 7.12704Z"
							fill="white" />
						<path
							d="M15.0527 9.72833C14.6563 9.47776 14.208 9.31713 13.7405 9.25812C13.2012 9.20337 12.6571 9.21675 12.1213 9.29794V9.315C12.1426 9.37946 12.1677 9.44961 12.1773 9.47426C12.5208 10.1758 13.4645 10.6119 14.9061 10.7465C14.9871 10.7465 15.0643 10.7578 15.1396 10.7578C15.3471 10.7792 15.5549 10.72 15.7185 10.5929C15.7579 10.5489 15.7946 10.5026 15.8285 10.4545C15.617 10.1681 15.3541 9.92204 15.0527 9.72833Z"
							fill="white" />
					</g>
					<defs>
						<clipPath id="clip0_6_8">
							<rect width="55" height="21" fill="white" />
						</clipPath>
					</defs>
				</svg>
			</a>
			<a href="https://hu.tranzit.org">
				<svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
					<g clip-path="url(#clip0_6_42)">
						<path
							d="M17.249 2.5767V7.68498C17.1826 7.83461 17.0603 7.95356 16.9073 8.01737H10.9751L10.6636 7.76679V4.68507C10.7189 4.62321 10.7778 4.5645 10.84 4.50921C10.93 4.43862 11.043 4.40246 11.1581 4.40744C12.6115 4.41044 14.0651 4.41044 15.5189 4.40744C15.5845 4.40744 15.6468 4.40228 15.7117 4.39971C15.7563 4.28826 15.7327 4.18584 15.7366 4.08599C15.7406 3.98615 15.7366 3.89274 15.7366 3.79096C15.7143 3.77615 15.6927 3.74974 15.671 3.74974C15.532 3.74974 15.393 3.7536 15.2533 3.75682C15.2152 3.75682 15.1772 3.76133 15.1385 3.76133H11.0571C11.0459 3.76133 11.0354 3.76133 11.0263 3.76133L10.7967 3.65569L10.6655 3.48627V2.53805C10.741 2.4324 10.817 2.31388 10.981 2.24882H11.1496C12.9038 2.24882 14.6577 2.24882 16.4115 2.24882C16.4929 2.24638 16.5741 2.23993 16.6548 2.22949C16.8371 2.21145 17.007 2.23464 17.1303 2.3828C17.1751 2.44423 17.2148 2.50907 17.249 2.5767ZM12.2383 6.50615H13.9533C14.2373 6.50615 14.5213 6.50615 14.806 6.50615C15.0906 6.50615 15.3693 6.52418 15.6586 6.49262V5.94958C15.4979 5.91673 12.3721 5.91866 12.2409 5.94958L12.2383 6.50615Z"
							fill="white" />
						<path
							d="M8.06702 16.6905H4.82643V20.6689C4.79351 20.7205 4.75644 20.7694 4.71559 20.8151C4.63296 20.8924 4.54704 20.9672 4.42046 20.9665C4.13647 20.9665 3.85249 20.9665 3.55932 20.9665L3.2878 20.7423C3.27468 20.5594 3.25172 20.3842 3.25172 20.2083C3.2491 18.0138 3.2491 15.8191 3.25172 13.6242C3.25172 13.4806 3.27337 13.3369 3.28517 13.1862C3.35863 13.1218 3.43012 13.0574 3.50882 13.0026C3.54884 12.9745 3.59611 12.958 3.64524 12.9549C3.91151 12.9491 4.17779 12.9453 4.44341 12.9511C4.62181 12.9549 4.81463 13.1579 4.81987 13.3376C4.82381 13.4767 4.81987 13.6165 4.81987 13.7563C4.81987 14.175 4.81987 14.5935 4.81987 15.0118C4.81987 15.064 4.81987 15.1168 4.81987 15.1864C4.89464 15.1934 4.95105 15.2031 5.00876 15.2031C5.59859 15.2031 6.18886 15.2031 6.77957 15.2031C7.57185 15.2031 8.3639 15.2031 9.15574 15.2031C9.24165 15.2031 9.32757 15.2173 9.40103 15.2237C9.44235 15.2707 9.46661 15.3042 9.49941 15.3345C9.54744 15.382 9.58508 15.4385 9.61 15.5008C9.63493 15.5631 9.64662 15.6297 9.64435 15.6965C9.64129 17.188 9.64129 18.6797 9.64435 20.1716C9.64435 20.3268 9.64435 20.4827 9.64435 20.6225C9.58336 20.7926 9.45612 20.8763 9.31642 20.9665H8.39494C8.24895 20.8976 8.13187 20.781 8.06374 20.6367L8.06702 16.6905Z"
							fill="white" />
						<path
							d="M8.13246 13.0806C8.32922 12.81 8.5732 12.6219 8.80472 12.4196C8.9431 12.2992 9.07558 12.171 9.21069 12.0467C9.33334 11.9333 9.45467 11.8199 9.57797 11.7072C9.71264 11.5839 9.84796 11.4611 9.98394 11.3387C10.0685 11.2634 10.1558 11.1906 10.2397 11.1152C10.2758 11.083 10.3086 11.0463 10.3434 11.0128L10.4922 10.8691C10.5001 10.8614 10.5093 10.8556 10.5165 10.8479C10.6654 10.6939 10.8136 10.5399 10.9625 10.3866C10.9911 10.3548 11.0237 10.3266 11.0595 10.3029C11.162 10.2454 11.2451 10.1596 11.2983 10.0562C11.2517 10.0562 11.2111 10.0484 11.1671 10.0484H8.65912C8.62108 10.0484 8.58238 10.0484 8.54434 10.0484C8.42638 10.0476 8.31346 10.0013 8.22993 9.91949C8.14639 9.83768 8.0989 9.72691 8.0977 9.61105C8.08918 9.40749 8.08918 9.20265 8.0977 8.99973C8.10623 8.83096 8.20526 8.70084 8.34365 8.56749C8.44268 8.55912 8.56074 8.53979 8.67879 8.53979C10.2852 8.53979 11.8914 8.53979 13.4974 8.53979C13.8601 8.53979 14.0601 8.7382 14.0601 9.097C14.0601 9.24194 14.0647 9.38688 14.0601 9.53182C14.0534 9.61646 14.0401 9.70045 14.0201 9.78305C14.0127 9.82553 13.9956 9.86582 13.9702 9.90095C13.9447 9.93607 13.9116 9.96513 13.8732 9.98596C13.8541 9.99614 13.8362 10.0085 13.82 10.0227C13.66 10.1676 13.502 10.3151 13.34 10.4581C13.1504 10.6256 12.9569 10.7899 12.7661 10.9561C12.6566 11.0521 12.5477 11.1493 12.4382 11.2472C12.2663 11.4031 12.0978 11.5635 11.922 11.7162C11.7252 11.8901 11.5154 12.055 11.3153 12.2315C11.194 12.3378 11.0825 12.4544 10.9631 12.5639C10.9077 12.6153 10.8439 12.6571 10.7743 12.6876L10.7139 12.8248H10.9107C11.8066 12.8248 12.7029 12.8248 13.5997 12.8248C13.6974 12.8226 13.7934 12.8495 13.8751 12.9021C13.9351 12.9397 13.984 12.9919 14.0171 13.0537C14.0503 13.1155 14.0664 13.1847 14.064 13.2545C14.0719 13.458 14.064 13.6622 14.064 13.8658C14.0673 14.0133 13.9847 14.1164 13.8994 14.2182C13.8002 14.2869 13.6802 14.3206 13.559 14.3135C11.8975 14.3109 10.236 14.3109 8.57451 14.3135C8.49522 14.3133 8.41717 14.2942 8.34712 14.2577C8.27707 14.2212 8.21712 14.1685 8.17247 14.1041C8.14342 14.0652 8.12717 14.0184 8.12591 13.9702C8.13246 13.661 8.13246 13.3608 8.13246 13.0806Z"
							fill="white" />
						<path
							d="M5.97339 14.3006C5.92748 14.2723 5.88419 14.2491 5.84222 14.2201C5.77726 14.1771 5.7246 14.1184 5.68924 14.0498C5.65388 13.9811 5.637 13.9047 5.64021 13.8278C5.64808 12.6309 5.64415 11.434 5.64349 10.2372C5.64349 10.1792 5.64349 10.1219 5.64349 10.0549H2.43242C2.43242 10.1193 2.42455 10.1837 2.42455 10.243C2.42455 11.2517 2.42455 12.2609 2.42455 13.2706C2.42455 13.5282 2.41537 13.7859 2.41012 14.052L2.11236 14.3006C1.81395 14.3006 1.52209 14.3174 1.23614 14.2955C1.002 14.2774 0.887224 14.1396 0.853119 13.8697C0.847788 13.7838 0.847788 13.6978 0.853119 13.612C0.853119 12.0716 0.853119 10.5313 0.853119 8.99135C0.853119 8.96429 0.853119 8.93788 0.853119 8.91855L0.947562 8.68472C1.00467 8.63276 1.07168 8.5924 1.14473 8.56598C1.21778 8.53956 1.29543 8.52759 1.37321 8.53076C3.15452 8.53463 4.93582 8.53463 6.71713 8.53076C6.8183 8.52355 6.91909 8.54922 7.00394 8.60382C7.0888 8.65841 7.15303 8.7389 7.18672 8.83288C7.20673 8.88225 7.21676 8.93498 7.21623 8.98813C7.21623 10.6144 7.21623 12.2405 7.21623 13.8664C7.21623 14.0404 7.15065 14.1795 6.97291 14.2452C6.94225 14.2608 6.91325 14.2794 6.88634 14.3006H5.97339Z"
							fill="white" />
						<path
							d="M15.1903 20.9633H10.8341L10.6308 20.8705C10.5153 20.7707 10.4937 20.647 10.4944 20.5053C10.4979 18.9116 10.4979 17.3177 10.4944 15.7236C10.4852 15.5743 10.5285 15.4265 10.617 15.3049L10.7967 15.2005C11.0722 15.2005 11.3568 15.1973 11.6401 15.2005C11.741 15.2098 11.8355 15.2529 11.9077 15.3226C11.98 15.3923 12.0256 15.4843 12.0369 15.5832C12.0409 15.6476 12.0369 15.712 12.0369 15.7764C12.0369 16.9411 12.0369 18.1055 12.0369 19.2698C12.0369 19.3277 12.0369 19.3857 12.0369 19.463C12.1137 19.4707 12.176 19.4817 12.2383 19.4823C12.8504 19.4823 13.4625 19.4823 14.0747 19.4823H15.2487C15.3057 19.4179 15.2841 19.3535 15.2841 19.2891C15.2841 18.0871 15.29 16.885 15.2795 15.6817C15.2795 15.4801 15.37 15.3596 15.513 15.2527C15.5675 15.2182 15.6311 15.2 15.696 15.2005C15.936 15.1947 16.1767 15.1954 16.4174 15.2005C16.4708 15.1987 16.524 15.2075 16.5738 15.2265C16.6236 15.2455 16.6689 15.2743 16.707 15.3111C16.7451 15.3478 16.7752 15.3918 16.7954 15.4404C16.8156 15.4889 16.8256 15.541 16.8247 15.5935C16.8286 15.6791 16.8247 15.7655 16.8247 15.8511C16.8247 16.9565 16.8247 18.0619 16.8247 19.1673C16.8247 19.3007 16.8168 19.4405 16.7125 19.5242C16.5826 19.6348 16.4624 19.7559 16.3531 19.8862C16.2823 19.9655 16.2016 20.037 16.1236 20.1098C16.0331 20.1941 15.9386 20.2753 15.8488 20.361C15.6973 20.5059 15.5504 20.656 15.3969 20.7997C15.3352 20.8609 15.2618 20.9085 15.1903 20.9633Z"
							fill="white" />
						<path
							d="M0.29907 0H1.2881C1.32876 0.0367178 1.37139 0.0773006 1.41927 0.115307C1.46381 0.151105 1.49897 0.196869 1.52179 0.248763C1.54461 0.300656 1.55444 0.357167 1.55044 0.413558C1.54388 0.628067 1.54651 0.842577 1.55044 1.05773C1.55569 1.3154 1.56881 1.57307 1.57537 1.83074C1.57864 1.95957 1.57537 2.0884 1.57537 2.22883C1.60395 2.23995 1.63397 2.24711 1.66456 2.25009C2.3366 2.25009 3.00863 2.25009 3.68066 2.25009C3.73751 2.24628 3.79404 2.23875 3.84987 2.22755C4.04663 2.26298 4.15878 2.39954 4.23421 2.60503C4.23421 2.83178 4.24404 3.08429 4.22961 3.33552C4.22371 3.44245 4.16403 3.54617 4.13255 3.6473L3.85512 3.76454C3.67449 3.73231 3.48942 3.73231 3.30879 3.76454C3.26533 3.77035 3.22139 3.77186 3.17762 3.76905C2.81165 3.76905 2.44569 3.76905 2.07906 3.76905C1.99774 3.76905 1.91707 3.75166 1.83574 3.74908C1.75441 3.7465 1.67243 3.72396 1.58127 3.78258C1.58127 3.83733 1.57668 3.90046 1.57668 3.96359C1.57668 5.11752 1.57668 6.27123 1.57668 7.42472C1.57668 7.46788 1.57668 7.51104 1.57668 7.55356C1.55897 7.74681 1.49863 7.90978 1.28941 7.97807C1.26417 7.99012 1.24059 8.00527 1.21924 8.02316H0.369903C0.238732 7.95423 0.0898522 7.89948 0.00393513 7.73006V7.57224C0.00393513 5.21028 0.00262342 2.84831 0 0.48635C0 0.271196 0.0531243 0.117239 0.25316 0.026411C0.267589 0.0199693 0.281362 0.0103067 0.29907 0Z"
							fill="white" />
						<path
							d="M17.5822 6.57055C17.6478 6.50613 17.7186 6.43334 17.7986 6.37214C17.9082 6.2884 18.0472 6.29291 18.1744 6.2884C18.3588 6.28251 18.5433 6.29178 18.726 6.3161C18.8788 6.33607 18.9844 6.44493 19.0913 6.57377C19.0913 6.63045 19.0913 6.7026 19.0913 6.76702C19.0913 7.29824 19.0913 7.82926 19.0913 8.36005C19.0913 8.43478 19.0789 8.51401 19.1681 8.55331C19.4658 8.57778 21.2668 8.56619 21.415 8.53785C21.507 8.56973 21.5894 8.62385 21.6545 8.69523C21.7196 8.76661 21.7654 8.85293 21.7875 8.94625C21.8 8.99245 21.8056 9.0402 21.8039 9.08797C21.7974 9.25867 21.7744 9.42938 21.779 9.60008C21.7889 9.69539 21.7664 9.79122 21.7152 9.87274C21.664 9.95426 21.5868 10.0169 21.4957 10.051H20.3217C20.125 10.051 19.9282 10.051 19.7314 10.051C19.5347 10.051 19.3379 10.042 19.1313 10.0581C19.1261 10.1405 19.1176 10.2082 19.1176 10.2752C19.1176 11.4179 19.1176 12.5607 19.1176 13.7028C19.1176 13.9231 19.1215 14.1344 18.8664 14.3006C18.5384 14.3141 18.1548 14.3045 17.777 14.3038L17.577 14.0822C17.5671 13.9077 17.5474 13.7215 17.5468 13.5353C17.5468 12.323 17.5219 11.11 17.552 9.89834C17.5789 8.82064 17.5592 7.74358 17.5743 6.66653C17.5769 6.64527 17.5769 6.62337 17.5822 6.57055Z"
							fill="white" />
						<path
							d="M9.87258 2.54833V3.41797L9.77223 3.64987C9.64249 3.7232 9.49561 3.76226 9.34593 3.76324C8.51518 3.76324 7.68442 3.76324 6.85367 3.76324C6.75202 3.76324 6.6497 3.74585 6.54083 3.73554C6.52641 3.76583 6.51626 3.7979 6.51066 3.83088C6.51066 3.91656 6.51984 4.00159 6.51984 4.08855C6.51984 5.21005 6.51984 6.33156 6.51984 7.45306C6.52264 7.55501 6.49744 7.65582 6.44689 7.7449C6.39635 7.83399 6.32232 7.90807 6.23258 7.95938C6.1733 7.99558 6.10555 8.01621 6.03582 8.01929C5.81217 8.02702 5.58787 8.02959 5.36423 8.01929C5.26964 8.00552 5.17685 7.98176 5.08745 7.94843C5.05204 7.89818 5.01793 7.85631 4.99039 7.80993C4.91905 7.69599 4.88115 7.56491 4.88086 7.43116C4.88611 5.91778 4.88611 4.40462 4.88086 2.89168C4.88086 2.71389 4.89726 2.55156 5.02515 2.41499C5.04611 2.38894 5.06435 2.36089 5.07958 2.33125C5.22322 2.22818 5.38193 2.2533 5.53081 2.24042C5.61673 2.23269 5.70461 2.25073 5.79316 2.25073C7.0113 2.25073 8.22966 2.25073 9.44824 2.25073C9.62532 2.25073 9.7578 2.29582 9.8188 2.47297C9.83364 2.50008 9.85169 2.52538 9.87258 2.54833Z"
							fill="white" />
						<path
							d="M15.0775 8.76397C15.2152 8.58811 15.3621 8.51854 15.555 8.53207C15.696 8.54237 15.8389 8.53207 15.9806 8.53207C16.1046 8.53593 16.2285 8.54946 16.3315 8.55719C16.382 8.59842 16.4115 8.62161 16.441 8.64608C16.4907 8.68411 16.5306 8.73307 16.5575 8.78901C16.5844 8.84496 16.5975 8.90633 16.5958 8.96817C16.5927 10.6048 16.5927 12.2414 16.5958 13.878C16.5981 13.9315 16.5895 13.9849 16.5707 14.035C16.5518 14.0852 16.523 14.1313 16.4859 14.1704C16.4489 14.2096 16.4042 14.2412 16.3546 14.2633C16.305 14.2854 16.2515 14.2977 16.197 14.2993C15.919 14.3084 15.6402 14.2993 15.3589 14.2993L15.0847 14.1357C15.0736 13.994 15.0532 13.8561 15.0532 13.7183C15.0532 12.1839 15.0532 10.6492 15.0532 9.1144C15.0539 8.99265 15.0696 8.8709 15.0775 8.76397Z"
							fill="white" />
						<path
							d="M0.945682 19.3664C1.27754 19.302 1.58383 19.3264 1.8888 19.3303C2.07638 19.3303 2.3479 19.5236 2.33019 19.7812C2.3159 20.0172 2.3159 20.2538 2.33019 20.4898C2.342 20.6773 2.25149 20.7932 2.11179 20.8918C2.07638 20.9169 2.03834 20.9375 1.99374 20.9646H1.08341C1.04507 20.9645 1.00714 20.9568 0.971954 20.9418C0.936765 20.9269 0.90506 20.905 0.878785 20.8776C0.817134 20.8171 0.758107 20.7539 0.695801 20.6902V19.6286L0.945682 19.3664Z"
							fill="white" />
					</g>
					<defs>
						<clipPath id="clip0_6_42">
							<rect width="21.84" height="21" fill="white" />
						</clipPath>
					</defs>
				</svg>

			</a>
		</div>


		<main>