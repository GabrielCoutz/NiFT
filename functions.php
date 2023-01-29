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


?>