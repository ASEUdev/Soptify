<?php
session_start();
if (!isset($_SESSION["user_id"])) {
	header("Location: ../");
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Relaxis</title>
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/remixicon@2.2.0/fonts/remixicon.css'>
	<link rel='stylesheet' href='https://unpkg.com/css-pro-layout@1.1.0/dist/css/css-pro-layout.css'>
	<link rel='stylesheet'
		href='https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;display=swap'>
	<link rel="stylesheet" href="dist/style.css">
	<link rel="stylesheet" href="src/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="layout has-sidebar fixed-sidebar fixed-header">
		<aside id="sidebar" class="sidebar break-point-sm has-bg-image collapsed">
			<a id="btn-collapse" class="sidebar-collapser"><i class="ri-arrow-left-s-line"></i></a>
			<div class="image-wrapper">
			</div>
			<div class="sidebar-layout">
				<div class="sidebar-header">
					<div class="pro-sidebar-logo">
						<div>
							<a href="#" onclick="nothingHere(); return false;">
								<img src="img/logo/lgblack.png" alt="logo" id="imgLogo"></img>
							</a>
						</div>
						<h5>&ensp;Relaxis Song</h5>
					</div>
				</div>
				<div class="sidebar-content">
					<nav class="menu open-current-submenu">
						<ul>
							<li class="menu-header"><span> GENERAL </span></li>
							<li class="menu-item">
								<a href="index.php">
									<span class="menu-icon">
										<i class="ri-home-line"></i>
									</span>
									<span class="menu-title">Inicio</span>
								</a>
							</li>
							<li class="menu-item">
								<a href="#">
									<span class="menu-icon">
										<i class="ri-music-line"></i>
									</span>
									<span class="menu-title">Lets take it chill</span>
									<span class="menu-suffix">
										<span class="badge primary">Hot</span>
									</span>
								</a>
							</li>
							<li class="menu-item">
								<a href="perfil.php">
									<span class="menu-icon">
										<i class="ri-account-circle-line"></i>
									</span>
									<span class="menu-title">Perfil</span>
								</a>
							</li>
							<li class="menu-item">
								<a href="muro.php">
									<span class="menu-icon">
										<i class="ri-file-text-line"></i>
									</span>
									<span class="menu-title">Muro</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</aside>
		<div id="overlay" class="overlay"></div>
		<div class="layout">
			<main class="content">
				<div>
					<a id="btn-toggle" href="#" class="sidebar-toggler break-point-sm">
						<i class="ri-menu-line ri-xl"></i>
					</a>
					<div id="takeItChill">
						<div class="container text-center">
							<div class="row">
								<div class="col">
									<ul class="list-group" id="sonidos">
									</ul>
								</div>
								<div class="col" id="categorias">
									<ul class="list-group">
										<li class="list-group-item list-group-item-dark disabled">Categorias</li>
										<li class="list-group-item list-group-item-dark"><a href="#" class="category"
												data-category="naturaleza">Naturaleza</a></li>
										<li class="list-group-item list-group-item-dark"><a href="#" class="category"
												data-category="instrumental">Instrumental</a></li>
										<li class="list-group-item list-group-item-dark"><a href="#" class="category"
												data-category="ruido">Ruido Blanco</a></li>
										<li class="list-group-item list-group-item-dark"><a href="#" class="category"
												data-category="casero">Sonidos Caseros</a></li>
										<li class="list-group-item list-group-item-dark"><a href="#"
												id="favoritos">Favoritos</a></li>
									</ul>
								</div>
								<div class="col invisible" id="soundCard">
									<div class="card w-100" style="width: 100%;">
										<button id="btnAncla"><i id="ancla" class="ri-pushpin-line"></i></button>
										<img id="imgPlayer" class="card-img-top unlocked" alt="sound img"
											onclick="cambiarTamaño()">
									</div>
									<div class="card-body">
										<audio id="audioPlayer" style="width: 100%" controls></audio>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</main>
		</div>
	</div>
	<script src='https://unpkg.com/@popperjs/core@2'></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="dist/script.js"></script>
	<script src="src/normalCode.js"></script>
	<script src="src/script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>