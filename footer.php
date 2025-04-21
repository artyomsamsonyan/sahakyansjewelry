<?php
/**
 * The template for displaying the footer
 *
 * @package sahakyansjewelry
 */
?>

<?php
$logo = get_field('header_logo', 'option');
$facebook = get_field('header_facebook', 'option');
$instagram = get_field('header_instagram', 'option');
$linkedin = get_field('header_linkedin', 'option');
$contact_links = get_field('contact_links', 'option');
$catalog_links = get_field('catalog_links', 'option');
?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="footerBox">
			<div class="mainBox">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="mainLogo">
					<?php if ($logo): ?>
						<img src="<?php echo esc_url($logo['url']); ?>" alt="Logo">
					<?php else: ?>
						<?php bloginfo('name'); ?>
					<?php endif; ?>
				</a>
			</div>
			<div class="contentBox">
				<div class="InfoCol">
					<span class="contentTitle">Contact</span>
					<div class="linkList">
						<?php foreach ($contact_links as $item) { ?>
							<a
								href="<?php echo esc_url($item['link']['url']); ?>"><?php echo esc_html($item['link']['title']); ?></a>
						<?php } ?>
					</div>
				</div>
				<div class="InfoCol">
					<span class="contentTitle">Catalog</span>
					<div class="linkList">
						<?php foreach ($catalog_links as $item) { ?>
							<a
								href="<?php echo esc_url($item['link']['url']); ?>"><?php echo esc_html($item['link']['title']); ?></a>
						<?php } ?>
					</div>
				</div>
				<div class="InfoCol">
					<span class="contentTitle">Stay up to date</span>
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
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>