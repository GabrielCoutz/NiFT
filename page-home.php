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
			<ul class="cards list-unstyled row g-4">
				<?= cards( $data['products'] ); ?>
			</ul>
		</main>

		<section class="container numeros">
			<div class="row g-2">
				<div class="col-sm-4 col-12 mb-sm-0 mb-5 text-center">
					<h3 class="display-4">+ 42</h3>
					<span class="fs-5">Criadores</span>
				</div>
				<div class="col-sm-4 col-12 mb-sm-0 mb-5 text-center">
					<h3 class="display-4">1.300</h3>
					<span class="fs-5">Artes</span>
				</div>
				<div class="col-sm-4 col-12 text-center">
					<h3 class="display-4">+ 17k</h3>
					<span class="fs-5">Vendas</span>
				</div>
			</div>
		</section>


		<section class="bg-white">
			<div class="captacao text-center container">
				<h3 class="display-3 mb-5">
					Comece a explorar
					<br>
					É grátis!
				</h3>
				<a href="/minha-conta" class="btn btn-primary">Criar conta</a>
			</div>
		</section>


	<?php }
} ?>
<?php get_footer(); ?>