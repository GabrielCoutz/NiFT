<?php
// Template name: Home
get_header(); ?>

<?php if ( have_posts() ) {
	$data['products'] = wc_get_products( [ 
		'limit' => 12,
	] );

	while ( have_posts() ) {
		the_post(); ?>


		<section class="container intro">
			<h1>Compre as <span class="detalhe">melhores</span> artes</h1>
			<br>
			<h1>Dos <span class="detalhe">maiores</span> criadores</h1>
		</section>


		<main class="container produtos">
			<pre>
				<?= print_r( format_products( $data['products'] ) ); ?>
			</pre>
		</main>


	<?php }
} ?>
<?php get_footer(); ?>