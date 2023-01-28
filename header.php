<!DOCTYPE html>
<html lang="pt-BR">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= get_bloginfo(); ?>
	</title>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/style.css">
</head>

<body <?= body_class(); ?>>