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
		<li class="col-md-3 col">
			<div class="card text-white">
				<a href="<?= $product['link']; ?>">
					<div class="image">
						<img src="<?= $product['img']; ?>" alt="<?= $product['name']; ?>">
					</div>
					<h1 class="title h4 my-3">
						<?= $product['name']; ?>
					</h1>
					<div class="info row">
						<span class="author col fs-5">
							@
							<?= $product['author']; ?>
						</span>
						<span class="price col fs-5 text-end">
							<?= $product['price']; ?>
						</span>
					</div>
			</div>
			</a>
		</li>
	<?php }
}


?>