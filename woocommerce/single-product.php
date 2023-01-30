<?php get_header(); ?>

<?php

function format_single_product( $id, $img_size = 'woocommerce_thumbnail' ) {
	$product = wc_get_product( $id );

	$vendor_id = get_post_field( 'post_author', $id );
	$author = get_userdata( $vendor_id )->display_name;

	return [ 
		'id' => $id,
		'title' => $product->get_name(),
		'price' => $product->get_price_html(),
		'link' => $product->get_permalink(),
		'description' => $product->get_description(),
		'img' => wp_get_attachment_image_src( $product->get_image_id(), $img_size )[0],
		'imageFullSize' => wp_get_attachment_image_src( $product->get_image_id(), 'full' )[0],
		'author' => $author
	];
}

?>


<div class="container voltar">
	<a href="/loja" class="btn fs-3">
		<svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M8 15L1 8L8 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>

		Voltar</a>
</div>

<?php
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		$data['product'] = format_single_product( get_the_ID() );
		?>

		<main class="container">
			<div class="produto row">
				<h1 class="title text-center mb-4">
					<?= $data['product']['title']; ?>
				</h1>
				<div class="image">
					<a href="<?= $data['product']['imageFullSize']; ?>" target="_blank">
						<img src="<?= $data['product']['img']; ?>" alt="<?= $data['product']['title']; ?>">
					</a>
				</div>
				<div class="info row mt-3">
					<div class="col">
						<div class="row flex-colunm author">
							<span class="label">Autor</span>
							<span class="value mt-1">
								@
								<?= $data['product']['author']; ?>
							</span>
						</div>
					</div>
					<div class="col text-end">
						<div class="row flex-colunm price">
							<span class="label">Preço</span>
							<span class="value mt-1">
								<?= $data['product']['price']; ?>
							</span>
						</div>
					</div>
				</div>
				<?= woocommerce_template_single_add_to_cart(); ?>
			</div>
		</main>

	<?php }
} ?>


<?php
$related_ids = wc_get_related_products( $data['product']['id'], 6 );
$related_products = [];
foreach ( $related_ids as $product_id ) {
	$related_products[] = wc_get_product( $product_id );
}
?>

<section class='container relacionados'>
	<h2 class='subtitulo text-center display-5'>Relacionados</h2>
	<ul class="list-unstyled g-3 row cards">
		<?php cards( $related_products ); ?>
	</ul>

</section>


<?php get_footer(); ?>