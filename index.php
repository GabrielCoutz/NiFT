<?php get_header(); ?>

<?php if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); ?>
		<main class='container container-index'>
			<?php the_content(); ?>
			teste
		</main>
	<?php }
} ?>

<?php get_footer(); ?>