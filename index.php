<?php
get_header();
?>

<main class="blog-page">
	<div class="container">
		<h1>Latest Posts</h1>
		<?php
		if (have_posts()):
			while (have_posts()):
				the_post();
				?>
				<article class="post">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php the_excerpt(); ?></p>
				</article>
				<?php
			endwhile;
		else:
			echo '<p>No posts found.</p>';
		endif;
		?>
	</div>
</main>

<?php
get_footer();
?>