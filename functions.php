<?php
add_theme_support( 'woocommerce' );


function format_products( $products, $img_size = 'woocommerce_thumbnail' ) {
	$newProducts = [];

	foreach ( $products as $product ) {
		$product_id = $product->get_id();
		$vendor_id = get_post_field( 'post_author', $product_id );
		$author = get_userdata( $vendor_id )->display_name;

		$newProducts[] = [ 
			'name' => $product->get_name(),
			'price' => $product->get_price_html(),
			'link' => $product->get_permalink(),
			'img' => wp_get_attachment_image_src( $product->get_image_id(), $img_size )[0],
			'author' => $author
		];
	}

	return $newProducts;
}

function cards( $productsArray ) {
	$products = format_products( $productsArray );
	foreach ( $products as $product ) { ?>
		<li class="col-md-3 col-6">
			<div class="card text-white">
				<a href="<?= $product['link']; ?>">
					<div class="image">
						<img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
					</div>
					<h1 class="title h4 my-3">
						<?= $product['name']; ?>
					</h1>
					<div class="info fs-5">
						<span class="author">
							@
							<?= $product['author']; ?>
						</span>
						<?= $product['price']; ?>
					</div>
				</a>
			</div>
		</li>
	<?php }
}

function nift_loop_shop_per_page() {
	return 12;
}

add_filter( 'loop_shop_per_page', 'nift_loop_shop_per_page' );


?>