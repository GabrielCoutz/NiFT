<?php get_header(); ?>

<?php

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$products[] = wc_get_product( get_the_ID() );
	?>
	<?php }
} ?>


<h5 class="display-5 text-center container page-title">Explore</h5>


<?php if ( ! empty( $products ) ) { ?>
	<div class="container row filtros align-items-md-center">
		<div class="col-md col-12">
			<div class="dropdown">
				<button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					Categorias
				</button>
				<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="categoria/ficcao">Ficção</a></li>
					<li><a class="dropdown-item" href="categoria/abstrato">Abstrato</a></li>
					<li><a class="dropdown-item" href="categoria/natureza">Natureza</a></li>
				</ul>
			</div>
		</div>
		<div class="col-md col-12">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>

	<main class="container">
		<ul class="cards list-unstyled row g-4">
			<?= cards( $products ); ?>
		</ul>
		<?= get_the_posts_pagination( [ 'mid_size' => 2, 'prev_next' => false ] ) ?>
	</main>


<?php } else { ?>
	<div class="container fs-3 my-5 text-center">
		<p class="d-block">Nenhum resultado foi encontrado para esta busca.</p>
		<a href="/loja" class="btn-primary btn">Voltar para loja</a>
	</div>
<?php } ?>


<?php get_footer(); ?>