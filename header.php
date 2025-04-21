<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sahakyansjewelry
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open();
	$logo = get_field('header_logo', 'option');
	$facebook = get_field('header_facebook', 'option');
	$instagram = get_field('header_instagram', 'option');
	$linkedin = get_field('header_linkedin', 'option');
	?>

	<div class="page-loader">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/chopartLoader.gif" alt="">
	</div>
	<!-- Start Header Section -->
	<header>
		<div class="container">
			<div class="headerBox">
				<!-- Logo -->
				<a href="<?php echo esc_url(home_url('/')); ?>" class="mainLogo">
					<?php if ($logo): ?>
						<img src="<?php echo esc_url($logo['url']); ?>" alt="Logo">
					<?php else: ?>
						<?php bloginfo('name'); ?>
					<?php endif; ?>
				</a>

				<!-- Mobile Menu Toggle -->
				<a class="openMobileMenu">
					<img class="black" src="<?php echo get_template_directory_uri(); ?>/assets/icons/menuBlackIcon.svg"
						alt="menuBlackIcon">
					<img class="white" src="<?php echo get_template_directory_uri(); ?>/assets/icons/menuWhiteIcon.svg"
						alt="menuWhiteIcon">
				</a>
				<a class="closeMobileMenu">
					<img class="black" src="<?php echo get_template_directory_uri(); ?>/assets/icons/closeBlackIcon.svg"
						alt="closeBlackIcon">
				</a>

				<!-- Main Navigation -->
				<nav class="navigationList">
					<?php
					wp_nav_menu([
						'theme_location' => 'header_menu',
						'menu_class' => 'header-menu',
						'container' => false,
					]);
					?>
				</nav>
			</div>
		</div>
	</header>

	<!-- Mobile Menu Section -->
	<div class="mobileNavMenu">
		<nav class="navigationList">
			<?php
			wp_nav_menu([
				'theme_location' => 'header_menu',
				'menu_class' => 'header-menu',
				'container' => false,
			]);
			?>
		</nav>

		<!-- Social Links -->
		<div class="socialLinkList">
			<?php if ($facebook): ?>
				<a href="<?php echo esc_url($facebook['url']); ?>" target="_blank"><img
						src="<?php echo get_template_directory_uri(); ?>/assets/icons/facebookWhiteIcon.svg"
						alt="facebookWhiteIcon"></a>
			<?php endif; ?>
			<?php if ($instagram): ?>
				<a href="<?php echo esc_url($instagram['url']); ?>" target="_blank"><img
						src="<?php echo get_template_directory_uri(); ?>/assets/icons/instagramWhiteIcon.png"
						alt="instagramWhiteIcon"></a>
			<?php endif; ?>
			<?php if ($linkedin): ?>
				<a href="<?php echo esc_url($linkedin['url']); ?>" target="_blank"><img
						src="<?php echo get_template_directory_uri(); ?>/assets/icons/linkedinWhiteIcon.svg"
						alt="linkedinWhiteIcon"></a>
			<?php endif; ?>
		</div>
	</div>
	<!-- End Header Section -->