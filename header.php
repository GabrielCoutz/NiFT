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

<?php
$username = strtok( wp_get_current_user()->display_name, " " );
?>

<body <?= body_class(); ?>>

	<header class="container header">
		<nav class="navbar navbar-expand-md">
			<div class="container-fluid">
				<a class="navbar-brand fs-1" href="/">
					<?= get_bloginfo(); ?>
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav justify-content-end align-items-center w-100">
						<li class="nav-item me-5 mb-4 mb-md-0 loja">
							<a href="/loja" class="p-3 fs-5">Loja</a>
						</li>
						<li class="nav-item">
							<a class="nav-link fs-5 btn btn-primary" href="/minha-conta">
								<?= empty( $username ) ? "Login" : $username ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>